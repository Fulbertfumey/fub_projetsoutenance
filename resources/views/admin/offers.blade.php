@extends('layouts.app')

@section('content')

<<style>
/* Variables modernes pour l'admin */
:root {
    --admin-primary: #7c3aed;
    --admin-primary-dark: #6d28d9;
    --admin-primary-light: #ede9fe;
    --admin-secondary: #0ea5e9;
    --admin-success: #10b981;
    --admin-warning: #f59e0b;
    --admin-danger: #ef4444;
    --admin-dark: #1f2937;
    --admin-light: #f9fafb;
    --admin-gradient: linear-gradient(135deg, #7c3aed 0%, #0ea5e9 100%);
    --admin-gradient-hover: linear-gradient(135deg, #6d28d9 0%, #0284c7 100%);
    --admin-gradient-light: linear-gradient(135deg, #ede9fe 0%, #e0f2fe 100%);
    --admin-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --admin-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --admin-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --admin-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --admin-radius-lg: 20px;
    --admin-radius-md: 12px;
    --admin-radius-sm: 8px;
    --admin-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Conteneur principal */
div[style*="max-width:1100px"] {
    max-width: 1300px !important;
    margin: 60px auto !important;
    padding: 0 20px;
    animation: adminFadeIn 0.8s ease-out;
}

@keyframes adminFadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Titre principal */
h2[style*="text-align:center"] {
    text-align: center !important;
    font-size: 3.2rem !important;
    font-weight: 800 !important;
    margin: 40px auto 50px !important;
    color: transparent !important;
    background: var(--admin-gradient) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    position: relative;
    padding-bottom: 25px;
    letter-spacing: -0.5px;
}

h2[style*="text-align:center"]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 5px;
    background: var(--admin-gradient);
    border-radius: 3px;
    animation: adminTitleLine 2s ease-in-out infinite;
}

@keyframes adminTitleLine {
    0%, 100% {
        width: 150px;
    }
    50% {
        width: 200px;
    }
}

h2[style*="text-align:center"]::before {
    content: '⚙️';
    display: inline-block;
    margin-right: 15px;
    animation: gearIcon 3s linear infinite;
    font-size: 2.8rem;
}

@keyframes gearIcon {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Message de statut */
div[style*="background:#d4edda"] {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0) !important;
    color: #065f46 !important;
    padding: 20px 25px !important;
    border-radius: var(--admin-radius-md) !important;
    margin-bottom: 30px !important;
    border-left: 5px solid var(--admin-success);
    box-shadow: var(--admin-shadow-sm);
    position: relative;
    overflow: hidden;
    animation: adminStatusSlide 0.5s ease-out;
}

@keyframes adminStatusSlide {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

div[style*="background:#d4edda"]::before {
    content: '✅';
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.5rem;
    animation: statusCheck 2s ease-in-out infinite;
}

@keyframes statusCheck {
    0%, 100% {
        transform: translateY(-50%) scale(1);
    }
    50% {
        transform: translateY(-50%) scale(1.2);
    }
}

/* Tableau */
table[style*="width:100%"] {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0;
    border-radius: var(--admin-radius-lg) !important;
    overflow: hidden;
    box-shadow: var(--admin-shadow-lg) !important;
    margin-top: 40px !important;
    background: white;
    border: 1px solid rgba(0,0,0,0.1);
}

/* En-tête du tableau */
table[style*="width:100%"] thead tr[style*="background:#f8f9fa"] {
    background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary)) !important;
}

table[style*="width:100%"] thead th {
    padding: 20px 15px !important;
    border: none !important;
    color: white !important;
    font-weight: 700 !important;
    font-size: 1.1rem;
    text-align: left;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: var(--admin-transition);
}

table[style*="width:100%"] thead th:hover {
    background: rgba(255, 255, 255, 0.1);
}

table[style*="width:100%"] thead th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: white;
    transition: width 0.3s ease;
    border-radius: 2px;
}

table[style*="width:100%"] thead th:hover::after {
    width: 80%;
}

/* Corps du tableau */
table[style*="width:100%"] tbody tr {
    transition: var(--admin-transition);
    background: white;
    position: relative;
}

table[style*="width:100%"] tbody tr:nth-child(even) {
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
}

table[style*="width:100%"] tbody tr:hover {
    background: linear-gradient(135deg, var(--admin-primary-light), #e0f2fe);
    transform: translateY(-2px);
    box-shadow: var(--admin-shadow-sm);
    z-index: 1;
}

table[style*="width:100%"] tbody tr:hover td {
    border-color: transparent;
}

/* Cellules */
table[style*="width:100%"] td {
    padding: 18px 15px !important;
    border: none !important;
    border-bottom: 1px solid #e5e7eb !important;
    color: var(--admin-dark);
    font-size: 1rem;
    transition: var(--admin-transition);
    position: relative;
}

table[style*="width:100%"] tbody tr:last-child td {
    border-bottom: none !important;
}

/* Statut avec badges */
table[style*="width:100%"] td span[style*="color:green"],
table[style*="width:100%"] td span[style*="color:orange"],
table[style*="width:100%"] td span[style*="color:red"] {
    padding: 6px 15px !important;
    border-radius: 20px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--admin-transition);
}

table[style*="width:100%"] td span[style*="color:green"] {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46 !important;
    border: 1px solid var(--admin-success);
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.1);
}

table[style*="width:100%"] td span[style*="color:green"]::before {
    content: '✔';
    font-weight: bold;
    animation: validPulse 2s ease-in-out infinite;
}

@keyframes validPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

table[style*="width:100%"] td span[style*="color:orange"] {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e !important;
    border: 1px solid var(--admin-warning);
    box-shadow: 0 2px 8px rgba(245, 158, 11, 0.1);
    animation: waitingPulse 1.5s ease-in-out infinite;
}

@keyframes waitingPulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

table[style*="width:100%"] td span[style*="color:orange"]::before {
    content: '⏳';
}

table[style*="width:100%"] td span[style*="color:red"] {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b !important;
    border: 1px solid var(--admin-danger);
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.1);
}

table[style*="width:100%"] td span[style*="color:red"]::before {
    content: '❌';
}

/* Cellule des actions */
table[style*="width:100%"] td:last-child {
    min-width: 250px;
}

/* Formulaires d'actions */
table[style*="width:100%"] form {
    display: inline !important;
    margin-right: 8px;
}

table[style*="width:100%"] form:last-child {
    margin-right: 0;
}

/* Boutons d'actions */
table[style*="width:100%"] button[style*="background:green"],
table[style*="width:100%"] button[style*="background:red"] {
    background: linear-gradient(135deg, var(--admin-success), var(--admin-success)) !important;
    color: white !important;
    border: none !important;
    padding: 10px 20px !important;
    font-size: 0.9rem !important;
    font-weight: 600 !important;
    border-radius: var(--admin-radius-sm) !important;
    cursor: pointer !important;
    transition: var(--admin-transition) !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    min-width: 100px;
    justify-content: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
}

table[style*="width:100%"] button[style*="background:red"] {
    background: linear-gradient(135deg, var(--admin-danger), #dc2626) !important;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
}

table[style*="width:100%"] button[style*="background:green"]::before {
    content: '✓';
    font-size: 1.1rem;
    font-weight: bold;
}

table[style*="width:100%"] button[style*="background:red"]::before {
    content: '✗';
    font-size: 1.1rem;
    font-weight: bold;
}

table[style*="width:100%"] button[style*="background:green"]::after,
table[style*="width:100%"] button[style*="background:red"]::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

table[style*="width:100%"] button[style*="background:green"]:hover::after,
table[style*="width:100%"] button[style*="background:red"]:hover::after {
    left: 100%;
}

table[style*="width:100%"] button[style*="background:green"]:hover {
    background: linear-gradient(135deg, #059669, #047857) !important;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
}

table[style*="width:100%"] button[style*="background:red"]:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
}

table[style*="width:100%"] button:active {
    transform: translateY(0) scale(0.98) !important;
}

/* Message "Aucune action" */
table[style*="width:100%"] td em {
    color: #9ca3af;
    font-style: italic;
    font-size: 0.9rem;
}

/* Pagination */
div[style*="margin-top:2rem"]:has(> [role="navigation"]) {
    margin-top: 50px !important;
    padding-top: 30px;
    border-top: 2px solid #f3f4f6;
    display: flex;
    justify-content: center;
}

/* Style de la pagination Laravel */
[role="navigation"] .pagination {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
}

[role="navigation"] .pagination .page-item {
    display: inline-block;
}

[role="navigation"] .pagination .page-link {
    display: inline-block;
    padding: 12px 20px;
    background: white;
    color: var(--admin-dark);
    border: 2px solid #e5e7eb;
    border-radius: var(--admin-radius-sm);
    text-decoration: none;
    font-weight: 600;
    transition: var(--admin-transition);
    min-width: 48px;
    text-align: center;
    font-size: 1rem;
}

[role="navigation"] .pagination .page-item.active .page-link {
    background: var(--admin-gradient);
    color: white;
    border-color: var(--admin-primary);
    box-shadow: var(--admin-shadow-sm);
}

[role="navigation"] .pagination .page-link:hover:not(.active) {
    background: var(--admin-primary-light);
    border-color: var(--admin-primary);
    transform: translateY(-2px);
}

[role="navigation"] .pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    background: #f3f4f6;
}

/* Message "Aucune offre" */
p[style*="text-align:center"] {
    text-align: center !important;
    margin-top: 60px !important;
    padding: 40px;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border-radius: var(--admin-radius-lg);
    font-size: 1.2rem !important;
    color: #6b7280 !important;
    border: 2px dashed #d1d5db;
    position: relative;
}

p[style*="text-align:center"]::before {
    content: '📊';
    display: block;
    font-size: 3rem;
    margin-bottom: 20px;
    animation: noDataIcon 2s ease-in-out infinite;
}

@keyframes noDataIcon {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-10px) rotate(10deg);
        opacity: 1;
    }
}

/* Effets de décoration */
table[style*="width:100%"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.02), transparent);
    pointer-events: none;
    border-radius: var(--admin-radius-lg);
}

/* Animation des lignes au survol */
table[style*="width:100%"] tbody tr {
    animation: tableRowAppear 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

table[style*="width:100%"] tbody tr:nth-child(1) { animation-delay: 0.1s; }
table[style*="width:100%"] tbody tr:nth-child(2) { animation-delay: 0.2s; }
table[style*="width:100%"] tbody tr:nth-child(3) { animation-delay: 0.3s; }
table[style*="width:100%"] tbody tr:nth-child(4) { animation-delay: 0.4s; }
table[style*="width:100%"] tbody tr:nth-child(5) { animation-delay: 0.5s; }

@keyframes tableRowAppear {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1024px) {
    div[style*="max-width:1100px"] {
        padding: 0 15px;
    }
    
    table[style*="width:100%"] {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    
    table[style*="width:100%"] thead th {
        padding: 15px 12px !important;
        font-size: 1rem;
    }
    
    table[style*="width:100%"] td {
        padding: 15px 12px !important;
    }
}

@media (max-width: 768px) {
    div[style*="max-width:1100px"] {
        max-width: 95% !important;
        margin: 40px auto !important;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.5rem !important;
        margin: 30px auto 40px !important;
    }
    
    table[style*="width:100%"] thead th,
    table[style*="width:100%"] td {
        font-size: 0.9rem;
        padding: 12px 10px !important;
    }
    
    table[style*="width:100%"] button[style*="background:green"],
    table[style*="width:100%"] button[style*="background:red"] {
        padding: 8px 15px !important;
        font-size: 0.85rem !important;
        min-width: 85px;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 2rem !important;
    }
    
    table[style*="width:100%"] {
        font-size: 0.85rem;
    }
    
    table[style*="width:100%"] td:last-child {
        min-width: 200px;
    }
    
    [role="navigation"] .pagination .page-link {
        padding: 10px 16px;
        min-width: 40px;
        font-size: 0.9rem;
    }
}

/* Particules décoratives */
div[style*="max-width:1100px"]::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(124, 58, 237, 0.05) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.05) 0%, transparent 20%);
    pointer-events: none;
    z-index: -1;
}

/* Indicateur de statut dans la ligne */
table[style*="width:100%"] tbody tr::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: transparent;
    transition: var(--admin-transition);
}

table[style*="width:100%"] tbody tr:has(td span[style*="color:green"])::before {
    background: var(--admin-success);
}

table[style*="width:100%"] tbody tr:has(td span[style*="color:orange"])::before {
    background: var(--admin-warning);
}

table[style*="width:100%"] tbody tr:has(td span[style*="color:red"])::before {
    background: var(--admin-danger);
}
</style>
<div style="max-width:1100px; margin:auto;">
    <h2 style="text-align:center;">⚙️ Gestion des offres (Admin)</h2>

    @if(session('status'))
        <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
            {{ session('status') }}
        </div>
    @endif

    @if($offers->count() > 0)
        <table style="width:100%; border-collapse:collapse; margin-top:2rem;">
            <thead>
                <tr style="background:#f8f9fa;">
                    <th style="padding:0.8rem; border:1px solid #ddd;">Titre</th>
                    <th style="padding:0.8rem; border:1px solid #ddd;">Catégorie</th>
                    <th style="padding:0.8rem; border:1px solid #ddd;">Prestataire</th>
                    <th style="padding:0.8rem; border:1px solid #ddd;">Prix</th>
                    <th style="padding:0.8rem; border:1px solid #ddd;">Statut</th>
                    <th style="padding:0.8rem; border:1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td style="padding:0.8rem; border:1px solid #ddd;">{{ $offer->titre }}</td>
                        <td style="padding:0.8rem; border:1px solid #ddd;">{{ $offer->category->nom }}</td>
                        <td style="padding:0.8rem; border:1px solid #ddd;">{{ $offer->user->name }}</td>
                        <td style="padding:0.8rem; border:1px solid #ddd;">
                            {{ $offer->prix ? $offer->prix.' FCFA' : 'Non spécifié' }}
                        </td>
                        <td style="padding:0.8rem; border:1px solid #ddd;">
                            @if($offer->statut === 'valide')
                                <span style="color:green;">✔ Validée</span>
                            @elseif($offer->statut === 'en_attente')
                                <span style="color:orange;">⏳ En attente</span>
                            @else
                                <span style="color:red;">❌ Refusée</span>
                            @endif
                        </td>
                        <td style="padding:0.8rem; border:1px solid #ddd;">
                            @if($offer->statut === 'en_attente')
                                <form action="{{ route('offers.validate', $offer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button style="background:green; color:white; padding:0.5rem 1rem;">Valider</button>
                                </form>
                                <form action="{{ route('offers.refuse', $offer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button style="background:red; color:white; padding:0.5rem 1rem;">Refuser</button>
                                </form>
                            @else
                                <em>Aucune action disponible</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:2rem;">
            {{ $offers->links() }}
        </div>
    @else
        <p style="text-align:center; margin-top:2rem;">Aucune offre à gérer pour le moment.</p>
    @endif
</div>
@endsection
