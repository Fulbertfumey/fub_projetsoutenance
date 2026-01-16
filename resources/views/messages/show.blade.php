@extends('layouts.app')

@section('content')

<style>
/* ===== VARIABLES GLOBALES ===== */
:root {
    /* Couleurs principales */
    --primary-color: #4361ee;
    --primary-dark: #3a56d4;
    --primary-light: #4895ef;
    --secondary-color: #7209b7;
    --success-color: #4cc9f0;
    --danger-color: #f72585;
    --warning-color: #f8961e;
    
    /* Couleurs de fond */
    --bg-primary: #ffffff;
    --bg-secondary: #f8f9fa;
    --bg-message: #f1f3f9;
    --bg-input: #ffffff;
    --bg-hover: #f0f2ff;
    
    /* Couleurs de texte */
    --text-primary: #1a202c;
    --text-secondary: #4a5568;
    --text-muted: #718096;
    --text-light: #a0aec0;
    
    /* Bordures */
    --border-color: #e2e8f0;
    --border-radius-sm: 6px;
    --border-radius: 10px;
    --border-radius-lg: 14px;
    --border-radius-xl: 18px;
    
    /* Ombres */
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    
    /* Transitions */
    --transition-fast: 150ms ease;
    --transition-normal: 250ms ease;
    --transition-slow: 350ms ease;
    
    /* Espacements */
    --space-xs: 0.5rem;
    --space-sm: 1rem;
    --space-md: 1.5rem;
    --space-lg: 2rem;
    --space-xl: 3rem;
}

/* ===== STYLES DE BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* ===== CONTENEUR PRINCIPAL ===== */
.container {
    max-width: 800px;
    margin: 0 auto;
    background: var(--bg-primary);
    border-radius: var(--border-radius-xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
}

.container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

/* ===== TITRE DE LA CONVERSATION ===== */
.container > h2 {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: var(--space-lg);
    color: var(--text-primary);
    position: relative;
    padding-bottom: var(--space-sm);
}

.container > h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
    border-radius: 2px;
}

/* ===== CONTENEUR DES MESSAGES ===== */
.messages {
    background: var(--bg-secondary);
    border-radius: var(--border-radius-lg);
    padding: var(--space-lg);
    margin-bottom: var(--space-lg);
    max-height: 500px;
    overflow-y: auto;
    border: 1px solid var(--border-color);
}

/* Scrollbar personnalisée */
.messages::-webkit-scrollbar {
    width: 8px;
}

.messages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: var(--border-radius-full);
}

.messages::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: var(--border-radius-full);
}

.messages::-webkit-scrollbar-thumb:hover {
    background: var(--primary-dark);
}

/* ===== STYLES DES MESSAGES INDIVIDUELS ===== */
.messages p {
    background: var(--bg-message);
    padding: var(--space-md);
    border-radius: var(--border-radius);
    margin-bottom: var(--space-sm);
    border-left: 4px solid var(--primary-color);
    transition: all var(--transition-fast);
    position: relative;
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.messages p:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-md);
    background: white;
}

/* Nom de l'utilisateur */
.messages p strong {
    color: var(--primary-dark);
    font-size: 1.1rem;
    display: block;
    margin-bottom: var(--space-xs);
    padding-bottom: var(--space-xs);
    border-bottom: 1px solid rgba(67, 97, 238, 0.1);
}

/* Contenu du message */
.messages p strong::after {
    content: ':';
    color: var(--text-muted);
    margin-left: 4px;
}

.messages p strong + * {
    margin-top: var(--space-xs);
    color: var(--text-primary);
    font-size: 1rem;
    line-height: 1.5;
}

/* Timestamp */
.messages p small {
    display: block;
    text-align: right;
    color: var(--text-muted);
    font-size: 0.85rem;
    margin-top: var(--space-xs);
    padding-top: var(--space-xs);
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

/* ===== PAGINATION ===== */
.container > .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--space-xs);
    margin: var(--space-lg) 0;
    flex-wrap: wrap;
}

.container > .pagination a,
.container > .pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 var(--space-sm);
    background: var(--bg-primary);
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 500;
    transition: all var(--transition-fast);
}

.container > .pagination a:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.container > .pagination span {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border-color: transparent;
    box-shadow: var(--shadow-sm);
}

.container > .pagination a:first-child,
.container > .pagination a:last-child {
    padding: 0 var(--space-md);
    font-weight: 600;
}

/* ===== FORMULAIRE D'ENVOI ===== */
.container > form {
    background: var(--bg-secondary);
    border-radius: var(--border-radius-lg);
    padding: var(--space-lg);
    margin-top: var(--space-lg);
    position: relative;
    border: 1px solid var(--border-color);
}

/* Textarea */
.container > form textarea {
    width: 100%;
    min-height: 120px;
    padding: var(--space-md);
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-family: inherit;
    font-size: 1rem;
    resize: vertical;
    background: var(--bg-input);
    color: var(--text-primary);
    transition: all var(--transition-fast);
    line-height: 1.5;
    margin-bottom: var(--space-md);
}

.container > form textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    background: white;
}

.container > form textarea::placeholder {
    color: var(--text-light);
}

/* Bouton Envoyer */
.container > form button {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
    padding: var(--space-md) var(--space-xl);
    border-radius: var(--border-radius);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
    width: 100%;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    position: relative;
    overflow: hidden;
}

.container > form button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left var(--transition-normal);
}

.container > form button:hover::before {
    left: 100%;
}

.container > form button:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.container > form button:active {
    transform: translateY(0);
}

/* ===== ANIMATIONS ===== */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.container {
    animation: fadeIn 0.5s ease-out;
}

/* Animation pour les nouveaux messages */
@keyframes highlightMessage {
    0% {
        background: rgba(67, 97, 238, 0.1);
    }
    100% {
        background: var(--bg-message);
    }
}

.messages p:last-child {
    animation: highlightMessage 1.5s ease;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    body {
        padding: var(--space-sm);
    }
    
    .container {
        padding: var(--space-lg);
        margin: var(--space-sm) auto;
        border-radius: var(--border-radius-lg);
    }
    
    .container > h2 {
        font-size: 1.5rem;
        margin-bottom: var(--space-md);
    }
    
    .messages {
        padding: var(--space-md);
        max-height: 400px;
    }
    
    .messages p {
        padding: var(--space-sm);
    }
    
    .container > form {
        padding: var(--space-md);
    }
    
    .container > form textarea {
        min-height: 100px;
        padding: var(--space-sm);
    }
    
    .container > form button {
        padding: var(--space-sm) var(--space-md);
    }
    
    .container > .pagination {
        margin: var(--space-md) 0;
    }
    
    .container > .pagination a,
    .container > .pagination span {
        min-width: 36px;
        height: 36px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: var(--space-md);
    }
    
    .container > h2 {
        font-size: 1.25rem;
    }
    
    .messages {
        max-height: 350px;
        padding: var(--space-sm);
    }
    
    .messages p {
        margin-bottom: var(--space-xs);
    }
    
    .messages p strong {
        font-size: 1rem;
    }
    
    .container > form textarea {
        min-height: 80px;
        font-size: 0.95rem;
    }
    
    .container > .pagination {
        gap: 4px;
    }
    
    .container > .pagination a,
    .container > .pagination span {
        min-width: 32px;
        height: 32px;
        font-size: 0.85rem;
        padding: 0 8px;
    }
}

/* ===== ÉTATS SPÉCIAUX ===== */
/* Message vide */
.messages:empty::before {
    content: 'Aucun message pour le moment';
    display: block;
    text-align: center;
    color: var(--text-muted);
    padding: var(--space-xl);
    font-style: italic;
}

/* Message système */
.messages p:has(strong:contains("Système")) {
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-left-color: var(--text-muted);
}

.messages p:has(strong:contains("Système")) strong {
    color: var(--text-muted);
}

/* Message important */
.messages p:has(strong:contains("⚠️")),
.messages p:has(strong:contains("IMPORTANT")) {
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    border-left-color: var(--warning-color);
}

.messages p:has(strong:contains("⚠️")) strong,
.messages p:has(strong:contains("IMPORTANT")) strong {
    color: var(--warning-color);
}

/* ===== EFFETS DE FOCUS VISUEL ===== */
.container > form textarea:focus {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
}

/* ===== INDICATEUR DE SCROLL ===== */
.messages::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 30px;
    background: linear-gradient(to top, var(--bg-secondary), transparent);
    pointer-events: none;
    border-bottom-left-radius: var(--border-radius-lg);
    border-bottom-right-radius: var(--border-radius-lg);
}

/* ===== LOADING STATE (si applicable) ===== */
.container.loading .messages p {
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* ===== SUPPORT POUR MODE CLAIR/SOMBRE ===== */
@media (prefers-color-scheme: dark) {
    :root {
        --bg-primary: #1a202c;
        --bg-secondary: #2d3748;
        --bg-message: #4a5568;
        --bg-input: #2d3748;
        --bg-hover: #4a5568;
        
        --text-primary: #f7fafc;
        --text-secondary: #e2e8f0;
        --text-muted: #a0aec0;
        --text-light: #718096;
        
        --border-color: #4a5568;
    }
    
    body {
        background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
    }
    
    .container {
        background: var(--bg-primary);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .messages p:hover {
        background: #4a5568;
    }
    
    .container > form textarea:focus {
        background: #2d3748;
    }
}
</style>
<div class="container">
    <h2>Conversation :{{ $conversation->id }}</h2>

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

    
                      <div style="margin-top:1.5rem;">
                          <a href="{{ route('dashboard.prestataire') }}">
                              <button>⬅ dashboard</button>
                          </a>
                     </div>
</div>
@endsection
