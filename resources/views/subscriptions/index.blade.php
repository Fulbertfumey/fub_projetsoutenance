@extends('layouts.app')

@section('content')
<style>
   /* Variables CSS - Thème professionnel */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --dark-blue: #1a237e;
    --light-blue: #e3f2fd;
    --light-gray: #f8f9fa;
    --medium-gray: #e9ecef;
    --dark-gray: #495057;
    --text-primary: #212529;
    --text-secondary: #6c757d;
    --shadow-sm: 0 2px 10px rgba(0,0,0,0.08);
    --shadow-md: 0 5px 20px rgba(0,0,0,0.12);
    --shadow-lg: 0 10px 40px rgba(0,0,0,0.15);
    --radius-lg: 20px;
    --radius-md: 12px;
    --radius-sm: 8px;
    --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
}

/* Réinitialisation et styles généraux */
.pricing-page {
    padding: 5rem 1rem !important;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
    min-height: 100vh !important;
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Header amélioré */
.pricing-header {
    text-align: center !important;
    margin-bottom: 6rem !important;
    position: relative;
}

.pricing-title {
    font-size: 3.5rem !important;
    font-weight: 800 !important;
    color: transparent !important;
    background: var(--primary-gradient) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    margin-bottom: 1.5rem !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 1rem !important;
    letter-spacing: -0.5px;
    position: relative;
    padding-bottom: 1.5rem;
}

.pricing-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 2px;
}

.pricing-title span {
    font-size: 3rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-15px) rotate(10deg);
    }
}

.pricing-subtitle {
    font-size: 1.25rem !important;
    color: var(--text-secondary) !important;
    max-width: 800px !important;
    margin: 0 auto !important;
    line-height: 1.8 !important;
    font-weight: 400;
    background: white;
    padding: 1.5rem 2rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    border-left: 5px solid #667eea;
}

/* Container principal */
.pricing-container {
    max-width: 1400px !important;
    margin: 0 auto !important;
    position: relative;
}

/* Grille des cartes */
.pricing-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 3rem !important;
    margin-bottom: 5rem !important;
    position: relative;
    z-index: 1;
}

.pricing-grid::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--medium-gray), transparent);
    z-index: -1;
}

/* Cartes de prix */
.pricing-card {
    background: linear-gradient(145deg, #ffffff, #f5f5f5) !important;
    border-radius: var(--radius-lg) !important;
    padding: 3rem 2.5rem !important;
    box-shadow: var(--shadow-md) !important;
    border: 1px solid rgba(255, 255, 255, 0.8) !important;
    transition: var(--transition) !important;
    position: relative !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.pricing-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
}

.pricing-card:hover {
    transform: translateY(-15px) scale(1.02) !important;
    box-shadow: var(--shadow-lg) !important;
    border-color: #667eea !important;
}

/* Carte populaire */
.pricing-card.popular {
    border: 2px solid #667eea !important;
    background: linear-gradient(145deg, #ffffff, #f0f4ff) !important;
    position: relative;
    z-index: 2;
}

.pricing-card.popular::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    border-radius: var(--radius-lg);
    z-index: -1;
}

.popular-badge {
    position: absolute !important;
    top: -12px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    background: var(--primary-gradient) !important;
    color: white !important;
    padding: 0.75rem 2rem !important;
    border-radius: 30px !important;
    font-size: 0.9rem !important;
    font-weight: 700 !important;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4) !important;
    letter-spacing: 0.5px;
    z-index: 3;
    animation: pulseBadge 2s infinite;
}

@keyframes pulseBadge {
    0%, 100% {
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    50% {
        box-shadow: 0 5px 25px rgba(102, 126, 234, 0.6);
    }
}

/* Header des cartes */
.plan-header {
    text-align: center !important;
    margin-bottom: 2.5rem !important;
    padding-bottom: 2rem !important;
    border-bottom: 2px dashed var(--medium-gray) !important;
    position: relative;
}

.plan-title {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: var(--text-primary) !important;
    margin-bottom: 1rem !important;
    position: relative;
    display: inline-block;
}

.plan-title::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 2px;
}

.plan-price {
    font-size: 3.5rem !important;
    font-weight: 800 !important;
    color: #667eea !important;
    margin-bottom: 0.5rem !important;
    position: relative;
    display: inline-block;
}

.plan-price::before {
    content: 'F';
    font-size: 1.5rem;
    vertical-align: super;
    margin-right: 2px;
}

.pricing-card:nth-child(1) .plan-price::before {
    display: none;
}

.plan-period {
    color: var(--text-secondary) !important;
    font-size: 1rem !important;
    font-weight: 500;
    background: var(--light-gray);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    display: inline-block;
}

/* Liste des fonctionnalités */
.plan-features {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 0 2.5rem 0 !important;
    flex-grow: 1 !important;
}

.plan-features li {
    padding: 1rem 0 !important;
    color: var(--dark-gray) !important;
    display: flex !important;
    align-items: center !important;
    gap: 1rem !important;
    font-size: 1.05rem !important;
    position: relative;
    transition: var(--transition);
}

.plan-features li:hover {
    transform: translateX(10px);
    color: var(--text-primary);
}

.plan-features li:not(:last-child) {
    border-bottom: 1px solid rgba(0,0,0,0.05) !important;
}

.feature-check {
    color: #10b981 !important;
    font-size: 1.3rem !important;
    flex-shrink: 0 !important;
    background: rgba(16, 185, 129, 0.1);
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.plan-features li:hover .feature-check {
    transform: scale(1.2);
    background: rgba(16, 185, 129, 0.2);
}

/* Boutons */
.plan-button {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 100% !important;
    padding: 1.25rem 2rem !important;
    background: var(--primary-gradient) !important;
    color: white !important;
    border: none !important;
    border-radius: 12px !important;
    font-size: 1.125rem !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    transition: var(--transition) !important;
    text-decoration: none !important;
    gap: 0.75rem !important;
    margin-top: auto !important;
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
}

.plan-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: 0.5s;
}

.plan-button:hover::before {
    left: 100%;
}

.plan-button:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4196 100%) !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4) !important;
}

.plan-button:active {
    transform: translateY(-1px) !important;
}

.plan-button.secondary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    opacity: 0.9;
}

.plan-button span {
    font-size: 1.3rem;
    transition: var(--transition);
}

.plan-button:hover span {
    transform: scale(1.2) rotate(5deg);
}

/* Section comparaison */
.plan-comparison {
    background: linear-gradient(145deg, #ffffff, #f8f9fa) !important;
    border-radius: var(--radius-lg) !important;
    padding: 4rem 3rem !important;
    box-shadow: var(--shadow-md) !important;
    margin-top: 6rem !important;
    border: 1px solid rgba(0,0,0,0.05);
    position: relative;
    overflow: hidden;
}

.plan-comparison::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
}

.comparison-title {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: var(--text-primary) !important;
    text-align: center !important;
    margin-bottom: 3rem !important;
    position: relative;
    display: inline-block;
    left: 50%;
    transform: translateX(-50%);
}

.comparison-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 2px;
}

.comparison-table {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.comparison-table th,
.comparison-table td {
    padding: 1.25rem 1.5rem !important;
    text-align: center !important;
    border-bottom: 1px solid var(--medium-gray) !important;
    transition: var(--transition);
}

.comparison-table th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    color: white !important;
    font-weight: 600 !important;
    font-size: 1.1rem;
    position: relative;
}

.comparison-table th:first-child {
    border-top-left-radius: var(--radius-md);
}

.comparison-table th:last-child {
    border-top-right-radius: var(--radius-md);
}

.comparison-table tr:hover td {
    background: rgba(102, 126, 234, 0.03);
}

.comparison-table td {
    color: var(--text-secondary) !important;
    font-size: 1rem;
    background: white;
}

.comparison-table tr:last-child td {
    border-bottom: none;
}

.comparison-table td:first-child {
    text-align: left !important;
    font-weight: 600;
    color: var(--text-primary);
    background: var(--light-gray);
}

.feature-available {
    color: #10b981 !important;
    font-weight: 700 !important;
    position: relative;
}

.feature-available::before {
    content: '✓';
    margin-right: 8px;
    font-weight: bold;
}

.feature-unavailable {
    color: #dc3545 !important;
    opacity: 0.7 !important;
    position: relative;
}

.feature-unavailable::before {
    content: '✗';
    margin-right: 8px;
    font-weight: bold;
}

/* Responsive */
@media (max-width: 1200px) {
    .pricing-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        max-width: 900px;
        margin: 0 auto 4rem !important;
    }
    
    .pricing-card.popular {
        grid-column: span 2;
        max-width: 500px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .pricing-page {
        padding: 3rem 1rem !important;
    }
    
    .pricing-title {
        font-size: 2.5rem !important;
    }
    
    .pricing-subtitle {
        font-size: 1.1rem !important;
        padding: 1rem 1.5rem !important;
    }
    
    .pricing-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
    
    .pricing-card.popular {
        grid-column: 1;
        max-width: 100%;
    }
    
    .plan-comparison {
        padding: 2.5rem 1.5rem !important;
        margin-top: 4rem !important;
    }
    
    .comparison-table {
        display: block;
        overflow-x: auto;
    }
}

@media (max-width: 480px) {
    .pricing-title {
        font-size: 2rem !important;
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .plan-price {
        font-size: 2.5rem !important;
    }
    
    .pricing-card {
        padding: 2rem 1.5rem !important;
    }
    
    .plan-features li {
        font-size: 1rem !important;
    }
}

/* Effets spéciaux */
.plan-header .plan-price {
    position: relative;
    display: inline-block;
}

.plan-header .plan-price::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #667eea, transparent);
    border-radius: 2px;
}

/* Animation des cartes au scroll */
@keyframes cardSlideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.pricing-card {
    animation: cardSlideUp 0.6s ease-out forwards;
    opacity: 0;
}

.pricing-card:nth-child(1) { animation-delay: 0.1s; }
.pricing-card:nth-child(2) { animation-delay: 0.2s; }
.pricing-card:nth-child(3) { animation-delay: 0.3s; }
</style>

<div class="pricing-page">
    <div class="pricing-header">
        <h1 class="pricing-title">
            <span></span> Choisissez votre plan de promotion
        </h1>
        <p class="pricing-subtitle">
            MikiMultiService vous propose trois niveaux de visibilité pour mettre en avant vos services auprès des clients.
            Sélectionnez le plan qui correspond le mieux à vos besoins.
        </p>
        
        
    </div>
    
    <div class="pricing-container">
        <div class="pricing-grid">
            <!-- Plan Basique -->
            <div class="pricing-card">
                <div class="plan-header">
                    <h3 class="plan-title">Basique</h3>
                    <div class="plan-price">Gratuit</div>
                    <div class="plan-period">Essai de 7 jours</div>
                </div>
                
                <ul class="plan-features">
                    <li>
                        <span class="feature-check">✓</span>
                        Visibilité limitée dans les résultats
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Statistiques de base
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Support par email
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        1 publication simultanée
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Durée : 7 jours
                    </li>
                </ul>
                
                <a href="{{ route('ads.create', ['plan' => 'basique']) }}" class="plan-button secondary">
                    <span></span> Choisir ce plan
                </a>
            </div>
            
            <!-- Plan Premium -->
            <div class="pricing-card popular">
                <div class="popular-badge">LE PLUS POPULAIRE</div>
                <div class="plan-header">
                    <h3 class="plan-title">Premium</h3>
                    <div class="plan-price">2900CFA</div>
                    <div class="plan-period">par mois</div>
                </div>
                
                <ul class="plan-features">
                    <li>
                        <span class="feature-check">✓</span>
                        Visibilité renforcée
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Statistiques avancées détaillées
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Support prioritaire
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        3 publications simultanées
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Badge "Premium" exclusif
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Durée : 15 jours par publication
                    </li>
                </ul>
                
                <a href="{{ route('ads.create', ['plan' => 'premium']) }}" class="plan-button">
                    <span></span> Choisir ce plan
                </a>
            </div>
            
            <!-- Plan Entreprise -->
            <div class="pricing-card">
                <div class="plan-header">
                    <h3 class="plan-title">Entreprise</h3>
                    <div class="plan-price">9900CFA</div>
                    <div class="plan-period">par mois</div>
                </div>
                
                <ul class="plan-features">
                    <li>
                        <span class="feature-check">✓</span>
                        Visibilité maximale
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Analytics complets et rapports
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Support dédié 24/7
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Publications illimitées
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Page entreprise personnalisée
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Publicités ciblées
                    </li>
                    <li>
                        <span class="feature-check">✓</span>
                        Durée : 30 jours par publication
                    </li>
                </ul>
                
                <a href="{{ route('ads.create', ['plan' => 'entreprise']) }}" class="plan-button secondary">
                    <span></span> Choisir ce plan
                </a>
            </div>
        </div>
        
        <!-- Tableau comparatif -->
        <div class="plan-comparison">
            <h3 class="comparison-title">Comparaison des plans</h3>
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Fonctionnalités</th>
                        <th>Basique</th>
                        <th>Premium</th>
                        <th>Entreprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left;">Visibilité</td>
                        <td class="feature-available">Standard</td>
                        <td class="feature-available">Renforcée</td>
                        <td class="feature-available">Maximale</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Statistiques</td>
                        <td class="feature-available">Basiques</td>
                        <td class="feature-available">Avancées</td>
                        <td class="feature-available">Complètes</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Support</td>
                        <td class="feature-available">Email</td>
                        <td class="feature-available">Prioritaire</td>
                        <td class="feature-available">Dédié 24/7</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Publications simultanées</td>
                        <td>1</td>
                        <td>3</td>
                        <td>Illimitées</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Durée par publication</td>
                        <td>7 jours</td>
                        <td>15 jours</td>
                        <td>30 jours</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Badge spécial</td>
                        <td class="feature-unavailable">✗</td>
                        <td class="feature-available">Premium</td>
                        <td class="feature-available">Entreprise</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:1.5rem;">
                          <a href="{{ route('Home') }}">
                              <button> Retour à l'accueil</button>
                          </a>
                     </div>
                </div>
    </div>
</div>
@endsection