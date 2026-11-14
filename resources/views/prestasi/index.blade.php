<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi - EKSPLORE</title>

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
            max-width: 1100px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           GRID PRESTASI
        ========================= */
        .prestasi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .prestasi-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 26px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.06);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .prestasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -12px rgba(37, 99, 235, 0.15);
            border-color: #cbd5e1;
        }

        .prestasi-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: var(--primary-soft);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
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

        .prestasi-card h3 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 14px;
            color: var(--text-dark);
            letter-spacing: -0.3px;
        }

        .detail {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: #475569;
            font-size: 13.5px;
            background: #f8fafc;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            margin-top: auto;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-item svg {
            color: var(--primary);
            flex-shrink: 0;
        }

        .detail strong {
            color: var(--text-dark);
            font-weight: 700;
        }

        .detail-dokumentasi {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .dokumentasi-preview {
            margin-top: 6px;
            padding: 0;
            border: 2px solid #bfdbfe;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            overflow: hidden;
            line-height: 0;
            transition: all 0.2s ease;
        }

        .dokumentasi-preview:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.18);
        }

        .dokumentasi-preview img {
            width: 96px;
            height: 64px;
            object-fit: cover;
            display: block;
        }

        .dokumentasi-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            padding: 6px 12px;
            border-radius: 9px;
            border: 1px solid #bfdbfe;
            background: var(--primary-soft);
            color: var(--primary-hover);
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .dokumentasi-button:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* =========================
           EMPTY STATE
        ========================= */
        .empty {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            text-align: center;
            padding: 60px 20px;
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
            line-height: 1.6;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 900px) {
            .prestasi-grid {
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
            .prestasi-grid {
                grid-template-columns: 1fr;
            }
            .container {
                margin: -25px 16px 40px;
                padding: 0;
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                Galeri Penghargaan Sekolah
            </div>
            <h1>Prestasi <span>Ekstrakurikuler</span></h1>
            <p>Saksikan berbagai piala, kejuaraan, dan pencapaian membanggakan yang diraih oleh siswa-siswi SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        @if($prestasi->count() > 0)

            <div class="prestasi-grid">

                @foreach($prestasi as $item)

                    <div class="prestasi-card">

                        <div class="prestasi-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                        </div>

                        <span class="ekskul">
                            {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                        </span>

                        <h3>
                            {{ $item->nama_prestasi }}
                        </h3>

                        <div class="detail">

                            @if($item->tingkat)
                                <div class="detail-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    <div><strong>Tingkat:</strong> {{ $item->tingkat }}</div>
                                </div>
                            @endif

                            @if($item->tanggal)
                                <div class="detail-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</div>
                                </div>
                            @endif

                            @if($item->lokasi)
                                <div class="detail-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <div><strong>Lokasi:</strong> {{ $item->lokasi }}</div>
                                </div>
                            @endif

                            @if($item->dokumentasi)
                                <div class="detail-item detail-dokumentasi">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    <div>
                                        <strong>Dokumentasi:</strong>
                                        @if($item->dokumentasi_gambar)
                                            <button
                                                type="button"
                                                class="dokumentasi-preview"
                                                data-url="{{ $item->dokumentasi_url }}"
                                                onclick="window.open(this.dataset.url, '_blank', 'noopener,noreferrer')"
                                                title="Lihat dokumentasi"
                                            >
                                                <img src="{{ $item->dokumentasi_url }}" alt="Dokumentasi {{ $item->nama_prestasi }}">
                                            </button>
                                        @elseif($item->dokumentasi_url)
                                            <button
                                                type="button"
                                                class="dokumentasi-button"
                                                data-url="{{ $item->dokumentasi_url }}"
                                                onclick="window.open(this.dataset.url, '_blank', 'noopener,noreferrer')"
                                            >
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                                                Lihat Dokumentasi
                                            </button>
                                        @else
                                            {{ $item->dokumentasi }}
                                        @endif
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <div class="empty-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </div>
                <h3>Belum Ada Data Prestasi</h3>
                <p>Saat ini belum ada data prestasi ekstrakurikuler yang dipublikasikan. Silakan periksa kembali nanti.</p>
            </div>

        @endif

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>