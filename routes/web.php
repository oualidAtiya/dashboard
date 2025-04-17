<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasculeContoller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportateurController;
use App\Http\Controllers\importerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [dashController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/importer', [importerController::class, 'index'])->name('importer.dashboard');

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

    // Bascules
    Route::get('/bascules' , [BasculeContoller::class , "index"])->name('bascules.index');
    Route::get('/bascules/create',[BasculeContoller::class , 'create'])->name('bascules.create');
    Route::post('/bascules/create',[BasculeContoller::class , 'store'])->name('bascules.store');
    Route::delete('bascules/{id}', [BasculeContoller::class, 'destroy'])->name('bascules.destroy');
    Route::get('/bascules/{id}/edit', [BasculeContoller::class, 'edit'])->name('bascules.edit');
    Route::put('/bascules/{id}', [BasculeContoller::class, 'update'])->name('bascules.update');

    // Users
    Route::get('/users' , [UsersController::class , "index"])->name('users.index');
    Route::get('/users/create',[UsersController::class , 'create'])->name('users.create');
    Route::post('/users/create',[UsersController::class , 'store'])->name('users.store');
    Route::delete('users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');







    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/export',[ExportController::class , 'index'])->name('export.index');
});

require __DIR__.'/auth.php';
