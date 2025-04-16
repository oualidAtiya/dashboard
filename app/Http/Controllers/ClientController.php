<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Importateur;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('bascules')->paginate(10);
        $clientsNumber = Client::count();
        $basculesNumber = Client::count();
        $recentClients = Client::where('created_at', '>=', now()->subDays(30))->count();
        return view('clients.index' , compact(['clientsNumber' , 'basculesNumber' , 'recentClients' , 'clients']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $importers = Importateur::all();
        return view('clients.create', compact('importers'));
    }




    public function store(Request $request)
{
    $validated = $request->validate([
        'contact_last_name' => 'required|string|max:255',
        'contact_first_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'importateur_id' => 'required|exists:importateurs,id',
    ]);

    Client::create($validated);

    return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès !');
}


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $importers = Importateur::all();
    
        return view('clients.edit', compact('client', 'importers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_last_name' => 'required|string|max:255',
            'contact_first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'importateur_id' => 'nullable|exists:importateurs,id',
        ]);
    
        $client = Client::findOrFail($id);
    
        $client->update([
            'contact_last_name' => $request->contact_last_name,
            'contact_first_name' => $request->contact_first_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'importateur_id' => $request->importateur_id,
        ]);
    
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/clients');
    }
}
