<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: var(--font-sans);
            background: #f8fafc;
            padding: 20px;
        }

        .register-card {
            width: 400px;
            max-width: 100%;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-img {
            display: block;
            width: 76px;
            height: 76px;
            object-fit: contain;
            margin: 0 auto 10px;
        }

        .logo h1 {
            color: #2563eb;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .logo p {
            color: #64748b;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 6px;
        }

        .register-button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background: #1d4ed8;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
            font-size: 14px;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #94a3b8;
            font-size: 13px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

    <div class="register-card">

        <div class="logo">
            <img
                src="{{ asset('images/logo-ekspore.png') }}"
                alt="Logo EKSPLORE"
                class="logo-img"
            >
            <h1>EKSPLORE</h1>
            <p>Daftar Akun Siswa</p>
        </div>

        <form action="{{ route('register.process') }}" method="POST">

            @csrf

            {{-- NAMA LENGKAP --}}
            <div class="form-group">

                <label for="name">Nama Lengkap</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            {{-- NIS --}}
            <div class="form-group">

                <label for="nis">NIS</label>

                <input
                    type="text"
                    id="nis"
                    name="nis"
                    value="{{ old('nis') }}"
                    placeholder="Masukkan NIS"
                    required
                >

                @error('nis')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


{{-- KELAS --}}
<div class="form-group">

    <label for="kelas">Kelas</label>

    <select
        id="kelas"
        name="kelas"
        required
        style="
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            background: white;
        "
    >
        <option value="">-- Pilih Kelas 10 --</option>

        <optgroup label="RPL">
            @foreach (['10 RPL 1', '10 RPL 2', '10 RPL 3', '10 RPL 4'] as $kelas)
                <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                    {{ $kelas }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="BRP">
            @foreach ([
                '10 BRP 1', '10 BRP 2', '10 BRP 3',
                '10 BRP 4', '10 BRP 5', '10 BRP 6', '10 BRP 7'
            ] as $kelas)
                <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                    {{ $kelas }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="DKV">
            @foreach (['10 DKV 1', '10 DKV 2'] as $kelas)
                <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                    {{ $kelas }}
                </option>
            @endforeach
        </optgroup>

    </select>

    @error('kelas')
        <div class="error">{{ $message }}</div>
    @enderror

</div>


            {{-- NOMOR HP --}}
            <div class="form-group">

                <label for="no_hp">Nomor HP</label>

                <input
                    type="tel"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Masukkan nomor HP aktif"
                    required
                >

                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            {{-- EMAIL --}}
            <div class="form-group">

                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            {{-- PASSWORD --}}
            <div class="form-group">

                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            {{-- KONFIRMASI PASSWORD --}}
            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                >

            </div>

            <button
                type="submit"
                class="register-button"
            >
                Daftar Akun
            </button>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">
                Login di sini
            </a>
        </div>

        <div class="footer-text">
            Sistem Ekstrakurikuler SMK Budi Bakti Ciwidey
        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>

</html>