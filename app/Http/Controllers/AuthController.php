<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN SISWA
    |--------------------------------------------------------------------------
    */

    // Menampilkan halaman login siswa
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login siswa dengan email dan password
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun dengan role siswa yang boleh masuk lewat login siswa
        $credentials['role'] = 'siswa';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER SISWA
    |--------------------------------------------------------------------------
    */

    // Menampilkan halaman register siswa
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register siswa
    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]
        );

        User::create([
            'name' => $data['name'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'siswa',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN SISWA
    |--------------------------------------------------------------------------
    */

    // Mengarahkan siswa ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback Google siswa
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari berdasarkan Google ID atau email
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            // Jika belum ada akun
            if (!$user) {
                $nama = $googleUser->getName() ?? 'Siswa';

                $user = User::create([
                    'name' => $nama,
                    'nama' => $nama,
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Str::random(32),
                    'role' => 'siswa',
                ]);
            }

            // Jika akun sudah ada tetapi bukan siswa,
            // jangan izinkan login melalui halaman siswa.
            if ($user->role !== 'siswa') {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Akun Google ini bukan akun siswa.',
                    ]);
            }

            // Pastikan Google ID tersimpan
            if ($user->google_id !== $googleUser->getId()) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('dashboard');

        } catch (\Exception $e) {

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Login Google gagal: ' . $e->getMessage(),
                ]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN PEMBINA
    |--------------------------------------------------------------------------
    */

    // Menampilkan halaman login pembina
    public function showPembinaLogin()
    {
        return view('auth.pembina-login');
    }

    // Proses login pembina dengan email dan password
    public function pembinaLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun dengan role pembina
        $credentials['role'] = 'pembina';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Sementara menggunakan dashboard utama
            // sampai dashboard pembina dibuat.
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password pembina salah.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN PEMBINA
    |--------------------------------------------------------------------------
    */

    // Mengarahkan pembina ke Google
    public function redirectPembinaGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback Google pembina
    public function handlePembinaGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari akun berdasarkan Google ID atau email
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            // Akun pembina harus sudah terdaftar
            if (!$user || $user->role !== 'pembina') {
                return redirect()
                    ->route('pembina.login')
                    ->withErrors([
                        'email' => 'Akun Google ini tidak terdaftar sebagai Pembina.',
                    ]);
            }

            // Simpan Google ID jika belum tersimpan
            if ($user->google_id !== $googleUser->getId()) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            $request->session()->regenerate();

            // Sementara ke dashboard utama
            return redirect()->route('dashboard');

        } catch (\Exception $e) {

            return redirect()
                ->route('pembina.login')
                ->withErrors([
                    'email' => 'Login Google Pembina gagal: ' . $e->getMessage(),
                ]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN
    |--------------------------------------------------------------------------
    */

    // Menampilkan halaman login admin
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    // Proses login admin dengan email dan password
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun dengan role admin
        $credentials['role'] = 'admin';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Sementara menggunakan dashboard utama
            // sampai dashboard admin dibuat.
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password admin salah.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN ADMIN
    |--------------------------------------------------------------------------
    */

    // Mengarahkan admin ke Google
    public function redirectAdminGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback Google admin
    public function handleAdminGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari akun berdasarkan Google ID atau email
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            // Akun admin harus sudah terdaftar
            if (!$user || $user->role !== 'admin') {
                return redirect()
                    ->route('admin.login')
                    ->withErrors([
                        'email' => 'Akun Google ini tidak terdaftar sebagai Admin.',
                    ]);
            }

            // Simpan Google ID jika belum tersimpan
            if ($user->google_id !== $googleUser->getId()) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            $request->session()->regenerate();

            // Sementara ke dashboard utama
            return redirect()->route('dashboard');

        } catch (\Exception $e) {

            return redirect()
                ->route('admin.login')
                ->withErrors([
                    'email' => 'Login Google Admin gagal: ' . $e->getMessage(),
                ]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}