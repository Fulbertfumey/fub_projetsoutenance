@extends('layouts.app')

@section('content')

<style>
    /* Styles professionnels et éthiques pour le tableau de bord des offres */
.container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    padding: 2rem 1rem;
    max-width: 1200px;
    margin: 0 auto;
}

/* Titre principal avec accessibilité */
h2 {
    color: #1a365d;
    font-weight: 600;
    font-size: 1.75rem;
    margin-bottom: 2rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Grille des statistiques */
.row.mb-4 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

/* Cartes de statistiques */
.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    transition: all 0.3s ease;
    overflow: hidden;
    background: white;
    height: 100%;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.card.text-center {
    text-align: center;
}

.card-body {
    padding: 1.5rem;
}

.card-title {
    color: #4a5568;
    font-size: 0.9rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
}

.card-text {
    color: #2d3748;
    font-size: 2rem;
    font-weight: 700;
    line-height: 1;
}

/* Couleurs éthiques et accessibles */
.bg-success {
    background: linear-gradient(135deg, #38a169 0%, #2f855a 100%) !important;
}

.bg-warning {
    background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%) !important;
    color: #fff !important;
}

.bg-warning .card-text,
.bg-warning .card-title {
    color: #fff;
}

.bg-danger {
    background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%) !important;
}

.text-white {
    color: #fff !important;
}

/* Bouton principal avec focus visible */
.btn-primary {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    border: none;
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    color: white;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3182ce 0%, #2b6cb0 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(66, 153, 225, 0.4);
}

.btn-primary:focus {
    outline: 2px solid #4299e1;
    outline-offset: 2px;
}

/* Tableau */
.table {
    width: 100%;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    border-collapse: collapse;
}

.table thead {
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
}

.table th {
    color: #4a5568;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1rem 1.5rem;
    text-align: left;
    border-bottom: 2px solid #e2e8f0;
}

.table tbody tr {
    transition: background-color 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8fafc;
}

.table td {
    padding: 1rem 1.5rem;
    color: #2d3748;
    border-bottom: 1px solid #edf2f7;
}

/* Badges de statut */
.badge {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.bg-success {
    background-color: #c6f6d5 !important;
    color: #22543d !important;
}

.bg-warning {
    background-color: #feebc8 !important;
    color: #744210 !important;
}

.bg-danger {
    background-color: #fed7d7 !important;
    color: #742a2a !important;
}

/* Boutons d'action */
.btn-info, .btn-danger {
    border: none;
    border-radius: 6px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.btn-info {
    background: #e6fffa;
    color: #234e52;
    margin-right: 0.5rem;
}

.btn-info:hover {
    background: #b2f5ea;
}

.btn-danger {
    background: #fed7d7;
    color: #742a2a;
}

.btn-danger:hover {
    background: #feb2b2;
}

.btn-sm {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
}

/* Pagination (style générique pour les liens) */
.pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
    padding: 1rem;
}

.pagination a, .pagination span {
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    color: #4a5568;
    text-decoration: none;
    transition: all 0.2s ease;
}

.pagination a:hover {
    background: #edf2f7;
    color: #2d3748;
}

.pagination .active {
    background: #4299e1;
    color: white;
}

/* Message d'absence de données */
p {
    color: #718096;
    font-style: italic;
    text-align: center;
    padding: 2rem;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px dashed #cbd5e0;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }
    
    .row.mb-4 {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .table {
        display: block;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table th,
    .table td {
        white-space: nowrap;
    }
}

/* Animation d'entrée subtile */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card, .table, .btn-primary {
    animation: fadeIn 0.5s ease-out;
}

/* Support mode contraste élevé */
@media (prefers-contrast: high) {
    .card {
        border: 2px solid #2d3748;
    }
    
    .btn-primary, .btn-info, .btn-danger {
        border: 2px solid currentColor;
    }
}

/* Support mode réduit de mouvement */
@media (prefers-reduced-motion: reduce) {
    .card, .btn-primary, .table tbody tr {
        transition: none;
    }
    
    .card:hover {
        transform: none;
    }
    
    .btn-primary:hover {
        transform: none;
    }
}
</style>
<div class="container">
    <h2>📋 Mes Offres</h2>

    <!-- Bloc Statistiques -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text">{{ $stats['total'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Validées</h5>
                    <p class="card-text">{{ $stats['validees'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-warning">
                <div class="card-body">
                    <h5 class="card-title">En attente</h5>
                    <p class="card-text">{{ $stats['en_attente'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Refusées</h5>
                    <p class="card-text">{{ $stats['refusees'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('offers.create') }}" class="btn btn-primary mb-3">➕ Publier une nouvelle offre</a>

    @if($offers->isEmpty())
        <p>Vous n’avez pas encore publié d’offre.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Statut</th>
                    <th>Vues</th>
                    <th>Clics</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->titre }}</td>
                    <td>{{ $offer->category->nom ?? 'Non définie' }}</td>
                    <td>
                        @if($offer->statut === 'valide')
                            <span class="badge bg-success">Validée</span>
                        @elseif($offer->statut === 'en_attente')
                            <span class="badge bg-warning">En attente</span>
                        @else
                            <span class="badge bg-danger">Refusée</span>
                        @endif
                    </td>
                    <td>{{ $offer->vues }}</td>
                    <td>{{ $offer->clics }}</td>
                    <td>
                        <a href="{{ route('offers.show', $offer) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('offers.destroy', $offer) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $offers->links() }}
    @endif
</div>
@endsection
