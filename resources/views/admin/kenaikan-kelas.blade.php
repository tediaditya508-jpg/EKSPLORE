<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Kelas - EKSPLORE Admin</title>

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
            max-width: 1100px;
            margin: -50px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           KPI CARDS
        ========================= */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-indigo { background: #ede9fe; color: #6d28d9; border: 1px solid #c4b5fd; }
        .card-violet { background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe; }
        .card-emerald { background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; }
        .card-amber { background: #fffbeb; color: #b45309; border: 1px solid #fde68a; }

        .card-info {
            min-width: 0;
        }

        .card-info h3 {
            margin: 0 0 4px;
            color: var(--text-muted);
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .number {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-dark);
        }

        /* =========================
           PANEL & FORM
        ========================= */
        .panel {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
            margin-bottom: 26px;
        }

        .panel h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel h2 svg {
            color: var(--admin-primary);
        }

        label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            font-size: 13.5px;
            margin-bottom: 8px;
            color: #334155;
        }

        label svg {
            color: var(--admin-primary);
        }

        input {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14.5px;
            background: #ffffff;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
            margin-bottom: 16px;
        }

        input:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        .select-kelas {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14.5px;
            background: #ffffff;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .select-kelas:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        button[type="submit"] {
            border: 0;
            padding: 13px 24px;
            border-radius: 12px;
            background: var(--admin-primary);
            color: white;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.25);
            transition: all 0.2s ease;
        }

        button[type="submit"]:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(124, 58, 237, 0.35);
        }

        button[type="submit"]:disabled {
            background: #cbd5e1;
            color: #475569;
            box-shadow: none;
            cursor: not-allowed !important;
            transform: none;
        }

        button.btn-sm[type="submit"] {
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 12.5px;
            box-shadow: none;
        }

        button.btn-sm[type="submit"]:hover {
            box-shadow: none;
        }

        .form-kelas {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .form-kelas .select-kelas {
            min-width: 175px;
            margin-bottom: 0;
        }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--admin-soft);
            color: var(--admin-primary);
            border: 1px solid var(--admin-border);
            border-radius: 50px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 800;
        }

        .badge-warning {
            display: inline-flex;
            align-items: center;
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
            border-radius: 50px;
            padding: 4px 10px;
            font-size: 11.5px;
            font-weight: 700;
        }

        .success {
            padding: 16px 20px;
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.08);
        }

        .error {
            color: #dc2626;
            font-size: 12.5px;
            font-weight: 600;
            margin-top: -10px;
            margin-bottom: 14px;
        }

        .alert-error,
        .alert-warning {
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 24px;
            font-size: 14px;
            line-height: 1.55;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            font-weight: 600;
        }

        .alert-warning {
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
            margin-bottom: 18px;
        }

        .alert-error svg,
        .alert-warning svg {
            flex-shrink: 0;
            margin-top: 1px;
        }

        .alert-warning a {
            color: #b45309;
            font-weight: 800;
            text-decoration: underline;
        }

        .alert-warning strong {
            display: block;
            margin-bottom: 2px;
        }

        /* =========================
           TABLES
        ========================= */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }

        th, td {
            padding: 15px 16px;
            border-bottom: 1px solid var(--border-color);
            text-align: left;
            font-size: 14px;
        }

        th {
            color: #ffffff;
            background: #6d28d9;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        th:first-child { border-top-left-radius: 15px; }
        th:last-child { border-top-right-radius: 15px; }

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .row-warning {
            background: #fffbeb;
        }

        .row-warning:hover {
            background: #fef3c7;
        }

        .row-total {
            background: var(--admin-soft);
        }

        .row-total:hover {
            background: var(--admin-soft);
        }

        .row-total td {
            border-top: 2px solid var(--admin-border);
            border-bottom: none;
            font-weight: 800;
        }

        .cell-muted {
            color: var(--text-muted);
            font-size: 12.5px;
            margin-top: 3px;
            word-break: break-word;
        }

        .log-note {
            color: #b45309;
            font-size: 11.5px;
            font-weight: 700;
            margin-top: 4px;
        }

        .note {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        @media(max-width: 1024px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 650px) {
            .cards {
                grid-template-columns: 1fr;
            }
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .panel { padding: 20px; }
            .form-kelas { width: 100%; }
            .form-kelas .select-kelas { min-width: 0; flex: 1 1 160px; }
            .form-kelas button { flex: 0 0 auto; }
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
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Pusat Manajemen Kelulusan & Kelas
                </div>
                <h1>Kenaikan <span>Kelas Siswa</span></h1>
                <p>Kelola proses perpindahan tingkat kelas siswa secara otomatis serta arsip kelulusan alumni sekolah.</p>
            </div>
        </div>
    </section>

    <div class="container">

        @if(session('success'))
            <div class="success" role="status">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->has('tahun_ajaran'))
            <div class="alert-error" role="alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>{{ $errors->first('tahun_ajaran') }}</span>
            </div>
        @endif

        @if($errors->has('proses'))
            <div class="alert-error" role="alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>{{ $errors->first('proses') }}</span>
            </div>
        @endif

        @if($errors->has('kelas'))
            <div class="alert-error" role="alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>{{ $errors->first('kelas') }}</span>
            </div>
        @endif

        <!-- KPI SUMMARY CARDS -->
        <div class="cards">
            <div class="card">
                <div class="card-icon card-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="card-info">
                    <h3>Total Siswa Aktif</h3>
                    <div class="number">{{ $jumlahAktif }} Siswa</div>
                </div>
            </div>

            <div class="card">
                <div class="card-icon card-emerald">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="card-info">
                    <h3>Siap Diproses</h3>
                    <div class="number">{{ $jumlahSiapProses }} Siswa</div>
                </div>
            </div>

            <div class="card">
                <div class="card-icon card-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                </div>
                <div class="card-info">
                    <h3>Belum Ada Kelas</h3>
                    <div class="number">{{ $siswaTanpaKelas->count() }} Siswa</div>
                    @if($siswaTujuanTidakValid->isNotEmpty())
                        <div class="cell-muted">{{ $siswaTujuanTidakValid->count() }} tujuan tidak tersedia</div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-icon card-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div class="card-info">
                    <h3>Total Alumni</h3>
                    <div class="number">{{ $jumlahAlumni }} Alumni</div>
                </div>
            </div>
        </div>

        <!-- PANEL PENEMPATAN KELAS -->
        <div class="panel" id="penempatan-kelas">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                Penempatan Kelas Siswa
                <span class="badge-count">{{ $siswaPerluPenempatan->count() }}</span>
            </h2>

            <p class="note">
                @if($siswaPerluPenempatan->isNotEmpty())
                    @if($siswaTanpaKelas->isNotEmpty())
                        {{ $siswaTanpaKelas->count() }} siswa aktif belum memiliki kelas yang dikenali sistem.
                    @endif
                    @if($siswaTujuanTidakValid->isNotEmpty())
                        {{ $siswaTujuanTidakValid->count() }} siswa memiliki kelas tujuan yang tidak tersedia pada tingkat berikutnya.
                    @endif
                    Lengkapi penyesuaian di bawah agar seluruh siswa dapat diproses pada kenaikan kelas.
                @else
                    Panel ini menampilkan siswa aktif yang belum memiliki kelas valid atau kelas tujuan yang tidak tersedia.
                @endif
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Kelas Saat Ini</th>
                            <th>Keterangan</th>
                            <th>Penempatan Kelas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siswaPerluPenempatan as $siswaItem)
                            <tr class="row-warning">
                                <td>
                                    <strong>{{ $siswaItem->name }}</strong>
                                    @if(!empty($siswaItem->email))
                                        <div class="cell-muted">{{ $siswaItem->email }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($siswaItem->kelas)
                                        <span class="badge-warning">{{ $siswaItem->kelas }}</span>
                                    @else
                                        <span class="badge-warning">Belum ada kelas</span>
                                    @endif
                                </td>
                                <td>
                                    @if($siswaItem->masalah === 'tujuan')
                                        <span class="badge-warning">Tujuan {{ $siswaItem->tujuan }} tidak tersedia</span>
                                        <div class="cell-muted">Pilih rombel lain di tingkat yang sama yang memiliki kelas lanjutan.</div>
                                    @elseif($siswaItem->kelas)
                                        <span class="badge-warning">Kelas tidak dikenali</span>
                                    @else
                                        <span class="badge-warning">Belum memiliki kelas valid</span>
                                    @endif
                                </td>
                                <td>
                                    <form
                                        class="form-kelas"
                                        action="{{ route('admin.kenaikan-kelas.kelas', $siswaItem->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PUT')

                                        <select name="kelas" class="select-kelas" required aria-label="Pilih kelas untuk {{ $siswaItem->name }}">
                                            <option value="">-- Pilih Kelas --</option>
                                            @foreach(collect($siswaItem->opsi)->groupBy(fn ($kelas) => explode(' ', $kelas)[0]) as $tingkat => $opsiKelas)
                                                <optgroup label="Kelas {{ $tingkat }}">
                                                    @foreach($opsiKelas as $opsi)
                                                        <option value="{{ $opsi }}" @selected($siswaItem->kelas === $opsi)>{{ $opsi }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn-sm">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 30px;">
                                    @if($jumlahAktif === 0)
                                        Tidak ada siswa aktif yang perlu ditempatkan.
                                    @else
                                        Semua siswa aktif sudah memiliki kelas dan kelas tujuan yang valid.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PANEL PROSES KELAS -->
        <div class="panel">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 7-7 7 7"/><path d="M12 19V5"/></svg>
                Proses Kenaikan Kelas
            </h2>

            @if($siswaTanpaKelas->isNotEmpty())
                <div class="alert-warning" role="alert">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                    <div>
                        <strong>{{ $siswaTanpaKelas->count() }} siswa aktif belum memiliki kelas valid.</strong>
                        Proses kenaikan kelas diblokir sampai semua siswa ditempatkan.
                        Lengkapi melalui <a href="#penempatan-kelas">panel penempatan kelas</a>.
                    </div>
                </div>
            @elseif($siswaTujuanTidakValid->isNotEmpty())
                <div class="alert-warning" role="alert">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                    <div>
                        <strong>{{ $siswaTujuanTidakValid->count() }} siswa memiliki kelas tujuan yang tidak tersedia.</strong>
                        Proses kenaikan kelas diblokir karena kelas lanjutan belum ada.
                        Sesuaikan kelas melalui <a href="#penempatan-kelas">panel penempatan kelas</a>.
                    </div>
                </div>
            @elseif($jumlahAktif === 0)
                <div class="alert-warning" role="alert">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    <div>Belum ada siswa aktif yang dapat diproses pada tahun ajaran ini.</div>
                </div>
            @else
                <p class="note">
                    Sistem akan secara otomatis menaikkan tingkat siswa (Kelas 10 ke kelas 11, kelas 11 ke kelas 12),
                    sementara siswa kelas 12 akan dialih statuskan menjadi alumni. Jurusan serta nomor rombel tetap dipertahankan.
                    Jika kelas lanjutan tidak tersedia, proses akan diblokir dan siswa ditampilkan pada panel penempatan kelas.
                </p>
            @endif

            <form
                action="{{ route('admin.kenaikan-kelas.proses') }}"
                method="POST"
                onsubmit="return konfirmasiKenaikanKelas(this);"
            >
                @csrf

                <label for="tahun_ajaran">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    Tahun Ajaran Baru
                </label>

                <input
                    type="text"
                    id="tahun_ajaran"
                    name="tahun_ajaran"
                    placeholder="Contoh: 2026/2027"
                    value="{{ old('tahun_ajaran') }}"
                    pattern="\d{4}/\d{4}"
                    title="Gunakan format tahun ajaran berurutan, contoh 2026/2027"
                    required
                >

                @error('tahun_ajaran')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit" @disabled($siswaPerluPenempatan->isNotEmpty() || $jumlahAktif === 0)>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                    @if($siswaTanpaKelas->isNotEmpty())
                        Lengkapi Kelas Terlebih Dahulu
                    @elseif($siswaTujuanTidakValid->isNotEmpty())
                        Sesuaikan Kelas Tujuan
                    @elseif($jumlahAktif === 0)
                        Tidak Ada Siswa Aktif
                    @else
                        Proses Kenaikan Kelas Sekarang
                    @endif
                </button>
            </form>
        </div>

        <!-- PANEL JUMLAH SISWA PER KELAS -->
        <div class="panel">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                Jumlah Siswa Per Kelas
            </h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Jumlah Siswa Aktif</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jumlahPerKelas as $kelas => $siswaKelas)
                            <tr @class(['row-warning' => $kelas === 'Belum mengisi kelas'])>
                                <td>
                                    @if($kelas === 'Belum mengisi kelas')
                                        <span class="badge-warning">Belum mengisi kelas</span>
                                    @else
                                        <strong>{{ $kelas }}</strong>
                                    @endif
                                </td>
                                <td>
                                    @if($kelas === 'Belum mengisi kelas')
                                        <span class="badge-warning">{{ $siswaKelas->count() }} Siswa</span>
                                    @else
                                        {{ $siswaKelas->count() }} Siswa
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align: center; color: var(--text-muted); padding: 30px;">Belum ada data siswa aktif.</td>
                            </tr>
                        @endforelse

                        @if($jumlahAktif > 0)
                            <tr class="row-total">
                                <td>Total Siswa Aktif</td>
                                <td>{{ $jumlahAktif }} Siswa</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PANEL RIWAYAT -->
        <div class="panel">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2v10l4.5 4.5"/><circle cx="12" cy="12" r="10"/></svg>
                Riwayat Kenaikan Kelas
            </h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Siswa Naik Tingkat</th>
                            <th>Menjadi Alumni</th>
                            <th>Diproses Oleh</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $item)
                            @php
                                $logKosong = (int) $item->jumlah_naik === 0 && (int) $item->jumlah_alumni === 0;
                            @endphp
                            <tr @class(['row-warning' => $logKosong])>
                                <td>
                                    <strong>{{ $item->tahun_ajaran }}</strong>
                                    @if($logKosong)
                                        <div class="log-note">Log tanpa perubahan</div>
                                    @endif
                                </td>
                                <td>{{ $item->jumlah_naik }} Siswa</td>
                                <td>{{ $item->jumlah_alumni }} Siswa</td>
                                <td>
                                    @if($item->admin_name)
                                        {{ $item->admin_name }}
                                    @elseif($item->admin_id)
                                        Admin #{{ $item->admin_id }}
                                    @else
                                        <span style="color: var(--text-muted);">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->created_at)
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                    @else
                                        <span style="color: var(--text-muted);">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 30px;">Belum ada riwayat kenaikan kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
    <script>
        function konfirmasiKenaikanKelas(form) {
            const yakin = confirm(
                'PERHATIAN! Semua siswa aktif akan diproses naik kelas. Kelas 12 akan menjadi alumni. Apakah kamu yakin ingin melanjutkan?'
            );

            if (!yakin) {
                return false;
            }

            const tombol = form.querySelector('button[type="submit"]');

            if (tombol) {
                setTimeout(function () {
                    tombol.disabled = true;
                    tombol.textContent = 'Memproses...';
                }, 0);
            }

            return true;
        }
    </script>

@include('partials.app-sidebar-end')
</body>
</html>