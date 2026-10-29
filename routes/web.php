<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MediationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Portail de la Médiation Financière
|--------------------------------------------------------------------------
*/

// Sélecteur de langue
Route::get('/langue/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('locales.supported', [])), 404);
    session(['locale' => $locale]);

    return redirect()->to(url()->previous());
})->where('locale', '[a-z]{2,5}(?:-[A-Z]{2})?')->name('locale.switch');

// Assistant IA / Chatbot de médiation
Route::post('/assistant/message', [ChatbotController::class, 'respond'])
    ->middleware('throttle:30,1')
    ->name('chatbot.respond');

// Formulaire de contact / message
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ── LES 6 RUBRIQUES OFFICIELLES DU PORTAIL NUMÉRIQUE ──
Route::name('mediation.')->group(function () {
    // B.1 - ACCUEIL
    Route::get('/', [MediationController::class, 'index'])->name('index');

    // B.2 - PRÉSENTATION DU MÉCANISME & DU MÉDIATEUR
    Route::get('/presentation', [MediationController::class, 'presentation'])->name('presentation');

    // B.3 - RECOURS À LA MÉDIATION (Saisine, Voies, Formulaire en ligne, FAQ)
    Route::get('/recours-a-la-mediation', [MediationController::class, 'recours'])->name('recours');

    // B.4 - ÉTABLISSEMENTS ADHÉRENTS
    Route::get('/etablissements-adherents', [MediationController::class, 'adherents'])->name('adherents');

    // B.5 - FONDS DOCUMENTAIRE (Rapports, Réglementation Communautaire & Nationale)
    Route::get('/fonds-documentaire', [MediationController::class, 'fondsDocumentaire'])->name('fonds-documentaire');

    // B.6 - CONTACTS UTILES
    Route::get('/contacts-utiles', [MediationController::class, 'contacts'])->name('contacts');

    // ── TRAITEMENT DES FLUX & DOSSIERS ──
    Route::post('/saisine', [MediationController::class, 'storeSaisine'])->name('saisine.store');
    Route::get('/suivi', [MediationController::class, 'suivi'])->name('suivi');
    Route::post('/suivi', [MediationController::class, 'trackSuivi'])->middleware('throttle:30,1')->name('suivi.track');

    // ── CANDIDATURE AU POSTE DE MÉDIATEUR & COMPATIBILITÉ ──
    Route::get('/candidature', [MediationController::class, 'candidature'])->name('candidature');
    Route::post('/candidature', [MediationController::class, 'storeCandidature'])->name('candidature.store');
    Route::get('/textes-reglementaires', [MediationController::class, 'textes'])->name('textes');
    Route::get('/actualites', [MediationController::class, 'actualites'])->name('actualites');
    Route::get('/activites', [MediationController::class, 'activites'])->name('activites');
});

// Redirection de compatibilité si accès avec ancien préfixe /mediation-financiere
Route::redirect('/mediation-financiere', '/');
Route::redirect('/mediation-financiere/{any}', '/{any}')->where('any', '.*');
