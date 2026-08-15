<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteLinkController;

use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

#client routes

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

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

Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');

Route::get('/clients/{client}/sites/create', [SiteController::class, 'create'])->name('sites.create');

Route::post('/clients/{client}/sites', [SiteController::class, 'store'])->name('sites.store');

Route::get('/clients/{client}/sites/{site}', [SiteController::class, 'show'])->name('sites.show')->scopeBindings();

Route::get('/clients/{client}/sites/{site}/edit', [SiteController::class, 'edit'])->name('sites.edit')->scopeBindings();

Route::patch('/clients/{client}/sites/{site}', [SiteController::class, 'update'])->name('sites.update')->scopeBindings();

Route::delete(
    '/clients/{client}/sites/{site}',
    [SiteController::class, 'destroy']
)->name('sites.destroy')->scopeBindings();

#site link routes
Route::scopeBindings()->group(function () {
    Route::get('/clients/{client}/sites/{site}/links/create', [SiteLinkController::class, 'create'])->name('site_links.create');
    Route::post('/clients/{client}/sites/{site}/links', [SiteLinkController::class, 'store'])->name('site_links.store');
    Route::get('/clients/{client}/sites/{site}/links/{link}/edit', [SiteLinkController::class, 'edit'])->name('site_links.edit');
    Route::patch('/clients/{client}/sites/{site}/links/{link}', [SiteLinkController::class, 'update'])->name('site_links.update');
    Route::delete('/clients/{client}/sites/{site}/links/{link}', [SiteLinkController::class, 'destroy'])->name('site_links.destroy');
});


#site search
