@extends('layouts.app')

@section('content')

<style>
/* Styles professionnels et éthiques pour le Dashboard Admin */
.container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    padding: 2rem 1rem;
    max-width: 1400px;
    margin: 0 auto;
}

/* Titre principal */
h2 {
    color: #1a365d;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 0.75rem;
    border-bottom: 3px solid #4299e1;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Titres secondaires */
h4 {
    color: #2d3748;
    font-weight: 600;
    font-size: 1.25rem;
    margin: 2.5rem 0 1.5rem 0;
    padding: 0.75rem 1rem;
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
    border-radius: 8px;
    border-left: 4px solid #4a5568;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Grille des statistiques */
.row.mb-4 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

/* Cartes de statistiques */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
    animation: slideUp 0.5s ease-out backwards;
}

.card:nth-child(1) { animation-delay: 0.1s; }
.card:nth-child(2) { animation-delay: 0.2s; }
.card:nth-child(3) { animation-delay: 0.3s; }
.card:nth-child(4) { animation-delay: 0.4s; }

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px -4px rgba(0, 0, 0, 0.12);
}

.card-body {
    padding: 1.75rem;
    position: relative;
}

.card-title {
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
    opacity: 0.9;
}

.card-text {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1;
    margin: 0;
}

/* Couleurs des cartes avec gradients accessibles */
.text-white.bg-success {
    background: linear-gradient(135deg, #38a169 0%, #2f855a 100%) !important;
}

.text-white.bg-danger {
    background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%) !important;
}

.text-white.bg-warning {
    background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%) !important;
}

.text-white.bg-info {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%) !important;
}

/* Badge indicateur (optionnel) */
.card-body::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 60px;
    height: 60px;
    opacity: 0.1;
    background: currentColor;
    border-radius: 0 0 0 60px;
}

/* Tableaux */
.table {
    width: 100%;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    border-collapse: collapse;
    margin-bottom: 2rem;
    animation: fadeIn 0.6s ease-out;
}

.table thead {
    background: linear-gradient(135deg, #1a365d 0%, #2d3748 100%);
}

.table th {
    color: white;
    font-weight: 600;
    font-size: 0.8125rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1.25rem 1.5rem;
    text-align: left;
    border-bottom: none;
}

.table tbody tr {
    transition: background-color 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
}

.table tbody tr:hover {
    background-color: #f8fafc;
}

.table td {
    padding: 1.25rem 1.5rem;
    color: #2d3748;
    vertical-align: middle;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #fafbfc;
}

/* Cellules spécifiques */
.table td:last-child {
    min-width: 200px;
}

/* Badge de statut dans les signalements */
td:nth-child(5) {
    font-weight: 600;
    text-transform: capitalize;
}

td:nth-child(5):contains("en attente") {
    color: #ed8936;
    position: relative;
    padding-left: 1.25rem;
}

td:nth-child(5):contains("en attente"):before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #ed8936;
    animation: pulse 2s infinite;
}

td:nth-child(5):contains("traité") {
    color: #38a169;
    position: relative;
    padding-left: 1.25rem;
}

td:nth-child(5):contains("traité"):before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #38a169;
}

/* Boutons d'action */
.btn {
    border: none;
    border-radius: 8px;
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    min-height: 38px;
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.8125rem;
    min-height: 34px;
}

.btn-success {
    background: linear-gradient(135deg, #38a169 0%, #2f855a 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(56, 161, 105, 0.3);
}

.btn-success:hover {
    background: linear-gradient(135deg, #2f855a 0%, #276749 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(56, 161, 105, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(229, 62, 62, 0.3);
}

.btn-danger:hover {
    background: linear-gradient(135deg, #c53030 0%, #9b2c2c 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(229, 62, 62, 0.4);
}

.btn-primary {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3182ce 0%, #2b6cb0 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(66, 153, 225, 0.4);
}

/* Focus visible pour accessibilité */
.btn:focus-visible {
    outline: 3px solid rgba(66, 153, 225, 0.5);
    outline-offset: 2px;
}

/* Groupe de boutons */
td form {
    display: inline-block;
    margin-right: 0.5rem;
    margin-bottom: 0.25rem;
}

/* Messages d'absence de données */
p {
    color: #718096;
    font-style: italic;
    text-align: center;
    padding: 2.5rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 12px;
    border: 2px dashed #cbd5e0;
    margin: 1.5rem 0;
    font-size: 1.125rem;
}

/* Séparateurs */
.mt-5 {
    margin-top: 3rem !important;
    padding-top: 2rem;
    border-top: 2px solid #e2e8f0;
}

/* Animations */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(237, 137, 54, 0.4);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(237, 137, 54, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(237, 137, 54, 0);
    }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .row.mb-4 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .container {
        padding: 1.5rem 0.75rem;
    }
    
    h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    h4 {
        font-size: 1.125rem;
        margin: 2rem 0 1rem 0;
    }
    
    .row.mb-4 {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .card-text {
        font-size: 1.875rem;
    }
    
    .table {
        display: block;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table thead {
        display: none;
    }
    
    .table tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    
    .table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border: none;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .table td:last-child {
        border-bottom: none;
        padding-top: 1rem;
        flex-direction: column;
        align-items: stretch;
        gap: 0.5rem;
    }
    
    .table td:before {
        content: attr(data-label);
        font-weight: 600;
        color: #4a5568;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        margin-right: 1rem;
        flex: 0 0 150px;
    }
    
    /* Labels pour le tableau des offres */
    .table:first-of-type td:first-child:before { content: "Titre"; }
    .table:first-of-type td:nth-child(2):before { content: "Prestataire"; }
    .table:first-of-type td:nth-child(3):before { display: none; }
    
    /* Labels pour le tableau des signalements */
    .table:last-of-type td:first-child:before { content: "Réservation"; }
    .table:last-of-type td:nth-child(2):before { content: "Reporter"; }
    .table:last-of-type td:nth-child(3):before { content: "Utilisateur signalé"; }
    .table:last-of-type td:nth-child(4):before { content: "Motif"; }
    .table:last-of-type td:nth-child(5):before { content: "Statut"; }
    .table:last-of-type td:nth-child(6):before { display: none; }
    
    td form {
        width: 100%;
        margin: 0;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
    
    p {
        padding: 2rem 1rem;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 1.25rem;
    }
    
    h4 {
        font-size: 1rem;
    }
    
    .card-body {
        padding: 1.25rem;
    }
    
    .card-text {
        font-size: 1.5rem;
    }
    
    .btn-sm {
        padding: 0.625rem;
        font-size: 0.75rem;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
    .card {
        border: 2px solid #2d3748;
    }
    
    .table {
        border: 2px solid #2d3748;
    }
    
    .table th {
        background: #1a202c;
        color: #fff;
    }
    
    .table td {
        border-bottom: 2px solid #2d3748;
    }
    
    .btn {
        border: 2px solid currentColor;
    }
    
    .text-white.bg-success { background: #2f855a !important; }
    .text-white.bg-danger { background: #c53030 !important; }
    .text-white.bg-warning { background: #dd6b20 !important; }
    .text-white.bg-info { background: #3182ce !important; }
    
    h4 {
        border: 2px solid #4a5568;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    .card, .table {
        animation: none;
    }
    
    .card:hover {
        transform: none;
    }
    
    .btn:hover {
        transform: none;
    }
    
    td:nth-child(5):contains("en attente"):before {
        animation: none;
    }
    
    @keyframes slideUp {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
}

/* États de chargement (pour futures fonctionnalités) */
.loading {
    position: relative;
    opacity: 0.7;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top-color: currentColor;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    transform: translate(-50%, -50%);
}

@keyframes spin {
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

/* Indicateur de priorité pour les signalements urgents */
tr:has(td:contains("urgence")) {
    border-left: 4px solid #e53e3e;
    background: linear-gradient(90deg, #fff5f5 0%, white 100%);
}

/* Style pour les nombres importants */
.card-text:contains("0") {
    opacity: 0.6;
}

.card-text:not(:contains("0")) {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Support des émoticônes dans les titres */
h2 [role="img"], h4 [role="img"] {
    font-style: normal;
}
</style>
<div class="container">
    <h2>⚙️ Dashboard Admin</h2>

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
    <h4>📋 Offres en attente de validation</h4>
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
                            <button type="submit" class="btn btn-success btn-sm">✅ Valider</button>
                        </form>
                        <form action="{{ route('admin.offers.refuse', $offer) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">❌ Refuser</button>
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
            <button type="submit">✅ Valider</button>
        </form>

        <form action="{{ route('admin.ads.refuser', $ad->id) }}" method="POST">
            @csrf
            <button type="submit">❌ Refuser</button>
        </form>
    @endif
@endforeach


    <!-- Tableau des signalements -->
    <h4 class="mt-5">⚠️ Signalements</h4>
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
                            <button type="submit" class="btn btn-primary btn-sm">🔧 Traiter</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
