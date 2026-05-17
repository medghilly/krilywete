<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Krilywete') }}</title>
    
    <!-- Police Google optimisée -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icônes Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts optimisés -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    
    @include('flatpickr::components.style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primaire: #2563eb;       /* Bleu moderne */
            --primaire-fonce: #1e40af;
            --primaire-clair: #3b82f6;
            --secondaire: #1e293b;     /* Ardoise foncée */
            --accent: #f59e0b;         /* Orange vibrant */
            --clair: #f8fafc;
            --fonce: #0f172a;
            --succes: #10b981;
            --erreur: #dc2626;        /* Rouge plus visible */
            --texte: #334155;          /* Gris foncé lisible */
        }
        
        html {
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--clair);
            color: var(--texte);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }
        
        /* Styles d'en-tête améliorés */
        .en-tete-principal {
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        
        .lien-nav {
            position: relative;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            color: var(--secondaire);
            transition: all 0.3s ease;
            border-radius: 0.375rem;
        }
        
        .lien-nav:hover {
            color: var(--primaire);
            background-color: rgba(37, 99, 235, 0.1);
        }
        
        .lien-nav.active {
            color: var(--primaire);
            font-weight: 600;
            background-color: rgba(37, 99, 235, 0.1);
        }
        
        /* Boutons accessibles */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            border: none;
        }
        
        .btn-primaire {
            background: var(--primaire);
            color: white;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primaire:hover {
            background: var(--primaire-fonce);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.3);
        }
        
        .btn-accent {
            background: var(--accent);
            color: white;
        }
        
        .btn-accent:hover {
            background: #e67e22;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(245, 158, 11, 0.3);
        }
        
        /* Menu déroulant amélioré */
        .menu-deroulant-utilisateur {
            transition: all 0.3s ease;
        }
        
        .menu-deroulant-utilisateur:hover {
            background: var(--primaire-clair);
        }
        
        .contenu-deroulant {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: none;
            min-width: 200px;
        }
        
        /* Pied de page accessible */
        .pied-de-page {
            background: var(--secondaire);
            color: white;
            margin-top: auto;
        }
        
        .lien-footer {
            color: #cbd5e1;
            transition: all 0.3s ease;
            padding: 0.25rem 0;
        }
        
        .lien-footer:hover {
            color: white;
            transform: translateX(3px);
        }
        
        /* Hiérarchie visuelle */
        h1, h2, h3, h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--fonce);
        }
        
        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; }
        h3 { font-size: 1.5rem; }
        
        /* Conteneur responsive */
        .conteneur {
            padding: 2rem 1rem;
            max-width: 1280px;
            margin: 0 auto;
        }
        
        @media (min-width: 1024px) {
            .conteneur {
                padding: 3rem 2rem;
            }
        }
        
        /* Bouton retour en haut */
        .retour-haut {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--primaire);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 40;
        }
        
        .retour-haut.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .retour-haut:hover {
            background: var(--primaire-fonce);
            transform: translateY(-3px);
        }
        
        /* Section admin */
        .panel-admin {
            background: linear-gradient(135deg, var(--primaire) 0%, var(--secondaire) 100%);
            color: white;
        }
        
        /* Améliorations accessibilité */
        a:focus, button:focus {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }
        
        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
            
            .btn:hover, .retour-haut:hover, .lien-nav:hover {
                transform: none;
            }
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- -------------------------------------------------------------- En-tête -------------------------------------------------------------- --}}
    @guest
        <header class="en-tete-principal">
            <nav class="border-gray-200 px-4 lg:px-6 py-4">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    {{-- LOGO --}}
                    <a href="{{ route('home') }}" class="flex items-center focus:outline-none">
                        <img loading="lazy" src="/images/logos/LOGO.png" class="mr-3 h-12" alt="Logo Krilywete" />
                        <span style="font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: 600; letter-spacing: 1px; color: #1e293b;">Krilywete</span>
                    </a>

                    {{-- Mode démo : boutons login/register cachés, garder uniquement le toggle mobile --}}
                    <div class="flex items-center lg:order-2 space-x-3">
                        {{-- Menu mobile --}}
                        <button data-collapse-toggle="menu-mobile" type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            aria-controls="menu-mobile" aria-expanded="false"
                            aria-label="Ouvrir le menu principal">
                            <span class="sr-only">Ouvrir le menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- Menu principal --}}
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="menu-mobile">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-2 lg:mt-0">
                            <li>
                                <a href="/" class="lien-nav {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                            </li>
                            <li>
                                <a href="{{ route('cars') }}" class="lien-nav {{ request()->is('voitures') ? 'active' : '' }}">Voitures</a>
                            </li>
                            <li>
                                <a href="/location" class="lien-nav {{ request()->is('location') ? 'active' : '' }}">Location</a>
                            </li>
                            <li>
                                <a href="{{ route('contact_us') }}" class="lien-nav {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy_policy') }}" class="lien-nav {{ request()->is('confidentialite') ? 'active' : '' }}">Confidentialité</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    @else
        <header class="en-tete-principal">
            <nav class="border-gray-200 px-4 lg:px-6 py-4">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    {{-- LOGO --}}
                    <a href="{{ route('home') }}" class="flex items-center focus:outline-none">
                        <img loading="lazy" src="/images/logos/LOGO.png" class="mr-3 h-12" alt="Logo Krilywete" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary">Krilywete</span>
                    </a>

                    {{-- Menu utilisateur --}}
                    @if (Auth::user()->role == 'admin')
                        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto" id="menu-mobile">
                            <ul class="flex flex-col font-medium lg:flex-row lg:space-x-2 lg:mt-0">
                                <li>
                                    <a href='{{ route('adminDashboard') }}' class="lien-nav {{ request()->is('admin') ? 'active' : '' }}">Tableau de bord</a>
                                </li>
                                <li>
                                    <a href="{{ route('cars.index') }}" class="lien-nav {{ request()->is('admin/vehicules*') ? 'active' : '' }}">Gestion véhicules</a>
                                </li>
                                <li>
                                    <a href="{{ route('users') }}" class="lien-nav {{ request()->is('admin/utilisateurs*') ? 'active' : '' }}">Gestion utilisateurs</a>
                                </li>
                                <li>
                                    <a href="{{ route('clientReservation') }}" class="lien-nav {{ request()->is('admin/reservations*') ? 'active' : '' }}">Réservations</a>
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button id="bouton-deroulant" data-dropdown-toggle="menu-deroulant"
                                class="menu-deroulant-utilisateur flex items-center text-sm font-medium text-white bg-primaire rounded-full px-4 py-2.5"
                                type="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fas fa-user-shield mr-2"></i>
                                <span class="mr-1">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <div id="menu-deroulant"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44"
                                aria-labelledby="bouton-deroulant">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="{{ route('adminDashboard') }}"
                                            class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-tachometer-alt mr-2"></i>Tableau de bord</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Déconnexion') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto" id="menu-mobile">
                            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-2 lg:mt-0">
                                <li>
                                    <a href="/" class="lien-nav {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                                </li>
                                <li>
                                    <a href="{{ route('cars') }}" class="lien-nav {{ request()->is('voitures') ? 'active' : '' }}">Voitures</a>
                                </li>
                                <li>
                                    <a href="/location" class="lien-nav {{ request()->is('location') ? 'active' : '' }}">Location</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact_us') }}" class="lien-nav {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ route('clientReservation') }}" class="lien-nav {{ request()->is('mes-reservations') ? 'active' : '' }}">Mes Réservations</a>
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button id="bouton-deroulant" data-dropdown-toggle="menu-deroulant"
                                class="menu-deroulant-utilisateur flex items-center text-sm font-medium text-white bg-primaire rounded-full px-4 py-2.5"
                                type="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="mr-1">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <div id="menu-deroulant"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44"
                                aria-labelledby="bouton-deroulant">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="{{ route('clientReservation') }}"
                                            class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-calendar-check mr-2"></i>Mes Réservations</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Déconnexion') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    {{-- Menu mobile --}}
                    <button data-collapse-toggle="menu-mobile" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="menu-mobile" aria-expanded="false"
                        aria-label="Ouvrir le menu principal">
                        <span class="sr-only">Ouvrir le menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </header>
    @endguest

    {{-- --------------------------------------------------------------- Bannière mode démo  --------------------------------------------------------------- --}}
    @if(env('DEMO_MODE', false))
        <div style="background:linear-gradient(90deg,#2563eb,#1e40af);color:#fff;padding:10px 16px;text-align:center;font-size:14px;font-weight:500;">
            🚗 Mode démo — site vitrine pour portfolio.
            <a href="https://github.com/medghilly/krilywete" target="_blank" rel="noopener" style="color:#fff;text-decoration:underline;margin-left:8px;">Code source GitHub</a>
        </div>
    @endif

    {{-- --------------------------------------------------------------- Contenu Principal  --------------------------------------------------------------- --}}
    <main class="flex-grow conteneur">
        @yield('content')
    </main>
    
    {{-- --------------------------------------------------------------- Pied de Page  --------------------------------------------------------------- --}}
    @if (Auth::check() && Auth::user()->role == 'admin')
        <footer class="panel-admin px-4 h-20 flex justify-center items-center">
            <p class="text-white font-medium text-2xl tracking-wider">PANEAU D'ADMINISTRATION</p>
        </footer>
    @else
        <footer class="pied-de-page px-4 sm:px-6 py-12">
            <div class="mx-auto max-w-screen-xl">
                <div class="md:flex md:justify-between">
                    <div class="mb-12 md:mb-0 flex flex-col items-center md:items-start">
                        <a href="{{ route('home') }}" class="flex items-center mb-4 focus:outline-none">
                            <img loading="lazy" src="/images/logos/LOGO.png" class="mr-3 h-16" alt="Logo Krilywete" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Krilywete</span>
                        </a>
                        <p class="text-gray-400 max-w-xs text-center md:text-left">
                            Votre partenaire de confiance pour la location de voitures premium. Véhicules de qualité, service exceptionnel.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                        <div>
                            <h2 class="mb-6 text-lg font-semibold uppercase text-white">Entreprise</h2>
                            <ul class="space-y-3">
                                <li>
                                    <a href="/about" class="lien-footer">À propos</a>
                                </li>
                                <li>
                                    <a href="/location" class="lien-footer">Nos agences</a>
                                </li>
                                <li>
                                    <a href="/contact" class="lien-footer">Contact</a>
                                </li>
                                <li>
                                    <a href="/careers" class="lien-footer">Carrières</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-lg font-semibold uppercase text-white">Assistance</h2>
                            <ul class="space-y-3">
                                <li>
                                    <a href="/faq" class="lien-footer">FAQ</a>
                                </li>
                                <li>
                                    <a href="/help" class="lien-footer">Centre d'aide</a>
                                </li>
                                <li>
                                    <a href="{{ route('privacy_policy') }}" class="lien-footer">Politique de confidentialité</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms_conditions') }}" class="lien-footer">CGU</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <h2 class="mb-6 text-lg font-semibold uppercase text-white">Nous suivre</h2>
                            <div class="flex space-x-6 mb-6">
                                <a href="https://facebook.com" target="_blank" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Facebook">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                                <a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Twitter">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Instagram">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                                <a href="https://linkedin.com" target="_blank" class="text-gray-400 hover:text-white focus:outline-none" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin-in text-xl"></i>
                                </a>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <i class="fas fa-phone-alt text-gray-400 mr-3"></i>
                                    <a href="tel:+22246071882" class="text-gray-400 hover:text-white">+222 46 07 18 82</a>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-gray-400 mr-3"></i>
                                    <a href="mailto:mohamed.ghelli.elbou@gmail.com" class="text-gray-400 hover:text-white">mohamed.ghelli.elbou@gmail.com</a>
                                </div>
                                <div class="flex items-center">
                                    <i class="fab fa-github text-gray-400 mr-3"></i>
                                    <a href="https://github.com/medghilly" target="_blank" rel="noopener" class="text-gray-400 hover:text-white">github.com/medghilly</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-700" />

                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-400 sm:text-center">
                        © 2025 <a href="#" class="hover:underline">Krilywete</a> · Développé par <a href="https://github.com/medghilly" target="_blank" rel="noopener" class="hover:text-white font-medium">Med Ghilly</a>
                    </span>
                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Paiement Visa">
                            <i class="fab fa-cc-visa text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Paiement Mastercard">
                            <i class="fab fa-cc-mastercard text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Paiement PayPal">
                            <i class="fab fa-cc-paypal text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bouton retour en haut -->
        <a href="#" id="retour-haut" class="retour-haut" aria-label="Retour en haut de page">
            <i class="fas fa-arrow-up"></i>
        </a>
    @endif

    <script>
        // Visibilité du bouton retour en haut
        window.addEventListener('scroll', function() {
            var boutonRetour = document.getElementById('retour-haut');
            if (window.pageYOffset > 300) {
                boutonRetour.classList.add('visible');
            } else {
                boutonRetour.classList.remove('visible');
            }
        });
        
        // Défilement fluide vers le haut
        document.getElementById('retour-haut').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Gestion du menu mobile
        document.addEventListener('DOMContentLoaded', function() {
            const boutonMenu = document.querySelector('[data-collapse-toggle="menu-mobile"]');
            const menuMobile = document.getElementById('menu-mobile');
            
            boutonMenu.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                menuMobile.classList.toggle('hidden');
            });
        });
    </script>
    
    @include('flatpickr::components.script')
</body>

</html>