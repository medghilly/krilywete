@extends('layouts.myapp')
@section('content')
    <div class="flex flex-col items-center gap-8 my-12 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="text-center space-y-4">
            <img src="/images/logos/LOGO.png" alt="RealRentCar logo" class="w-36 mx-auto">
            <h1 class="text-4xl md:text-5xl font-medium text-gray-900">Politique de Confidentialité</h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <!-- Contenu principal -->
        <div class="w-full lg:w-4/5 space-y-8 text-gray-700 leading-relaxed">
            <!-- Introduction -->
            <div class="space-y-4">
                <p class="text-lg">
                    RealRentCar ("nous", "notre" ou "nos") exploite le site web et l'application RealRentCar ("Plateforme"). Cette Politique de Confidentialité décrit comment nous collectons, utilisons et divulguons les informations personnelles des utilisateurs de la Plateforme.
                </p>
                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                    <p class="text-blue-700 font-medium">En accédant et en utilisant notre Plateforme, vous consentez aux pratiques décrites dans cette Politique de Confidentialité.</p>
                </div>
            </div>

            <!-- Sections -->
            <div class="space-y-8">
                <!-- Section 1 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">1.</span> Collecte et Utilisation des Informations
                    </h2>
                    
                    <div class="space-y-4 pl-8">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">a. Informations Personnelles</h3>
                            <p>Nous pouvons collecter des informations personnelles auprès des utilisateurs, y compris mais sans s'y limiter : nom, adresse, numéro de téléphone, adresse e-mail, détails du permis de conduire, informations de paiement et autres informations nécessaires pour traiter les réservations et transactions de location de voiture.</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">b. Données d'Utilisation</h3>
                            <p>Nous collectons automatiquement certaines informations sur votre appareil, telles que l'adresse IP, le type de navigateur, le système d'exploitation et l'activité de navigation, pour améliorer notre Plateforme et l'expérience utilisateur.</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">c. Cookies et Technologies de Suivi</h3>
                            <p>Nous utilisons des cookies et des technologies similaires pour suivre les interactions des utilisateurs sur la Plateforme et fournir un contenu personnalisé.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">2.</span> Sécurité des Données
                    </h2>
                    <p class="pl-8">Nous mettons en œuvre des mesures de sécurité raisonnables pour protéger vos informations personnelles contre tout accès non autorisé, divulgation, altération ou destruction. Cependant, aucune transmission de données sur Internet ou méthode de stockage électronique n'est totalement sécurisée, et nous ne pouvons garantir une sécurité absolue des données.</p>
                </div>

                <!-- Section 3 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">3.</span> Conservation des Données
                    </h2>
                    <p class="pl-8">Nous conservons vos informations personnelles aussi longtemps que nécessaire pour remplir les objectifs décrits dans cette Politique de Confidentialité et pour nous conformer aux exigences légales.</p>
                </div>

                <!-- Section 4 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">4.</span> Services Tiers
                    </h2>
                    <p class="pl-8">Nous pouvons utiliser des services tiers, tels que des processeurs de paiement et des fournisseurs d'analytique, pour faciliter les opérations de la Plateforme. Ces services tiers ont leurs propres politiques de confidentialité et conditions d'utilisation, qui sont distinctes des nôtres. Nous vous recommandons de consulter leurs politiques avant d'interagir avec ces services.</p>
                </div>

                <!-- Section 5 -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">5.</span> Droits des Utilisateurs
                    </h2>
                    <p class="pl-8">Vous avez le droit d'accéder, de mettre à jour, de corriger ou de supprimer vos informations personnelles. Si vous souhaitez exercer ces droits, veuillez nous contacter en utilisant les coordonnées fournies à la fin de cette Politique de Confidentialité.</p>
                </div>
            </div>

            <!-- Informations de Contact -->
            <div class="mt-12 p-6 bg-gray-50 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Nous Contacter</h3>
                <p>Si vous avez des questions concernant cette Politique de Confidentialité, veuillez nous contacter à :</p>
                <ul class="mt-2 space-y-1">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>privacy@realrentcar.com</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+212 6 12 34 56 78</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>123 Avenue Principale, Casablanca, Maroc</span>
                    </li>
                </ul>
            </div>

            <!-- Date de mise à jour -->
            <div class="text-sm text-gray-500 text-right">
                <p>Dernière mise à jour : 1er janvier 2023</p>
            </div>
        </div>
    </div>
@endsection