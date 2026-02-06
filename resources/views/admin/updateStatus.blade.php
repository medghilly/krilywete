<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Update Reservation Status | {{ $reservation->car->brand }} {{ $reservation->car->model }}</title>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-md">
            <!-- Header with car info -->
            <div class="bg-pr-500 p-5 text-center">
                <h2 class="text-white font-car font-semibold text-xl">
                    {{ $reservation->car->brand }} {{ $reservation->car->model }}
                </h2>
                <p class="text-pr-100 mt-1 text-sm">Reservation #{{ $reservation->id }}</p>
            </div>

            <div class="p-6">
                <!-- Current status display -->
                <div class="mb-6 flex items-center justify-between">
                    <p class="text-gray-600">Current Status:</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                        @if($reservation->status === 'Active') bg-blue-100 text-blue-800
                        @elseif($reservation->status === 'Pending') bg-yellow-100 text-yellow-800
                        @elseif($reservation->status === 'Ended') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ $reservation->status }}
                    </span>
                </div>

                <form action="{{ route('updateStatus', ['reservation' => $reservation->id]) }}" method="POST">
                    @csrf
                    @method("PUT")
                    
                    <!-- Status selector -->
                    <div class="space-y-2 mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700">
                            Update Status
                        </label>
                        <select name="status" id="status" required
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border">
                            <option value="Active" {{ $reservation->status === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Pending" {{ $reservation->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Ended" {{ $reservation->status === 'Ended' ? 'selected' : '' }}>Ended</option>
                            <option value="Canceled" {{ $reservation->status === 'Canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Select the new reservation status</p>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex space-x-4 mt-8">
                        <a href="{{ route('adminDashboard') }}" 
                           class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pr-600 hover:bg-pr-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Update Status
                        </button>
                    </div>
                </form>
            </div>

            <!-- Additional reservation info -->
            <div class="px-6 pb-6 text-sm text-gray-600 border-t border-gray-200 pt-4">
                <div class="flex justify-between py-1">
                    <span>Pickup Date:</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($reservation->pickup_date)->format('M d, Y') }}</span>
                </div>
                <div class="flex justify-between py-1">
                    <span>Return Date:</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($reservation->return_date)->format('M d, Y') }}</span>
                </div>
                <div class="flex justify-between py-1">
                    <span>Total Price:</span>
                    <span class="font-medium">${{ number_format($reservation->total_price, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>