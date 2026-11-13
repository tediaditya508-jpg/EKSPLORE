<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler Saya - EKSPLORE</title>

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
           HERO SECTION (KHUSUS PEMBINA - EMERALD THEME)
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

        /* =========================
           GRID KARTU EKSKUL
        ========================= */
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -12px rgba(4, 120, 87, 0.15);
            border-color: #a7f3d0;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            margin-bottom: 16px;
            width: fit-content;
            border: 1px solid var(--emerald-border);
        }

        .card h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 20px;
            letter-spacing: -0.3px;
        }

        /* DETAIL LIST */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 20px;
        }

        .info {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #475569;
            font-size: 14px;
            line-height: 1.5;
        }

        .info svg {
            color: var(--primary-emerald);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info strong {
            color: var(--text-dark);
            font-weight: 700;
        }

        .description-box {
            background: #f8fafc;
            padding: 16px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
        }

        .description-box strong {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .description {
            color: #475569;
            font-size: 13.5px;
            line-height: 1.6;
        }

        /* STATS BOX */
        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .stat {
            background: #f8fafc;
            padding: 16px;
            border-radius: 16px;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .stat-number {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary-emerald);
            margin-bottom: 4px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* EMPTY STATE */
        .empty {
            background: white;
            padding: 60px 20px;
            border-radius: 24px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
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

        .empty h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .empty p {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .grid { grid-template-columns: 1fr; }
            .stats { grid-template-columns: repeat(2, 1fr); }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Panel Hak Akses Pembina
            </div>
            <h1>Ekstrakurikuler <span>Binaan Anda</span></h1>
            <p>Halo, {{ $pembina->name }}. Pantau informasi jadwal, kuota, serta perkembangan anggota aktif ekstrakurikuler di bawah pembinaan Anda.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        @if ($ekskul->count() > 0)

            <section class="grid">

                @foreach ($ekskul as $item)

                    <div class="card">

                        <div>
                            <span class="badge">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                EKSKUL BINAAN UTAMA
                            </span>

                            <h2>{{ $item->nama_ekskul }}</h2>
                        </div>

                        <div class="info-list">
                            <div class="info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <div><strong>Pembina:</strong> {{ $pembina->name }}</div>
                            </div>

                            @if ($item->lokasi)
                                <div class="info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <div><strong>Lokasi:</strong> {{ $item->lokasi }}</div>
                                </div>
                            @endif

                            @if ($item->jadwal)
                                <div class="info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    <div><strong>Jadwal:</strong> {{ $item->jadwal }}</div>
                                </div>
                            @endif

                            @if ($item->jam)
                                <div class="info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <div><strong>Jam Latihan:</strong> {{ $item->jam }}</div>
                                </div>
                            @endif

                            @if ($item->persyaratan)
                                <div class="info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                                    <div><strong>Persyaratan:</strong> {{ $item->persyaratan }}</div>
                                </div>
                            @endif
                        </div>

                        @if ($item->deskripsi)
                            <div class="description-box">
                                <strong>Deskripsi Kegiatan</strong>
                                <p class="description">{{ $item->deskripsi }}</p>
                            </div>
                        @endif

                        <div class="stats">
                            <div class="stat">
                                <div class="stat-number">{{ $item->anggota->count() }}</div>
                                <div class="stat-label">Anggota Aktif</div>
                            </div>

                            <div class="stat">
                                <div class="stat-number">{{ $item->kuota ?? '-' }}</div>
                                <div class="stat-label">Total Kuota</div>
                            </div>
                        </div>

                    </div>

                @endforeach

            </section>

        @else

            <section class="empty">
                <div class="empty-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </div>
                <h2>Belum Ada Ekstrakurikuler</h2>
                <p>Saat ini belum ada data ekstrakurikuler yang ditugaskan atau berada di bawah pembinaan Anda.</p>
            </section>

        @endif

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>