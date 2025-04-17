<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->route('users.index');
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
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // You forgot this line
    
        // Validate the data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Removed "confirmed"
            'role' => 'required|in:admin,importateur',
        ]);
    
        // Update fields
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
    
        $user->role = $request->role;
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        if ($user->role === 'admin') {
            $adminCount = User::where('role', 'admin')->count();
                if ($adminCount <= 1) {
                return redirect()->route('users.index')->with('error', 'Il doit toujours y avoir au moins un administrateur.');
                }
            }
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
    
}
