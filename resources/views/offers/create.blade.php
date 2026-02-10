@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 py-16 px-6">
    <div class="max-w-3xl mx-auto">
        
        <!-- Bouton Retour -->
        <div class="mb-8">
            <a href="{{ route('dashboard.prestataire') }}" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-blue-600 transition-colors">
                <i class="fa-solid fa-arrow-left-long mr-2 transition-transform group-hover:-translate-x-1"></i>
                Retour au tableau de bord
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <!-- Header du Formulaire -->
            <div class="bg-blue-600 p-8 md:p-12 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-black italic uppercase italic tracking-tight">Publier une <br><span class="text-blue-200">nouvelle offre</span></h2>
                    <p class="text-blue-100 mt-2 text-sm font-medium">Remplissez les informations ci-dessous pour attirer vos futurs clients.</p>
                </div>
                <i class="fa-solid fa-rocket absolute right-8 bottom-0 text-9xl text-white/10 -rotate-12 translate-y-8"></i>
            </div>

            <div class="p-8 md:p-12">
                <!-- Message de succès -->
                @if(session('status'))
                    <div class="flex items-center gap-3 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl mb-8 animate-pulse">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                        <span class="font-bold text-sm">{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Titre -->
                    <div class="space-y-2">
                        <label for="titre" class="text-sm font-black text-gray-700 uppercase tracking-widest ml-1">Titre de l’offre</label>
                        <input type="text" id="titre" name="titre" required 
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 focus:bg-white transition-all outline-none"
                            placeholder="Ex: Photographe professionnel pour mariage">
                    </div>

                    <!-- Groupe Catégorie & Prix -->
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="category_id" class="text-sm font-black text-gray-700 uppercase tracking-widest ml-1">Catégorie</label>
                            <div class="relative">
                                <select id="category_id" name="category_id" required 
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl appearance-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 focus:bg-white transition-all outline-none">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="prix" class="text-sm font-black text-gray-700 uppercase tracking-widest ml-1">Prix (CFA)</label>
                            <div class="relative">
                                <input type="number" id="prix" name="prix" min="0"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 focus:bg-white transition-all outline-none"
                                    placeholder="Ex: 15000">
                                <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-xs uppercase">Optionnel</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="text-sm font-black text-gray-700 uppercase tracking-widest ml-1">Description détaillée</label>
                        <textarea id="description" name="description" rows="5" required 
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 focus:bg-white transition-all outline-none resize-none"
                            placeholder="Décrivez votre service, vos points forts, votre expérience..."></textarea>
                    </div>

                    <!-- Upload Image -->
                    <div class="space-y-2">
                        <label class="text-sm font-black text-gray-700 uppercase tracking-widest ml-1">Visuel de l'offre</label>
                        <div class="relative group">
                            <input type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 flex flex-col items-center justify-center group-hover:border-blue-400 group-hover:bg-blue-50 transition-all">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl text-gray-300 group-hover:text-blue-500 mb-3 transition-colors"></i>
                                <span class="text-sm text-gray-500 group-hover:text-blue-700 font-medium text-center">Cliquez ou glissez une image ici<br><span class="text-xs text-gray-400">(Format: JPG, PNG, max 2Mo)</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Submit -->
                    <div class="pt-4">
                        <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black uppercase tracking-widest rounded-2xl hover:bg-blue-700 hover:scale-[1.01] active:scale-95 transition-all shadow-xl shadow-blue-600/30 flex items-center justify-center gap-3">
                            <span>Publier mon offre</span>
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
