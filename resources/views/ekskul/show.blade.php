<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ekskul->nama_ekskul }} - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --warning: #d97706;
            --warning-soft: #fffbeb;
            --warning-border: #fde68a;
            --danger: #dc2626;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
            color: #ffffff;
            padding: 60px 24px 80px;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(6, 182, 212, 0.3) 0%, transparent 40%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #93c5fd;
            margin-bottom: 16px;
            backdrop-filter: blur(8px);
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 10px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1000px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 700;
            font-size: 13.5px;
            background: white;
            padding: 8px 16px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .back:hover {
            background: var(--primary-soft);
            transform: translateY(-2px);
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        /* GAMBAR DETAIL */
        .gambar-detail {
            width: 100%;
            height: 340px;
            margin-bottom: 28px;
            border-radius: 18px;
            overflow: hidden;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
        }

        .gambar-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gambar-detail:hover img {
            transform: scale(1.03);
        }

        /* HEADER INFO EKSKUL */
        .header {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .header h2 {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .header p {
            color: var(--text-muted);
            line-height: 1.7;
            font-size: 14.5px;
        }

        /* INFO GRID */
        .info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 30px;
        }

        .info-box {
            background: #f8fafc;
            padding: 18px 20px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .info-box:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
        }

        .info-box strong {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 6px;
            font-weight: 700;
        }

        .info-box span {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* TOMBOL AKSI & STATUS */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 15px 24px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            text-decoration: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px -4px rgba(37, 99, 235, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.45);
        }

        .btn-disabled {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 15px 24px;
            background: #f1f5f9;
            color: var(--text-muted);
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            border: 1px solid var(--border-color);
            cursor: not-allowed;
        }

        .btn-success {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 15px 24px;
            background: var(--success-soft);
            color: #15803d;
            border: 1px solid var(--success-border);
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
        }

        .btn-waiting {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 15px 24px;
            background: var(--warning-soft);
            color: var(--warning);
            border: 1px solid var(--warning-border);
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
        }

        /* ALERTS */
        .alert {
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
        }

        .alert-error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .card { padding: 22px; }
            .info { grid-template-columns: 1fr; }
            .gambar-detail { height: 220px; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                Informasi Detail Ekstrakurikuler
            </div>
            <h1>Profil <span>{{ $ekskul->nama_ekskul }}</span></h1>
            <p>Kenali lebih dekat program latihan, jadwal, serta persyaratan untuk bergabung dengan ekstrakurikuler pilihanmu di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <div class="container">

        <a href="{{ route('ekskul.index') }}" class="back">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Daftar Ekskul
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>{{ $errors->first() }}</span>
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
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><circle cx="12" cy="11" r="3"/></svg>
                @endif
            </div>

            <div class="header">
                <h2>{{ $ekskul->nama_ekskul }}</h2>
                <p>
                    {{ $ekskul->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.' }}
                </p>
            </div>

            <div class="info">

                <div class="info-box">
                    <strong>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        Jadwal Latihan
                    </strong>
                    <span>{{ $ekskul->jadwal ?? 'Belum ditentukan' }}</span>
                </div>

                <div class="info-box">
                    <strong>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Jam Kegiatan
                    </strong>
                    <span>{{ $ekskul->jam ?? 'Belum ditentukan' }}</span>
                </div>

                <div class="info-box">
                    <strong>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Lokasi / Tempat
                    </strong>
                    <span>{{ $ekskul->lokasi ?? 'Belum ditentukan' }}</span>
                </div>

                <div class="info-box">
                    <strong>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Kuota Anggota
                    </strong>
                    <span>{{ $ekskul->kuota ?? 0 }} Siswa</span>
                </div>

                <div class="info-box" style="grid-column: 1 / -1;">
                    <strong>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                        Persyaratan Khusus
                    </strong>
                    <span>{{ $ekskul->persyaratan ?? 'Tidak ada persyaratan khusus.' }}</span>
                </div>

            </div>

            @if ($sudahAnggota)
                <span class="btn-success">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    Sudah Diikuti
                </span>
            @elseif ($pendaftaranTerakhir && $pendaftaranTerakhir->status === 'menunggu')
                <span class="btn-waiting">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Menunggu Verifikasi Pembina
                </span>
            @elseif ($pendaftaranTerakhir && $pendaftaranTerakhir->status === 'diterima')
                <span class="btn-success">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    Pendaftaran Diterima
                </span>
            @elseif ($jumlahEkskulAktif >= 2)
                <span class="btn-disabled">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" x2="19.07" y1="4.93" y2="19.07"/></svg>
                    Batas Maksimal Mengikuti 2 Ekskul
                </span>
            @else
                <a
                    href="{{ route('pendaftaran.create', $ekskul->id) }}"
                    class="btn"
                >
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Daftar Ekstrakurikuler Ini
                </a>
            @endif

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>