<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;


#client routes

Route::get('/', [ClientController::class, 'index'])->name('clients.index');

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');


Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

Route::patch('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

Route::delete(
    '/clients/{client}',
    [ClientController::class, 'destroy']
)->name('clients.destroy');



#site routes

Route::get('/clients/{client}/sites/create', [SiteController::class, 'create'])->name('sites.create');

Route::post('/clients/{client}/sites', [SiteController::class, 'store'])->name('sites.store');

Route::get('/clients/{client}/sites/{site}', [SiteController::class, 'show'])->name('sites.show')->scopeBindings();

Route::get('/clients/{client}/sites/{site}/edit', [SiteController::class, 'edit'])->name('sites.edit')->scopeBindings();

Route::patch('/clients/{client}/sites/{site}', [SiteController::class, 'update'])->name('sites.update')->scopeBindings();

Route::delete(
    '/clients/{client}/sites/{site}',
    [SiteController::class, 'destroy']
)->name('sites.destroy')->scopeBindings();
