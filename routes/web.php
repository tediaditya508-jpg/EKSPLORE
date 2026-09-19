<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AnggotaEkskulController;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| LOGIN SISWA
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


/*
|--------------------------------------------------------------------------
| REGISTER SISWA
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');


/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN SISWA
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


/*
|--------------------------------------------------------------------------
| LOGIN PEMBINA
|--------------------------------------------------------------------------
*/

Route::get('/pembina/login', [AuthController::class, 'showPembinaLogin'])
    ->name('pembina.login');

Route::post('/pembina/login', [AuthController::class, 'pembinaLogin'])
    ->name('pembina.login.process');


/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN PEMBINA
|--------------------------------------------------------------------------
*/

Route::get('/pembina/auth/google', [AuthController::class, 'redirectPembinaGoogle'])
    ->name('pembina.google.login');

Route::get('/pembina/auth/google/callback', [AuthController::class, 'handlePembinaGoogleCallback']);


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'adminLogin'])
    ->name('admin.login.process');


/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/auth/google', [AuthController::class, 'redirectAdminGoogle'])
    ->name('admin.google.login');

Route::get('/admin/auth/google/callback', [AuthController::class, 'handleAdminGoogleCallback']);


/*
|--------------------------------------------------------------------------
| ROUTE YANG MEMBUTUHKAN LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PEMBINA
    |--------------------------------------------------------------------------
    */

    Route::get('/pembina/dashboard', [DashboardController::class, 'pembina'])
        ->name('pembina.dashboard');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
        ->name('ekskul.index');

    Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])
        ->name('ekskul.show');


    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN SISWA
    |--------------------------------------------------------------------------
    */

    // Pendaftaran saya
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
        ->name('pendaftaran.index');

    // Form pendaftaran ekskul
    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');

    // Simpan pendaftaran
    Route::post('/pendaftaran/{id}', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');


    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN PEMBINA
    |--------------------------------------------------------------------------
    */

    // Melihat semua siswa yang mendaftar ekskul binaannya
    Route::get('/pembina/pendaftaran', [PendaftaranController::class, 'pembinaIndex'])
        ->name('pembina.pendaftaran');

    // Mengubah status menjadi diterima / ditolak
    Route::put('/pembina/pendaftaran/{id}', [PendaftaranController::class, 'updateStatus'])
        ->name('pembina.pendaftaran.update');


    /*
    |--------------------------------------------------------------------------
    | ANGGOTA EKSKUL PEMBINA
    |--------------------------------------------------------------------------
    */

    // Melihat anggota aktif dari ekskul yang dibina
    Route::get('/pembina/anggota', [AnggotaEkskulController::class, 'index'])
        ->name('pembina.anggota');


    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */

    Route::get('/jadwal', [JadwalController::class, 'index'])
        ->name('jadwal.index');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});