<?php

// app/Http/Controllers/PromotionController.php
namespace App\Http\Controllers;
use App\Models\Subscription;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller {
    
    
    public function dashboard() {
        $this->ensurePrestataire();
        $subs = Subscription::where('user_id', Auth::id())->latest()->get();
        $ads = Ad::where('user_id', Auth::id())->latest()->get();
        return view('promotions.dashboard', compact('subs','ads'));
    }

    public function subscribe(Request $request) {
        $this->ensurePrestataire();
        $data = $request->validate(['plan'=>'required|in:basique,premium,entreprise']);
        Subscription::create([
            'user_id'=>Auth::id(),
            'plan'=>$data['plan'],
            'date_debut'=>now(),
            'actif'=>true
        ]);
        return back()->with('status','Abonnement activé.');
    }

    public function storeAd(Request $request) {
        $this->ensurePrestataire();
        $data = $request->validate(['titre'=>'required|string|max:200','contenu'=>'nullable|string']);
        Ad::create(['user_id'=>Auth::id(),'titre'=>$data['titre'],'contenu'=>$data['contenu']??null,'statut'=>'actif']);
        return back()->with('status','Publicité publiée.');
    }

    private function ensurePrestataire(): void {
        if (!Auth::user()->isPrestataire()) abort(403);
    }
}
