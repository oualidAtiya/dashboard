@extends('layouts.dashboard')
@section('content')
<h1 class="text-2xl font-semibold text-white">Tableau de Bord</h1>
<p class="text-gray-400 mb-6">Bienvenue, {{ Auth::user()->name }} !</p>            
<!-- Four Cards for Key Metrics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
<!-- Total Clients -->
<div class="bg-gray-800 rounded-lg shadow p-4">
    <div class="flex items-center">
    <div class="p-3 rounded-full bg-blue-900 text-blue-300">
        <i class="fas fa-users"></i>
    </div>
    <div class="ml-4">
        <h2 class="font-semibold text-gray-200">Total Clients</h2>
        <p class="text-2xl font-bold text-white"> {{$clientNumber}} </p>
    </div>
    </div>
</div>

<!-- Total Importers -->
{{-- @if(Auth::user()->role=== 'admin') --}}
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
{{-- @endif --}}

<!-- Total Scales -->
<div class="bg-gray-800 rounded-lg shadow p-4">
    <div class="flex items-center">
    <div class="p-3 rounded-full bg-indigo-900 text-indigo-300">
        <i class="fas fa-balance-scale"></i>
    </div>
    <div class="ml-4">
        <h2 class="font-semibold text-gray-200">Total Balances</h2>
        <p class="text-2xl font-bold text-white"> {{$basculesNumber}} </p>
    </div>
    </div>
</div>

<!-- Pending Revisions -->
<div class="bg-gray-800 rounded-lg shadow p-4">
    <div class="flex items-center">
    <div class="p-3 rounded-full bg-red-900 text-red-300">
        <i class="fas fa-clipboard-check"></i>
    </div>
    <div class="ml-4">
        <h2 class="font-semibold text-gray-200">Révisions en Attente</h2>
        <p class="text-2xl font-bold text-white"> {{$pendingCount}} </p>
    </div>
    </div>
</div>
</div>

<div class="mt-8 dark:bg-gray-800 bg-white rounded-lg shadow overflow-hidden mb-[30px]">
    <div class="px-6 py-4 border-b dark:border-gray-700 border-gray-200">
        <h3 class="text-lg font-medium dark:text-white text-gray-800">Actions Rapides</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="{{route('clients.create')}}" class="flex items-center justify-center py-3 px-4 rounded-lg dark:bg-blue-900 bg-blue-100 dark:text-blue-300 text-blue-600 hover:bg-blue-200 dark:hover:bg-blue-800">
                <i class="fas fa-user-plus mr-2"></i>
                <span>Ajouter un Client</span>
            </a>
            <a href="{{route('bascules.create')}}" class="flex items-center justify-center py-3 px-4 rounded-lg dark:bg-green-900 bg-green-100 dark:text-green-300 text-green-600 hover:bg-green-200 dark:hover:bg-green-800">
                <i class="fas fa-balance-scale-right mr-2"></i>
                <span>Ajouter une Bascule</span>
            </a>
            <a href="{{route('revisions.index')}}" class="flex items-center justify-center py-3 px-4 rounded-lg dark:bg-purple-900 bg-purple-100 dark:text-purple-300 text-purple-600 hover:bg-purple-200 dark:hover:bg-purple-800">
                <i class="fas fa-clipboard-list mr-2"></i>
                <span>Manage Revisions</span>
            </a>
            <a href="{{route('export.index')}}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                <i class="fas fa-file-export mr-2"></i>
                <span>Exporter les Rapports</span>
            </a>
        </div>
    </div>
</div>


<!-- Recent Revisions Table -->
<div class="bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-700">
        <h2 class="font-semibold text-lg text-white">Révisions Récentes</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-700">
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID Balance</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Dernière Révision</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Prochaine Échéance</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Statut</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @foreach ($revisions as $revision)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"> {{$revision->id}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->last_revision_date}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$revision->next_revision_date}}</td>
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

<!-- Three Column Section -->
{{-- <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <!-- Upcoming Tasks/Notifications -->
        <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 bg-gray-700">
            <h2 class="font-semibold text-lg text-white">Tâches à Venir</h2>
            </div>
            <div class="p-4">
            <div class="mb-4 pb-4 border-b border-gray-700">
                <div class="flex items-center justify-between mb-2">
                <span class="font-medium text-red-400">Révisions en Retard</span>
                <span class="text-sm bg-red-900 text-red-200 px-2 py-1 rounded-full">12</span>
                </div>
                <p class="text-sm text-gray-400">12 balances nécessitent une attention immédiate</p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-700">
                <div class="flex items-center justify-between mb-2">
                <span class="font-medium text-yellow-400">Révisions à Venir</span>
                <span class="text-sm bg-yellow-900 text-yellow-200 px-2 py-1 rounded-full">23</span>
                </div>
                <p class="text-sm text-gray-400">À effectuer dans les 30 prochains jours</p>
            </div>
            <div class="mb-4">
                <div class="flex items-center justify-between mb-2">
                <span class="font-medium text-green-400">Nouveaux Clients</span>
                <span class="text-sm bg-green-900 text-green-200 px-2 py-1 rounded-full">5</span>
                </div>
                <p class="text-sm text-gray-400">Ajoutés au cours des 7 derniers jours</p>
            </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 bg-gray-700">
            <h2 class="font-semibold text-lg text-white">Activité Récente</h2>
            </div>
            <div class="p-4">
            <div class="mb-4 pb-4 border-b border-gray-700">
                <div class="flex items-center mb-2">
                <i class="fas fa-user-plus text-blue-400 mr-2"></i>
                <span class="font-medium text-gray-200">Café Marrakech ajouté comme client</span>
                </div>
                <p class="text-sm text-gray-400">Ajouté par Ahmed le 14 avr. 2025</p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-700">
                <div class="flex items-center mb-2">
                <i class="fas fa-sync text-green-400 mr-2"></i>
                <span class="font-medium text-gray-200">Révision de la balance #M452 terminée</span>
                </div>
                <p class="text-sm text-gray-400">Mise à jour par Youssef le 13 avr. 2025</p>
            </div>
            <div class="mb-4">
                <div class="flex items-center mb-2">
                <i class="fas fa-plus-circle text-indigo-400 mr-2"></i>
                <span class="font-medium text-gray-200">Nouvelle balance ajoutée pour Restaurant Fez</span>
                </div>
                <p class="text-sm text-gray-400">Ajoutée par Laila le 12 avr. 2025</p>
            </div>
            </div>
        </div>
    
    <!-- Quick Actions -->
        <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 bg-gray-700">
            <h2 class="font-semibold text-lg text-white">Actions Rapides</h2>
            </div>
            <div class="p-4 flex flex-col space-y-4">
            <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i> Ajouter un Nouveau Client
            </button>
            <button class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                <i class="fas fa-plus-circle mr-2"></i> Ajouter une Nouvelle Balance
            </button>
            <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                <i class="fas fa-clipboard-check mr-2"></i> Gérer les Révisions
            </button>
            <button class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                <i class="fas fa-file-export mr-2"></i> Exporter les Rapports
            </button>
            </div>
        </div>
    </div> --}}

@endsection