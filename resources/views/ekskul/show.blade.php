<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ekskul->nama_ekskul }} - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
            line-height: 1.6;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .info-box {
            background: #f8fafc;
            padding: 18px;
            border-radius: 12px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 6px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        @media (max-width: 600px) {
            .info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('ekskul.index') }}" class="back">
        ← Kembali ke Daftar Ekskul
    </a>

    <div class="card">

        <div class="header">
            <h1>{{ $ekskul->nama_ekskul }}</h1>

            <p>
                {{ $ekskul->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.' }}
            </p>
        </div>

        <div class="info">

            <div class="info-box">
                <strong>📅 Jadwal</strong>
                {{ $ekskul->jadwal ?? 'Belum ditentukan' }}
            </div>

            <div class="info-box">
                <strong>⏰ Jam</strong>
                {{ $ekskul->jam ?? 'Belum ditentukan' }}
            </div>

            <div class="info-box">
                <strong>📍 Lokasi</strong>
                {{ $ekskul->lokasi ?? 'Belum ditentukan' }}
            </div>

            <div class="info-box">
                <strong>👥 Kuota</strong>
                {{ $ekskul->kuota ?? 0 }} siswa
            </div>

            <div class="info-box">
                <strong>📋 Persyaratan</strong>
                {{ $ekskul->persyaratan ?? 'Tidak ada persyaratan khusus.' }}
            </div>

        </div>

        <a href="{{ route('pendaftaran.create', $ekskul->id) }}" class="btn">
            Daftar Ekskul
        </a>

    </div>

</div>

</body>
</html>