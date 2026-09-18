<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});


// ==============================
// DASHBOARD
// ==============================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


// ==============================
// EKSTRAKURIKULER
// ==============================

Route::get('/ekskul', [EkstrakurikulerController::class, 'index'])
    ->name('ekskul.index');

Route::get('/ekskul/{id}', [EkstrakurikulerController::class, 'show'])
    ->name('ekskul.show');


// ==============================
// PENDAFTARAN
// ==============================

Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'create'])
    ->name('pendaftaran.create');

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
    ->name('pendaftaran.store');