@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-4xl mx-auto flex flex-col h-[85vh]">
        
        <!-- Header de la Conversation -->
        <div class="bg-white rounded-t-[2.5rem] border border-gray-100 p-6 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard.prestataire') }}" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <div>
                    <h2 class="text-xl font-black text-gray-900 italic uppercase leading-none">Conversation <span class="text-blue-600">#{{ $conversation->id }}</span></h2>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Espace sécurisé</p>
                </div>
            </div>
            
            @if($conversation->reservation)
            <div class="hidden md:block bg-gray-900 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-tighter">
               Réservation #{{ $conversation->reservation->id }}
            </div>
            @endif
        </div>

        <!-- Zone des Messages (Scrollable) -->
        <div class="flex-1 bg-white border-x border-gray-100 overflow-y-auto p-8 space-y-6" id="chat-window">
            @foreach($messages as $message)
                @php
                    $isMe = $message->user_id === Auth::id();
                @endphp

                <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[80%] md:max-w-[70%]">
                        <!-- Pseudo -->
                        <div class="mb-1 px-2">
                            <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">
                                {{ $isMe ? 'Moi' : $message->user->nom }}
                            </span>
                        </div>
                        
                        <!-- Bulle -->
                        <div class="relative p-4 rounded-3xl shadow-sm {{ $isMe ? 'bg-blue-600 text-white rounded-tr-none' : 'bg-gray-100 text-gray-800 rounded-tl-none' }}">
                            <p class="text-sm font-medium leading-relaxed">
                                {{ $message->contenu }}
                            </p>
                        </div>

                        <!-- Timestamp -->
                        <div class="mt-1 px-2 {{ $isMe ? 'text-right' : 'text-left' }}">
                            <span class="text-[9px] font-bold text-gray-300 italic uppercase">
                                {{ $message->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Zone de Saisie (Formulaire) -->
        <div class="bg-gray-50 rounded-b-[2.5rem] border border-gray-100 p-6 shadow-inner">
            <!-- Pagination (Subtile) -->
            <div class="mb-4">
                {{ $messages->links() }}
            </div>

            <form method="POST" action="{{ route('messages.send', $conversation) }}" class="relative group">
                @csrf
                <textarea 
                    name="contenu" 
                    rows="2" 
                    placeholder="Écrivez votre message ici..."
                    required
                    class="w-full pl-6 pr-20 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 outline-none transition-all resize-none shadow-sm"
                ></textarea>
                
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 bg-blue-600 text-white h-12 w-60 rounded-xl flex items-center justify-center shadow-lg shadow-blue-600/30 hover:bg-blue-700 hover:scale-105 active:scale-95 transition-all">
                    ENVOYER
                </button>
            </form>
        </div>

        <!-- Retour Dashboard (Lien textuel simple en bas) -->
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.prestataire') }}" class="text-xs font-bold text-gray-400 hover:text-gray-900 transition-colors uppercase tracking-widest">
                <i class="fa-solid fa-table-columns mr-1"></i> Quitter la conversation
            </a>
        </div>
    </div>
</div>

<style>
    /* Masquer la scrollbar pour un look plus clean mais garder le scroll */
    #chat-window::-webkit-scrollbar {
        width: 4px;
    }
    #chat-window::-webkit-scrollbar-track {
        background: transparent;
    }
    #chat-window::-webkit-scrollbar-thumb {
        background: #E5E7EB;
        border-radius: 10px;
    }
</style>
@endsection
