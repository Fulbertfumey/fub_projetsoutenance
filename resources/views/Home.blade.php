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
                <a
                 href="{{ route('ads.index') }}" class="btn btn-success">
                    🚀Voir les publicités
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



<script>
    // ============================================
    // 1. ANIMATIONS AU DÉFILEMENT (SCROLL ANIMATIONS)
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        // Observer pour les animations d'apparition
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // Si c'est une carte de prix, ajouter une animation spéciale
                    if (entry.target.classList.contains('pricing-card')) {
                        entry.target.style.transform = 'translateY(0)';
                        entry.target.style.opacity = '1';
                    }
                }
            });
        }, observerOptions);

        // Observer les éléments à animer
        document.querySelectorAll('.pricing-card, .category-card, .feature-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });

        // ============================================
        // 2. INTERACTIVITÉ DES CARTES DE PRIX
        // ============================================
        const pricingCards = document.querySelectorAll('.pricing-card');
        
        pricingCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
            });

            card.addEventListener('mouseleave', function() {
                if (!this.classList.contains('hovered')) {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = 'var(--shadow-lg)';
                }
            });

            // Effet au clic
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.btn')) {
                    this.classList.toggle('hovered');
                    
                    // Remettre les autres cartes à l'état normal
                    pricingCards.forEach(otherCard => {
                        if (otherCard !== this) {
                            otherCard.classList.remove('hovered');
                            otherCard.style.transform = 'translateY(0) scale(1)';
                            otherCard.style.boxShadow = 'var(--shadow-lg)';
                        }
                    });

                    if (this.classList.contains('hovered')) {
                        this.style.transform = 'translateY(-15px) scale(1.03)';
                        this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
                        // Scroll doux vers la carte
                        this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        this.style.transform = 'translateY(0) scale(1)';
                        this.style.boxShadow = 'var(--shadow-lg)';
                    }
                }
            });
        });

        // ============================================
        // 3. BOUTONS INTERACTIFS
        // ============================================
        const buttons = document.querySelectorAll('.btn');
        
        buttons.forEach(button => {
            // Effet de pression
            button.addEventListener('mousedown', function() {
                this.style.transform = 'scale(0.95)';
            });

            button.addEventListener('mouseup', function() {
                this.style.transform = 'scale(1)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });

            // Animation au survol
            button.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });

        // ============================================
        // 4. COMPTEUR ANIMÉ (pour les statistiques)
        // ============================================
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Ajouter un élément de statistiques si nécessaire
        const statsSection = document.createElement('div');
        statsSection.className = 'stats-section';
        statsSection.innerHTML = `
            <div class="section-header">
                <h2 class="section-title">📈 Notre impact</h2>
                <p class="section-subtitle">Des chiffres qui parlent d'eux-mêmes</p>
            </div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" data-count="5000">0</div>
                    <div class="stat-label">Utilisateurs satisfaits</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="1200">0</div>
                    <div class="stat-label">Services réalisés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label">% de satisfaction</div>
                </div>
            </div>
        `;

        // Insérer après la section features
        document.querySelector('.features-section').after(statsSection);

        // ============================================
        // 5. ANIMATION DES STATISTIQUES AU SCROLL
        // ============================================
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    document.querySelectorAll('.stat-number').forEach(stat => {
                        const target = parseInt(stat.getAttribute('data-count'));
                        animateCounter(stat, target);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statsObserver.observe(statsSection);

        // ============================================
        // 6. EFFET DE TAPIS ROUlant SUR LES CATÉGORIES
        // ============================================
        const categoryCards = document.querySelectorAll('.category-card');
        
        categoryCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.category-icon');
                icon.style.transform = 'scale(1.2) rotate(5deg)';
                icon.style.transition = 'transform 0.3s ease';
            });

            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.category-icon');
                icon.style.transform = 'scale(1) rotate(0deg)';
            });

            // Effet de clic
            card.addEventListener('click', function() {
                this.style.borderColor = 'var(--primary-color)';
                this.style.boxShadow = '0 20px 40px rgba(37, 99, 235, 0.2)';
                
                // Retirer l'effet après 2 secondes
                setTimeout(() => {
                    this.style.boxShadow = 'var(--shadow-md)';
                }, 2000);
            });
        });

        // ============================================
        // 7. MODAL D'INSCRIPTION RAPIDE
        // ============================================
        const quickSignupBtn = document.createElement('button');
        quickSignupBtn.className = 'quick-signup-btn';
        quickSignupBtn.innerHTML = '🚀 Démarrer maintenant';
        quickSignupBtn.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: all 0.3s ease;
        `;

        document.body.appendChild(quickSignupBtn);

        quickSignupBtn.addEventListener('click', function() {
            // Animation du bouton
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
                // Redirection vers la page d'inscription
                window.location.href = "{{ route('register') }}";
            }, 300);
        });

        // Animation au survol du bouton flottant
        quickSignupBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 25px 50px rgba(37, 99, 235, 0.3)';
        });

        quickSignupBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow-xl)';
        });

        // ============================================
        // 8. ANIMATION DU TITRE HERO
        // ============================================
        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle) {
            heroTitle.style.opacity = '0';
            heroTitle.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                heroTitle.style.transition = 'all 1s ease-out';
                heroTitle.style.opacity = '1';
                heroTitle.style.transform = 'translateY(0)';
            }, 300);
        }

        // ============================================
        // 9. SYSTÈME DE NOTIFICATION
        // ============================================
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <span>${message}</span>
                <button class="notification-close">×</button>
            `;
            
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? 'var(--success-color)' : 'var(--primary-color)'};
                color: white;
                padding: 15px 20px;
                border-radius: var(--radius-md);
                box-shadow: var(--shadow-lg);
                z-index: 1001;
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-width: 300px;
                transform: translateX(400px);
                transition: transform 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            // Animation d'entrée
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Bouton de fermeture
            notification.querySelector('.notification-close').addEventListener('click', function() {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            });
            
            // Fermeture automatique
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.transform = 'translateX(400px)';
                    setTimeout(() => notification.remove(), 300);
                }
            }, 5000);
        }

        // Exemple de notification (à adapter selon vos besoins)
        setTimeout(() => {
            showNotification('🎉 Bienvenue sur MikiMultiService ! Découvrez nos offres exclusives.', 'success');
        }, 2000);

        // ============================================
        // 10. EFFET DE GLOW AU SURVOL DES ICÔNES
        // ============================================
        const icons = document.querySelectorAll('.category-icon, .feature-icon');
        
        icons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.textShadow = '0 0 20px rgba(37, 99, 235, 0.5)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.textShadow = 'none';
            });
        });

        // ============================================
        // 11. ANIMATION DU SCROLL
        // ============================================
        let lastScroll = 0;
        const navbar = document.querySelector('.navbar') || document.createElement('div');
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            // Effet de réduction du header au scroll
            if (currentScroll > 100) {
                document.querySelector('.hero-section')?.style.setProperty('padding', '3rem 1rem');
                quickSignupBtn.style.bottom = '20px';
                quickSignupBtn.style.right = '20px';
                quickSignupBtn.style.padding = '12px 20px';
            } else {
                document.querySelector('.hero-section')?.style.setProperty('padding', '5rem 1rem');
                quickSignupBtn.style.bottom = '30px';
                quickSignupBtn.style.right = '30px';
                quickSignupBtn.style.padding = '15px 25px';
            }
            
            lastScroll = currentScroll;
        });

        // ============================================
        // 12. ANIMATION DE CHARGEMENT
        // ============================================
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
    });

    // ============================================
    // 13. STYLES ADDITIONNELS POUR LES ANIMATIONS
    // ============================================
    const style = document.createElement('style');
    style.textContent = `
        /* Styles pour les notifications */
        .notification-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            margin-left: 15px;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.2s;
        }
        
        .notification-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        /* Styles pour les statistiques */
        .stats-section {
            background: var(--light-bg);
            padding: 4rem 1rem;
            width: 100%;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 3rem auto 0;
            padding: 0 1rem;
        }
        
        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: var(--gray-600);
            font-size: 1.125rem;
        }
        
        /* Animation pour les cartes au scroll */
        .animated {
            animation: fadeUp 0.6s ease-out forwards;
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Effet de pulse pour les boutons CTA */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .cta-section .btn-primary {
            animation: pulse 2s infinite;
        }
        
        /* Responsive pour le bouton flottant */
        @media (max-width: 768px) {
            .quick-signup-btn {
                bottom: 20px !important;
                right: 20px !important;
                padding: 12px 20px !important;
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
    `;
    
    document.head.appendChild(style);
</script>

@endsection