<?php

namespace Tests\Feature;

use Tests\TestCase;

class AllPagesAccessTest extends TestCase
{
    public function test_halaman_login_dapat_diakses_tanpa_login(): void
    {
        $this->get('/login')->assertOk();
        $this->get('/pembina/login')->assertOk();
        $this->get('/admin/login')->assertOk();
        $this->get('/register')->assertOk();
        $this->get('/forgot-password')->assertOk();
    }

    public function test_halaman_siswa_meminta_login(): void
    {
        $routes = [
            '/dashboard',
            '/ekstrakurikuler',
            '/galeri',
            '/jadwal',
            '/kehadiran',
            '/notifikasi',
            '/pendaftaran',
            '/pengumuman',
            '/prestasi',
            '/profil',
        ];

        foreach ($routes as $route) {
            $this->get($route)->assertRedirect('/login');
        }
    }

    public function test_halaman_pembina_meminta_login(): void
    {
        $routes = [
            '/pembina/dashboard',
            '/pembina/absensi',
            '/pembina/anggota',
            '/pembina/ekstrakurikuler',
            '/pembina/galeri',
            '/pembina/jadwal',
            '/pembina/pendaftaran',
            '/pembina/pengumuman',
            '/pembina/prestasi',
        ];

        foreach ($routes as $route) {
            $this->get($route)->assertRedirect('/login');
        }
    }

    public function test_halaman_admin_meminta_login(): void
    {
        $routes = [
            '/admin/dashboard',
            '/admin/absensi',
            '/admin/anggota',
            '/admin/ekstrakurikuler',
            '/admin/galeri',
            '/admin/jadwal',
            '/admin/laporan',
            '/admin/pendaftaran',
            '/admin/pengguna',
            '/admin/pengumuman',
            '/admin/prestasi',
            '/admin/export-siswa',
        ];

        foreach ($routes as $route) {
            $this->get($route)->assertRedirect('/login');
        }
    }
}
