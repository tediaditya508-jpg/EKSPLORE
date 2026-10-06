<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Password Baru - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f6f8;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 430px;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .logo {
            display: block;
            width: 100px;
            max-width: 100%;
            margin: 0 auto 20px;
        }

        h1 {
            margin: 0 0 10px;
            text-align: center;
            color: #222222;
            font-size: 25px;
        }

        .description {
            margin: 0 0 25px;
            text-align: center;
            color: #666666;
            font-size: 14px;
            line-height: 1.6;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 12px 15px;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            border-radius: 8px;
            color: #b91c1c;
            font-size: 14px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #333333;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            background: #ffffff;
        }

        input:focus {
            border-color: #2563eb;
        }

        .hint {
            display: block;
            margin-top: 7px;
            color: #777777;
            font-size: 12px;
            line-height: 1.5;
        }

        .button {
            width: 100%;
            margin-top: 5px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <img
            src="{{ asset('images/logo-ekspore.png') }}"
            alt="Logo EKSPLORE"
            class="logo"
        >

        <h1>Buat Password Baru</h1>

        <p class="description">
            Masukkan password baru untuk akun EKSPLORE kamu.
        </p>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ $token }}"
            >

            <input
                type="hidden"
                name="email"
                value="{{ $email }}"
            >

            <div class="form-group">
                <label for="password">
                    Password Baru
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password baru"
                    autocomplete="new-password"
                    required
                >

                <span class="hint">
                    Minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka.
                </span>
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukkan ulang password baru"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button
                type="submit"
                class="button"
            >
                Simpan Password Baru
            </button>
        </form>

        <a
            href="{{ route('login') }}"
            class="back-link"
        >
            Kembali ke Login
        </a>

    </div>

</div>

</body>
</html>