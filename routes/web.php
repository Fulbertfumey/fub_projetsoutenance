<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\DashboardController;

// Pages publiques
Route::get('/', fn() => view('Home'))->name('Home');
Route::view('/a-propos','about')->name('about');
Route::view('/contact','contact')->name('contact');
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    return back()->with('success', 'Votre message a été envoyé avec succès !');
})->name('contact');

// Auth
Route::get('/connexion',[LoginController::class,'showLogin'])->name('login');
Route::post('/connexion',[LoginController::class,'login']);
Route::post('/deconnexion',[LoginController::class,'logout'])->name('logout');

Route::get('/inscription',[RegisterController::class,'showRegister'])->name('register');
Route::post('/inscription',[RegisterController::class,'register']);

Route::get('/mot-de-passe',[PasswordController::class,'showReset'])->name('password.reset');
Route::post('/mot-de-passe',[PasswordController::class,'reset']);

// Publicités
Route::get('/ads', [AdController::class, 'index'])->name('ads.index');
Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
Route::get('/ads/{id}', [AdController::class, 'show'])->name('ads.show');
Route::delete('/ads/{id}', [AdController::class, 'destroy'])->name('ads.destroy');

// Offres publiques
Route::get('/offres',[OfferController::class,'index'])->name('offers.index');

// ⚠️ Routes protégées par auth
Route::middleware('auth')->group(function(){
    // Mes offres
    Route::get('/offres/mes',[OfferController::class,'mine'])->name('offers.mine');

    // Créer une offre
    Route::get('/offres/nouvelle',[OfferController::class,'create'])->name('offers.create');
    Route::post('/offres',[OfferController::class,'store'])->name('offers.store');

    // Modifier / Supprimer une offre
    Route::put('/offres/{offer}', [OfferController::class,'update'])->name('offers.update');
    Route::delete('/offres/{offer}', [OfferController::class,'destroy'])->name('offers.destroy');

    // Réservations
    Route::post('/offres/{offer}/reserver',[ReservationController::class,'store'])->name('reservations.store');
    Route::get('/reservations/mes',[ReservationController::class,'mine'])->name('reservations.mine');
    Route::post('/reservations/{reservation}/statut',[ReservationController::class,'updateStatus'])->name('reservations.updateStatus');

    Route::post('/reservations/{offer}', [ReservationController::class, 'store'])
    ->name('reservations.store')
    ->middleware('auth'); // réservé aux clients connectés


    // Messagerie
    Route::get('/conversations', [MessageController::class,'index'])->name('conversations.index');
    Route::post('/reservations/{reservation}/conversation',[MessageController::class,'start'])->name('conversations.start');
    Route::get('/conversations/{conversation}',[MessageController::class,'show'])->name('conversations.show');
    Route::post('/conversations/{conversation}/messages',[MessageController::class,'send'])->name('messages.send');

    // Signalements
    Route::get('/reservations/{reservation}/signalement',[ReportController::class,'create'])->name('reports.create');
    Route::post('/reservations/{reservation}/signalement',[ReportController::class,'store'])->name('reports.store');
    Route::get('/signalements/mes',[ReportController::class,'mine'])->name('reports.mine');

    // Promotions / Abonnements
    Route::get('/promotions',[PromotionController::class,'dashboard'])->name('promotions.dashboard');
    Route::post('/promotions/abonnement',[PromotionController::class,'subscribe'])->name('promotions.subscribe');
    Route::post('/promotions/ads',[PromotionController::class,'storeAd'])->name('promotions.ads.store');
    Route::get('/promotions/abonnement', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/promotions/abonnement/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
});

// ⚠️ La route dynamique doit venir APRÈS /mes et /nouvelle
Route::get('/offres/{offer}',[OfferController::class,'show'])->name('offers.show');
Route::post('/offres/{offer}/clic',[OfferController::class,'click'])->name('offers.click');

// Admin
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard/admin', fn() => view('dashboard.admin'))->name('dashboard.admin');
    Route::get('/admin/offres',[OfferController::class,'adminList'])->name('admin.offers');
    Route::post('/admin/offres/{offer}/valider',[OfferController::class,'validateOffer'])->name('admin.offers.validate');
    Route::post('/admin/offres/{offer}/refuser',[OfferController::class,'refuseOffer'])->name('admin.offers.refuse');

    Route::get('/admin/signalements',[ReportController::class,'adminIndex'])->name('admin.reports');
    Route::post('/admin/signalements/{report}/traiter',[ReportController::class,'treat'])->name('admin.reports.treat');
});

// Dashboards clients/prestataires
Route::middleware(['auth','role:client'])
    ->get('/dashboard/client', [\App\Http\Controllers\ReservationController::class, 'clientDashboard'])
    ->name('dashboard.client');

    Route::middleware(['auth','role:admin'])
    ->get('/dashboard/admin', [DashboardController::class, 'admin'])
    ->name('dashboard.admin');
// Connexion admin
Route::get('/admin/connexion', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/connexion', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login']);




Route::middleware(['auth','role:prestataire'])->get('/dashboard/prestataire', [DashboardController::class, 'prestataire'])->name('dashboard.prestataire');