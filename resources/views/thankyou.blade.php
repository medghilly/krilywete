<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre réservation | Krilywete</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="/images/logos/LOGO.png">
</head>

<body class="bg-gray-100">
    @if(env('DEMO_MODE', false))
        <div style="background:linear-gradient(90deg,#f59e0b,#dc2626);color:#fff;padding:16px 20px;text-align:center;font-size:16px;font-weight:600;line-height:1.6;">
            🎉 Bien joué, tu as testé tout le flow de réservation jusqu'au bout ! 😄<br>
            <span style="font-size:14px;font-weight:400;opacity:0.95;">Petit rappel quand même : c'est juste une <strong>démo portfolio</strong> 🙃 personne ne va vraiment venir te livrer la voiture, désolé pour le road trip... 🚗💨</span><br>
            <span style="font-size:13px;font-weight:400;opacity:0.9;">Mais hey, si tu veux un dev qui code des apps comme ça, tu sais qui contacter 😉 — <a href="mailto:mohamed.ghelli.elbou@gmail.com" style="color:#fff;text-decoration:underline;font-weight:600;">Med Ghilly</a></span>
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-4xl rounded-xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-center">
                <img src="/images/logos/LOGO.png" alt="Krilywete Logo" class="h-20 mx-auto mb-4">
                <h1 class="text-4xl font-bold text-white">Merci pour votre confiance ❤️</h1>
                <p class="text-xl text-blue-100 mt-2">Votre réservation a bien été enregistrée</p>
            </div>

            <!-- Résumé -->
            <div class="p-8 md:p-10">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Résumé de votre réservation</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-lg">
                    <div>
                        <p><strong>Nom :</strong> {{ $reservation->user->name }}</p>
                        <p><strong>Email :</strong> {{ $reservation->user->email }}</p>
                        <p><strong>Téléphone :</strong> {{ $reservation->user->phone ?? 'Non renseigné' }}</p>
                    </div>
                    <div>
                        <p><strong>Voiture :</strong> {{ $reservation->car->brand }} {{ $reservation->car->model }}</p>
                        <p><strong>Dates :</strong> {{ $reservation->start_date->format('d/m/Y') }} → {{ $reservation->end_date->format('d/m/Y') }}</p>
                        <p><strong>Durée :</strong> {{ $reservation->days }} jours</p>
                    </div>
                    <div>
                        <p><strong>Méthode de paiement :</strong> {{ $reservation->payment_method }}</p>
                        <p><strong>Statut de paiement :</strong> {{ $reservation->payment_status }}</p>
                        <p><strong>Total :</strong> {{ number_format($reservation->total_price, 2) }} €</p>
                    </div>
                    <div>
                        <p><strong>Date de réservation :</strong> {{ $reservation->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Statut :</strong> {{ $reservation->status }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('invoice', ['reservation' => $reservation->id]) }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 17h6v-2h-4v-2h4v-2h-4V9h4V7H9v10zm-6 4V3h18v18H3z" />
                        </svg>
                        Télécharger la facture
                    </a>

                    <a href="{{ route('clientReservation') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                        </svg>
                        Voir mes réservations
                    </a>
                </div>

                <!-- Support -->
                <div class="text-center text-gray-600 mt-6">
                    <p>Besoin d'aide ? Appelez-nous au <span class="font-semibold">+222 46 07 18 82</span> ou envoyez un mail à <span class="text-blue-600 font-semibold">mohamed.ghelli.elbou@gmail.com</span></p>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 text-center text-gray-500 text-sm">
                <p>© {{ now()->year }} Krilywete. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
