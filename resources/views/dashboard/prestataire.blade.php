@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header & Action -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h2 class="text-3xl font-black text-gray-900 italic uppercase">Tableau de bord <span class="text-blue-600 font-bold">Prestataire</span></h2>
                <p class="text-gray-500 mt-1">Gérez vos activités, suivez vos performances et répondez à vos clients.</p>
            </div>
            <a href="{{ route('offers.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 group">
                <i class="fa-solid fa-plus-circle mr-2 group-hover:rotate-90 transition-transform"></i>
                Nouvelle Offre
            </a>
        </div>

        <!-- Section Statistiques (Grid) -->
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-16">
            <!-- Offres -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_offres'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Offres</div>
            </div>

            <!-- Réservations -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_reservations'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Réservations</div>
            </div>

            <!-- Vues -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_vues'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Vues</div>
            </div>

            <!-- Clics -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-mouse-pointer"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_clics'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Clics</div>
            </div>

            <!-- Conversations -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_conversations'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Messages</div>
            </div>

            <!-- Signalements -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $stats['total_signalements'] }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Alertes</div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            
            <!-- Colonne Gauche : Mes Offres -->
            <section>
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-black text-gray-900 flex items-center gap-2">
                        <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                        Mes Offres récentes
                    </h3>
                </div>
                <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="divide-y divide-gray-50">
                        @foreach($offers as $offer)
                        <div class="p-5 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-900 underline decoration-blue-200 underline-offset-4">{{ $offer->titre }}</span>
                                <span class="text-xs text-gray-400 uppercase tracking-tighter mt-1 italic italic">Publié le 12 Mars</span>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $offer->statut == 'actif' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                                {{ $offer->statut }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Colonne Droite : Réservations Reçues -->
            <section>
                <h3 class="text-xl font-black text-gray-900 flex items-center gap-2 mb-6">
                    <span class="w-2 h-8 bg-green-500 rounded-full"></span>
                    Dernières Réservations
                </h3>
                <div class="space-y-4">
                    @foreach($reservations as $reservation)
                    <div class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                <i class="fa-solid fa-user text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $reservation->client->nom }}</h4>
                                <p class="text-xs text-gray-500 italic">Pour : {{ $reservation->offer->titre }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('conversations.start', $reservation) }}">
                            @csrf
                            <button type="submit" class="px-5 py-2.5 bg-gray-900 text-white text-xs font-bold rounded-xl hover:bg-blue-600 transition flex items-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                Discuter
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Conversations -->
            <section class="lg:col-span-2 mt-8">
                <h3 class="text-xl font-black text-gray-900 flex items-center gap-2 mb-6 text-center lg:text-left">
                    <span class="w-2 h-8 bg-indigo-500 rounded-full"></span>
                    Conversations actives
                </h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($conversations as $conversation)
                    <a href="{{ route('conversations.show', $conversation) }}" class="group bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:border-blue-600 transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest italic">ID #{{ $conversation->id }}</span>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-blue-600 transition-transform group-hover:translate-x-2"></i>
                        </div>
                        <h4 class="font-black text-gray-900">Conversation avec Client</h4>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-1">Cliquez pour voir les derniers messages...</p>
                    </a>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
