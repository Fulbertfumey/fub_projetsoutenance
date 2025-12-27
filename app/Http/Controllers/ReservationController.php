<?php

// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Report;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {
    public function store(Request $request, Offer $offer) {
        if (!Auth::user()->isClient()) abort(403);
        $data = $request->validate([
            'type'=>'required|in:reservation,demande',
            'date_souhaitee'=>'nullable|date',
            'message'=>'nullable|string'
        ]);
        $reservation = Reservation::create([
            'offer_id'=>$offer->id,
            'client_id'=>Auth::id(),
            'type'=>$data['type'],
            'date_souhaitee'=>$data['date_souhaitee'] ?? null,
            'statut'=>'en_attente',
            'message'=>$data['message'] ?? null
        ]);
        return redirect()->route('reservations.mine')->with('status','Votre demande a été envoyée.');
    }

    public function mine() {
        $reservations = Reservation::with('offer')->where('client_id', Auth::id())->latest()->paginate(15);
        return view('reservations.mine', compact('reservations'));
    }

    // Prestataire accepte/refuse
    public function updateStatus(Reservation $reservation, Request $request) {
        $user = Auth::user();
        if (!$user->isPrestataire() || $reservation->offer->user_id !== $user->id) abort(403);
        $data = $request->validate(['statut'=>'required|in:accepte,refuse,termine']);
        $reservation->update(['statut'=>$data['statut']]);
        return back()->with('status','Statut mis à jour.');
    }


   public function clientDashboard()
    {
        // Récupérer les réservations du client connecté
       $reservations = Reservation::with(['offer.user'])
    ->where('client_id', auth()->id())
    ->paginate(10); // par exemple 10 réservations par page

        // Récupérer les signalements faits par ce client
        $reports = Report::where('reporter_id', auth()->id())->get();

        return view('dashboard.client', compact('reservations', 'reports'));
    }

    
}