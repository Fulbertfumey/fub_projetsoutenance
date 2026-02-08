@extends('layouts.app')

@section('content')

<style>
    /* Variables modernes pour les détails d'offre */
:root {
    --offer-primary: #4f46e5;
    --offer-primary-dark: #4338ca;
    --offer-primary-light: #e0e7ff;
    --offer-secondary: #7c3aed;
    --offer-accent: #06b6d4;
    --offer-success: #10b981;
    --offer-dark: #1f2937;
    --offer-light: #f9fafb;
    --offer-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    --offer-gradient-hover: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
    --offer-gradient-light: linear-gradient(135deg, #e0e7ff 0%, #f3e8ff 100%);
    --offer-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --offer-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --offer-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --offer-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --offer-radius-lg: 20px;
    --offer-radius-md: 12px;
    --offer-radius-sm: 8px;
    --offer-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Conteneur principal */
div[style*="max-width:800px"] {
    max-width: 900px !important;
    margin: 60px auto !important;
    padding: 0 20px;
    animation: offerDetailFadeIn 0.8s ease-out;
}

@keyframes offerDetailFadeIn {
    from {
        opacity: 0;
        transform: translateY(40px);
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
    background: var(--offer-gradient) !important;
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
    width: 100px;
    height: 5px;
    background: var(--offer-gradient);
    border-radius: 3px;
    animation: detailTitleLine 2s ease-in-out infinite;
}

@keyframes detailTitleLine {
    0%, 100% {
        width: 100px;
    }
    50% {
        width: 150px;
    }
}

h2[style*="text-align:center"]::before {
    content: '';
    display: inline-block;
    margin-right: 15px;
    animation: pinIcon 2s ease-in-out infinite;
    font-size: 2.8rem;
}

@keyframes pinIcon {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    25% {
        transform: translateY(-10px) rotate(-15deg);
    }
    50% {
        transform: translateY(-5px) rotate(15deg);
    }
    75% {
        transform: translateY(-10px) rotate(-15deg);
    }
}

/* Carte de détails */
div[style*="border:1px solid #ddd"] {
    border: none !important;
    border-radius: var(--offer-radius-lg) !important;
    padding: 40px !important;
    background: linear-gradient(145deg, #ffffff, #f8fafc) !important;
    box-shadow: var(--offer-shadow-lg) !important;
    margin-top: 30px !important;
    position: relative;
    overflow: hidden;
    transition: var(--offer-transition);
    border-left: 8px solid var(--offer-primary) !important;
}

div[style*="border:1px solid #ddd"]:hover {
    box-shadow: var(--offer-shadow-xl) !important;
    transform: translateY(-5px);
}

div[style*="border:1px solid #ddd"]::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(79, 70, 229, 0.05) 0%, transparent 70%);
    z-index: 0;
}

/* Titre de l'offre */
div[style*="border:1px solid #ddd"] h3 {
    font-size: 2.5rem !important;
    font-weight: 800 !important;
    color: var(--offer-dark) !important;
    margin-bottom: 25px !important;
    line-height: 1.3;
    position: relative;
    padding-bottom: 20px;
    z-index: 1;
}

div[style*="border:1px solid #ddd"] h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 4px;
    background: var(--offer-gradient);
    border-radius: 2px;
    transition: width 0.3s ease;
}

div[style*="border:1px solid #ddd"]:hover h3::after {
    width: 120px;
}

/* Catégorie */
div[style*="border:1px solid #ddd"] p:first-of-type {
    font-size: 1.1rem !important;
    color: var(--offer-primary) !important;
    margin-bottom: 30px !important;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--offer-gradient-light);
    padding: 10px 20px;
    border-radius: 30px;
    font-weight: 600;
    border: 2px solid rgba(79, 70, 229, 0.2);
    position: relative;
    z-index: 1;
}

div[style*="border:1px solid #ddd"] p:first-of-type strong {
    color: var(--offer-primary-dark);
    margin-right: 8px;
}

div[style*="border:1px solid #ddd"] p:first-of-type::after {
    content: '';
    font-size: 1.2rem;
    animation: tagFloat 3s ease-in-out infinite;
}

@keyframes tagFloat {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-5px) rotate(10deg);
    }
}

/* Description */
div[style*="border:1px solid #ddd"] p:nth-of-type(2) {
    font-size: 1.2rem !important;
    line-height: 1.8 !important;
    color: #4b5563 !important;
    margin: 30px 0 !important;
    padding: 25px;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border-radius: var(--offer-radius-md);
    border-left: 4px solid var(--offer-primary);
    position: relative;
    z-index: 1;
    box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.02);
}

/* Image de l'offre */
div[style*="border:1px solid #ddd"] img[alt="Image de l'offre"] {
    width: 100% !important;
    border-radius: var(--offer-radius-md) !important;
    margin-top: 30px !important;
    box-shadow: var(--offer-shadow-lg) !important;
    transition: var(--offer-transition) !important;
    border: 3px solid white;
    position: relative;
    z-index: 1;
}

div[style*="border:1px solid #ddd"] img[alt="Image de l'offre"]:hover {
    transform: scale(1.02);
    box-shadow: var(--offer-shadow-xl) !important;
}

div[style*="border:1px solid #ddd"] img[alt="Image de l'offre"]::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), transparent);
    border-radius: var(--offer-radius-md);
    pointer-events: none;
}

/* Informations de publication */
div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] {
    font-size: 1rem !important;
    color: #6b7280 !important;
    margin-top: 30px !important;
    padding: 20px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: var(--offer-radius-md);
    border-left: 4px solid #9ca3af;
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
    z-index: 1;
    transition: var(--offer-transition);
}

div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"]:hover {
    transform: translateX(10px);
    background: linear-gradient(135deg, #e5e7eb, #d1d5db);
}

div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"]::before {
    content: '👤';
    font-size: 1.3rem;
    animation: userIcon 3s ease-in-out infinite;
}

@keyframes userIcon {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] strong {
    color: var(--offer-dark);
    margin-left: 5px;
}

/* Bouton Retour */
div[style*="border:1px solid #ddd"] > div[style*="margin-top:1.5rem"] {
    margin-top: 40px !important;
    padding-top: 25px;
    border-top: 2px solid #e5e7eb;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
    position: relative;
    z-index: 1;
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] {
    text-decoration: none !important;
    display: inline-block;
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button {
    background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    color: white !important;
    border: none !important;
    padding: 14px 30px !important;
    font-size: 1.1rem !important;
    font-weight: 600 !important;
    border-radius: var(--offer-radius-sm) !important;
    cursor: pointer !important;
    transition: var(--offer-transition) !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    min-width: 180px;
    justify-content: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(107, 114, 128, 0.2);
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button::before {
    content: '⬅';
    font-size: 1.2rem;
    transition: var(--offer-transition);
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button:hover::after {
    left: 100%;
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button:hover {
    background: linear-gradient(135deg, #4b5563, #374151) !important;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 25px rgba(107, 114, 128, 0.3);
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button:hover::before {
    transform: translateX(-5px);
}

div[style*="border:1px solid #ddd"] a[href*="offers.index"] button:active {
    transform: translateY(-1px) scale(1.02);
}

/* Effets de décoration */
div[style*="border:1px solid #ddd"]::after {
    content: '';
    position: absolute;
    bottom: -20px;
    right: -20px;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(124, 58, 237, 0.05) 0%, transparent 70%);
    z-index: 0;
}

/* Badge visuel pour la carte */
div[style*="border:1px solid #ddd"]::before {
    content: 'OFFRE';
    position: absolute;
    top: 20px;
    right: -35px;
    background: var(--offer-gradient);
    color: white;
    padding: 8px 40px;
    font-size: 0.9rem;
    font-weight: 700;
    transform: rotate(45deg);
    box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    letter-spacing: 1px;
    z-index: 2;
}

/* Responsive */
@media (max-width: 768px) {
    div[style*="max-width:800px"] {
        max-width: 95% !important;
        margin: 40px auto !important;
        padding: 0 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.5rem !important;
        margin: 30px auto 40px !important;
    }
    
    div[style*="border:1px solid #ddd"] {
        padding: 30px !important;
    }
    
    div[style*="border:1px solid #ddd"] h3 {
        font-size: 2rem !important;
    }
    
    div[style*="border:1px solid #ddd"] p:nth-of-type(2) {
        font-size: 1.1rem !important;
        padding: 20px !important;
    }
    
    div[style*="border:1px solid #ddd"] a[href*="offers.index"] button {
        padding: 12px 25px !important;
        font-size: 1rem !important;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 2rem !important;
    }
    
    div[style*="border:1px solid #ddd"] {
        padding: 25px 20px !important;
    }
    
    div[style*="border:1px solid #ddd"] h3 {
        font-size: 1.7rem !important;
    }
    
    div[style*="border:1px solid #ddd"] p:first-of-type {
        padding: 8px 16px;
        font-size: 1rem !important;
    }
    
    div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] {
        padding: 15px !important;
        font-size: 0.95rem !important;
    }
}

/* Effet de particules décoratives */
div[style*="max-width:800px"]::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(79, 70, 229, 0.05) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(124, 58, 237, 0.05) 0%, transparent 20%);
    pointer-events: none;
    z-index: -1;
}

/* Animation pour l'image au chargement */
@keyframes imageLoad {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

div[style*="border:1px solid #ddd"] img[alt="Image de l'offre"] {
    animation: imageLoad 0.8s ease-out;
}

/* Effet de surbrillance sur la description */
div[style*="border:1px solid #ddd"] p:nth-of-type(2)::selection {
    background: var(--offer-primary-light);
    color: var(--offer-primary-dark);
}

/* Indicateur de statut (optionnel) */
div[style*="border:1px solid #ddd"]::after {
    content: 'ACTIVE';
    position: absolute;
    top: 40px;
    left: -35px;
    background: var(--offer-success);
    color: white;
    padding: 6px 30px;
    font-size: 0.8rem;
    font-weight: 600;
    transform: rotate(-45deg);
    box-shadow: 0 3px 10px rgba(16, 185, 129, 0.3);
    letter-spacing: 1px;
    z-index: 2;
}
</style>
<div style="max-width:800px; margin:auto;">
    <h2 style="text-align:center;"> Détails de l’offre</h2>

    <div style="border:1px solid #ddd; border-radius:8px; padding:2rem; background:#fff; box-shadow:0 0 5px rgba(0,0,0,0.05); margin-top:1.5rem;">
        <h3>{{ $offer->title }}</h3>
            <div>
                <p><strong>Titre :</strong> {{ $offer->titre }}</p>
                <p><strong>Catégorie :</strong> {{ $offer->category->nom }}</p>
                <p><em>{{ $offer->category->description }}</em></p>
                <p><strong>Publié par :</strong> {{ $offer->user->nom }} le {{ $offer->created_at->format('d/m/Y') }}</p>
               
            </div>
        <p>{{ $offer->description }}</p>

        @if($offer->image)
            <img src="{{ asset('storage/'.$offer->image) }}" alt="Image de l’offre" style="width:100%; border-radius:6px; margin-top:1rem;">
        @endif

        <p style="font-size:0.9rem; color:#555; margin-top:1rem;">
            Publié par <strong>{{ $offer->user->name }}</strong> le {{ $offer->created_at->format('d/m/Y à H:i') }}
        </p>
        

        @if(Auth::check() && Auth::user()->isClient())
    <form method="POST" action="{{ route('reservations.store', $offer->id) }}" style="margin-top:1rem;">
        @csrf
        <input type="hidden" name="type" value="reservation">

        <label for="date_souhaitee">Date souhaitée :</label>
        <input type="date" name="date_souhaitee" id="date_souhaitee">

        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="3" style="width:100%;"></textarea>

        <button type="submit" style="margin-top:0.5rem;">Réserver cette offre</button>
    </form>
@endif

        <div style="margin-top:1.5rem;">
            <a href="{{ route('offers.index') }}">
                <button> Retour à la liste</button>
            </a>
        </div>
    </div>
</div>
@endsection
