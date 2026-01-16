@extends('layouts.app')

@section('content')
<<style>
/* Variables modernes */
:root {
    --primary: #4f46e5;
    --primary-dark: #4338ca;
    --primary-light: #e0e7ff;
    --secondary: #7c3aed;
    --accent: #06b6d4;
    --success: #10b981;
    --dark: #1f2937;
    --light: #f9fafb;
    --text-primary: #111827;
    --text-secondary: #6b7280;
    --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --radius-lg: 20px;
    --radius-md: 12px;
    --radius-sm: 8px;
    --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Conteneur principal */
div[style*="max-width:900px"] {
    max-width: 1000px !important;
    margin: 60px auto !important;
    padding: 0 20px;
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
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
    font-size: 3.5rem !important;
    font-weight: 800 !important;
    margin: 40px auto 60px !important;
    color: transparent !important;
    background: var(--gradient-primary) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
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
    width: 120px;
    height: 5px;
    background: var(--gradient-primary);
    border-radius: 3px;
}

h2[style*="text-align:center"]::before {
    content: '✨';
    position: absolute;
    left: -40px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2.5rem;
    animation: spin 20s linear infinite;
}

h2[style*="text-align:center"]::after {
    content: '✨';
    position: absolute;
    right: -40px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2.5rem;
    animation: spin 20s linear infinite reverse;
}

@keyframes spin {
    from { transform: translateY(-50%) rotate(0deg); }
    to { transform: translateY(-50%) rotate(360deg); }
}

/* Sections */
section[style*="margin-top:2rem"] {
    margin: 60px 0 !important;
    padding: 40px;
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.8);
    position: relative;
    overflow: hidden;
    transition: var(--transition);
    backdrop-filter: blur(10px);
}

section[style*="margin-top:2rem"]:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

section[style*="margin-top:2rem"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: var(--gradient-primary);
    border-radius: var(--radius-lg) 0 0 var(--radius-lg);
}

/* Titres des sections */
section[style*="margin-top:2rem"] h3 {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: var(--dark) !important;
    margin-bottom: 25px !important;
    display: flex;
    align-items: center;
    gap: 15px;
    position: relative;
    padding-bottom: 15px;
}

section[style*="margin-top:2rem"] h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--gradient-primary);
    border-radius: 2px;
}

/* Icônes dans les titres */
h3[style*="🌍"]::before { content: '🌍'; }
h3[style*="💡"]::before { content: '💡'; }
h3[style*="🚀"]::before { content: '🚀'; }
h3[style*="🤝"]::before { content: '🤝'; }

section[style*="margin-top:2rem"] h3::before {
    font-size: 2rem;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(5deg); }
}

/* Paragraphes */
section[style*="margin-top:2rem"] p {
    font-size: 1.15rem !important;
    line-height: 1.8 !important;
    color: var(--text-secondary) !important;
    margin-bottom: 25px !important;
    padding: 0 10px;
}

section[style*="margin-top:2rem"] p strong {
    color: var(--primary) !important;
    font-weight: 700 !important;
    position: relative;
    display: inline-block;
}

section[style*="margin-top:2rem"] p strong::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background: var(--gradient-primary);
    transform: scaleX(0);
    transition: transform 0.3s ease;
    transform-origin: right;
}

section[style*="margin-top:2rem"] p:hover strong::after {
    transform: scaleX(1);
    transform-origin: left;
}

/* Listes */
section[style*="margin-top:2rem"] ul[style*="list-style:none"] {
    list-style: none !important;
    padding: 0 !important;
    margin: 25px 0 !important;
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li {
    padding: 15px 20px !important;
    margin: 10px 0 !important;
    background: linear-gradient(to right, #ffffff, #f1f5f9);
    border-radius: var(--radius-sm);
    font-size: 1.1rem !important;
    color: var(--text-primary) !important;
    display: flex !important;
    align-items: center !important;
    gap: 15px;
    transition: var(--transition);
    border-left: 4px solid transparent;
    position: relative;
    overflow: hidden;
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(79, 70, 229, 0.05), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li:hover::before {
    transform: translateX(100%);
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-sm);
    border-left-color: var(--primary);
    background: linear-gradient(to right, #ffffff, #e0e7ff);
}

/* Icônes des listes */
ul[style*="list-style:none"] li::after {
    font-size: 1.3rem;
    font-weight: bold;
}

li:contains("✔️")::after { content: '✅'; }
li:contains("🔎")::after { content: '🔍'; }
li:contains("📊")::after { content: '📈'; }
li:contains("📩")::after { content: '💬'; }
li:contains("🚨")::after { content: '🚨'; }

ul[style*="list-style:none"] li::after {
    margin-left: auto;
    opacity: 0.7;
    transition: var(--transition);
}

ul[style*="list-style:none"] li:hover::after {
    opacity: 1;
    transform: scale(1.2);
}

/* Section centrale */
section[style*="text-align:center"] {
    text-align: center !important;
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe) !important;
    border: 2px solid rgba(6, 182, 212, 0.2) !important;
}

section[style*="text-align:center"] h3 {
    justify-content: center !important;
    color: #0e7490 !important;
}

section[style*="text-align:center"] h3::after {
    left: 50% !important;
    transform: translateX(-50%) !important;
    background: var(--gradient-accent) !important;
}

section[style*="text-align:center"] p {
    font-size: 1.25rem !important;
    max-width: 700px;
    margin: 0 auto 35px !important;
    color: #0e7490 !important;
}

/* Bouton */
section[style*="text-align:center"] a[href*="register"] {
    display: inline-block;
    text-decoration: none !important;
    position: relative;
}

section[style*="text-align:center"] a[href*="register"] button {
    background: var(--gradient-primary) !important;
    color: white !important;
    border: none !important;
    padding: 18px 45px !important;
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    border-radius: 50px !important;
    cursor: pointer !important;
    transition: var(--transition) !important;
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
    box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    min-width: 220px;
}

section[style*="text-align:center"] a[href*="register"] button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

section[style*="text-align:center"] a[href*="register"] button:hover::before {
    left: 100%;
}

section[style*="text-align:center"] a[href*="register"] button:hover {
    background: linear-gradient(135deg, #4338ca 0%, #5b21b6 100%) !important;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(79, 70, 229, 0.4);
}

section[style*="text-align:center"] a[href*="register"] button:active {
    transform: translateY(-1px) scale(1.02);
}

section[style*="text-align:center"] a[href*="register"] button::after {
    content: '🚀';
    margin-left: 10px;
    font-size: 1.3rem;
    animation: rocket 2s ease-in-out infinite;
}

@keyframes rocket {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-5px) rotate(10deg);
    }
}

/* Effets de décoration */
section[style*="margin-top:2rem"]::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), transparent);
    border-radius: 0 0 0 100px;
    z-index: -1;
}

/* Animation des sections au scroll */
@keyframes sectionSlideIn {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

section[style*="margin-top:2rem"] {
    animation: sectionSlideIn 0.8s ease-out forwards;
    opacity: 0;
}

section[style*="margin-top:2rem"]:nth-child(1) { animation-delay: 0.1s; }
section[style*="margin-top:2rem"]:nth-child(2) { animation-delay: 0.3s; }
section[style*="margin-top:2rem"]:nth-child(3) { animation-delay: 0.5s; }
section[style*="margin-top:2rem"]:nth-child(4) { animation-delay: 0.7s; }

/* Responsive */
@media (max-width: 768px) {
    div[style*="max-width:900px"] {
        max-width: 95% !important;
        margin: 40px auto !important;
        padding: 0 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.5rem !important;
        margin: 30px auto 40px !important;
    }
    
    h2[style*="text-align:center"]::before,
    h2[style*="text-align:center"]::after {
        display: none;
    }
    
    section[style*="margin-top:2rem"] {
        margin: 40px 0 !important;
        padding: 25px;
    }
    
    section[style*="margin-top:2rem"] h3 {
        font-size: 1.75rem !important;
    }
    
    section[style*="text-align:center"] a[href*="register"] button {
        padding: 16px 35px !important;
        font-size: 1.1rem !important;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 2rem !important;
    }
    
    section[style*="margin-top:2rem"] {
        padding: 20px;
    }
    
    section[style*="margin-top:2rem"] h3 {
        font-size: 1.5rem !important;
    }
    
    section[style*="margin-top:2rem"] p {
        font-size: 1rem !important;
    }
    
    section[style*="margin-top:2rem"] ul[style*="list-style:none"] li {
        padding: 12px 15px !important;
        font-size: 1rem !important;
    }
}

/* Effet de particules décoratives */
div[style*="max-width:900px"]::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(79, 70, 229, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 90% 40%, rgba(124, 58, 237, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 50% 80%, rgba(6, 182, 212, 0.1) 0%, transparent 20%);
    pointer-events: none;
    z-index: -1;
}

/* Highlight sur les sections au survol */
section[style*="margin-top:2rem"]:hover h3::before {
    animation: highlight 0.5s ease-out;
}

@keyframes highlight {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); }
    100% { transform: scale(1); }
}

section {
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  margin-top: 30px;
}
section h2 {
  color: #0073e6;
}

</style>
<div style="max-width:900px; margin:auto;">
    <h2 style="text-align:center;">À propos de MultiService Pro</h2>

    <section style="margin-top:2rem;">
        <h3>🌍 Notre mission</h3>
        <p>
            MikiMultiService est une plateforme conçue pour connecter les <strong>clients</strong> et les <strong>prestataires</strong> 
            dans un environnement fiable et transparent. Notre objectif est de faciliter la recherche de services, 
            la réservation et la promotion de marques locales.
        </p>
    </section>

    <section style="margin-top:2rem;">
        <h3>💡 Nos valeurs</h3>
        <ul style="list-style:none; padding:0;">
            <li>✔️ Transparence et confiance entre utilisateurs</li>
            <li>✔️ Simplicité d’utilisation et accessibilité</li>
            <li>✔️ Sécurité grâce au système de signalement</li>
            <li>✔️ Opportunités de promotion pour les prestataires</li>
        </ul>
    </section>

    <section style="margin-top:2rem;">
        <h3>🚀 Pourquoi nous choisir ?</h3>
        <p>
            Que vous soyez un <strong>client</strong> à la recherche d’un service fiable ou un <strong>prestataire</strong> 
            souhaitant promouvoir vos offres, MultiService Pro vous offre une solution complète :
        </p>
        <ul style="list-style:none; padding:0;">
            <li>🔎 Recherche rapide et intuitive des services</li>
            <li>📊 Outils de promotion adaptés à vos besoins</li>
            <li>📩 Messagerie interne pour une communication fluide</li>
            <li>🚨 Signalement intégré pour garantir la qualité</li>
        </ul>
    </section>

   
<div class="cont">
    
    <!-- Nouvelle section Politique de confidentialité -->
    <section class="mt-5">
        <h2>Politique de confidentialité</h2>
        <p>
            Chez MikiMultiService, nous respectons la confidentialité de vos données.
            Les informations collectées (nom, email, téléphone) sont utilisées uniquement
            pour le traitement de vos commandes et la communication avec vous.
        </p>
        <p>
            Vos données ne sont jamais vendues à des tiers. Elles sont protégées par des
            mesures de sécurité adaptées. Vous pouvez à tout moment demander la modification
            ou la suppression de vos informations en nous contactant à :
            <a href="mailto:fumeyfulbert@gmail.com">contact@mikimultiservice.com</a>.
        </p>
    </section>
</div>


    <section style="margin-top:2rem; text-align:center;">
        <h3>🤝 Rejoignez-nous dès aujourd’hui</h3>
        <p>
            Inscrivez-vous gratuitement et découvrez une nouvelle façon de collaborer et de promouvoir vos services.
        </p>
        <a href="{{ route('register') }}">
            <button>Créer un compte</button>
        </a>
    </section>
</div>
@endsection
