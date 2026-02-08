@extends('layouts.app')

@section('content')
<style>
/* RESET pour le container admin */
.container {
    background: linear-gradient(145deg, #1e1b2e, #231f3a);
    border-radius: 15px;
    padding: 40px 35px;
    margin: 50px auto;
    max-width: 450px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Titre */
.container h2 {
    color: white;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 35px;
    font-weight: 700;
}

/* Animation du cadenas */
.container h2::before {
    content: "🔐";
    display: inline-block;
    margin-right: 12px;
    animation: lockAnimation 2s infinite;
}

@keyframes lockAnimation {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-8deg); }
    75% { transform: rotate(8deg); }
}

/* Labels */
.container label {
    color: #e0e0e0;
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
    font-size: 0.95rem;
}

/* Champs de formulaire */
.container .form-control {
    width: 95%;
    padding: 14px 16px;
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    color: white;
    font-size: 1rem;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.container .form-control:focus {
    outline: none;
    border-color: #dc3545;
    box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.2);
    transform: translateY(-3px);
}

/* Bouton */
.container .btn-danger {
    width: 100%;
    padding: 16px;
    background: linear-gradient(to right, #dc3545, #c82333);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
    position: relative;
    overflow: hidden;
}

.container .btn-danger:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(220, 53, 69, 0.4);
    background: linear-gradient(to right, #c82333, #b21f2d);
}

.container .btn-danger:active {
    transform: translateY(-2px);
}

/* Effet de vague sur le bouton */
.container .btn-danger::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.6s;
}

.container .btn-danger:hover::before {
    left: 100%;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 30px 25px;
        margin: 30px 20px;
        max-width: 100%;
    }
    
    .container h2 {
        font-size: 1.8rem;
    }
}
</style>
<div class="container">
    <h2> Connexion Admin</h2>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Se connecter</button>
    </form>
</div>
@endsection
