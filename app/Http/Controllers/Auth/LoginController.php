<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLogin()
    {
        return view('auth.login');
    }

    // Traite la connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            return match ($role) {
                'admin' => redirect('/dashboard/admin'),
                'prestataire' => redirect('/dashboard/prestataire'),
                default => redirect('/dashboard/client'),
            };
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides.'
        ])->withInput();
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
