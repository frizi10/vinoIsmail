<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleCellierController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CellierController;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\Web2scraperController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\StatistiqueController;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Middleware\CheckRole;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () {

    // *************** Connexion (redirection) ****************
    Route::get('/', [CustomAuthController::class, 'index'])->name('welcome');

    // *************** Déconnexion ****************
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

    // *************** Gestion du profil ****************
    // Affichage du profil de l'utilisateur
    Route::get('/profil/{user}', [CustomAuthController::class, 'show'])->name('profil.show');
    // Modification du profil de l'utilisateur
    Route::get('/profil-modifier/{user}', [CustomAuthController::class, 'edit'])->name('profil.edit');
    // Stockage de la modification du profil de l'utilisateur
    Route::put('/profil-modifier/{user}', [CustomAuthController::class, 'update']);
    // Suppression d'un profil
    Route::delete('/profil-modifier/{user}', [CustomAuthController::class, 'destroy'])->name('profil.destroy');

    // *************** Gestion des bouteilles ****************

    
    // Importer data de la SAQ
    Route::get('/scrape', [Web2scraperController::class, 'scrapeData']);
    // Affichage de toutes les bouteilles
    Route::get('/bouteilles', [BouteilleController::class, 'index'])->name('bouteille.index');
    // Affichage des informations d'une bouteille 
    Route::get('/bouteilles/{bouteille_id}', [BouteilleController::class, 'show'])->name('bouteille.show');
    // Création d'une bouteille personnalisée
    Route::get('/bouteilles-ajouter/{bouteille_id}', [BouteilleController::class, 'create'])->name('bouteille.create');
    // Stockage d'une bouteille personnalisée dans la BDD
    Route::post('/bouteilles-ajouter', [BouteilleController::class, 'store']);
    // Modification d'une bouteille personnalisée 
    Route::get('/bouteilles-modifier/{bouteille_id}', [BouteilleController::class, 'edit'])->name('bouteille.edit');
    // Stockage de la modification d'une bouteille personnalisée dans la BDD
    Route::put('/bouteilles-modifier/{bouteille_id}', [BouteilleController::class, 'update']);
    // Suppression d'une bouteille personnalisée
    Route::delete('/bouteilles-modifier/{bouteille_id}', [BouteilleController::class, 'destroy'])->name('bouteille.destroy');
    //affichage de toutes les bouteilles de la SAQ
    Route::get('/bouteilles', [BouteilleController::class, 'index'])->name('bouteille.index');
    //affichage par bouetille
    Route::get('/bouteilles/{bouteille_id}', [BouteilleController::class, 'show'])->name('bouteille.show');


   Route::get('/search', [BouteilleController::class, 'search']);

    // *************** Gestion des celliers ****************

    // Affichage de tous les celliers
    Route::get('/celliers', [CellierController::class, 'index'])->name('cellier.index'); 
    // Affichage de tous les celliers en JSON
    Route::get('/celliers-json', [CellierController::class, 'indexJSON']); 
    // Affichage d'un cellier et de ses bouteilles
    Route::get('/celliers/{cellier_id}/bouteilles', [CellierController::class, 'show'])->name('cellier.show');
    // Création d'un cellier
    Route::get('/celliers-ajouter', [CellierController::class, 'create'])->name('cellier.create');
    // Stockage d'un cellier dans la BDD
    Route::post('/celliers-ajouter', [CellierController::class, 'store']);
    // Modification d'un cellier 
    Route::get('/celliers-modifier/{cellier_id}', [CellierController::class, 'edit'])->name('cellier.edit');
    // Stockage de la modification d'un cellier dans la BDD
    Route::put('/celliers-modifier/{cellier_id}', [CellierController::class, 'update']);
    // Suppression d'un cellier
    Route::delete('/celliers-modifier/{cellier_id}', [CellierController::class, 'destroy'])->name('cellier.destroy');

    // *************** Gestion des bouteilles d'un cellier ****************

    // Ajout d'une bouteille à un cellier
    Route::post('/celliers-json', [BouteilleCellierController::class, 'store']);
    // Retrait d'une bouteille d'un cellier
    Route::delete('/celliers/{cellier_id}/bouteilles-celliers-modifier/{bouteille_cellier}', [BouteilleCellierController::class, 'destroy'])->name('bouteilleCellier.delete');
    // Modification de la quantité de bouteilles se trouvant dans un même cellier
    Route::put('/bouteilles-celliers-modifier/{id}', [BouteilleCellierController::class, 'update']);

    // *************** Gestion des listes ****************

    // Affichage de toutes les listes
    Route::get('/listes', [ListeController::class, 'index'])->name('liste.index'); 
    // Affichage d'une liste et de ses bouteilles
    Route::get('/listes/{liste_id}/bouteilles', [ListeController::class, 'show'])->name('liste.show');
    // Création d'une liste
    Route::get('/listes-ajouter', [ListeController::class, 'create'])->name('liste.create');
    // Stockage d'une liste dans la BDD
    Route::post('/listes-ajouter', [ListeController::class, 'store']);
    // Modification d'une liste 
    Route::get('/listes-modifier/{liste_id}', [ListeController::class, 'edit'])->name('liste.edit');
    // Stockage de la modification d'une liste dans la BDD
    Route::put('/listes-modifier/{liste_id}', [ListeController::class, 'update']);
    // Suppression d'une liste
    Route::delete('/listes-modifier/{liste_id}', [ListeController::class, 'destroy'])->name('liste.destroy');

    // *************** Gestion des bouteilles d'une liste ****************

    // Ajout d'une bouteille à une liste
    Route::post('/listes/{liste_id}/bouteilles/{bouteille_id}', [BouteilleController::class, 'ajouterAListe'])->name('bouteilles.ajouterListe');
    // Retrait d'une bouteille d'une liste
    Route::delete('/bouteilles/{id}', [BouteilleController::class, 'retirerDeListe'])->name('bouteilles.retirerListe');
    Route::post('/listes-json', [BouteilleListeController::class, 'store']);
    // Retrait d'une bouteille d'un cellier
    Route::delete('/listes/{liste_id}/bouteilles-listes-modifier/{bouteille_liste}', [BouteilleListeController::class, 'destroy'])->name('bouteilleListe.delete');
    // Modification de la quantité de bouteilles se trouvant dans une même liste
    Route::put('/listes/{liste_id}/bouteilles/{bouteille_id}', [BouteilleController::class, 'modifierQuantiteListe'])->name('bouteilles.modifierQuantiteListe');

    // *************** Admin ****************
    Route::middleware('role:Admin')->group(function () {
        // Affichage de tous les utilisateurs
        Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.index');
        // Affichage d'un utilisateur
        Route::get('/admin/users-show/{user}', [AdminController::class, 'show'])->name('admin.show-user');
        // Création d'un nouvel utilisateur
        Route::get('/admin/users-create', [AdminController::class, 'create'])->name('admin.create-user');
        // Stockage d'un nouvel utilisateur dans la BDD
        Route::post('/admin/users-create', [AdminController::class, 'store']);
        // Modification d'un utilisateur
        Route::get('/admin/users-edit/{user}', [AdminController::class, 'edit'])->name('admin.edit-user');
        // Stockage de la modification d'un utilisateur dans la BDD
        Route::put('/admin/users-edit/{user}', [AdminController::class, 'update']);
        // Suppression d'un utilisateur
        Route::delete('/admin/users-delete/{user}', [AdminController::class, 'destroy'])->name('admin.destroy-user');
    });

});

// *************** Authentification ****************

// Page de connexion
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
// Connexion
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
// Création d'un nouvel utilisateur
Route::get('/register', [CustomAuthController::class, 'create'])->name('register');
// Stockage d'un nouvel utilisateur dans la BDD
Route::post('/register', [CustomAuthController::class, 'store'])->name('register.store');

// importer les données de la saq

Route::get('/scrape', [Web2scraperController::class, 'scrapeData']);


Route::get('/statistics', [StatistiqueController::class, 'index']);
Route::get('/statistics-details/{user}', [StatistiqueController::class, 'detail'])->name('statistics.details');





