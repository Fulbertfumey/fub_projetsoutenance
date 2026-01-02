@extends('layouts.app')

@section('content')

<h2 style="text-align:center;">📣 Liste des publicités</h2>

@if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
        {{ session('success') }}
    </div>
@endif

@if($ads->count() > 0)
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem;">
        @foreach($ads as $ad)
            <div style="border:1px solid #ddd; border-radius:8px; padding:1rem; background:#fff; box-shadow:0 0 5px rgba(0,0,0,0.05);">
                <h3>{{ $ad->title }}</h3>
                <p><strong>Plan :</strong> {{ ucfirst($ad->plan) }}</p>
                <p>{{ Str::limit($ad->description, 120) }}</p>

                @if($ad->image)
                    <img src="{{ asset('storage/'.$ad->image) }}" alt="Image publicité" style="width:100%; border-radius:6px; margin-top:0.5rem;">
                @endif

                @if($ad->link)
                    <p><a href="{{ $ad->link }}" target="_blank" style="color:#1f1f1f; font-weight:bold;">🔗 Voir plus</a></p>
                @endif

                <p style="font-size:0.9rem; color:#555;">Publié par {{ $ad->user->name }} le {{ $ad->created_at->format('d/m/Y') }}</p>

                <div style="margin-top:1rem;">
                    <a href="{{ route('ads.show', $ad->id) }}">
                        <button>Voir détails</button>
                    </a>
                    @if(auth()->id() === $ad->user_id)
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button style="background:#dc3545;">Supprimer</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div style="margin-top:2rem;">
        {{ $ads->links() }}
    </div>
@else
    <p style="text-align:center;">Aucune publicité publiée pour le moment.</p>
@endif
@endsection
