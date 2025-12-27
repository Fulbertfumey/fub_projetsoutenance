@extends('layouts.app')

@section('content')
<style>
    /* Reset des marges et paddings pour occuper tout l'écran */
    .home-container {
        width: 97.6%;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }
    
    /* Variables de design */
    :root {
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --primary-light: #3b82f6;
        --secondary-color: #7c3aed;
        --secondary-dark: #6d28d9;
        --dark-bg: #111827;
        --light-bg: #f9fafb;
        --white: #ffffff;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-600: #4b5563;
        --gray-800: #1f2937;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
    }
    
    /* Section Hero - Pleine largeur */
    .hero-section {
        background: linear-gradient(135deg, var(--dark-bg) 0%, #374151 100%);
        color: var(--white);
        padding: 5rem 1rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(37, 99, 235, 0.1) 0%, transparent 50%);
    }
    
    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        position: relative;
        z-index: 1;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        color: var(--gray-300);
        max-width: 800px;
        margin: 0 auto 3rem;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }
    
    .hero-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }
    
    /* Boutons */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 2.5rem;
        font-weight: 600;
        border-radius: var(--radius-md);
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        font-size: 1.125rem;
        gap: 0.75rem;
        min-width: 200px;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: var(--white);
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
        background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--white);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--white);
        transform: translateY(-3px);
    }
    
    .btn-success {
        background: linear-gradient(135deg, var(--success-color), #059669);
        color: var(--white);
    }
    
    .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
    }
    
    /* Section Promotion - Pleine largeur avec padding interne seulement */
    .promotion-section {
        background: var(--white);
        padding: 4rem 1rem;
        width: 100%;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 1rem;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }
    
    .section-subtitle {
        color: var(--gray-600);
        font-size: 1.25rem;
        max-width: 900px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* Plans de tarification */
    .pricing-plans {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 1rem;
    }
    
    .pricing-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        position: relative;
        box-shadow: var(--shadow-lg);
    }
    
    .pricing-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-color);
    }
    
    .pricing-card.popular {
        border: 3px solid var(--primary-color);
        position: relative;
    }
    
    .popular-badge {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-color);
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-size: 0.875rem;
        font-weight: 700;
        box-shadow: var(--shadow-md);
    }
    
    .plan-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--gray-800);
        text-align: center;
        margin-bottom: 1.5rem;
    }
    
    .plan-features {
        list-style: none;
        padding: 0;
        margin: 2rem 0;
    }
    
    .plan-features li {
        padding: 0.75rem 0;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1rem;
        border-bottom: 1px solid var(--gray-100);
    }
    
    .plan-features li:last-child {
        border-bottom: none;
    }
    
    .plan-features li::before {
        content: "✓";
        color: var(--success-color);
        font-weight: bold;
        font-size: 1.125rem;
    }
    
    .plan-actions {
        text-align: center;
        margin-top: 2rem;
    }
    
    /* Section Catégories - Pleine largeur */
    .categories-section {
        background: var(--light-bg);
        padding: 4rem 1rem;
        width: 100%;
    }
    
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 1rem;
    }
    
    .category-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-color);
    }
    
    .category-icon {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        display: block;
    }
    
    .category-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 1rem;
    }
    
    .category-description {
        color: var(--gray-600);
        line-height: 1.7;
        font-size: 1.125rem;
    }
    
    /* Section Features - Pleine largeur */
    .features-section {
        background: var(--white);
        padding: 4rem 1rem;
        width: 100%;
        border-top: 1px solid var(--gray-200);
        border-bottom: 1px solid var(--gray-200);
    }
    
    .features-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 1rem;
    }
    
    .feature-item {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid var(--gray-200);
        box-shadow: var(--shadow-sm);
    }
    
    .feature-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-color);
    }
    
    .feature-icon {
        color: var(--primary-color);
        font-size: 2rem;
        flex-shrink: 0;
        background: var(--gray-100);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-content h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 0.75rem;
    }
    
    .feature-content p {
        color: var(--gray-600);
        font-size: 1rem;
        line-height: 1.6;
    }
    
    /* Section CTA - Pleine largeur */
    .cta-section {
        background: linear-gradient(135deg, var(--secondary-color), var(--secondary-dark));
        color: var(--white);
        padding: 5rem 1rem;
        text-align: center;
        width: 100%;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
    }
    
    .cta-subtitle {
        font-size: 1.25rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto 3rem;
        line-height: 1.6;
    }
    
    .cta-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2.25rem;
        }
        
        .categories-grid,
        .pricing-plans {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1.125rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .section-subtitle {
            font-size: 1.125rem;
        }
        
        .hero-actions,
        .cta-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            max-width: 400px;
        }
        
        .categories-grid,
        .pricing-plans,
        .features-list {
            grid-template-columns: 1fr;
        }
        
        .pricing-card,
        .category-card,
        .feature-item {
            padding: 2rem 1.5rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section {
            padding: 4rem 1rem;
        }
        
        .hero-title {
            font-size: 1.75rem;
        }
        
        .section-title {
            font-size: 1.75rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .btn {
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
            min-width: auto;
        }
        
        .category-icon {
            font-size: 2.5rem;
        }
    }
</style>

<div class="home-container">
    <!-- Section Hero - Pleine largeur -->
    <section class="hero-section">
        <h1 class="hero-title">Bienvenue sur MikiMultiService </h1>
        <p class="hero-subtitle">
            La plateforme qui connecte clients, prestataires et administrateurs pour tous vos besoins de services
        </p>
        <div class="hero-actions">
            <a href="{{ route('offers.index') }}" class="btn btn-primary">
                📋 Parcourir les offres
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary">
                👤 Créer un compte
            </a>
        </div>
    </section>
    
    <!-- Section Promotion - Pleine largeur -->
    <section class="promotion-section">
        <div class="section-header">
            <h2 class="section-title">
                <span>📣</span> Promouvoir votre marque
            </h2>
            <p class="section-subtitle">
                Augmentez votre visibilité grâce à nos plans de promotion adaptés à tous les budgets.
                MikiMultiService vous permet de mettre en avant vos services auprès des clients les plus actifs.
            </p>
        </div>
        
        <div class="pricing-plans">
            <!-- Plan Basique -->
            <div class="pricing-card">
                <h3 class="plan-title">Basique</h3>
                <ul class="plan-features">
                    <li>Visibilité standard</li>
                    <li>Statistiques de base</li>
                    <li>Support email</li>
                    <li>1 publication simultanée</li>
                </ul><br><br><br><br>




                 <div class="plan-actions">
                    <a href="{{ route('promotions.subscribe') }}" class="btn btn-primary">
                        Choisir ce plan
                    </a>
                </div>
            </div>
            
            <!-- Plan Premium -->
            <div class="pricing-card popular">
                <div class="popular-badge">LE PLUS POPULAIRE</div>
                <h3 class="plan-title">Premium</h3>
                <ul class="plan-features">
                    <li>Visibilité renforcée</li>
                    <li>Statistiques avancées</li>
                    <li>Support prioritaire</li>
                    <li>3 publications simultanées</li>
                    <li>Badge "Premium" exclusif</li>
                    <li>Mise en avant dans les résultats</li>
                </ul>
                <div class="plan-actions">
                    <a href="{{ route('promotions.subscribe') }}" class="btn btn-primary">
                        Choisir ce plan
                    </a>
                </div>
            </div>
            
            <!-- Plan Entreprise -->
            <div class="pricing-card">
                <h3 class="plan-title">Entreprise</h3>
                <ul class="plan-features">
                    <li>Visibilité maximale</li>
                    <li>Analytics complets</li>
                    <li>Support dédié 24/7</li>
                    <li>Publications illimitées</li>
                    <li>Page entreprise personnalisée</li>
                    <li>Publicités ciblées</li>
                    <li>API d'intégration</li>
                </ul>
                <div class="plan-actions">
                    <a href="{{ route('promotions.subscribe') }}" class="btn btn-primary">
                        Choisir ce plan
                    </a>
                </div>
            </div>
        </div>
        
        <div class="section-header">
            <div class="hero-actions">
                <a href="{{ route('promotions.subscribe') }}" class="btn btn-primary">
                    📊 Découvrir tous les plans
                </a>
                <a href="{{ route('promotions.ads.store') }}" class="btn btn-success">
                    🚀 Publier une publicité
                </a>
            </div>
        </div>
    </section>
    
    <!-- Section Catégories - Pleine largeur -->
    <section class="categories-section">
        <div class="section-header">
            <h2 class="section-title">Nos catégories de services</h2>
            <p class="section-subtitle">
                Découvrez notre large gamme de services professionnels adaptés à tous vos besoins
            </p>
        </div>
        
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-icon">🏠</div>
                <h3 class="category-title">Services domestiques</h3>
                <p class="category-description">
                    Entretien ménager, jardinage, repassage, garde d'enfants, aide aux personnes âgées. 
                    Trouvez des professionnels qualifiés près de chez vous pour toutes vos tâches quotidiennes.
                </p>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🎓</div>
                <h3 class="category-title">Services étudiants</h3>
                <p class="category-description">
                    Cours particuliers, aide aux devoirs, soutien scolaire, assistance informatique.
                    Des missions flexibles et abordables réalisées par des étudiants motivés et compétents.
                </p>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🔧</div>
                <h3 class="category-title">Services techniques</h3>
                <p class="category-description">
                    Plomberie, électricité, réparations, dépannage urgent, installation.
                    Trouvez l'expert qu'il vous faut en quelques clics pour tous vos travaux techniques.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Section Pourquoi choisir - Pleine largeur -->
    <section class="features-section">
        <div class="section-header">
            <h2 class="section-title">Pourquoi choisir MikiMultiService  ?</h2>
            <p class="section-subtitle">
                Une plateforme sécurisée et transparente conçue pour répondre à tous vos besoins de services
            </p>
        </div>
        
        <div class="features-list">
            <div class="feature-item">
                <div class="feature-icon">✅</div>
                <div class="feature-content">
                    <h4>Validation rigoureuse</h4>
                    <p>Chaque publication et prestataire est vérifié et validé par notre équipe pour garantir qualité et sécurité.</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">⚡</div>
                <div class="feature-content">
                    <h4>Réservation instantanée</h4>
                    <p>Réservez un service en quelques clics avec notre interface intuitive et rapide, 24h/24 et 7j/7.</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">📊</div>
                <div class="feature-content">
                    <h4>Suivi en temps réel</h4>
                    <p>Gérez vos réservations, demandes et paiements en temps réel depuis votre espace personnel sécurisé.</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">🛡️</div>
                <div class="feature-content">
                    <h4>Sécurité garantie</h4>
                    <p>Système de signalement et d'évaluation pour garantir la qualité et la sécurité de tous les services.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section CTA - Pleine largeur -->
    <section class="cta-section">
        <h2 class="cta-title">Prêt à commencer ?</h2>
        <p class="cta-subtitle">
            Rejoignez des milliers d'utilisateurs qui font confiance à MikiMultiService  pour leurs besoins quotidiens
        </p>
        <div class="cta-actions">
            <a href="{{ route('register') }}" class="btn btn-primary">
                👤 Créer un compte gratuit
            </a>
            <a href="{{ route('offers.create') }}" class="btn btn-secondary">
                📝 Publier une offre
            </a>
        </div>
    </section>
</div>
@endsection