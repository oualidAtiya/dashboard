<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bascule;
use App\Models\Importateur;
class ImportateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $importers = Importateur::select('id', 'company_name', 'contact_last_name', 'contact_first_name','phone' , 'email' , 'address');
        $importers = Importateur::paginate(10);
        $importersNumber = Importateur::count();
        $basculesNumber = Bascule::count();
        $recentImporters = Importateur::where('created_at', '>=', now()->subDays(30))->count();
        return view('importers.index' , compact(['importersNumber' , 'basculesNumber' , 'recentImporters' , 'importers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('importers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:importateurs,email',
            'address' => 'required|string|max:255',
        ]);
    
        Importateur::create($validated);
    
        return redirect('/importers');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $importer = Importateur::findOrFail($id);
        return view('importers.edit', compact('importer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'contact_last_name' => 'required',
            'contact_first_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
    
        $importer = Importateur::findOrFail($id);
        $importer->update($request->all());
    
        return redirect('/importers')->with('success', 'Importateur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $importer = Importateur::findOrFail($id);
        $importer->delete();
        return redirect('/importers');
    }
}
