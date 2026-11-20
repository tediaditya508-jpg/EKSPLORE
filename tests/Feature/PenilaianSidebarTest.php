<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PenilaianSidebarTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_penilaian_memakai_sidebar_bersama(): void
    {
        $pembina = User::create([
            'name' => 'Pembina Uji',
            'nama' => 'Pembina Uji',
            'email' => 'pembina-sidebar@example.test',
            'password' => 'rahasia123',
            'role' => 'pembina',
        ]);

        $response = $this->actingAs($pembina)->get('/pembina/penilaian');

        $response->assertOk()
            ->assertSee('id="appSidebar"', false)
            ->assertSee('id="appContent"', false)
            ->assertSee('app-sidebar.js', false)
            ->assertSee(route('pembina.penilaian'), false)
            ->assertSee('Penilaian Ekstrakurikuler')
            ->assertDontSee('<aside class="sidebar">', false);
    }

    public function test_dashboard_pembina_memiliki_tombol_penilaian(): void
    {
        $pembina = User::create([
            'name' => 'Pembina Dashboard',
            'nama' => 'Pembina Dashboard',
            'email' => 'pembina-dashboard@example.test',
            'password' => 'rahasia123',
            'role' => 'pembina',
        ]);

        $this->actingAs($pembina)
            ->get('/pembina/dashboard')
            ->assertOk()
            ->assertSee(route('pembina.penilaian'), false)
            ->assertSee('title="Penilaian"', false)
            ->assertSee('7 Modul Aktif')
            ->assertSee('Isi Penilaian Anggota');
    }
}
