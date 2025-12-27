@extends('layouts.app')

@section('content')
<style>
    /* Style pour le formulaire de réinitialisation de mot de passe */
    .password-reset-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 40px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #e8e8e8;
    }
    
    .password-reset-container h2 {
        text-align: center;
        color: #2c3e50;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f39c12;
    }
    
    .password-reset-container .form-groupe {
        margin-bottom: 24px;
    }
    
    .password-reset-container .form-groupe label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #34495e;
        font-size: 15px;
    }
    
    .password-reset-container .form-groupe input {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #f9fafb;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    
    .password-reset-container .form-groupe input:focus {
        outline: none;
        border-color: #f39c12;
        background: white;
        box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.1);
    }
    
    .password-reset-container .form-groupe input:hover {
        border-color: #bdc3c7;
    }
    
    .password-reset-container .form-groupe small {
        display: block;
        margin-top: 6px;
        font-size: 13px;
        font-weight: 500;
    }
    
    .password-reset-container .form-groupe small[style*="color:red"] {
        color: #e74c3c !important;
    }
    
    .password-reset-container button[type="submit"] {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    
    .password-reset-container button[type="submit"]:hover {
        background: linear-gradient(135deg, #e67e22, #d35400);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
    }
    
    .password-reset-container button[type="submit"]:active {
        transform: translateY(0);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .password-reset-container {
            padding: 30px 20px;
            margin: 30px 15px;
        }
        
        .password-reset-container h2 {
            font-size: 24px;
        }
    }
    
    @media (max-width: 480px) {
        .password-reset-container {
            padding: 25px 15px;
        }
        
        .password-reset-container h2 {
            font-size: 22px;
        }
        
        .password-reset-container .form-groupe input {
            padding: 10px 14px;
            font-size: 14px;
        }
        
        .password-reset-container button[type="submit"] {
            padding: 12px;
            font-size: 15px;
        }
    }
</style>

<div class="password-reset-container">
    <h2>Réinitialiser le mot de passe</h2>

    <form method="post" action="{{ route('password.reset') }}">
        @csrf

        <div class="form-groupe">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
            @error('email') <small style="color:red">{{ $message }}</small> @enderror
        </div>

        <div class="form-groupe">
            <label for="password">Nouveau mot de passe</label>
            <input id="password" type="password" name="password">
            @error('password') <small style="color:red">{{ $message }}</small> @enderror
        </div>

        <div class="form-groupe">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection