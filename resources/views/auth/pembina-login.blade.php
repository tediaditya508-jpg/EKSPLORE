<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pembina - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eef4ff, #dbeafe);
        }

        .container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-circle {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
        }

        .logo h1 {
            color: #1e3a8a;
            font-size: 28px;
        }

        .logo p {
            color: #64748b;
            margin-top: 6px;
            font-size: 14px;
        }

        .role {
            text-align: center;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .error {
            background: #fef2f2;
            color: #dc2626;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #1d4ed8;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background: white;
            color: #334155;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .google-btn:hover {
            background: #f8fafc;
        }

        .google-icon {
            font-size: 18px;
            font-weight: bold;
        }

        .or {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .or::before,
        .or::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            color: #2563eb;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">

        <div class="logo">
            <div class="logo-circle">E</div>
            <h1>EKSPLORE</h1>
            <p>Ekstrakurikuler Sekolah</p>
        </div>

        <div class="role">
            Login Pembina
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/pembina/login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Pembina</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email pembina"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="login-btn">
                Masuk sebagai Pembina
            </button>
        </form>

        <div class="or">
            <span>atau</span>
        </div>

        <a href="{{ route('pembina.google.login') }}" class="google-btn">
            <span class="google-icon">G</span>
            Masuk dengan Google
        </a>

        <a href="{{ route('login') }}" class="back">
            ← Kembali ke Login Siswa
        </a>

    </div>
</div>

</body>
</html>
