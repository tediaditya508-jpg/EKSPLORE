<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ekskul - Admin | EKSPLORE</title>

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
            background: #f5f3ff;
            box-shadow: 0 18px 34px rgba(15, 23, 42, 0.28);
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

        .kpi-indigo { background: #ede9fe; color: #6d28d9; border: 1px solid #c4b5fd; }
        .kpi-violet { background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe; }
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
           ALERTS
        ========================= */
        .alert {
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

        .alert-error ul {
            margin-left: 18px;
            margin-top: 6px;
            font-weight: 500;
        }

        /* =========================
           TOOLBAR PENCARIAN & CARD
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

        .card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
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
            min-width: 1050px;
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

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .nama-ekskul {
            font-weight: 800;
            color: var(--text-dark);
        }

        /* BADGE */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .badge-rutin {
            background: #f5f3ff;
            color: #6d28d9;
            border: 1px solid #ddd6fe;
        }

        .badge-event {
            background: #fef3c7;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        .hari {
            font-weight: 700;
            color: var(--admin-primary);
        }

        .jam {
            white-space: nowrap;
            color: var(--text-muted);
            font-weight: 600;
        }

        .lokasi {
            color: var(--text-muted);
        }

        /* AKSI */
        .aksi {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 14px;
            background: #f5f3ff;
            color: #7c3aed;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid #ddd6fe;
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            background: #7c3aed;
            color: white;
            border-color: #7c3aed;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
        }

        .btn-hapus {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 14px;
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-hapus:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
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
            margin-bottom: 20px;
        }

        @media (max-width: 1024px) {
            .kpi-grid { grid-template-columns: 1fr; gap: 12px; }
        }

        @media (max-width: 800px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .btn-hero-add { width: 100%; justify-content: center; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .card { padding: 20px; }
            .toolbar-card { flex-direction: column; align-items: flex-start; }
            .search-wrapper { width: 100%; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $totalJadwal = isset($jadwal) ? $jadwal->count() : 0;
        $totalRutin = isset($jadwal) ? $jadwal->filter(fn($j) => ($j->jenis ?? 'rutin') === 'rutin')->count() : 0;
        $totalEvent = isset($jadwal) ? $jadwal->filter(fn($j) => ($j->jenis ?? 'rutin') === 'event')->count() : 0;
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    Pusat Penjadwalan Sekolah
                </div>
                <h1>Jadwal <span>Ekstrakurikuler</span></h1>
                <p>Kelola dan pantau seluruh jadwal latihan rutin serta agenda event ekstrakurikuler siswa secara terpusat.</p>
            </div>

            <a href="{{ route('admin.jadwal.create') }}" class="btn-hero-add">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Tambah Jadwal Baru
            </a>
        </div>
    </section>

    <div class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Seluruh Jadwal</span>
                    <strong>{{ $totalJadwal }} Agenda</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Latihan Rutin</span>
                    <strong>{{ $totalRutin }} Sesi</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Event Khusus</span>
                    <strong>{{ $totalEvent }} Agenda</strong>
                </div>
            </div>
        </section>

        @if (session('success'))
            <div class="alert alert-success">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
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
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                Daftar Agenda & Jadwal Kegiatan
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchJadwalInput" class="search-input" placeholder="Cari ekskul, hari, lokasi...">
            </div>
        </div>

        <div class="card">
            @if (isset($jadwal) && $jadwal->count() > 0)
                <div class="table-wrapper">
                    <table id="tabelJadwal">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Ekstrakurikuler</th>
                                <th style="width: 110px;">Jenis</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 140px;">Hari / Tanggal</th>
                                <th style="width: 150px;">Jam</th>
                                <th>Lokasi</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jadwal as $item)
                                @php
                                    $namaEkskul = $item->ekstrakurikuler->nama_ekskul ?? $item->ekstrakurikuler->nama ?? '-';
                                    $jenis = $item->jenis ?? 'rutin';
                                    $namaKegiatan = $jenis === 'event' ? ($item->nama_event ?: 'Event ekstrakurikuler') : 'Kegiatan rutin';
                                    $hariTanggal = $jenis === 'event' 
                                        ? ($item->tanggal_event ? \Carbon\Carbon::parse($item->tanggal_event)->format('d-m-Y') : '-') 
                                        : ($item->hari ?? '-');
                                    $searchString = strtolower($namaEkskul . ' ' . $namaKegiatan . ' ' . $hariTanggal . ' ' . ($item->lokasi ?? ''));
                                @endphp

                                <tr data-search="{{ $searchString }}">
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="nama-ekskul">
                                        {{ $namaEkskul }}
                                    </td>

                                    <td>
                                        @if ($jenis === 'event')
                                            <span class="badge badge-event">Event</span>
                                        @else
                                            <span class="badge badge-rutin">Rutin</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $namaKegiatan }}
                                    </td>

                                    <td class="hari">
                                        {{ $hariTanggal }}
                                    </td>

                                    <td class="jam">
                                        @if ($item->jam_mulai && $item->jam_selesai)
                                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td class="lokasi">{{ $item->lokasi ?? '-' }}</td>

                                    <td>
                                        <div class="aksi">
                                            <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn-edit">
                                                ✏️ Edit
                                            </a>

                                            <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-hapus">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    </div>
                    <h3>Belum Ada Jadwal</h3>
                    <p>Belum terdapat jadwal ekstrakurikuler yang terdaftar dalam sistem.</p>

                    <a href="{{ route('admin.jadwal.create') }}" class="btn-hero-add" style="background: var(--admin-primary); color: #ffffff; display: inline-flex;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                        Tambah Jadwal Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchJadwalInput');
            const rows = document.querySelectorAll('#tabelJadwal tbody tr');

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