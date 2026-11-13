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

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (!in_array($user->role, ['siswa', 'admin'], true)) {
            Auth::logout();

            return back()
                ->withErrors([
                    'email' => 'Akun ini tidak diizinkan melalui login siswa.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

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
    // Jika konfirmasi password berbeda, tampilkan HTTP 400.
    if (
        $request->filled('password') &&
        $request->filled('password_confirmation') &&
        $request->input('password') !== $request->input('password_confirmation')
    ) {
        return response()->view('errors.400', [
            'message' => 'Konfirmasi password tidak cocok. Silakan periksa kembali.',
        ], 400);
    }

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

    // Simpan data sementara, belum membuat akun.
    // Password disimpan dalam bentuk hash, bukan teks asli.
    $request->session()->put('register_pending', [
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'created_at' => now()->timestamp,
    ]);

    return redirect()->route('register.google.start');
}


    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN SISWA
    |--------------------------------------------------------------------------
    */

    public function redirectRegisterGoogle(Request $request)
{
    $pending = $request->session()->get('register_pending');

    if (!$pending) {
        return redirect()
            ->route('register')
            ->withErrors([
                'email' => 'Silakan isi formulir pendaftaran terlebih dahulu.',
            ]);
    }

    $request->session()->put('google_login_role', 'register');

    return Socialite::driver('google')->redirect();
}

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
    $loginRole = $request->session()->pull('google_login_role', 'siswa');

    try {
        $googleUser = Socialite::driver('google')->user();

        $googleEmail = $googleUser->getEmail();
        $googleId = $googleUser->getId();
        $googleData = $googleUser->user ?? [];

        /*
        |--------------------------------------------------------------------------
        | PENDAFTARAN SISWA MELALUI GOOGLE
        |--------------------------------------------------------------------------
        */

        if ($loginRole === 'register') {
            $pending = $request->session()->get('register_pending');

            if (
                !$pending ||
                empty($pending['created_at']) ||
                now()->timestamp - $pending['created_at'] > 600
            ) {
                $request->session()->forget('register_pending');

                return response()->view('errors.400', [
                    'message' => 'Pendaftaran tidak dapat diproses. Silakan ulangi pendaftaran.',
                ], 400);
            }

            $verifiedValue = $googleData['verified_email']
                ?? $googleData['email_verified']
                ?? false;

            $googleVerified = filter_var(
                $verifiedValue,
                FILTER_VALIDATE_BOOLEAN
            );

            if (
                !$googleVerified ||
                !$googleEmail ||
                Str::lower($googleEmail) !== Str::lower($pending['email'])
            ) {
                $request->session()->forget('register_pending');

                return response()->view('errors.400', [
                    'message' => 'Email Google tidak dapat diverifikasi sebagai akun Google yang valid. Silakan gunakan akun Google asli yang aktif dan coba kembali.',
                ], 400);
            }

            $existingUser = User::whereRaw(
                'LOWER(email) = ?',
                [Str::lower($googleEmail)]
            )->first();

            if ($existingUser) {
                $request->session()->forget('register_pending');

                return response()->view('errors.400', [
                    'message' => 'Pendaftaran tidak dapat diproses. Silakan gunakan data pendaftaran lain.',
                ], 400);
            }

            $user = User::create([
                'name' => $pending['name'],
                'nama' => $pending['name'],
                'email' => $googleEmail,
                'google_id' => $googleId,
                'password' => $pending['password'],
                'role' => 'siswa',
            ]);

            $user->email_verified_at = now();
            $user->save();

            $request->session()->forget('register_pending');

            try {
                Mail::send(
                    'emails.registration-success',
                    ['user' => $user],
                    function ($message) use ($user) {
                        $message->to($user->email)
                            ->subject('Pendaftaran Akun EKSPLORE Berhasil');
                    }
                );
            } catch (\Exception $mailError) {
                \Illuminate\Support\Facades\Log::error(
                    'Email pendaftaran EKSPLORE gagal dikirim: ' . $mailError->getMessage()
                );
            }

            return redirect()
                ->route('login')
                ->with('success', 'Pendaftaran berhasil. Silakan login menggunakan email dan password EKSPLORE.');
        }

        /*
        |--------------------------------------------------------------------------
        | CARI AKUN YANG SUDAH TERDAFTAR
        |--------------------------------------------------------------------------
        */

        $user = User::where('google_id', $googleId)
            ->orWhere('email', $googleEmail)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | LOGIN SISWA
        |--------------------------------------------------------------------------
        */

        if ($loginRole === 'siswa') {
            if (!$user || $user->role !== 'siswa') {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Akun Google ini belum terdaftar sebagai siswa.',
                    ]);
            }

            $jumlahLogin = DB::table('google_login_attempts')
                ->where('user_id', $user->id)
                ->where('logged_in_at', '>=', now()->subDays(7))
                ->count();

            if ($jumlahLogin >= 3) {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Batas login Google siswa untuk 7 hari telah tercapai. Silakan login menggunakan email dan password.',
                    ]);
            }

            if ($user->google_id !== $googleId) {
                $user->update(['google_id' => $googleId]);
            }

            Auth::login($user);
            $request->session()->regenerate();

            DB::table('google_login_attempts')->insert([
                'user_id' => $user->id,
                'logged_in_at' => now(),
            ]);

            return redirect()->route('dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN PEMBINA
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

            $jumlahLogin = DB::table('google_login_attempts')
                ->where('user_id', $user->id)
                ->where('logged_in_at', '>=', now()->subDays(7))
                ->count();

            if ($jumlahLogin >= 5) {
                return redirect()
                    ->route('pembina.login')
                    ->withErrors([
                        'email' => 'Batas login Google Pembina untuk 7 hari telah tercapai. Silakan login menggunakan email dan password.',
                    ]);
            }

            if ($user->google_id !== $googleId) {
                $user->update(['google_id' => $googleId]);
            }

            Auth::login($user);
            $request->session()->regenerate();

            DB::table('google_login_attempts')->insert([
                'user_id' => $user->id,
                'logged_in_at' => now(),
            ]);

            if (Route::has('pembina.dashboard')) {
                return redirect()->route('pembina.dashboard');
            }

            return redirect()->route('dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN ADMIN (TANPA BATAS)
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

            if ($user->google_id !== $googleId) {
                $user->update(['google_id' => $googleId]);
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
        \Illuminate\Support\Facades\Log::error(
            'Google authentication EKSPLORE gagal: ' . $e->getMessage()
        );

        if ($loginRole === 'register') {
            return response()->view('errors.400', [
                'message' => 'Pendaftaran tidak dapat diproses. Silakan coba kembali.',
            ], 400);
        }

        if ($loginRole === 'pembina') {
            return redirect()
                ->route('pembina.login')
                ->withErrors([
                    'email' => 'Login Google Pembina gagal. Silakan coba kembali.',
                ]);
        }

        if ($loginRole === 'admin') {
            return redirect()
                ->route('admin.login')
                ->withErrors([
                    'email' => 'Login Google Admin gagal. Silakan coba kembali.',
                ]);
        }

        return redirect()
            ->route('login')
            ->withErrors([
                'email' => 'Login Google gagal. Silakan coba kembali.',
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

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (!in_array($user->role, ['pembina', 'admin'], true)) {
            Auth::logout();

            return back()
                ->withErrors([
                    'email' => 'Akun ini tidak diizinkan melalui login pembina.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('pembina.dashboard');
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

            DB::table('password_reset_token')->updateOrInsert(
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

        $reset = DB::table('password_reset_token')
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
            DB::table('password_reset_token')
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

        $reset = DB::table('password_reset_token')
            ->where('email', $data['email'])
            ->first();

        if (!$reset) {
            return back()
                ->withErrors([
                    'password' => 'Link reset password tidak valid atau sudah digunakan.',
                ]);
        }

        if (now()->diffInMinutes($reset->created_at) > 60) {
            DB::table('password_reset_token')
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
        DB::table('password_reset_token')
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