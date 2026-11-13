<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ekstrakurikuler - EKSPLORE Admin</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --admin-primary: #7c3aed;
            --admin-primary-dark: #6d28d9;
            --admin-soft: #f5f3ff;
            --admin-border: #ddd6fe;
            --bg-body: #f8fafc;
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
            max-width: 900px;
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
            color: #ede9fe;
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
            background: linear-gradient(135deg, #ddd6fe 0%, #f5d0fe 100%);
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
            max-width: 900px;
            margin: -45px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           CARD FORM
        ========================= */
        .card {
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
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group label svg {
            color: var(--admin-primary);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14.5px;
            font-family: var(--font-sans);
            outline: none;
            background: #ffffff;
            color: var(--text-dark);
            transition: all 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
            background: #ffffff;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* BOX NOTIFIKASI */
        .error-box {
            background: #fef2f2;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            border: 1px solid #fecaca;
            font-size: 14px;
            font-weight: 700;
        }

        .error-box ul {
            padding-left: 18px;
            margin-top: 6px;
            font-weight: 500;
        }

        .success-box {
            background: #f0fdf4;
            color: #166534;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            border: 1px solid #bbf7d0;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* TOMBOL AKSI */
        .button-area {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .button {
            border: none;
            padding: 13px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .button-save {
            background: var(--admin-primary);
            color: white;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.25);
            flex: 1;
        }

        .button-save:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(124, 58, 237, 0.35);
        }

        .button-back {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-color);
        }

        .button-back:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 700px) {
            .admin-hero { padding: 44px 20px 72px; }
            .hero-inner h1 { font-size: 26px; }
            .container { margin: -35px auto 40px; padding: 0 14px; }
            .card { padding: 22px; }
            .form-row { grid-template-columns: 1fr; gap: 0; }
            .button-area { flex-direction: column-reverse; }
            .button { width: 100%; }
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                Panel Administrator EKSPLORE
            </div>
            <h1>Edit <span>Ekstrakurikuler</span></h1>
            <p>Perbarui informasi detail, pembina, jadwal latihan, serta persyaratan unit ekstrakurikuler sekolah.</p>
        </div>
    </section>

    <div class="container">

        <div class="card">

            @if ($errors->any())
                <div class="error-box">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                        <span>Terjadi kesalahan pengisian form:</span>
                    </div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="success-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.ekstrakurikuler.update', $ekskul->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_ekskul">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Nama Ekstrakurikuler
                    </label>
                    <input
                        type="text"
                        id="nama_ekskul"
                        name="nama_ekskul"
                        value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}"
                        placeholder="Contoh: Futsal"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="deskripsi">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                        Deskripsi Kegiatan
                    </label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi singkat mengenai ekstrakurikuler ini..."
                    >{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="pembina_id">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Pembina Ekstrakurikuler
                    </label>
                    <select id="pembina_id" name="pembina_id">
                        <option value="">-- Pilih Pembina --</option>
                        @foreach ($pembina as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ old('pembina_id', $ekskul->pembina_id) == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="jadwal">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            Hari / Jadwal Latihan
                        </label>
                        <input
                            type="text"
                            id="jadwal"
                            name="jadwal"
                            value="{{ old('jadwal', $ekskul->jadwal) }}"
                            placeholder="Contoh: Senin"
                        >
                    </div>

                    <div class="form-group">
                        <label for="jam">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Jam Kegiatan
                        </label>
                        <input
                            type="text"
                            id="jam"
                            name="jam"
                            value="{{ old('jam', $ekskul->jam) }}"
                            placeholder="Contoh: 15:30 - 17:00"
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="lokasi">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            Lokasi / Tempat
                        </label>
                        <input
                            type="text"
                            id="lokasi"
                            name="lokasi"
                            value="{{ old('lokasi', $ekskul->lokasi) }}"
                            placeholder="Contoh: Lapangan Sekolah"
                        >
                    </div>

                    <div class="form-group">
                        <label for="kuota">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Kuota Anggota
                        </label>
                        <input
                            type="number"
                            id="kuota"
                            name="kuota"
                            value="{{ old('kuota', $ekskul->kuota) }}"
                            min="1"
                            placeholder="Contoh: 30"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="persyaratan">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        Persyaratan Khusus
                    </label>
                    <textarea
                        id="persyaratan"
                        name="persyaratan"
                        placeholder="Masukkan persyaratan atau kriteria khusus untuk bergabung..."
                    >{{ old('persyaratan', $ekskul->persyaratan) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="gambar">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        Gambar / Banner Ekskul
                    </label>
                    <input
                        type="text"
                        id="gambar"
                        name="gambar"
                        value="{{ old('gambar', $ekskul->gambar) }}"
                        placeholder="Nama file / URL gambar banner"
                    >
                </div>

                <div class="button-area">
                    <a href="{{ route('admin.ekstrakurikuler') }}" class="button button-back">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>

                    <button type="submit" class="button button-save">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>