@extends('layouts.app')

@section('content')
<style>
    /* Styles professionnels et éthiques pour le formulaire de signalement */
[style*="max-width:800px"] {
    max-width: 800px;
    margin: 2rem auto;
    padding: 0 1rem;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
}

/* Titre principal */
h2[style*="text-align:center"] {
    text-align: center !important;
    color: #1a365d;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 3px solid #e53e3e;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

/* Conteneur du formulaire */
[style*="border:1px solid #ddd"] {
    border: 1px solid #e2e8f0 !important;
    border-radius: 12px !important;
    padding: 2.5rem !important;
    background: linear-gradient(135deg, #fff 0%, #fafbfc 100%) !important;
    margin-top: 2rem !important;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    animation: slideIn 0.4s ease-out;
    position: relative;
    overflow: hidden;
}

/* Indicateur visuel d'alerte */
[style*="border:1px solid #ddd"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #e53e3e, #dd6b20);
}

/* Informations sur l'offre */
[style*="border:1px solid #ddd"] p {
    margin: 0 0 1.25rem 0;
    padding: 0.75rem 1rem;
    background: #f8fafc;
    border-radius: 8px;
    border-left: 4px solid #4299e1;
    font-size: 1rem;
    line-height: 1.5;
    color: #2d3748;
}

[style*="border:1px solid #ddd"] p strong {
    color: #4a5568;
    font-weight: 600;
    min-width: 120px;
    display: inline-block;
}

/* Label du formulaire */
form label[for="motif"] {
    display: block;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    position: relative;
    padding-left: 1.5rem;
}

form label[for="motif"]::before {
    content: '⚠️';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1rem;
}

/* Zone de texte */
textarea[name="motif"] {
    width: 100% !important;
    margin-bottom: 2rem !important;
    padding: 1.25rem 1.5rem !important;
    border: 2px solid #e2e8f0 !important;
    border-radius: 10px !important;
    font-family: inherit !important;
    font-size: 0.9375rem !important;
    line-height: 1.6 !important;
    color: #2d3748 !important;
    background: white !important;
    resize: vertical !important;
    min-height: 140px !important;
    max-height: 300px !important;
    transition: all 0.3s ease !important;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.04) !important;
}

textarea[name="motif"]:focus {
    outline: none !important;
    border-color: #e53e3e !important;
    box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1) !important;
}

textarea[name="motif"]:hover {
    border-color: #cbd5e0 !important;
}

/* Placeholder stylisé */
textarea[name="motif"]::placeholder {
    color: #a0aec0;
    font-style: italic;
}

/* Compteur de caractères (dynamique via JavaScript) */
.char-counter {
    text-align: right;
    font-size: 0.75rem;
    color: #718096;
    margin-top: -1.5rem;
    margin-bottom: 1rem;
    display: none;
}

textarea[name="motif"]:focus + .char-counter {
    display: block;
}

/* Bouton d'envoi */
button[type="submit"] {
    background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%) !important;
    color: white !important;
    padding: 1rem 2.5rem !important;
    border: none !important;
    border-radius: 10px !important;
    font-size: 1rem !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.75rem !important;
    width: 100% !important;
    position: relative !important;
    overflow: hidden !important;
    letter-spacing: 0.02em !important;
}

button[type="submit"]:hover {
    background: linear-gradient(135deg, #c53030 0%, #9b2c2c 100%) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(229, 62, 62, 0.3) !important;
}

button[type="submit"]:active {
    transform: translateY(0) !important;
}

button[type="submit"]:focus-visible {
    outline: 3px solid rgba(229, 62, 62, 0.4) !important;
    outline-offset: 3px !important;
}

button[type="submit"]:disabled {
    background: #cbd5e0 !important;
    cursor: not-allowed !important;
    transform: none !important;
    box-shadow: none !important;
}

/* Icône dans le bouton */
button[type="submit"]::before {
    content: '🚨';
    font-size: 1.1em;
}

/* Effet de vague au survol */
button[type="submit"]::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, 0.5);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}

button[type="submit"]:hover::after {
    animation: ripple 1s ease-out;
}

/* Animation d'entrée */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    100% {
        transform: scale(40, 40);
        opacity: 0;
    }
}

/* Messages de validation (dynamique) */
.alert {
    padding: 1rem 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: fadeIn 0.3s ease-out;
}

.alert-success {
    background: #c6f6d5;
    color: #22543d;
    border-left: 4px solid #38a169;
}

.alert-error {
    background: #fed7d7;
    color: #742a2a;
    border-left: 4px solid #e53e3e;
}

.alert-warning {
    background: #feebc8;
    color: #744210;
    border-left: 4px solid #ed8936;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    [style*="max-width:800px"] {
        padding: 0 0.75rem;
        margin: 1.5rem auto;
    }
    
    h2[style*="text-align:center"] {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
    }
    
    [style*="border:1px solid #ddd"] {
        padding: 2rem 1.5rem !important;
        margin-top: 1.5rem !important;
    }
    
    [style*="border:1px solid #ddd"] p {
        padding: 0.75rem;
        font-size: 0.9375rem;
    }
    
    textarea[name="motif"] {
        padding: 1rem 1.25rem !important;
        min-height: 120px !important;
        font-size: 0.875rem !important;
    }
    
    button[type="submit"] {
        padding: 0.875rem 2rem !important;
        font-size: 0.9375rem !important;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 1.25rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    [style*="border:1px solid #ddd"] {
        padding: 1.5rem 1rem !important;
    }
    
    [style*="border:1px solid #ddd"] p {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    
    [style*="border:1px solid #ddd"] p strong {
        min-width: auto;
        margin-bottom: 0.25rem;
    }
    
    form label[for="motif"] {
        padding-left: 1.25rem;
        font-size: 0.9375rem;
    }
    
    textarea[name="motif"] {
        min-height: 100px !important;
        padding: 0.875rem 1rem !important;
    }
    
    button[type="submit"] {
        padding: 0.75rem 1.5rem !important;
        font-size: 0.875rem !important;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
    [style*="border:1px solid #ddd"] {
        border: 2px solid #2d3748 !important;
        background: white !important;
    }
    
    [style*="border:1px solid #ddd"] p {
        border: 1px solid #4a5568;
        background: #f7fafc;
    }
    
    textarea[name="motif"] {
        border: 2px solid #2d3748 !important;
    }
    
    textarea[name="motif"]:focus {
        border-color: #e53e3e !important;
        outline: 2px solid #e53e3e !important;
    }
    
    button[type="submit"] {
        border: 2px solid #c53030 !important;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    [style*="border:1px solid #ddd"] {
        animation: none;
    }
    
    button[type="submit"]:hover {
        transform: none !important;
    }
    
    button[type="submit"]:hover::after {
        animation: none;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .alert {
        animation: none;
    }
}

/* Validation en temps réel */
textarea[name="motif"]:invalid {
    border-color: #fc8181 !important;
    background: linear-gradient(to right, #fff5f5 50%, white 50%) !important;
    background-size: 200% 100% !important;
    background-position: right bottom !important;
}

textarea[name="motif"]:valid {
    border-color: #c6f6d5 !important;
    background: linear-gradient(to right, #f0fff4 50%, white 50%) !important;
    background-size: 200% 100% !important;
    background-position: right bottom !important;
}

textarea[name="motif"]:focus:valid {
    background-position: left bottom !important;
}

/* Indicateur de longueur recommandée */
.hint {
    display: block;
    font-size: 0.75rem;
    color: #718096;
    margin-top: 0.25rem;
    margin-bottom: 1rem;
}

/* Support des messages d'erreur de validation */
.error-message {
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: -1rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Style pour le focus du label */
form label[for="motif"]:has(+ textarea:focus) {
    color: #e53e3e;
}
</style>
<div style="max-width:800px; margin:auto;">
    <h2 style="text-align:center;">📢 Signaler une offre</h2>

    <div style="border:1px solid #ddd; border-radius:8px; padding:2rem; background:#fff; margin-top:1.5rem;">
        <p><strong>Offre :</strong> {{ $reservation->offer->titre }}</p>
        <p><strong>Prestataire :</strong> {{ $reservation->offer->user->nom }}</p>

        <form method="POST" action="{{ route('reports.store', $reservation->id) }}">
            @csrf
            <label for="motif">Motif du signalement :</label>
            <textarea name="motif" id="motif" rows="4" style="width:100%; margin-bottom:1rem;"></textarea>

            <button type="submit" style="background:#dc3545; color:#fff; padding:0.5rem 1rem; border:none; border-radius:4px;">
                Envoyer le signalement
            </button>
        </form>
    </div>
</div>
@endsection
