@extends('layouts.app')

@section('content')
<h2>Inscription</h2>
<<style>
/* Styles SPÉCIFIQUES pour le formulaire d'inscription - Ne modifie pas le layout global */
h2 {
    text-align: center;
    color: #2c3e50;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #3498db;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #eaeaea;
}

.form-groupe {
    margin-bottom: 25px;
}

.form-groupe label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #34495e;
    font-size: 15px;
}

.form-groupe input,
.form-groupe select {
    width: 100%;
    padding: 12px 16px;
    font-size: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.form-groupe input:focus,
.form-groupe select:focus {
    outline: none;
    border-color: #3498db;
    background-color: #fff;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-groupe input:hover,
.form-groupe select:hover {
    border-color: #bdc3c7;
}

/* Styles pour les messages d'erreur */
.form-groupe small {
    display: block;
    margin-top: 6px;
    font-size: 13px;
    font-weight: 500;
}

small[style*="color:red"] {
    color: #e74c3c !important;
}

/* Style pour le bouton de soumission */
button[type="submit"] {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

button[type="submit"]:hover {
    background: linear-gradient(135deg, #2980b9, #1c6ea4);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

button[type="submit"]:active {
    transform: translateY(0);
}

/* Style spécifique pour le select */
select {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2334495e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 16px;
    padding-right: 40px;
    cursor: pointer;
}

/* Responsive - seulement pour le formulaire */
@media (max-width: 768px) {
    form {
        padding: 30px 20px;
    }
    
    h2 {
        font-size: 24px;
        margin-bottom: 25px;
    }
}

@media (max-width: 480px) {
    form {
        padding: 25px 15px;
    }
    
    h2 {
        font-size: 22px;
    }
    
    .form-groupe input,
    .form-groupe select {
        padding: 10px 14px;
        font-size: 14px;
    }
    
    button[type="submit"] {
        padding: 12px;
        font-size: 15px;
    }
}
</style>
<form method="post" action="{{ route('register') }}">
    @csrf

    <div class="form-groupe">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" value="{{ old('nom') }}">
        @error('nom') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div class="form-groupe">
        <label for="prenom">Prénom</label>
        <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}">
    </div>

    <div class="form-groupe">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">
        @error('email') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div class="form-groupe">
        <label for="telephone">Téléphone</label>
        <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}">
        @error('telephone') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div class="form-groupe">
        <label for="role">Rôle</label>
        <select id="role" name="role">
            <option value="client" @selected(old('role')==='client')>Client</option>
            <option value="prestataire" @selected(old('role')==='prestataire')>Prestataire</option>
        </select>
        @error('role') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div class="form-groupe">
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password">
        @error('password') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div class="form-groupe">
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
    </div>

    <button type="submit">S’inscrire</button>
</form>

<div style="margin-top:1.5rem;">
                          <a href="{{ route('Home') }}">
                              <button> Retour à l'accueil</button>
                          </a>
                     </div>
                </div>
@endsection
