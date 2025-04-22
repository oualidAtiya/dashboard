@extends('layouts.dashboard')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-white">Gestion des Revisions</h1>
        <p class="text-gray-400">Gérez tous les Revisions enregistrés dans le système</p>
    </div>
    <a href="{{ route('clients.create') }}" >
        <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-2"></i> Ajouter une Revision
        </button>
    </a>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
<!-- Pending Revisions -->
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
        <div class="p-3 rounded-full bg-orange-900 text-white">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="ml-4">
            <h2 class="font-semibold text-gray-200">Révisions en Attente</h2>
            <p class="text-2xl font-bold text-white"> {{$pendingCount}} </p>
        </div>
        </div>
    </div>
    <!-- Pending Completed -->
    <div class="bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
        <div class="p-3 rounded-full bg-green-900 text-green-300">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="ml-4">
            <h2 class="font-semibold text-gray-200">Révisions Complete</h2>
            <p class="text-2xl font-bold text-white"> {{$completedCount}} </p>
        </div>
        </div>
    </div>
<!-- late Revisions -->
<div class="bg-gray-800 rounded-lg shadow p-4">
    <div class="flex items-center">
    <div class="p-3 rounded-full bg-red-900 text-red-300">
        <i class="fas fa-clipboard-check"></i>
    </div>
    <div class="ml-4">
        <h2 class="font-semibold text-gray-200">Révisions en Retard</h2>
        <p class="text-2xl font-bold text-white"> {{$lateCount}} </p>
    </div>
    </div>
</div>
</div>


{{-- Table --}}
<div class="bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-700">
        <h2 class="font-semibold text-lg text-white">Les Révisions</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Dernière Révision</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Prochaine Échéance</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Responsable</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rapport</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @foreach ($revisions as $revision)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"> {{$revision->id}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->last_revision_date}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->next_revision_date}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->verification_responsible}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($revision->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-900 text-orange-200"> {{$revision->status}} </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200"> {{$revision->status}} </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-400 hover:text-blue-300 mr-3">Voir</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{-- <a href="#" class="text-blue-400 hover:text-blue-300 mr-3"><i class="fas fa-eye"></i></a> --}}
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>                            
                        <form action="#" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->verification_report}}</td> --}}

                </tr> 
            @endforeach
            {{-- <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">SC-4471</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-200">Café Tanger</div>
                    <div class="text-sm text-gray-400">Tanger, Maroc</div>
                </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">01 avr. 2025</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">01 juil. 2025</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">Active</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="#" class="text-blue-400 hover:text-blue-300 mr-3">Voir</a>
                <a href="#" class="text-indigo-400 hover:text-indigo-300">Planifier</a>
            </td>
            </tr> --}}
        </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-700">
        {{-- <div class="flex items-center justify-between">
        <div class="text-sm text-gray-400">
            Affichage de 1 à 5 sur 35 entrées
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Précédent</button>
            <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">1</button>
            <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">2</button>
            <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">3</button>
            <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Suivant</button>
        </div>
        </div> --}}
        <div class="flex items-center justify-between">
            <!-- Style above the pagination links -->
            <div class="text-sm text-gray-400">
                Affichage de {{ $revisions->firstItem() }} à {{ $revisions->lastItem() }} sur {{ $revisions->total() }} entrées
            </div>
        
            <!-- Pagination buttons -->
            <div class="flex space-x-2">
                <!-- Previous Page Button -->
                @if ($revisions->onFirstPage())
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Précédent</button>
                @else
                    <a href="{{ $revisions->previousPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Précédent</a>
                @endif
                
                <!-- Pagination Numbers -->
                @foreach ($revisions->getUrlRange(1, $revisions->lastPage()) as $page => $url)
                    @if ($page == $revisions->currentPage())
                        <button class="px-3 py-1 border border-gray-600 bg-blue-700 text-white rounded-md text-sm hover:bg-blue-800">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">{{ $page }}</a>
                    @endif
                @endforeach
        
                <!-- Next Page Button -->
                @if ($revisions->hasMorePages())
                    <a href="{{ $revisions->nextPageUrl() }}" class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 hover:bg-gray-700">Suivant</a>
                @else
                    <button class="px-3 py-1 border border-gray-600 rounded-md text-sm text-gray-300 cursor-not-allowed" disabled>Suivant</button>
                @endif
            </div>
        </div>
        
    </div>
</div>
@endsection