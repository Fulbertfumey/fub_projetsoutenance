@extends('layouts.app')

@section('content')

<style>
    /* Styles professionnels et éthiques pour la gestion des réservations */
.container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    padding: 2rem 1rem;
    max-width: 1200px;
    margin: 0 auto;
}

/* Titre principal */
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

/* Tableau des réservations */
.table {
    width: 100%;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    border-collapse: collapse;
    animation: fadeIn 0.6s ease-out;
}

.table thead {
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
    border-bottom: 2px solid #e2e8f0;
}

.table th {
    color: #4a5568;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1.25rem 1.5rem;
    text-align: left;
    position: relative;
}

.table th:after {
    content: '';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 60%;
    width: 1px;
    background: #e2e8f0;
}

.table th:last-child:after {
    display: none;
}

.table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
}

.table tbody tr:hover {
    background-color: #f8fafc;
    transform: scale(1.002);
}

.table td {
    padding: 1.25rem 1.5rem;
    color: #2d3748;
    vertical-align: middle;
}

/* Colonnes spécifiques */
.table td:first-child {
    font-weight: 500;
    color: #2d3748;
}

.table td:nth-child(2) {
    color: #4a5568;
}

/* Badge de statut dynamique */
.table td:nth-child(3) {
    font-weight: 600;
    text-transform: capitalize;
}

/* Statuts colorés (basés sur le contenu) */
.table td:nth-child(3):contains("confirmé"),
.table td:nth-child(3):contains("validé") {
    color: #2f855a;
    position: relative;
    padding-left: 1.25rem;
}

.table td:nth-child(3):contains("confirmé"):before,
.table td:nth-child(3):contains("validé"):before {
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

.table td:nth-child(3):contains("en attente"),
.table td:nth-child(3):contains("pending") {
    color: #dd6b20;
    position: relative;
    padding-left: 1.25rem;
}

.table td:nth-child(3):contains("en attente"):before,
.table td:nth-child(3):contains("pending"):before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #ed8936;
}

.table td:nth-child(3):contains("annulé"),
.table td:nth-child(3):contains("refusé") {
    color: #c53030;
    position: relative;
    padding-left: 1.25rem;
}

.table td:nth-child(3):contains("annulé"):before,
.table td:nth-child(3):contains("refusé"):before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #e53e3e;
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
    min-height: 40px;
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.8125rem;
    min-height: 36px;
}

.btn-primary {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3182ce 0%, #2b6cb0 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(66, 153, 225, 0.4);
}

.btn-primary:focus-visible {
    outline: 3px solid rgba(66, 153, 225, 0.4);
    outline-offset: 2px;
}

.btn-danger {
    background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(245, 101, 101, 0.3);
}

.btn-danger:hover {
    background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(245, 101, 101, 0.4);
}

.btn-danger:focus-visible {
    outline: 3px solid rgba(245, 101, 101, 0.4);
    outline-offset: 2px;
}

/* Groupe de boutons */
td form {
    display: inline-block;
    margin-right: 0.75rem;
    margin-bottom: 0.5rem;
}

td > a {
    display: inline-block;
    margin-bottom: 0.5rem;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-top: 2.5rem;
    padding: 1.25rem;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    padding: 0.625rem 0.875rem;
    border-radius: 8px;
    color: #4a5568;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
    min-width: 40px;
    text-align: center;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.pagination a:hover:not(.disabled) {
    background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
    color: #2d3748;
    transform: translateY(-1px);
}

.pagination .active {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
}

.pagination .disabled {
    color: #a0aec0;
    cursor: not-allowed;
    opacity: 0.6;
}

/* Message vide */
p {
    color: #718096;
    font-style: italic;
    text-align: center;
    padding: 3rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 12px;
    border: 2px dashed #cbd5e0;
    font-size: 1.125rem;
    margin: 2rem 0;
    animation: fadeIn 0.5s ease-out;
}

/* Icônes dans les boutons */
.btn::before {
    font-size: 1.1em;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 992px) {
    .container {
        padding: 1.5rem 0.75rem;
    }
    
    .table {
        display: block;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 8px;
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
        flex: 0 0 120px;
    }
    
    .table td:first-child:before {
        content: "Offre";
    }
    
    .table td:nth-child(2):before {
        content: "Client";
    }
    
    .table td:nth-child(3):before {
        content: "Statut";
    }
    
    .table td:nth-child(4):before {
        display: none;
    }
    
    td form,
    td > a {
        width: 100%;
        margin: 0;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    h2 {
        font-size: 1.5rem;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }
    
    .pagination {
        gap: 0.25rem;
    }
    
    .pagination a,
    .pagination span {
        padding: 0.5rem;
        min-width: 36px;
        font-size: 0.875rem;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
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
    
    .btn-primary {
        background: #2b6cb0;
    }
    
    .btn-danger {
        background: #c53030;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    .table tbody tr,
    .btn,
    .pagination a {
        transition: none;
    }
    
    .table tbody tr:hover {
        transform: none;
    }
    
    .btn:hover {
        transform: none;
    }
    
    .pagination a:hover {
        transform: none;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
}

/* Support des émoticônes */
[role="img"] {
    font-style: normal;
}

/* Focus styles pour navigation clavier */
*:focus-visible {
    outline: 3px solid #4299e1;
    outline-offset: 2px;
    border-radius: 4px;
}
</style>
<div class="container">
    <h2>📅 Mes Réservations</h2>

    @if($reservations->isEmpty())
        <p>Aucune réservation pour le moment.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Offre</th>
                    <th>Client</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->offer->titre }}</td>
                    <td>{{ $reservation->client->name }}</td>
                    <td>{{ $reservation->statut }}</td>
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
