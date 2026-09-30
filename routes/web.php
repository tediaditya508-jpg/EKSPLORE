<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AnggotaEkskulController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GaleriController;



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
    // Profil Siswa
    Route::get('/profil', [ProfileController::class, 'index'])
    ->name('profile.index');

    Route::put('/profil', [ProfileController::class, 'update'])
    ->name('profile.update');

    Route::post('/profil/foto', [ProfileController::class, 'updateFoto'])
    ->name('profile.foto.update');

    Route::delete('/profil/foto', [ProfileController::class, 'hapusFoto'])
    ->name('profile.foto.delete');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/pengumuman', [PengumumanController::class, 'index'])
        ->name('pengumuman.index');


    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/notifikasi', [NotifikasiController::class, 'index'])
        ->name('notifikasi.index');

    Route::patch('/notifikasi/{id}/baca', [NotifikasiController::class, 'tandaiDibaca'])
        ->name('notifikasi.baca');

    Route::patch('/notifikasi/baca-semua', [NotifikasiController::class, 'tandaiSemuaDibaca'])
        ->name('notifikasi.bacaSemua');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PEMBINA
    |--------------------------------------------------------------------------
    */

    Route::get('/pembina/dashboard', [DashboardController::class, 'pembina'])
        ->name('pembina.dashboard');


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER PEMBINA
    |--------------------------------------------------------------------------
    */

    Route::get('/pembina/ekstrakurikuler', [EkstrakurikulerController::class, 'pembina'])
        ->name('pembina.ekstrakurikuler');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | KELOLA EKSTRAKURIKULER ADMIN
    |--------------------------------------------------------------------------
    */

    // Daftar ekstrakurikuler
    Route::get('/admin/ekstrakurikuler', [AdminController::class, 'ekstrakurikuler'])
        ->name('admin.ekstrakurikuler');

    // Form tambah ekstrakurikuler
    Route::get('/admin/ekstrakurikuler/tambah', [AdminController::class, 'createEkstrakurikuler'])
        ->name('admin.ekstrakurikuler.create');

    // Simpan ekstrakurikuler baru
    Route::post('/admin/ekstrakurikuler', [AdminController::class, 'storeEkstrakurikuler'])
        ->name('admin.ekstrakurikuler.store');

    // Form edit ekstrakurikuler
    Route::get('/admin/ekstrakurikuler/{id}/edit', [AdminController::class, 'editEkstrakurikuler'])
        ->name('admin.ekstrakurikuler.edit');

    // Update ekstrakurikuler
    Route::put('/admin/ekstrakurikuler/{id}', [AdminController::class, 'updateEkstrakurikuler'])
        ->name('admin.ekstrakurikuler.update');

    // Hapus ekstrakurikuler
    Route::delete('/admin/ekstrakurikuler/{id}', [AdminController::class, 'destroyEkstrakurikuler'])
        ->name('admin.ekstrakurikuler.destroy');


    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat semua pendaftaran siswa
    Route::get('/admin/pendaftaran', [PendaftaranController::class, 'adminIndex'])
        ->name('admin.pendaftaran');

    // Mengubah status pendaftaran menjadi diterima / ditolak
    Route::put('/admin/pendaftaran/{id}', [PendaftaranController::class, 'adminUpdateStatus'])
        ->name('admin.pendaftaran.update');


    /*
    |--------------------------------------------------------------------------
    | ANGGOTA EKSKUL ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat semua anggota aktif ekstrakurikuler
    Route::get('/admin/anggota', [AnggotaEkskulController::class, 'adminIndex'])
        ->name('admin.anggota');


    /*
    |--------------------------------------------------------------------------
    | JADWAL ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat semua jadwal ekstrakurikuler
    Route::get('/admin/jadwal', [JadwalController::class, 'adminIndex'])
        ->name('admin.jadwal');

        Route::get('/admin/jadwal/tambah', [JadwalController::class, 'create'])
        ->name('admin.jadwal.create');

    Route::post('/admin/jadwal', [JadwalController::class, 'store'])
        ->name('admin.jadwal.store');

    Route::get('/admin/jadwal/{id}/edit', [JadwalController::class, 'edit'])
        ->name('admin.jadwal.edit');

    Route::put('/admin/jadwal/{id}', [JadwalController::class, 'update'])
        ->name('admin.jadwal.update');

    Route::delete('/admin/jadwal/{id}', [JadwalController::class, 'destroy'])
        ->name('admin.jadwal.destroy');


    /*
    |--------------------------------------------------------------------------
    | ABSENSI ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat seluruh data absensi siswa
    Route::get('/admin/absensi', [AbsensiController::class, 'adminIndex'])
        ->name('admin.absensi');


    /*
    |--------------------------------------------------------------------------
    | PRESTASI ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat seluruh prestasi ekstrakurikuler
    Route::get('/admin/prestasi', [PrestasiController::class, 'adminIndex'])
        ->name('admin.prestasi');


    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat seluruh pengumuman
    Route::get('/admin/pengumuman', [PengumumanController::class, 'adminIndex'])
        ->name('admin.pengumuman');

    // Form tambah pengumuman
    Route::get('/admin/pengumuman/tambah', [PengumumanController::class, 'create'])
        ->name('admin.pengumuman.create');

    // Menyimpan pengumuman baru
    Route::post('/admin/pengumuman', [PengumumanController::class, 'store'])
        ->name('admin.pengumuman.store');

    Route::get('/pembina/pengumuman', [PengumumanController::class, 'pembinaIndex'])
        ->name('pembina.pengumuman');

    Route::get('/pembina/pengumuman/tambah', [PengumumanController::class, 'pembinaCreate'])
        ->name('pembina.pengumuman.create');

    Route::post('/pembina/pengumuman', [PengumumanController::class, 'pembinaStore'])
        ->name('pembina.pengumuman.store');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN ADMIN
    |--------------------------------------------------------------------------
    */

    // Melihat ringkasan data dan aktivitas ekstrakurikuler
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])
        ->name('admin.laporan');


    /*
    |--------------------------------------------------------------------------
    | KELOLA PENGGUNA ADMIN
    |--------------------------------------------------------------------------
    */

    // Daftar pengguna
    Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])
        ->name('admin.pengguna');

    // Form tambah pengguna
    Route::get('/admin/pengguna/tambah', [AdminController::class, 'create'])
        ->name('admin.pengguna.create');

    // Simpan pengguna baru
    Route::post('/admin/pengguna', [AdminController::class, 'store'])
        ->name('admin.pengguna.store');

    // Form edit pengguna
    Route::get('/admin/pengguna/{id}/edit', [AdminController::class, 'edit'])
        ->name('admin.pengguna.edit');

    // Update pengguna
    Route::put('/admin/pengguna/{id}', [AdminController::class, 'update'])
        ->name('admin.pengguna.update');

    // Hapus pengguna
    Route::delete('/admin/pengguna/{id}', [AdminController::class, 'destroy'])
        ->name('admin.pengguna.destroy');


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER SISWA
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

    // Jadwal untuk siswa
    Route::get('/jadwal', [JadwalController::class, 'index'])
        ->name('jadwal.index');

    // Jadwal ekskul yang dibina oleh pembina
    Route::get('/pembina/jadwal', [JadwalController::class, 'pembina'])
        ->name('pembina.jadwal');


    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */

    // Siswa
    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('galeri.index');

    // Pembina
    Route::get('/pembina/galeri', [GaleriController::class, 'pembina'])
        ->name('pembina.galeri');

    Route::post('/pembina/galeri', [GaleriController::class, 'store'])
        ->name('pembina.galeri.store');

    Route::delete('/pembina/galeri/{id}', [GaleriController::class, 'destroy'])
        ->name('pembina.galeri.destroy');

    // Admin
    Route::get('/admin/galeri', [GaleriController::class, 'adminIndex'])
        ->name('admin.galeri');


    /*
    |--------------------------------------------------------------------------
    | ABSENSI PEMBINA
    |--------------------------------------------------------------------------
    */

    // Melihat dan mengisi absensi anggota ekskul yang dibina
    Route::get('/pembina/absensi', [AbsensiController::class, 'pembina'])
        ->name('pembina.absensi');

    // Menyimpan absensi
    Route::post('/pembina/absensi', [AbsensiController::class, 'store'])
        ->name('pembina.absensi.store');


    /*
    |--------------------------------------------------------------------------
    | KEHADIRAN SISWA
    |--------------------------------------------------------------------------
    */

    // Melihat riwayat kehadiran siswa
    Route::get('/kehadiran', [AbsensiController::class, 'siswa'])
        ->name('kehadiran.index');

    Route::post('/kehadiran', [AbsensiController::class, 'storeSiswa'])
        ->name('kehadiran.storeSiswa');


    /*
    |--------------------------------------------------------------------------
    | PRESTASI SISWA
    |--------------------------------------------------------------------------
    */

    // Melihat seluruh prestasi ekstrakurikuler
    Route::get('/prestasi', [PrestasiController::class, 'index'])
        ->name('prestasi.index');


    /*
    |--------------------------------------------------------------------------
    | PRESTASI PEMBINA
    |--------------------------------------------------------------------------
    */

    // Melihat prestasi dari ekskul yang dibina
    Route::get('/pembina/prestasi', [PrestasiController::class, 'pembina'])
        ->name('pembina.prestasi');

    // Menyimpan prestasi
    Route::post('/pembina/prestasi', [PrestasiController::class, 'store'])
        ->name('pembina.prestasi.store');

    // Mengubah prestasi
    Route::put('/pembina/prestasi/{id}', [PrestasiController::class, 'update'])
        ->name('pembina.prestasi.update');

    // Menghapus prestasi
    Route::delete('/pembina/prestasi/{id}', [PrestasiController::class, 'destroy'])
        ->name('pembina.prestasi.destroy');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});