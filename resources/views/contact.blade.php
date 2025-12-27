@extends('layouts.app')

@section('content')

<style>
/* Variables modernes pour le contact */
:root {
    --contact-primary: #3b82f6;
    --contact-primary-dark: #2563eb;
    --contact-primary-light: #dbeafe;
    --contact-secondary: #8b5cf6;
    --contact-accent: #06b6d4;
    --contact-success: #10b981;
    --contact-dark: #1e293b;
    --contact-light: #f8fafc;
    --contact-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    --contact-gradient-hover: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
    --contact-gradient-light: linear-gradient(135deg, #dbeafe 0%, #f3e8ff 100%);
    --contact-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --contact-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --contact-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --contact-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --contact-radius-lg: 20px;
    --contact-radius-md: 12px;
    --contact-radius-sm: 8px;
    --contact-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Conteneur principal */
div[style*="max-width:800px"] {
    max-width: 900px !important;
    margin: 60px auto !important;
    padding: 0 20px;
    animation: contactFadeIn 0.8s ease-out;
}

@keyframes contactFadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Titre principal */
h2[style*="text-align:center"] {
    text-align: center !important;
    font-size: 3.2rem !important;
    font-weight: 800 !important;
    margin: 40px auto 50px !important;
    color: transparent !important;
    background: var(--contact-gradient) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    position: relative;
    padding-bottom: 25px;
    letter-spacing: -0.5px;
}

h2[style*="text-align:center"]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 5px;
    background: var(--contact-gradient);
    border-radius: 3px;
    animation: waveLine 2s ease-in-out infinite;
}

@keyframes waveLine {
    0%, 100% {
        width: 100px;
    }
    50% {
        width: 150px;
    }
}

h2[style*="text-align:center"]::before {
    content: '📬';
    display: inline-block;
    margin-right: 15px;
    animation: envelopeBounce 2s ease-in-out infinite;
    font-size: 2.8rem;
}

@keyframes envelopeBounce {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    25% {
        transform: translateY(-10px) rotate(-5deg);
    }
    50% {
        transform: translateY(-5px) rotate(5deg);
    }
    75% {
        transform: translateY(-10px) rotate(-5deg);
    }
}

/* Sections */
section[style*="margin-top:2rem"] {
    margin: 50px 0 !important;
    padding: 40px;
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border-radius: var(--contact-radius-lg);
    box-shadow: var(--contact-shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.9);
    position: relative;
    overflow: hidden;
    transition: var(--contact-transition);
    backdrop-filter: blur(10px);
}

section[style*="margin-top:2rem"]:hover {
    transform: translateY(-5px);
    box-shadow: var(--contact-shadow-xl);
}

section[style*="margin-top:2rem"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--contact-gradient);
    border-radius: var(--contact-radius-lg) var(--contact-radius-lg) 0 0;
}

/* Titres des sections */
section[style*="margin-top:2rem"] h3 {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: var(--contact-dark) !important;
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
    background: var(--contact-gradient);
    border-radius: 2px;
    transition: width 0.3s ease;
}

section[style*="margin-top:2rem"]:hover h3::after {
    width: 100px;
}

/* Icônes dans les titres */
h3[style*="📞"]::before { content: '📞'; }
h3[style*="📝"]::before { content: '📝'; }

section[style*="margin-top:2rem"] h3::before {
    font-size: 2rem;
    animation: iconFloat 3s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% { 
        transform: translateY(0) rotate(0deg);
    }
    50% { 
        transform: translateY(-10px) rotate(10deg);
    }
}

/* Paragraphes */
section[style*="margin-top:2rem"] p {
    font-size: 1.15rem !important;
    line-height: 1.8 !important;
    color: #475569 !important;
    margin-bottom: 25px !important;
    padding-right: 20px;
}

/* Liste des contacts */
section[style*="margin-top:2rem"] ul[style*="list-style:none"] {
    list-style: none !important;
    padding: 0 !important;
    margin: 30px 0 !important;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li {
    padding: 18px 25px !important;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(139, 92, 246, 0.05));
    border-radius: var(--contact-radius-md);
    font-size: 1.1rem !important;
    color: var(--contact-dark) !important;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: var(--contact-transition);
    border: 2px solid transparent;
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
    background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li:hover::before {
    transform: translateX(100%);
}

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li:hover {
    transform: translateX(10px);
    box-shadow: var(--contact-shadow-sm);
    border-color: var(--contact-primary);
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
}

/* Icônes des contacts */
section[style*="margin-top:2rem"] ul[style*="list-style:none"] li::after {
    margin-left: auto;
    font-size: 1.3rem;
    opacity: 0.8;
    transition: var(--contact-transition);
}

li:contains("📧")::after { content: '📧'; }
li:contains("📱")::after { content: '📱'; }
li:contains("🏢")::after { content: '🏢'; }

section[style*="margin-top:2rem"] ul[style*="list-style:none"] li:hover::after {
    opacity: 1;
    transform: scale(1.2) rotate(5deg);
    animation: iconPulse 1s ease-in-out;
}

@keyframes iconPulse {
    0%, 100% { transform: scale(1.2); }
    50% { transform: scale(1.4); }
}

/* Formulaire */
form[method="POST"][action*="contact.send"] {
    display: flex !important;
    flex-direction: column !important;
    gap: 25px !important;
    margin-top: 30px;
}

/* Groupes de formulaire */
form[method="POST"][action*="contact.send"] > div {
    position: relative;
    animation: formSlideUp 0.5s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

form[method="POST"][action*="contact.send"] > div:nth-child(1) { animation-delay: 0.1s; }
form[method="POST"][action*="contact.send"] > div:nth-child(2) { animation-delay: 0.2s; }
form[method="POST"][action*="contact.send"] > div:nth-child(3) { animation-delay: 0.3s; }

@keyframes formSlideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

form[method="POST"][action*="contact.send"] > div label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--contact-dark);
    font-size: 1rem;
    transition: var(--contact-transition);
}

form[method="POST"][action*="contact.send"] > div:focus-within label {
    color: var(--contact-primary);
    transform: translateX(5px);
}

/* Champs de saisie */
form[method="POST"][action*="contact.send"] input[type="text"],
form[method="POST"][action*="contact.send"] input[type="email"],
form[method="POST"][action*="contact.send"] textarea {
    width: 100% !important;
    padding: 16px 20px !important;
    border: 2px solid #e2e8f0 !important;
    border-radius: var(--contact-radius-md) !important;
    font-size: 1.05rem !important;
    transition: var(--contact-transition) !important;
    background: white;
    font-family: inherit;
    box-sizing: border-box;
}

form[method="POST"][action*="contact.send"] textarea {
    min-height: 150px;
    resize: vertical;
    line-height: 1.6;
}

form[method="POST"][action*="contact.send"] input:focus,
form[method="POST"][action*="contact.send"] textarea:focus {
    outline: none;
    border-color: var(--contact-primary) !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    transform: translateY(-2px);
    background: var(--contact-light);
}

/* Placeholders */
form[method="POST"][action*="contact.send"] input::placeholder,
form[method="POST"][action*="contact.send"] textarea::placeholder {
    color: #94a3b8;
    font-style: italic;
}

/* Bouton d'envoi */
form[method="POST"][action*="contact.send"] button[type="submit"] {
    background: var(--contact-gradient) !important;
    color: white !important;
    border: none !important;
    padding: 18px 40px !important;
    font-size: 1.2rem !important;
    font-weight: 700 !important;
    border-radius: var(--contact-radius-md) !important;
    cursor: pointer !important;
    transition: var(--contact-transition) !important;
    margin-top: 20px;
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
    align-self: flex-start;
    min-width: 200px;
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
}

form[method="POST"][action*="contact.send"] button[type="submit"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

form[method="POST"][action*="contact.send"] button[type="submit"]:hover::before {
    left: 100%;
}

form[method="POST"][action*="contact.send"] button[type="submit"]:hover {
    background: var(--contact-gradient-hover) !important;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
}

form[method="POST"][action*="contact.send"] button[type="submit"]:active {
    transform: translateY(-1px) scale(1.02);
}

form[method="POST"][action*="contact.send"] button[type="submit"]::after {
    content: '✈️';
    margin-left: 10px;
    font-size: 1.2rem;
    animation: sendPlane 2s ease-in-out infinite;
}

@keyframes sendPlane {
    0%, 100% {
        transform: translateX(0) rotate(0deg);
    }
    25% {
        transform: translateX(5px) rotate(-5deg);
    }
    50% {
        transform: translateX(10px) rotate(5deg);
    }
    75% {
        transform: translateX(5px) rotate(-5deg);
    }
}

/* Validation */
form[method="POST"][action*="contact.send"] input:valid,
form[method="POST"][action*="contact.send"] textarea:valid {
    border-color: var(--contact-success) !important;
}

form[method="POST"][action*="contact.send"] input:invalid:not(:placeholder-shown),
form[method="POST"][action*="contact.send"] textarea:invalid:not(:placeholder-shown) {
    border-color: #ef4444 !important;
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Effets de décoration */
section[style*="margin-top:2rem"]:first-of-type::after {
    content: '';
    position: absolute;
    top: -20px;
    right: -20px;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
    z-index: -1;
}

/* Particules décoratives */
div[style*="max-width:800px"]::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 15% 30%, rgba(59, 130, 246, 0.08) 0%, transparent 25%),
        radial-gradient(circle at 85% 60%, rgba(139, 92, 246, 0.08) 0%, transparent 25%);
    pointer-events: none;
    z-index: -1;
}

/* Responsive */
@media (max-width: 768px) {
    div[style*="max-width:800px"] {
        max-width: 95% !important;
        margin: 40px auto !important;
        padding: 0 15px;
    }
    
    h2[style*="text-align:center"] {
        font-size: 2.5rem !important;
        margin: 30px auto 40px !important;
    }
    
    section[style*="margin-top:2rem"] {
        margin: 40px 0 !important;
        padding: 30px;
    }
    
    section[style*="margin-top:2rem"] h3 {
        font-size: 1.75rem !important;
    }
    
    form[method="POST"][action*="contact.send"] input[type="text"],
    form[method="POST"][action*="contact.send"] input[type="email"],
    form[method="POST"][action*="contact.send"] textarea {
        padding: 14px 18px !important;
    }
    
    form[method="POST"][action*="contact.send"] button[type="submit"] {
        width: 100%;
        padding: 16px !important;
    }
}

@media (max-width: 480px) {
    h2[style*="text-align:center"] {
        font-size: 2rem !important;
    }
    
    section[style*="margin-top:2rem"] {
        padding: 25px 20px;
    }
    
    section[style*="margin-top:2rem"] h3 {
        font-size: 1.5rem !important;
    }
    
    section[style*="margin-top:2rem"] ul[style*="list-style:none"] li {
        padding: 15px 20px !important;
        font-size: 1rem !important;
    }
    
    form[method="POST"][action*="contact.send"] input[type="text"],
    form[method="POST"][action*="contact.send"] input[type="email"],
    form[method="POST"][action*="contact.send"] textarea {
        padding: 12px 16px !important;
        font-size: 1rem !important;
    }
}

/* Animation de chargement pour le bouton */
form[method="POST"][action*="contact.send"] button[type="submit"].loading {
    pointer-events: none;
    opacity: 0.8;
}

form[method="POST"][action*="contact.send"] button[type="submit"].loading::after {
    content: '';
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}


/* Variables modernes pour le formulaire de contact */
:root {
    --contact-primary: #3b82f6;
    --contact-primary-dark: #2563eb;
    --contact-primary-light: #dbeafe;
    --contact-secondary: #8b5cf6;
    --contact-accent: #06b6d4;
    --contact-success: #10b981;
    --contact-dark: #1e293b;
    --contact-light: #f8fafc;
    --contact-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    --contact-gradient-hover: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
    --contact-gradient-light: linear-gradient(135deg, #dbeafe 0%, #f3e8ff 100%);
    --contact-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --contact-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --contact-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --contact-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --contact-radius-lg: 20px;
    --contact-radius-md: 12px;
    --contact-radius-sm: 8px;
    --contact-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Section du formulaire */
section[style*="margin-top:2rem"]:has(form[action*="contact"]) {
    background: linear-gradient(145deg, #ffffff, #f8fafc) !important;
    border-radius: var(--contact-radius-lg) !important;
    padding: 40px !important;
    box-shadow: var(--contact-shadow-md) !important;
    border: 1px solid rgba(255, 255, 255, 0.9) !important;
    position: relative;
    overflow: hidden;
    transition: var(--contact-transition);
    backdrop-filter: blur(10px);
    animation: formSectionSlide 0.8s ease-out;
}

@keyframes formSectionSlide {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

section[style*="margin-top:2rem"]:has(form[action*="contact"])::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--contact-gradient);
    border-radius: var(--contact-radius-lg) var(--contact-radius-lg) 0 0;
}

section[style*="margin-top:2rem"]:has(form[action*="contact"]):hover {
    transform: translateY(-5px);
    box-shadow: var(--contact-shadow-xl);
}

/* Titre du formulaire */
section[style*="margin-top:2rem"]:has(form[action*="contact"]) h3 {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: var(--contact-dark) !important;
    margin-bottom: 30px !important;
    display: flex;
    align-items: center;
    gap: 15px;
    position: relative;
    padding-bottom: 15px;
}

section[style*="margin-top:2rem"]:has(form[action*="contact"]) h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--contact-gradient);
    border-radius: 2px;
    transition: width 0.3s ease;
}

section[style*="margin-top:2rem"]:has(form[action*="contact"]):hover h3::after {
    width: 100px;
}

section[style*="margin-top:2rem"]:has(form[action*="contact"]) h3::before {
    content: '📝';
    font-size: 2rem;
    animation: formIconFloat 3s ease-in-out infinite;
}

@keyframes formIconFloat {
    0%, 100% { 
        transform: translateY(0) rotate(0deg);
    }
    50% { 
        transform: translateY(-10px) rotate(10deg);
    }
}

/* Formulaire */
form[method="POST"][action*="contact"] {
    display: flex !important;
    flex-direction: column !important;
    gap: 25px !important;
    margin-top: 20px !important;
}

/* Groupes de formulaire */
form[method="POST"][action*="contact"] > div {
    position: relative;
    animation: formFieldSlide 0.5s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

form[method="POST"][action*="contact"] > div:nth-child(1) { animation-delay: 0.1s; }
form[method="POST"][action*="contact"] > div:nth-child(2) { animation-delay: 0.2s; }
form[method="POST"][action*="contact"] > div:nth-child(3) { animation-delay: 0.3s; }

@keyframes formFieldSlide {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Labels */
form[method="POST"][action*="contact"] > div label {
    display: block !important;
    margin-bottom: 10px !important;
    font-weight: 600 !important;
    color: var(--contact-dark) !important;
    font-size: 1rem !important;
    transition: var(--contact-transition) !important;
    position: relative;
    padding-left: 5px;
}

form[method="POST"][action*="contact"] > div label::after {
    content: '*';
    color: #ef4444;
    margin-left: 4px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

form[method="POST"][action*="contact"] > div label[for*="required"]::after,
form[method="POST"][action*="contact"] input:required + label::after {
    opacity: 1;
}

form[method="POST"][action*="contact"] > div:focus-within label {
    color: var(--contact-primary) !important;
    transform: translateX(10px);
}

/* Champs de saisie */
form[method="POST"][action*="contact"] input[type="text"],
form[method="POST"][action*="contact"] input[type="email"],
form[method="POST"][action*="contact"] textarea {
    width: 100% !important;
    padding: 16px 20px !important;
    border: 2px solid #e2e8f0 !important;
    border-radius: var(--contact-radius-md) !important;
    font-size: 1.05rem !important;
    transition: var(--contact-transition) !important;
    background: white !important;
    font-family: inherit !important;
    box-sizing: border-box !important;
    color: var(--contact-dark) !important;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}

form[method="POST"][action*="contact"] textarea {
    min-height: 150px !important;
    resize: vertical !important;
    line-height: 1.6 !important;
}

/* Effets focus */
form[method="POST"][action*="contact"] input:focus,
form[method="POST"][action*="contact"] textarea:focus {
    outline: none !important;
    border-color: var(--contact-primary) !important;
    box-shadow: 
        0 0 0 3px rgba(59, 130, 246, 0.15),
        inset 0 2px 4px rgba(0, 0, 0, 0.05) !important;
    transform: translateY(-2px) !important;
    background: var(--contact-light) !important;
}

/* Placeholders stylisés */
form[method="POST"][action*="contact"] input::placeholder,
form[method="POST"][action*="contact"] textarea::placeholder {
    color: #94a3b8 !important;
    font-style: italic !important;
    transition: all 0.3s ease !important;
}

form[method="POST"][action*="contact"] input:focus::placeholder,
form[method="POST"][action*="contact"] textarea:focus::placeholder {
    opacity: 0.5;
    transform: translateX(5px);
}

/* Effet de vague sur les champs */
form[method="POST"][action*="contact"] > div {
    position: relative;
}

form[method="POST"][action*="contact"] > div::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--contact-gradient);
    transition: width 0.4s ease;
    border-radius: 2px;
}

form[method="POST"][action*="contact"] > div:focus-within::after {
    width: 100%;
}

/* Bouton d'envoi */
form[method="POST"][action*="contact"] button[type="submit"] {
    background: var(--contact-gradient) !important;
    color: white !important;
    border: none !important;
    padding: 18px 40px !important;
    font-size: 1.2rem !important;
    font-weight: 700 !important;
    border-radius: var(--contact-radius-md) !important;
    cursor: pointer !important;
    transition: var(--contact-transition) !important;
    margin-top: 20px !important;
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
    align-self: flex-start;
    min-width: 200px;
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px;
}

form[method="POST"][action*="contact"] button[type="submit"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
}

form[method="POST"][action*="contact"] button[type="submit"]:hover::before {
    left: 100%;
}

form[method="POST"][action*="contact"] button[type="submit"]:hover {
    background: var(--contact-gradient-hover) !important;
    transform: translateY(-3px) scale(1.05) !important;
    box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4) !important;
}

form[method="POST"][action*="contact"] button[type="submit"]:active {
    transform: translateY(-1px) scale(1.02) !important;
}

form[method="POST"][action*="contact"] button[type="submit"]::after {
    content: '✈️';
    font-size: 1.2rem;
    animation: sendFlight 2s ease-in-out infinite;
}

@keyframes sendFlight {
    0%, 100% {
        transform: translateX(0) rotate(0deg);
    }
    25% {
        transform: translateX(5px) rotate(-5deg);
    }
    50% {
        transform: translateX(10px) rotate(5deg);
    }
    75% {
        transform: translateX(5px) rotate(-5deg);
    }
}

/* Validation */
form[method="POST"][action*="contact"] input:valid,
form[method="POST"][action*="contact"] textarea:valid {
    border-color: var(--contact-success) !important;
    background: linear-gradient(to right, rgba(16, 185, 129, 0.05), white) !important;
}

form[method="POST"][action*="contact"] input:invalid:not(:placeholder-shown),
form[method="POST"][action*="contact"] textarea:invalid:not(:placeholder-shown) {
    border-color: #ef4444 !important;
    background: linear-gradient(to right, rgba(239, 68, 68, 0.05), white) !important;
    animation: inputShake 0.5s ease-in-out;
}

@keyframes inputShake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Messages d'erreur */
form[method="POST"][action*="contact"] > div::before {
    content: attr(data-error);
    position: absolute;
    bottom: -25px;
    left: 0;
    color: #ef4444;
    font-size: 0.875rem;
    opacity: 0;
    transform: translateY(5px);
    transition: all 0.3s ease;
}

form[method="POST"][action*="contact"] input:invalid:not(:placeholder-shown) ~ label::after,
form[method="POST"][action*="contact"] textarea:invalid:not(:placeholder-shown) ~ label::after {
    content: '⚠️';
    margin-left: 5px;
    font-size: 0.9rem;
}

/* Effets de décoration pour le formulaire */
section[style*="margin-top:2rem"]:has(form[action*="contact"])::after {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
    z-index: -1;
}

/* Particules flottantes dans le formulaire */
@keyframes floatParticles {
    0% {
        transform: translateY(0) translateX(0);
    }
    100% {
        transform: translateY(-100px) translateX(20px);
    }
}

section[style*="margin-top:2rem"]:has(form[action*="contact"]) .particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(59, 130, 246, 0.2);
    border-radius: 50%;
    animation: floatParticles 3s linear infinite;
}

/* Responsive pour le formulaire */
@media (max-width: 768px) {
    section[style*="margin-top:2rem"]:has(form[action*="contact"]) {
        padding: 30px !important;
    }
    
    section[style*="margin-top:2rem"]:has(form[action*="contact"]) h3 {
        font-size: 1.75rem !important;
    }
    
    form[method="POST"][action*="contact"] input[type="text"],
    form[method="POST"][action*="contact"] input[type="email"],
    form[method="POST"][action*="contact"] textarea {
        padding: 14px 18px !important;
        font-size: 1rem !important;
    }
    
    form[method="POST"][action*="contact"] button[type="submit"] {
        width: 100% !important;
        padding: 16px !important;
        font-size: 1.1rem !important;
    }
}

@media (max-width: 480px) {
    section[style*="margin-top:2rem"]:has(form[action*="contact"]) {
        padding: 25px 20px !important;
    }
    
    section[style*="margin-top:2rem"]:has(form[action*="contact"]) h3 {
        font-size: 1.5rem !important;
    }
    
    form[method="POST"][action*="contact"] input[type="text"],
    form[method="POST"][action*="contact"] input[type="email"],
    form[method="POST"][action*="contact"] textarea {
        padding: 12px 16px !important;
    }
}

/* Animation de chargement pour le bouton */
form[method="POST"][action*="contact"] button[type="submit"].loading {
    pointer-events: none;
    opacity: 0.8;
}

form[method="POST"][action*="contact"] button[type="submit"].loading::after {
    content: '';
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-left: 10px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Effet de succès après envoi */
form[method="POST"][action*="contact"].sent button[type="submit"] {
    background: linear-gradient(135deg, #10b981, #059669) !important;
}

form[method="POST"][action*="contact"].sent button[type="submit"]::after {
    content: '✅';
    animation: none;
}

/* Effet de focus amélioré */
form[method="POST"][action*="contact"] input:focus,
form[method="POST"][action*="contact"] textarea:focus {
    animation: focusGlow 2s infinite;
}

@keyframes focusGlow {
    0%, 100% {
        box-shadow: 
            0 0 0 3px rgba(59, 130, 246, 0.15),
            inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    50% {
        box-shadow: 
            0 0 0 3px rgba(59, 130, 246, 0.25),
            inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }
}
</style>
<div style="max-width:800px; margin:auto;">
    <h2 style="text-align:center;">📬 Contactez-nous</h2>

    <section style="margin-top:2rem;">
        <h3>📞 Informations de contact</h3>
        <p>
            Vous pouvez nous joindre via les moyens suivants :
        </p>
        <ul style="list-style:none; padding:0;">
            <li>📧 Email : fulbert@multiservice.com</li>
            <li>📱 Téléphone : +228 99 33 34 54</li>
            <li>🏢 Adresse : Lomé, Région Maritime, Togo</li>
        </ul>
    </section>

    <section style="margin-top:2rem;">
        <h3>📝 Formulaire de contact</h3>
        <form method="POST" action="{{ route('contact') }}" style="display:flex; flex-direction:column; gap:1rem;">
            @csrf

            <div>
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </section>
</div>
@endsection
