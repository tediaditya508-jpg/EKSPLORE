<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pendaftaran - EKSPLORE Admin</title>

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
            grid-template-columns: repeat(4, 1fr);
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
        .kpi-green { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .kpi-red { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        .kpi-info span {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .kpi-info strong {
            font-size: 22px;
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

        .alert-error ul {
            margin-left: 18px;
            margin-top: 6px;
            font-weight: 500;
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
            min-width: 1100px;
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

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* STATUS BADGE */
        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .status-menunggu { background: #fef3c7; color: #b45309; border: 1px solid #fde68a; }
        .status-diterima { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
        .status-ditolak { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /* AKSI */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: flex-start;
        }

        .button {
            border: none;
            color: white;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .button:hover {
            transform: translateY(-1px);
        }

        .button-accept {
            background: #16a34a;
            box-shadow: 0 4px 10px rgba(22, 163, 74, 0.2);
        }

        .button-accept:hover {
            background: #15803d;
        }

        .button-reject {
            background: #dc2626;
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.2);
        }

        .button-reject:hover {
            background: #b91c1c;
        }

        .already-accepted {
            color: #166534;
            font-weight: 800;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        .already-rejected {
            color: #991b1b;
            font-weight: 800;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        .reason {
            max-width: 260px;
            line-height: 1.5;
            color: var(--text-muted);
            word-break: break-word;
            font-size: 13.5px;
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
            margin-bottom: 0;
        }

        @media (max-width: 1024px) {
            .kpi-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
        }

        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .card { padding: 20px; }
            .kpi-grid { grid-template-columns: 1fr; }
            .toolbar-card { flex-direction: column; align-items: flex-start; }
            .search-wrapper { width: 100%; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $totalPendaftaran = isset($pendaftaran) ? $pendaftaran->count() : 0;
        $totalMenunggu = isset($pendaftaran) ? $pendaftaran->filter(fn($p) => $p->status === 'menunggu')->count() : 0;
        $totalDiterima = isset($pendaftaran) ? $pendaftaran->filter(fn($p) => $p->status === 'diterima')->count() : 0;
        $totalDitolak = isset($pendaftaran) ? $pendaftaran->filter(fn($p) => $p->status === 'ditolak')->count() : 0;
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                    Pusat Verifikasi Pendaftaran
                </div>
                <h1>Kelola <span>Pendaftaran</span></h1>
                <p>Tinjau dan verifikasi pengajuan pendaftaran siswa baru yang ingin bergabung ke dalam ekstrakurikuler sekolah.</p>
            </div>
        </div>
    </section>

    <main class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Pendaftar</span>
                    <strong>{{ $totalPendaftaran }} Siswa</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Menunggu Verifikasi</span>
                    <strong>{{ $totalMenunggu }} Siswa</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-green">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Sudah Diterima</span>
                    <strong>{{ $totalDiterima }} Siswa</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-red">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Ditolak</span>
                    <strong>{{ $totalDitolak }} Siswa</strong>
                </div>
            </div>
        </section>

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert-box alert-success">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert-box alert-error">
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
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Daftar Permohonan Pendaftaran Masuk
            </div>

            <div class="search-wrapper">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
                <input type="text" id="searchPendaftaranInput" class="search-input" placeholder="Cari nama siswa, ekskul, kelas...">
            </div>
        </div>

        <div class="card">
            @if (isset($pendaftaran) && $pendaftaran->count() > 0)
                <div class="table-wrapper">
                    <table id="tabelPendaftaran">
                        <thead>
                            <tr>
                                <th style="width: 55px;">No</th>
                                <th>Nama Siswa</th>
                                <th style="width: 100px;">Kelas</th>
                                <th style="width: 90px;">NIS</th>
                                <th>Ekstrakurikuler</th>
                                <th style="width: 130px;">No. HP</th>
                                <th>Alasan Bergabung</th>
                                <th style="width: 130px;">Status</th>
                                <th style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendaftaran as $item)
                                @php
                                    $namaSiswa = $item->nama ?? ($item->siswa->nama ?? $item->siswa->name ?? '-');
                                    $kelasSiswa = $item->kelas ?? ($item->siswa->kelas ?? '-');
                                    $nisSiswa = $item->nis ?? ($item->siswa->nis ?? '-');
                                    $namaEkskul = $item->ekstrakurikuler ? ($item->ekstrakurikuler->nama_ekskul ?? $item->ekstrakurikuler->nama ?? '-') : '-';
                                    $noHpSiswa = $item->no_hp ?? ($item->siswa->no_hp ?? '-');
                                    $statusPendaftaran = $item->status ?? 'menunggu';
                                    $searchString = strtolower($namaSiswa . ' ' . $kelasSiswa . ' ' . $nisSiswa . ' ' . $namaEkskul . ' ' . $statusPendaftaran);
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

                                    <td>{{ $noHpSiswa }}</td>

                                    <td>
                                        <div class="reason">
                                            {{ $item->alasan ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($statusPendaftaran === 'menunggu')
                                            <span class="status status-menunggu">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                Menunggu
                                            </span>
                                        @elseif ($statusPendaftaran === 'diterima')
                                            <span class="status status-diterima">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                                                Diterima
                                            </span>
                                        @elseif ($statusPendaftaran === 'ditolak')
                                            <span class="status status-ditolak">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="status status-menunggu">
                                                {{ ucfirst($statusPendaftaran) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($statusPendaftaran === 'menunggu')
                                            <div class="action-buttons">
                                                <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menerima pendaftaran siswa ini?');" style="margin: 0;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="diterima">
                                                    <button type="submit" class="button button-accept">
                                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                                        Terima
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menolak pendaftaran siswa ini?');" style="margin: 0;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="ditolak">
                                                    <button type="submit" class="button button-reject">
                                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                                        Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif ($statusPendaftaran === 'diterima')
                                            <span class="already-accepted">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                                Sudah diterima
                                            </span>
                                        @elseif ($statusPendaftaran === 'ditolak')
                                            <span class="already-rejected">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                                Sudah ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                    </div>
                    <h3>Belum Ada Pendaftaran</h3>
                    <p>Belum ada siswa yang mengajukan pendaftaran ekstrakurikuler dalam sistem.</p>
                </div>
            @endif
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPendaftaranInput');
            const rows = document.querySelectorAll('#tabelPendaftaran tbody tr');

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