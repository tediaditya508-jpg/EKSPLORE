<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - EKSPLORE</title>

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
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
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
            max-width: 900px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .header-action-card {
            background: white;
            padding: 24px 28px;
            border-radius: 20px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .header-action-card h3 {
            font-size: 17px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .header-action-card p {
            color: var(--text-muted);
            font-size: 13.5px;
            margin-top: 2px;
        }

        .btn-read-all {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            background: var(--primary);
            color: white;
            padding: 11px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 700;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
        }

        .btn-read-all:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.35);
        }

        /* =========================
           NOTIFICATION CARDS
        ========================= */
        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .notification-card {
            background: white;
            padding: 24px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.05);
            border: 1px solid var(--border-color);
            position: relative;
            transition: all 0.25s ease;
        }

        .notification-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 15px 35px -8px rgba(15, 23, 42, 0.08);
        }

        /* TANDA MERAH BULAT UNREAD (PULSING RED DOT) */
        .notification-card.unread::before {
            content: '';
            position: absolute;
            top: 24px;
            left: -6px;
            width: 12px;
            height: 12px;
            background: #dc2626;
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4);
            }
            70% {
                box-shadow: 0 0 0 8px rgba(220, 38, 38, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0);
            }
        }

        .notification-card.unread {
            background: #fdfdfd;
            border-left: 4px solid #dc2626;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 10px;
        }

        .notification-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .notification-message {
            color: #475569;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .notification-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
        }

        .badge-unread {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        .badge-read {
            background: #f1f5f9;
            color: #64748b;
            border: 1px solid var(--border-color);
        }

        .btn-read {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            background: #f8fafc;
            color: #334155;
            padding: 8px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .btn-read:hover {
            background: var(--primary-soft);
            color: var(--primary);
            border-color: #bfdbfe;
        }

        /* EMPTY STATE */
        .empty {
            background: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 24px;
            color: var(--text-muted);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
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
            font-size: 19px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .empty p {
            font-size: 13.5px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .header-action-card, .notification-card { padding: 18px; }
            .notification-header { flex-direction: column; align-items: flex-start; }
            .notification-date { white-space: normal; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                Pusat Informasi Siswa
            </div>
            <h1>Notifikasi <span>Akun</span></h1>
            <p>Halo, {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }} 👋. Pantau pengumuman, persetujuan ekskul, dan informasi penting lainnya di sini.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <div class="container">

        @if ($notifikasi->where('dibaca', false)->count() > 0)
            <div class="header-action-card">
                <div>
                    <h3>Ada pesan baru yang belum dibaca</h3>
                    <p>Tandai seluruh notifikasi sebagai sudah dibaca dengan satu klik.</p>
                </div>

                <form action="{{ route('notifikasi.bacaSemua') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn-read-all">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Tandai Semua Dibaca</span>
                    </button>
                </form>
            </div>
        @endif

        <div class="notification-list">

            @forelse ($notifikasi as $item)

                <div class="notification-card {{ !$item->dibaca ? 'unread' : '' }}">

                    <div class="notification-header">
                        <div>
                            <div class="notification-title">
                                {{ $item->judul }}
                            </div>

                            @if (!$item->dibaca)
                                <span class="badge badge-unread">
                                    <span style="width: 6px; height: 6px; background: #dc2626; border-radius: 50%; display: inline-block;"></span>
                                    Belum Dibaca
                                </span>
                            @else
                                <span class="badge badge-read">
                                    Sudah Dibaca
                                </span>
                            @endif
                        </div>

                        <div class="notification-date">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            {{ $item->created_at?->format('d M Y, H:i') }}
                        </div>
                    </div>

                    <div class="notification-message">
                        {{ $item->pesan }}
                    </div>

                    @if (!$item->dibaca)
                        <form action="{{ route('notifikasi.baca', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn-read">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Tandai Sudah Dibaca</span>
                            </button>
                        </form>
                    @endif

                </div>

            @empty

                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    </div>
                    <h3>Belum Ada Notifikasi</h3>
                    <p style="margin-top: 6px;">
                        Saat ada pengumuman atau informasi baru untuk kamu, notifikasi akan muncul di halaman ini.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>