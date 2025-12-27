@extends('layouts.app')

@section('content')

<<style>
/* Variables CSS modernes */
:root {
    --primary: #4361ee;
    --primary-dark: #3a56d4;
    --primary-light: #eef2ff;
    --secondary: #6c757d;
    --success: #28a745;
    --danger: #dc3545;
    --light: #f8f9fa;
    --dark: #212529;
    --border: #e2e8f0;
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
    --radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
}

/* Container principal */
div[style*="max-width:800px"] {
    max-width: 900px !important;
    margin: 40px auto !important;
    padding: 0 20px;
    animation: fadeIn 0.6s ease-out;
}

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

/* Titre principal */
h2[style*="text-align:center"] {
    text-align: center !important;
    margin: 60px auto 40px !important;
    font-size: 2.8rem !important;
    font-weight: 800;
    color: transparent;
    background: var(--gradient);
    -webkit-background-clip: text;
    background-clip: text;
    position: relative;
    padding-bottom: 20px;
    letter-spacing: -0.5px;
}

h2[style*="text-align:center"]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: var(--gradient);
    border-radius: 2px;
}

h2[style*="text-align:center"]::before {
    content: '📢';
    margin-right: 15px;
    font-size: 2.5rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Carte de contenu */
div[style*="border:1px solid #ddd"] {
    border: none !important;
    border-radius: var(--radius) !important;
    padding: 40px !important;
    background: white !important;
    box-shadow: var(--shadow) !important;
    margin-top: 2rem !important;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    border-top: 5px solid var(--primary) !important;
}

div[style*="border:1px solid #ddd"]:hover {
    box-shadow: var(--shadow-hover) !important;
    transform: translateY(-5px);
}

div[style*="border:1px solid #ddd"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: var(--gradient);
    z-index: 1;
}

/* Titre de l'annonce */
div[style*="border:1px solid #ddd"] h3 {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 25px !important;
    line-height: 1.3;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--primary-light);
    position: relative;
}

div[style*="border:1px solid #ddd"] h3::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 60px;
    height: 2px;
    background: var(--gradient);
    border-radius: 1px;
}

/* Paragraphes et informations */
div[style*="border:1px solid #ddd"] p {
    margin-bottom: 20px;
    line-height: 1.7;
    color: #4a5568;
    font-size: 1.05rem;
}

div[style*="border:1px solid #ddd"] p strong {
    color: var(--dark);
    font-weight: 600;
}

div[style*="border:1px solid #ddd"] > p:first-of-type {
    font-size: 1.1rem;
    color: var(--primary);
    background: var(--primary-light);
    padding: 12px 20px;
    border-radius: 8px;
    display: inline-block;
    margin-bottom: 25px !important;
    border-left: 4px solid var(--primary);
}

/* Description */
div[style*="border:1px solid #ddd"] > p:nth-of-type(2) {
    font-size: 1.15rem;
    line-height: 1.8;
    color: #2d3748;
    padding: 25px;
    background: linear-gradient(to right, #f8fafc, #ffffff);
    border-radius: 10px;
    border-left: 4px solid var(--primary);
    margin: 30px 0 !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

/* Image */
div[style*="border:1px solid #ddd"] img[alt="Image publicité"] {
    width: 100% !important;
    border-radius: 15px !important;
    margin-top: 30px !important;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: var(--transition);
    border: 1px solid var(--border);
    display: block;
}

div[style*="border:1px solid #ddd"] img[alt="Image publicité"]:hover {
    transform: scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

/* Lien externe */
div[style*="border:1px solid #ddd"] a[target="_blank"] {
    color: var(--primary) !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    padding: 12px 25px;
    background: var(--primary-light);
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: var(--transition);
    border: 2px solid transparent;
    margin-top: 20px !important;
}

div[style*="border:1px solid #ddd"] a[target="_blank"]:hover {
    background: white;
    border-color: var(--primary);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
}

div[style*="border:1px solid #ddd"] a[target="_blank"]::before {
    content: '🔗';
    font-size: 1.2rem;
}

/* Informations de publication */
div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] {
    font-size: 1rem !important;
    color: #718096 !important;
    background: #f7fafc;
    padding: 15px 25px;
    border-radius: 10px;
    margin-top: 30px !important;
    border-left: 4px solid #48bb78;
    display: flex;
    align-items: center;
    gap: 10px;
}

div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"]::before {
    content: '👤';
    font-size: 1.2rem;
}

div[style*="border:1px solid #ddd"] p[style*="font-size:0.9rem"] strong {
    color: #2d3748;
}

/* Section des boutons */
div[style*="margin-top:1.5rem"] {
    margin-top: 40px !important;
    padding-top: 30px;
    border-top: 2px solid var(--border);
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
}

/* Bouton Retour */
div[style*="margin-top:1.5rem"] a[href*="ads.index"] button {
    background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    color: white !important;
    padding: 14px 30px !important;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 10px;
    min-width: 180px;
    justify-content: center;
}

div[style*="margin-top:1.5rem"] a[href*="ads.index"] button::before {
    content: '⬅';
    font-size: 1.2rem;
}

div[style*="margin-top:1.5rem"] a[href*="ads.index"] button:hover {
    background: linear-gradient(135deg, #4b5563, #374151) !important;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(107, 114, 128, 0.3);
}

/* Bouton Supprimer */
div[style*="margin-top:1.5rem"] form button[style*="background:#dc3545"] {
    background: linear-gradient(135deg, #dc3545, #c53030) !important;
    color: white !important;
    padding: 14px 30px !important;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 10px;
    min-width: 180px;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

div[style*="margin-top:1.5rem"] form button[style*="background:#dc3545"]::before {
    content: '🗑️';
    font-size: 1.2rem;
}

div[style*="margin-top:1.5rem"] form button[style*="background:#dc3545"]:hover {
    background: linear-gradient(135deg, #c53030, #9b2c2c) !important;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
}

/* Effet de clic sur les boutons */
div[style*="margin-top:1.5rem"] button:active {
    transform: translateY(-1px) !important;
}

/* Animation de chargement */
@keyframes shimmer {
    0% {
        background-position: -1000px 0;
    }
    100% {
        background-position: 1000px 0;
    }
}

/* Responsive */
@media (max-width: 768px) {
    div[style*="max-width:800px"] {
        max-width: 95% !important;
        margin: 20px auto !important;
        padding: 0 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.2rem !important;
        margin: 40px auto 30px !important;
    }
    
    div[style*="border:1px solid #ddd"] {
        padding: 25px !important;
    }
    
    div[style*="border:1px solid #ddd"] h3 {
        font-size: 1.8rem;
    }
    
    div[style*="margin-top:1.5rem"] {
        flex-direction: column;
        align-items: stretch;
    }
    
    div[style*="margin-top:1.5rem"] a[href*="ads.index"] button,
    div[style*="margin-top:1.5rem"] form button[style*="background:#dc3545"] {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 1.8rem !important;
    }
    
    div[style*="border:1px solid #ddd"] {
        padding: 20px !important;
    }
    
    div[style*="border:1px solid #ddd"] h3 {
        font-size: 1.5rem;
    }
    
    div[style*="border:1px solid #ddd"] > p:nth-of-type(2) {
        padding: 15px;
        font-size: 1rem;
    }
}

/* Badge pour le plan */
div[style*="border:1px solid #ddd"] > p:first-of-type strong::after {
    content: '🎯';
    margin-left: 10px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: 0.7;
        transform: scale(1.1);
    }
}

/* Effet de bordure animée sur hover */
div[style*="border:1px solid #ddd"]::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: var(--radius);
    padding: 2px;
    background: linear-gradient(45deg, var(--primary), transparent, var(--primary));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.3s ease;
}

div[style*="border:1px solid #ddd"]:hover::after {
    opacity: 1;
}
</style>
<div style="max-width:800px; margin:auto;">
    <h2 style="text-align:center;">📢 Détails de la publicité</h2>

    <div style="border:1px solid #ddd; border-radius:8px; padding:2rem; background:#fff; box-shadow:0 0 5px rgba(0,0,0,0.05); margin-top:1.5rem;">
        <h3>{{ $ad->title }}</h3>
        <p><strong>Plan :</strong> {{ ucfirst($ad->plan) }}</p>
        <p>{{ $ad->description }}</p>

        @if($ad->image)
            <img src="{{ asset('storage/'.$ad->image) }}" alt="Image publicité" style="width:100%; border-radius:6px; margin-top:1rem;">
        @endif

        @if($ad->link)
            <p style="margin-top:1rem;">
                <a href="{{ $ad->link }}" target="_blank" style="color:#1f1f1f; font-weight:bold;">🔗 Visiter le lien externe</a>
            </p>
        @endif

        <p style="font-size:0.9rem; color:#555; margin-top:1rem;">
            Publié par <strong>{{ $ad->user->name }}</strong> le {{ $ad->created_at->format('d/m/Y à H:i') }}
        </p>

        <div style="margin-top:1.5rem;">
            <a href="{{ route('ads.index') }}">
                <button>⬅ Retour à la liste</button>
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
</div>
@endsection
