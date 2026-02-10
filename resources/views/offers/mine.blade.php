@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header & Call to Action -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight italic">Mes <span class="text-blue-600 font-bold">Offres</span></h2>
                <p class="text-gray-500 mt-1 font-medium">Gérez la visibilité et suivez les performances de vos services.</p>
            </div>
            <a href="{{ route('offers.create') }}" class="group bg-blue-600 text-white px-6 py-3.5 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 flex items-center justify-center gap-2">
                <i class="fa-solid fa-plus-circle text-lg group-hover:rotate-90 transition-transform"></i>
                Publier une nouvelle offre
            </a>
        </div>

        <!-- Bloc Statistiques (Grid Moderne) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Total -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-gray-50 text-gray-400 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-layer-group text-xl"></i>
                </div>
                <div class="text-3xl font-black text-gray-900">{{ $stats['total'] }}</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Total Offres</div>
            </div>

            <!-- Validées -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col items-center text-center ring-2 ring-green-500/5">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-check-double text-xl"></i>
                </div>
                <div class="text-3xl font-black text-green-600">{{ $stats['validees'] }}</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Offres Validées</div>
            </div>

            <!-- En Attente -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-hourglass-half text-xl animate-pulse"></i>
                </div>
                <div class="text-3xl font-black text-orange-500">{{ $stats['en_attente'] }}</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">En attente</div>
            </div>

            <!-- Refusées -->
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fa-solid fa-circle-xmark text-xl"></i>
                </div>
                <div class="text-3xl font-black text-red-500">{{ $stats['refusees'] }}</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Refusées</div>
            </div>
        </div>

        <!-- Liste des Offres -->
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden mb-10">
            @if($offers->isEmpty())
                <div class="p-20 text-center">
                    <div class="w-20 h-20 bg-gray-50 text-gray-300 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Aucune offre pour le moment</h3>
                    <p class="text-gray-500 mt-2">Commencez par publier votre premier service pour attirer des clients.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Offre</th>
                                <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Catégorie</th>
                                <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Statut</th>
                                <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest">Performance</th>
                                <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($offers as $offer)
                            <tr class="hover:bg-gray-50 transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $offer->titre }}</div>
                                    <div class="text-[10px] text-gray-400 italic mt-1 font-medium">Ajouté il y a 2 jours</div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="text-xs font-bold text-gray-600 bg-gray-100 px-3 py-1.5 rounded-lg border border-gray-200">
                                        {{ $offer->category->nom ?? 'Non définie' }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    @if($offer->statut === 'valide')
                                        <span class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase text-green-600 bg-green-50 px-3 py-1.5 rounded-full border border-green-100">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                            Validée
                                        </span>
                                    @elseif($offer->statut === 'en_attente')
                                        <span class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase text-orange-500 bg-orange-50 px-3 py-1.5 rounded-full border border-orange-100">
                                            <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                                            En attente
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase text-red-500 bg-red-50 px-3 py-1.5 rounded-full border border-red-100">
                                            Refusée
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-gray-900">{{ $offer->vues }}</span>
                                            <span class="text-[9px] font-bold text-gray-400 uppercase">Vues</span>
                                        </div>
                                        <div class="w-px h-6 bg-gray-100"></div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-gray-900">{{ $offer->clics }}</span>
                                            <span class="text-[9px] font-bold text-gray-400 uppercase">Clics</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('offers.show', $offer) }}" class="p-2.5 text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                            <i class="fa-solid fa-eye text-sm"></i>
                                        </a>
                                        <form action="{{ route('offers.destroy', $offer) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2.5 text-red-500 bg-red-50 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                                <i class="fa-solid fa-trash-can text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $offers->links() }}
        </div>

    </div>
</div>
@endsection
