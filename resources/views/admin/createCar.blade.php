@extends('layouts.myapp')
@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-pr-500 to-pr-600 p-6">
                <h2 class="text-2xl font-bold text-white text-center">Ajouter une nouvelle voiture</h2>
            </div>

            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf
                
                <!-- Informations de base -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Informations générales</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Marque -->
                        <div>
                            <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                            <div class="relative">
                                <input type="text" name="brand" id="brand" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                                    placeholder="Ex: Toyota">
                                @error('brand')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Modèle -->
                        <div>
                            <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Modèle</label>
                            <div class="relative">
                                <input type="text" name="model" id="model" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                                    placeholder="Ex: Corolla">
                                @error('model')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Moteur -->
                        <div>
                            <label for="engine" class="block text-sm font-medium text-gray-700 mb-1">Moteur</label>
                            <div class="relative">
                                <input type="text" name="engine" id="engine" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                                    placeholder="Ex: 1.6L Turbo">
                                @error('engine')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Quantité -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantité</label>
                            <div class="relative">
                                <input type="number" name="quantity" id="quantity" required min="1"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                                    placeholder="Ex: 5">
                                @error('quantity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Prix par jour -->
                        <div>
                            <label for="price_per_day" class="block text-sm font-medium text-gray-700 mb-1">Prix/jour (€)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                                <input type="number" name="price_per_day" id="price_per_day" required min="1"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 pl-8 pr-4 border"
                                    placeholder="Ex: 50">
                                @error('price_per_day')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Réduction -->
                        <div>
                            <label for="reduce" class="block text-sm font-medium text-gray-700 mb-1">Réduction (%)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">%</span>
                                </div>
                                <input type="number" name="reduce" id="reduce" min="0" max="100"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border"
                                    placeholder="Ex: 15">
                                @error('reduce')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Évaluation -->
                        <div>
                            <label for="stars" class="block text-sm font-medium text-gray-700 mb-1">Évaluation</label>
                            <div class="relative">
                                <select id="stars" name="stars" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border bg-white">
                                    <option value="" disabled selected>Sélectionnez une note</option>
                                    <option value="1">⭐ (1/5)</option>
                                    <option value="2">⭐⭐ (2/5)</option>
                                    <option value="3">⭐⭐⭐ (3/5)</option>
                                    <option value="4">⭐⭐⭐⭐ (4/5)</option>
                                    <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                                </select>
                                @error('stars')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Image</h3>
                    
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-pr-600 hover:text-pr-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pr-500">
                                    <span>Télécharger une image</span>
                                    <input id="file-upload" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">ou glisser-déposer</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Statut -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Disponibilité</h3>
                    <div class="mt-4">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <input id="available" name="status" type="radio" value="available" checked
                                    class="h-4 w-4 text-pr-600 focus:ring-pr-500 border-gray-300">
                                <label for="available" class="ml-2 block text-sm font-medium text-gray-700">
                                    Disponible
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="unavailable" name="status" type="radio" value="unavailable"
                                    class="h-4 w-4 text-pr-600 focus:ring-pr-500 border-gray-300">
                                <label for="unavailable" class="ml-2 block text-sm font-medium text-gray-700">
                                    Non disponible
                                </label>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Boutons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('cars.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500">
                        Annuler
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pr-600 hover:bg-pr-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection