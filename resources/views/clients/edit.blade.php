@extends('layouts.forms')
@section('title' , 'Modifier le Client')
@section('form')
<main class="w-full max-w-5xl p-6 bg-gray-900">
    <!-- Page Title -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Modifier le Client</h1>
        <p class="mt-2 text-gray-400">Mettez à jour les informations du client</p>
    </div>

    <!-- Form Container -->
    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg mb-8">
        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-6">
                <div class="space-y-5">
                    <div>
                        <label for="contact_last_name" class="block text-sm font-medium text-gray-400 mb-1">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="contact_last_name" name="contact_last_name" value="{{ old('contact_last_name', $client->contact_last_name) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="contact_first_name" class="block text-sm font-medium text-gray-400 mb-1">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="contact_first_name" name="contact_first_name" value="{{ old('contact_first_name', $client->contact_first_name) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-400 mb-1">Téléphone <span class="text-red-500">*</span></label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email', $client->email) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-400 mb-1">Adresse <span class="text-red-500">*</span></label>
                        <input type="text" id="address" name="address" value="{{ old('address', $client->address) }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white" required>
                    </div>

                    <div>
                        <label for="importateur_id" class="block text-sm font-medium text-gray-400 mb-1">Type d'Entreprise</label>
                        <select id="importateur_id" name="importateur_id" class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-3 text-white">
                            <option value="">Sélectionnez un type</option>
                            @foreach ($importers as $importer)
                                <option value="{{ $importer->id }}" {{ $client->importateur_id == $importer->id ? 'selected' : '' }}>
                                    {{ $importer->company_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="/clients">
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
@endsection