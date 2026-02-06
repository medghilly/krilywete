@extends('layouts.myapp')
@section('content')
<div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Section de recherche améliorée -->
    <div class="bg-white p-6 rounded-xl shadow-lg mb-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Trouvez votre voiture idéale</h2>
        <form action="{{ route('carSearch') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                    <input type="text" id="brand" name="brand" placeholder="Toyota, BMW..."
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                        value="{{ request('brand') }}">
                </div>
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Modèle</label>
                    <input type="text" id="model" name="model" placeholder="Corolla, X5..."
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                        value="{{ request('model') }}">
                </div>
                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-700 mb-1">Prix min</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500"></span>
                        </div>
                        <input type="number" id="min_price" name="min_price" placeholder="50"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 pl-8 pr-4 border"
                            value="{{ request('min_price') }}">
                    </div>
                </div>
                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-700 mb-1">Prix max</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500"></span>
                        </div>
                        <input type="number" id="max_price" name="max_price" placeholder="200"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 pl-8 pr-4 border"
                            value="{{ request('max_price') }}">
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" 
                        class="h-10 bg-pr-500 hover:bg-pr-600 text-white font-medium rounded-lg transition duration-200 flex-1 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Rechercher
                    </button>
                    <a href="{{ route('cars') }}" 
                        class="h-10 border border-gray-300 text-gray-700 font-medium rounded-lg transition duration-200 flex-1 flex items-center justify-center hover:bg-gray-50">
                        Tout voir
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Affichage des voitures -->
    @if($cars->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Badge de réduction -->
                    @if($car->reduce > 0)
                        <div class="absolute top-2 right-2 bg-pr-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                            -{{ $car->reduce }}%
                        </div>
                    @endif
                    
                    <!-- Image de la voiture -->
                    <a href="{{ route('car.reservation', ['car' => $car->id]) }}" class="block relative h-56 overflow-hidden">
                        <img loading="lazy" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" 
                             src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}">
                    </a>
                    
                    <!-- Détails de la voiture -->
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</h3>
                                <p class="text-gray-600">{{ $car->engine }}</p>
                            </div>
                            <!-- Évaluation -->
                            <div class="flex items-center">
                                <div class="flex">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="h-5 w-5 {{ $i < $car->stars ? 'text-pr-400' : 'text-gray-300' }}" 
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="ml-1 text-gray-600 text-sm">{{ $car->stars }}.0</span>
                            </div>
                        </div>
                        
                        <!-- Prix -->
                        <div class="mt-4 flex items-center">
                            @if($car->reduce > 0)
                                <span class="text-lg font-bold text-gray-900">{{ number_format($car->price_per_day - ($car->price_per_day * $car->reduce / 100), 2) }}MRU</span>
                                <span class="ml-2 text-sm text-gray-500 line-through">{{ number_format($car->price_per_day, 2) }}MRU</span>
                            @else
                                <span class="text-lg font-bold text-gray-900">{{ number_format($car->price_per_day, 2) }}MRU</span>
                            @endif
                            <span class="ml-1 text-sm text-gray-500">/jour</span>
                        </div>
                        
                        <!-- Bouton de réservation -->
                        <a href="{{ route('car.reservation', ['car' => $car->id]) }}" 
                           class="mt-6 w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pr-500 hover:bg-pr-600 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Réserver
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-xl shadow-md p-8 text-center col-span-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun véhicule trouvé</h3>
            <p class="mt-2 text-gray-600">Essayez d'ajuster vos critères de recherche</p>
            <a href="{{ route('cars') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pr-500 hover:bg-pr-600">
                Voir tous les véhicules
            </a>
        </div>
    @endif

    <!-- Pagination -->
    @if($cars->count() > 0)
        <div class="mt-10 flex justify-center">
            {{ $cars->links('pagination::tailwind') }}
        </div>
    @endif
</div>
@endsection