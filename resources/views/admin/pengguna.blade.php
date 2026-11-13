<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - EKSPLORE Admin</title>

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

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }

        .btn-hero-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            color: var(--admin-primary-dark);
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 14px;
            font-size: 13.5px;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.2);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-hero-action:hover {
            transform: translateY(-2px);
            background: #f5f3ff;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.25);
        }

        .btn-hero-export {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(6px);
        }

        .btn-hero-export:hover {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
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
           CARD & TABEL
        ========================= */
        .card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 30px -10px rgba(15, 23, 42, 0.06);
            margin-bottom: 26px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        thead {
            background: #6d28d9;
            color: #ffffff;
        }

        th, td {
            padding: 15px 16px;
            text-align: left;
            font-size: 13.5px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        thead th:first-child {
            border-top-left-radius: 15px;
        }

        thead th:last-child {
            border-top-right-radius: 15px;
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

        /* AKSI & TOMBOL */
        .aksi-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .button-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f5f3ff;
            color: #7c3aed;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid #ddd6fe;
            transition: all 0.2s ease;
        }

        .button-edit:hover {
            background: #7c3aed;
            color: white;
            border-color: #7c3aed;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
        }

        .button-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .button-delete:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            color: var(--text-muted);
            padding: 48px 20px;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px dashed var(--border-color);
            font-weight: 600;
        }

        @media (max-width: 1024px) {
            .kpi-grid { grid-template-columns: 1fr; gap: 12px; }
        }

        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 76px; }
            .hero-text h1 { font-size: 26px; }
            .hero-actions { width: 100%; flex-direction: column; }
            .btn-hero-action { width: 100%; justify-content: center; }
            .container { margin: -38px auto 40px; padding: 0 16px; }
            .card { padding: 20px; }
            .card-header { flex-direction: column; align-items: flex-start; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    @php
        $dataSiswa = isset($users) ? $users->where('role', 'siswa') : collect();
        $dataPembina = isset($users) ? $users->where('role', 'pembina') : collect();
        $dataAdmin = isset($users) ? $users->where('role', 'admin') : collect();
    @endphp

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Pusat Kendali Pengguna
                </div>
                <h1>Kelola <span>Pengguna</span></h1>
                <p>Kelola data akun siswa, pembina, serta administrator yang terdaftar dalam sistem EKSPLORE secara terpusat.</p>
            </div>

            <div class="hero-actions">
                <a href="{{ route('admin.export-siswa') }}" class="btn-hero-action btn-hero-export">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Download Excel Siswa
                </a>
                <a href="{{ route('admin.pengguna.create') }}" class="btn-hero-action">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Tambah Pengguna Baru
                </a>
            </div>
        </div>
    </section>

    <main class="container">

        <!-- KPI SUMMARY -->
        <section class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-icon kpi-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Siswa</span>
                    <strong>{{ $dataSiswa->count() }} Orang</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-violet">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Pembina</span>
                    <strong>{{ $dataPembina->count() }} Orang</strong>
                </div>
            </div>

            <div class="kpi-card">
                <div class="kpi-icon kpi-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="kpi-info">
                    <span>Total Admin</span>
                    <strong>{{ $dataAdmin->count() }} Orang</strong>
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
                    <ul style="margin-top: 6px; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- =====================================================
             TABEL SISWA
        ====================================================== --}}
        <div class="card">
            <div class="card-header">
                <h2>
                    👨‍🎓 Data Siswa
                </h2>
                <a href="{{ route('admin.pengguna.create') }}" class="button-edit" style="background: var(--admin-primary); color: white; border-color: var(--admin-primary);">
                    + Tambah Pengguna
                </a>
            </div>

            @if ($dataSiswa->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th style="width: 110px;">NIS</th>
                                <th style="width: 120px;">Kelas</th>
                                <th style="width: 130px;">Terdaftar</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSiswa as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nis ?? '-' }}</td>
                                    <td>{{ $user->kelas ?? '-' }}</td>
                                    <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                                    <td>
                                        <div class="aksi-wrapper">
                                            <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="button-edit">
                                                ✏️ Edit
                                            </a>

                                            @if ($user->id !== $admin->id)
                                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');" style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete">
                                                        🗑️ Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span style="color: var(--text-muted); font-size: 11.5px; font-weight: 600;">Aktif</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    Belum ada data siswa terdaftar.
                </div>
            @endif
        </div>

        {{-- =====================================================
             TABEL PEMBINA
        ====================================================== --}}
        <div class="card">
            <div class="card-header">
                <h2>
                    👨‍🏫 Data Pembina
                </h2>
                <a href="{{ route('admin.pengguna.create') }}" class="button-edit" style="background: var(--admin-primary); color: white; border-color: var(--admin-primary);">
                    + Tambah Pengguna
                </a>
            </div>

            @if ($dataPembina->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th style="width: 140px;">Terdaftar</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPembina as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                                    <td>
                                        <div class="aksi-wrapper">
                                            <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="button-edit">
                                                ✏️ Edit
                                            </a>

                                            @if ($user->id !== $admin->id)
                                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');" style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete">
                                                        🗑️ Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span style="color: var(--text-muted); font-size: 11.5px; font-weight: 600;">Aktif</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    Belum ada data pembina terdaftar.
                </div>
            @endif
        </div>

        {{-- =====================================================
             TABEL ADMIN
        ====================================================== --}}
        <div class="card">
            <div class="card-header">
                <h2>
                    🛠️ Data Admin
                </h2>
                <a href="{{ route('admin.pengguna.create') }}" class="button-edit" style="background: var(--admin-primary); color: white; border-color: var(--admin-primary);">
                    + Tambah Pengguna
                </a>
            </div>

            @if ($dataAdmin->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th style="width: 140px;">Terdaftar</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAdmin as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                                    <td>
                                        <div class="aksi-wrapper">
                                            <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="button-edit">
                                                ✏️ Edit
                                            </a>

                                            @if ($user->id !== $admin->id)
                                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');" style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete">
                                                        🗑️ Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span style="color: var(--text-muted); font-size: 11.5px; font-weight: 600;">Akun Sedang Digunakan</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    Belum ada data admin terdaftar.
                </div>
            @endif
        </div>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>