@extends('layouts.app')

@section('content')


<div class="home-container">
    <!-- Section Hero - Pleine largeur -->
<!-- Section Hero avec Image de Fond -->
<section class="relative h-[500px] md:h-[600px] flex items-center justify-center overflow-hidden">
    <!-- Image de fond -->
    <div class="absolute inset-0 z-0">
        <img 
            src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
            alt="Background" 
            class="w-full h-full object-cover"
        />
        <!-- Overlay sombre pour la lisibilité (Gradient de noir) -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40"></div>
    </div>

    <!-- Contenu Texte -->
    <div class="relative z-10 flex flex-col items-center text-center px-6 max-w-5xl mx-auto">
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-semibold tracking-widest text-blue-400 uppercase bg-blue-400/10 rounded-full">
            Solution Multi-Services
        </span>
        
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
            Bienvenue sur <span class="text-blue-500">MikiMultiService</span>
        </h1>
        
        <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl leading-relaxed">
            La plateforme d'excellence qui connecte intelligemment <span class="text-white font-medium">clients, prestataires et administrateurs</span> pour transformer vos besoins en solutions concrètes.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <a href="{{ route('offers.index') }}" class="group flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-600/30 hover:bg-blue-700 transition-all duration-300 hover:-translate-y-1">
                <i class="fa-solid fa-magnifying-glass mr-2 group-hover:scale-110 transition-transform"></i>
                Parcourir les offres
            </a>
            
            <a href="{{ route('register') }}" class="flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                <i class="fa-solid fa-user-plus mr-2"></i>
                Créer un compte
            </a>
        </div>

        <!-- Petite preuve sociale optionnelle -->
        <div class="mt-12 flex items-center gap-4 text-sm text-gray-400">
            <div class="flex -space-x-2">
                <img class="w-8 h-8 rounded-full border-2 border-gray-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+1&bg=0284c7&color=fff" alt="">
                <img class="w-8 h-8 rounded-full border-2 border-gray-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+2&bg=4f46e5&color=fff" alt="">
                <img class="w-8 h-8 rounded-full border-2 border-gray-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+3&bg=059669&color=fff" alt="">
            </div>
            <p>Rejoint par +1,000 utilisateurs satisfaits</p>
        </div>
    </div>
</section>


    
    <!-- Section Promotion - Pleine largeur -->
    <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- En-tête de section -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl mb-6 shadow-sm">
                <i class="fa-solid fa-megaphone text-2xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                Promouvoir votre marque
            </h2>
            <p class="text-lg text-gray-600">
                Augmentez votre visibilité grâce à nos plans de promotion adaptés à tous les budgets.
                Mettez en avant vos services auprès des clients les plus actifs.
            </p>
        </div>

        <!-- Grille des Plans -->
        <div class="grid md:grid-cols-3 gap-8 items-stretch">
            
            <!-- Plan Basique -->
            <div class="group bg-gray-50 rounded-3xl p-8 border border-gray-200 flex flex-col hover:bg-white hover:shadow-2xl hover:border-transparent transition-all duration-300">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900">Basique</h3>
                    <p class="text-sm text-gray-500 mt-2">Pour commencer à se faire connaître</p>
                </div>
                
                <ul class="space-y-4 mb-10 flex-grow">
                    <li class="flex items-center text-gray-600 italic">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Visibilité standard
                    </li>
                    <li class="flex items-center text-gray-600 italic">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Statistiques de base
                    </li>
                    <li class="flex items-center text-gray-600 italic">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Support email
                    </li>
                    <li class="flex items-center text-gray-600 italic">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> 1 publication simultanée
                    </li>
                </ul>

                <a href="{{ route('promotions.subscribe') }}" class="w-full py-4 px-6 text-center font-bold text-blue-600 border-2 border-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-colors duration-300">
                    Choisir ce plan
                </a>
            </div>

            <!-- Plan Premium (Mis en avant) -->
            <div class="relative bg-blue-600 rounded-3xl p-8 shadow-xl shadow-blue-200 flex flex-col transform md:-translate-y-4 scale-105 z-10">
                <div class="absolute top-0 right-8 -translate-y-1/2 bg-yellow-400 text-yellow-900 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                    Le plus populaire
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-white">Premium</h3>
                    <p class="text-sm text-blue-100 mt-2">La solution idéale pour les pros</p>
                </div>
                
                <ul class="space-y-4 mb-10 flex-grow text-white">
                    <li class="flex items-center">
                        <i class="fa-solid fa-circle-check text-blue-300 mr-3"></i> Visibilité renforcée
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-circle-check text-blue-300 mr-3"></i> Statistiques avancées
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-circle-check text-blue-300 mr-3"></i> Support prioritaire
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-circle-check text-blue-300 mr-3"></i> 3 publications simultanées
                    </li>
                    <li class="flex items-center font-bold">
                        <i class="fa-solid fa-star text-yellow-300 mr-3"></i> Badge "Premium" exclusif
                    </li>
                </ul>

                <a href="{{ route('promotions.subscribe') }}" class="w-full py-4 px-6 text-center font-bold bg-white text-blue-600 rounded-xl hover:bg-blue-50 transition-colors duration-300 shadow-lg">
                    Choisir ce plan
                </a>
            </div>

            <!-- Plan Entreprise -->
            <div class="group bg-gray-50 rounded-3xl p-8 border border-gray-200 flex flex-col hover:bg-white hover:shadow-2xl hover:border-transparent transition-all duration-300">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900">Entreprise</h3>
                    <p class="text-sm text-gray-500 mt-2">Puissance maximale pour agences</p>
                </div>
                
                <ul class="space-y-4 mb-10 flex-grow">
                    <li class="flex items-center text-gray-600">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Visibilité maximale
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Analytics complets
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Support dédié 24/7
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> Publications illimitées
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fa-solid fa-circle-check text-green-500 mr-3"></i> API d'intégration
                    </li>
                </ul>

                <a href="{{ route('promotions.subscribe') }}" class="w-full py-4 px-6 text-center font-bold text-blue-600 border-2 border-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-colors duration-300">
                    Choisir ce plan
                </a>
            </div>
        </div>

        <!-- Actions secondaires -->
        <div class="mt-20 flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('promotions.subscribe') }}" class="text-gray-600 font-semibold hover:text-blue-600 flex items-center gap-2 transition">
                Découvrir tous les détails des plans <i class="fa-solid fa-arrow-right text-sm"></i>
            </a>
            <span class="hidden sm:block text-gray-300">|</span>
            <a href="{{ route('ads.index') }}" class="px-6 py-2 bg-green-100 text-green-700 font-bold rounded-full hover:bg-green-200 transition">
                <i class="fa-solid fa-rectangle-ad mr-2"></i> Voir les publicités en cours
            </a>
        </div>
    </div>
</section>
    
    <!-- Section Catégories -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Nos catégories de services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Découvrez notre large gamme de services professionnels adaptés à tous vos besoins quotidiens.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Catégorie 1 -->
            <div class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-house-chimney text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Services domestiques</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Entretien ménager, jardinage, repassage, garde d'enfants... Trouvez des professionnels qualifiés près de chez vous.
                </p>
                <div class="flex items-center text-blue-600 font-bold text-sm">
                    En savoir plus <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
            </div>
            
            <!-- Catégorie 2 -->
            <div class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-user-graduate text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Services étudiants</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Cours particuliers, aide aux devoirs, soutien scolaire. Des missions réalisées par des étudiants motivés et compétents.
                </p>
                <div class="flex items-center text-purple-600 font-bold text-sm">
                    En savoir plus <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
            </div>
            
            <!-- Catégorie 3 -->
            <div class="group relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-screwdriver-wrench text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Services techniques</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Plomberie, électricité, réparations urgentes. Trouvez l'expert qu'il vous faut en quelques clics pour vos travaux.
                </p>
                <div class="flex items-center text-orange-600 font-bold text-sm">
                    En savoir plus <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Pourquoi choisir (Features) -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Colonne Texte -->
            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 italic">
                    Pourquoi choisir <span class="text-blue-600">MikiMultiService</span> ?
                </h2>
                <p class="text-lg text-gray-600 mb-10">
                    Une plateforme sécurisée et transparente conçue pour répondre à tous vos besoins de services avec tranquillité d'esprit.
                </p>
                
                <div class="grid sm:grid-cols-2 gap-8">
                    <!-- Feature 1 -->
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Validation rigoureuse</h4>
                            <p class="text-sm text-gray-600">Chaque prestataire est vérifié par nos experts.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-bolt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Réservation instantanée</h4>
                            <p class="text-sm text-gray-600">Réservez en 2 minutes, 24h/24 et 7j/7.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-chart-line text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Suivi en temps réel</h4>
                            <p class="text-sm text-gray-600">Gérez vos demandes depuis votre mobile.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 4 -->
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-lock text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Sécurité garantie</h4>
                            <p class="text-sm text-gray-600">Paiements sécurisés et système de notation.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Colonne Graphique / Image -->
            <div class="lg:w-1/2 relative">
                <div class="relative z-10 bg-blue-50 p-4 rounded-[2.5rem] border border-blue-100 shadow-inner">
                    <img src="https://images.unsplash.com/photo-1600880212319-752400e96bb5?auto=format&fit=crop&w=800&q=80" 
                         alt="Team working" 
                         class="rounded-[2rem] shadow-2xl object-cover h-[400px] w-full" />
                </div>
                <!-- Éléments décoratifs -->
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse duration-1000"></div>
            </div>
        </div>
    </div>
</section>
    
   <!-- Section CTA - Design Moderne & Impactant -->
<section class="relative py-24 bg-gray-900 overflow-hidden">
    <!-- Éléments décoratifs d'arrière-plan (Blobs lumineux) -->
    <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600 rounded-full blur-[120px] opacity-20"></div>
    <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96 bg-purple-600 rounded-full blur-[120px] opacity-20"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <!-- Badge -->
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-blue-400 uppercase bg-blue-400/10 rounded-full border border-blue-400/20">
            Rejoignez l'aventure
        </span>

        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-tight">
            Prêt à simplifier <br class="hidden md:block"> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400 font-italic">votre quotidien ?</span>
        </h2>

        <p class="text-lg md:text-xl text-gray-400 mb-12 max-w-2xl mx-auto leading-relaxed">
            Rejoignez des milliers d'utilisateurs qui font confiance à <span class="text-white font-semibold">MikiMultiService</span>. Que vous soyez client ou prestataire, nous avons la solution.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
            <!-- Bouton Principal (Éclatant) -->
            <a href="{{ route('register') }}" class="group relative w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 font-bold text-white bg-blue-600 rounded-2xl transition-all duration-300 hover:bg-blue-700 hover:scale-105 active:scale-95 shadow-xl shadow-blue-600/40">
                <i class="fa-solid fa-rocket mr-3 group-hover:animate-bounce"></i>
                Créer un compte gratuit
            </a>

            <!-- Bouton Secondaire (Verre / Outline) -->
            <a href="{{ route('offers.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 font-bold text-white bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl transition-all duration-300 hover:bg-white/10 hover:border-white/30">
                <i class="fa-solid fa-plus-circle mr-3 text-blue-400"></i>
                Publier une offre
            </a>
        </div>

        <!-- Preuve sociale discrète -->
        <div class="mt-16 pt-10 border-t border-white/5">
            <p class="text-sm text-gray-500 uppercase tracking-widest font-semibold flex flex-col md:flex-row items-center justify-center gap-4">
                <span>Sans engagement</span>
                <span class="hidden md:block text-gray-700">•</span>
                <span>Support 24/7</span>
                <span class="hidden md:block text-gray-700">•</span>
                <span>Paiement sécurisé</span>
            </p>
        </div>
    </div>
</section>
</div>





@endsection