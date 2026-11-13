<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --admin-primary: #4f46e5;
            --admin-primary-dark: #3730a3;
            --admin-accent: #7c3aed;
            --admin-soft: #eef2ff;
            --admin-border: #c7d2fe;
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
           HERO SECTION ADMIN
        ========================= */
        .admin-hero {
            position: relative;
            background: linear-gradient(135deg, #1e1b4b 0%, #3730a3 48%, #6d28d9 100%);
            color: #ffffff;
            padding: 56px 28px 92px;
            overflow: hidden;
        }

        .admin-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 22%, rgba(129, 140, 248, 0.35) 0%, transparent 42%),
                radial-gradient(circle at 88% 75%, rgba(192, 132, 252, 0.28) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1200px;
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
            color: #e0e7ff;
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
            background: linear-gradient(135deg, #c7d2fe 0%, #f5d0fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text p {
            font-size: 14.5px;
            color: #cbd5e1;
            max-width: 600px;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1200px;
            margin: -50px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .section-title {
            margin-bottom: 18px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title svg {
            color: var(--admin-primary);
        }

        /* =========================
           STATISTIK CARDS (GRID)
        ========================= */
        .stats {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            border-color: var(--admin-border);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            background: var(--admin-soft);
            color: var(--admin-primary);
            border: 1px solid var(--admin-border);
        }

        .stat-card h3 {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-dark);
        }

        /* =========================
           RINGKASAN AKTIVITAS
        ========================= */
        .summary {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
        }

        .summary h2 {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .summary h2 svg {
            color: var(--admin-primary);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            transition: background 0.15s ease;
        }

        .summary-row:hover {
            background: #f8fafc;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 10px;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-value {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 14.5px;
        }

        @media (max-width: 1200px) {
            .stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .stats {
                grid-template-columns: 1fr;
            }
            .summary {
                padding: 20px;
            }
            .summary-row {
                gap: 15px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                    Pusat Analitik & Laporan Sekolah
                </div>
                <h1>Laporan <span>EKSPLORE</span></h1>
                <p>Tinjau ringkasan komprehensif data statistik, keanggotaan, serta seluruh aktivitas ekstrakurikuler dalam sistem.</p>
            </div>
        </div>
    </section>

    <div class="container">

        {{-- STATISTIK --}}
        <h2 class="section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
            Ringkasan Statistik Sistem
        </h2>

        <div class="stats">
            {{-- PENGGUNA --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Total Pengguna</h3>
                <div class="stat-number">{{ $totalPengguna ?? 0 }}</div>
            </div>

            {{-- SISWA --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <h3>Total Siswa</h3>
                <div class="stat-number">{{ $totalSiswa ?? 0 }}</div>
            </div>

            {{-- PEMBINA --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h3>Total Pembina</h3>
                <div class="stat-number">{{ $totalPembina ?? 0 }}</div>
            </div>

            {{-- EKSTRAKURIKULER --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                </div>
                <h3>Total Ekstrakurikuler</h3>
                <div class="stat-number">{{ $totalEkstrakurikuler ?? 0 }}</div>
            </div>

            {{-- PENDAFTARAN --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                </div>
                <h3>Total Pendaftaran</h3>
                <div class="stat-number">{{ $totalPendaftaran ?? 0 }}</div>
            </div>

            {{-- ANGGOTA --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <h3>Total Anggota</h3>
                <div class="stat-number">{{ $totalAnggota ?? 0 }}</div>
            </div>

            {{-- JADWAL --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <h3>Total Jadwal</h3>
                <div class="stat-number">{{ $totalJadwal ?? 0 }}</div>
            </div>

            {{-- ABSENSI --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect width="8" height="4" x="8" y="3" rx="1" ry="1"/><path d="m9 14 2 2 4-4"/></svg>
                </div>
                <h3>Total Absensi</h3>
                <div class="stat-number">{{ $totalAbsensi ?? 0 }}</div>
            </div>

            {{-- PRESTASI --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                </div>
                <h3>Total Prestasi</h3>
                <div class="stat-number">{{ $totalPrestasi ?? 0 }}</div>
            </div>

            {{-- PENGUMUMAN --}}
            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </div>
                <h3>Total Pengumuman</h3>
                <div class="stat-number">{{ $totalPengumuman ?? 0 }}</div>
            </div>
        </div>

        {{-- RINGKASAN AKTIVITAS --}}
        <div class="summary">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                Ringkasan Aktivitas Sistem
            </h2>

            <div class="summary-row">
                <span class="summary-label">Pengguna terdaftar</span>
                <span class="summary-value">{{ $totalPengguna ?? 0 }} pengguna</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Ekstrakurikuler tersedia</span>
                <span class="summary-value">{{ $totalEkstrakurikuler ?? 0 }} ekskul</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Pendaftaran siswa</span>
                <span class="summary-value">{{ $totalPendaftaran ?? 0 }} pendaftaran</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Anggota ekstrakurikuler</span>
                <span class="summary-value">{{ $totalAnggota ?? 0 }} anggota</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Jadwal ekstrakurikuler</span>
                <span class="summary-value">{{ $totalJadwal ?? 0 }} jadwal</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Data absensi</span>
                <span class="summary-value">{{ $totalAbsensi ?? 0 }} data</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Prestasi ekstrakurikuler</span>
                <span class="summary-value">{{ $totalPrestasi ?? 0 }} prestasi</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Pengumuman</span>
                <span class="summary-value">{{ $totalPengumuman ?? 0 }} pengumuman</span>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>