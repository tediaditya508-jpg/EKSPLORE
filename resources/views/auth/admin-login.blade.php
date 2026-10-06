<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f3f6fb;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 25px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1080px;
            min-height: 650px;

            background: #ffffff;

            border-radius: 24px;

            overflow: hidden;

            display: grid;
            grid-template-columns: 1fr 1fr;

            box-shadow:
                0 20px 60px rgba(15, 23, 42, 0.12);
        }

        /* =========================
           LEFT SIDE
        ========================= */

        .left-side {
            position: relative;

            background:
                linear-gradient(
                    145deg,
                    #eef2ff 0%,
                    #e0e7ff 48%,
                    #f8faff 100%
                );

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

            background: rgba(79, 70, 229, 0.07);

            top: -100px;
            left: -80px;
        }

        .circle-two {
            position: absolute;

            width: 320px;
            height: 320px;

            border-radius: 50%;

            background: rgba(99, 102, 241, 0.06);

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

        /* =========================
           BRAND
        ========================= */

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

            background: #4338ca;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
            font-weight: 800;

            box-shadow:
                0 8px 20px rgba(67, 56, 202, 0.22);
        }

        .brand-name {
            font-size: 26px;

            font-weight: 800;

            letter-spacing: 0.5px;

            color: #1e1b4b;
        }

        /* =========================
           LOGO
        ========================= */

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

            filter:
                drop-shadow(
                    0 10px 20px rgba(15, 23, 42, 0.08)
                );
        }

        /* =========================
           TEXT
        ========================= */

        .left-title {
            font-size: 31px;

            line-height: 1.18;

            color: #1e1b4b;

            margin-top: 3px;

            margin-bottom: 13px;

            max-width: 430px;
        }

        .left-title span {
            color: #4338ca;
        }

        .left-description {
            color: #5f6689;

            font-size: 14px;

            line-height: 1.7;

            max-width: 440px;

            margin-bottom: 18px;
        }

        /* =========================
           FITUR ADMIN
        ========================= */

        .features {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;

            margin-top: 3px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.72);

            border: 1px solid rgba(99, 102, 241, 0.16);

            border-radius: 20px;

            padding: 7px 12px;

            color: #373579;

            font-size: 11px;

            font-weight: 600;

            backdrop-filter: blur(5px);
        }

        /* =========================
           FOOTER
        ========================= */

        .left-footer {
            position: relative;

            z-index: 2;

            margin-top: auto;

            padding-top: 15px;

            color: #64748b;

            font-size: 12px;
        }

        /* =========================
           RIGHT SIDE
        ========================= */

        .right-side {
            background: #ffffff;

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

        /* =========================
           ROLE
        ========================= */

        .role-badge {
            display: inline-block;

            background: #eef2ff;

            color: #4338ca;

            border: 1px solid #c7d2fe;

            border-radius: 20px;

            padding: 6px 12px;

            font-size: 11px;

            font-weight: 700;

            margin-bottom: 18px;
        }

        /* =========================
           ERROR
        ========================= */

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

        /* =========================
           INPUT
        ========================= */

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

            background: #ffffff;

            padding: 0 15px 0 43px;

            color: #1e293b;

            font-size: 14px;

            outline: none;

            transition: 0.2s ease;
        }

        .form-input:focus {
            border-color: #4338ca;

            box-shadow:
                0 0 0 3px rgba(67, 56, 202, 0.10);
        }

        .form-input::placeholder {
            color: #a1aab8;
        }

        /* =========================
           PASSWORD
        ========================= */

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
            color: #4338ca;
        }

        /* =========================
           OPTIONS
        ========================= */

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
            accent-color: #4338ca;
        }

        /* =========================
           LOGIN BUTTON
        ========================= */

        .login-button {
            width: 100%;

            height: 49px;

            border: none;

            border-radius: 10px;

            background: #4338ca;

            color: white;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s ease;

            box-shadow:
                0 8px 20px rgba(67, 56, 202, 0.20);
        }

        .login-button:hover {
            background: #3730a3;

            transform: translateY(-1px);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* =========================
           DIVIDER
        ========================= */

        .divider {
            display: flex;

            align-items: center;

            gap: 12px;

            margin: 21px 0;

            color: #94a3b8;

            font-size: 11px;
        }

        .divider::before,
        .divider::after {
            content: "";

            flex: 1;

            height: 1px;

            background: #e2e8f0;
        }

        /* =========================
           GOOGLE
        ========================= */

        .google-button {
            width: 100%;

            height: 49px;

            border: 1px solid #dbe2ea;

            border-radius: 10px;

            background: white;

            color: #334155;

            text-decoration: none;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;
        }

        .google-button:hover {
            background: #f8fafc;

            border-color: #cbd5e1;
        }

        .google-icon {
            font-size: 17px;

            font-weight: 800;

            color: #4285f4;
        }

        /* =========================
           BACK
        ========================= */

        .back-text {
            text-align: center;

            color: #64748b;

            font-size: 12px;

            margin-top: 23px;
        }

        .back-text a {
            color: #4338ca;

            text-decoration: none;

            font-weight: 700;
        }

        .back-text a:hover {
            text-decoration: underline;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 850px) {

            body {
                padding: 15px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;

                max-width: 520px;

                min-height: auto;
            }

            .left-side {
                min-height: 570px;

                padding: 35px;
            }

            .logo-area img {
                width: 170px;
                height: 170px;
            }

            .left-title {
                font-size: 28px;
            }

            .right-side {
                padding: 45px 35px;
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
                min-height: 520px;

                padding: 30px 25px;
            }

            .logo-area img {
                width: 145px;
                height: 145px;
            }

            .left-title {
                font-size: 26px;
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

        {{-- =========================
             LEFT SIDE
        ========================= --}}

        <div class="left-side">

            <div class="circle-one"></div>
            <div class="circle-two"></div>

            <div class="left-content">

                {{-- BRAND --}}

                <div class="brand">

                    <div class="brand-icon">
                        E
                    </div>

                    <div class="brand-name">
                        EKSPLORE
                    </div>

                </div>


                {{-- LOGO EKSPLORE --}}

                <div class="logo-area">

                    <img
                        src="{{ asset('images/logo-ekspore.png') }}"
                        alt="Logo EKSPLORE"
                    >

                </div>


                {{-- KATA-KATA ADMIN --}}

                <h1 class="left-title">

                    Kelola sistem
                    <span>EKSPLORE</span>
                    dengan mudah.

                </h1>


                <p class="left-description">

                    Selamat datang di EKSPLORE.
                    Kelola pengguna, ekstrakurikuler,
                    pendaftaran, jadwal, pengumuman,
                    prestasi, dan berbagai data sekolah
                    melalui panel Administrator.

                </p>


                {{-- FITUR ADMIN --}}

                <div class="features">

                    <div class="feature">
                        👥 Pengguna
                    </div>

                    <div class="feature">
                        🏫 Ekstrakurikuler
                    </div>

                    <div class="feature">
                        📋 Pendaftaran
                    </div>

                    <div class="feature">
                        📅 Jadwal
                    </div>

                    <div class="feature">
                        📢 Pengumuman
                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="left-footer">

                    © {{ date('Y') }}
                    EKSPLORE — SMK Budi Bakti Ciwidey

                </div>

            </div>

        </div>


        {{-- =========================
             RIGHT SIDE
        ========================= --}}

        <div class="right-side">

            <div class="login-container">

                <div class="role-badge">
                    LOGIN ADMINISTRATOR
                </div>

                <h2 class="login-title">
                    Selamat datang kembali!
                </h2>

                <p class="login-subtitle">
                    Silakan masuk menggunakan akun Administrator
                    untuk mengelola sistem EKSPLORE.
                </p>


                {{-- ERROR --}}

                @if ($errors->any())

                    <div class="error-box">

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- LOGIN FORM --}}

                <form
                    method="POST"
                    action="{{ url('/admin/login') }}"
                >

                    @csrf


                    {{-- EMAIL --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="email"
                        >
                            Email Admin
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email admin"
                                autocomplete="email"
                                required
                                autofocus
                            >

                        </div>

                    </div>


                    {{-- PASSWORD --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="password"
                        >
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔒
                            </span>

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


                    {{-- OPTIONS --}}

                    <div class="form-options">

                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>
                                Ingat saya
                            </span>

                        </label>

                    </div>


                    {{-- LOGIN --}}

                    <button
                        type="submit"
                        class="login-button"
                    >
                        Masuk sebagai Admin
                    </button>

                </form>


                {{-- DIVIDER --}}

                <div class="divider">
                    atau
                </div>


                {{-- GOOGLE LOGIN --}}

                <a
                    href="{{ route('admin.google.login') }}"
                    class="google-button"
                >

                    <span class="google-icon">
                        G
                    </span>

                    <span>
                        Masuk dengan Google
                    </span>

                </a>


                {{-- KEMBALI --}}

                <div class="back-text">

                    Bukan akun Admin?

                    <a href="{{ route('login') }}">
                        Login sebagai Siswa
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- PASSWORD SCRIPT --}}

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const button =
                document.getElementById('passwordToggle');

            if (password.type === 'password') {

                password.type = 'text';

                button.textContent = 'Sembunyikan';

            } else {

                password.type = 'password';

                button.textContent = 'Lihat';

            }

        }

    </script>

</body>

</html>