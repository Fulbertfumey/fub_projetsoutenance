<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col font-sans antialiased">
    <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand/Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('Home') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">
                   MikiMultiService
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('Home') }}" class="text-sm font-medium hover:text-blue-600 transition">Accueil</a>
                <a href="{{ route('offers.index') }}" class="text-sm font-medium hover:text-blue-600 transition">Offres</a>
                <a href="{{ route('about') }}" class="text-sm font-medium hover:text-blue-600 transition">À propos</a>
                <a href="{{ route('contact') }}" class="text-sm font-medium hover:text-blue-600 transition">Contact</a>
            </div>

            <!-- Auth Actions -->
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                        Inscription
                    </a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-700 transition focus:outline-none">
                            Déconnexion
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <main class="flex-grow w-full">
        @yield('content')
    </main>

   <footer class="bg-white border-t border-gray-200 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Grille Principale -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <!-- Colonne 1 : Brand & Bio -->
            <div class="space-y-6">
                <a href="/" class="text-2xl font-black text-blue-600 tracking-tight">
                    MikiMultiService<span class="text-gray-900">.</span>
                </a>
                <p class="text-gray-500 leading-relaxed">
                    La première plateforme multiservices qui simplifie la mise en relation entre professionnels qualifiés et clients exigeants.
                </p>
                <!-- Réseaux Sociaux -->
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition-all">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-blue-400 hover:text-white transition-all">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-pink-600 hover:text-white transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-blue-800 hover:text-white transition-all">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Colonne 2 : Navigation -->
            <div>
                <h4 class="text-gray-900 font-bold uppercase tracking-wider text-sm mb-6">Plateforme</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('offers.index') }}" class="text-gray-500 hover:text-blue-600 transition">Parcourir les offres</a></li>
                    <li><a href="{{ route('promotions.subscribe') }}" class="text-gray-500 hover:text-blue-600 transition">Plans de promotion</a></li>
                    <li><a href="{{ route('ads.index') }}" class="text-gray-500 hover:text-blue-600 transition">Publicités</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-blue-600 transition">Comment ça marche ?</a></li>
                </ul>
            </div>

            <!-- Colonne 3 : Support & Légal -->
            <div>
                <h4 class="text-gray-900 font-bold uppercase tracking-wider text-sm mb-6">Assistance</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-500 hover:text-blue-600 transition">Centre d'aide</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-blue-600 transition">Conditions d'utilisation</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-blue-600 transition">Politique de confidentialité</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-blue-600 transition">Contactez-nous</a></li>
                </ul>
            </div>

            <!-- Colonne 4 : Newsletter -->
            <div>
                <h4 class="text-gray-900 font-bold uppercase tracking-wider text-sm mb-6">Restez informé</h4>
                <p class="text-sm text-gray-500 mb-4">Recevez les meilleures offres de services directement dans votre boîte mail.</p>
                <form class="flex flex-col gap-2">
                    <input type="email" placeholder="votre@email.com" class="px-4 py-3 bg-gray-100 border-transparent focus:bg-white focus:border-blue-600 focus:ring-0 rounded-xl transition text-sm">
                    <button type="submit" class="px-4 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">
                        S'abonner
                    </button>
                </form>
            </div>
        </div>

        <!-- Section Bas : Copyright -->
        <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} <span class="font-semibold text-gray-900">MikiMultiService</span>. Tous droits réservés.
            </p>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs uppercase tracking-widest font-bold">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    Système opérationnel
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>