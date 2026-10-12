<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Ekstrakurikuler;
use App\Models\Pengumuman;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PengumumanPembinaTest extends TestCase
{
    use RefreshDatabase;

    private function buatPembina(string $email): User
    {
        return User::create([
            'name' => 'Pembina Test',
            'email' => $email,
            'password' => bcrypt('password123'),
            'role' => 'pembina',
        ]);
    }

    private function buatEkskul(
        User $pembina,
        string $nama
    ): Ekstrakurikuler {
        return Ekstrakurikuler::create([
            'nama_ekskul' => $nama,
            'pembina_id' => $pembina->id,
        ]);
    }

    private function buatPengumuman(
        Ekstrakurikuler $ekskul,
        string $judul
    ): Pengumuman {
        return Pengumuman::create([
            'ekskul_id' => $ekskul->id,
            'judul' => $judul,
            'isi' => 'Isi pengumuman untuk pengujian.',
            'tanggal' => '2026-10-12',
        ]);
    }

    public function test_pembina_hanya_melihat_pengumuman_ekskul_miliknya(): void
    {
        $pembinaA = $this->buatPembina('pembina-a@example.test');
        $pembinaB = $this->buatPembina('pembina-b@example.test');

        $ekskulA = $this->buatEkskul($pembinaA, 'PMR Test');
        $ekskulB = $this->buatEkskul($pembinaB, 'Futsal Test');

        $this->buatPengumuman($ekskulA, 'Pengumuman PMR');
        $this->buatPengumuman($ekskulB, 'Pengumuman Futsal');

        $response = $this->actingAs($pembinaA)
            ->get(route('pembina.pengumuman'));

        $response->assertOk();
        $response->assertSee('Pengumuman PMR');
        $response->assertDontSee('Pengumuman Futsal');
    }

    public function test_pembina_tidak_bisa_membuat_pengumuman_untuk_ekskul_pembina_lain(): void
    {
        $pembinaA = $this->buatPembina('pembina-a2@example.test');
        $pembinaB = $this->buatPembina('pembina-b2@example.test');

        $ekskulB = $this->buatEkskul($pembinaB, 'Futsal Test');

        $response = $this->actingAs($pembinaA)
            ->post(route('pembina.pengumuman.store'), [
                'ekskul_id' => $ekskulB->id,
                'judul' => 'Pengumuman Ilegal Test',
                'isi' => 'Tes keamanan pengumuman.',
                'tanggal' => '2026-10-12',
            ]);

        $response->assertSessionHasErrors('ekskul_id');

        $this->assertDatabaseMissing('pengumuman', [
            'judul' => 'Pengumuman Ilegal Test',
        ]);
    }

    public function test_pembina_bisa_membuat_pengumuman_untuk_ekskul_miliknya(): void
    {
        $pembina = $this->buatPembina('pembina-c@example.test');
        $ekskul = $this->buatEkskul($pembina, 'Seni Test');

        $response = $this->actingAs($pembina)
            ->post(route('pembina.pengumuman.store'), [
                'ekskul_id' => $ekskul->id,
                'judul' => 'Pengumuman Seni Test',
                'isi' => 'Latihan seni dimulai.',
                'tanggal' => '2026-10-12',
            ]);

        $response->assertRedirect(route('pembina.pengumuman'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pengumuman', [
            'ekskul_id' => $ekskul->id,
            'judul' => 'Pengumuman Seni Test',
        ]);
    }
}