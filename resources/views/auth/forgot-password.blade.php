<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #13294b;
        }

        .container {
            width: 100%;
            max-width: 560px;
            background: white;
            border-radius: 24px;
            padding: 48px 50px;
            box-shadow: 0 15px 40px rgba(20, 50, 90, 0.10);
        }

        .logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo img {
            width: 120px;
            height: auto;
        }

        h1 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 14px;
            color: #10294d;
        }

        .description {
            text-align: center;
            color: #667085;
            font-size: 17px;
            line-height: 1.6;
            margin-bottom: 34px;
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            color: #172b4d;
        }

        input {
            width: 100%;
            height: 56px;
            border: 1px solid #cfd7e3;
            border-radius: 12px;
            padding: 0 17px;
            font-size: 16px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2864e8;
            box-shadow: 0 0 0 3px rgba(40, 100, 232, 0.10);
        }

        .hint {
            margin-top: 9px;
            font-size: 13px;
            color: #7b8794;
        }

        .button {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 12px;
            background: #2864e8;
            color: white;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 26px;
            transition: 0.2s;
        }

        .button:hover {
            background: #1f55ca;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
            line-height: 1.5;
        }

        .success {
            background: #eaf8ef;
            color: #176b36;
            border: 1px solid #b9e7c8;
        }

        .error {
            background: #fff0f0;
            color: #a52828;
            border: 1px solid #f0baba;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 28px;
            color: #2864e8;
            text-decoration: none;
            font-weight: 700;
        }

        .back:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                padding: 35px 25px;
            }

            h1 {
                font-size: 29px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="logo">
        <img src="{{ asset('images/logo-ekspore.png') }}" alt="Logo EKSPLORE">
    </div>

    <h1>Lupa Password?</h1>

    <p class="description">
        Masukkan email atau nomor HP akun siswa yang terdaftar
        untuk melanjutkan proses pemulihan password.
    </p>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <label for="identifier">
            Email / No. HP
        </label>

        <input
            type="text"
            id="identifier"
            name="identifier"
            value="{{ old('identifier') }}"
            placeholder="Masukkan email atau nomor HP"
            autocomplete="off"
            required
        >

        <div class="hint">
            Contoh: siswa@email.com atau 081234567890
        </div>

        <button type="submit" class="button">
            Lanjutkan
        </button>
    </form>

    <a href="{{ route('login') }}" class="back">
        ← Kembali ke Login
    </a>

</div>

</body>
</html>