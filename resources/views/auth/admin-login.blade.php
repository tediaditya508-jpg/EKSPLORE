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
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
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
            background: #334155;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
        }

        .logo h1 {
            color: #1e293b;
            font-size: 28px;
        }

        .logo p {
            color: #64748b;
            margin-top: 6px;
            font-size: 14px;
        }

        .role {
            text-align: center;
            background: #f1f5f9;
            color: #334155;
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
            border-color: #334155;
            box-shadow: 0 0 0 3px rgba(51, 65, 85, 0.12);
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
            background: #334155;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #1e293b;
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
            color: #334155;
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
            Login Administrator
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Admin</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email admin"
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
                Masuk sebagai Admin
            </button>
        </form>

        <div class="or">
            <span>atau</span>
        </div>

        <a href="{{ route('admin.google.login') }}" class="google-btn">
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