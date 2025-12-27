<?php

// app/Http/Controllers/Auth/PasswordController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showReset()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::where('email', $data['email'])->first();
        $user->update(['password' => Hash::make($data['password'])]);

        return redirect('/connexion')->with('status', 'Mot de passe mis à jour.');
    }
}
