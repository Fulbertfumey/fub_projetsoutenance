@extends('layouts.app')

@section('content')

<style>
/* === FOND ET CONTAINER === */
.container {
    background: white;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    margin-top: 20px;
    margin-bottom: 40px;
    max-width: 1200px;
}

/* === TITRE PRINCIPAL === */
.container h2 {
    color: #2d3748;
    font-size: 1.9rem;
    font-weight: 700;
    margin-bottom: 35px;
    padding-bottom: 15px;
    border-bottom: 2px solid #4299e1;
    position: relative;
}

.container h2::before {
    content: "📅";
    margin-right: 12px;
    font-size: 1.6rem;
}

/* === STATISTIQUES === */
.row.mb-4 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.row.mb-4 .card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.row.mb-4 .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

/* Cartes de stats */
.row.mb-4 .bg-success {
    background: #38a169 !important;
}

.row.mb-4 .bg-info {
    background: #3182ce !important;
}

.row.mb-4 .bg-danger {
    background: #e53e3e !important;
}

.row.mb-4 .card-body {
    padding: 25px;
    text-align: center;
}

.row.mb-4 .card-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.row.mb-4 .card-text {
    font-size: 2.4rem;
    font-weight: 700;
    color: white;
    margin: 0;
}

/* === MESSAGE D'ALERTE === */
.container .alert-info {
    background: #ebf8ff;
    border: 1px solid #bee3f8;
    border-radius: 12px;
    padding: 30px;
    text-align: center;
    margin-bottom: 30px;
}

.container .alert-info h4 {
    color: #2d3748;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.container .alert-info p {
    color: #4a5568;
    margin-bottom: 20px;
    font-size: 1rem;
}

.container .alert-info .btn-primary {
    background: #4299e1;
    border: none;
    padding: 10px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.container .alert-info .btn-primary:hover {
    background: #3182ce;
    transform: translateY(-2px);
}

/* === TABLEAU === */
.container .table {
    width: 100%;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
}

.container .table thead {
    background: #f7fafc;
}

.container .table th {
    padding: 16px 15px;
    font-weight: 600;
    color: #4a5568;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    border-bottom: 2px solid #e2e8f0;
}

.container .table tbody tr {
    border-bottom: 1px solid #edf2f7;
    transition: background-color 0.2s ease;
}

.container .table tbody tr:hover {
    background-color: #f8fafc;
}

.container .table td {
    padding: 14px 15px;
    color: #2d3748;
    font-size: 0.95rem;
    vertical-align: middle;
}

/* Badge de statut */
.container td:contains("en_attente"),
.container td:contains("en attente") {
    color: #d69e2e;
    font-weight: 600;
    background: #fefcbf;
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-block;
}

.container td:contains("terminé"),
.container td:contains("termine") {
    color: #38a169;
    font-weight: 600;
    background: #c6f6d5;
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-block;
}

/* === BOUTONS === */
.container .btn {
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    border: none;
    transition: all 0.2s ease;
    margin-right: 8px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.container .btn-primary {
    background: #4299e1;
    color: white;
}

.container .btn-danger {
    background: #e53e3e;
    color: white;
}

.container .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.container .btn:active {
    transform: translateY(0);
}

.container .btn-sm {
    padding: 6px 14px;
    font-size: 0.85rem;
}

/* === PAGINATION === */
.container .pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 30px;
}

.container .pagination .page-link {
    padding: 8px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    color: #4a5568;
    font-weight: 500;
    transition: all 0.2s ease;
}

.container .pagination .page-item.active .page-link {
    background: #4299e1;
    border-color: #4299e1;
    color: white;
}

.container .pagination .page-link:hover {
    background: #4299e1;
    color: white;
    border-color: #4299e1;
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
    .row.mb-4 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .container {
        padding: 20px;
        margin: 15px;
    }
    
    .row.mb-4 {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .container h2 {
        font-size: 1.6rem;
        text-align: center;
    }
    
    .container .btn {
        margin-bottom: 8px;
        width: 100%;
        justify-content: center;
    }
    
    .container form[style*="display:inline"] {
        display: block !important;
        margin-bottom: 10px;
    }
    
    .container .table {
        display: block;
        overflow-x: auto;
    }
}

/* === ANIMATION SIMPLE === */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.row.mb-4 .card {
    animation: fadeInUp 0.4s ease-out forwards;
    animation-delay: calc(var(--i) * 0.1s);
    opacity: 0;
}
</style>
<div class="container">
    <h2>📅 Mon Dashboard Client</h2>

    <!-- Statistiques rapides -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Réservations actives</h5>
                    <p class="card-text">{{ $reservations->where('statut','en_attente')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Réservations terminées</h5>
                    <p class="card-text">{{ $reservations->where('statut','termine')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Signalements</h5>
                    <p class="card-text">{{ $reports->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des réservations -->
    @if($reservations->isEmpty())
        <div class="alert alert-info text-center">
            <h4>Vous n’avez pas encore réservé d’offre.</h4>
            <p>Commencez dès maintenant en parcourant les offres disponibles.</p>
            <a href="{{ route('offers.index') }}" class="btn btn-primary">🔍 Parcourir les offres</a>
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Offre</th>
                    <th>Prestataire</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->offer->titre }}</td>
                    <td>{{ $reservation->offer->user->name }}</td>
                    <td>{{ ucfirst($reservation->statut) }}</td>
                    <td>
                        <!-- Bouton démarrer une discussion -->
                        <form action="{{ route('conversations.start', $reservation) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">💬 Démarrer une discussion</button>
                        </form>

                        <!-- Bouton signaler -->
                        <a href="{{ route('reports.create', $reservation) }}" class="btn btn-danger btn-sm">⚠️ Signaler</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reservations->links() }}
    @endif
</div>
@endsection
