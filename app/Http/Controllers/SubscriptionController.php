<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Afficher la liste des plans de promotion.
     */
    public function index()
    {
        // On peut passer les plans à la vue
        $plans = [
            [
                'name' => 'Basique',
                'features' => ['Visibilité limitée', 'Statistiques simples', 'Durée : 7 jours'],
            ],
            [
                'name' => 'Premium',
                'features' => ['Visibilité renforcée', 'Statistiques avancées', 'Durée : 15 jours'],
            ],
            [
                'name' => 'Entreprise',
                'features' => ['Visibilité maximale', 'Support prioritaire', 'Durée : 30 jours'],
            ],
        ];

        return view('subscriptions.index', compact('plans'));
    }

    /**
     * Afficher le formulaire pour créer une publicité selon le plan choisi.
     */
    public function create(Request $request)
    {
        $plan = $request->query('plan', 'basique'); // récupère le plan depuis l’URL
        return view('ads.create', compact('plan'));
    }

    /**
     * Enregistrer une publicité.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        // Ici tu peux enregistrer la publicité dans ta base
        // Exemple simple :
        // Ad::create([
        //     'plan' => $request->plan,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $pathImage,
        //     'link' => $request->link,
        //     'user_id' => auth()->id(),
        // ]);

        return redirect()->route('subscriptions.index')
                         ->with('success', 'Votre publicité a été publiée avec succès !');
    }
}