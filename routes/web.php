<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


// ==========================================
// 1. ROTAS GERAIS
// ==========================================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// ==========================================
// 2. ROTAS ADMINISTRATIVAS — CRIAÇÃO E ELIMINAÇÃO
// ==========================================

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('bands', BandController::class)
        ->only(['create', 'store', 'destroy'])
        ->names([
            'create' => 'bands.create',
            'store' => 'bands.store',
            'destroy' => 'bands.destroy',
        ]);

    Route::resource('albums', AlbumController::class)
        ->only(['create', 'store', 'destroy'])
        ->names([
            'create' => 'albums.create',
            'store' => 'albums.store',
            'destroy' => 'albums.destroy',
        ]);
});


// ==========================================
// 3. ROTAS DE EXPORTAÇÃO
// ==========================================

Route::get('/bands/export', [BandController::class, 'export'])
    ->name('bands.export');

Route::get('/albums/export', [AlbumController::class, 'export'])
    ->name('albums.export');


// ==========================================
// 4. ROTAS AUTENTICADAS — EDIÇÃO
// ==========================================

Route::middleware('auth')->group(function () {

    Route::resource('bands', BandController::class)
        ->only(['edit', 'update'])
        ->names([
            'edit' => 'bands.edit',
            'update' => 'bands.update',
        ]);

    Route::resource('albums', AlbumController::class)
        ->only(['edit', 'update'])
        ->names([
            'edit' => 'albums.edit',
            'update' => 'albums.update',
        ]);
});


// ==========================================
// 5. ROTAS PÚBLICAS — CONSULTA
// ==========================================

Route::resource('bands', BandController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'bands.all',
        'show' => 'bands.show',
    ]);

Route::resource('albums', AlbumController::class)
    ->only(['show'])
    ->names([
        'show' => 'albums.show',
    ]);


// ==========================================
// 6. ROTA FALLBACK
// ==========================================

Route::fallback(function () {
    abort(404);
});
