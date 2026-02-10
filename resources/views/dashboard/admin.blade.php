@extends('layouts.app')

@section('content')


<div class="container">
    <h2> Dashboard Admin</h2>

    <!-- Statistiques rapides -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Offres validées</h5>
                    <p class="card-text">{{ $offersValidated ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Offres refusées</h5>
                    <p class="card-text">{{ $offersRefused ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Signalements en attente</h5>
                    <p class="card-text">{{ $reportsPending ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Signalements traités</h5>
                    <p class="card-text">{{ $reportsTreated ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des offres en attente -->
    <h4>Offres en attente de validation</h4>
    @if($offers->isEmpty())
        <p>Aucune offre en attente.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Prestataire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->titre }}</td>
                    <td>{{ $offer->user->name }}</td>
                    <td>
                        <form action="{{ route('admin.offers.validate', $offer) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"> Valider</button>
                        </form>
                        <form action="{{ route('admin.offers.refuse', $offer) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Refuser</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
<!-- pour filter et voir les pub depuis dashboard -->
  @foreach($ads as $ad)
    <h3>{{ $ad->title }}</h3>
    <p>{{ $ad->description }}</p>
    <span>Statut : {{ $ad->statut }}</span>

    @if($ad->statut === 'brouillon')
        <form action="{{ route('admin.ads.valider', $ad->id) }}" method="POST">
            @csrf
            <button type="submit">Valider</button>
        </form>

        <form action="{{ route('admin.ads.refuser', $ad->id) }}" method="POST">
            @csrf
            <button type="submit"> Refuser</button>
        </form>
    @endif
@endforeach


    <!-- Tableau des signalements -->
    <h4 class="mt-5"> Signalements</h4>
    @if($reports->isEmpty())
        <p>Aucun signalement.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Réservation</th>
                    <th>Reporter</th>
                    <th>Utilisateur signalé</th>
                    <th>Motif</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>#{{ $report->reservation_id }}</td>
                    <td>{{ $report->reporter->name }}</td>
                    <td>{{ $report->reportedUser->name }}</td>
                    <td>{{ $report->motif }}</td>
                    <td>{{ ucfirst($report->statut) }}</td>
                    <td>
                        <form action="{{ route('admin.reports.treat', $report) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"> Traiter</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
