<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Modifier l'Utilisateur</title>
</head>
<body class="bg-gray-900 text-gray-200 flex items-center justify-center min-h-screen">
    <main class="w-full max-w-5xl p-6 bg-gray-900">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Modifier l'Utilisateur</h1>
            <p class="mt-2 text-gray-400">Mettez à jour les informations de l'utilisateur</p>
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg mb-8">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-8 mb-6">
                    <div class="space-y-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Nom Et Prénom<span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email<span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-400 mb-1">Mot de Passe (laisser vide si inchangé)</label>
                            <input type="password" id="password" name="password" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white">
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-400 mb-1">Rôle<span class="text-red-500">*</span></label>
                            <select id="role" name="role" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="importateur" {{ $user->role === 'importateur' ? 'selected' : '' }}>Importateur</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('users.index') }}">
                        <button type="button" class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition duration-300">
                            Annuler
                        </button>
                    </a>
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Mettre à Jour
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
