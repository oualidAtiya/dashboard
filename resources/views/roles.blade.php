<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection de Rôle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 min-h-screen flex items-center justify-center p-4 md:p-8">
    <div class="w-full max-w-4xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-indigo-400 mb-2">Bienvenue</h1>
            <p class="text-gray-400">Veuillez sélectionner votre rôle pour continuer</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Importateur Card -->
            <a href="/login/importateur" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg border border-gray-700 hover:border-indigo-500 transition duration-300 transform hover:-translate-y-1 cursor-pointer">
                <div class="bg-gray-700 p-5 border-b border-gray-600">
                    <h2 class="text-2xl font-bold text-indigo-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Importateur
                    </h2>
                </div>
                
                <div class="p-6 text-center">
                    <div class="mx-auto w-24 h-24 mb-6 rounded-full bg-indigo-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    
                    <p class="text-gray-300 mb-6">Connectez-vous en tant qu'importateur pour gérer vos importations et accéder aux fonctionnalités spécifiques.</p>
                    
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-md transition duration-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Continuer en tant qu'Importateur
                    </button>
                </div>
            </a>

            <!-- Admin Card -->
            <a href="/login/admin" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg border border-gray-700 hover:border-indigo-500 transition duration-300 transform hover:-translate-y-1 cursor-pointer">
                <div class="bg-gray-700 p-5 border-b border-gray-600">
                    <h2 class="text-2xl font-bold text-indigo-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Administrateur
                    </h2>
                </div>
                
                <div class="p-6 text-center">
                    <div class="mx-auto w-24 h-24 mb-6 rounded-full bg-purple-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    
                    <p class="text-gray-300 mb-6">Connectez-vous en tant qu'administrateur pour gérer les utilisateurs et accéder au panneau d'administration.</p>
                    
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-4 rounded-md transition duration-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Continuer en tant qu'Administrateur
                    </button>
                </div>
            </a>
        </div>
        
        <div class="mt-12 text-center text-gray-500 text-sm">
            <p>© 2025 Sidime. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>