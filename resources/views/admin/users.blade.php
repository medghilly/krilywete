@extends('layouts.myapp')
@section('content')
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-8">

        {{-- Admins Section --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-12">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="flex items-center mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800 font-car">Administrateurs</h2>
                    <span class="ml-3 bg-pr-100 text-pr-800 text-sm font-medium px-2.5 py-0.5 rounded-full">
                        {{ $admins->count() }} admin(s)
                    </span>
                </div>
                <a href="{{ route('addAdmin') }}" 
                   class="flex items-center justify-center px-4 py-2 bg-pr-500 hover:bg-pr-600 text-white font-medium rounded-lg transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Nouvel admin
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($admins as $admin)
                    <div class="bg-gray-50 rounded-lg p-4 flex items-center space-x-4 border border-gray-200 hover:shadow-md transition duration-200">
                        <img loading="lazy" src="{{ $admin->avatar }}" alt="Admin avatar" 
                             class="w-16 h-16 rounded-full object-cover border-2 border-pr-500">
                        <div>
                            <h3 class="font-car text-lg font-semibold text-gray-800">{{ $admin->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $admin->email }}</p>
                            <span class="inline-block mt-1 px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                Administrateur
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Clients Section --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="flex items-center mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800 font-car">Clients</h2>
                    <span class="ml-3 bg-pr-100 text-pr-800 text-sm font-medium px-2.5 py-0.5 rounded-full">
                        {{ $clients->total() }} client(s)
                    </span>
                </div>
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Rechercher un client..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-pr-500 focus:border-pr-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" 
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Client
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Inscrit le
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Réservations
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($clients as $client)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $client->avatar }}" alt="Avatar client">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $client->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $client->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($client->reservations->count() > 0)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $client->reservations->count() }} réservation(s)
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Aucune réservation
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('userDetails', ['user' => $client->id]) }}" 
                                       class="text-pr-600 hover:text-pr-900 mr-3">Détails</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Supprimer</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Aucun client trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $clients->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection