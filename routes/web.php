<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleCellierController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CellierController;
use App\Http\Controllers\BouteilleController;


// Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () {
    // Déconnexion
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

    // Pour gérer les bouteilles de la SAQ et personnalisées 

    // Pour gérer les celliers d'un utilisateur
    Route::get('/celliers', [CellierController::class, 'index'])->name('celliers.index'); 
    Route::get('/celliers-ajouter', [CellierController::class, 'create'])->name('cellier.create');
    Route::post('/celliers-ajouter', [CellierController::class, 'store']);
    Route::get('/celliers-modifier/{id}', [CellierController::class, 'edit'])->name('cellier.edit');
    Route::put('/celliers-modifier/{id}', [CellierController::class, 'update']);
    Route::delete('/celliers-modifier/{id}', [CellierController::class, 'destroy'])->name('cellier.destroy');
    
    Route::get('/celliers/{id}', [BouteilleCellierController::class, 'index'])->name('celliers.show'); 

    // Pour gérer les bouteilles d'un cellier

    // Route::get('/Ajouter-bouteilles/{cellier_id}', [BouteilleController::class, 'index'])->name('Ajouter-bouteilles');
    // Route::get('/Ajouter-bouteille-manuellement/{cellier_id}', [BouteilleController::class, 'AjouterbouteilleManuellement'])->name('Ajouter-bouteille-manuellement');
    // Route::post('/addBouteilleManuellementPost', [BouteilleController::class, 'addBouteilleManuellementPost'])->name('addBouteilleManuellementPost');
    // Route::post('/bouteilles/addBouteille/{id}', [BouteilleController::class, 'addBouteille'])->name('bouteilles.addBouteille');
    // Route::delete('/bouteilles/{id}', [BouteilleController::class, 'destroy'])->name('bouteilles.destroy');

    // Gérer les bouteilles d'un cellier 
    Route::get('/bouteilles/{cellier_id}', [BouteilleController::class, 'indexBouteilleCellier'])->name('bouteilles-cellier.index');
    Route::get('/bouteilles-ajouter/{cellier_id}', [BouteilleController::class, 'createBouteilleCellier'])->name('bouteille-cellier.create');
    Route::post('/bouteilles-ajouter/{cellier_id}', [BouteilleController::class, 'storeBouteilleCellier'])->name('bouteille-cellier.store');
    Route::post('/bouteilles-ajouter', [BouteilleController::class, 'store'])->name('bouteille.store');
    Route::post('/bouteilles/addBouteille/{id}', [BouteilleController::class, 'addBouteille'])->name('bouteilles.addBouteille');
    Route::delete('/bouteilles/{id}', [BouteilleController::class, 'destroy'])->name('bouteilles.destroy');

    // Pour voir les bouteilles d'un cellier
    Route::get('/mon-cellier', [CellierController::class, 'index'])->name('mon-cellier');

    // Pour modifier la quantité d'une bouteille dans un cellier
    Route::get('/modifierQte/{bouteille_id}', [BouteilleController::class, 'modifierBouteille'])->name('modifier-Qte');
    Route::post('/modifierQte/{bouteille_id}', [BouteilleController::class, 'modifierQteBouteille'])->name('modifier-Qte');

    // Recherche de bouteilles
    Route::get('/bouteilles/search', [BouteilleController::class, 'search'])->name('bouteilles.search');
    Route::get('/bouteilles/addBouteilleSearch/{id}', [BouteilleController::class, 'addBouteilleSearch'])->name('bouteilles.addBouteilleSearch');

    // Recherche de bouteilles pour le footer
    Route::get('/bouteilles/rechercheFooterBouteille', [BouteilleController::class, 'rechercheFooterBouteille'])->name('bouteilles.rechercheFooterBouteille');
    Route::post('/bouteilles/rechercheFooterBouteillePost', [BouteilleController::class, 'indexRecherche'])->name('bouteilles.rechercheFooterBouteillePost');

    // Redirection vers HomeController après authentification
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [CustomAuthController::class, 'index'])->name('welcome');
});

// Routes d'authentification
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/register', [CustomAuthController::class, 'create'])->name('register');
Route::post('/register', [CustomAuthController::class, 'store'])->name('register.store');





