<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kegiatan - EKSPLORE</title>

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
            --accent-cyan: #0891b2;
            --accent-cyan-soft: #ecfeff;
            --accent-cyan-border: #cffafe;
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

        /* =========================
           JADWAL LIST & CARD
        ========================= */
        .jadwal-list {
            display: grid;
            gap: 20px;
        }

        .jadwal-card {
            background: #ffffff;
            padding: 28px;
            border-radius: 24px;
            box-shadow: 0 10px 30px -8px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            border-left: 6px solid var(--primary);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .jadwal-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(37, 99, 235, 0.15);
            border-color: #cbd5e1;
        }

        /* CARD EVENT BERSIH TANPA GRADASI NABRAK */
        .jadwal-card.event {
            border-left-color: var(--accent-cyan);
            background: #ffffff;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .jadwal-card h2 {
            color: var(--text-dark);
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .jadwal-card.event h2 {
            color: #0e7490;
        }

        /* BADGE */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-rutin {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .badge-event {
            background: var(--accent-cyan-soft);
            color: var(--accent-cyan);
            border: 1px solid var(--accent-cyan-border);
        }

        /* DETAIL INFO */
        .nama-event {
            font-weight: 700;
            font-size: 14.5px;
            color: #0e7490;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--accent-cyan-soft);
            padding: 12px 16px;
            border-radius: 14px;
            border: 1px solid var(--accent-cyan-border);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
            margin-top: 14px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            font-size: 13.5px;
            color: #475569;
            font-weight: 600;
        }

        .info-item svg {
            color: var(--primary);
            flex-shrink: 0;
        }

        .jadwal-card.event .info-item svg {
            color: var(--accent-cyan);
        }

        /* EMPTY STATE */
        .empty {
            background: #ffffff;
            padding: 60px 30px;
            border-radius: 24px;
            text-align: center;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
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
            font-size: 13.5px;
            line-height: 1.6;
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
            .jadwal-card {
                padding: 20px;
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                Agenda Kegiatan Sekolah
            </div>
            <h1>Jadwal <span>Ekstrakurikuler</span></h1>
            <p>Pantau jadwal latihan rutin dan event penting ekstrakurikuler yang Anda ikuti di SMK Budi Bakti Ciwidey secara real-time.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        <div class="jadwal-list">

            @forelse ($jadwal as $item)

                @php
                    $isEvent = ($item->jenis ?? 'rutin') === 'event';
                @endphp

                <article class="jadwal-card {{ $isEvent ? 'event' : '' }}">

                    <div class="card-top">
                        <h2>
                            {{ $item->ekstrakurikuler->nama_ekskul
                                ?? $item->ekstrakurikuler->nama
                                ?? 'Ekstrakurikuler' }}
                        </h2>

                        @if ($isEvent)
                            <span class="badge badge-event">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                Event Khusus
                            </span>
                        @else
                            <span class="badge badge-rutin">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                Jadwal Rutin
                            </span>
                        @endif
                    </div>

                    @if ($isEvent)
                        <div class="nama-event">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>{{ $item->nama_event ?: 'Event ekstrakurikuler' }}</span>
                        </div>
                    @endif

                    <div class="info-grid">
                        <!-- HARI / TANGGAL -->
                        <div class="info-item">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            <div>
                                <span style="font-size: 11px; color: var(--text-muted); display: block;">WAKTU PELAKSANAAN</span>
                                @if ($isEvent)
                                    <strong>{{ $item->tanggal_event ? \Carbon\Carbon::parse($item->tanggal_event)->format('d-m-Y') : 'Belum ditentukan' }}</strong>
                                @else
                                    <strong>{{ $item->hari ?? '-' }}</strong>
                                @endif
                            </div>
                        </div>

                        <!-- JAM -->
                        <div class="info-item">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <div>
                                <span style="font-size: 11px; color: var(--text-muted); display: block;">JAM LATIHAN</span>
                                <strong>
                                    @if ($item->jam_mulai && $item->jam_selesai)
                                        {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }} WIB
                                    @else
                                        Belum ditentukan
                                    @endif
                                </strong>
                            </div>
                        </div>

                        <!-- LOKASI -->
                        <div class="info-item" style="grid-column: 1 / -1;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            <div>
                                <span style="font-size: 11px; color: var(--text-muted); display: block;">LOKASI / TEMPAT</span>
                                <strong>{{ $item->lokasi ?: 'Belum ditentukan' }}</strong>
                            </div>
                        </div>
                    </div>

                </article>

            @empty

                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    </div>
                    <h3>Belum Ada Jadwal Tersedia</h3>
                    <p>Jadwal kegiatan ekstrakurikuler yang Anda ikuti belum diterbitkan atau belum tersedia saat ini.</p>
                </div>

            @endforelse

        </div>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>