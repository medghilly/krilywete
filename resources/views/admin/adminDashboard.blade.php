@extends('layouts.myapp')
@section('content')
<div class="flex flex-col w-full bg-gray-50 min-h-screen">
    <div class="container px-6 mx-auto py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Tableau de bord <span class="text-blue-600">Krilywete</span></h2>
                <p class="text-gray-600 mt-1">Gestion complète de votre plateforme de location</p>
            </div>
            <div class="mt-4 md:mt-0 text-sm">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Dernière connexion : {{ auth()->user()->last_login_at?->format('d/m/Y H:i') ?? 'N/A' }}
                </span>
            </div>
        </div>

        <!-- Cards Stats -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Clients Card -->
            <a href="{{ route('users') }}" class="group transform transition duration-150 hover:scale-[1.02]">
                <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-100 transition">
                    <div class="p-4 mr-4 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl text-white shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-500 group-hover:text-blue-600 transition">Clients</p>
                        <p class="text-2xl font-bold text-gray-700">
                            {{ $clients + $admins }} <span class="text-sm font-normal text-gray-400">(admins: {{ $admins }})</span>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Voitures Card -->
            <a href="{{ route('cars.index') }}" class="group transform transition duration-150 hover:scale-[1.02]">
                <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-green-100 transition">
                    <div class="p-4 mr-4 bg-gradient-to-r from-green-500 to-green-600 rounded-xl text-white shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-500 group-hover:text-green-600 transition">Voitures disponibles</p>
                        <p class="text-2xl font-bold text-gray-700">
                            {{ $cars->where('status', 'Available')->count() }}
                            <span class="text-sm font-normal text-gray-400">/ {{ $cars->count() }} total</span>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Réservations Card -->
            <a href="javascript:void(0);" onclick="scrollToReservations()" class="group transform transition duration-150 hover:scale-[1.02]">
                <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-purple-100 transition">
                    <div class="p-4 mr-4 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl text-white shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-500 group-hover:text-purple-600 transition">Réservations actives</p>
                        <p class="text-2xl font-bold text-gray-700">
                            {{ $reservations->where('status', 'Active')->count() }}
                        </p>
                    </div>
                </div>
            </a>

            <!-- Revenus Card -->
            <div class="group transform transition duration-150 hover:scale-[1.02]">
                <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-yellow-100 transition">
                    <div class="p-4 mr-4 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl text-white shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-500 group-hover:text-yellow-600 transition">Revenus ce mois</p>
                        <p class="text-2xl font-bold text-gray-700">
                            {{ number_format($monthlyRevenue ?? 0, 2) }} <span class="text-sm font-normal text-gray-400">€</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Réservations -->
        <div class="relative my-12" id="reservations-section">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-white text-lg font-bold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    GESTION DES RÉSERVATIONS
                </span>
            </div>
        </div>

        <!-- Barre de recherche et filtres -->
        <div class="mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Rechercher client, voiture..." class="pl-10 w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition">
                </div>
                <div class="flex gap-2">
                    <select class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition text-sm">
                        <option>Tous les statuts</option>
                        <option>Active</option>
                        <option>Terminée</option>
                        <option>Annulée</option>
                    </select>
                    <button class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition shadow-md flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filtrer
                    </button>
                </div>
            </div>
        </div>

        <!-- Tableau des Réservations -->
        <div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-100 mb-8 bg-white">
            <div class="w-full overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Voiture</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durée</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Méthode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preuve</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paiement</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($reservations as $reservation)
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Client -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-medium">
                                        {{ substr($reservation->user->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $reservation->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $reservation->user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Voiture -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $reservation->car->brand }} {{ $reservation->car->model }}</div>
                                <div class="text-sm text-gray-500">{{ $reservation->car->engine }}</div>
                            </td>

                            <!-- Dates -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    → {{ \Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}
                                </div>
                            </td>

                            <!-- Durée -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-600">
                                    {{ $reservation->days }} jours
                                </span>
                            </td>

                            <!-- Prix -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-medium">{{ $reservation->total_price }} €</span>
                            </td>

                            <!-- Méthode de paiement -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm">{{ $reservation->payment_method }}</span>
                            </td>

                            <!-- Numéro de transaction -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-xs font-mono bg-gray-100 px-2 py-1 rounded">{{ $reservation->transaction_number }}</span>
                            </td>

                            <!-- Preuve -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($reservation->payment_screenshot)
                                    <a href="{{ asset('uploads/payments/' . $reservation->payment_screenshot) }}" target="_blank" class="group">
                                        <div class="w-20 h-16 relative overflow-hidden rounded border border-gray-200 shadow-sm group-hover:shadow-md transition">
                                            <img src="{{ asset('uploads/payments/' . $reservation->payment_screenshot) }}"
                                                 alt="preuve de paiement"
                                                 class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition"></div>
                                        </div>
                                    </a>
                                @else
                                    <span class="text-xs text-gray-400">Aucune</span>
                                @endif
                            </td>

                            <!-- Statut paiement -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $reservation->payment_status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($reservation->payment_status === 'Paid' ? 'bg-green-100 text-green-800' : 
                                       'bg-gray-100 text-gray-800') }}">
                                    {{ $reservation->payment_status }}
                                </span>
                            </td>

                            <!-- Statut réservation -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $reservation->status === 'Active' ? 'bg-blue-100 text-blue-800' : 
                                       ($reservation->status === 'Completed' ? 'bg-green-100 text-green-800' : 
                                       ($reservation->status === 'Cancelled' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) }}">
                                    {{ $reservation->status }}
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('updateStatus', ['reservation' => $reservation->id]) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 rounded-md hover:bg-blue-100 transition text-sm"
                                       title="Modifier statut">
                                       <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                       </svg>
                                       Statut
                                    </a>
                                    <a href="{{ route('updatePayment', ['reservation' => $reservation->id]) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-600 rounded-md hover:bg-indigo-100 transition text-sm"
                                       title="Modifier paiement">
                                       <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                       </svg>
                                       Paiement
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-b-xl">
                {{ $reservations->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>

<script>
    function scrollToReservations() {
        const element = document.getElementById('reservations-section');
        element.scrollIntoView({ behavior: 'smooth' });
    }
</script>
@endsection