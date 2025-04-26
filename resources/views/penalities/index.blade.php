@extends('layouts.dashboard')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-white">Suivi des Pénalités</h1>
            <p class="text-gray-400">Suivi des Pénalités et Traçage</p>
        </div>
        <div>
            <button class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Générer un Rapport
            </button>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-800 rounded-lg shadow p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-900 text-green-300">
                    <i class="fa-solid fa-money-bill"></i>                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-200">Total Des Pénalités</h2>
                    <p class="text-2xl font-bold text-white">{{$penaltyTotal}} DH</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 rounded-lg shadow p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-900 text-red-300">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-200">Les Client En Retard</h2>
                    <p class="text-2xl font-bold text-white"> {{$clientsInDelay}}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 rounded-lg shadow p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-900 text-indigo-300">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
            </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-indigo-200">Nombre Des Pénalités</h2>
                    <p class="text-2xl font-bold text-white">{{$clientsCount}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des Pénalités -->
    <div class="bg-gray-800 rounded-xl shadow-lg mb-8">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-700 text-left">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date d'échéance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Mois de retard</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Montant (DH)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penalities as $penalty)
                        <tr class="border-t border-gray-700 hover:bg-gray-750">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center w-full overflow-hidden">
                                    <div class="h-9 w-9 rounded-full bg-indigo-600/30 flex items-center justify-center shrink-0 mr-3">
                                        <span class="font-medium text-indigo-400">MA</span>
                                    </div>
                                    <div class="flex-1 w-[160px] overflow-hidden">
                                        <div class="text-sm text-gray-200"> {{$penalty->client->contact_last_name}}, {{$penalty->client->contact_first_name}} </div>
                                        <div class="text-sm text-gray-400">{{$penalty->client->email}}</div>
                                        <div class="text-sm text-gray-400">{{$penalty->client->phone}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">{{$penalty->date_issued}}</td>
                            <td class="p-4 text-red-500 font-medium">{{$penalty->overdue_months}}</td>
                            <td class="p-4 font-medium">{{$penalty->amount}}</td>
                            <td class="p-4">
                                <span class="bg-red-600/20 text-red-400  rounded-full text-sm font-medium">{{$penalty->status}}</span>
                            </td>
                            <td class="p-4">
                                <div class="flex space-x-2">
                                    <button class="p-1.5 rounded-lg bg-gray-700 hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="p-1.5 rounded-lg bg-indigo-600/20 hover:bg-indigo-600/30 text-indigo-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-700 flex items-center justify-between">
            <p class="text-sm text-gray-400">
                Affichage de {{ $penalities->firstItem() }} à {{ $penalities->lastItem() }} sur {{ $penalities->total() }} entrées
            </p>
        
            <div class="flex space-x-1">
                {{-- Previous Page --}}
                @if ($penalities->onFirstPage())
                    <button class="p-2 rounded-lg bg-gray-800 text-gray-500 cursor-not-allowed" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @else
                    <a href="{{ $penalities->previousPageUrl() }}" class="p-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif
        
                {{-- Page Numbers --}}
                @for ($i = 1; $i <= $penalities->lastPage(); $i++)
                    @if ($i == $penalities->currentPage())
                        <span class="p-2 rounded-lg bg-indigo-600 text-white w-8 text-center">{{ $i }}</span>
                    @else
                        <a href="{{ $penalities->url($i) }}" class="p-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 w-8 text-center">{{ $i }}</a>
                    @endif
                @endfor
        
                {{-- Next Page --}}
                @if ($penalities->hasMorePages())
                    <a href="{{ $penalities->nextPageUrl() }}" class="p-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <button class="p-2 rounded-lg bg-gray-800 text-gray-500 cursor-not-allowed" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
        
        
    </div>

    <!-- Suivi des Balances en Retard -->
    {{-- <div class="bg-gray-800 rounded-xl shadow-lg">
        <div class="p-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Suivi des Balances en Retard</h2>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-sm px-4 py-2 rounded-lg">
                    Voir tout
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Balance Card 1 -->
                <div class="bg-gray-750 rounded-lg p-4 border border-gray-700">
                    <div class="flex justify-between mb-4">
                        <h3 class="font-medium flex items-center">
                            <span class="bg-red-500 h-2 w-2 rounded-full mr-2"></span>
                            BAL-2023-045
                        </h3>
                        <span class="text-sm text-red-400 bg-red-900/20 px-2 py-1 rounded">12 jours de retard</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Client:</p>
                        <p class="font-medium">Maroc Telecom</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Date d'échéance:</p>
                        <p>15/03/2025</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Type de balance:</p>
                        <p>Commercial</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p class="text-gray-400 text-sm">Pénalité:</p>
                        <p class="font-semibold text-red-400">500 DH</p>
                    </div>
                    <button class="bg-gray-700 hover:bg-gray-600 w-full py-2 rounded-lg text-gray-300 text-sm mt-2">
                        Voir les détails
                    </button>
                </div>
                <div class="bg-gray-750 rounded-lg p-4 border border-gray-700">
                    <div class="flex justify-between mb-4">
                        <h3 class="font-medium flex items-center">
                            <span class="bg-red-500 h-2 w-2 rounded-full mr-2"></span>
                            BAL-2023-045
                        </h3>
                        <span class="text-sm text-red-400 bg-red-900/20 px-2 py-1 rounded">12 jours de retard</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Client:</p>
                        <p class="font-medium">Maroc Telecom</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Date d'échéance:</p>
                        <p>15/03/2025</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Type de balance:</p>
                        <p>Commercial</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p class="text-gray-400 text-sm">Pénalité:</p>
                        <p class="font-semibold text-red-400">500 DH</p>
                    </div>
                    <button class="bg-gray-700 hover:bg-gray-600 w-full py-2 rounded-lg text-gray-300 text-sm mt-2">
                        Voir les détails
                    </button>
                </div>
                <div class="bg-gray-750 rounded-lg p-4 border border-gray-700">
                    <div class="flex justify-between mb-4">
                        <h3 class="font-medium flex items-center">
                            <span class="bg-red-500 h-2 w-2 rounded-full mr-2"></span>
                            BAL-2023-045
                        </h3>
                        <span class="text-sm text-red-400 bg-red-900/20 px-2 py-1 rounded">12 jours de retard</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Client:</p>
                        <p class="font-medium">Maroc Telecom</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Date d'échéance:</p>
                        <p>15/03/2025</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-400 text-sm">Type de balance:</p>
                        <p>Commercial</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p class="text-gray-400 text-sm">Pénalité:</p>
                        <p class="font-semibold text-red-400">500 DH</p>
                    </div>
                    <button class="bg-gray-700 hover:bg-gray-600 w-full py-2 rounded-lg text-gray-300 text-sm mt-2">
                        Voir les détails
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection