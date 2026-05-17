@extends('layouts.myapp')
@section('content')
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <!-- Section 1 - Hero avec image et texte -->
        <div class="flex flex-col md:flex-row items-center py-12 gap-8">
            <div class="md:w-1/2 w-full transition duration-500 hover:scale-105">
                <img loading="lazy" src="/images/shop1.png" alt="shop image" class="rounded-lg shadow-xl w-full h-auto object-cover">
            </div>
            <div class="md:w-1/2 w-full space-y-6">
                <h2 class="text-3xl font-bold text-gray-800">Notre Agence en Mauritanie</h2>
                <p class="text-lg text-gray-600 leading-relaxed">Bienvenue dans notre agence de location de voitures, située à Nouakchott pour votre plus grande commodité. Notre emplacement stratégique vous permet un accès facile et rapide.</p>
                <p class="text-lg text-gray-600 leading-relaxed">Proche des principaux axes routiers et aéroports, notre agence vous garantit une prise en charge rapide et un service personnalisé.</p>
                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                    <p class="text-blue-700">Horaires d'ouverture : 7j/7 de 8h à 20h</p>
                </div>
            </div>
        </div>

        <!-- Section Carte Mauritanie -->
        <div class="py-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Localisation de Notre Agence</h2>
            
            <div class="w-full">
                <div class="relative w-full h-96 rounded-lg overflow-hidden shadow-xl">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24442.12345678901!2d-15.978889!3d18.08581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDA1JzA4LjkiTiAxNcKwNTgnNDQuMCJX!5e0!3m2!1sfr!2smr!4v1234567890123!5m2!1sfr!2smr" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-6 text-center space-y-2">
                    <p class="text-lg text-gray-600"><strong>Adresse :</strong> Avenue Gamal Abdel Nasser, Nouakchott, Mauritanie</p>
                    <p class="text-lg text-gray-600"><strong>Téléphone :</strong> <a href="tel:+22246071882" class="text-blue-600 hover:underline">+222 46 07 18 82</a></p>
                    <p class="text-lg text-gray-600"><strong>Email :</strong> <a href="mailto:mohamed.ghelli.elbou@gmail.com" class="text-blue-600 hover:underline">mohamed.ghelli.elbou@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection