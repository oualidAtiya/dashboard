<?php

namespace App\Http\Controllers;

use App\Models\Bascule;
use App\Models\Client;
use App\Models\Importateur;
use Illuminate\Http\Request;

class BasculeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bascules = Bascule::with(['client', 'importateur'])->paginate(10);
        $basculesNumber = Bascule::count();
        $recentBascules = Bascule::where('created_at', '>=', now()->subDays(30))->count();
        $clientsNumber = Client::count(); // To match with your ClientController logic
    
        return view('bascules.index', compact('bascules', 'basculesNumber', 'recentBascules', 'clientsNumber'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();

        return view('bascules.create' , compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:bascules',
            'characteristics' => 'required|string',
            'acquisition_date' => 'required|date',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        Bascule::create($validated);

        return redirect()->route('bascules.index')->with('success', 'Bascule created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $bascule = Bascule::with(['client', 'importateur'])->findOrFail($id);
        // return view('bascules.show', compact('bascule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bascule = Bascule::findOrFail($id);
        $clients = Client::all();

        return view('bascules.edit', compact('bascule', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:bascules,serial_number,' . $id,
            'characteristics' => 'required|string',
            'acquisition_date' => 'required|date',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $bascule = Bascule::findOrFail($id);
        $bascule->update($validated);

        return redirect()->route('bascules.index')->with('success', 'Bascule updated successfully!');
    }

    
    public function destroy($id)
{
    $bascule = Bascule::findOrFail($id);
    $bascule->delete();

    return redirect()->route('bascules.index')->with('success', 'Bascule deleted successfully!');
}

}
