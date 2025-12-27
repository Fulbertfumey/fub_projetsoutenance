<?php
// app/Http/Controllers/OfferController.php
namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller {

    
    public function index(Request $request) {
        $q = $request->input('q');
        $category = $request->input('category');
        $offers = Offer::with('user','category')
            ->where('statut','valide')
            ->when($q, fn($qry)=>$qry->where('titre','like',"%$q%"))
            ->when($category, fn($qry)=>$qry->where('category_id',$category))
            ->latest()->paginate(12);
        return view('offers.index', compact('offers'));
    }

    public function create() {
     if (!Auth::user()->isPrestataire()) {
    abort(403);
}
        $categories = Category::orderBy('nom')->get();
        return view('offers.create', compact('categories'));
    }

    public function store(Request $request) {
        if (!Auth::user()->isPrestataire()) abort(403);
        $data = $request->validate([
            'titre'=>'required|string|max:200',
            'description'=>'required|string',
            'prix'=>'nullable|numeric|min:0',
            'category_id'=>'required|exists:categories,id',
        ]);
        $data['user_id'] = Auth::id();
        $data['statut'] = 'en_attente';
        Offer::create($data);
        return redirect()->route('offers.mine')->with('status','Offre soumise pour validation.');
    }

    public function mine() {
        $offers = Offer::where('user_id', Auth::id())->latest()->paginate(12);
           $stats = [
        'validees'   => $offers->where('statut','valide')->count(),
        'en_attente' => $offers->where('statut','en_attente')->count(),
        'refusees'   => $offers->where('statut','refuse')->count(),
        'total'      => $offers->count(),
    ];

    return view('offers.mine', compact('offers','stats'));
    }

    // Admin validation
    public function adminList() {
        $offers = Offer::with('user','category')->latest()->paginate(20);
        return view('admin.offers', compact('offers'));
    }

    public function validateOffer(Offer $offer) {
        if (!Auth::user()->isAdmin()) abort(403);
        $offer->update(['statut'=>'valide']);
        return back()->with('status','Offre validée.');
    }

    public function refuseOffer(Offer $offer) {
        if (!Auth::user()->isAdmin()) abort(403);
        $offer->update(['statut'=>'refuse']);
        return back()->with('status','Offre refusée.');
    }

    public function show(Offer $offer) {
        if ($offer->statut !== 'valide' && (!Auth::check() || !Auth::user()->isAdmin() && Auth::id() !== $offer->user_id)) {
            abort(404);
        }
        $offer->increment('vues');
        return view('offers.show', compact('offer'));
    }

    public function click(Offer $offer) {
        $offer->increment('clics');
        return redirect()->route('offers.show', $offer);
    }









public function update(Request $request, Offer $offer) {
    if ($offer->user_id !== Auth::id()) abort(403);
    $data = $request->validate([
        'titre'=>'required|string|max:200',
        'description'=>'required|string',
        'prix'=>'nullable|numeric|min:0',
        'category_id'=>'required|exists:categories,id',
    ]);
    $offer->update($data);
    return redirect()->route('offers.mine')->with('status','Offre mise à jour.');
}

public function destroy(Offer $offer) {
    if ($offer->user_id !== Auth::id()) abort(403);
    $offer->delete();
    return redirect()->route('offers.mine')->with('status','Offre supprimée.');
}

}