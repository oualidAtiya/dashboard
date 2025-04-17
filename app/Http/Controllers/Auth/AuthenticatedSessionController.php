<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        // Store the selected role in the session for later use
        // This stores the selected 'role' from the query string into the session.
        $role = $request->query('role'); // Get the role from the query string
        session(['role' => $role]);
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // First, authenticate the user
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])
                    ->where('role', session('role'))  // Check for the role in the same query
                    ->first();  // Find the user matching email and role
    
        // Check if the user exists and the password is correct
        if (!$user || !Auth::attempt($credentials)) {
            // If no user is found or the credentials are wrong, return an error
            return back()->withErrors([
                'email' => 'Les informations d\'identification sont incorrectes.',
            ]);
        }
    
        // Authenticate the user successfully
        Auth::login($user);
    
        // Regenerate the session to prevent session fixation
        $request->session()->regenerate();
    
        // Redirect based on the role
        if ($user->role == 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } elseif ($user->role == 'importateur') {
            return redirect()->intended(route('importer.dashboard', absolute: false));
        }
    
        // If no matching role found, redirect to the roles page
        return redirect()->route('roles');
    }
    
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout the user from the current session
        Auth::guard('web')->logout();

        // Invalidate the session to clear all data
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent cross-site request forgery (CSRF) attacks
        $request->session()->regenerateToken();

        // Redirect to the home page after logging out
        return redirect('/');
    }
}
