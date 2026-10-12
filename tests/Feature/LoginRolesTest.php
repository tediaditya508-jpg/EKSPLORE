<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LoginRolesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Pastikan tes memakai SQLite dalam memori.
        $this->assertSame(
            'sqlite',
            config('database.default'),
            'Tes harus memakai SQLite, bukan koneksi database lain.'
        );

        $this->assertSame(
            ':memory:',
            config('database.connections.sqlite.database'),
            'Tes harus memakai SQLite sementara dalam memori.'
        );

        // Membuat tabel khusus untuk tes, tanpa menjalankan migrasi proyek.
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    private function buatAkun(string $role): User
    {
        return User::create([
            'name' => 'Akun Uji ' . $role,
            'nama' => 'Akun Uji ' . $role,
            'email' => $role . '@example.test',
            'password' => Hash::make('UjiAman123'),
            'role' => $role,
        ]);
    }

    public function test_siswa_dapat_login_dengan_akun_siswa(): void
    {
        $this->buatAkun('siswa');

        $response = $this->post('/login', [
            'email' => 'siswa@example.test',
            'password' => 'UjiAman123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertSame('siswa', auth()->user()->role);
    }

    public function test_pembina_dapat_login_dengan_akun_pembina(): void
    {
        $this->buatAkun('pembina');

        $response = $this->post('/pembina/login', [
            'email' => 'pembina@example.test',
            'password' => 'UjiAman123',
        ]);

        $response->assertRedirect(route('pembina.dashboard'));
        $this->assertAuthenticated();
        $this->assertSame('pembina', auth()->user()->role);
    }

    public function test_admin_dapat_login_dengan_akun_admin(): void
    {
        $this->buatAkun('admin');

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.test',
            'password' => 'UjiAman123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertSame('admin', auth()->user()->role);
    }

    public function test_password_salah_ditolak(): void
    {
        $this->buatAkun('siswa');

        $response = $this->post('/login', [
            'email' => 'siswa@example.test',
            'password' => 'PasswordSalah123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_akun_pembina_tidak_bisa_login_melalui_form_siswa(): void
    {
        $this->buatAkun('pembina');

        $response = $this->post('/login', [
            'email' => 'pembina@example.test',
            'password' => 'UjiAman123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
