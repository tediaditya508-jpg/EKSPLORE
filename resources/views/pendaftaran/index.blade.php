<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Saya - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
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
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #2563eb 100%);
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
                radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(6, 182, 212, 0.3) 0%, transparent 40%);
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
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #93c5fd;
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
            background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1000px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .page-head h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 13.5px;
        }

        /* SUCCESS ALERT */
        .success {
            background: var(--success-soft);
            border: 1px solid var(--success-border);
            color: #166534;
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 13.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ITEM PENDAFTARAN */
        .item-list {
            display: grid;
            gap: 18px;
        }

        .item {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
        }

        .item:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px -8px rgba(37, 99, 235, 0.1);
            border-color: #cbd5e1;
        }

        .item-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 14px;
        }

        .item h3 {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .item-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
            margin-top: 14px;
            background: #f8fafc;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
        }

        .detail-row {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
        }

        .detail-row strong {
            color: var(--text-dark);
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        /* STATUS BADGE */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 12px;
            white-space: nowrap;
        }

        .status-menunggu {
            background: var(--warning-soft);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .status-diterima {
            background: var(--success-soft);
            color: #15803d;
            border: 1px solid var(--success-border);
        }

        .status-ditolak {
            background: var(--danger-soft);
            color: var(--danger);
            border: 1px solid var(--danger-border);
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            text-decoration: none;
            border-radius: 14px;
            font-size: 13.5px;
            font-weight: 700;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px -4px rgba(37, 99, 235, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.45);
        }

        /* EMPTY STATE */
        .empty {
            background: #ffffff;
            padding: 60px 20px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--primary-soft);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .empty h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .empty p {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* =========================
           RESPONSIF
        ========================= */
        @media (max-width: 600px) {
            .hero {
                padding: 45px 20px 70px;
            }
            .hero h1 {
                font-size: 26px;
            }
            .container {
                margin: -25px 16px 40px;
                padding: 0;
            }
            .card {
                padding: 22px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Status Pendaftaran Siswa
            </div>
            <h1>Pendaftaran <span>Saya</span></h1>
            <p>Kelola dan pantau status persetujuan kegiatan ekstrakurikuler yang telah Anda daftarkan di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        <div class="card">

            <div class="page-head">
                <div>
                    <h2>Riwayat Pendaftaran Ekskul</h2>
                    <p class="subtitle">Berikut adalah daftar ekstrakurikuler yang sudah Anda daftarkan.</p>
                </div>

                <a href="{{ route('ekskul.index') }}" class="btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    <span>Daftar Ekskul Baru</span>
                </a>
            </div>

            @if (session('success'))
                <div class="success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($pendaftaran->count() > 0)

                <div class="item-list">
                    @foreach ($pendaftaran as $data)

                        @php
                            $statusClass = match ($data->status) {
                                'diterima' => 'status-diterima',
                                'ditolak' => 'status-ditolak',
                                default => 'status-menunggu',
                            };
                        @endphp

                        <div class="item">
                            <div class="item-top">
                                <h3>
                                    {{ $data->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                                </h3>

                                <span class="status {{ $statusClass }}">
                                    @if($data->status == 'diterima')
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    @elseif($data->status == 'ditolak')
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                    @else
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    @endif
                                    Status: {{ ucfirst($data->status) }}
                                </span>
                            </div>

                            <div class="item-details">
                                <div class="detail-row">
                                    <strong>Nama Pendaftar</strong>
                                    {{ $data->nama }}
                                </div>
                                <div class="detail-row">
                                    <strong>Tanggal Daftar</strong>
                                    {{ $data->created_at?->format('d-m-Y H:i') }} WIB
                                </div>
                                <div class="detail-row" style="grid-column: 1 / -1;">
                                    <strong>Alasan / Motivasi Mengikuti</strong>
                                    {{ $data->alasan }}
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            @else

                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    </div>
                    <h3>Belum Ada Pendaftaran</h3>
                    <p>Kamu belum memiliki pendaftaran ekstrakurikuler saat ini. Yuk pilih ekskul favoritmu sekarang!</p>
                    <a href="{{ route('ekskul.index') }}" class="btn">
                        Lihat Daftar Ekskul
                    </a>
                </div>

            @endif

        </div>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>