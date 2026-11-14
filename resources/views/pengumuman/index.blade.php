<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --siswa-primary: #1e40af;
            --siswa-primary-dark: #1e3a8a;
            --siswa-accent: #3b82f6;
            --siswa-soft: #eff6ff;
            --siswa-border: #bfdbfe;
            --bg-body: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-sans);
        }

        body {
            background: var(--bg-body);
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION SISWA
        ========================= */
        .siswa-hero {
            position: relative;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 48%, #1e40af 100%);
            color: #ffffff;
            padding: 56px 28px 92px;
            overflow: hidden;
        }

        .siswa-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 22%, rgba(96, 165, 250, 0.35) 0%, transparent 42%),
                radial-gradient(circle at 88% 75%, rgba(147, 197, 253, 0.28) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.26);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            color: #dbeafe;
            margin-bottom: 14px;
            backdrop-filter: blur(8px);
        }

        .hero-text h1 {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -0.6px;
            margin-bottom: 8px;
        }

        .hero-text h1 span {
            background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text p {
            font-size: 14.5px;
            color: #cbd5e1;
            max-width: 580px;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1100px;
            margin: -50px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           KPI SUMMARY CARDS
        ========================= */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .kpi-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 20px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease;
        }

        .kpi-card:hover {
            transform: translateY(-2px);
        }

        .kpi-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .kpi-indigo { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }
        .kpi-violet { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }

        .kpi-info span {
            display: block;
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .kpi-info strong {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-dark);
        }

        /* =========================
           TOOLBAR & LIVE SEARCH
        ========================= */
        .toolbar-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 18px 24px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            box-shadow: 0 8px 24px -8px rgba(15, 23, 42, 0.05);
        }

        .toolbar-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .toolbar-title svg {
            color: var(--siswa-primary);
        }

        .search-wrapper {
            position: relative;
            width: 320px;
            max-width: 100%;
        }

        .search-wrapper svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 11px 16px 11px 40px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--text-dark);
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-input:focus {
            background: #ffffff;
            border-color: var(--siswa-primary);
            box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.12);
        }

        /* =========================
           ANNOUNCEMENT LIST & CARDS
        ========================= */
        .announcement-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .announcement-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease;
        }

        .announcement-card:hover {
            transform: translateY(-2px);
        }

        .announcement-title {
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .meta-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }

        .announcement-ekskul {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 50px;
            background: #eff6ff;
            color: var(--siswa-primary);
            border: 1px solid #bfdbfe;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .announcement-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: #f8fafc;
            color: #475569;
            border: 1px solid #cbd5e1;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
        }

        .announcement-pembina {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .announcement-content {
            color: #475569;
            line-height: 1.7;
            white-space: pre-line;
            overflow-wrap: anywhere;
            font-size: 14.5px;
        }

        /* =========================
           EMPTY STATE
        ========================= */
        .empty {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 60px 20px;
            text-align: center;
            color: var(--text-muted);
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
        }

        .empty-icon-box {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: var(--siswa-soft);
            color: var(--siswa-primary);
            border: 1px solid var(--siswa-border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .empty h3 {
            color: var(--text-dark);
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .empty p {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .siswa-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .kpi-grid { grid-template-columns: 1fr; }
            .toolbar-card { flex-direction: column; align-items: flex-start; }
            .search-wrapper { width: 100%; }
            .announcement-card { padding: 22px; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $totalPengumuman = isset($pengumuman) ? $pengumuman->count() : 0;
    @endphp

    <!-- HERO SECTION SISWA -->
    <section class="siswa-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    Pusat Informasi & Mading Sekolah
                </div>
                <h1>Semua <span>Pengumuman</span></h1>
                <p>Informasi terbaru, pengumuman resmi, dan agenda penting kegiatan ekstrakurikuler sekolah untuk kamu.</p>
            </div>
        </div>
    </section>

    <main class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Pengumuman</span>
                    <strong>{{ $totalPengumuman }} Berita</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Status Mading</span>
                    <strong>Aktif & Terupdate</strong>
                </div>
            </div>
        </section>

        <!-- TOOLBAR & LIVE SEARCH -->
        <div class="toolbar-card">
            <div class="toolbar-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                Daftar Pengumuman Aktif
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchPengumumanSiswaInput" class="search-input" placeholder="Cari judul, ekskul, isi...">
            </div>
        </div>

        <div class="announcement-list" id="pengumumanSiswaList">
            @forelse ($pengumuman as $item)
                @php
                    $judul = $item->judul ?? '-';
                    $namaEkskul = $item->ekstrakurikuler?->nama_ekskul ?? 'Umum';
                    $namaPembina = $item->ekstrakurikuler?->pembina?->name ?? 'Belum ditentukan';
                    $tgl = $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-';
                    $isi = $item->isi ?? '-';
                    $searchHaystack = strtolower($judul . ' ' . $namaEkskul . ' ' . $namaPembina . ' ' . $tgl . ' ' . $isi);
                @endphp

                <div class="announcement-card" data-search="{{ $searchHaystack }}">
                    <!-- JUDUL -->
                    <h2 class="announcement-title">
                        {{ $judul }}
                    </h2>

                    <div class="meta-badges">
                        <!-- EKSTRAKURIKULER -->
                        <span class="announcement-ekskul">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                            {{ $namaEkskul }}
                        </span>

                        <!-- TANGGAL -->
                        <span class="announcement-date">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            {{ $tgl }}
                        </span>
                    </div>

                    <!-- PEMBINA -->
                    <div class="announcement-pembina">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Pembina: {{ $namaPembina }}
                    </div>

                    <!-- ISI -->
                    <p class="announcement-content">
                        {{ $isi }}
                    </p>
                </div>

            @empty

                <div class="empty">
                    <div class="empty-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <h3>Belum Ada Pengumuman</h3>
                    <p>Saat ini belum ada pengumuman atau informasi terbaru yang tersedia.</p>
                </div>

            @endforelse
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPengumumanSiswaInput');
            const cards = document.querySelectorAll('#pengumumanSiswaList .announcement-card');

            if (searchInput && cards.length > 0) {
                searchInput.addEventListener('input', function () {
                    const keyword = this.value.toLowerCase().trim();
                    cards.forEach(card => {
                        const haystack = card.getAttribute('data-search') || '';
                        card.style.display = haystack.includes(keyword) ? '' : 'none';
                    });
                });
            }
        });
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>