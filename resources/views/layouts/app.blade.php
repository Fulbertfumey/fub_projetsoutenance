<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css">

    <!-- Style inspiré du template MikiMultiservice -->
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #1f1f1f;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        nav a {
            color: white;
            margin-left: 1rem;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* SUPPRIMER ou MODIFIER cette classe pour les pages pleine largeur */
        .container {
            max-width: none;  /* Changé de 1000px à none */
            margin: 0;        /* Changé de 2rem auto à 0 */
            padding: 0;       /* Changé de 2rem à 0 */
            border-radius: 0; /* Changé de 8px à 0 */
            box-shadow: none; /* Supprimé l'ombre */
            background: none; /* Supprimé le fond blanc */
        }

        /* Créer une classe spéciale pour les pages normales */
        .content-container {
            max-width: 1000px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        h2, h3 {
            color: #1f1f1f;
        }

        button {
            background-color: #1f1f1f;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            margin: 0.5rem;
        }

        button:hover {
            background-color: #333;
        }

        footer {
            background-color: #1f1f1f;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 3rem;
        }

        ul {
            padding-left: 1.5rem;
        }

        a.button-link {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>{{ config('app.name') }}</h1>
        <nav>
            <a href="{{ route('Home') }}">Accueil</a>
            <a href="{{ route('offers.index') }}">Offres</a>
            <a href="{{ route('about') }}">À propos</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
           

        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} MultiService Pro. Tous droits réservés.</p>
    </footer>
</body>
</html>