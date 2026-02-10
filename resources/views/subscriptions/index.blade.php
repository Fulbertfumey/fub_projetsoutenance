@extends('layouts.app')

@section('content')


<div class="bg-gray-50 min-h-screen py-20 px-6">
    <!-- Header -->
    <div class="max-w-4xl mx-auto text-center mb-20">
        <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-6 tracking-tight">
            Boostez votre <span class="text-blue-600">visibilité</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
            MikiMultiService vous propose trois niveaux de promotion pour mettre en avant vos services. 
            Débloquez plus de potentiel et attirez plus de clients.
        </p>
    </div>

    <!-- Pricing Cards Container -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
        
        <!-- Plan Basique -->
        <div class="bg-white rounded-[2.5rem] p-8 border border-gray-200 shadow-sm flex flex-col transition-all hover:shadow-xl group">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Basique</h3>
                <div class="flex items-baseline gap-1">
                    <span class="text-4xl font-black text-gray-900 font-italic">Gratuit</span>
                </div>
                <p class="text-gray-500 text-sm mt-2 font-medium italic">Essai de 7 jours</p>
            </div>
            
            <ul class="space-y-4 mb-10 flex-grow">
                <li class="flex items-start gap-3 text-gray-600 text-sm">
                    <i class="fa-solid fa-circle-check text-blue-500 mt-0.5"></i>
                    <span>Visibilité limitée dans les résultats</span>
                </li>
                <li class="flex items-start gap-3 text-gray-600 text-sm">
                    <i class="fa-solid fa-circle-check text-blue-500 mt-0.5"></i>
                    <span>Statistiques de base</span>
                </li>
                <li class="flex items-start gap-3 text-gray-600 text-sm">
                    <i class="fa-solid fa-circle-check text-blue-500 mt-0.5"></i>
                    <span>1 publication simultanée</span>
                </li>
            </ul>

            <a href="{{ route('ads.create', ['plan' => 'basique']) }}" 
                class="w-full py-4 px-6 text-center font-bold text-blue-600 bg-blue-50 rounded-2xl hover:bg-blue-600 hover:text-white transition-all">
                Choisir ce plan
            </a>
        </div>

        <!-- Plan Premium -->
        <div class="relative bg-white rounded-[2.5rem] p-8 border-2 border-blue-600 shadow-2xl shadow-blue-600/10 flex flex-col scale-105 z-10">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full ring-4 ring-gray-50">
                Le plus populaire
            </div>
            
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Premium</h3>
                <div class="flex items-baseline gap-1">
                    <span class="text-5xl font-black text-gray-900">2900 </span>
                    <span class="text-xl font-bold text-gray-500 uppercase">CFA</span>
                </div>
                <p class="text-blue-600 text-sm mt-2 font-bold italic">par mois</p>
            </div>
            
            <ul class="space-y-4 mb-10 flex-grow text-sm">
                <li class="flex items-start gap-3 text-gray-800 font-medium">
                    <i class="fa-solid fa-circle-check text-blue-600 mt-0.5"></i>
                    <span>Visibilité renforcée</span>
                </li>
                <li class="flex items-start gap-3 text-gray-800">
                    <i class="fa-solid fa-circle-check text-blue-600 mt-0.5"></i>
                    <span>3 publications simultanées</span>
                </li>
                <li class="flex items-start gap-3 text-gray-800">
                    <i class="fa-solid fa-circle-check text-blue-600 mt-0.5"></i>
                    <span>Badge "Premium" exclusif</span>
                </li>
                <li class="flex items-start gap-3 text-gray-800">
                    <i class="fa-solid fa-circle-check text-blue-600 mt-0.5"></i>
                    <span>Support prioritaire</span>
                </li>
            </ul>

            <a href="{{ route('ads.create', ['plan' => 'premium']) }}" 
                class="w-full py-4 px-6 text-center font-bold text-white bg-blue-600 rounded-2xl hover:bg-blue-700 hover:shadow-lg shadow-blue-600/30 transition-all">
                Choisir ce plan
            </a>
        </div>

        <!-- Plan Entreprise -->
        <div class="bg-gray-900 rounded-[2.5rem] p-8 text-white flex flex-col transition-all hover:shadow-xl">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-blue-400 mb-4 font-italic">Entreprise</h3>
                <div class="flex items-baseline gap-1">
                    <span class="text-4xl font-black">9900 </span>
                    <span class="text-lg font-bold text-gray-400 uppercase">CFA</span>
                </div>
                <p class="text-gray-400 text-sm mt-2 font-medium italic">par mois</p>
            </div>
            
            <ul class="space-y-4 mb-10 flex-grow text-sm">
                <li class="flex items-start gap-3 text-gray-300">
                    <i class="fa-solid fa-circle-check text-blue-400 mt-0.5"></i>
                    <span>Visibilité maximale (Top 1)</span>
                </li>
                <li class="flex items-start gap-3 text-gray-300">
                    <i class="fa-solid fa-circle-check text-blue-400 mt-0.5"></i>
                    <span>Publications illimitées</span>
                </li>
                <li class="flex items-start gap-3 text-gray-300">
                    <i class="fa-solid fa-circle-check text-blue-400 mt-0.5"></i>
                    <span>Page entreprise pro</span>
                </li>
                <li class="flex items-start gap-3 text-gray-300">
                    <i class="fa-solid fa-circle-check text-blue-400 mt-0.5"></i>
                    <span>Support dédié 24/7</span>
                </li>
            </ul>

            <a href="{{ route('ads.create', ['plan' => 'entreprise']) }}" 
                class="w-full py-4 px-6 text-center font-bold text-gray-900 bg-blue-400 rounded-2xl hover:bg-blue-300 transition-all">
                Choisir ce plan
            </a>
        </div>
    </div>

    <!-- Comparaison détaillée -->
    <div class="max-w-5xl mx-auto overflow-hidden bg-white border border-gray-200 rounded-[2rem] shadow-sm">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-2xl font-black text-gray-900">Comparatif détaillé</h3>
            <span class="text-sm font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full uppercase tracking-tighter">Tout comparer</span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase tracking-wider">Fonctionnalités</th>
                        <th class="px-8 py-5 text-sm font-black text-gray-900">Basique</th>
                        <th class="px-8 py-5 text-sm font-black text-blue-600">Premium</th>
                        <th class="px-8 py-5 text-sm font-black text-gray-900">Entreprise</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <tr>
                        <td class="px-8 py-4 font-bold text-gray-700">Visibilité</td>
                        <td class="px-8 py-4 text-gray-500">Standard</td>
                        <td class="px-8 py-4 text-gray-500">Renforcée</td>
                        <td class="px-8 py-4 font-black text-blue-600 italic">Maximale</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 font-bold text-gray-700">Statistiques</td>
                        <td class="px-8 py-4 text-gray-500">Basiques</td>
                        <td class="px-8 py-4 text-gray-500">Avancées</td>
                        <td class="px-8 py-4 text-gray-500">Complètes (Analytics)</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 font-bold text-gray-700">Publications</td>
                        <td class="px-8 py-4 text-gray-500">1</td>
                        <td class="px-8 py-4 text-gray-500 font-bold">3 simultanées</td>
                        <td class="px-8 py-4 text-gray-900 font-black">Illimitées</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 font-bold text-gray-700">Support</td>
                        <td class="px-8 py-4 text-gray-500">Email</td>
                        <td class="px-8 py-4 text-gray-500">Prioritaire</td>
                        <td class="px-8 py-4 text-gray-900 font-bold">Dédié 24j/7</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 font-bold text-gray-700">Badge</td>
                        <td class="px-8 py-4 text-red-400"><i class="fa-solid fa-xmark"></i></td>
                        <td class="px-8 py-4 text-blue-600 font-black italic underline">PREMIUM</td>
                        <td class="px-8 py-4 text-gray-900 font-black italic border-2 border-gray-900 rounded-lg inline-block my-2">CORP</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Home Button -->
    <div class="max-w-7xl mx-auto mt-16 text-center">
        <a href="{{ route('Home') }}" class="group inline-flex items-center gap-2 text-gray-500 font-bold hover:text-gray-900 transition-all">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection