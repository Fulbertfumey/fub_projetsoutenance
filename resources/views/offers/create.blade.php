@extends('layouts.app')

@section('content')
<style>
/* === VARIABLES MODERNES === */
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --primary-light: #dbeafe;
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;
    --dark: #1e293b;
    --light: #f8fafc;
    --gray: #64748b;
    --gray-light: #e2e8f0;
    --border: #cbd5e1;
    --radius: 12px;
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
}

/* === CONTAINER PRINCIPAL === */
[style*="max-width:700px"] {
    background: white;
    padding: 40px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    margin: 40px auto;
    transition: all 0.3s ease;
}

[style*="max-width:700px"]:hover {
    box-shadow: var(--shadow-hover);
}

/* === TITRE === */
[style*="max-width:700px"] h2 {
    color: var(--dark);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
    padding-bottom: 15px;
    position: relative;
}

[style*="max-width:700px"] h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, var(--primary), var(--success));
    border-radius: 2px;
}

/* === MESSAGE DE SUCCÈS === */
[style*="background:#d4edda"] {
    background: linear-gradient(to right, #d1fae5, #a7f3d0) !important;
    color: #065f46 !important;
    padding: 16px 20px !important;
    border-radius: var(--radius) !important;
    border-left: 4px solid var(--success) !important;
    margin-bottom: 25px !important;
    font-weight: 500;
    animation: slideIn 0.4s ease-out;
    display: flex;
    align-items: center;
    gap: 10px;
}

[style*="background:#d4edda"]::before {
    content: "✓";
    font-size: 1.2rem;
    font-weight: bold;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* === FORMULAIRE === */
[style*="display:flex; flex-direction:column;"] {
    gap: 25px !important;
}

/* === GROUPES DE CHAMPS === */
[style*="display:flex; flex-direction:column;"] > div {
    position: relative;
}

/* === LABELS === */
[style*="display:flex; flex-direction:column;"] label {
    display: block;
    margin-bottom: 8px;
    color: var(--dark);
    font-weight: 600;
    font-size: 0.95rem;
    position: relative;
    padding-left: 5px;
}

[style*="display:flex; flex-direction:column;"] label::after {
    content: '*';
    color: var(--danger);
    margin-left: 3px;
    opacity: 0.7;
}

[style*="display:flex; flex-direction:column;"] label[for="prix"]::after,
[style*="display:flex; flex-direction:column;"] label[for="image"]::after {
    content: '(optionnel)';
    color: var(--gray);
    font-weight: 400;
    font-size: 0.85rem;
    margin-left: 8px;
}

[style*="display:flex; flex-direction:column;"] label[for="prix"]::after {
    content: '(optionnel - €)';
}

[style*="display:flex; flex-direction:column;"] label[for="image"]::after {
    content: '(optionnel - JPG, PNG)';
}

/* === CHAMPS DE FORMULAIRE === */
[style*="display:flex; flex-direction:column;"] input[type="text"],
[style*="display:flex; flex-direction:column;"] input[type="number"],
[style*="display:flex; flex-direction:column;"] select,
[style*="display:flex; flex-direction:column;"] textarea {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid var(--border);
    border-radius: 8px;
    font-size: 1rem;
    color: var(--dark);
    background: var(--light);
    transition: all 0.3s ease;
    font-family: inherit;
}

[style*="display:flex; flex-direction:column;"] input[type="text"]:focus,
[style*="display:flex; flex-direction:column;"] input[type="number"]:focus,
[style*="display:flex; flex-direction:column;"] select:focus,
[style*="display:flex; flex-direction:column;"] textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    background: white;
}

/* === TEXTAREA === */
[style*="display:flex; flex-direction:column;"] textarea {
    resize: vertical;
    min-height: 120px;
    line-height: 1.5;
}

/* === SELECT === */
[style*="display:flex; flex-direction:column;"] select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 12px;
    padding-right: 40px;
    cursor: pointer;
}

/* === INPUT FILE === */
[style*="display:flex; flex-direction:column;"] input[type="file"] {
    width: 100%;
    padding: 14px 16px;
    border: 2px dashed var(--border);
    border-radius: 8px;
    background: var(--light);
    color: var(--gray);
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

[style*="display:flex; flex-direction:column;"] input[type="file"]:hover {
    border-color: var(--primary);
    background: rgba(37, 99, 235, 0.02);
}

[style*="display:flex; flex-direction:column;"] input[type="file"]::file-selector-button {
    background: var(--primary);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    margin-right: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

[style*="display:flex; flex-direction:column;"] input[type="file"]::file-selector-button:hover {
    background: var(--primary-dark);
}

/* === BOUTON DE SOUMISSION === */
[style*="display:flex; flex-direction:column;"] button[type="submit"] {
    background: linear-gradient(to right, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 16px;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
    position: relative;
    overflow: hidden;
}

[style*="display:flex; flex-direction:column;"] button[type="submit"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
}

[style*="display:flex; flex-direction:column;"] button[type="submit"]:active {
    transform: translateY(-1px);
}

[style*="display:flex; flex-direction:column;"] button[type="submit"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

[style*="display:flex; flex-direction:column;"] button[type="submit"]:hover::before {
    left: 100%;
}

/* === INDICATEUR DE CHAMP REQUIS === */
[style*="display:flex; flex-direction:column;"] > div::after {
    content: '*';
    color: var(--danger);
    position: absolute;
    top: 5px;
    right: 15px;
    font-size: 1.2rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

[style*="display:flex; flex-direction:column;"] > div:has(input[required]):not(:has(label[for*="prix"], label[for*="image"]))::after,
[style*="display:flex; flex-direction:column;"] > div:has(select[required])::after,
[style*="display:flex; flex-direction:column;"] > div:has(textarea[required])::after {
    opacity: 0.7;
}

/* === ANIMATION DES CHAMPS === */
@keyframes fieldAppear {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

[style*="display:flex; flex-direction:column;"] > div {
    animation: fieldAppear 0.5s ease-out forwards;
    opacity: 0;
}

[style*="display:flex; flex-direction:column;"] > div:nth-child(1) { animation-delay: 0.1s; }
[style*="display:flex; flex-direction:column;"] > div:nth-child(2) { animation-delay: 0.2s; }
[style*="display:flex; flex-direction:column;"] > div:nth-child(3) { animation-delay: 0.3s; }
[style*="display:flex; flex-direction:column;"] > div:nth-child(4) { animation-delay: 0.4s; }
[style*="display:flex; flex-direction:column;"] > div:nth-child(5) { animation-delay: 0.5s; }
[style*="display:flex; flex-direction:column;"] > div:nth-child(6) { animation-delay: 0.6s; }

/* === RESPONSIVE === */
@media (max-width: 768px) {
    [style*="max-width:700px"] {
        padding: 25px 20px;
        margin: 20px 15px;
    }
    
    [style*="max-width:700px"] h2 {
        font-size: 1.6rem;
        text-align: center;
    }
    
    [style*="display:flex; flex-direction:column;"] input[type="text"],
    [style*="display:flex; flex-direction:column;"] input[type="number"],
    [style*="display:flex; flex-direction:column;"] select,
    [style*="display:flex; flex-direction:column;"] textarea {
        padding: 12px 14px;
    }
    
    [style*="display:flex; flex-direction:column;"] button[type="submit"] {
        padding: 14px;
        font-size: 1rem;
    }
}

/* === PLACEHOLDER STYLING === */
::placeholder {
    color: var(--gray);
    opacity: 0.6;
}

/* === FOCUS VISIBLE === */
:focus-visible {
    outline: 2px solid var(--primary);
    outline-offset: 2px;
}
</style>
<div style="max-width:700px; margin:auto;">
    <h2 style="text-align:center;">➕ Publier une nouvelle offre</h2>

    @if(session('status'))
        <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:1rem;">
        @csrf

        <div>
            <label for="titre">Titre de l’offre</label>
            <input type="text" id="titre" name="titre" required>
        </div>

        <div>
            <label for="category_id">Catégorie</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <div>
            <label for="prix">Prix (optionnel)</label>
            <input type="number" id="prix" name="prix" min="0">
        </div>

        <div>
            <label for="image">Image (optionnelle)</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Publier l’offre</button>
    </form>
</div>
@endsection
