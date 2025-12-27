<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    /**
     * Afficher toutes les publicités.
     */
    public function index()
    {
        $ads = Ad::latest()->paginate(10);
        return view('ads.index', compact('ads'));
    }

    public function create(Request $request)
{
    $plan = $request->query('plan', 'basique'); // récupère le plan depuis l’URL
    return view('ads.create', compact('plan'));
}

    /**
     * Afficher une publicité spécifique.
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.show', compact('ad'));
    }

    /**
     * Enregistrer une nouvelle publicité.
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

        $pathImage = null;
        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('ads', 'public');
        }

        Ad::create([
            'user_id' => Auth::id(),
            'plan' => $request->plan,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $pathImage,
            'link' => $request->link,
        ]);

        return redirect()->route('ads.index')->with('success', 'Votre publicité a été publiée avec succès !');
    }

    /**
     * Supprimer une publicité.
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        if ($ad->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        if ($ad->image) {
            Storage::disk('public')->delete($ad->image);
        }

        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Publicité supprimée avec succès.');
    }
}