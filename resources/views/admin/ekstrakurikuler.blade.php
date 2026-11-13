<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ekstrakurikuler - EKSPLORE Admin</title>

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            background: var(--bg-body);
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION ADMIN (INDIGO - VIOLET)
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
            max-width: 1180px;
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
            max-width: 580px;
            line-height: 1.6;
        }

        .btn-hero-add {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            color: var(--admin-primary-dark);
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.22);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            flex-shrink: 0;
        }

        .btn-hero-add:hover {
            transform: translateY(-3px);
            background: #eef2ff;
            box-shadow: 0 18px 34px rgba(15, 23, 42, 0.28);
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1180px;
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
            grid-template-columns: repeat(3, 1fr);
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

        .kpi-indigo { background: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; }
        .kpi-violet { background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe; }
        .kpi-sky { background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd; }

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
           ALERTS
        ========================= */
        .alert-box {
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 22px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.08);
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* =========================
           TOOLBAR PENCARIAN & HEADER
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
            color: var(--admin-primary);
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
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
        }

        /* =========================
           GRID KARTU EKSTRAKURIKULER
        ========================= */
        .ekskul-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .ekskul-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 22px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 10px 28px -10px rgba(15, 23, 42, 0.07);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .ekskul-card:hover {
            transform: translateY(-5px);
            border-color: var(--admin-border);
            box-shadow: 0 20px 38px -12px rgba(79, 70, 229, 0.18);
        }

        .card-accent-bar {
            height: 5px;
            width: 100%;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .card-body {
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            flex: 1;
        }

        .card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .ekskul-identity {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ekskul-avatar {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: #ffffff;
            font-size: 18px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 14px rgba(79, 70, 229, 0.25);
        }

        .ekskul-title-wrap h3 {
            font-size: 17px;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.3;
            text-transform: capitalize;
        }

        .ekskul-number {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text-muted);
        }

        .kuota-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--admin-soft);
            color: var(--admin-primary-dark);
            border: 1px solid var(--admin-border);
            padding: 5px 11px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 800;
            white-space: nowrap;
        }

        /* META INFO LIST */
        .meta-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 14px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #334155;
        }

        .meta-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: #ffffff;
            border: 1px solid var(--border-color);
            color: var(--admin-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .meta-text {
            display: flex;
            flex-direction: column;
            line-height: 1.35;
        }

        .meta-label {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: #94a3b8;
        }

        .meta-value {
            font-weight: 700;
            color: var(--text-dark);
        }

        .meta-value.unassigned {
            color: #d97706;
            font-style: italic;
            font-weight: 600;
        }

        /* CARD FOOTER ACTIONS */
        .card-footer {
            padding: 14px 22px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            border-top: 1px dashed var(--border-color);
        }

        .btn-action-edit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #eef2ff;
            color: #4338ca;
            border: 1px solid #c7d2fe;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-action-edit:hover {
            background: #4f46e5;
            color: #ffffff;
            border-color: #4f46e5;
            box-shadow: 0 6px 14px rgba(79, 70, 229, 0.25);
        }

        .btn-action-delete {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-action-delete:hover {
            background: #dc2626;
            color: #ffffff;
            border-color: #dc2626;
            box-shadow: 0 6px 14px rgba(220, 38, 38, 0.25);
        }

        /* EMPTY STATE */
        .empty-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 64px 24px;
            text-align: center;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
        }

        .empty-icon-box {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: var(--admin-soft);
            color: var(--admin-primary);
            border: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
        }

        .empty-card h3 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .empty-card p {
            font-size: 14px;
            color: var(--text-muted);
            max-width: 420px;
            margin: 0 auto 22px;
        }

        @media (max-width: 1024px) {
            .ekskul-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .btn-hero-add { width: 100%; justify-content: center; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .kpi-grid { grid-template-columns: 1fr; gap: 12px; }
            .ekskul-grid { grid-template-columns: 1fr; }
            .search-wrapper { width: 100%; }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $totalEkskul = isset($ekskul) ? $ekskul->count() : 0;
        $totalKuota = isset($ekskul) ? $ekskul->sum('kuota') : 0;
        $denganPembina = isset($ekskul) ? $ekskul->filter(fn($e) => !empty($e->pembina) || !empty($e->pembina_id))->count() : 0;
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                    Pusat Kendali Administrator
                </div>
                <h1>Kelola <span>Ekstrakurikuler</span></h1>
                <p>Atur seluruh unit ekstrakurikuler sekolah, penugasan pembina, jadwal latihan, lokasi kegiatan, serta kuota penerimaan siswa baru.</p>
            </div>

            <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn-hero-add">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Tambah Ekstrakurikuler
            </a>
        </div>
    </section>

    <main class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Ekstrakurikuler</span>
                    <strong>{{ $totalEkskul }} Unit</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Daya Tampung</span>
                    <strong>{{ number_format($totalKuota, 0, ',', '.') }} Siswa</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-sky">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Terhubung Pembina</span>
                    <strong>{{ $denganPembina }} / {{ $totalEkskul }} Ekskul</strong>
                </div>
            </div>
        </section>

        <!-- ALERTS -->
        @if (session('success'))
            <div class="alert-box alert-success">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-box alert-error">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-top: 6px; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- TOOLBAR & LIVE SEARCH -->
        <div class="toolbar-card">
            <div class="toolbar-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                Direktori Ekstrakurikuler Sekolah
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchEkskulInput" class="search-input" placeholder="Cari nama ekskul, pembina, lokasi...">
            </div>
        </div>

        <!-- SHOWCASE GRID EKSTRAKURIKULER -->
        @if (isset($ekskul) && $ekskul->count() > 0)
            <div class="ekskul-grid" id="ekskulGrid">
                @foreach ($ekskul as $item)
                    @php
                        $namaEkskul = $item->nama_ekskul ?? $item->nama ?? 'Ekstrakurikuler';
                        $inisial = strtoupper(substr($namaEkskul, 0, 2));
                        $namaPembina = $item->pembina
                            ? $item->pembina->name
                            : ($item->pembina_id ? 'ID Pembina: ' . $item->pembina_id : null);
                    @endphp

                    <article class="ekskul-card" data-search="{{ strtolower($namaEkskul . ' ' . ($namaPembina ?? '') . ' ' . ($item->lokasi ?? '') . ' ' . ($item->jadwal ?? '')) }}">
                        <div>
                            <div class="card-accent-bar"></div>
                            <div class="card-body">
                                <div class="card-top">
                                    <div class="ekskul-identity">
                                        <div class="ekskul-avatar">{{ $inisial }}</div>
                                        <div class="ekskul-title-wrap">
                                            <span class="ekskul-number">Unit #{{ $loop->iteration }}</span>
                                            <h3>{{ $namaEkskul }}</h3>
                                        </div>
                                    </div>

                                    <span class="kuota-pill">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                        {{ $item->kuota ?? 0 }} Siswa
                                    </span>
                                </div>

                                <div class="meta-list">
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        </div>
                                        <div class="meta-text">
                                            <span class="meta-label">Pembina</span>
                                            @if ($namaPembina)
                                                <span class="meta-value">{{ $namaPembina }}</span>
                                            @else
                                                <span class="meta-value unassigned">Belum ditentukan</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                        </div>
                                        <div class="meta-text">
                                            <span class="meta-label">Jadwal & Waktu</span>
                                            <span class="meta-value">
                                                {{ $item->jadwal ?? '-' }}
                                                @if ($item->jam)
                                                    <span style="color: var(--admin-primary); font-weight: 600;">({{ $item->jam }})</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                        </div>
                                        <div class="meta-text">
                                            <span class="meta-label">Lokasi Kegiatan</span>
                                            <span class="meta-value">{{ $item->lokasi ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}" class="btn-action-edit">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                Edit Data
                            </a>

                            <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-card">
                <div class="empty-icon-box">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                </div>
                <h3>Belum Ada Data Ekstrakurikuler</h3>
                <p>Data ekstrakurikuler sekolah masih kosong. Tambahkan unit ekstrakurikuler pertama untuk mulai mengelola kegiatan siswa.</p>
                <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn-hero-add" style="background: var(--admin-primary); color: #ffffff;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Tambah Ekstrakurikuler
                </a>
            </div>
        @endif

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchEkskulInput');
            const cards = document.querySelectorAll('#ekskulGrid .ekskul-card');

            if (searchInput && cards.length > 0) {
                searchInput.addEventListener('input', function () {
                    const keyword = this.value.toLowerCase().trim();
                    cards.forEach(card => {
                        const haystack = card.getAttribute('data-search') || '';
                        card.style.display = haystack.includes(keyword) ? 'flex' : 'none';
                    });
                });
            }
        });
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
@include('partials.app-sidebar-end')
</body>

</html>