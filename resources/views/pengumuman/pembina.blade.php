<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Pembina - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary-emerald: #047857;
            --primary-emerald-hover: #065f46;
            --emerald-soft: #ecfdf5;
            --emerald-border: #a7f3d0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --danger: #dc2626;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION (PEMBINA EMERALD THEME)
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #065f46 0%, #047857 50%, #10b981 100%);
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
                radial-gradient(circle at 15% 20%, rgba(16, 185, 129, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(4, 120, 87, 0.3) 0%, transparent 40%);
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
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #a7f3d0;
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
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1100px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* HEADER SECTION */
        .header {
            background: white;
            border-radius: 24px;
            padding: 30px 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .header h2 {
            margin: 0 0 6px;
            font-size: 22px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .header p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary-emerald);
            color: white;
            box-shadow: 0 4px 14px rgba(4, 120, 87, 0.25);
        }

        .btn-primary:hover {
            background: var(--primary-emerald-hover);
            transform: translateY(-2px);
        }

        /* ALERTS */
        .alert {
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.1);
        }

        .alert-error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        /* CARD PENGUMUMAN */
        .card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 20px 40px -12px rgba(4, 120, 87, 0.1);
        }

        .card h3 {
            margin: 0 0 12px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .ekskul-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            border: 1px solid var(--emerald-border);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .tanggal {
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .isi {
            line-height: 1.7;
            white-space: pre-line;
            color: #475569;
            font-size: 14.5px;
        }

        .gambar {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
            border-radius: 16px;
            margin-top: 20px;
            border: 1px solid var(--border-color);
        }

        .empty {
            background: white;
            border-radius: 24px;
            text-align: center;
            padding: 60px 20px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--emerald-soft);
            color: var(--primary-emerald);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .empty h3 {
            font-size: 19px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .empty p {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 700px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 22px;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
            .card { padding: 22px; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION (PEMBINA EMERALD THEME) -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                Panel Pengumuman Pembina
            </div>
            <h1>Kelola <span>Pengumuman</span></h1>
            <p>Buat dan bagikan informasi penting atau pemberitahuan kegiatan ekstrakurikuler kepada seluruh siswa binaan Anda di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <div class="container">

        <div class="header">
            <div>
                <h2>Daftar Pengumuman Aktif</h2>
                <p>Pemberitahuan agenda dan informasi kegiatan ekskul.</p>
            </div>

            <a href="{{ route('pembina.pengumuman.create') }}" class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Tambah Pengumuman
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-top: 4px; padding-left: 18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @forelse($pengumuman as $item)

            <div class="card">
                <div class="ekskul-tag">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                    {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekskul tidak tersedia' }}
                </div>

                <h3>{{ $item->judul }}</h3>

                <div class="tanggal">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                </div>

                <div class="isi">
                    {{ $item->isi }}
                </div>

                @if($item->gambar)
                    <img
                        src="{{ $item->gambar }}"
                        alt="{{ $item->judul }}"
                        class="gambar"
                    >
                @endif
            </div>

        @empty

            <div class="empty">
                <div class="empty-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </div>
                <h3>Belum Ada Pengumuman</h3>
                <p>Belum ada pengumuman kegiatan ekstrakurikuler yang dibagikan saat ini.</p>

                <a href="{{ route('pembina.pengumuman.create') }}" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Tambah Pengumuman Baru
                </a>
            </div>

        @endforelse

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>