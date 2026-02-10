@extends('layouts.app')

@section('content')


<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <!-- En-tête -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 italic">Contactez-nous</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Une question ? Un projet ? Notre équipe est à votre écoute pour vous accompagner dans votre expérience MikiMultiService.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-12 items-start">
            <!-- Colonne Informations de contact -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8">Nos coordonnées</h3>
                    
                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Email professionnel</h4>
                                <p class="text-gray-600">fulbert@multiservice.com</p>
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Téléphone</h4>
                                <p class="text-gray-600">+228 99 33 34 54</p>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-location-dot text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Bureau principal</h4>
                                <p class="text-gray-600">Lomé, Région Maritime, Togo</p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte de présence (Optionnel) -->
                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <p class="text-sm text-gray-500 italic">Nous répondons généralement en moins de 24 heures ouvrées.</p>
                    </div>
                </div>
            </div>

            <!-- Colonne Formulaire de contact -->
            <div class="lg:col-span-2">
                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <form method="POST" action="{{ route('contact') }}" class="space-y-6">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Nom -->
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-bold text-gray-700 ml-1">Nom complet</label>
                                <input type="text" id="name" name="name" required 
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all outline-none"
                                    placeholder="miki">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-bold text-gray-700 ml-1">Adresse email</label>
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all outline-none"
                                    placeholder="mikimultiservice@gmail.com">
                            </div>
                        </div>

                        <!-- Sujet (Optionnel) -->
                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-bold text-gray-700 ml-1">Sujet du message</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all outline-none"
                                placeholder="Comment pouvons-nous vous aider ?">
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label for="message" class="text-sm font-bold text-gray-700 ml-1">Votre message</label>
                            <textarea id="message" name="message" rows="5" required 
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all outline-none resize-none"
                                placeholder="Dites-nous tout..."></textarea>
                        </div>

                        <!-- Bouton d'envoi -->
                        <button type="submit" class="w-full md:w-auto px-10 py-4 bg-blue-600 text-white font-black rounded-xl hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-blue-600/30 flex items-center justify-center gap-3">
                            <span>Envoyer le message</span>
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
