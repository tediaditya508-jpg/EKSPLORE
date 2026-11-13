<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman - EKSPLORE Admin</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --admin-primary: #4f46e5;
            --admin-primary-dark: #3730a3;
            --admin-soft: #eef2ff;
            --admin-border: #c7d2fe;
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
            background: linear-gradient(135deg, #1e1b4b 0%, #3730a3 48%, #6d28d9 100%);
            color: #ffffff;
            padding: 56px 28px 88px;
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
            max-width: 850px;
            margin: 0 auto;
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

        .hero-inner h1 {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .hero-inner h1 span {
            background: linear-gradient(135deg, #c7d2fe 0%, #f5d0fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-inner p {
            font-size: 14.5px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 850px;
            margin: -45px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           CARD FORM
        ========================= */
        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
        }

        .form-group label svg {
            color: var(--admin-primary);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14.5px;
            background: #ffffff;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
            background: #ffffff;
        }

        .form-group textarea {
            min-height: 160px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 12.5px;
            font-weight: 600;
            margin-top: 6px;
        }

        /* =========================
           BUTTONS
        ========================= */
        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: 12px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--admin-primary);
            color: white;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
            flex: 1;
        }

        .btn-primary:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 72px; }
            .hero-inner h1 { font-size: 26px; }
            .container { margin: -35px auto 40px; padding: 0 14px; }
            .box { padding: 22px; }
            .buttons { flex-direction: column-reverse; }
            .btn { width: 100%; }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Panel Administrator EKSPLORE
            </div>
            <h1>Tambah <span>Pengumuman</span></h1>
            <p>Buat informasi atau pengumuman resmi baru yang dapat langsung disiarkan kepada siswa dan pembina.</p>
        </div>
    </section>

    <main class="container">

        <div class="box">

            <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                @csrf

                {{-- JUDUL --}}
                <div class="form-group">
                    <label for="judul">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                        Judul Pengumuman
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Jadwal Kegiatan Ekstrakurikuler"
                        required
                    >

                    @error('judul')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- ISI --}}
                <div class="form-group">
                    <label for="isi">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Isi Pengumuman
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        placeholder="Tuliskan isi pengumuman secara detail di sini..."
                        required
                    >{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="form-group">
                    <label for="tanggal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        Tanggal Pengumuman
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="form-group">
                    <label for="gambar">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        URL / Nama Gambar (Opsional)
                    </label>

                    <input
                        type="text"
                        id="gambar"
                        name="gambar"
                        value="{{ old('gambar') }}"
                        placeholder="Contoh: pengumuman.jpg atau URL gambar"
                    >

                    @error('gambar')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="buttons">
                    <a href="{{ route('admin.pengumuman') }}" class="btn btn-secondary">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                        Simpan Pengumuman Baru
                    </button>
                </div>

            </form>

        </div>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>