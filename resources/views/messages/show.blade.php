@extends('layouts.app')

@section('content')
<style>
    /* Styles professionnels et éthiques pour l'interface de messagerie */
.container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    max-width: 800px;
    margin: 0 auto;
    padding: 1.5rem 1rem;
    display: flex;
    flex-direction: column;
    min-height: 85vh;
    background: #fff;
}

/* Titre de la conversation */
h2 {
    color: #1a365d;
    font-weight: 600;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    padding: 0.75rem 1rem;
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
    border-radius: 10px;
    border-left: 4px solid #4299e1;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Zone des messages */
.messages {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    overflow-y: auto;
    max-height: 60vh;
    border: 1px solid #e2e8f0;
    scroll-behavior: smooth;
}

/* Style de défilement personnalisé */
.messages::-webkit-scrollbar {
    width: 6px;
}

.messages::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.messages::-webkit-scrollbar-thumb {
    background: #cbd5e0;
    border-radius: 3px;
}

.messages::-webkit-scrollbar-thumb:hover {
    background: #a0aec0;
}

/* Messages individuels */
.messages p {
    margin: 0;
    padding: 1rem 1.25rem;
    border-radius: 12px;
    max-width: 75%;
    position: relative;
    animation: messageSlideIn 0.3s ease-out;
    word-wrap: break-word;
    overflow-wrap: break-word;
    line-height: 1.5;
}

/* Messages de l'utilisateur courant (alignés à droite) */
.messages p:nth-child(even) {
    align-self: flex-end;
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    border-bottom-right-radius: 4px;
}

/* Messages de l'interlocuteur (alignés à gauche) */
.messages p:nth-child(odd) {
    align-self: flex-start;
    background: white;
    color: #2d3748;
    border: 1px solid #e2e8f0;
    border-bottom-left-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}

/* Indicateurs de position des messages */
.messages p:nth-child(even):before {
    content: '';
    position: absolute;
    right: -8px;
    top: 0;
    width: 0;
    height: 0;
    border-left: 8px solid #3182ce;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
}

.messages p:nth-child(odd):before {
    content: '';
    position: absolute;
    left: -8px;
    top: 0;
    width: 0;
    height: 0;
    border-right: 8px solid #e2e8f0;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
}

.messages p:nth-child(odd):after {
    content: '';
    position: absolute;
    left: -7px;
    top: 0;
    width: 0;
    height: 0;
    border-right: 8px solid white;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
}

/* Nom de l'utilisateur */
.messages p strong {
    display: block;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.messages p:nth-child(even) strong {
    color: rgba(255, 255, 255, 0.9);
}

.messages p:nth-child(odd) strong {
    color: #4a5568;
}

/* Contenu du message */
.messages p {
    font-size: 0.9375rem;
    line-height: 1.5;
}

/* Timestamp */
.messages p small {
    display: block;
    font-size: 0.75rem;
    margin-top: 0.75rem;
    opacity: 0.8;
    text-align: right;
}

.messages p:nth-child(even) small {
    color: rgba(255, 255, 255, 0.8);
}

.messages p:nth-child(odd) small {
    color: #718096;
}

/* Formulaire d'envoi */
form {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
    margin-top: auto;
}

/* Zone de texte */
textarea[name="contenu"] {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    font-family: inherit;
    font-size: 0.9375rem;
    line-height: 1.5;
    color: #2d3748;
    background: white;
    resize: vertical;
    min-height: 80px;
    max-height: 200px;
    transition: all 0.2s ease;
    margin-bottom: 1rem;
}

textarea[name="contenu"]:focus {
    outline: none;
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
}

textarea[name="contenu"]:hover {
    border-color: #cbd5e0;
}

/* Bouton d'envoi */
form button[type="submit"] {
    background: linear-gradient(135deg, #38a169 0%, #2f855a 100%);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.875rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

form button[type="submit"]:hover {
    background: linear-gradient(135deg, #2f855a 0%, #276749 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(56, 161, 105, 0.3);
}

form button[type="submit"]:active {
    transform: translateY(0);
}

form button[type="submit"]:focus-visible {
    outline: 3px solid rgba(56, 161, 105, 0.4);
    outline-offset: 2px;
}

form button[type="submit"]:disabled {
    background: #cbd5e0;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* Effet de chargement sur le bouton */
form button[type="submit"]:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top-color: white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    opacity: 0;
    transform: translate(-50%, -50%);
}

form button[type="submit"].loading:after {
    opacity: 1;
}

form button[type="submit"].loading span {
    opacity: 0;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 10px;
    margin: 1.5rem 0;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    padding: 0.5rem 0.875rem;
    border-radius: 8px;
    color: #4a5568;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
    min-width: 36px;
    text-align: center;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: white;
    border: 1px solid #e2e8f0;
}

.pagination a:hover:not(.disabled) {
    background: #4299e1;
    color: white;
    border-color: #4299e1;
    transform: translateY(-1px);
}

.pagination .active {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    border-color: #3182ce;
}

.pagination .disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: #e2e8f0;
}

/* Animations */
@keyframes messageSlideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes spin {
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

/* États de la zone de texte */
textarea[name="contenu"]:valid {
    border-color: #c6f6d5;
    background: linear-gradient(to right, #f0fff4 50%, white 50%);
    background-size: 200% 100%;
    background-position: right bottom;
    transition: all 0.3s ease;
}

textarea[name="contenu"]:valid:focus {
    background-position: left bottom;
}

/* Indicateur de caractères (optionnel) */
.char-counter {
    text-align: right;
    font-size: 0.75rem;
    color: #718096;
    margin-top: 0.25rem;
    display: none;
}

textarea[name="contenu"]:focus + .char-counter {
    display: block;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 1rem 0.5rem;
        min-height: 90vh;
    }
    
    h2 {
        font-size: 1.25rem;
        padding: 0.75rem;
        margin-bottom: 1rem;
    }
    
    .messages {
        padding: 1rem;
        gap: 1rem;
        max-height: 55vh;
    }
    
    .messages p {
        max-width: 85%;
        padding: 0.875rem 1rem;
    }
    
    form {
        padding: 1rem;
    }
    
    textarea[name="contenu"] {
        padding: 0.875rem 1rem;
        font-size: 0.875rem;
    }
    
    form button[type="submit"] {
        padding: 0.75rem 1.5rem;
        font-size: 0.9375rem;
    }
    
    .pagination {
        padding: 1rem;
        gap: 0.375rem;
    }
    
    .pagination a,
    .pagination span {
        padding: 0.375rem 0.625rem;
        min-width: 32px;
        font-size: 0.875rem;
    }
}

@media (max-width: 480px) {
    .messages p {
        max-width: 90%;
        padding: 0.75rem;
    }
    
    .messages p strong {
        font-size: 0.8125rem;
    }
    
    .messages p {
        font-size: 0.875rem;
    }
    
    .messages p small {
        font-size: 0.6875rem;
    }
    
    textarea[name="contenu"] {
        min-height: 70px;
    }
}

/* Accessibilité : Mode contraste élevé */
@media (prefers-contrast: high) {
    .messages p:nth-child(odd) {
        border: 2px solid #2d3748;
        background: white;
    }
    
    .messages p:nth-child(even) {
        border: 2px solid #2b6cb0;
    }
    
    form {
        border: 2px solid #2d3748;
    }
    
    textarea[name="contenu"] {
        border: 2px solid #2d3748;
    }
    
    textarea[name="contenu"]:focus {
        border-color: #2b6cb0;
        outline: 2px solid #2b6cb0;
    }
    
    form button[type="submit"] {
        border: 2px solid #2f855a;
    }
}

/* Accessibilité : Réduction des animations */
@media (prefers-reduced-motion: reduce) {
    .messages {
        scroll-behavior: auto;
    }
    
    .messages p {
        animation: none;
    }
    
    form button[type="submit"]:hover {
        transform: none;
    }
    
    .pagination a:hover {
        transform: none;
    }
    
    @keyframes messageSlideIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    form button[type="submit"]:after {
        animation: none;
    }
}

/* Support de la saisie vocale (indicateur visuel) */
textarea[name="contenu"]:user-invalid {
    border-color: #e53e3e;
    background: #fff5f5;
}

/* Indicateur de connexion (optionnel) */
.typing-indicator {
    display: flex;
    gap: 4px;
    padding: 0.75rem 1.25rem;
    background: white;
    border-radius: 12px;
    align-self: flex-start;
    border: 1px solid #e2e8f0;
    margin-bottom: 0.5rem;
    animation: pulseOpacity 1.5s infinite;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: #a0aec0;
    border-radius: 50%;
    animation: bounce 1.4s infinite;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 60%, 100% {
        transform: translateY(0);
    }
    30% {
        transform: translateY(-6px);
    }
}

@keyframes pulseOpacity {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

/* Séparateur de date (optionnel) */
.date-separator {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
    color: #718096;
    font-size: 0.75rem;
    font-weight: 500;
}

.date-separator:before,
.date-separator:after {
    content: '';
    position: absolute;
    top: 50%;
    width: 40%;
    height: 1px;
    background: #e2e8f0;
}

.date-separator:before {
    left: 0;
}

.date-separator:after {
    right: 0;
}
</style>
<div class="container">
    <h2>Conversation #{{ $conversation->id }}</h2>

    <div class="messages">
        @foreach($messages as $message)
            <p>
                <strong>{{ $message->user->nom }}:</strong> 
                {{ $message->contenu }}
                <small>{{ $message->created_at->diffForHumans() }}</small>
            </p>
        @endforeach
    </div>

    {{ $messages->links() }}

    <form method="POST" action="{{ route('messages.send', $conversation) }}">
        @csrf
        <textarea name="contenu" rows="3" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</div>
@endsection
