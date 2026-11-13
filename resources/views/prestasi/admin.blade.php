<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi - Admin | EKSPLORE</title>

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

        .kpi-indigo { background: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; }
        .kpi-amber { background: #fffbeb; color: #d97706; border: 1px solid #fde68a; }

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
           TOOLBAR & CARD
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

        .table-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
            overflow-x: auto;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: #3730a3;
            color: #ffffff;
        }

        th {
            padding: 15px 16px;
            text-align: left;
            font-size: 13.5px;
            font-weight: 700;
            letter-spacing: 0.3px;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        thead th:first-child {
            border-top-left-radius: 15px;
        }

        thead th:last-child {
            border-top-right-radius: 15px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-dark);
            vertical-align: middle;
        }

        tr:hover {
            background: #f8fafc;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 50px;
            background: #eef2ff;
            color: #4338ca;
            border: 1px solid #c7d2fe;
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
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

        .date {
            white-space: nowrap;
            color: var(--text-muted);
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .kpi-grid { grid-template-columns: 1fr; }
            .table-card { padding: 20px; }
            .toolbar-card { flex-direction: column; align-items: flex-start; }
            .search-wrapper { width: 100%; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $totalPrestasi = isset($prestasi) ? $prestasi->count() : 0;
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                    Pusat Arsip Prestasi Sekolah
                </div>
                <h1>Data <span>Prestasi Ekstrakurikuler</span></h1>
                <p>Kelola dan pantau rekam jejak pencapaian serta penghargaan bergengsi yang diraih oleh seluruh ekstrakurikuler sekolah[cite: 15].</p>
            </div>
        </div>
    </section>

    <div class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Seluruh Prestasi</span>
                    <strong>{{ $totalPrestasi }} Penghargaan</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Status Arsip</span>
                    <strong>Terverifikasi Resmi</strong>
                </div>
            </div>
        </section>

        <!-- TOOLBAR & LIVE SEARCH -->
        <div class="toolbar-card">
            <div class="toolbar-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                Daftar Prestasi & Penghargaan Siswa
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchPrestasiInput" class="search-input" placeholder="Cari nama prestasi, ekskul, tingkat...">
            </div>
        </div>

        <div class="table-card">
            @if (isset($prestasi) && $prestasi->count() > 0)
                <div class="table-wrapper">
                    <table id="tabelPrestasi">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Nama Prestasi</th>
                                <th>Ekstrakurikuler</th>
                                <th style="width: 130px;">Tingkat</th>
                                <th style="width: 130px;">Tanggal</th>
                                <th>Lokasi</th>
                                <th>Dokumentasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($prestasi as $item)
                                @php
                                    $namaPrestasi = $item->nama_prestasi ?? '-';
                                    $namaEkskul = $item->ekstrakurikuler ? ($item->ekstrakurikuler->nama_ekskul ?? $item->ekstrakurikuler->nama ?? '-') : '-';
                                    $tingkat = $item->tingkat ?? '-';
                                    $tglPrestasi = $item->tanggal ? $item->tanggal->format('d-m-Y') : '-';
                                    $lokasi = $item->lokasi ?? '-';
                                    $dokumentasi = $item->dokumentasi ?? '-';
                                    $searchString = strtolower($namaPrestasi . ' ' . $namaEkskul . ' ' . $tingkat . ' ' . $tglPrestasi . ' ' . $lokasi);
                                @endphp

                                <tr data-search="{{ $searchString }}">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $namaPrestasi }}</strong>
                                    </td>

                                    <td>
                                        @if ($item->ekstrakurikuler)
                                            <span class="badge">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                                                {{ $namaEkskul }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $tingkat }}</td>

                                    <td class="date">{{ $tglPrestasi }}</td>

                                    <td>{{ $lokasi }}</td>

                                    <td>{{ $dokumentasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                    </div>
                    <h3>Belum Ada Data Prestasi</h3>
                    <p>Belum terdapat rekam jejak prestasi atau penghargaan ekstrakurikuler yang tercatat[cite: 15].</p>
                </div>
            @endif
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPrestasiInput');
            const rows = document.querySelectorAll('#tabelPrestasi tbody tr');

            if (searchInput && rows.length > 0) {
                searchInput.addEventListener('input', function () {
                    const keyword = this.value.toLowerCase().trim();
                    rows.forEach(row => {
                        const haystack = row.getAttribute('data-search') || '';
                        row.style.display = haystack.includes(keyword) ? '' : 'none';
                    });
                });
            }
        });
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>