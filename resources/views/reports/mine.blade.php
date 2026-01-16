@extends('layouts.app')

@section('content')
<style>
    /* Styles professionnels et éthiques pour la liste des signalements */
[style*="max-width:900px"] {
    max-width: 900px !important;
    margin: 2rem auto !important;
    padding: 0 1rem !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif !important;
}

/* Titre principal */
h2[style*="text-align:center"] {
    text-align: center !important;
    color: #1a365d !important;
    font-weight: 700 !important;
    font-size: 2rem !important;
    margin-bottom: 2.5rem !important;
    padding-bottom: 1rem !important;
    border-bottom: 3px solid #e53e3e !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.75rem !important;
    animation: fadeInDown 0.5s ease-out !important;
}

/* Message de statut */
[style*="background:#d4edda"] {
    background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%) !important;
    color: #22543d !important;
    padding: 1.25rem 1.5rem !important;
    border-radius: 10px !important;
    margin-bottom: 1.5rem !important;
    border-left: 4px solid #38a169 !important;
    font-weight: 500 !important;
    display: flex !important;
    align-items: center !important;
    gap: 0.75rem !important;
    animation: slideInRight 0.4s ease-out !important;
    box-shadow: 0 2px 8px rgba(56, 161, 105, 0.1) !important;
}

[style*="background:#d4edda"]::before {
    content: '✓';
    font-size: 1.25rem;
    font-weight: bold;
}

/* Tableau des signalements */
table[style*="width:100%; border-collapse:collapse"] {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    margin-top: 2rem !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06) !important;
    animation: fadeInUp 0.6s ease-out !important;
    background: white !important;
}

/* En-tête du tableau */
thead tr[style*="background:#f8f9fa"] {
    background: linear-gradient(135deg, #1a365d 0%, #2d3748 100%) !important;
}

thead tr[style*="background:#f8f9fa"] th {
    color: white !important;
    font-weight: 600 !important;
    font-size: 0.8125rem !important;
    text-transform: uppercase !important;
    letter-spacing: 0.05em !important;
    padding: 1rem 1.25rem !important;
    border: none !important;
    text-align: left !important;
    position: relative !important;
}

/* Séparateurs entre les colonnes de l'en-tête */
thead tr[style*="background:#f8f9fa"] th:not(:last-child)::after {
    content: '';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 60%;
    width: 1px;
    background: rgba(255, 255, 255, 0.15);
}

/* Corps du tableau */
table[style*="width:100%; border-collapse:collapse"] tbody tr {
    transition: all 0.2s ease !important;
    border-bottom: 1px solid #f1f5f9 !important;
}

table[style*="width:100%; border-collapse:collapse"] tbody tr:hover {
    background-color: #f8fafc !important;
    transform: translateX(4px) !important;
}

/* Cellules du tableau */
table[style*="width:100%; border-collapse:collapse"] td {
    padding: 1.25rem 1.5rem !important;
    color: #2d3748 !important;
    vertical-align: middle !important;
    border: 1px solid #e2e8f0 !important;
    font-size: 0.9375rem !important;
    line-height: 1.5 !important;
}

/* Colonnes spécifiques */
table[style*="width:100%; border-collapse:collapse"] td:first-child {
    font-weight: 500 !important;
    color: #2d3748 !important;
    border-left: none !important;
}

table[style*="width:100%; border-collapse:collapse"] td:last-child {
    border-right: none !important;
}

/* Style pour les statuts */
table[style*="width:100%; border-collapse:collapse"] td:nth-child(3) {
    font-weight: 600 !important;
    text-transform: capitalize !important;
    position: relative !important;
    padding-left: 1.75rem !important;
}

/* Indicateurs visuels pour les statuts */
td:nth-child(3):contains("en attente"),
td:nth-child(3):contains("pending") {
    color: #ed8936 !important;
}

td:nth-child(3):contains("en attente"):before,
td:nth-child(3):contains("pending"):before {
    content: '' !important;
    position: absolute !important;
    left: 1rem !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 8px !important;
    height: 8px !important;
    border-radius: 50% !important;
    background-color: #ed8936 !important;
    animation: pulse 2s infinite !important;
}

td:nth-child(3):contains("traité"),
td:nth-child(3):contains("traite"),
td:nth-child(3):contains("resolved") {
    color: #38a169 !important;
}

td:nth-child(3):contains("traité"):before,
td:nth-child(3):contains("traite"):before,
td:nth-child(3):contains("resolved"):before {
    content: '' !important;
    position: absolute !important;
    left: 1rem !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 8px !important;
    height: 8px !important;
    border-radius: 50% !important;
    background-color: #38a169 !important;
}

td:nth-child(3):contains("rejeté"),
td:nth-child(3):contains("rejete"),
td:nth-child(3):contains("rejected") {
    color: #e53e3e !important;
}

td:nth-child(3):contains("rejeté"):before,
td:nth-child(3):contains("rejete"):before,
td:nth-child(3):contains("rejected"):before {
    content: '' !important;
    position: absolute !important;
    left: 1rem !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 8px !important;
    height: 8px !important;
    border-radius: 50% !important;
    background-color: #e53e3e !important;
}

/* Message vide */
p[style*="text-align:center; margin-top:2rem"] {
    text-align: center !important;
    margin-top: 3rem !important;
    padding: 2.5rem !important;
    color: #718096 !important;
    font-style: italic !important;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%) !important;
    border-radius: 12px !important;
    border: 2px dashed #cbd5e0 !important;
    font-size: 1.125rem !important;
    line-height: 1.6 !important;
    animation: fadeIn 0.8s ease-out !important;
}

p[style*="text-align:center; margin-top:2rem"]::before {
    content: '📭';
    font-size: 2rem;
    display: block;
    margin-bottom: 1rem;
    opacity: 0.6;
}

/* Pagination */
[style*="margin-top:1rem"] {
    margin-top: 2rem !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    gap: 0.5rem !important;
    padding: 1.5rem !important;
    background: #f8fafc !important;
    border-radius: 10px !important;
    flex-wrap: wrap !important;
    animation: fadeIn 0.5s ease-out !important;
}

/* Styles pour les liens de pagination Laravel */
.pagination {
    display: flex !important;
    gap: 0.5rem !important;
    align-items: center !important;
    flex-wrap: wrap !important;
}

.pagination a,
.pagination span {
    padding: 0.625rem 0.875rem !important;
    border-radius: 8px !important;
    color: #4a5568 !important;
    text-decoration: none !important;
    font-weight: 500 !important;
    transition: all 0.2s ease !important;
    min-width: 40px !important;
    text-align: center !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: white !important;
    border: 1px solid #e2e8f0 !important;
}

.pagination a:hover:not(.disabled) {
    background: #4299e1 !important;
    color: white !important;
    border-color: #4299e1 !important;
    transform: translateY(-1px) !important;
}

.pagination .active {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%) !important;
    color: white !important;
    border-color: #3182ce !important;
}

.pagination .disabled {
    opacity: 0.5 !important;
    cursor: not-allowed !important;
    background: #e2e8f0 !important;
}

/* Animations */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
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
@media (max-width: 768px) {
    [style*="max-width:900px"] {
        padding: 0 0.75rem !important;
        margin: 1.5rem auto !important;
    }
    
    h2[style*="text-align:center"] {
        font-size: 1.5rem !important;
        margin-bottom: 2rem !important;
        padding-bottom: 0.75rem !important;
    }
    
    [style*="background:#d4edda"] {
        padding: 1rem 1.25rem !important;
        font-size: 0.9375rem !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] {
        display: block !important;
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch !important;
        border-radius: 8px !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] thead {
        display: none !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] tbody tr {
        display: block !important;
        margin-bottom: 1rem !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        padding: 1rem !important;
        background: white !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td {
        display: flex !important;
        justify-content: space-between !important;
        align-items: flex-start !important;
        padding: 0.75rem 0 !important;
        border: none !important;
        border-bottom: 1px solid #f1f5f9 !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:last-child {
        border-bottom: none !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:before {
        content: attr(data-label) !important;
        font-weight: 600 !important;
        color: #4a5568 !important;
        text-transform: uppercase !important;
        font-size: 0.75rem !important;
        letter-spacing: 0.05em !important;
        margin-right: 1rem !important;
        flex: 0 0 100px !important;
    }
    
    /* Ajout des labels pour les colonnes */
    table[style*="width:100%; border-collapse:collapse"] td:nth-child(1):before {
        content: "Offre" !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:nth-child(2):before {
        content: "Motif" !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:nth-child(3):before {
        content: "Statut" !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:nth-child(4):before {
        content: "Date" !important;
    }
    
    /* Ajustement des indicateurs de statut */
    table[style*="width:100%; border-collapse:collapse"] td:nth-child(3) {
        padding-left: 1.25rem !important;
    }
    
    td:nth-child(3):contains("en attente"):before,
    td:nth-child(3):contains("traité"):before,
    td:nth-child(3):contains("rejeté"):before {
        left: 0 !important;
    }
    
    p[style*="text-align:center; margin-top:2rem"] {
        padding: 2rem 1rem !important;
        font-size: 1rem !important;
        margin-top: 2rem !important;
    }
    
    [style*="margin-top:1rem"] {
        padding: 1rem !important;
        gap: 0.375rem !important;
    }
    
    .pagination a,
    .pagination span {
        padding: 0.5rem 0.75rem !important;
        min-width: 36px !important;
        font-size: 0.875rem !important;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 1.25rem !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td:before {
        flex: 0 0 80px !important;
        font-size: 0.6875rem !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td {
        font-size: 0.875rem !important;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
    table[style*="width:100%; border-collapse:collapse"] {
        border: 2px solid #2d3748 !important;
    }
    
    thead tr[style*="background:#f8f9fa"] {
        background: #1a202c !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] td {
        border: 1px solid #2d3748 !important;
    }
    
    [style*="background:#d4edda"] {
        border: 2px solid #22543d !important;
        background: #c6f6d5 !important;
    }
    
    p[style*="text-align:center; margin-top:2rem"] {
        border: 2px dashed #2d3748 !important;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    h2[style*="text-align:center"],
    [style*="background:#d4edda"],
    table[style*="width:100%; border-collapse:collapse"],
    p[style*="text-align:center; margin-top:2rem"],
    [style*="margin-top:1rem"] {
        animation: none !important;
    }
    
    table[style*="width:100%; border-collapse:collapse"] tbody tr:hover {
        transform: none !important;
    }
    
    .pagination a:hover {
        transform: none !important;
    }
    
    td:nth-child(3):contains("en attente"):before {
        animation: none !important;
    }
}

/* Support des émoticônes dans les titres */
h2[style*="text-align:center"] [role="img"] {
    font-style: normal !important;
}

/* Style pour les offres supprimées */
td:contains("Offre supprimée") {
    color: #718096 !important;
    font-style: italic !important;
}

/* Effet de profondeur sur le tableau */
table[style*="width:100%; border-collapse:collapse"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    pointer-events: none;
}

/* Amélioration de la pagination */
.pagination-info {
    font-size: 0.875rem;
    color: #718096;
    margin-left: auto;
}

/* Tri des colonnes (optionnel pour futures fonctionnalités) */
.sortable {
    cursor: pointer;
    position: relative;
    padding-right: 1.5rem !important;
}

.sortable::after {
    content: '↕️';
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.75rem;
    opacity: 0.5;
}
</style>
<div style="max-width:900px; margin:auto;">
    <h2 style="text-align:center;">📢 Mes signalements</h2>

    @if(session('status'))
        <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
            {{ session('status') }}
        </div>
    @endif

    @if($reports->count() > 0)
        <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
            <thead>
                <tr style="background:#f8f9fa;">
                    <th style="border:1px solid #ddd; padding:0.5rem;">Offre</th>
                    <th style="border:1px solid #ddd; padding:0.5rem;">Motif</th>
                    <th style="border:1px solid #ddd; padding:0.5rem;">Statut</th>
                    <th style="border:1px solid #ddd; padding:0.5rem;">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td style="border:1px solid #ddd; padding:0.5rem;">
                            {{ $report->reservation->offer->titre ?? 'Offre supprimée' }}
                        </td>
                        <td style="border:1px solid #ddd; padding:0.5rem;">
                            {{ $report->motif }}
                        </td>
                        <td style="border:1px solid #ddd; padding:0.5rem;">
                            {{ ucfirst($report->statut) }}
                        </td>
                        <td style="border:1px solid #ddd; padding:0.5rem;">
                            {{ $report->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            {{ $reports->links() }}
        </div>
    @else
        <p style="text-align:center; margin-top:2rem;">Vous n’avez fait aucun signalement pour le moment.</p>
    @endif

      <a href="{{ route('dashboard.client') }}">
                              <button>⬅ dashboard</button>
                          </a>
                     </div>
</div>
@endsection
