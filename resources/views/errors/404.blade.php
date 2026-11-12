
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | EKSPLORE</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #eff6ff, #f8fafc);
            color: #1e293b;
        }

        .container {
            width: 100%;
            max-width: 650px;
            padding: 55px 35px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.09);
        }

        .brand {
            color: #2563eb;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 35px;
        }

        .illustration {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .number {
            color: #2563eb;
            font-size: clamp(100px, 22vw, 165px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -12px;
            text-shadow: 0 10px 25px rgba(37, 99, 235, 0.12);
        }

        .badge {
            position: absolute;
            right: -15px;
            bottom: 5px;
            padding: 9px 15px;
            color: #ffffff;
            background: #f59e0b;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            transform: rotate(-8deg);
        }

        h1 {
            margin: 15px 0 12px;
            font-size: clamp(23px, 5vw, 30px);
            font-weight: 800;
        }

        .description {
            max-width: 440px;
            margin: 0 auto;
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
        }

        .actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 32px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 165px;
            padding: 14px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: #2563eb;
            box-shadow: 0 5px 15px rgba(37, 99, 235, .2);
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .btn-secondary {
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #dbeafe;
        }

        .btn-secondary:hover {
            background: #dbeafe;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
            color: #94a3b8;
            font-size: 11px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 40px 20px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>
<body>

    <main class="container">
        <div class="brand">EKSPLORE</div>

        <div class="illustration">
            <div class="number">404</div>
            <div class="badge">Oops!</div>
        </div>

        <h1>Halaman Tidak Ditemukan</h1>

        <p class="description">
            Maaf, halaman yang kamu cari tidak dapat ditemukan.
            Mungkin alamatnya salah atau halaman tersebut sudah dipindahkan.
            Yuk, kembali dan lanjutkan aktivitasmu di EKSPLORE!
        </p>

        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                Kembali ke Beranda
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} EKSPLORE — Sistem Ekstrakurikuler
        </div>
    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>
</html>