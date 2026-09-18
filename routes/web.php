<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;


// ==============================
// LOGIN DAN REGISTER SISWA
// ==============================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


// ==============================
// LOGIN GOOGLE
// ==============================

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


// ==============================
// LOGOUT
// ==============================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ==============================
// HALAMAN AWAL
// ==============================

Route::get('/', function () {
    return redirect()->route('login');
});


// ==============================
// HALAMAN YANG HARUS LOGIN
// ==============================

Route::middleware('auth')->group(function () {

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
    // JADWAL
    // ==============================

    Route::get('/jadwal', [JadwalController::class, 'index'])
        ->name('jadwal.index');


    // ==============================
    // PENDAFTARAN
    // ==============================

    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
});