@extends('layouts.app')

@section('content')

<<style>
/* Variables CSS */
:root {
    --primary: #4361ee;
    --primary-dark: #3a56d4;
    --primary-light: #eef2ff;
    --secondary: #6c757d;
    --success: #28a745;
    --light: #f8f9fa;
    --dark: #212529;
    --border: #dee2e6;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 8px 24px rgba(0, 0, 0, 0.12);
    --radius: 10px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Styles généraux du formulaire */
form[method="POST"] {
    max-width: 700px !important;
    margin: 40px auto !important;
    padding: 40px;
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    transition: var(--transition);
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

form[method="POST"]:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-2px);
}

/* Titre du formulaire */
h2[style*="text-align:center"] {
    text-align: center !important;
    margin: 60px auto 30px !important;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark);
    position: relative;
    padding-bottom: 15px;
    background: linear-gradient(135deg, var(--primary) 0%, #7209b7 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    width: fit-content;
    margin-left: auto !important;
    margin-right: auto !important;
}

h2[style*="text-align:center"]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), transparent);
    border-radius: 2px;
}

/* Styles des groupes de formulaire */
.form-groupe {
    margin-bottom: 30px;
    position: relative;
    animation: slideUp 0.5s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.form-groupe:nth-child(1) { animation-delay: 0.1s; }
.form-groupe:nth-child(2) { animation-delay: 0.2s; }
.form-groupe:nth-child(3) { animation-delay: 0.3s; }
.form-groupe:nth-child(4) { animation-delay: 0.4s; }
.form-groupe:nth-child(5) { animation-delay: 0.5s; }

@keyframes slideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Labels */
.form-groupe label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--dark);
    font-size: 0.95rem;
    transition: var(--transition);
}

/* Champs de saisie */
.form-groupe input[type="text"],
.form-groupe input[type="url"],
.form-groupe textarea {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid var(--border);
    border-radius: var(--radius);
    font-size: 16px;
    transition: var(--transition);
    background: white;
    box-sizing: border-box;
    font-family: inherit;
}

.form-groupe input[readonly] {
    background-color: var(--light);
    color: var(--secondary);
    border-style: dashed;
    cursor: not-allowed;
    font-weight: 500;
}

.form-groupe textarea {
    min-height: 140px;
    resize: vertical;
    line-height: 1.6;
}

/* Effets au focus */
.form-groupe input:focus,
.form-groupe textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    transform: translateY(-1px);
}

/* Champ file personnalisé */
.form-groupe input[type="file"] {
    width: 100%;
    padding: 14px 16px;
    border: 2px dashed var(--border);
    border-radius: var(--radius);
    background-color: var(--light);
    cursor: pointer;
    transition: var(--transition);
    font-size: 16px;
    color: var(--secondary);
    box-sizing: border-box;
}

.form-groupe input[type="file"]:hover {
    border-color: var(--primary);
    background-color: var(--primary-light);
    color: var(--primary);
}

/* Bouton de soumission */
form[method="POST"] button[type="submit"] {
    display: block;
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    border-radius: var(--radius);
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 40px;
    position: relative;
    overflow: hidden;
}

form[method="POST"] button[type="submit"]:hover {
    background: linear-gradient(135deg, var(--primary-dark), #2a3fc4);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
}

form[method="POST"] button[type="submit"]:active {
    transform: translateY(-1px);
}

/* Effet de vague au clic */
form[method="POST"] button[type="submit"]::after {
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

form[method="POST"] button[type="submit"]:focus:not(:active)::after {
    animation: ripple 1s ease-out;
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    100% {
        transform: scale(30, 30);
        opacity: 0;
    }
}

/* Indicateurs de validation */
.form-groupe input:valid:not([readonly]):not([type="file"]),
.form-groupe textarea:valid {
    border-color: var(--success);
}

.form-groupe input:invalid:not(:placeholder-shown):not([readonly]):not([type="file"]),
.form-groupe textarea:invalid:not(:placeholder-shown) {
    border-color: #dc3545;
}

/* Placeholders */
.form-groupe input::placeholder,
.form-groupe textarea::placeholder {
    color: #adb5bd;
    font-style: italic;
}

/* Responsive */
@media (max-width: 768px) {
    form[method="POST"] {
        max-width: 95% !important;
        margin: 30px auto !important;
        padding: 25px 20px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2rem;
        margin: 40px auto 20px !important;
    }
    
    .form-groupe {
        margin-bottom: 25px;
    }
    
    .form-groupe input,
    .form-groupe textarea {
        padding: 12px 14px;
    }
    
    form[method="POST"] button[type="submit"] {
        padding: 14px;
        margin-top: 30px;
    }
}

@media (max-width: 480px) {
    form[method="POST"] {
        padding: 20px 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 1.75rem;
    }
    
    form[method="POST"] button[type="submit"] {
        font-size: 1rem;
    }
}

/* Animation d'apparition du formulaire */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

form[method="POST"] {
    animation: fadeIn 0.6s ease-out;
}

/* Effet de focus sur les labels */
.form-groupe:focus-within label {
    color: var(--primary);
    transform: translateX(5px);
}

/* Style pour le champ readonly */
.form-groupe input[readonly]::before {
    content: '🔒';
    margin-right: 8px;
}

/* File name display */
.form-groupe input[type="file"]::file-selector-button {
    visibility: hidden;
    width: 0;
    padding: 0;
}

.form-groupe input[type="file"]::before {
    content: '📁 Choisir un fichier';
    display: inline-block;
    background: var(--primary);
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    margin-right: 10px;
    font-size: 14px;
    font-weight: 500;
}

/* Loading state pour le bouton */
form[method="POST"] button[type="submit"].loading {
    pointer-events: none;
    opacity: 0.8;
}

form[method="POST"] button[type="submit"].loading::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

/* Effet de bordure animée pour les champs */
.form-groupe {
    position: relative;
}

.form-groupe::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary), transparent);
    transition: width 0.3s ease;
}

.form-groupe:focus-within::after {
    width: 100%;
}
</style>
<h2 style="text-align:center;">Publier une publicité</h2>

<form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data" style="max-width:600px; margin:auto;">
    @csrf

    <div class="form-groupe">
        <label for="plan">Plan choisi</label>
        <input type="text" id="plan" name="plan" value="{{ $plan }}" readonly>
    </div>

    <div class="form-groupe">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div class="form-groupe">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="form-groupe">
        <label for="image">Image (optionnelle)</label>
        <input type="file" id="image" name="image">
    </div>

    <div class="form-groupe">
        <label for="link">Lien externe</label>
        <input type="url" id="link" name="link">
    </div>

    <button type="submit">Publier</button>
</form>
@endsection
