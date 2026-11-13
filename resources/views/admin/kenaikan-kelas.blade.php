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
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 26px;
        }

        .card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-indigo { background: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; }
        .card-violet { background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe; }

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
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
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
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
            transition: all 0.2s ease;
        }

        button[type="submit"]:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
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
            background: #3730a3;
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

        .note {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        @media(max-width: 650px) {
            .cards {
                grid-template-columns: 1fr;
            }
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .panel { padding: 20px; }
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
            <div class="success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
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
                <div class="card-icon card-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div class="card-info">
                    <h3>Total Alumni</h3>
                    <div class="number">{{ $jumlahAlumni }} Alumni</div>
                </div>
            </div>
        </div>

        <!-- PANEL PROSES KELAS -->
        <div class="panel">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 7-7 7 7"/><path d="M12 19V5"/></svg>
                Proses Kenaikan Kelas
            </h2>

            <p class="note">
                Sistem akan secara otomatis menaikkan tingkat siswa (Kelas 10 ke kelas 11, kelas 11 ke kelas 12),
                sementara siswa kelas 12 akan dialih statuskan menjadi alumni. Jurusan serta nomor rombel tetap dipertahankan.
            </p>

            <form
                action="{{ route('admin.kenaikan-kelas.proses') }}"
                method="POST"
                onsubmit="return confirm('PERHATIAN! Semua siswa aktif akan diproses naik kelas. Kelas 12 akan menjadi alumni. Apakah kamu yakin ingin melanjutkan?');"
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
                    required
                >

                @error('tahun_ajaran')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                    Proses Kenaikan Kelas Sekarang
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
                        @forelse($jumlahPerKelas->sortKeys() as $kelas => $siswaKelas)
                            <tr>
                                <td><strong>{{ $kelas ?: 'Belum mengisi kelas' }}</strong></td>
                                <td>{{ $siswaKelas->count() }} Siswa</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align: center; color: var(--text-muted); padding: 30px;">Belum ada data siswa aktif.</td>
                            </tr>
                        @endforelse
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
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $item)
                            <tr>
                                <td><strong>{{ $item->tahun_ajaran }}</strong></td>
                                <td>{{ $item->jumlah_naik }} Siswa</td>
                                <td>{{ $item->jumlah_alumni }} Siswa</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: var(--text-muted); padding: 30px;">Belum ada riwayat kenaikan kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>