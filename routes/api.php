<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PendaftaranApiController;
use App\Http\Controllers\Api\AbsensiApiController;

Route::post('/login', [AuthApiController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    // API Logout
    Route::post('/logout', [AuthApiController::class, 'logout']);

    // API User
    Route::get('/me', [AuthApiController::class, 'user']);

    // API Pendaftaran Siswa
    Route::get('/pendaftaran', [PendaftaranApiController::class, 'index']);
    Route::post('/pendaftaran/{id}', [PendaftaranApiController::class, 'store']);

    // API Pendaftaran Pembina
    Route::get('/pembina/pendaftaran', [PendaftaranApiController::class, 'pembinaIndex']);
    Route::put('/pembina/pendaftaran/{id}', [PendaftaranApiController::class, 'updateStatus']);

    // API Absensi Pembina
    Route::get('/pembina/absensi', [AbsensiApiController::class, 'pembina']);
    Route::post('/pembina/absensi', [AbsensiApiController::class, 'store']);

    // API Kehadiran Siswa
    Route::get('/kehadiran', [AbsensiApiController::class, 'siswa']);
    Route::post('/kehadiran', [AbsensiApiController::class, 'storeSiswa']);
});