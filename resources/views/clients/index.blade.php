@extends('layouts.dashboard')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-white">Gestion des Clients</h1>
        <p class="text-gray-400">Gérez tous les clients enregistrés dans le système</p>
    </div>
    <a href="{{ route('clients.create') }}" >
        <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-2"></i> Ajouter un Client
        </button>
    </a>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-900 text-green-300">
                <i class="fas fa-users"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-200">Total Clients</h2>
                <p class="text-2xl font-bold text-white"> {{$clientsNumber}} </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-900 text-blue-300">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-200">Balances Importées</h2>
                <p class="text-2xl font-bold text-white"> {{$basculesNumber}} </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-indigo-900 text-indigo-300">
                <i class="fas fa-users"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-200">Clients récents</h2>
                <p class="text-2xl font-bold text-white"> {{$recentClients}} </p>
            </div>
        </div>
    </div>
</div>

<!-- Clients Table -->
<div class="bg-gray-800 rounded-lg shadow overflow-hidden pb-[20px] pl-[20px]">
    <div class="px-6 py-4 border-b border-gray-700">
        <h2 class="font-semibold text-lg text-white">Liste des Clients</h2>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nombre de balances</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
                @foreach ($clients as $client)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"> {{$client->id}} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-200"> {{$client->contact_last_name}} , {{$client->contact_first_name}} </div>
                            <div class="text-sm text-gray-400">{{$client->email}}</div>
                            <div class="text-sm text-gray-400">{{$client->phone}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"> {{$client->bascules->count()}} </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                            {{$client->address}}
                        </td>                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex items-center justify-between">
            <!-- Style above the pagination links -->
            <div class="text-sm text-gray-400">
                Affichage de {{ $clients->firstItem() }} à {{ $clients->lastItem() }} sur {{ $clients->total() }} entrées
            </div>
        
            <!-- Pagination buttons -->
            <div class="flex space-x-2">
                <!-- Previous Page Button -->
                @if ($clients->onFirstPage())
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Précédent</button>
                @else
                    <a href="{{ $clients->previousPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Précédent</a>
                @endif
        
                <!-- Pagination Numbers -->
                @php
                    $currentPage = $clients->currentPage();
                    $lastPage = $clients->lastPage();
                @endphp
        
                @if ($lastPage > 5)
                    <!-- First Page -->
                    <a href="{{ $clients->url(1) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">1</a>
                    
                    @if ($currentPage > 3)
                        <span class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300">...</span>
                    @endif
        
                    <!-- Pages near current page -->
                    @foreach (range(max(2, $currentPage - 1), min($lastPage - 1, $currentPage + 1)) as $page)
                        @if ($page == $currentPage)
                            <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">{{ $page }}</button>
                        @else
                            <a href="{{ $clients->url($page) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $page }}</a>
                        @endif
                    @endforeach
        
                    @if ($currentPage < $lastPage - 2)
                        <span class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300">...</span>
                    @endif
        
                    <!-- Last Page -->
                    <a href="{{ $clients->url($lastPage) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $lastPage }}</a>
                @else
                    <!-- If there are only a few pages, show them all -->
                    @foreach (range(1, $lastPage) as $page)
                        @if ($page == $currentPage)
                            <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">{{ $page }}</button>
                        @else
                            <a href="{{ $clients->url($page) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
        
                <!-- Next Page Button -->
                @if ($clients->hasMorePages())
                    <a href="{{ $clients->nextPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Suivant</a>
                @else
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Suivant</button>
                @endif
            </div>
        </div>
        
    </div>
</div>
@endsection
