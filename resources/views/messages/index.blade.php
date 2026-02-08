@extends('layouts.app')
<style>
    /* Styles professionnels et éthiques pour la liste des conversations */
.container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    padding: 2rem 1rem;
    max-width: 800px;
    margin: 0 auto;
    min-height: 70vh;
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

/* Liste des conversations */
ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

/* Éléments de liste */
li {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    position: relative;
    animation: slideIn 0.5s ease-out backwards;
}

li:nth-child(1) { animation-delay: 0.1s; }
li:nth-child(2) { animation-delay: 0.2s; }
li:nth-child(3) { animation-delay: 0.3s; }
li:nth-child(4) { animation-delay: 0.4s; }
li:nth-child(5) { animation-delay: 0.5s; }

li:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    border-color: #cbd5e0;
}

/* Lien de conversation */
li a {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    text-decoration: none;
    color: #2d3748;
    font-weight: 500;
    position: relative;
    transition: all 0.2s ease;
    min-height: 72px;
}

li a:focus-visible {
    outline: 3px solid rgba(66, 153, 225, 0.4);
    outline-offset: -3px;
    border-radius: 10px;
}

/* Indicateur de nouvelle activité (optionnel) */
li:has(.unread) {
    border-left: 4px solid #4299e1;
    background: linear-gradient(90deg, #ebf8ff 0%, white 100%);
}

.unread {
    position: absolute;
    right: 1.5rem;
    background: #4299e1;
    color: white;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    animation: pulse 2s infinite;
}

/* Numéro de conversation */
li a:before {
    content: "";
    margin-right: 0.75rem;
    font-size: 1.25rem;
    opacity: 0.7;
    transition: transform 0.3s ease;
}

li:hover a:before {
    transform: scale(1.1) rotate(5deg);
}

/* Style pour le texte principal */
li a {
    font-size: 1rem;
    line-height: 1.5;
}

/* Style pour le texte secondaire (réservation) */
li a span,
li a small {
    font-size: 0.875rem;
    color: #718096;
    margin-left: 0.5rem;
    font-weight: 400;
}

li a small {
    display: block;
    margin-top: 0.25rem;
    font-size: 0.75rem;
    color: #a0aec0;
}

/* Indicateur visuel au survol */
li a:after {
    content: '';
    position: absolute;
    right: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    border-right: 2px solid #cbd5e0;
    border-bottom: 2px solid #cbd5e0;
    transform: translateY(-50%) rotate(-45deg);
    transition: all 0.3s ease;
    opacity: 0.5;
}

li:hover a:after {
    right: 1.25rem;
    border-color: #4299e1;
    opacity: 1;
}

/* État vide */
li:only-child {
    text-align: center;
    padding: 3rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border: 2px dashed #cbd5e0;
    box-shadow: none;
}

li:only-child a {
    color: #718096;
    font-style: italic;
    font-weight: 400;
    justify-content: center;
    padding: 0;
}

li:only-child:hover {
    transform: none;
    box-shadow: none;
    border-color: #cbd5e0;
}

li:only-child a:before,
li:only-child a:after {
    display: none;
}

/* Badge pour le statut de la conversation (optionnel) */
.conversation-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-active {
    background: #c6f6d5;
    color: #22543d;
}

.status-archived {
    background: #e2e8f0;
    color: #4a5568;
}

.status-pending {
    background: #feebc8;
    color: #744210;
}

/* Timestamp (optionnel pour les futures fonctionnalités) */
.conversation-time {
    position: absolute;
    right: 4rem;
    color: #a0aec0;
    font-size: 0.75rem;
}

/* Animation d'entrée */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(66, 153, 225, 0.4);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(66, 153, 225, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(66, 153, 225, 0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 1.5rem 0.75rem;
    }
    
    h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    li a {
        padding: 1rem 1.25rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
    
    li a:before {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        margin-right: 0;
    }
    
    li a:after {
        display: none;
    }
    
    .conversation-time,
    .conversation-status {
        position: relative;
        right: auto;
        margin-left: 0;
        margin-top: 0.25rem;
        align-self: flex-start;
    }
    
    .unread {
        position: absolute;
        right: 3.5rem;
        top: 50%;
        transform: translateY(-50%);
    }
}

@media (max-width: 480px) {
    .container {
        padding: 1rem 0.5rem;
    }
    
    h2 {
        font-size: 1.25rem;
        padding-bottom: 0.5rem;
        margin-bottom: 1.25rem;
    }
    
    li {
        border-radius: 8px;
    }
    
    li a {
        padding: 0.875rem 1rem;
        font-size: 0.9375rem;
    }
    
    li a span,
    li a small {
        font-size: 0.8125rem;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
    li {
        border: 2px solid #2d3748;
    }
    
    li a {
        color: #1a202c;
    }
    
    li:hover {
        border-color: #4299e1;
        background: #ebf8ff;
    }
    
    .unread {
        border: 2px solid white;
    }
    
    li:only-child {
        border: 2px dashed #2d3748;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    li {
        animation: none;
        transition: none;
    }
    
    li:hover {
        transform: none;
    }
    
    li a:before {
        transition: none;
    }
    
    li:hover a:before {
        transform: none;
    }
    
    li a:after {
        transition: none;
    }
    
    .unread {
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
}

/* Support des états focus pour navigation clavier */
li a:focus {
    outline: none;
}

li a:focus-visible {
    background: #ebf8ff;
    border-radius: 10px;
}

/* Style pour les conversations avec réservation */
li:has(a:contains("Réservation")) {
    border-left: 3px solid #38a169;
}

li:has(a:contains("Réservation")) a:before {
    content: "🤝";
}

/* État vide amélioré */
li:only-child {
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Indicateur de sélection (pour futures fonctionnalités) */
li.selected {
    background: linear-gradient(90deg, #ebf8ff 0%, #bee3f8 100%);
    border-color: #4299e1;
}

/* Effet de profondeur subtil */
li::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #4299e1, #38a169);
    opacity: 0;
    transition: opacity 0.3s ease;
}

li:hover::before {
    opacity: 1;
}

/* Séparateur visuel pour les listes longues */
li:not(:last-child)::after {
    content: '';
    position: absolute;
    bottom: -0.375rem;
    left: 1.5rem;
    right: 1.5rem;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
}
</style>
@section('content')
<div class="container">
    <h2> Mes Conversations</h2>
    <ul>
        @forelse($conversations as $conversation)
            <li>
                <a href="{{ route('conversations.show', $conversation) }}">
                    Conversation #{{ $conversation->id }}
                    @if($conversation->reservation)
                        (Réservation #{{ $conversation->reservation->id }})
                    @endif
                </a>
            </li>
        @empty
            <li>Aucune conversation pour le moment.</li>
        @endforelse
    </ul>
</div>
@endsection
