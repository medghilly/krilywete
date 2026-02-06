@extends('layouts.myapp')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-2xl">
        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Créer un compte</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Connectez-vous ici</a>
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                            required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email *</label>
                        <input type="email" id="email" name="email" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                            required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sélection d'avatar -->
                <div class="space-y-4">
                    <label class="block text-sm font-medium text-gray-700">Choisissez votre avatar</label>
                    
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                        <!-- Avatars prédéfinis -->
                        <div class="grid grid-cols-3 gap-3">
                            @for($i = 1; $i <= 6; $i++)
                                <div class="relative">
                                    <input type="radio" name="avatar_option" 
                                           value="/images/avatars/avatar_{{ $i }}.jpg" 
                                           id="avatar_{{ $i }}" 
                                           class="absolute opacity-0 h-0 w-0">
                                    <label for="avatar_{{ $i }}" class="avatar-option cursor-pointer">
                                        <img loading="lazy" 
                                             src="/images/avatars/avatar_{{ $i }}.jpg" 
                                             alt="Avatar {{ $i }}" 
                                             class="w-16 h-16 rounded-full object-cover border-2 border-transparent hover:border-blue-400 transition">
                                    </label>
                                </div>
                            @endfor
                        </div>

                        <div class="text-gray-400 font-medium">OU</div>

                        <!-- Upload personnalisé -->
                        <div class="w-full md:w-auto">
                            <div class="flex items-center justify-center w-full">
                                <label for="file_input" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-sm text-gray-500">Télécharger une image</p>
                                    </div>
                                    <input id="file_input" name="avatar_choose" type="file" class="hidden">
                                </label>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe *</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                            required>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirmez le mot de passe *</label>
                        <input type="password" id="password-confirm" name="password_confirmation"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                            required>
                    </div>
                </div>

                <!-- Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" 
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
                    </div>
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        J'accepte les <a href="#" class="text-blue-600 hover:text-blue-500">conditions d'utilisation</a> et la <a href="#" class="text-blue-600 hover:text-blue-500">politique de confidentialité</a>
                    </label>
                </div>

                <!-- Bouton d'inscription -->
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .avatar-option input:checked + label img {
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
    }
</style>

<script>
    // Mise en évidence de l'avatar sélectionné
    document.querySelectorAll('.avatar-option input').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                document.querySelectorAll('.avatar-option img').forEach(img => {
                    img.classList.remove('border-blue-400', 'ring-2', 'ring-blue-300');
                });
                this.nextElementSibling.querySelector('img').classList.add('border-blue-400', 'ring-2', 'ring-blue-300');
            }
        });
    });

    // Aperçu de l'image uploadée
    document.getElementById('file_input').addEventListener('change', function(e) {
        // Désélectionner les avatars prédéfinis
        document.querySelectorAll('.avatar-option input').forEach(radio => {
            radio.checked = false;
        });
        
        // Afficher un aperçu (optionnel)
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                // Vous pourriez afficher un aperçu ici
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endsection