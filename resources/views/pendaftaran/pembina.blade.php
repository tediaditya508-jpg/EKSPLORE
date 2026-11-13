<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary-emerald: #047857;
            --primary-emerald-hover: #065f46;
            --emerald-soft: #ecfdf5;
            --emerald-border: #a7f3d0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --warning: #d97706;
            --warning-soft: #fffbeb;
            --warning-border: #fde68a;
            --danger: #dc2626;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION (PEMBINA EMERALD THEME)
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #065f46 0%, #047857 50%, #10b981 100%);
            color: #ffffff;
            padding: 60px 24px 80px;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(16, 185, 129, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(4, 120, 87, 0.3) 0%, transparent 40%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #a7f3d0;
            margin-bottom: 16px;
            backdrop-filter: blur(8px);
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 10px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1100px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .card-header-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-title svg {
            color: var(--primary-emerald);
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 13.5px;
            margin-bottom: 28px;
        }

        /* ALERTS */
        .success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
        }

        .error div {
            margin: 4px 0;
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--emerald-soft);
            color: var(--primary-emerald);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .empty h3 {
            font-size: 19px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .empty p {
            font-size: 13.5px;
        }

        /* PENDAFTAR CARD */
        .pendaftaran-card {
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 20px;
            background: #f8fafc;
            transition: all 0.2s ease;
        }

        .pendaftaran-card:hover {
            border-color: #cbd5e1;
            background: white;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
        }

        .pendaftaran-card h2 {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-bottom: 16px;
        }

        .info-box {
            background: white;
            border-radius: 12px;
            padding: 14px;
            border: 1px solid var(--border-color);
        }

        .info-box strong {
            display: block;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 4px;
            font-weight: 700;
        }

        .info-box span {
            font-size: 14.5px;
            font-weight: 700;
            color: var(--text-dark);
            word-break: break-word;
        }

        .alasan {
            background: white;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 18px;
            line-height: 1.6;
            font-size: 13.5px;
            color: #475569;
        }

        .alasan strong {
            display: block;
            color: var(--text-dark);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .status-menunggu { background: var(--warning-soft); color: #b45309; border: 1px solid var(--warning-border); }
        .status-diterima { background: var(--success-soft); color: #15803d; border: 1px solid var(--success-border); }
        .status-ditolak { background: var(--danger-soft); color: #991b1b; border: 1px solid var(--danger-border); }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            font-size: 13.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-terima {
            background: var(--success);
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        }

        .btn-terima:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .btn-tolak {
            background: var(--danger);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }

        .btn-tolak:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .card { padding: 22px; }
            .info { grid-template-columns: 1fr; }
            .btn { width: 100%; justify-content: center; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION (PEMBINA EMERALD THEME) -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Panel Seleksi Pendaftar
            </div>
            <h1>Daftar Pendaftar <span>Ekstrakurikuler</span></h1>
            <p>Tinjau dan seleksi siswa-siswi yang mengajukan permohonan bergabung ke ekstrakurikuler di bawah bimbingan Anda.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <div class="container">

        <div class="card">

            <div class="card-header-title">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Daftar Permohonan Masuk
            </div>
            <p class="subtitle">
                Berikut adalah rekapitulasi data siswa yang mendaftar ke ekstrakurikuler binaan Anda.
            </p>

            {{-- Pesan berhasil --}}
            @if (session('success'))
                <div class="success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Pesan error --}}
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>⚠️ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if ($pendaftaran->count() > 0)

                @foreach ($pendaftaran as $data)

                    <div class="pendaftaran-card">

                        <h2>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                            {{ $data->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                        </h2>

                        <div class="info">

                            <div class="info-box">
                                <strong>Nama Siswa</strong>
                                <span>{{ $data->nama ?? '-' }}</span>
                            </div>

                            <div class="info-box">
                                <strong>Kelas</strong>
                                <span>{{ $data->kelas ?? '-' }}</span>
                            </div>

                            <div class="info-box">
                                <strong>NIS (Nomor Induk Siswa)</strong>
                                <span>{{ $data->nis ?? '-' }}</span>
                            </div>

                            <div class="info-box">
                                <strong>No. HP / WhatsApp</strong>
                                <span>{{ $data->no_hp ?? '-' }}</span>
                            </div>

                            <div class="info-box" style="grid-column: 1 / -1;">
                                <strong>Tanggal Pengajuan Pendaftaran</strong>
                                <span>{{ $data->created_at?->format('d-m-Y H:i') ?? '-' }}</span>
                            </div>

                        </div>

                        <div class="alasan">
                            <strong>Alasan / Motivasi Mengikuti Ekskul</strong>
                            {{ $data->alasan ?? '-' }}
                        </div>

                        {{-- Status --}}
                        <div>
                            @if ($data->status === 'menunggu')
                                <span class="status status-menunggu">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    Menunggu Verifikasi
                                </span>
                            @elseif ($data->status === 'diterima')
                                <span class="status status-diterima">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    Diterima
                                </span>
                            @elseif ($data->status === 'ditolak')
                                <span class="status status-ditolak">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                                    Ditolak
                                </span>
                            @else
                                <span class="status status-menunggu">
                                    {{ ucfirst($data->status) }}
                                </span>
                            @endif
                        </div>

                        {{-- Tombol hanya muncul jika masih menunggu --}}
                        @if ($data->status === 'menunggu')

                            <div class="actions">

                                {{-- Tombol Terima --}}
                                <form action="{{ route('pembina.pendaftaran.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="diterima">

                                    <button type="submit" class="btn btn-terima">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span>Terima Siswa</span>
                                    </button>
                                </form>

                                {{-- Tombol Tolak --}}
                                <form action="{{ route('pembina.pendaftaran.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="ditolak">

                                    <button type="submit" class="btn btn-tolak">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                        <span>Tolak Permohonan</span>
                                    </button>
                                </form>

                            </div>

                        @endif

                    </div>

                @endforeach

            @else

                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    </div>
                    <h3>Belum Ada Pendaftar</h3>
                    <p>Saat ini belum ada siswa yang mengajukan pendaftaran ke ekstrakurikuler yang Anda bina.</p>
                </div>

            @endif

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>