<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - EKSPLORE</title>

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
            max-width: 1200px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           GRID GALERI
        ========================= */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .galeri-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }

        .galeri-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.15);
            border-color: #cbd5e1;
        }

        .galeri-image-wrapper {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #f1f5f9;
            position: relative;
        }

        .galeri-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .galeri-card:hover .galeri-image {
            transform: scale(1.06);
        }

        .galeri-content {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .ekskul {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--primary-soft);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            margin-bottom: 12px;
            width: fit-content;
        }

        .galeri-content h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .keterangan {
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .tanggal {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 600;
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid var(--border-color);
        }

        /* =========================
           EMPTY STATE
        ========================= */
        .empty {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 60px 20px;
            text-align: center;
            color: var(--text-muted);
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
            font-size: 19px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .empty p {
            font-size: 13.5px;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 900px) {
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

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
            .galeri-grid {
                grid-template-columns: 1fr;
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                Dokumentasi Visual Sekolah
            </div>
            <h1>Galeri <span>Kegiatan</span></h1>
            <p>Jelajahi momen seru, kebersamaan, dan aksi nyata dari berbagai kegiatan ekstrakurikuler di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        @if ($galeri->count() > 0)

            <div class="galeri-grid">

                @foreach ($galeri as $item)

                    <div class="galeri-card">

                        <div class="galeri-image-wrapper">
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->keterangan ?? 'Galeri kegiatan' }}"
                                class="galeri-image"
                            >
                        </div>

                        <div class="galeri-content">

                            @if ($item->ekstrakurikuler)
                                <div class="ekskul">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                                    {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                                </div>
                            @endif

                            <h3>Dokumentasi Kegiatan</h3>

                            <p class="keterangan">
                                {{ $item->keterangan ?: 'Dokumentasi kegiatan ekstrakurikuler SMK Budi Bakti Ciwidey.' }}
                            </p>

                            <p class="tanggal">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                {{ $item->created_at?->format('d M Y') }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <div class="empty-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </div>
                <h3>Belum Ada Galeri</h3>
                <p>Belum ada dokumentasi foto kegiatan ekstrakurikuler yang tersedia saat ini.</p>
            </div>

        @endif

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>