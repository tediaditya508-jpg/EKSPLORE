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
            font-family: var(--font-sans);
            background: #f8fafc;
            color: #1e293b;
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

        .gambar-detail {
            width: 100%;
            height: 300px;
            margin-bottom: 25px;
            border-radius: 14px;
            overflow: hidden;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 80px;
        }

        .gambar-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            color: #64748b;
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

        .btn-disabled {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #e2e8f0;
            color: #64748b;
            border-radius: 10px;
            font-weight: bold;
            cursor: not-allowed;
        }

        .btn-success {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #16a34a;
            color: #ffffff;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-waiting {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 10px;
            font-weight: bold;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        @media (max-width: 600px) {
            .info {
                grid-template-columns: 1fr;
            }

            .gambar-detail {
                height: 220px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

<div class="container">

    <a href="{{ route('ekskul.index') }}" class="back">
        ← Kembali ke Daftar Ekskul
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card">

        {{-- GAMBAR EKSTRAKURIKULER --}}
        <div class="gambar-detail">

            @if (!empty($ekskul->gambar))

                <img
                    src="{{ asset('storage/' . $ekskul->gambar) }}"
                    alt="{{ $ekskul->nama_ekskul }}"
                >

            @else

                🎯

            @endif

        </div>

        <div class="header">

            <h1>
                {{ $ekskul->nama_ekskul }}
            </h1>

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

        @if ($sudahAnggota)
            <span class="btn-success">✓ Sudah Diikuti</span>
        @elseif ($pendaftaranTerakhir && $pendaftaranTerakhir->status === 'menunggu')
            <span class="btn-waiting">⏳ Menunggu Verifikasi</span>
        @elseif ($pendaftaranTerakhir && $pendaftaranTerakhir->status === 'diterima')
            <span class="btn-success">✓ Pendaftaran Diterima</span>
        @elseif ($jumlahEkskulAktif >= 2)
            <span class="btn-disabled">Batas Maksimal 2 Ekskul</span>
        @else
            <a
                href="{{ route('pendaftaran.create', $ekskul->id) }}"
                class="btn"
            >
                Daftar Ekskul
            </a>
        @endif

    </div>

</div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>
</html>