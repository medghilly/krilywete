@extends('layouts.myapp')
@section('content')
    <div class="flex flex-col items-center gap-8 my-12 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="text-center space-y-4">
            <img src="/images/logos/LOGO.png" alt="RealRentCar logo" class="w-36 mx-auto">
            <h1 class="text-4xl md:text-5xl font-medium text-gray-900">Conditions Générales d'Utilisation</h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <!-- Contenu principal -->
        <div class="w-full lg:w-4/5 space-y-8 text-gray-700 leading-relaxed">
            <!-- Introduction -->
            <div class="space-y-4">
                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                    <p class="text-blue-700 font-medium">En utilisant notre Plateforme, vous acceptez de vous conformer à ces Conditions Générales. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser la Plateforme.</p>
                </div>
            </div>

            <!-- Sections -->
            <div class="space-y-8">
                <!-- Section 1 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">1.</span> Acceptation des Conditions
                    </h2>
                    <p>L'utilisation de notre Plateforme implique l'acceptation sans réserve des présentes Conditions Générales. Nous vous recommandons de les lire attentivement avant toute utilisation.</p>
                </div>

                <!-- Section 2 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">2.</span> Réservations de Location
                    </h2>
                    
                    <div class="space-y-4 pl-8">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">a. Conditions d'Éligibilité</h3>
                            <p>Pour effectuer une réservation, vous devez être majeur et disposer d'un permis de conduire valide. Certaines catégories de véhicules peuvent nécessiter un permis spécifique ou une ancienneté minimale.</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">b. Tarifs et Paiement</h3>
                            <p>Les tarifs de location, taxes, frais et assurances sont affichés lors du processus de réservation. Vous vous engagez à régler l'intégralité des frais applicables selon les modalités prévues.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">3.</span> Responsabilités de l'Utilisateur
                    </h2>
                    <div class="space-y-4 pl-8">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">a. Usage Autorisé</h3>
                            <p>Vous vous engagez à n'utiliser la Plateforme qu'à des fins légales et conformes à sa destination. Tout usage frauduleux ou abusif est strictement interdit.</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">b. Sécurité du Système</h3>
                            <p>Vous ne devez en aucun cas tenter d'altérer le fonctionnement normal de la Plateforme, d'accéder à des données non autorisées ou de compromettre sa sécurité.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 4 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">4.</span> Limitation de Responsabilité
                    </h2>
                    <p class="pl-8">RealRentCar ne saurait être tenue responsable des dommages, pertes ou préjudices résultant de l'utilisation de la Plateforme ou des services de location, y compris mais sans s'y limiter aux accidents, dommages matériels ou blessures corporelles.</p>
                </div>

                <!-- Section 5 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">5.</span> Modifications et Résiliation
                    </h2>
                    <p class="pl-8">Nous nous réservons le droit de modifier, suspendre ou interrompre la Plateforme, ses services et ces Conditions Générales à tout moment, sans préavis.</p>
                </div>

                <!-- Section 6 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">6.</span> Droit Applicable
                    </h2>
                    <p class="pl-8">Les présentes Conditions Générales sont régies par et interprétées conformément au droit mauritanien. Tout litige relatif à leur exécution ou interprétation sera de la compétence exclusive des tribunaux mauritaniens.</p>
                </div>
            </div>

            <!-- Informations de Contact -->
            <div class="mt-12 p-6 bg-gray-50 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Nous Contacter</h3>
                <p>Pour toute question relative à nos Conditions Générales ou à notre Politique de Confidentialité :</p>
                <ul class="mt-2 space-y-1">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:mohamed.ghelli.elbou@gmail.com" class="hover:text-pr-500">mohamed.ghelli.elbou@gmail.com</a>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:+22246071882" class="hover:text-pr-500">+222 46 07 18 82</a>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Avenue Gamal Abdel Nasser, Nouakchott, Mauritanie</span>
                    </li>
                </ul>
            </div>

            <!-- Date de mise à jour -->
            <div class="text-sm text-gray-500 text-right">
                <p>Version en vigueur au 1er janvier 2023</p>
            </div>
        </div>
    </div>
@endsection