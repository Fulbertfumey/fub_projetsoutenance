<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Reservation;
use App\Models\Conversation;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{




     public function admin()
    {
        // Offres en attente de validation
        $offers = Offer::where('statut', 'en_attente')->with('user')->get();

        // Signalements
        $reports = Report::with(['reporter', 'reportedUser'])->get();

        // Statistiques globales
        $offersValidated = Offer::where('statut', 'valide')->count();
        $offersRefused   = Offer::where('statut', 'refuse')->count();
        $reportsPending  = Report::where('statut', 'en_attente')->count();
        $reportsTreated  = Report::where('statut', 'traite')->count();

        return view('dashboard.admin', compact(
            'offers',
            'reports',
            'offersValidated',
            'offersRefused',
            'reportsPending',
            'reportsTreated'
        ));
    }
    /**
     * Tableau de bord principal du prestataire
     */
    public function prestataire()
    {
        $user = Auth::user();

        // Offres du prestataire
        $offers = Offer::where('user_id', $user->id)->latest()->get();

        // Réservations reçues (liées aux offres du prestataire)
        $reservations = Reservation::whereHas('offer', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->latest()->get();

        // Conversations liées aux réservations du prestataire
        $conversations = Conversation::whereHas('reservation.offer', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->with('users')->latest()->get();

        // Signalements liés aux réservations du prestataire
        $reports = Report::whereHas('reservation.offer', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->latest()->get();

        // Statistiques globales
        $stats = [
            'total_offres'       => $offers->count(),
            'total_reservations' => $reservations->count(),
            'total_vues'         => $offers->sum('vues'),
            'total_clics'        => $offers->sum('clics'),
            'total_conversations'=> $conversations->count(),
            'total_signalements' => $reports->count(),
        ];

        return view('dashboard.prestataire', compact('offers','reservations','conversations','reports','stats'));
    }

    /**
     * Page dédiée aux statistiques
     */
    public function stats()
    {
        $offers = Offer::where('user_id', Auth::id())->get();
        return view('dashboard.stats', compact('offers'));
    }


    public function clientDashboard()
{
    $reservations = Reservation::with(['offer.user'])
        ->where('client_id', auth()->id())
        ->get();

    $reports = Report::where('client_id', auth()->id())->get();

    return view('dashboard.client', compact('reservations', 'reports'));
}

}


