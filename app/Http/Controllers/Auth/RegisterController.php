<?php

// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegister()
    {
        return view('auth.register');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        // Validation des champs
        $data = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string|unique:users,telephone',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:client,prestataire'
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'] ?? null,
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        // Connexion automatique après inscription
        Auth::login($user);

        // Redirection selon rôle
        return $user->role === 'prestataire'
            ? redirect('/dashboard/prestataire')
            : redirect('/dashboard/client');
    }
}