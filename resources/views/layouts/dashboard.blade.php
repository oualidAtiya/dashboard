<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- <title>Services Métrologiques - Tableau de Bord</title> --}}
<title>{{ config('app.name', 'Services Métrologiques - Tableau de Bord') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-900 font-sans text-gray-300">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-68 flex-shrink-0 hidden md:block">
        <div class="flex items-center justify-center h-16 border-b border-gray-700">
            <a href="/dashboard">
                <img src="{{ asset('/sidime.png') }}" alt="logo">
            </a>
        </div>
        <nav class="mt-5">
            <div class="px-4">
            <div class="flex items-center px-4 py-3 bg-gray-800 text-gray-300 rounded-md cursor-pointer mb-1">
                <i class="fas fa-tachometer-alt mr-3"></i>
                {{-- <span></span> --}}
                <a href="/dashboard">Tableau de Bord</a>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-users mr-3"></i>
                <span>Gestion des Clients</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-building mr-3"></i>
                {{-- <span></span> --}}
                <a href="/importers">Gestion des Importateurs</a>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-balance-scale mr-3"></i>
                <span>Gestion des Balances</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-clipboard-check mr-3"></i>
                <span>Révisions Métrologiques</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-exclamation-triangle mr-3"></i>
                <span>Pénalités & Suivi</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-user-shield mr-3"></i>
                <span>Gestion des Utilisateurs</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-file-export mr-3"></i>
                {{-- <span>Exportation de Données</span> --}}
                <a href="/export">Exportation de Données</a>
            </div>
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
            <div class="flex items-center justify-between h-16 px-6">
            <div class="flex items-center">
                <button class="text-gray-300 focus:outline-none md:hidden">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="relative w-64 ml-4 md:ml-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <input class="block w-full pl-10 pr-3 py-2 rounded-md text-sm bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-blue-500" placeholder="Rechercher...">
                </div>
            </div>
            <div class="flex items-center">
                <div class="relative">
                    <button class="flex items-center text-gray-300 focus:outline-none">
                        <span class="ml-2"> Oualid Atiya </span>
                    </button>
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