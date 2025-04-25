<?php

use Illuminate\Support\Facades\Route;

// Exemple de route
Route::get('/example', function () {
    return 'Hello, World!';
});

use App\Http\Controllers\MonApiController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CoteController;

// Routes pour les ressources 1 
Route::get('/resources', [MonApiController::class, 'index']);
Route::post('/resources', [MonApiController::class, 'store']);
Route::get('/resources/{id}', [MonApiController::class, 'show']);
Route::put('/resources/{id}', [MonApiController::class, 'update']);
Route::delete('/resources/{id}', [MonApiController::class, 'destroy']);

// Routes pour les étudiants
Route::post('/etudiants', [EtudiantController::class, 'inscrire']);
Route::get('/etudiants', [EtudiantController::class, 'obtenirTousLesEtudiants']);
Route::get('/etudiants/{id}', [EtudiantController::class, 'obtenirEtudiantParId']);
Route::put('/etudiants/{id}', [EtudiantController::class, 'mettreAJourEtudiant']);
Route::delete('/etudiants/{id}', [EtudiantController::class, 'supprimerEtudiant']);

// Routes pour les cotes
Route::post('/cotes', [CoteController::class, 'ajouterCote']);
Route::get('/etudiants/{id}/cotes', [CoteController::class, 'obtenirCotesParEtudiant']);
Route::put('/cotes/{id}', [CoteController::class, 'mettreAJourCote']);
Route::delete('/cotes/{id}', [CoteController::class, 'supprimerCote']);