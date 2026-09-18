<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    // LOGIN EMAIL + PASSWORD
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['role'] = 'siswa';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // ARAHKAN KE GOOGLE
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // CALLBACK DARI GOOGLE
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if (!$user) {
                $user = User::create([
                    'nama' => $googleUser->getName() ?? 'Siswa',
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Str::random(32),
                    'role' => 'siswa',
                ]);
            } else {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Login dengan Google gagal. Silakan coba lagi.',
                ]);
        }
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}