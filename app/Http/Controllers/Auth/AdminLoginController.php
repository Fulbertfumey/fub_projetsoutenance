<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Vérifier uniquement les comptes avec rôle admin
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('dashboard.admin');
        }

        return back()->withErrors(['email' => 'Accès refusé.']);
    }
}
