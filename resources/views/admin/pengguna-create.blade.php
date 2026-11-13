<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna - EKSPLORE Admin</title>

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
        .form-group select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
            background: #ffffff;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* =========================
           ERROR & INFO BOX
        ========================= */
        .error {
            background: #fef2f2;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            border: 1px solid #fecaca;
            font-size: 14px;
            font-weight: 700;
        }

        .error ul {
            margin-top: 6px;
            padding-left: 18px;
            font-weight: 500;
        }

        /* =========================
           BUTTONS
        ========================= */
        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .button-save {
            background: var(--admin-primary);
            color: white;
            border: none;
            padding: 13px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
            transition: all 0.2s ease;
            flex: 1;
        }

        .button-save:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
        }

        .button-cancel {
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .button-cancel:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 768px) {
            .admin-hero { padding: 44px 20px 72px; }
            .hero-inner h1 { font-size: 26px; }
            .container { margin: -35px auto 40px; padding: 0 14px; }
            .card { padding: 22px; }
            .form-row { grid-template-columns: 1fr; gap: 0; }
            .actions { flex-direction: column-reverse; }
            .button-save,
            .button-cancel { width: 100%; }
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
            <h1>Tambah <span>Pengguna</span></h1>
            <p>Daftarkan akun pengguna baru ke dalam sistem untuk memberikan akses sesuai perannya.</p>
        </div>
    </section>

    <main class="container">

        <div class="card">

            {{-- =========================
                 ERROR VALIDASI
            ========================= --}}
            @if ($errors->any())
                <div class="error">
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

            {{-- =========================
                 FORM
            ========================= --}}
            <form action="{{ route('admin.pengguna.store') }}" method="POST">
                @csrf

                {{-- NAMA --}}
                <div class="form-group">
                    <label for="name">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Nama Lengkap
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Tedi Aditya"
                        required
                    >
                </div>

                {{-- EMAIL --}}
                <div class="form-group">
                    <label for="email">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Alamat Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Contoh: nama@gmail.com"
                        required
                    >
                </div>

                {{-- PASSWORD + KONFIRMASI --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Konfirmasi Password
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >
                    </div>
                </div>

                {{-- ROLE --}}
                <div class="form-group">
                    <label for="role">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        Hak Akses Role Pengguna
                    </label>
                    <select id="role" name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="pembina" {{ old('role') === 'pembina' ? 'selected' : '' }}>Pembina</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="actions">
                    <a href="{{ route('admin.pengguna') }}" class="button-cancel">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>

                    <button type="submit" class="button-save">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                        Simpan Pengguna Baru
                    </button>
                </div>

            </form>

        </div>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>