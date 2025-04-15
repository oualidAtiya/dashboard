<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportateurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/importateurs', [ImportateurController::class, 'index']); // Show all
Route::get('/importateurs/create', [ImportateurController::class, 'create']); // Show form
Route::post('/importateurs', [ImportateurController::class, 'store']); // Save new

Route::get('/importateurs/{importateur}', [ImportateurController::class, 'show']); // Show one
Route::get('/importateurs/{importateur}/edit', [ImportateurController::class, 'edit']); // Edit form
Route::put('/importateurs/{importateur}', [ImportateurController::class, 'update']); // Update
Route::delete('/importateurs/{importateur}', [ImportateurController::class, 'destroy']); // Delete