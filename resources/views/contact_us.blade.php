@extends('layouts.myapp')
@section('content')
    <div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Contactez-nous</h1>
            <p class="text-xl text-gray-600">
                Une question technique ? Un retour sur nos services ? Besoin de détails sur nos offres ?
                Notre équipe est à votre écoute.
            </p>
        </div>

        <!-- Formulaire et Informations -->
        <div class="max-w-7xl mx-auto mt-12 grid md:grid-cols-2 gap-12">
            <!-- Formulaire de contact -->
            <div class="bg-gray-50 p-8 rounded-xl shadow-sm">
                <form action="#" class="space-y-6" id="contact-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="first-name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200"
                                placeholder="Jean">
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="last-name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200"
                                placeholder="Dupont">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200"
                                placeholder="jean.dupont@exemple.com">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200"
                                placeholder="+212 600 000 000">
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                        <select id="subject"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200">
                            <option value="" disabled selected>Sélectionnez un sujet</option>
                            <option value="reservation">Réservation</option>
                            <option value="payment">Paiement</option>
                            <option value="car-problem">Problème avec un véhicule</option>
                            <option value="cancelation">Annulation</option>
                            <option value="other">Autre demande</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Votre message</label>
                        <textarea id="message" rows="5"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pr-400 focus:border-pr-400 transition duration-200"
                            placeholder="Décrivez-nous votre demande..."></textarea>
                    </div>
                    
                    <button type="submit"
                        class="w-full bg-pr-400 hover:bg-pr-500 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                        Envoyer le message
                    </button>
                </form>
            </div>

            <!-- Informations de contact -->
            <div class="space-y-8">
                <!-- Carte Entreprise -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-start">
                        <div class="bg-pr-100 p-4 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pr-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Informations sur l'entreprise</h3>
                            <p class="text-gray-600 mb-1">RealRentCar SARL</p>
                            <p class="text-gray-600">Localisation : Maroc</p>
                        </div>
                    </div>
                </div>
                
                <!-- Carte Adresse -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-start">
                        <div class="bg-pr-100 p-4 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pr-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Adresse</h3>
                            <p class="text-gray-600 mb-1">DR ANABDOUR AMMELEN TIZNIT</p>
                            <p class="text-gray-600">Code postal : 85450</p>
                        </div>
                    </div>
                </div>
                
                <!-- Carte Téléphone -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-start">
                        <div class="bg-pr-100 p-4 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pr-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Appelez-nous</h3>
                            <p class="text-gray-600 mb-3">Notre équipe est disponible pour répondre à vos questions.</p>
                            <a href="tel:+212600000000" class="text-pr-500 font-medium hover:text-pr-600 transition duration-200">
                                +212 600 000 000
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Carte Horaires -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-start">
                        <div class="bg-pr-100 p-4 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pr-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Horaires d'ouverture</h3>
                            <p class="text-gray-600 mb-1">Lundi - Vendredi : 8h00 - 20h00</p>
                            <p class="text-gray-600">Samedi - Dimanche : 9h00 - 18h00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#contact-form').submit(function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Merci !',
                    text: 'Nous avons bien reçu votre message et vous répondrons dans les plus brefs délais.',
                    icon: 'success',
                    confirmButtonColor: '#f49b00',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
@endsection