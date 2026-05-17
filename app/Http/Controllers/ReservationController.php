<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        //
    }

    public function create($car_id)
    {
        $user = auth()->user();
        $car = Car::find($car_id);
        return view('reservation.create', compact('car', 'user'));
    }

   public function store(Request $request, $car_id)
{
    $isDemo = env('DEMO_MODE', false);

    $rules = [
        'full-name' => 'required|string|max:255',
        'email' => 'required|email',
        'reservation_dates' => 'required|string',
        'payment_method' => 'required|string',
        'transaction_number' => 'required|string|max:255',
        'payment_screenshot' => $isDemo
            ? 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            : 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];
    $request->validate($rules);

    $car = Car::findOrFail($car_id);
    $user = Auth::user();

    // ⚠️ Vérifier la limite de 2 réservations actives (sauf en démo)
    if (!$isDemo) {
        $userReservationsCount = Reservation::where('user_id', $user->id)
            ->whereIn('status', ['Active', 'Pending', 'Confirmed'])
            ->count();

        if ($userReservationsCount >= 2) {
            return redirect()->back()->with('limit_exceeded', 'Vous avez déjà 2 réservations actives. Veuillez attendre qu\'elles soient terminées ou annulées.');
        }
    }

    // 📆 Extraire et vérifier les dates
    $dates = explode(' to ', $request->reservation_dates);
    $start = Carbon::parse($dates[0]);
    $end = Carbon::parse($dates[1]);

    if ($start->isPast()) {
        return redirect()->back()->with('error', 'Vous ne pouvez pas choisir une date de début passée.');
    }

    // 🔎 Vérifier si la voiture est déjà réservée pendant cette période
    $overlap = Reservation::where('car_id', $car->id)
        ->where(function ($query) use ($start, $end) {
            $query->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end])
                  ->orWhere(function ($q) use ($start, $end) {
                      $q->where('start_date', '<=', $start)
                        ->where('end_date', '>=', $end);
                  });
        })
        ->whereIn('status', ['Pending', 'Confirmed', 'Active'])
        ->exists();

    if ($overlap) {
        return redirect()->back()->with('error', 'Cette voiture est déjà réservée pour cette période.');
    }

    // 📆 Calcul durée et total
    $days = $start->diffInDays($end) + 1;
    $pricePerDay = $car->price_per_day;
    $totalPrice = $days * $pricePerDay;

    // 📸 Preuve de paiement
    $screenshotName = null;
    if ($request->hasFile('payment_screenshot')) {
        $file = $request->file('payment_screenshot');
        $screenshotName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/payments'), $screenshotName);
    }

    // ✅ Enregistrer réservation
    $reservation = new Reservation();
    $reservation->user()->associate($user);
    $reservation->car()->associate($car);
    $reservation->start_date = $start;
    $reservation->end_date = $end;
    $reservation->days = $days;
    $reservation->price_per_day = $pricePerDay;
    $reservation->total_price = $totalPrice;
    $reservation->status = 'Pending';
    $reservation->payment_method = $request->payment_method;
    $reservation->transaction_number = $request->transaction_number;
    $reservation->payment_screenshot = $screenshotName;
    $reservation->payment_status = 'Pending';
    $reservation->save();

    // 🚗 Marquer voiture comme réservée (sauf en démo pour que d'autres puissent tester)
    if (!$isDemo) {
        $car->status = 'Reserved';
        $car->save();
    }

    return view('thankyou', ['reservation' => $reservation]);
}


    public function show(Reservation $reservation) { }

    public function edit(Reservation $reservation) { }

    public function editPayment(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        return view('admin.updatePayment', compact('reservation'));
    }

    public function updatePayment(Reservation $reservation, Request $request)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->payment_status = $request->payment_status;
        $reservation->save();
        return redirect()->route('adminDashboard');
    }

    public function editStatus(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        return view('admin.updateStatus', compact('reservation'));
    }

    public function updateStatus(Reservation $reservation, Request $request)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->status = $request->status;

        $car = $reservation->car;
        if (in_array($request->status, ['Ended', 'Canceled'])) {
            $car->status = 'Available';
            $car->save();
        }

        $reservation->save();
        return redirect()->route('adminDashboard');
    }

    public function update(Request $request, Reservation $reservation) { }

    public function destroy(Reservation $reservation) { }
    
}
