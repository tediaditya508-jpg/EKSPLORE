<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Ekstrakurikuler - EKSPLORE</title>

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
            --info: #047857;
            --info-soft: #ecfdf5;
            --info-border: #a7f3d0;
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
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.1);
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

        /* GRID LAYOUT */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 24px;
        }

        .card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            height: fit-content;
        }

        .card h2 {
            margin-bottom: 22px;
            color: var(--text-dark);
            font-size: 20px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .card h2 svg {
            color: var(--primary-emerald);
        }

        /* FORM STYLING */
        .form-group {
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 13.5px;
            color: #334155;
        }

        .form-group input,
        .form-group select,
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

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-emerald);
            box-shadow: 0 0 0 4px rgba(4, 120, 87, 0.12);
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 9px 12px;
            cursor: pointer;
        }

        .file-hint {
            margin-top: 6px;
            font-size: 12px;
            color: var(--text-muted);
        }

        .form-error {
            margin-top: 6px;
            font-size: 12.5px;
            font-weight: 600;
            color: #b91c1c;
        }

        .dokumentasi-current {
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12.5px;
            color: var(--text-muted);
        }

        .dokumentasi-current img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--border-color);
        }

        .info-dokumentasi {
            flex-wrap: wrap;
        }

        .dokumentasi-preview {
            padding: 0;
            border: 2px solid var(--emerald-border);
            border-radius: 10px;
            background: white;
            cursor: pointer;
            overflow: hidden;
            line-height: 0;
            transition: all 0.2s ease;
        }

        .dokumentasi-preview:hover {
            border-color: var(--primary-emerald);
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.18);
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
            padding: 6px 12px;
            border-radius: 9px;
            border: 1px solid var(--emerald-border);
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .dokumentasi-button:hover {
            background: var(--primary-emerald);
            border-color: var(--primary-emerald);
            color: white;
        }

        .button {
            width: 100%;
            border: none;
            background: var(--primary-emerald);
            color: white;
            padding: 13px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(4, 120, 87, 0.25);
            transition: all 0.2s ease;
            margin-top: 6px;
        }

        .button:hover {
            background: var(--primary-emerald-hover);
            transform: translateY(-2px);
        }

        /* PRESTASI ITEM */
        .prestasi-item {
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 16px;
            background: #f8fafc;
            transition: all 0.2s ease;
        }

        .prestasi-item:hover {
            border-color: #cbd5e1;
            background: white;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .prestasi-item h3 {
            margin: 10px 0;
            color: var(--text-dark);
            font-size: 17px;
            font-weight: 800;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            border: 1px solid var(--emerald-border);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .info {
            color: #475569;
            font-size: 13.5px;
            line-height: 1.6;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info strong {
            color: var(--text-dark);
        }

        .empty {
            color: var(--text-muted);
            text-align: center;
            padding: 40px 20px;
            font-size: 14px;
        }

        .ekskul-title {
            margin-top: 25px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px dashed var(--border-color);
        }

        .ekskul-title:first-child {
            margin-top: 0;
        }

        .ekskul-title h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-emerald-hover);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* TOMBOL AKSI */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid var(--border-color);
        }

        .edit-button,
        .delete-button,
        .cancel-button,
        .save-edit-button {
            border: none;
            padding: 9px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .edit-button {
            background: var(--info-soft);
            color: var(--info);
            border: 1px solid var(--info-border);
        }

        .edit-button:hover {
            background: #d1fae5;
        }

        .delete-button {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .cancel-button {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-color);
        }

        .cancel-button:hover {
            background: #e2e8f0;
            color: var(--text-dark);
        }

        .save-edit-button {
            background: var(--success);
            color: white;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        }

        .save-edit-button:hover {
            background: #15803d;
        }

        /* FORM EDIT */
        .edit-form {
            display: none;
            margin-top: 18px;
            padding: 20px;
            background: white;
            border: 1.5px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .edit-form.active {
            display: block;
        }

        .edit-form-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 16px;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .edit-actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        @media (max-width: 850px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .grid { grid-template-columns: 1fr; }
            .card { padding: 22px; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                Panel Prestasi Pembina
            </div>
            <h1>Prestasi <span>Ekstrakurikuler</span></h1>
            <p>Kelola, tambahkan, dan perbarui rekam jejak prestasi gemilang dari ekstrakurikuler di bawah bimbingan Anda di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        @if (session('success'))
            <div class="success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin-top: 6px; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="grid">

            {{-- FORM TAMBAH PRESTASI --}}
            <div class="card">
                <h2>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Tambah Prestasi Baru
                </h2>

                <form action="{{ route('pembina.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="ekskul_id">Pilih Ekstrakurikuler</label>
                        <select name="ekskul_id" id="ekskul_id" required>
                            <option value="">-- Pilih Ekstrakurikuler --</option>
                            @foreach ($ekskul as $item)
                                <option value="{{ $item->id }}" {{ old('ekskul_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_ekskul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_prestasi">Nama Prestasi / Kejuaraan</label>
                        <input
                            type="text"
                            name="nama_prestasi"
                            id="nama_prestasi"
                            value="{{ old('nama_prestasi') }}"
                            placeholder="Contoh: Juara 1 Lomba Futsal Antar Pelajar"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="tingkat">Tingkat Kejuaraan</label>
                        <select name="tingkat" id="tingkat" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="Sekolah" {{ old('tingkat') == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                            <option value="Kecamatan" {{ old('tingkat') == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="Kabupaten" {{ old('tingkat') == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                            <option value="Provinsi" {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Perolehan</label>
                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            value="{{ old('tanggal') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi / Tempat Penyelenggaraan</label>
                        <input
                            type="text"
                            name="lokasi"
                            id="lokasi"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: GOR Saparua Bandung"
                        >
                    </div>

                    <div class="form-group">
                        <label for="dokumentasi">Dokumentasi (Upload Gambar)</label>
                        <input
                            type="file"
                            name="dokumentasi"
                            id="dokumentasi"
                            accept=".jpg,.jpeg,.png,.webp"
                        >
                        <small class="file-hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                        @error('dokumentasi')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="button">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Data Prestasi
                    </button>
                </form>
            </div>

            {{-- DAFTAR PRESTASI --}}
            <div class="card">
                <h2>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Daftar Prestasi Binaan
                </h2>

                @if ($ekskul->count() > 0)
                    @foreach ($ekskul as $item)
                        <div class="ekskul-title">
                            <h3>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                                {{ $item->nama_ekskul }}
                            </h3>
                        </div>

                        @if ($item->prestasi->count() > 0)
                            @foreach ($item->prestasi as $prestasi)
                                <div class="prestasi-item">
                                    <span class="badge">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                        Tingkat {{ $prestasi->tingkat }}
                                    </span>

                                    <h3>{{ $prestasi->nama_prestasi }}</h3>

                                    @if ($prestasi->tanggal)
                                        <p class="info">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <strong>Tanggal:</strong> {{ $prestasi->tanggal->format('d-m-Y') }}
                                        </p>
                                    @endif

                                    @if ($prestasi->lokasi)
                                        <p class="info">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                            <strong>Lokasi:</strong> {{ $prestasi->lokasi }}
                                        </p>
                                    @endif

                                    @if ($prestasi->dokumentasi)
                                        <div class="info info-dokumentasi">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                            <strong>Dokumentasi:</strong>
                                            @if ($prestasi->dokumentasi_gambar)
                                                <button
                                                    type="button"
                                                    class="dokumentasi-preview"
                                                    data-url="{{ $prestasi->dokumentasi_url }}"
                                                    onclick="window.open(this.dataset.url, '_blank', 'noopener,noreferrer')"
                                                    title="Lihat dokumentasi"
                                                >
                                                    <img src="{{ $prestasi->dokumentasi_url }}" alt="Dokumentasi {{ $prestasi->nama_prestasi }}">
                                                </button>
                                            @elseif ($prestasi->dokumentasi_url)
                                                <button
                                                    type="button"
                                                    class="dokumentasi-button"
                                                    data-url="{{ $prestasi->dokumentasi_url }}"
                                                    onclick="window.open(this.dataset.url, '_blank', 'noopener,noreferrer')"
                                                >
                                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                                                    Lihat Dokumentasi
                                                </button>
                                            @else
                                                {{ $prestasi->dokumentasi }}
                                            @endif
                                        </div>
                                    @endif

                                    {{-- TOMBOL EDIT DAN HAPUS --}}
                                    <div class="action-buttons">
                                        <button
                                            type="button"
                                            class="edit-button"
                                            onclick="toggleEdit({{ $prestasi->id }})"
                                        >
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit
                                        </button>

                                        <form
                                            action="{{ route('pembina.prestasi.destroy', $prestasi->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-button">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>

                                    {{-- FORM EDIT --}}
                                    <div id="edit-form-{{ $prestasi->id }}" class="edit-form">
                                        <div class="edit-form-title">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit Data Prestasi
                                        </div>

                                        <form action="{{ route('pembina.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label>Nama Prestasi</label>
                                                <input
                                                    type="text"
                                                    name="nama_prestasi"
                                                    value="{{ $prestasi->nama_prestasi }}"
                                                    required
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label>Tingkat</label>
                                                <select name="tingkat" required>
                                                    <option value="Sekolah" {{ $prestasi->tingkat == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                                                    <option value="Kecamatan" {{ $prestasi->tingkat == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                                                    <option value="Kabupaten" {{ $prestasi->tingkat == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                                                    <option value="Provinsi" {{ $prestasi->tingkat == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                                    <option value="Nasional" {{ $prestasi->tingkat == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                                    <option value="Internasional" {{ $prestasi->tingkat == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input
                                                    type="date"
                                                    name="tanggal"
                                                    value="{{ $prestasi->tanggal ? $prestasi->tanggal->format('Y-m-d') : '' }}"
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label>Lokasi</label>
                                                <input
                                                    type="text"
                                                    name="lokasi"
                                                    value="{{ $prestasi->lokasi }}"
                                                    placeholder="Contoh: GOR Bandung"
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label>Dokumentasi (Upload Gambar)</label>
                                                <input
                                                    type="file"
                                                    name="dokumentasi"
                                                    accept=".jpg,.jpeg,.png,.webp"
                                                >
                                                <small class="file-hint">Biarkan kosong jika tidak ingin mengganti dokumentasi. Format JPG, JPEG, PNG, atau WEBP, maksimal 2 MB.</small>
                                                @if ($prestasi->dokumentasi_url)
                                                    <div class="dokumentasi-current">
                                                        @if ($prestasi->dokumentasi_gambar)
                                                            <img src="{{ $prestasi->dokumentasi_url }}" alt="Dokumentasi {{ $prestasi->nama_prestasi }}">
                                                        @else
                                                            <span>Dokumentasi saat ini: tautan lama</span>
                                                        @endif
                                                    </div>
                                                @elseif ($prestasi->dokumentasi)
                                                    <div class="dokumentasi-current">
                                                        <span>{{ $prestasi->dokumentasi }}</span>
                                                    </div>
                                                @endif
                                                @error('dokumentasi')
                                                    <div class="form-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="edit-actions">
                                                <button type="submit" class="save-edit-button">
                                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                                    Simpan Perubahan
                                                </button>

                                                <button
                                                    type="button"
                                                    class="cancel-button"
                                                    onclick="toggleEdit({{ $prestasi->id }})"
                                                >
                                                    Batal
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="empty">
                                Belum ada prestasi untuk ekstrakurikuler ini.
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="empty">
                        Belum ada ekstrakurikuler yang ditugaskan kepada Anda.
                    </div>
                @endif
            </div>

        </section>

    </main>

    <script>
        function toggleEdit(id) {
            const form = document.getElementById('edit-form-' + id);
            if (form.classList.contains('active')) {
                form.classList.remove('active');
            } else {
                form.classList.add('active');
            }
        }
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>