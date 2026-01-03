@extends('layouts.app')

@section('content')

<style>
/* === VARIABLES ET RESET === */
:root {
    --primary: #3498db;
    --primary-dark: #2980b9;
    --secondary: #2ecc71;
    --secondary-dark: #27ae60;
    --danger: #e74c3c;
    --warning: #f39c12;
    --info: #9b59b6;
    --light: #ecf0f1;
    --dark: #2c3e50;
    --gray: #95a5a6;
    --border: #dfe6e9;
    --radius: 10px;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 15px;
}

/* === TITRES === */
.container h2 {
    color: var(--dark);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 3px solid var(--primary);
    position: relative;
}

.container h2::before {
    content: "📊";
    margin-right: 10px;
    font-size: 1.8rem;
}

.container h3 {
    color: var(--dark);
    font-size: 1.4rem;
    font-weight: 600;
    margin: 35px 0 20px 0;
    padding-left: 15px;
    border-left: 4px solid var(--secondary);
    background: linear-gradient(to right, rgba(46, 204, 113, 0.05), transparent);
}

/* === STATISTIQUES === */
.container > ul:first-of-type {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    list-style: none;
    padding: 0;
    margin: 20px 0 40px 0;
}

.container > ul:first-of-type li {
    background: white;
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border-left: 4px solid var(--primary);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.container > ul:first-of-type li:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.container > ul:first-of-type li::before {
    content: "•";
    color: var(--primary);
    font-size: 1.5rem;
    position: absolute;
    left: 10px;
    top: 15px;
}

.container > ul:first-of-type li {
    padding-left: 35px;
    font-size: 0.95rem;
    color: var(--dark);
}

.container > ul:first-of-type li strong {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary);
    margin-top: 5px;
}

/* === BOUTON NOUVELLE OFFRE === */
.container .btn-primary {
    background: linear-gradient(to right, var(--primary), var(--primary-dark));
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: var(--radius);
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
}

.container .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
}

/* === LISTES D'OFFRES, RÉSERVATIONS, ETC === */
.container h3 + ul {
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    list-style: none;
    padding: 20px;
    margin: 0 0 30px 0;
    border: 1px solid var(--border);
}

.container h3 + ul li {
    padding: 15px;
    margin-bottom: 12px;
    border-radius: 8px;
    border-left: 4px solid var(--primary);
    background: #f8fafc;
    transition: all 0.3s ease;
    position: relative;
}

.container h3 + ul li:hover {
    background: white;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    transform: translateX(5px);
}

/* Offres */
.container h3:contains("Mes Offres") + ul li {
    border-left-color: var(--secondary);
}

.container h3:contains("Mes Offres") + ul li::before {
    content: "📋";
    margin-right: 10px;
    font-size: 1.1rem;
}

/* Statut des offres */
.container h3:contains("Mes Offres") + ul li:contains("en_attente"),
.container h3:contains("Mes Offres") + ul li:contains("En attente") {
    border-left-color: var(--warning);
}

.container h3:contains("Mes Offres") + ul li:contains("validé"),
.container h3:contains("Mes Offres") + ul li:contains("Validé") {
    border-left-color: var(--secondary);
}

.container h3:contains("Mes Offres") + ul li:contains("refusé"),
.container h3:contains("Mes Offres") + ul li:contains("Refusé") {
    border-left-color: var(--danger);
}

/* Réservations */
.container h3:contains("Réservations Reçues") + ul li {
    border-left-color: var(--info);
    padding-bottom: 20px;
}

.container h3:contains("Réservations Reçues") + ul li::before {
    content: "📅";
    margin-right: 10px;
    font-size: 1.1rem;
}

/* Bouton de conversation dans les réservations */
.container h3:contains("Réservations Reçues") + ul li form {
    margin-top: 10px;
    display: block;
}

.container h3:contains("Réservations Reçues") + ul li button {
    background: var(--primary);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.container h3:contains("Réservations Reçues") + ul li button:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* Conversations */
.container h3:contains("Conversations") + ul li {
    border-left-color: #9b59b6;
}

.container h3:contains("Conversations") + ul li a {
    color: var(--dark);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.container h3:contains("Conversations") + ul li a::before {
    content: "💬";
    font-size: 1.1rem;
}

.container h3:contains("Conversations") + ul li a:hover {
    color: var(--primary);
}

/* Signalements */
.container h3:contains("Signalements") + ul li {
    border-left-color: var(--danger);
}

.container h3:contains("Signalements") + ul li::before {
    content: "⚠️";
    margin-right: 10px;
    font-size: 1.1rem;
}

/* Statut des signalements */
.container h3:contains("Signalements") + ul li:contains("en attente"),
.container h3:contains("Signalements") + ul li:contains("en_attente") {
    border-left-color: var(--warning);
}

.container h3:contains("Signalements") + ul li:contains("traité"),
.container h3:contains("Signalements") + ul li:contains("traite") {
    border-left-color: var(--secondary);
}

/* === SÉPARATEURS === */
.container h3 {
    position: relative;
}

.container h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 15px;
    width: 50px;
    height: 3px;
    background: linear-gradient(to right, var(--secondary), var(--primary));
    border-radius: 2px;
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
    .container {
        padding: 15px;
        margin: 15px;
    }
    
    .container h2 {
        font-size: 1.6rem;
        text-align: center;
    }
    
    .container h3 {
        font-size: 1.2rem;
    }
    
    .container > ul:first-of-type {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .container h3 + ul li {
        padding: 12px;
        margin-bottom: 10px;
    }
    
    .btn-primary {
        width: 100%;
        justify-content: center;
    }
}

/* === ANIMATIONS === */
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

.container > ul:first-of-type li {
    animation: slideIn 0.4s ease-out forwards;
    animation-delay: calc(var(--i) * 0.1s);
    opacity: 0;
}

.container h3 + ul li {
    animation: fadeIn 0.3s ease-out forwards;
    animation-delay: calc(var(--j) * 0.05s);
    opacity: 0;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}
</style>
<div class="container">
    <h2>📊 Tableau de bord Prestataire</h2>

    <h3>Mes Statistiques</h3>
    <ul>
        <li>Total Offres : {{ $stats['total_offres'] }}</li>
        <li>Total Réservations : {{ $stats['total_reservations'] }}</li>
        <li>Total Vues : {{ $stats['total_vues'] }}</li>
        <li>Total Clics : {{ $stats['total_clics'] }}</li>
        <li>Total Conversations : {{ $stats['total_conversations'] }}</li>
        <li>Total Signalements : {{ $stats['total_signalements'] }}</li>
    </ul>

    <h3>Mes Offres</h3>
    <a href="{{ route('offers.create') }}" class="btn btn-primary">➕ Nouvelle Offre</a>
    <ul>
        @foreach($offers as $offer)
            <li>{{ $offer->titre }} ({{ $offer->statut }})</li>
        @endforeach
    </ul>

    <h3>Réservations Reçues</h3>
    <ul>
        @foreach($reservations as $reservation)
            <li>
                Offre : {{ $reservation->offer->titre }} | 
                Client : {{ $reservation->client->nom }} | 
               
                <form method="POST" action="{{ route('conversations.start', $reservation) }}">
                    @csrf
                    <button type="submit">💬 Démarrer la conversation</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h3>Conversations</h3>
    <ul>
        @foreach($conversations as $conversation)
            <li>
                <a href="{{ route('conversations.show', $conversation) }}">
                    Conversation #{{ $conversation->id }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- <h3>Signalements</h3>
    <ul>
        @foreach($reports as $report)
            <li>
                Signalement #{{ $report->id }} - Motif : {{ $report->motif }} - Statut : {{ $report->statut }}
            </li>
        @endforeach
    </ul> -->
</div>
@endsection
