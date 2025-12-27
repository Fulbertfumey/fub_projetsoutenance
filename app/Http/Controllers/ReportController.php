<?php

// app/Http/Controllers/ReportController.php
namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller {
    public function create(Reservation $reservation) {
        $user = Auth::user();
        if (!in_array($user->id, [$reservation->client_id, $reservation->offer->user_id])) abort(403);
        return view('reports.create', compact('reservation'));
    }

    public function store(Request $request, Reservation $reservation) {
        $user = Auth::user();
        $reported = $reservation->offer->user_id === $user->id ? $reservation->client_id : $reservation->offer->user_id;

        $data = $request->validate([
            'motif'=>'required|string|max:200',
            'details'=>'nullable|string'
        ]);
        Report::create([
            'reservation_id'=>$reservation->id,
            'reported_user_id'=>$reported,
            'reporter_id'=>$user->id,
            'motif'=>$data['motif'],
            'details'=>$data['details'] ?? null,
            'statut'=>'en_attente'
        ]);
        return redirect()->route('reports.mine')->with('status','Signalement envoyé.');
    }

    public function mine() {
        $reports = Report::where('reporter_id', Auth::id())->latest()->paginate(15);
        return view('reports.mine', compact('reports'));
    }

    public function adminIndex() {
        $reports = Report::with(['reservation','reported','reporter'])->latest()->paginate(20);
        return view('admin.reports', compact('reports'));
    }

    public function treat(Report $report) {
        if (!Auth::user()->isAdmin()) abort(403);
        $report->update(['statut'=>'traite']);
        return back()->with('status','Signalement traité.');
    }
}