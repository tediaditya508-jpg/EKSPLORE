
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Terjadi Kesalahan | EKSPLORE</title>

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
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(37, 99, 235, .09);
        }

        .brand {
            color: #2563eb;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 35px;
        }

        .number {
            color: #2563eb;
            font-size: clamp(100px, 22vw, 165px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -10px;
            text-shadow: 0 10px 25px rgba(37, 99, 235, .12);
        }

        .badge {
            display: inline-block;
            margin-top: 15px;
            padding: 9px 16px;
            color: #92400e;
            background: #fef3c7;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        h1 {
            margin: 25px 0 12px;
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
            color: #fff;
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

        
.causes {
    max-width: 440px;
    margin: 25px auto 0;
    padding: 20px;
    text-align: left;
    background: #eff6ff;
    border: 1px solid #dbeafe;
    border-radius: 15px;
}

.causes h3 {
    margin-bottom: 12px;
    color: #1d4ed8;
    font-size: 14px;
}

.causes ul {
    padding-left: 20px;
    color: #475569;
    font-size: 12px;
    line-height: 2;
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

        <div class="number">500</div>
        <div class="badge">Server Error</div>

        <h1>Terjadi Kesalahan Server</h1>

        
<p class="description">
    Maaf, sistem EKSPLORE sedang mengalami gangguan
    saat memproses permintaanmu. Silakan coba kembali
    beberapa saat lagi.
</p>

<div class="causes">
    <h3>Kemungkinan Penyebab Gangguan</h3>
    <ul>
        
<li>Sistem sedang mengalami gangguan saat memproses permintaan.</li>
<li>Terjadi kendala dalam memuat informasi.</li>
<li>Beberapa layanan EKSPLORE belum dapat digunakan sementara.</li>
<li>Proses penyimpanan data belum berhasil diselesaikan.</li>
<li>Sistem membutuhkan waktu untuk memulihkan layanan.</li>

    </ul>
</div>


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