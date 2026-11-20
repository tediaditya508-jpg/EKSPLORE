
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Wali Kelas - EKSPLORE</title>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            min-height: 100vh;
            background: #f0fdf4;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1080px;
            min-height: 650px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 20px 60px rgba(15, 23, 42, .12);
        }

        .left-side {
            position: relative;
            background: linear-gradient(145deg, #f0fdf4 0%, #dcfce7 48%, #f0fdf4 100%);
            padding: 42px 50px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .circle-one {
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(22, 163, 74, .07);
            top: -100px;
            left: -80px;
        }

        .circle-two {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(34, 197, 94, .06);
            right: -160px;
            bottom: -160px;
        }

        .left-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #16a34a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(22, 163, 74, .22);
        }

        .brand-name {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: .5px;
            color: #14532d;
        }

        .logo-area {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .logo-area img {
            width: 210px;
            height: 210px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 10px 20px rgba(15, 23, 42, .08));
        }

        .left-title {
            font-size: 31px;
            line-height: 1.18;
            color: #14532d;
            margin-top: 3px;
            margin-bottom: 13px;
            max-width: 430px;
        }

        .left-title span {
            color: #16a34a;
        }

        .left-description {
            color: #526b5b;
            font-size: 14px;
            line-height: 1.7;
            max-width: 440px;
            margin-bottom: 18px;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 3px;
        }

        .feature {
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(22, 163, 74, .16);
            border-radius: 20px;
            padding: 7px 12px;
            color: #166534;
            font-size: 11px;
            font-weight: 600;
            backdrop-filter: blur(5px);
        }

        .left-footer {
            position: relative;
            z-index: 2;
            margin-top: auto;
            padding-top: 15px;
            color: #64748b;
            font-size: 12px;
        }

        .right-side {
            background: #fff;
            padding: 55px 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 380px;
        }

        .login-title {
            color: #172033;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .login-subtitle {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .role-badge {
            display: inline-block;
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 10px;
            padding: 11px 13px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            height: 49px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            background: #fff;
            padding: 0 15px 0 43px;
            color: #1e293b;
            font-size: 14px;
            outline: none;
            transition: .2s ease;
        }

        .form-input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, .10);
        }

        .form-input::placeholder {
            color: #a1aab8;
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }

        .password-toggle:hover {
            color: #15803d;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
        }

        .remember input {
            accent-color: #16a34a;
        }

        .login-button {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 10px;
            background: #16a34a;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
            box-shadow: 0 8px 20px rgba(22, 163, 74, .20);
        }

        .login-button:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .back-text {
            text-align: center;
            color: #64748b;
            font-size: 12px;
            margin-top: 23px;
        }

        .back-text a {
            color: #15803d;
            text-decoration: none;
            font-weight: 700;
        }

        .back-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            body {
                padding: 15px;
                align-items: flex-start;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 480px;
                min-height: auto;
            }

            .left-side {
                padding: 32px 28px;
                text-align: center;
            }

            .brand {
                justify-content: center;
                margin-bottom: 15px;
            }

            .logo-area img {
                width: 150px;
                height: 150px;
            }

            .left-title {
                font-size: 24px;
                max-width: 100%;
                margin: 0 auto 10px;
            }

            .left-description {
                max-width: 100%;
                margin: 0 auto 16px;
            }

            .features {
                justify-content: center;
            }

            .right-side {
                padding: 42px 34px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 0;
            }

            .login-wrapper {
                border-radius: 0;
                min-height: 100vh;
            }

            .left-side {
                padding: 28px 20px;
            }

            .logo-area img {
                width: 130px;
                height: 130px;
            }

            .left-title {
                font-size: 22px;
            }

            .right-side {
                padding: 40px 25px;
            }

            .login-title {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <div class="left-side">
            <div class="circle-one"></div>
            <div class="circle-two"></div>

            <div class="left-content">

                <div class="brand">
                    <div class="brand-icon">E</div>
                    <div class="brand-name">EKSPLORE</div>
                </div>

                <div class="logo-area">
                    <img
                        src="{{ asset('images/logo-ekspore.png') }}"
                        alt="Logo EKSPLORE"
                    >
                </div>

                <h1 class="left-title">
                    Pantau perkembangan
                    <span>peserta didik</span>
                    dengan mudah.
                </h1>

                <p class="left-description">
                    Selamat datang di EKSPLORE.
                    Wali Kelas dapat melihat rekap nilai kegiatan
                    ekstrakurikuler siswa sesuai kelas yang diampu
                    sebagai bahan referensi penilaian rapor.
                </p>

                <div class="features">
                    <div class="feature">📊 Rekap Nilai</div>
                    <div class="feature">👨‍🎓 Data Siswa</div>
                    <div class="feature">🏫 Data Kelas</div>
                    <div class="feature">📋 Laporan Ekskul</div>
                </div>

                <div class="left-footer">
                    © {{ date('Y') }} EKSPLORE — SMK Budi Bakti Ciwidey
                </div>

            </div>
        </div>

        <div class="right-side">

            <div class="login-container">

                <div class="role-badge">LOGIN WALI KELAS</div>

                <h2 class="login-title">Selamat datang!</h2>

                <p class="login-subtitle">
                    Silakan masuk menggunakan akun Wali Kelas
                    untuk melihat perkembangan ekstrakurikuler siswa.
                </p>

                @if ($errors->any())
                    <div class="error-box">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('wali-kelas.login.process') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="email">
                            Email Wali Kelas
                        </label>

                        <div class="input-wrapper">
                            <span class="input-icon">✉</span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                autocomplete="email"
                                required
                                autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">
                            Password
                        </label>

                        <div class="input-wrapper">
                            <span class="input-icon">🔒</span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                style="padding-right: 75px;"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword()"
                                id="passwordToggle"
                            >
                                Lihat
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            <span>Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit" class="login-button">
                        Masuk sebagai Wali Kelas
                    </button>

                </form>

                <div class="back-text">
                    Bukan akun Wali Kelas?
                    <a href="{{ route('login') }}">Login sebagai Siswa</a>
                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const button = document.getElementById('passwordToggle');

            if (password.type === 'password') {
                password.type = 'text';
                button.textContent = 'Sembunyikan';
            } else {
                password.type = 'password';
                button.textContent = 'Lihat';
            }
        }
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

</body>
</html>
