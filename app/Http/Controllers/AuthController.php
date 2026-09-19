<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN SISWA
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun siswa
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

    public function showRegister()
    {
        return view('auth.register');
    }

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

    public function redirectToGoogle(Request $request)
    {
        // Tandai bahwa Google login dimulai dari halaman siswa
        $request->session()->put('google_login_role', 'siswa');

        return Socialite::driver('google')->redirect();
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN PEMBINA
    |--------------------------------------------------------------------------
    */

    public function redirectPembinaGoogle(Request $request)
    {
        // Tandai bahwa Google login dimulai dari halaman pembina
        $request->session()->put('google_login_role', 'pembina');

        return Socialite::driver('google')->redirect();
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN ADMIN
    |--------------------------------------------------------------------------
    */

    public function redirectAdminGoogle(Request $request)
    {
        // Tandai bahwa Google login dimulai dari halaman admin
        $request->session()->put('google_login_role', 'admin');

        return Socialite::driver('google')->redirect();
    }


    /*
    |--------------------------------------------------------------------------
    | GOOGLE CALLBACK UTAMA
    |--------------------------------------------------------------------------
    */

    public function handleGoogleCallback(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Tentukan login berasal dari mana
            |--------------------------------------------------------------------------
            */

            $loginRole = $request->session()->pull(
                'google_login_role',
                'siswa'
            );


            /*
            |--------------------------------------------------------------------------
            | Ambil data dari Google
            |--------------------------------------------------------------------------
            */

            $googleUser = Socialite::driver('google')->user();


            /*
            |--------------------------------------------------------------------------
            | Cari akun berdasarkan Google ID atau email
            |--------------------------------------------------------------------------
            */

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();


            /*
            |--------------------------------------------------------------------------
            | GOOGLE LOGIN SISWA
            |--------------------------------------------------------------------------
            */

            if ($loginRole === 'siswa') {

                // Jika belum punya akun, buat sebagai siswa
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

                // Akun harus siswa
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

                // Login siswa
                Auth::login($user);

                $request->session()->regenerate();

                return redirect()->route('dashboard');
            }


            /*
            |--------------------------------------------------------------------------
            | GOOGLE LOGIN PEMBINA
            |--------------------------------------------------------------------------
            */

            if ($loginRole === 'pembina') {

                // Akun pembina harus sudah ada
                if (!$user || $user->role !== 'pembina') {

                    return redirect()
                        ->route('pembina.login')
                        ->withErrors([
                            'email' => 'Akun Google ini tidak terdaftar sebagai Pembina.',
                        ]);
                }

                // Pastikan Google ID tersimpan
                if ($user->google_id !== $googleUser->getId()) {

                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

                // Login pembina
                Auth::login($user);

                $request->session()->regenerate();

                if (Route::has('pembina.dashboard')) {
                    return redirect()->route('pembina.dashboard');
                }

                return redirect()->route('dashboard');
            }


            /*
            |--------------------------------------------------------------------------
            | GOOGLE LOGIN ADMIN
            |--------------------------------------------------------------------------
            */

            if ($loginRole === 'admin') {

                // Akun admin harus sudah ada
                if (!$user || $user->role !== 'admin') {

                    return redirect()
                        ->route('admin.login')
                        ->withErrors([
                            'email' => 'Akun Google ini tidak terdaftar sebagai Admin.',
                        ]);
                }

                // Pastikan Google ID tersimpan
                if ($user->google_id !== $googleUser->getId()) {

                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

                // Login admin
                Auth::login($user);

                $request->session()->regenerate();

                if (Route::has('admin.dashboard')) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('dashboard');
            }


            /*
            |--------------------------------------------------------------------------
            | ROLE TIDAK DIKENAL
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Jenis login Google tidak dikenali.',
                ]);

        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | Jika terjadi error
            |--------------------------------------------------------------------------
            */

            $loginRole = $request->session()->pull(
                'google_login_role',
                'siswa'
            );

            if ($loginRole === 'pembina') {

                return redirect()
                    ->route('pembina.login')
                    ->withErrors([
                        'email' => 'Login Google Pembina gagal: ' . $e->getMessage(),
                    ]);
            }

            if ($loginRole === 'admin') {

                return redirect()
                    ->route('admin.login')
                    ->withErrors([
                        'email' => 'Login Google Admin gagal: ' . $e->getMessage(),
                    ]);
            }

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

    public function showPembinaLogin()
    {
        return view('auth.pembina-login');
    }

    public function pembinaLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun pembina
        $credentials['role'] = 'pembina';

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Route::has('pembina.dashboard')) {
                return redirect()->route('pembina.dashboard');
            }

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
    | CALLBACK GOOGLE PEMBINA LAMA
    |--------------------------------------------------------------------------
    |
    | Tetap disediakan agar route lama tidak rusak.
    |
    */

    public function handlePembinaGoogleCallback(Request $request)
    {
        // Gunakan callback utama
        $request->session()->put('google_login_role', 'pembina');

        return $this->handleGoogleCallback($request);
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN
    |--------------------------------------------------------------------------
    */

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Hanya akun admin
        $credentials['role'] = 'admin';

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Route::has('admin.dashboard')) {
                return redirect()->route('admin.dashboard');
            }

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
    | CALLBACK GOOGLE ADMIN LAMA
    |--------------------------------------------------------------------------
    */

    public function handleAdminGoogleCallback(Request $request)
    {
        // Gunakan callback utama
        $request->session()->put('google_login_role', 'admin');

        return $this->handleGoogleCallback($request);
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