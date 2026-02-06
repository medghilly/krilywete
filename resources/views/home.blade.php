@extends('layouts.myapp')
@section('content')
    <main>
        <!-- Section Hero -->
        <div class="bg-gradient-to-r from-sec-100 to-sec-200">
            <div class="flex flex-col md:flex-row justify-between items-center max-w-screen-xl mx-auto px-4 py-16 md:py-24">
                <div class="md:w-1/2 space-y-6 text-center md:text-left">
                    <h1 class="font-bold text-4xl md:text-6xl text-gray-900">
                        <span class="text-pr-400">LOCATION</span> DE VOITURE <br>RAPIDE ET FACILE
                    </h1>
                    <div class="md:hidden w-full">
                        <img loading="lazy" src="/images/home-car.png" alt="Voiture de location" class="mx-auto">
                    </div>
                    <p class="text-lg text-gray-700">
                        Que vous planifiez un week-end ou un long voyage, nous avons la solution parfaite pour vous. Avec notre large sélection de véhicules et notre système de réservation simplifié, louer une voiture n'a jamais été aussi simple.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="/cars" class="bg-pr-400 hover:bg-pr-500 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-lg hover:shadow-none">
                            Voir nos véhicules
                        </a>
                        <a href="/contact" class="border-2 border-pr-400 text-pr-500 hover:bg-pr-50 font-bold py-3 px-6 rounded-lg transition duration-200">
                            Nous contacter
                        </a>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2">
                    <img loading="lazy" src="/images/home car.png" alt="Voiture de location" class="w-full">
                </div>
            </div>
        </div>

        <!-- Section Véhicules -->
        <div class="max-w-screen-xl mx-auto px-4 py-16">
            <div class="text-center mb-12">
                <h2 class="inline-block text-3xl font-bold text-gray-900 border-b-4 border-pr-400 pb-2">
                    NOTRE FLOTTE DE VÉHICULES
                </h2>
                <div class="flex justify-end mt-4">
                    <a href="/cars" class="text-pr-500 hover:text-pr-600 font-medium flex items-center">
                        Voir tout
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cars as $car)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img loading="lazy" class="w-full h-full object-cover hover:scale-105 transition duration-500" 
                             src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}">
                        @if($car->reduce > 0)
                        <div class="absolute top-3 right-3 bg-pr-400 text-white text-sm font-bold px-3 py-1 rounded-full">
                            -{{ $car->reduce }}%
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</h3>
                                <p class="text-gray-600">{{ $car->engine }}</p>
                            </div>
                            <div class="flex items-center">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5 {{ $i < $car->stars ? 'text-pr-400' : 'text-gray-300' }}" 
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                <span class="ml-1 text-gray-600">{{ $car->stars }}.0</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center">
                            @if($car->reduce > 0)
                                <span class="text-2xl font-bold text-pr-500">{{ number_format($car->price_per_day - ($car->price_per_day * $car->reduce / 100), 2) }}€</span>
                                <span class="ml-2 text-sm text-gray-500 line-through">{{ number_format($car->price_per_day, 2) }}€</span>
                            @else
                                <span class="text-2xl font-bold text-pr-500">{{ number_format($car->price_per_day, 2) }}€</span>
                            @endif
                            <span class="ml-1 text-sm text-gray-500">/jour</span>
                        </div>
                        
                        <a href="{{ route('car.reservation', ['car' => $car->id]) }}" 
                           class="mt-6 w-full flex items-center justify-center px-4 py-2 bg-pr-400 hover:bg-pr-500 text-white rounded-lg transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Réserver
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Section Chiffres -->
        <div class="bg-gray-900 text-white py-16">
            <div class="max-w-screen-xl mx-auto px-4">
                <h2 class="text-center text-3xl font-bold mb-12">
                    <span class="text-pr-400">NOS</span> CHIFFRES
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-800 p-8 rounded-xl text-center">
                        <div class="text-5xl font-bold text-pr-400 mb-2">80+</div>
                        <div class="text-xl">Véhicules Premium</div>
                    </div>
                    <div class="bg-gray-800 p-8 rounded-xl text-center">
                        <div class="text-5xl font-bold text-pr-400 mb-2">4500+</div>
                        <div class="text-xl">Clients Satisfaits</div>
                    </div>
                    <div class="bg-gray-800 p-8 rounded-xl text-center">
                        <div class="text-5xl font-bold text-pr-400 mb-2">7000+</div>
                        <div class="text-xl">Réservations</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Pourquoi Nous Choisir -->
        <div class="max-w-screen-xl mx-auto px-4 py-16">
            <h2 class="text-center text-3xl font-bold mb-12">
                <span class="text-pr-400">POURQUOI</span> NOUS CHOISIR ?
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-pr-400 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Support Client 24/7</h3>
                    </div>
                    <p class="text-gray-600">
                        Notre équipe dédiée est disponible à tout moment pour répondre à vos questions et résoudre vos problèmes.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-pr-400 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Véhicules Haut de Gamme</h3>
                    </div>
                    <p class="text-gray-600">
                        Une flotte de véhicules premium soigneusement entretenus pour votre confort et sécurité.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-pr-400 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Meilleur Prix Garanti</h3>
                    </div>
                    <p class="text-gray-600">
                        Nous vous garantissons les tarifs les plus compétitifs du marché pour une expérience premium.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section CTA -->
        <div class="bg-pr-500 py-16">
            <div class="max-w-screen-xl mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Prêt à vivre l'expérience ?</h2>
                <p class="text-xl text-white mb-8">Réservez votre véhicule en quelques clics seulement</p>
                <a href="/cars" class="inline-block bg-white text-pr-500 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-200">
                    Réserver maintenant
                </a>
            </div>
        </div>
    </main>
@endsection