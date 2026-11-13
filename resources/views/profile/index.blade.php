<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - EKSPLORE</title>

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

        .profile-card {
            background: white;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .profile-top {
            display: flex;
            align-items: center;
            gap: 24px;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .avatar-wrapper {
            position: relative;
        }

        .avatar,
        .avatar-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .avatar {
            background: var(--primary-soft);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: 800;
            overflow: hidden;
            border: 3px solid white;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
        }

        .avatar-image {
            object-fit: cover;
            display: block;
        }

        .profile-top > div:not(.avatar-wrapper) {
            flex: 1;
            min-width: 240px;
        }

        .profile-top h2 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 4px;
            color: var(--text-dark);
            letter-spacing: -0.3px;
        }

        .profile-top p {
            color: var(--text-muted);
            font-size: 14px;
        }

        .photo-actions {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* BUTTONS */
        .btn {
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            color: var(--text-dark);
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
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .error ul {
            padding-left: 18px;
            margin-top: 6px;
        }

        /* INFO SECTION */
        .info-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .info-item {
            background: #f8fafc;
            border-radius: 16px;
            padding: 18px 20px;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .info-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
        }

        .label {
            display: block;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .value {
            font-size: 15.5px;
            font-weight: 700;
            color: var(--text-dark);
            word-break: break-word;
        }

        .role {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--primary-soft);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 700;
            border: 1px solid #bfdbfe;
        }

        /* EDIT SECTION */
        .edit-section {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
        }

        .edit-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-top: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-family: var(--font-sans);
            background: #f8fafc;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-group input:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        #editForm,
        #photoForm {
            display: none;
        }

        .photo-form {
            margin-top: 14px;
            background: #f8fafc;
            padding: 16px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .photo-form input[type="file"] {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .profile-card { padding: 22px; }
            .info-grid,
            .edit-form {
                grid-template-columns: 1fr;
            }
            .profile-top {
                align-items: flex-start;
            }
            .form-actions {
                flex-direction: column;
            }
            .btn { width: 100%; justify-content: center; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Manajemen Akun Siswa
            </div>
            <h1>Profil <span>Pengguna</span></h1>
            <p>Kelola informasi data diri, nomor kontak, serta foto profil akun EKSPLORE kamu di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- CONTAINER UTAMA -->
    <div class="container">

        <div class="profile-card">

            {{-- PESAN BERHASIL --}}
            @if (session('success'))
                <div class="success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="error">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- BAGIAN FOTO DAN IDENTITAS --}}
            <div class="profile-top">

                <div class="avatar-wrapper">
                    @if ($siswa->foto)
                        <div class="avatar">
                            <img
                                src="{{ asset('storage/' . $siswa->foto) }}"
                                alt="Foto Profil"
                                class="avatar-image"
                            >
                        </div>
                    @else
                        <div class="avatar">
                            {{ strtoupper(substr($siswa->name ?? $siswa->nama ?? 'S', 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div>
                    <h2>{{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}</h2>
                    <p>{{ $siswa->email }}</p>

                    {{-- TOMBOL FOTO --}}
                    <div class="photo-actions">
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="document.getElementById('photoForm').style.display='flex'"
                        >
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                            <span>{{ $siswa->foto ? 'Ubah Foto Profil' : 'Tambah Foto Profil' }}</span>
                        </button>

                        @if ($siswa->foto)
                            <form
                                action="{{ route('profile.foto.delete') }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto profil?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    <span>Hapus Foto</span>
                                </button>
                            </form>
                        @endif
                    </div>

                    {{-- FORM FOTO --}}
                    <form
                        id="photoForm"
                        class="photo-form"
                        action="{{ route('profile.foto.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <label style="font-size: 12.5px; font-weight: 700; color: #475569;">Pilih File Gambar Baru (.jpg, .png, .webp):</label>
                        <input
                            type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                        >
                        <div style="display: flex; gap: 8px;">
                            <button type="submit" class="btn btn-primary">Simpan Foto</button>
                            <button
                                type="button"
                                class="btn btn-secondary"
                                onclick="document.getElementById('photoForm').style.display='none'"
                            >
                                Batal
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            {{-- INFORMASI SISWA --}}
            <h3 class="info-title">Informasi Detail Siswa</h3>

            <div class="info-grid">

                <div class="info-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">{{ $siswa->name ?? $siswa->nama ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Email Akun</span>
                    <span class="value">{{ $siswa->email ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Nomor Induk Siswa (NIS)</span>
                    <span class="value">{{ $siswa->nis ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Kelas / Rombel</span>
                    <span class="value">{{ $siswa->kelas ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Nomor WhatsApp / HP</span>
                    <span class="value">{{ $siswa->no_hp ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Hak Akses Sistem</span>
                    <span class="value">
                        <span class="role">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            {{ ucfirst($siswa->role ?? 'siswa') }}
                        </span>
                    </span>
                </div>

            </div>

            {{-- EDIT BIODATA --}}
            <div class="edit-section">

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="document.getElementById('editForm').style.display='grid'; this.style.display='none'"
                >
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span>Edit Biodata Siswa</span>
                </button>

                <form
                    id="editForm"
                    class="edit-form"
                    action="{{ route('profile.update') }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <div class="form-group full">
                        <label for="name">Nama Lengkap</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $siswa->name ?? $siswa->nama) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="nis">NIS (Nomor Induk Siswa)</label>
                        <input
                            type="text"
                            id="nis"
                            name="nis"
                            value="{{ old('nis', $siswa->nis) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input
                            type="text"
                            id="kelas"
                            name="kelas"
                            value="{{ old('kelas', $siswa->kelas) }}"
                        >
                    </div>

                    <div class="form-group full">
                        <label for="no_hp">Nomor HP / WhatsApp</label>
                        <input
                            type="text"
                            id="no_hp"
                            name="no_hp"
                            value="{{ old('no_hp', $siswa->no_hp) }}"
                        >
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Simpan Perubahan Biodata</span>
                        </button>

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="document.getElementById('editForm').style.display='none'; document.querySelector('.edit-section > button').style.display='inline-flex'"
                        >
                            Batal
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>