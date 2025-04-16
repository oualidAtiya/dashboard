@extends('layouts.dashboard')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-white">Gestion des Importateurs</h1>
        <p class="text-gray-400">Gérez tous les importateurs de balances enregistrés dans le système</p>
    </div>
    <a href="{{ route('importers.create') }}" >
        <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-2"></i> Ajouter un Importateur
        </button>
    </a>
</div>

<!-- Filter and Sort Options -->
{{-- <div class="bg-gray-800 rounded-lg shadow p-4 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="flex flex-col">
            <label for="status" class="text-sm text-gray-400 mb-1">Statut</label>
            <select id="status" class="bg-gray-700 border border-gray-600 text-white rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                <option value="all">Tous</option>
                <option value="active">Actif</option>
                <option value="inactive">Inactif</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="region" class="text-sm text-gray-400 mb-1">Région</label>
            <select id="region" class="bg-gray-700 border border-gray-600 text-white rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                <option value="all">Toutes</option>
                <option value="casablanca">Casablanca-Settat</option>
                <option value="rabat">Rabat-Salé-Kénitra</option>
                <option value="marrakech">Marrakech-Safi</option>
                <option value="fes">Fès-Meknès</option>
                <option value="tanger">Tanger-Tétouan-Al Hoceïma</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="sortBy" class="text-sm text-gray-400 mb-1">Trier par</label>
            <select id="sortBy" class="bg-gray-700 border border-gray-600 text-white rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                <option value="name">Nom</option>
                <option value="created">Date d'enregistrement</option>
                <option value="scales">Nombre de balances</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded w-full">
                <i class="fas fa-filter mr-2"></i> Appliquer les filtres
            </button>
        </div>
    </div>
</div> --}}

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-900 text-green-300">
                <i class="fas fa-building"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-200">Total Importateurs</h2>
                <p class="text-2xl font-bold text-white"> {{$importersNumber}} </p>
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
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-200">Importateurs récents</h2>
                <p class="text-2xl font-bold text-white"> {{$recentImporters}} </p>
            </div>
        </div>
    </div>
</div>

<!-- Importers Table -->
<div class="bg-gray-800 rounded-lg shadow overflow-hidden pb-[20px] pl-[20px]">
    <div class="px-6 py-4 border-b border-gray-700">
        <h2 class="font-semibold text-lg text-white">Liste des Importateurs</h2>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Entreprise</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                    
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
                @foreach ($importers as $importer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"> {{$importer->id}} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-200">{{$importer->company_name}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-200"> {{$importer->contact_last_name}} , {{$importer->contact_first_name}} </div>
                            <div class="text-sm text-gray-400">{{$importer->email}}</div>
                            <div class="text-sm text-gray-400">{{$importer->phone}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200"> {{$importer->address}} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{-- <a href="#" class="text-blue-400 hover:text-blue-300 mr-3"><i class="fas fa-eye"></i></a> --}}
                            <a href="{{ route('importers.edit', $importer->id) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>                            
                            <form action="{{ route('importers.destroy', $importer->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
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
                Affichage de {{ $importers->firstItem() }} à {{ $importers->lastItem() }} sur {{ $importers->total() }} entrées
            </div>
        
            <!-- Pagination buttons -->
            <div class="flex space-x-2">
                <!-- Previous Page Button -->
                @if ($importers->onFirstPage())
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Précédent</button>
                @else
                    <a href="{{ $importers->previousPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Précédent</a>
                @endif
        
                <!-- Pagination Numbers -->
                @php
                    $currentPage = $importers->currentPage();
                    $lastPage = $importers->lastPage();
                @endphp
        
                @if ($lastPage > 5)
                    <!-- First Page -->
                    <a href="{{ $importers->url(1) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">1</a>
                    
                    @if ($currentPage > 3)
                        <span class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300">...</span>
                    @endif
        
                    <!-- Pages near current page -->
                    @foreach (range(max(2, $currentPage - 1), min($lastPage - 1, $currentPage + 1)) as $page)
                        @if ($page == $currentPage)
                            <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">{{ $page }}</button>
                        @else
                            <a href="{{ $importers->url($page) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $page }}</a>
                        @endif
                    @endforeach
        
                    @if ($currentPage < $lastPage - 2)
                        <span class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300">...</span>
                    @endif
        
                    <!-- Last Page -->
                    <a href="{{ $importers->url($lastPage) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $lastPage }}</a>
                @else
                    <!-- If there are only a few pages, show them all -->
                    @foreach (range(1, $lastPage) as $page)
                        @if ($page == $currentPage)
                            <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">{{ $page }}</button>
                        @else
                            <a href="{{ $importers->url($page) }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
        
                <!-- Next Page Button -->
                @if ($importers->hasMorePages())
                    <a href="{{ $importers->nextPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Suivant</a>
                @else
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Suivant</button>
                @endif
            </div>
        </div>
        
    </div>
</div>
@endsection