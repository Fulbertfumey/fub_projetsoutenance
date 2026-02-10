@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-20">
    <!-- En-tête de page -->
    <header class="text-center mb-20">
        <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6 italic">
            À propos de <span class="text-blue-600">MikiMultiService</span>
        </h2>
        <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
    </header>

    <!-- Section Mission : Carte mise en avant -->
    <section class="relative bg-blue-600 rounded-[3rem] p-8 md:p-16 text-white overflow-hidden shadow-2xl mb-24">
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="relative z-10 grid md:grid-cols-5 gap-12 items-center">
            <div class="md:col-span-3">
                <h3 class="text-2xl font-bold mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-bullseye text-blue-200"></i> Notre mission
                </h3>
                <p class="text-lg md:text-xl leading-relaxed text-blue-50">
                    MikiMultiService est une plateforme conçue pour connecter les <span class="font-bold text-white border-b-2 border-blue-400">clients</span> et les <span class="font-bold text-white border-b-2 border-blue-400">prestataires</span> 
                    dans un environnement fiable et transparent. Notre objectif est de faciliter la recherche de services, 
                    la réservation et la promotion de marques locales.
                </p>
            </div>
            <div class="md:col-span-2 hidden md:block">
                <i class="fa-solid fa-handshake-angle text-[150px] opacity-20 rotate-12"></i>
            </div>
        </div>
    </section>

    <!-- Section Valeurs & Pourquoi nous choisir (Grid) -->
    <div class="grid md:grid-cols-2 gap-12 mb-24">
        <!-- Nos Valeurs -->
        <section class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <i class="fa-solid fa-heart text-red-500"></i> Nos valeurs
            </h3>
            <ul class="space-y-6">
                <li class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <p class="text-gray-600 font-medium">Transparence et confiance entre utilisateurs</p>
                </li>
                <li class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <p class="text-gray-600 font-medium">Simplicité d’utilisation et accessibilité</p>
                </li>
                <li class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <p class="text-gray-600 font-medium">Sécurité grâce au système de signalement</p>
                </li>
            </ul>
        </section>

        <!-- Pourquoi nous choisir -->
        <section class="bg-gray-900 p-10 rounded-3xl text-white shadow-xl">
            <h3 class="text-2xl font-bold mb-8 flex items-center gap-3 text-blue-400">
                <i class="fa-solid fa-star"></i> Pourquoi nous choisir ?
            </h3>
            <div class="space-y-4 text-gray-400">
                <p>Que vous soyez un client à la recherche d’un service fiable ou un prestataire souhaitant promouvoir vos offres :</p>
                <div class="grid grid-cols-1 gap-4 mt-6">
                    <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/10">
                        <i class="fa-solid fa-magnifying-glass text-blue-400"></i>
                        <span class="text-sm">Recherche rapide et intuitive</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/10">
                        <i class="fa-solid fa-bullhorn text-blue-400"></i>
                        <span class="text-sm">Outils de promotion adaptés</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/10">
                        <i class="fa-solid fa-comments text-blue-400"></i>
                        <span class="text-sm">Messagerie interne fluide</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Section Politique de confidentialité : Style Document -->
    <section class="bg-gray-50 rounded-3xl p-8 md:p-12 border border-gray-200 mb-20">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 italic">Politique de confidentialité</h3>
            <div class="prose prose-blue text-gray-600 space-y-4">
                <p>
                    Chez <span class="text-blue-600 font-semibold">MikiMultiService</span>, nous respectons la confidentialité de vos données.
                    Les informations collectées (nom, email, téléphone) sont utilisées uniquement
                    pour le traitement de vos commandes et la communication avec vous.
                </p>
                <p>
                    Vos données ne sont jamais vendues à des tiers. Elles sont protégées par des
                    mesures de sécurité adaptées. Vous pouvez à tout moment demander la modification
                    ou la suppression de vos informations en nous contactant à :
                    <a href="mailto:contact@mikimultiservice.com" class="text-blue-600 font-bold hover:underline">
                         contact@mikimultiservice.com
                    </a>.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="text-center py-12">
        <h3 class="text-3xl font-black text-gray-900 mb-6">Rejoignez-nous dès aujourd’hui</h3>
        <p class="text-gray-500 mb-10 max-w-xl mx-auto italic">
            Inscrivez-vous gratuitement et découvrez une nouvelle façon de collaborer et de promouvoir vos services.
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center px-10 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 hover:scale-105 transition-all shadow-xl shadow-blue-600/30">
            <i class="fa-solid fa-user-plus mr-3"></i>
            Créer un compte maintenant
        </a>
    </section>
</div>
@endsection
