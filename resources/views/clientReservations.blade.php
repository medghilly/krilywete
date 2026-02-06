@extends('layouts.myapp')
@section('content')
<div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-8">
    <!-- Section profil utilisateur -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
        <div class="bg-gradient-to-r from-pr-500 to-pr-600 p-6">
            <h1 class="text-2xl font-bold text-white">Mon compte</h1>
        </div>
        
        <div class="p-6 flex flex-col md:flex-row items-center gap-6">
            <!-- Avatar -->
            <div class="relative">
                <img loading="lazy" class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white shadow-lg" 
                     src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                <div class="absolute -bottom-2 -right-2 bg-white p-1 rounded-full shadow-md">
                    <div class="bg-pr-500 text-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Informations utilisateur -->
            <div class="flex-1">
                <h2 class="text-3xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600 mt-1">{{ Auth::user()->email }}</p>
                
                <!-- Statistiques -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 text-center">
                        <p class="text-sm text-blue-600 font-medium">Total Réservations</p>
                        <p class="text-2xl font-bold text-blue-800 mt-1">{{ Auth::user()->reservations->count() }}</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100 text-center">
                        <p class="text-sm text-green-600 font-medium">Actives</p>
                        <p class="text-2xl font-bold text-green-800 mt-1">{{ Auth::user()->reservations->where('status', 'Active')->count() }}</p>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100 text-center">
                        <p class="text-sm text-yellow-600 font-medium">En attente</p>
                        <p class="text-2xl font-bold text-yellow-800 mt-1">{{ Auth::user()->reservations->where('status', 'Pending')->count() }}</p>
                    </div>
                    <div class="bg-red-50 p-4 rounded-lg border border-red-100 text-center">
                        <p class="text-sm text-red-600 font-medium">Annulées</p>
                        <p class="text-2xl font-bold text-red-800 mt-1">{{ Auth::user()->reservations->where('status', 'Canceled')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section réservations -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-pr-500 to-pr-600 p-6">
            <h2 class="text-2xl font-bold text-white">Mes réservations</h2>
        </div>
        
        <div class="p-6">
            @forelse ($reservations as $reservation)
                <div class="flex flex-col md:flex-row gap-6 mb-6 p-4 rounded-lg border border-gray-200 hover:shadow-md transition-shadow">
                    <!-- Image voiture -->
                    <div class="md:w-1/4 h-48 overflow-hidden rounded-lg">
                        <img loading="lazy" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" 
                             src="{{ $reservation->car->image }}" alt="{{ $reservation->car->brand }}">
                    </div>
                    
                    <!-- Détails réservation -->
                    <div class="md:w-3/4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $reservation->car->brand }} {{ $reservation->car->model }}</h3>
                                <p class="text-gray-600">{{ $reservation->car->engine }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-pr-500">{{ $reservation->total_price }} $</p>
                                <p class="text-sm text-gray-500">pour {{ Carbon\Carbon::parse($reservation->start_date)->diffInDays($reservation->end_date) }} jours</p>
                            </div>
                        </div>
                        
                        <!-- Dates et statuts -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium">Du {{ Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium">Au {{ Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">Paiement :</span>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                                        @if($reservation->payment_status == 'Pending') bg-yellow-100 text-yellow-800
                                        @elseif($reservation->payment_status == 'Canceled') bg-red-100 text-red-800
                                        @elseif($reservation->payment_status == 'Paid') bg-green-100 text-green-800 @endif">
                                        {{ $reservation->payment_status }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">Statut :</span>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                                        @if($reservation->status == 'Pending') bg-yellow-100 text-yellow-800
                                        @elseif($reservation->status == 'Ended') bg-gray-100 text-gray-800
                                        @elseif($reservation->status == 'Active') bg-green-100 text-green-800
                                        @elseif($reservation->status == 'Canceled') bg-red-100 text-red-800 @endif">
                                        {{ $reservation->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bouton facture -->
                        <div class="mt-6">
                            <a href="{{ route('invoice', ['reservation' => $reservation->id]) }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-pr-500 hover:bg-pr-600 text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Télécharger la facture
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Aucune réservation trouvée</h3>
                    <p class="mt-2 text-gray-600">Vous n'avez pas encore effectué de réservation</p>
                    <a href="{{ route('cars') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pr-500 hover:bg-pr-600">
                        Voir nos véhicules
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection