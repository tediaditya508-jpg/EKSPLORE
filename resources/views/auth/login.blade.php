<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Siswa - EKSPLORE</title>

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
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .login-card {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            color: #2563eb;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .logo p {
            color: #6b7280;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        /* PASSWORD */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);

            width: 35px;
            height: 35px;

            padding: 0;
            border: none;
            background: transparent;

            color: #6b7280;
            font-size: 19px;

            cursor: pointer;
        }

        .toggle-password:hover {
            background: transparent;
            color: #2563eb;
        }

        /* ERROR */

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 6px;
        }

        /* LOGIN BUTTON */

        .login-button {
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

        .login-button:hover {
            background: #1d4ed8;
        }

        /* GOOGLE BUTTON */

        .google-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            width: 100%;
            padding: 13px;
            margin-top: 12px;

            border: 1px solid #d1d5db;
            border-radius: 10px;

            background: white;
            color: #374151;

            font-size: 15px;
            font-weight: bold;

            text-align: center;
            text-decoration: none;

            cursor: pointer;
            transition: 0.2s;
        }

        .google-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .google-icon {
            font-size: 18px;
        }

        /* FOOTER */

        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #9ca3af;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <!-- LOGO -->

        <div class="logo">
            <h1>EKSPLORE</h1>
            <p>Login Siswa</p>
        </div>


        <!-- FORM LOGIN EMAIL -->

        <form action="{{ route('login') }}" method="POST">

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email dengan benar"
                    required
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password dengan benar"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                        aria-label="Tampilkan password"
                    >
                        👁️
                    </button>

                </div>

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- LOGIN -->

            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        <!-- GOOGLE LOGIN -->

        <a
            href="{{ route('google.login') }}"
            class="google-button"
        >
            <span class="google-icon">G</span>
            <span>Lanjutkan dengan Google</span>
        </a>


        <!-- FOOTER -->

        <div class="footer-text">
            Sistem Ekstrakurikuler SMK Budi Bakti Ciwidey
        </div>

    </div>


    <!-- JAVASCRIPT -->

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const button =
                document.querySelector('.toggle-password');


            if (password.type === 'password') {

                password.type = 'text';

                button.textContent = '🙈';

                button.setAttribute(
                    'aria-label',
                    'Sembunyikan password'
                );

            } else {

                password.type = 'password';

                button.textContent = '👁️';

                button.setAttribute(
                    'aria-label',
                    'Tampilkan password'
                );

            }

        }

    </script>

</body>

</html>