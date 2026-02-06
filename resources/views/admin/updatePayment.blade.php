<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Mettre à jour le statut de paiement</title>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-md">
            <!-- En-tête avec couleur d'accent -->
            <div class="bg-pr-500 p-4">
                <h2 class="text-center text-white font-car font-semibold text-xl">
                    {{ $reservation->car->brand }} {{ $reservation->car->model }}
                </h2>
            </div>

            <div class="p-6">
                <!-- Statut actuel avec badge coloré -->
                <div class="mb-6">
                    <p class="text-gray-600 mb-1">Statut de paiement actuel :</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                        @if($reservation->payment_status === 'Paid') bg-green-100 text-green-800
                        @elseif($reservation->payment_status === 'Canceled') bg-red-100 text-red-800
                        @else bg-yellow-100 text-yellow-800 @endif">
                        {{ $reservation->payment_status }}
                    </span>
                </div>

                <form action="{{ route('updatePayment', ['reservation' => $reservation->id]) }}" method="POST">
                    @csrf
                    @method("PUT")
                    
                    <!-- Sélecteur de statut -->
                    <div class="mb-6">
                        <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-2">
                            Nouveau statut de paiement
                        </label>
                        <select name="payment_status" id="payment_status" required
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-pr-500 focus:ring focus:ring-pr-200 focus:ring-opacity-50 py-2 px-4 border">
                            <option value="Pending" {{ $reservation->payment_status === 'Pending' ? 'selected' : '' }}>En attente</option>
                            <option value="Paid" {{ $reservation->payment_status === 'Paid' ? 'selected' : '' }}>Payé</option>
                            <option value="Canceled" {{ $reservation->payment_status === 'Canceled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex space-x-4 mt-8">
                        <a href="{{ route('adminDashboard') }}" 
                           class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pr-600 hover:bg-pr-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pr-500">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>