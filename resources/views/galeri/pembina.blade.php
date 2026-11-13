<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Pembina - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary-emerald: #059669;
            --primary-emerald-hover: #047857;
            --emerald-soft: #ecfdf5;
            --emerald-border: #a7f3d0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
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
           HERO SECTION (PEMBINA EMERALD THEME)
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #065f46 0%, #059669 50%, #10b981 100%);
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
                radial-gradient(circle at 85% 80%, rgba(5, 150, 105, 0.3) 0%, transparent 40%);
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
            max-width: 1150px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* ALERTS */
        .message {
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.1);
        }

        .error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        .error div {
            margin: 4px 0;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border-radius: 24px;
            padding: 36px;
            margin-bottom: 32px;
            border: 1px solid var(--border-color);
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
        }

        .form-card h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-card h2 svg {
            color: var(--primary-emerald);
        }

        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            display: block;
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-family: var(--font-sans);
            background: white;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-group select:focus,
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary-emerald);
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.12);
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn-submit {
            border: none;
            background: var(--primary-emerald);
            color: white;
            padding: 13px 22px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25);
            transition: all 0.2s ease;
            margin-top: 6px;
        }

        .btn-submit:hover {
            background: var(--primary-emerald-hover);
            transform: translateY(-2px);
        }

        /* GALLERY SECTION */
        .gallery-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gallery-title svg {
            color: var(--primary-emerald);
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .galeri-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .galeri-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px -10px rgba(5, 150, 105, 0.15);
            border-color: #cbd5e1;
        }

        .galeri-image-wrapper {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: var(--emerald-soft);
        }

        .galeri-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .galeri-card:hover .galeri-image {
            transform: scale(1.04);
        }

        .galeri-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .ekskul {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            border: 1px solid var(--emerald-border);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
            width: fit-content;
        }

        .keterangan {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 14px;
            flex: 1;
        }

        .tanggal {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-delete {
            width: 100%;
            border: none;
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
            padding: 11px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .empty {
            background: white;
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
            background: var(--emerald-soft);
            color: var(--primary-emerald);
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
            font-size: 13.5px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .form-card { padding: 22px; }
            .galeri-grid { grid-template-columns: 1fr; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                Panel Galeri Pembina
            </div>
            <h1>Galeri <span>Kegiatan</span></h1>
            <p>Kelola dokumentasi foto kegiatan ekstrakurikuler yang Anda bina untuk dibagikan kepada siswa dan warga sekolah di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <main class="container">

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="message success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="message error">
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-top: 4px; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- FORM TAMBAH GALERI --}}
        <section class="form-card">
            <h2>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Tambah Dokumentasi Baru
            </h2>

            <form action="{{ route('pembina.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="ekskul_id">Pilih Ekstrakurikuler</label>
                    <select name="ekskul_id" id="ekskul_id" required>
                        <option value="">-- Pilih Ekstrakurikuler --</option>
                        @foreach ($ekskul as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_ekskul ?? 'Ekstrakurikuler' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="gambar">Foto Dokumentasi (.jpg, .jpeg, .png, .webp)</label>
                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        accept=".jpg,.jpeg,.png,.webp"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan / Deskripsi Foto</label>
                    <textarea
                        name="keterangan"
                        id="keterangan"
                        placeholder="Contoh: Kegiatan latihan rutin ekstrakurikuler futsal bersama anggota."
                    ></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Unggah Dokumentasi
                </button>
            </form>
        </section>

        {{-- DAFTAR GALERI --}}
        <section>
            <h2 class="gallery-title">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                Dokumentasi Kegiatan Binaan Anda
            </h2>

            @if ($galeri->count() > 0)
                <div class="galeri-grid">
                    @foreach ($galeri as $item)
                        <div class="galeri-card">
                            <div class="galeri-image-wrapper">
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->keterangan ?? 'Dokumentasi kegiatan' }}"
                                    class="galeri-image"
                                >
                            </div>

                            <div class="galeri-content">
                                @if ($item->ekstrakurikuler)
                                    <div class="ekskul">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                                        {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                                    </div>
                                @endif

                                <p class="keterangan">
                                    {{ $item->keterangan ?? 'Dokumentasi kegiatan ekstrakurikuler.' }}
                                </p>

                                <p class="tanggal">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    {{ $item->created_at?->format('d M Y') }}
                                </p>

                                <form
                                    action="{{ route('pembina.galeri.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus foto dokumentasi ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                        Hapus Foto
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    </div>
                    <h3>Belum Ada Dokumentasi</h3>
                    <p>Tambahkan foto kegiatan ekstrakurikuler binaan Anda menggunakan formulir di atas.</p>
                </div>
            @endif
        </section>
    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>