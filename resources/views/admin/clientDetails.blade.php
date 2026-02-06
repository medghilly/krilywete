@extends('layouts.myapp')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- En-tête du profil -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
            <div class="flex flex-col md:flex-row items-center">
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                    <img class="h-24 w-24 rounded-full border-4 border-white shadow-md" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <p class="text-blue-100">{{ $user->email }}</p>
                    <p class="mt-2 text-blue-200">
                        Membre depuis {{ $user->created_at->format('F Y') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <!-- Section informations -->
            <div class="w-full md:w-1/3 p-6 border-b md:border-b-0 md:border-r border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistiques</h2>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Réservations actives</span>
                        <span class="font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full text-sm">
                            {{ $user->reservations->where('status', 'Active')->count() }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Réservations en attente</span>
                        <span class="font-medium text-yellow-500 bg-yellow-100 px-3 py-1 rounded-full text-sm">
                            {{ $user->reservations->where('status', 'Pending')->count() }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Réservations terminées</span>
                        <span class="font-medium text-gray-700 bg-gray-100 px-3 py-1 rounded-full text-sm">
                            {{ $user->reservations->where('status', 'Ended')->count() }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Réservations annulées</span>
                        <span class="font-medium text-red-600 bg-red-100 px-3 py-1 rounded-full text-sm">
                            {{ $user->reservations->where('status', 'Canceled')->count() }}
                        </span>
                    </div>
                    
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 font-medium">Total réservations</span>
                            <span class="font-bold text-blue-600">
                                {{ $user->reservations->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section réservations -->
            <div class="w-full md:w-2/3 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Historique des réservations</h2>
                
                @forelse ($user->reservations as $reservation)
                <div class="mb-6 bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img class="w-full h-48 object-cover" src="{{ $reservation->car->image }}" alt="{{ $reservation->car->brand }}">
                        </div>
                        <div class="p-4 md:w-2/3">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $reservation->car->brand }} {{ $reservation->car->model }}
                                </h3>
                                <span class="text-sm font-medium {{ 
                                    $reservation->status == 'Active' ? 'text-green-600' : 
                                    ($reservation->status == 'Pending' ? 'text-yellow-600' : 
                                    ($reservation->status == 'Canceled' ? 'text-red-600' : 'text-gray-600')) 
                                }}">
                                    {{ $reservation->status }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 mt-1">{{ $reservation->car->engine }}</p>
                            
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div>
                                    <p class="text-sm text-gray-500">Date de début</p>
                                    <p class="font-medium">
                                        {{ Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Date de fin</p>
                                    <p class="font-medium">
                                        {{ Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Durée</p>
                                    <p class="font-medium">
                                        {{ Carbon\Carbon::parse($reservation->end_date)->diffInDays($reservation->start_date) }} jours
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Prix total</p>
                                    <p class="font-bold text-blue-600">
                                        {{ number_format($reservation->total_price, 2) }} €
                                    </p>
                                </div>
                            </div>
                            
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-xs rounded-full {{ 
                                    $reservation->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 
                                    ($reservation->payment_status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') 
                                }}">
                                    Paiement: {{ $reservation->payment_status }}
                                </span>
                                
                                @if($reservation->status == 'Active')
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                    J-{{ Carbon\Carbon::parse($reservation->end_date)->diffInDays(now()) }} restant(s)
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune réservation</h3>
                    <p class="mt-1 text-gray-500">Vous n'avez effectué aucune réservation pour le moment.</p>
                    <div class="mt-6">
                        <a href="{{ route('cars') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Voir nos véhicules
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection