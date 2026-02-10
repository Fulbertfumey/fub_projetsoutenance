@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-4xl mx-auto">
        
        <!-- Navigation / Retour -->
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('offers.index') }}" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-blue-600 transition-colors">
                <i class="fa-solid fa-arrow-left-long mr-2 transition-transform group-hover:-translate-x-1"></i>
                Retour aux offres
            </a>
            <span class="text-[10px] font-black uppercase tracking-widest text-gray-300 bg-gray-100 px-3 py-1 rounded-full">Référence #OFF-{{ $offer->id }}</span>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            
            <!-- Image mise en avant -->
            @if($offer->image)
                <div class="relative h-64 md:h-96 overflow-hidden">
                    <img src="{{ asset('storage/'.$offer->image) }}" alt="{{ $offer->titre }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <span class="bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-2 rounded-lg shadow-lg">
                            {{ $offer->category->nom }}
                        </span>
                    </div>
                </div>
            @endif

            <div class="p-8 md:p-12">
                <!-- En-tête de l'offre -->
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-6 mb-10 pb-10 border-b border-gray-100">
                    <div class="flex-1">
                        <h2 class="text-3xl md:text-4xl font-black text-gray-900 leading-tight mb-4 italic uppercase">
                            {{ $offer->titre }}
                        </h2>
                        
                        <div class="flex flex-wrap items-center gap-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Proposé par</p>
                                    <p class="text-sm font-bold text-gray-900">{{ $offer->user->name ?? $offer->user->nom }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-calendar-day"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Publié le</p>
                                    <p class="text-sm font-bold text-gray-900">{{ $offer->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($offer->prix)
                    <div class="bg-gray-900 text-white px-8 py-6 rounded-3xl text-center shadow-xl shadow-gray-900/20">
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Tarif indicatif</p>
                        <p class="text-3xl font-black">{{ number_format($offer->prix, 0, ',', ' ') }} <span class="text-sm font-bold text-blue-400 uppercase">CFA</span></p>
                    </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-12">
                    <h4 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-4">À propos de cette offre</h4>
                    <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed font-medium">
                        {{ $offer->description }}
                    </div>
                    
                    @if($offer->category->description)
                        <div class="mt-6 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                            <p class="text-xs italic text-blue-700 font-medium">
                                <i class="fa-solid fa-info-circle mr-2"></i> {{ $offer->category->description }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Section Réservation (Client uniquement) -->
                @if(Auth::check() && Auth::user()->isClient())
                    <div class="bg-gray-50 rounded-[2rem] p-8 border border-gray-100 shadow-inner">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-600/30">
                                <i class="fa-solid fa-paper-plane text-xs"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900 uppercase italic">Réserver ce service</h3>
                        </div>

                        <form method="POST" action="{{ route('reservations.store', $offer->id) }}" class="space-y-6">
                            @csrf
                            <input type="hidden" name="type" value="reservation">

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="date_souhaitee" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Date souhaitée</label>
                                    <input type="date" name="date_souhaitee" id="date_souhaitee" 
                                        class="w-full px-5 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 outline-none transition-all">
                                </div>
                                <div class="space-y-2 text-right flex flex-col justify-end italic">
                                    <p class="text-sm text-gray-500">Choisissez une date indicative pour démarrer la discussion.</p>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="message" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Votre message</label>
                                <textarea name="message" id="message" rows="4" 
                                    placeholder="Décrivez votre besoin en quelques mots..."
                                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 outline-none transition-all resize-none"></textarea>
                            </div>

                            <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/30 flex items-center justify-center gap-3 active:scale-95">
                                Confirmer ma demande de réservation
                            </button>
                        </form>
                    </div>
                @elseif(!Auth::check())
                    <div class="text-center p-8 bg-gray-100 rounded-[2rem] border border-dashed border-gray-300 font-bold text-gray-500 italic">
                        Veuillez vous connecter pour réserver cette offre.
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Bouton Retour bas de page -->
        <div class="mt-12 text-center">
            <a href="{{ route('Home') }}" class="inline-flex items-center gap-2 text-gray-400 font-bold hover:text-gray-900 transition-all">
                <i class="fa-solid fa-house"></i>
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
