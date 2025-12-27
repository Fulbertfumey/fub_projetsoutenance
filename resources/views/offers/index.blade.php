@extends('layouts.app')

@section('content')

<<style>
/* Variables modernes pour la liste d'offres */
:root {
    --offers-primary: #4f46e5;
    --offers-primary-dark: #4338ca;
    --offers-primary-light: #e0e7ff;
    --offers-secondary: #7c3aed;
    --offers-accent: #06b6d4;
    --offers-success: #10b981;
    --offers-warning: #f59e0b;
    --offers-dark: #1f2937;
    --offers-light: #f9fafb;
    --offers-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    --offers-gradient-hover: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
    --offers-gradient-light: linear-gradient(135deg, #e0e7ff 0%, #f3e8ff 100%);
    --offers-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --offers-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --offers-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --offers-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --offers-radius-lg: 20px;
    --offers-radius-md: 12px;
    --offers-radius-sm: 8px;
    --offers-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Conteneur principal */
div[style*="max-width:1000px"] {
    max-width: 1200px !important;
    margin: 60px auto !important;
    padding: 0 20px;
    animation: offersFadeIn 0.8s ease-out;
}

@keyframes offersFadeIn {
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
    margin: 40px auto 60px !important;
    color: transparent !important;
    background: var(--offers-gradient) !important;
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
    width: 120px;
    height: 5px;
    background: var(--offers-gradient);
    border-radius: 3px;
    animation: titleLine 2s ease-in-out infinite;
}

@keyframes titleLine {
    0%, 100% {
        width: 120px;
    }
    50% {
        width: 180px;
    }
}

h2[style*="text-align:center"]::before {
    content: '📋';
    display: inline-block;
    margin-right: 15px;
    animation: listIcon 2s ease-in-out infinite;
    font-size: 2.8rem;
}

@keyframes listIcon {
    0%, 100% {
        transform: rotate(0deg) scale(1);
    }
    25% {
        transform: rotate(-10deg) scale(1.1);
    }
    50% {
        transform: rotate(10deg) scale(1.1);
    }
    75% {
        transform: rotate(-10deg) scale(1.1);
    }
}

/* Message de succès */
div[style*="background:#d4edda"] {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0) !important;
    color: #065f46 !important;
    padding: 20px 25px !important;
    border-radius: var(--offers-radius-md) !important;
    margin-bottom: 30px !important;
    border-left: 5px solid var(--offers-success);
    box-shadow: var(--offers-shadow-sm);
    position: relative;
    overflow: hidden;
    animation: slideInRight 0.5s ease-out;
}

@keyframes slideInRight {
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
    opacity: 0.3;
}

/* Grille des offres */
div[style*="display:grid"] {
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)) !important;
    gap: 2rem !important;
    margin-top: 40px !important;
}

/* Cartes d'offres */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] {
    border: none !important;
    border-radius: var(--offers-radius-lg) !important;
    padding: 25px !important;
    background: linear-gradient(145deg, #ffffff, #f8fafc) !important;
    box-shadow: var(--offers-shadow-md) !important;
    transition: var(--offers-transition) !important;
    position: relative;
    overflow: hidden;
    border-top: 5px solid var(--offers-primary);
    animation: cardAppear 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(30px);
}

@keyframes cardAppear {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animation progressive pour chaque carte */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:nth-child(1) { animation-delay: 0.1s; }
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:nth-child(2) { animation-delay: 0.2s; }
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:nth-child(3) { animation-delay: 0.3s; }
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:nth-child(4) { animation-delay: 0.4s; }
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:nth-child(5) { animation-delay: 0.5s; }

div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:hover {
    transform: translateY(-10px) scale(1.02) !important;
    box-shadow: var(--offers-shadow-xl) !important;
    border-top-color: var(--offers-secondary);
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.03), transparent);
    border-radius: var(--offers-radius-lg);
    z-index: -1;
    transition: var(--offers-transition);
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:hover::before {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.08), transparent);
}

/* Titre de l'offre */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] h3 {
    font-size: 1.5rem !important;
    font-weight: 700 !important;
    color: var(--offers-dark) !important;
    margin-bottom: 15px !important;
    line-height: 1.4;
    position: relative;
    padding-bottom: 10px;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--offers-gradient);
    border-radius: 2px;
    transition: width 0.3s ease;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"]:hover h3::after {
    width: 80px;
}

/* Informations de l'offre */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p {
    margin-bottom: 12px !important;
    line-height: 1.6;
    color: #4b5563;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p strong {
    color: var(--offers-dark);
    font-weight: 600;
}

/* Catégorie avec badge */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p:first-of-type {
    display: inline-block;
    background: var(--offers-gradient-light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--offers-primary);
    margin-bottom: 15px !important;
    border: 1px solid rgba(79, 70, 229, 0.2);
}

/* Description */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p:nth-of-type(2) {
    font-size: 1rem;
    color: #6b7280;
    min-height: 60px;
    padding: 10px 0;
    border-top: 1px solid #f3f4f6;
    border-bottom: 1px solid #f3f4f6;
    margin: 15px 0 !important;
}

/* Infos de publication */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] {
    font-size: 0.9rem !important;
    color: #9ca3af !important;
    background: #f9fafb;
    padding: 10px 15px;
    border-radius: var(--offers-radius-sm);
    margin-top: 15px !important;
    border-left: 3px solid #d1d5db;
    display: flex;
    align-items: center;
    gap: 8px;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"]::before {
    content: '👤';
    font-size: 1rem;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] strong {
    color: var(--offers-dark);
    margin-left: 5px;
}

/* Bouton Voir détails */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"] > div[style*="margin-top:1rem"] {
    margin-top: 20px !important;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] {
    text-decoration: none !important;
    display: inline-block;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button {
    background: var(--offers-gradient) !important;
    color: white !important;
    border: none !important;
    padding: 12px 25px !important;
    font-size: 1rem !important;
    font-weight: 600 !important;
    border-radius: var(--offers-radius-sm) !important;
    cursor: pointer !important;
    transition: var(--offers-transition) !important;
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 140px;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button:hover::before {
    left: 100%;
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button:hover {
    background: var(--offers-gradient-hover) !important;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button::after {
    content: '🔍';
    font-size: 1.1rem;
    transition: var(--offers-transition);
}

div[style*="display:grid"] > div[style*="border:1px solid #ddd"] a[href*="offers.show"] button:hover::after {
    transform: scale(1.2) rotate(5deg);
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
    padding: 10px 18px;
    background: white;
    color: var(--offers-dark);
    border: 2px solid #e5e7eb;
    border-radius: var(--offers-radius-sm);
    text-decoration: none;
    font-weight: 600;
    transition: var(--offers-transition);
    min-width: 45px;
    text-align: center;
}

[role="navigation"] .pagination .page-item.active .page-link {
    background: var(--offers-gradient);
    color: white;
    border-color: var(--offers-primary);
    box-shadow: var(--offers-shadow-sm);
}

[role="navigation"] .pagination .page-link:hover:not(.active) {
    background: var(--offers-primary-light);
    border-color: var(--offers-primary);
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
    border-radius: var(--offers-radius-lg);
    font-size: 1.2rem !important;
    color: #6b7280 !important;
    border: 2px dashed #d1d5db;
    position: relative;
}

p[style*="text-align:center"]::before {
    content: '📭';
    display: block;
    font-size: 3rem;
    margin-bottom: 20px;
    animation: emptyIcon 2s ease-in-out infinite;
}

@keyframes emptyIcon {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-10px) rotate(10deg);
        opacity: 1;
    }
}

/* Badge de statut (optionnel) */
div[style*="display:grid"] > div[style*="border:1px solid #ddd"]::after {
    content: 'Nouveau';
    position: absolute;
    top: 15px;
    right: -35px;
    background: var(--offers-gradient);
    color: white;
    padding: 5px 40px;
    font-size: 0.8rem;
    font-weight: 600;
    transform: rotate(45deg);
    box-shadow: 0 2px 10px rgba(79, 70, 229, 0.3);
}

/* Responsive */
@media (max-width: 1024px) {
    div[style*="display:grid"] {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)) !important;
        gap: 1.5rem !important;
    }
}

@media (max-width: 768px) {
    div[style*="max-width:1000px"] {
        max-width: 95% !important;
        margin: 40px auto !important;
        padding: 0 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.5rem !important;
        margin: 30px auto 40px !important;
    }
    
    div[style*="display:grid"] > div[style*="border:1px solid #ddd"] {
        padding: 20px !important;
    }
    
    [role="navigation"] .pagination .page-link {
        padding: 8px 14px;
        min-width: 40px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 2rem !important;
    }
    
    div[style*="display:grid"] {
        grid-template-columns: 1fr !important;
    }
    
    div[style*="display:grid"] > div[style*="border:1px solid #ddd"] h3 {
        font-size: 1.3rem !important;
    }
    
    [role="navigation"] .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }
}

/* Effet de particules décoratives */
div[style*="max-width:1000px"]::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(79, 70, 229, 0.05) 0%, transparent 20%),
        radial-gradient(circle at 80% 70%, rgba(124, 58, 237, 0.05) 0%, transparent 20%);
    pointer-events: none;
    z-index: -1;
}
</style>
<div style="max-width:1000px; margin:auto;">
    <h2 style="text-align:center;">📋 Liste des offres disponibles</h2>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($offers->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem; margin-top:2rem;">
            @foreach($offers as $offer)
                <div style="border:1px solid #ddd; border-radius:8px; padding:1rem; background:#fff; box-shadow:0 0 5px rgba(0,0,0,0.05);">
                    <h3>{{ $offer->title }}</h3>
                    <div>
                     <p><strong>Titre :</strong> {{ $offer->titre }}</p>
                        <p><strong>Catégorie :</strong> {{ $offer->category->nom }}</p>
                        <p><em>{{ $offer->category->description }}</em></p>
                        <p><strong>Publié par :</strong> {{ $offer->user->nom }} le {{ $offer->created_at->format('d/m/Y') }}</p>
    
                    </div>
                    <p>{{ Str::limit($offer->description, 120) }}</p>

                    <p style="font-size:0.9rem; color:#555;">Publié par {{ $offer->user->name }} le {{ $offer->created_at->format('d/m/Y') }}</p>

                    <div style="margin-top:1rem;">
                        <a href="{{ route('offers.show', $offer->id) }}">
                            <button>Voir détails</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:2rem;">
            {{ $offers->links() }}
        </div>
    @else
        <p style="text-align:center; margin-top:2rem;">Aucune offre disponible pour le moment.</p>
    @endif
</div>
@endsection
