<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Modifier la Bascule</title>
</head>
<body class="bg-gray-900 text-gray-200 flex items-center justify-center min-h-screen">
<main class="w-full max-w-5xl p-6 bg-gray-900">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Modifier la Bascule</h1>
        <p class="mt-2 text-gray-400">Mettez à jour les informations de la bascule</p>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg mb-8">
        <form method="POST" action="{{ route('bascules.update', $bascule->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-8 mb-6">
                <div class="space-y-5">
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-400 mb-1">Modèle <span class="text-red-500">*</span></label>
                        <input type="text" id="model" name="model" value="{{ old('model', $bascule->model) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="serial_number" class="block text-sm font-medium text-gray-400 mb-1">Numéro de Série <span class="text-red-500">*</span></label>
                        <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number', $bascule->serial_number) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="characteristics" class="block text-sm font-medium text-gray-400 mb-1">Caractéristiques <span class="text-red-500">*</span></label>
                        <textarea id="characteristics" name="characteristics" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>{{ old('characteristics', $bascule->characteristics) }}</textarea>
                    </div>

                    <div>
                        <label for="acquisition_date" class="block text-sm font-medium text-gray-400 mb-1">Date d'Acquisition <span class="text-red-500">*</span></label>
                        <input type="date" id="acquisition_date" name="acquisition_date" value="{{ old('acquisition_date', $bascule->acquisition_date) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="client_id" class="block text-sm font-medium text-gray-400 mb-1">Client (optionnel)</label>
                        <select id="client_id" name="client_id" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white">
                            <option value="">Aucun client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ $bascule->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->contact_last_name }} {{ $client->contact_first_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="/bascules">
                    <button type="button" class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600">
                        Annuler
                    </button>
                </a>
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
