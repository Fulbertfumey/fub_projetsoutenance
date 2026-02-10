@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-bold text-center mb-12">Liste des offres disponibles</h2>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-8">
            {{ session('success') }}
        </div>
    @endif

    @if($offers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden">
                    <!-- Image -->
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->titre }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Pas d'image</span>
                        </div>
                    @endif

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $offer->titre }}</h3>
                        <p class="text-sm text-gray-600 mb-3">
                            <strong>Catégorie :</strong> {{ $offer->category->nom }}
                        </p>
                        <p class="text-gray-700 mb-4">{{ Str::limit($offer->description, 120) }}</p>
                        <p class="text-sm text-gray-500 mb-4">
                            Publié par <strong>{{ $offer->user->name }}</strong> le {{ $offer->created_at->format('d/m/Y') }}
                        </p>

                        <a href="{{ route('offers.show', $offer->id) }}" class="inline-block w-full text-center bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                            Voir détails
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $offers->links() }}
        </div>
    @else
        <p class="text-center text-gray-600 text-lg mt-12">Aucune offre disponible pour le moment.</p>
    @endif
</div>
@endsection
