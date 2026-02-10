@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="mb-12">
            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight italic">Mon Espace <span class="text-blue-600">Client</span></h2>
            <p class="text-gray-500 mt-1 font-medium italic">Suivez vos réservations et gérez vos échanges avec les prestataires.</p>
        </div>

        <!-- Statistiques (Cartes Modernes) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Active -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-50 rounded-full group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10 flex items-center gap-5">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-gray-900">{{ $reservations->where('statut','en_attente')->count() }}</div>
                        <div class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Réservations Actives</div>
                    </div>
                </div>
            </div>

            <!-- Terminées -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10 flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-gray-900">{{ $reservations->where('statut','termine')->count() }}</div>
                        <div class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Offres Terminées</div>
                    </div>
                </div>
            </div>

            <!-- Signalements -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-50 rounded-full group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10 flex items-center gap-5">
                    <div class="w-14 h-14 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-gray-900">{{ $reports->count() }}</div>
                        <div class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Signalements</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Principale -->
        <div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-10 py-8 border-b border-gray-50 flex items-center justify-between bg-gray-50/30">
                <h3 class="text-lg font-black text-gray-900 uppercase italic tracking-widest">Historique de mes réservations</h3>
                <span class="bg-white px-4 py-1.5 rounded-full border border-gray-200 text-[10px] font-bold text-gray-400 uppercase">{{ $reservations->count() }} au total</span>
            </div>

            @if($reservations->isEmpty())
                <div class="p-20 text-center">
                    <div class="w-24 h-24 bg-gray-50 text-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 text-4xl">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 uppercase italic">Aucune réservation trouvée</h4>
                    <p class="text-gray-500 mt-3 font-medium max-w-md mx-auto">Vous n'avez pas encore réservé de service. Parcourez nos offres pour trouver le prestataire idéal.</p>
                    <a href="{{ route('offers.index') }}" class="inline-flex mt-10 bg-blue-600 text-white px-10 py-4 rounded-2xl font-black uppercase tracking-[0.1em] hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/30 active:scale-95">
                        <i class="fa-solid fa-magnifying-glass mr-2"></i> Parcourir les offres
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-10 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Prestation / Offre</th>
                                <th class="px-10 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Prestataire</th>
                                <th class="px-10 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-50/80 transition-all group">
                                <td class="px-10 py-8">
                                    <div class="font-black text-gray-900 group-hover:text-blue-600 transition-colors uppercase italic">{{ $reservation->offer->titre }}</div>
                                    <div class="text-[10px] text-gray-400 font-bold uppercase mt-1 tracking-tighter">Réservé le {{ $reservation->created_at->format('d/m/Y') }}</div>
                                </td>
                                <td class="px-10 py-8">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 text-xs font-bold border border-gray-200">
                                            {{ substr($reservation->offer->user->nom, 0, 1) }}
                                        </div>
                                        <div class="text-sm font-bold text-gray-700">{{ $reservation->offer->user->nom }}</div>
                                    </div>
                                </td>
                                <td class="px-10 py-8 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <!-- Bouton Discussion -->
                                        <form action="{{ route('conversations.start', $reservation) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-600/20 active:scale-95">
                                                <i class="fa-solid fa-comment-dots text-xs"></i>
                                                Discuter
                                            </button>
                                        </form>

                                        <!-- Bouton Signaler -->
                                        <a href="{{ route('reports.create', $reservation) }}" class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all active:scale-95">
                                            <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                                            Signaler
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Footer Table / Pagination -->
                <div class="px-10 py-8 bg-gray-50/30 border-t border-gray-100">
                    {{ $reservations->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
