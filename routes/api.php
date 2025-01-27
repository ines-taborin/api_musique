<?php

use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\ChansonController;
use App\Http\Controllers\ListeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//--- Listes ---//

// Route pour récupérer toutes les listes publiques
Route::get('/listes', [ListeController::class, 'listesPubliques']);

// Route pour récupérer une liste selon son ID
Route::get('/listes/{listeId}', [ListeController::class, 'liste']);

// Route pour récupérer les listes d'un utilisateur en particulier selon son ID
Route::get('/listes/utilisateurs/{utilisateurId}', [ListeController::class, 'listesUtilisateur']);

// Route pour créer une nouvelle liste
Route::post('/listes', [ListeController::class, 'creerListe']);

// Route pour modifier une liste selon son ID
Route::patch('/listes/{listeId}', [ListeController::class, 'modifierListe']);

//Route pour supprimer une liste selon son ID
Route::delete('/listes/{listeId}', [ListeController::class, 'supprimerListe']);

// Route pour récupérer toutes les chansons d'une liste selon son ID
Route::get('/listes/{listeId}/chansons', [ListeController::class, 'chansonsListe']);



//--- Chansons ---//

// Route pour récupérer toutes les chansons
Route::get('/chansons', [ChansonController::class, 'chansons']);

// Route pour récupérer une chanson selon son ID
Route::get('/chansons/{chansonId}', [ChansonController::class, 'chanson']);

// Route pour récupérer toutes les chansons d'un artiste selon son ID
Route::get('/chansons/artistes/{artisteId}', [ChansonController::class, 'chansonsArtiste']);

// Route pour augmenter le nombre de lectures d'une chanson selon son ID
Route::post('/chansons/{chansonId}/lectures', [ChansonController::class, 'augmenterLecture']);



//--- Artistes ---//

// Route pour récupérer tous les artistes
Route::get('/artistes', [ArtisteController::class, 'artistes']);

// Route pour récupérer un artiste selon son ID
Route::get('/artistes/{artisteId}', [ArtisteController::class, 'artiste']);

