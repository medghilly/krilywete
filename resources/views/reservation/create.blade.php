@extends('layouts.myapp')
@section('content')

@if(session('limit_exceeded'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-red-700">
                    {{ session('limit_exceeded') }}
                    <a href="{{ route('user.reservations') }}" class="font-medium underline text-red-700 hover:text-red-600">
                        Voir mes réservations
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endif

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- En-tête premium -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-8 text-white rounded-t-xl shadow-lg">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight">{{ $car->brand }} {{ $car->model }} {{ $car->engine }}</h1>
                <p class="mt-2 text-blue-100 opacity-90">Réservez votre véhicule premium en toute simplicité</p>
            </div>
            @if($car->reduce > 0)
            <div class="mt-4 md:mt-0 bg-white text-blue-600 px-4 py-2 rounded-full shadow-md transform hover:scale-105 transition">
                <span class="font-bold">ÉCONOMIE {{ $car->reduce }}%</span>
            </div>
            @endif
        </div>
    </div>

    <!-- Carte de réservation -->
    <div class="bg-white rounded-b-xl shadow-lg overflow-hidden">
        <div class="flex flex-col lg:flex-row">
            <!-- Formulaire -->
            <div class="lg:w-2/3 p-8 lg:border-r border-gray-100">
                <form id="reservation_form" action="{{ route('car.reservationStore', ['car' => $car->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Section Informations -->
                    <div class="space-y-1">
                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                            <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Vos informations
                        </h3>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-4">
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <div class="relative">
                                    <input type="text" name="full-name" value="{{ $user->name }}" 
                                           class="block w-full pl-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-4 border"
                                           placeholder="Votre nom">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="relative">
                                    <input type="email" name="email" value="{{ $user->email }}" 
                                           class="block w-full pl-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-4 border"
                                           placeholder="votre@email.com">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Dates -->
                    <div class="space-y-1">
                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                            <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Dates de réservation
                        </h3>
                        <div class="mt-4">
                            <div class="relative">
                                <x-flatpickr 
                                    range 
                                    name="reservation_dates" 
                                    id="laravel-flatpickr"
                                    :config="['minDate' => now()->format('Y-m-d')]"
                                    class="block w-full pl-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-4 border"
                                    placeholder="Sélectionnez vos dates"
                                />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Paiement -->
                    <div class="space-y-1">
                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                            <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            Paiement sécurisé
                        </h3>
                        <!-- Dans la section Paiement, avant les méthodes de paiement, ajoutez : -->
<div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded mb-6">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">Instructions de paiement</h3>
            <div class="mt-2 text-sm text-blue-700">
                <p>Veuillez effectuer le virement vers le compte suivant :</p>
                <div class="mt-2 bg-white p-3 rounded-md inline-block">
                    <span class="font-mono font-bold text-lg">202500</span>
                </div>
                <p class="mt-2">Merci d'indiquer ce numéro dans la référence du virement.</p>
            </div>
        </div>
    </div>
</div>
                        <div class="mt-4 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Méthode de paiement</label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <label class="payment-method-option block">
                                        <input type="radio" name="payment_method" value="Bankily" class="sr-only peer" required>
                                        <div class="payment-method-card p-3 border-2 border-gray-200 rounded-lg hover:border-blue-400 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-200 transition-all duration-200">
                                            <img src="{{ asset('images/banks/bankily.png') }}" alt="Bankily" class="mx-auto h-12 object-contain mb-2"
                                               style="max-height: 48px; max-width: 100%;"p>
                                            
                                            <span class="text-sm font-medium text-gray-700">Bankily</span>
                                        </div>
                                    </label>
                                    <label class="payment-method-option block">
                                        <input type="radio" name="payment_method" value="Masrivi" class="sr-only peer" required>
                                        <div class="payment-method-card p-3 border-2 border-gray-200 rounded-lg hover:border-blue-400 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-200 transition-all duration-200">
                                            <img src="{{ asset('images/banks/masrivi.png') }}" alt="Masrivi" class="mx-auto h-12 object-contain mb-2"
                                               style="max-height: 48px; max-width: 100%;">
                                            <span class="text-sm font-medium text-gray-700">Masrivi</span>
                                        </div>
                                    </label>
                                    <label class="payment-method-option block">
                                        <input type="radio" name="payment_method" value="Sedad" class="sr-only peer" required>
                                        <div class="payment-method-card p-3 border-2 border-gray-200 rounded-lg hover:border-blue-400 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-200 transition-all duration-200">
                                          <img src="{{ asset('images/banks/sedad.png') }}" alt="Sedad" class="mx-auto h-12 object-contain mb-2"
                                               style="max-height: 48px; max-width: 100%;">
                                            
                                            <span class="text-sm font-medium text-gray-700">Sedad</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-gray-700">Numéro de transaction</label>
                                    <div class="relative">
                                        <input type="text" name="transaction_number" required
                                               class="block w-full pl-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-4 border"
                                               placeholder="001123456">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-gray-700">Preuve de paiement</label>
                                    <input type="file" name="payment_screenshot" accept="image/*" required
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                            <svg class="h-5 w-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Confirmer la réservation
                        </button>
                    </div>
                </form>
            </div>

            <!-- Récapitulatif -->
            <div class="lg:w-1/3 p-8 bg-gray-50">
                <div class="relative h-64 w-full overflow-hidden rounded-xl shadow-lg mb-6 group">
                    <img src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}" 
                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    @if($car->reduce > 0)
                    <div class="absolute top-4 left-4 bg-white text-blue-600 text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        PROMO -{{ $car->reduce }}%
                    </div>
                    @endif
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $car->brand }} {{ $car->model }}</h3>
                    <p class="text-gray-600">{{ $car->engine }}</p>
                    <div class="flex items-center mt-2">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-5 w-5 {{ $i < $car->stars ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="ml-1 text-gray-600 text-sm">{{ $car->stars }}.0</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-gray-600">Durée</span>
                            </div>
                            <span id="duration" class="font-medium text-gray-800 bg-gray-50 px-3 py-1 rounded">-- jours</span>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-600">Total estimé</span>
                            </div>
                            <span id="total-price" class="font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded">-- $</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <div class="flex items-start">
                        <svg class="h-5 w-5 text-blue-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <div>
                            <h4 class="font-medium text-blue-800">Garantie incluse</h4>
                            <p class="text-sm text-blue-600 mt-1">Votre réservation inclut une assurance tous risques et une assistance 24h/24.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const flatpickrElement = document.getElementById('laravel-flatpickr');
    const pricePerDay = {{ $car->price_per_day }};
    const discount = {{ $car->reduce }} / 100;
    
    function calculatePrice(days) {
        let total = days * pricePerDay;
        if (discount > 0) {
            total = total * (1 - discount);
        }
        return total;
    }

    function updatePriceDisplay(selectedDates) {
        if (selectedDates && selectedDates.length === 2) {
            const start = new Date(selectedDates[0]);
            const end = new Date(selectedDates[1]);
            const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
            const total = calculatePrice(days);

            document.getElementById('duration').textContent = days + ' jour' + (days > 1 ? 's' : '');
            document.getElementById('total-price').textContent = total.toFixed(2) + ' $';
        } else {
            document.getElementById('duration').textContent = '-- jours';
            document.getElementById('total-price').textContent = '-- $';
        }
    }

    // Initialiser le calcul si des dates sont déjà sélectionnées
    if (flatpickrElement && flatpickrElement._flatpickr) {
        const fpInstance = flatpickrElement._flatpickr;
        
        // Mettre à jour immédiatement si des dates sont déjà sélectionnées
        if (fpInstance.selectedDates.length === 2) {
            updatePriceDisplay(fpInstance.selectedDates);
        }
        
        // Écouter les changements futurs
        fpInstance.config.onChange.push(function(selectedDates) {
            updatePriceDisplay(selectedDates);
        });
    }

    // Écouter les changements manuels (au cas où)
    flatpickrElement.addEventListener('change', function() {
        if (this._flatpickr) {
            updatePriceDisplay(this._flatpickr.selectedDates);
        }
    });
});
</script>

@endsection