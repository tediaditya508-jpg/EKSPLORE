<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
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
                    'string',
                    'email:dns',
                    'max:255',
                    'unique:user,email',
                ],
                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->mixedCase(),
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

            $loginRole = $request->session()->pull(
                'google_login_role',
                'siswa'
            );

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();


            /*
            |--------------------------------------------------------------------------
            | GOOGLE LOGIN SISWA
            |--------------------------------------------------------------------------
            */

            if ($loginRole === 'siswa') {

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

                if ($user->role !== 'siswa') {

                    return redirect()
                        ->route('login')
                        ->withErrors([
                            'email' => 'Akun Google ini bukan akun siswa.',
                        ]);
                }

                if ($user->google_id !== $googleUser->getId()) {

                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

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

                if (!$user || $user->role !== 'pembina') {

                    return redirect()
                        ->route('pembina.login')
                        ->withErrors([
                            'email' => 'Akun Google ini tidak terdaftar sebagai Pembina.',
                        ]);
                }

                if ($user->google_id !== $googleUser->getId()) {

                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

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

                if (!$user || $user->role !== 'admin') {

                    return redirect()
                        ->route('admin.login')
                        ->withErrors([
                            'email' => 'Akun Google ini tidak terdaftar sebagai Admin.',
                        ]);
                }

                if ($user->google_id !== $googleUser->getId()) {

                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

                Auth::login($user);

                $request->session()->regenerate();

                if (Route::has('admin.dashboard')) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('dashboard');
            }


            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Jenis login Google tidak dikenali.',
                ]);

        } catch (\Exception $e) {

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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

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
    */

    public function handlePembinaGoogleCallback(Request $request)
    {
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

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
        $request->session()->put('google_login_role', 'admin');

        return $this->handleGoogleCallback($request);
    }


    /*
    |--------------------------------------------------------------------------
    | LUPA PASSWORD
    |--------------------------------------------------------------------------
    */

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $data = $request->validate([
            'identifier' => [
                'required',
                'string',
                'max:255',
            ],
        ], [
            'identifier.required' => 'Email atau nomor HP wajib diisi.',
            'identifier.string' => 'Email atau nomor HP harus berupa teks.',
            'identifier.max' => 'Email atau nomor HP terlalu panjang.',
        ]);

        $identifier = trim($data['identifier']);

        // Cari akun siswa berdasarkan email atau nomor HP
        $user = User::where('role', 'siswa')
            ->where(function ($query) use ($identifier) {
                $query->where('email', $identifier)
                    ->orWhere('no_hp', $identifier);
            })
            ->first();

        // Akun tidak ditemukan
        if (!$user) {
            return back()
                ->withErrors([
                    'identifier' => 'Email atau nomor HP tidak ditemukan pada akun siswa.',
                ])
                ->withInput();
        }

        // Reset password melalui email
        if ($user->email === $identifier) {

            $token = Str::random(64);

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                [
                    'token' => Hash::make($token),
                    'created_at' => now(),
                ]
            );

            $resetUrl = url(
                '/reset-password/' . $token .
                '?email=' . urlencode($user->email)
            );

            Mail::send(
                'emails.reset-password',
                [
                    'user' => $user,
                    'resetUrl' => $resetUrl,
                ],
                function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Reset Password EKSPLORE');
                }
            );

            return back()->with(
                'success',
                'Link reset password telah dikirim ke email akun kamu.'
            );
        }

        // Reset melalui nomor HP belum dibuat
        return back()
            ->withErrors([
                'identifier' => 'Untuk saat ini reset password menggunakan nomor HP belum tersedia. Gunakan email akun siswa.',
            ])
            ->withInput();
    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN FORM RESET PASSWORD
    |--------------------------------------------------------------------------
    */

    public function showResetPassword(Request $request, $token)
    {
        $email = $request->query('email');

        if (!$email) {
            return redirect()
                ->route('password.request')
                ->withErrors([
                    'identifier' => 'Link reset password tidak valid.',
                ]);
        }

        $reset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$reset) {
            return redirect()
                ->route('password.request')
                ->withErrors([
                    'identifier' => 'Link reset password tidak ditemukan atau sudah digunakan.',
                ]);
        }

        if (now()->diffInMinutes($reset->created_at) > 60) {
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->delete();

            return redirect()
                ->route('password.request')
                ->withErrors([
                    'identifier' => 'Link reset password sudah kedaluwarsa. Silakan minta link baru.',
                ]);
        }

        if (!Hash::check($token, $reset->token)) {
            return redirect()
                ->route('password.request')
                ->withErrors([
                    'identifier' => 'Link reset password tidak valid.',
                ]);
        }

        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PASSWORD BARU
    |--------------------------------------------------------------------------
    */

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->mixedCase(),
                'confirmed',
            ],
        ], [
            'token.required' => 'Token reset password tidak ditemukan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password baru wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $data['email'])
            ->first();

        if (!$reset) {
            return back()
                ->withErrors([
                    'password' => 'Link reset password tidak valid atau sudah digunakan.',
                ]);
        }

        if (now()->diffInMinutes($reset->created_at) > 60) {
            DB::table('password_reset_tokens')
                ->where('email', $data['email'])
                ->delete();

            return back()
                ->withErrors([
                    'password' => 'Link reset password sudah kedaluwarsa.',
                ]);
        }

        if (!Hash::check($data['token'], $reset->token)) {
            return back()
                ->withErrors([
                    'password' => 'Token reset password tidak valid.',
                ]);
        }

        $user = User::where('email', $data['email'])
            ->where('role', 'siswa')
            ->first();

        if (!$user) {
            return back()
                ->withErrors([
                    'password' => 'Akun siswa tidak ditemukan.',
                ]);
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        // Token hanya bisa digunakan satu kali
        DB::table('password_reset_tokens')
            ->where('email', $data['email'])
            ->delete();

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Password berhasil diubah. Silakan login menggunakan password baru.'
            );
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