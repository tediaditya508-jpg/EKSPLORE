<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ekskul - EKSPLORE</title>

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
           HERO SECTION ULTRA MODERN
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #2563eb 100%);
            color: #ffffff;
            padding: 70px 24px 90px;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.4) 0%, transparent 45%),
                radial-gradient(circle at 80% 70%, rgba(6, 182, 212, 0.3) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
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
            margin-bottom: 18px;
            backdrop-filter: blur(10px);
        }

        .hero h1 {
            font-size: 38px;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 15px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER & GRID UTAMA
        ========================= */
        .container {
            max-width: 1200px;
            margin: -40px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            background: #ffffff;
            padding: 20px 28px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .section-header h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header h2 svg {
            color: var(--primary);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        /* =========================
           CARD DESIGN NEXT-LEVEL
        ========================= */
        .card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.15);
            border-color: #cbd5e1;
        }

        /* KARTU EKSKUL SUDAH DIIKUTI */
        .card-aktif {
            border: 2px solid var(--success);
            box-shadow: 0 15px 35px -10px rgba(22, 163, 74, 0.12);
        }

        .card-aktif::after {
            content: "DISELEKSI";
            position: absolute;
            top: 16px;
            right: 16px;
            background: var(--success);
            color: white;
            font-size: 10px;
            font-weight: 800;
            padding: 5px 12px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            z-index: 5;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
        }

        /* KARTU EKSKUL DISABLED (BATAS MAKSIMAL) */
        .card-disabled {
            opacity: 0.7;
            background: #f8fafc;
        }

        .card-disabled:hover {
            transform: none;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
        }

        /* GAMBAR / THUMBNAIL */
        .gambar {
            height: 200px;
            background: linear-gradient(135deg, #e2e8f0, #f1f5f9);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .gambar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .gambar img {
            transform: scale(1.06);
        }

        .gambar-fallback {
            font-size: 42px;
            color: #94a3b8;
            background: var(--primary-soft);
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* KONTEN KARTU */
        .isi {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .badge {
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

        .isi h3 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .deskripsi {
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* DETAIL INFO (GRID RAPI) */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            background: #f8fafc;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 22px;
            border: 1px solid var(--border-color);
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: #475569;
        }

        .info-item svg {
            color: var(--primary);
            flex-shrink: 0;
        }

        /* TOMBOL AKSI */
        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-align: center;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 14px;
            font-size: 13.5px;
            font-weight: 700;
            margin-top: auto;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px -4px rgba(37, 99, 235, 0.3);
        }

        .button-aktif {
            background: var(--success);
            box-shadow: 0 6px 20px -4px rgba(22, 163, 74, 0.3);
        }

        .button-aktif:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        .button-pilih {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .button-pilih:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.45);
        }

        .button-disabled {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #cbd5e1;
            color: #64748b;
            padding: 13px 20px;
            border-radius: 14px;
            font-size: 13.5px;
            font-weight: 700;
            cursor: not-allowed;
            margin-top: auto;
            box-shadow: none;
        }

        /* KOSONG STATE */
        .kosong {
            background: white;
            padding: 60px 30px;
            border-radius: 24px;
            text-align: center;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        }

        .kosong-icon {
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

        .kosong h3 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .kosong p {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* =========================
           RESPONSIF
        ========================= */
        @media (max-width: 768px) {
            .hero {
                padding: 50px 20px 80px;
            }
            .hero h1 {
                font-size: 28px;
            }
            .container {
                margin: -30px 16px 40px;
                padding: 0;
            }
            .grid {
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                Portal Ekstrakurikuler Resmi
            </div>
            <h1>Temukan dan Pilih <span>Ekskul Favoritmu</span></h1>
            <p>Jelajahi beragam kegiatan pengembangan bakat dan minat di SMK Budi Bakti Ciwidey dengan mudah dan cepat.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        <div class="section-header">
            <h2>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 6h10"/><path d="M6 10h10"/></svg>
                Daftar Pilihan Ekstrakurikuler
            </h2>
            <span style="font-size: 13px; font-weight: 700; color: var(--text-muted);">
                Total: {{ $ekskul->count() }} Kegiatan
            </span>
        </div>

        @if ($ekskul->count() > 0)

            <div class="grid">

                @foreach ($ekskul as $item)

                    @php
                        $sudahIkut = $anggotaAktif->contains($item->id);
                    @endphp

                    <div class="card
                        @if ($sudahIkut)
                            card-aktif
                        @elseif ($jumlahEkskulAktif >= 2)
                            card-disabled
                        @endif
                    ">

                        <div class="gambar">
                            @if (!empty($item->gambar))
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama_ekskul }}"
                                >
                            @else
                                <div class="gambar-fallback">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                                </div>
                            @endif
                        </div>

                        <div class="isi">
                            <span class="badge">
                                Ekstrakurikuler Siswa
                            </span>

                            <h3>
                                {{ $item->nama_ekskul }}
                            </h3>

                            <p class="deskripsi">
                                {{ $item->deskripsi ?? 'Belum ada deskripsi untuk kegiatan ekstrakurikuler ini.' }}
                            </p>

                            <!-- INFO GRID -->
                            <div class="info-grid">
                                <div class="info-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    <span>{{ $item->jadwal ?? 'Jadwal fleksibel' }}</span>
                                </div>
                                <div class="info-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <span>{{ $item->jam ?? 'Menyesuaikan' }}</span>
                                </div>
                                <div class="info-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span>{{ $item->lokasi ?? 'Area Sekolah' }}</span>
                                </div>
                                <div class="info-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <span>Kuota: {{ $item->kuota ?? 0 }}</span>
                                </div>
                            </div>

                            <!-- TOMBOL KONDISIONAL -->
                            @if ($sudahIkut)
                                <a
                                    href="{{ route('ekskul.show', $item->id) }}"
                                    class="button button-aktif"
                                >
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Sudah Diikuti & Terdaftar
                                </a>
                            @elseif ($jumlahEkskulAktif >= 2)
                                <div class="button-disabled">
                                    Batas Maksimal 2 Ekskul Tercapai
                                </div>
                            @else
                                <a
                                    href="{{ route('ekskul.show', $item->id) }}"
                                    class="button button-pilih"
                                >
                                    <span>Lihat Detail & Pilih</span>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                </a>
                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="kosong">
                <div class="kosong-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </div>
                <h3>Belum Ada Data Ekskul</h3>
                <p>Data kegiatan ekstrakurikuler belum tersedia saat ini. Silakan periksa kembali nanti.</p>
            </div>

        @endif

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>