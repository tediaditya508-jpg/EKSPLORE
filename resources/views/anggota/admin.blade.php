<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Ekskul - Admin | EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --admin-primary: #7c3aed;
            --admin-primary-dark: #6d28d9;
            --admin-accent: #7c3aed;
            --admin-soft: #f5f3ff;
            --admin-border: #ddd6fe;
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
           HERO SECTION ADMIN
        ========================= */
        .admin-hero {
            position: relative;
            background: linear-gradient(135deg, #2e1065 0%, #5b21b6 48%, #7c3aed 100%);
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
            color: #ede9fe;
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
            background: linear-gradient(135deg, #ddd6fe 0%, #f5d0fe 100%);
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

        .kpi-indigo { background: #ede9fe; color: #6d28d9; border: 1px solid #c4b5fd; }
        .kpi-green { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }

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
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        .table-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #6d28d9;
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

        /* STATUS BADGE */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 50px;
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* EMPTY STATE */
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
        $totalAnggota = isset($anggota) ? $anggota->count() : 0;
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Direktori Keanggotaan Sekolah
                </div>
                <h1>Anggota <span>Ekstrakurikuler</span></h1>
                <p>Kelola dan pantau daftar seluruh siswa yang telah terdaftar resmi sebagai anggota aktif di berbagai unit ekstrakurikuler[cite: 13].</p>
            </div>
        </div>
    </section>

    <main class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Anggota Aktif</span>
                    <strong>{{ $totalAnggota }} Siswa</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-green">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Status Keanggotaan</span>
                    <strong>Terverifikasi Aktif</strong>
                </div>
            </div>
        </section>

        <!-- TOOLBAR & LIVE SEARCH -->
        <div class="toolbar-card">
            <div class="toolbar-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                Daftar Anggota Aktif Ekstrakurikuler
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchAnggotaInput" class="search-input" placeholder="Cari nama siswa, kelas, ekskul...">
            </div>
        </div>

        <section class="table-card">
            @if (isset($anggota) && $anggota->count() > 0)
                <div class="table-wrapper">
                    <table id="tabelAnggota">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Nama Siswa</th>
                                <th style="width: 110px;">Kelas</th>
                                <th style="width: 100px;">NIS</th>
                                <th>Ekstrakurikuler</th>
                                <th style="width: 150px;">Tanggal Daftar</th>
                                <th style="width: 120px;">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($anggota as $item)
                                @php
                                    $namaSiswa = $item->siswa->name ?? $item->siswa->nama ?? '-';
                                    $kelasSiswa = $item->siswa->kelas ?? '-';
                                    $nisSiswa = $item->siswa->nis ?? '-';
                                    $namaEkskul = $item->ekstrakurikuler->nama_ekskul ?? $item->ekstrakurikuler->nama ?? '-';
                                    $tglDaftar = $item->tanggal_daftar ? \Carbon\Carbon::parse($item->tanggal_daftar)->format('d-m-Y') : '-';
                                    $searchString = strtolower($namaSiswa . ' ' . $kelasSiswa . ' ' . $nisSiswa . ' ' . $namaEkskul . ' ' . $tglDaftar);
                                @endphp

                                <tr data-search="{{ $searchString }}">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $namaSiswa }}</strong>
                                    </td>

                                    <td>{{ $kelasSiswa }}</td>

                                    <td>{{ $nisSiswa }}</td>

                                    <td>
                                        <strong>{{ $namaEkskul }}</strong>
                                    </td>

                                    <td>{{ $tglDaftar }}</td>

                                    <td>
                                        <span class="status">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                            Aktif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <h3>Belum Ada Anggota Aktif</h3>
                    <p>Siswa yang pendaftarannya telah disetujui atau diterima akan otomatis muncul di halaman ini.</p>
                </div>
            @endif
        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchAnggotaInput');
            const rows = document.querySelectorAll('#tabelAnggota tbody tr');

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