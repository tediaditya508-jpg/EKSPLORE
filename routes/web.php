<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\JadwalController;


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

// Halaman Login Siswa
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses Login Siswa
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


/*
|--------------------------------------------------------------------------
| REGISTER SISWA
|--------------------------------------------------------------------------
*/

// Halaman Register Siswa
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

// Proses Register Siswa
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');


/*
|--------------------------------------------------------------------------
| LOGIN GOOGLE SISWA
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

// Halaman Login Pembina
Route::get('/pembina/login', [AuthController::class, 'showPembinaLogin'])
    ->name('pembina.login');

// Proses Login Pembina
Route::post('/pembina/login', [AuthController::class, 'pembinaLogin'])
    ->name('pembina.login.process');


/*
|--------------------------------------------------------------------------
| LOGIN GOOGLE PEMBINA
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

// Halaman Login Admin
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])
    ->name('admin.login');

// Proses Login Admin
Route::post('/admin/login', [AuthController::class, 'adminLogin'])
    ->name('admin.login.process');


/*
|--------------------------------------------------------------------------
| LOGIN GOOGLE ADMIN
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
    | EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
    ->name('ekskul.index');

    Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])
    ->name('ekskul.show');

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