<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- <title>Services Métrologiques - Tableau de Bord</title> --}}
<title>{{ config('app.name', 'Services Métrologiques - Tableau de Bord') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-900 font-sans text-gray-300">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-68 flex-shrink-0 hidden md:block">
        <div class="flex items-center justify-center h-16 border-b border-gray-700">
            <a href="{{route('dashboard')}}">
                <img src="{{ asset('/sidime.png') }}" alt="logo">
            </a>
        </div>
        <nav class="mt-5">
            <div class="px-4">
            <a href="{{route('dashboard')}}">
                <div class="flex items-center px-4 py-3 bg-gray-800 hover:bg-gray-700 hover:text-white text-gray-300 rounded-md cursor-pointer mb-1">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Tableau de Bord</span>
                </div>
            </a>
            <a href="{{route('clients.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-users mr-3"></i>
                    Gestion des Clients
                </div>
            </a>
            <a href="{{route('importers.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-building mr-3"></i>
                    <span>Gestion des Importateurs</span>
                </div>
            </a>
            <a href="{{route('bascules.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-balance-scale mr-3"></i>
                    <span>Gestion des Balances</span>
                </div>
            </a>
            <a href="{{route('revisions.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-clipboard-check mr-3"></i>
                    <span>Révisions Métrologiques</span>
                    
                </div>
            </a> 
            <a href="{{route('penalities.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-exclamation-triangle mr-3"></i>
                    <span>Pénalités & Suivi</span>
                </div>
            </a>   
            <a href="{{route('users.index')}}">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-user-shield mr-3"></i>
                    <span>Gestion des Utilisateurs</span>
                </div>
            </a>
            <a href="/export">
                <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                    <i class="fas fa-file-export mr-3"></i>
                    <span>Exportation de Données</span>
                </div>
            </a>
            <a href="/profile" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md mb-1">
                <i class="fas fa-user-cog mr-3"></i>
                <span>Paramètres du Profil</span>
            </a>
            
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="cursor-pointer">
                        Déconnexion
                    </button>
                </form>
            </div>
            </div>
        </nav>
    </div>

    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Header -->
        <header class="bg-gray-800 shadow-sm z-10">
            <div class="flex items-center justify-end h-16 px-6">
                {{-- <div class="bg-green-900 border border-green-400 text-green-100 px-4 py-3 mt-[200px] rounded relative max-w-md w-full shadow-md" role="alert">
                    <div class="flex items-center">
                        <!-- Checkmark Icon -->
                        <div class="mr-3">
                            <svg class="h-6 w-6 text-green-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1">
                            <p class="font-bold">Success!</p>
                            <p class="text-sm">Your action has been completed successfully.</p>
                        </div>
                        
                        <!-- Close Button -->
                        <button type="button" class="ml-auto" onclick="this.parentElement.parentElement.remove()">
                            <svg class="h-4 w-4 text-green-500 hover:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div> --}}
                <div class="flex items-center">
                    <div class="relative">
                        <a href="{{route('profile.edit')}}">
                            <button class="flex items-center px-3 py-1.5 rounded-md bg-gray-800 text-gray-300 hover:bg-gray-700  transition-colors focus:outline-none focus:ring-1 focus:ring-gray-600">
                                <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ substr(Auth::user()->name, 1,99) }} </span>
                                <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold ms-[10px] ">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            </button>
                        </a>
                    </div>
                </div>
                
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto bg-gray-900 p-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>