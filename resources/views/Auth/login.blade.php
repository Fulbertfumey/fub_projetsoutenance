@extends('layouts.app')

@section('content')
<div class="auth-page auth-login-page">
    <div class="auth-card">
        <h2 class="auth-title">Connexion</h2>
        
        <form class="auth-form" method="post" action="{{ route('login') }}">
            @csrf
            
            <div class="auth-form-group">
                <label class="auth-label" for="email">Email</label>
                <input class="auth-input" id="email" type="email" name="email" value="{{ old('email') }}">
                @error('email') <small class="auth-error">{{ $message }}</small> @enderror
            </div>
            
            <div class="auth-form-group">
                <label class="auth-label" for="password">Mot de passe</label>
                <input class="auth-input" id="password" type="password" name="password">
                @error('password') <small class="auth-error">{{ $message }}</small> @enderror
            </div>
            
            <div class="auth-form-group auth-remember">
                <label class="auth-checkbox-label">
                    <input class="auth-checkbox" type="checkbox" name="remember"> 
                    <span>Se souvenir de moi</span>
                </label>
            </div>
            
            <button class="auth-submit-btn" type="submit">Se connecter</button>
            
            <div class="auth-links">
                <a class="auth-link" href="{{ route('password.reset') }}">Mot de passe oublié ?</a>
            </div>
        </form>
        <div style="margin-top:1.5rem;">
                          <a href="{{ route('Home') }}">
                              <button>⬅ Retour à l'accueil</button>
                          </a>
                     </div>
                </div>
    </div>

</div>

<style>
    /* Styles AUTH - très spécifiques */
    .auth-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
        padding: 20px;
    }
    
    .auth-card {
        width: 100%;
        max-width: 500px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 40px;
        border: 1px solid #e8e8e8;
    }
    
    .auth-title {
        text-align: center;
        color: #2c3e50;
        font-size: 28px;
        font-weight: 600;
        margin: 0 0 30px 0;
        padding-bottom: 15px;
        border-bottom: 2px solid #3498db;
    }
    
    .auth-form-group {
        margin-bottom: 24px;
    }
    
    .auth-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #34495e;
        font-size: 15px;
    }
    
    .auth-input {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #f9fafb;
        transition: all 0.2s;
    }
    
    .auth-input:focus {
        outline: none;
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
    }
    
    .auth-remember {
        display: flex;
        align-items: center;
    }
    
    .auth-checkbox-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 14px;
    }
    
    .auth-checkbox {
        margin-right: 8px;
        accent-color: #3498db;
    }
    
    .auth-error {
        display: block;
        margin-top: 6px;
        color: #dc2626;
        font-size: 13px;
        font-weight: 500;
    }
    
    .auth-submit-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
    }
    
    .auth-submit-btn:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16,185,129,0.3);
    }
    
    .auth-links {
        text-align: center;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }
    
    .auth-link {
        color: #3498db;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.2s;
    }
    
    .auth-link:hover {
        color: #2563eb;
        text-decoration: underline;
    }
    
    @media (max-width: 640px) {
        .auth-card {
            padding: 30px 20px;
            margin: 0 10px;
        }
        
        .auth-title {
            font-size: 24px;
        }
        
        .auth-input {
            padding: 10px 14px;
        }
        
        .auth-submit-btn {
            padding: 12px;
        }
    }
</style>
@endsection