<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportateurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [dashController::class, 'index'])->name('dashboard');

    // importers
    Route::get('/importers',[ImportateurController::class , 'index'])->name('importers.index');;
    Route::delete('/importers/{id}',[ImportateurController::class , 'destroy'])->name('importers.destroy');
    Route::get('/importers/create',[ImportateurController::class , 'create'])->name('importers.create');
    Route::post('/importers/create',[ImportateurController::class , 'store']);
    Route::get('/importers/{id}/edit', [ImportateurController::class, 'edit'])->name('importers.edit');
    Route::put('/importers/{id}', [ImportateurController::class, 'update']);

    // Clients
    Route::get('/clients' , [ClientController::class , "index"])->name('clients.index');
    Route::get('/clients/create',[ClientController::class , 'create'])->name('clients.create');
    Route::post('/clients/create',[ClientController::class , 'store']);
    Route::delete('/clients/{id}',[ClientController::class , 'destroy'])->name('clients.destroy');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');




    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/export',[ExportController::class , 'index']);
});

require __DIR__.'/auth.php';
