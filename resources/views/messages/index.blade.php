@extends('layouts.app')

@section('content')
div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-4xl mx-auto">
        
        <!-- Header -->
        <div class="flex items-center gap-4 mb-10">
            <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-600/20">
                <i class="fa-solid fa-comments text-xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-black text-gray-900 uppercase italic tracking-tight">Mes <span class="text-blue-600">Conversations</span></h2>
                <p class="text-gray-500 text-sm font-medium italic">Retrouvez ici vos échanges avec les clients et prestataires.</p>
            </div>
        </div>

        <!-- Liste des Conversations -->
        <div class="space-y-4">
            @forelse($conversations as $conversation)
                <a href="{{ route('conversations.show', $conversation) }}" 
                   class="group block bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-300">
                    
                    <div class="flex items-center justify-between gap-6">
                        <div class="flex items-center gap-5">
                            <!-- Avatar / Initiale -->
                            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <i class="fa-solid fa-user-tag text-xl"></i>
                            </div>
                            
                            <div class="flex flex-col">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg font-black text-gray-900 group-hover:text-blue-600 transition-colors">Conversation #{{ $conversation->id }}</span>
                                    
                                    @if($conversation->reservation)
                                        <span class="bg-gray-900 text-white text-[9px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full">
                                            Réservation #{{ $conversation->reservation->id }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-500 mt-1 italic font-medium">Cliquez pour voir les derniers messages échangés...</p>
                            </div>
                        </div>

                        <!-- Indicateur et Flèche -->
                        <div class="flex items-center gap-4">
                            <div class="hidden md:flex flex-col items-end">
                                <span class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Dernière activité</span>
                                <span class="text-xs font-bold text-gray-700 italic">Aujourd'hui</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-300 group-hover:text-blue-600 group-hover:bg-blue-50 transition-all group-hover:translate-x-1">
                                <i class="fa-solid fa-chevron-right text-sm"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <!-- État Vide -->
                <div class="bg-white border-2 border-dashed border-gray-200 rounded-[3rem] p-20 text-center">
                    <div class="w-20 h-20 bg-gray-50 text-gray-300 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fa-solid fa-comment-slash"></i>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 uppercase italic">Aucune discussion</h3>
                    <p class="text-gray-500 mt-2 font-medium">Vous n'avez pas encore démarré de conversation.</p>
                    <a href="{{ route('offers.index') }}" class="inline-block mt-8 text-blue-600 font-bold hover:underline">
                        Parcourir les offres <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Footer / Aide -->
        <div class="mt-12 text-center p-8 bg-blue-50 rounded-[2.5rem] border border-blue-100">
            <p class="text-sm text-blue-800 font-medium italic">
                <i class="fa-solid fa-circle-info mr-2"></i>
                Toutes les conversations sont sécurisées et archivées pour votre protection.
            </p>
        </div>
    </div>
</div>
@endsection
