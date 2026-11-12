<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Siswa - EKSPLORE</title>

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
            --text-dark: #172554;
            --text-muted: #5f7189;
            --border-color: #dbe2ea;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            min-height: 100vh;
            background: #f3f6fb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           WRAPPER UTAMA
        ========================= */
        .register-wrapper {
            width: 100%;
            max-width: 1080px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
        }

        /* =========================
           LEFT SIDE (SAMA PERSIS DENGAN REFERENSI)
        ========================= */
        .left-side {
            position: relative;
            background: linear-gradient(145deg, #eaf4ff 0%, #dceeff 48%, #f5faff 100%);
            padding: 42px 50px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .circle-one {
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.07);
            top: -100px;
            left: -80px;
        }

        .circle-two {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.06);
            right: -160px;
            bottom: -160px;
        }

        .left-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* BRAND */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.22);
        }

        .brand-name {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #102a5c;
        }

        /* LOGO AREA DENGAN EFEK GERAK */
        .logo-area {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }

        .logo-area img {
            width: 180px;
            height: 180px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 10px 20px rgba(15, 23, 42, 0.08));
            animation: floatingLogo 5s ease-in-out infinite;
        }

        @keyframes floatingLogo {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        /* KATA-KATA */
        .left-title {
            font-size: 28px;
            line-height: 1.18;
            color: #172554;
            margin-bottom: 12px;
            max-width: 430px;
            font-weight: 800;
        }

        .left-title span {
            color: #2563eb;
        }

        .left-description {
            color: #5f7189;
            font-size: 13.5px;
            line-height: 1.65;
            max-width: 440px;
            margin-bottom: 18px;
        }

        /* FITUR (TANPA EMOTIKON) */
        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 20px;
            padding: 7px 12px;
            color: #355174;
            font-size: 11.5px;
            font-weight: 600;
            backdrop-filter: blur(5px);
        }

        .left-footer {
            position: relative;
            z-index: 2;
            margin-top: auto;
            padding-top: 15px;
            color: #64748b;
            font-size: 12px;
        }

        /* =========================
           RIGHT SIDE (FORM REGISTER)
        ========================= */
        .right-side {
            background: #ffffff;
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 92vh;
            overflow-y: auto;
        }

        .right-side::-webkit-scrollbar {
            width: 5px;
        }
        .right-side::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .mobile-brand-header {
            display: none;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-color);
        }

        .register-container {
            width: 100%;
            max-width: 390px;
            margin: 0 auto;
        }

        .role-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .login-title {
            color: #172033;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-subtitle {
            color: #64748b;
            font-size: 13.5px;
            line-height: 1.5;
            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #334155;
            font-size: 13px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            display: flex;
            align-items: center;
            pointer-events: none;
        }

        input, select {
            width: 100%;
            height: 46px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            background: #ffffff;
            padding: 0 15px 0 42px;
            color: #1e293b;
            font-size: 13.5px;
            outline: none;
            transition: 0.2s ease;
        }

        select {
            padding-left: 15px;
            cursor: pointer;
        }

        input:focus, select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        input::placeholder {
            color: #a1aab8;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }

        .password-toggle:hover {
            color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .register-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.20);
            margin-top: 5px;
        }

        .register-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            color: #64748b;
            font-size: 13px;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 700;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 850px) {
            body { padding: 15px; }
            .register-wrapper {
                grid-template-columns: 1fr;
                max-width: 460px;
                min-height: auto;
            }
            .left-side { display: none; }
            .mobile-brand-header { display: flex; }
            .right-side { padding: 35px 28px; max-height: none; overflow-y: visible; }
        }

        @media (max-width: 480px) {
            body { padding: 0; }
            .register-wrapper { border-radius: 0; min-height: 100vh; }
            .right-side { padding: 30px 20px; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

    <div class="register-wrapper">

        {{-- =========================
             LEFT SIDE
        ========================= --}}
        <div class="left-side">
            <div class="circle-one"></div>
            <div class="circle-two"></div>

            <div class="left-content">
                {{-- BRAND --}}
                <div class="brand">
                    <div class="brand-icon">E</div>
                    <div class="brand-name">EKSPLORE</div>
                </div>

                {{-- LOGO EKSPLORE (BERGERAK) --}}
                <div class="logo-area">
                    <img src="{{ asset('images/logo-ekspore.png') }}" alt="Logo EKSPLORE">
                </div>

                {{-- KATA-KATA --}}
                <h1 class="left-title">
                    Mulai perjalananmu bersama <span>EKSPLORE</span>.
                </h1>

                <p class="left-description">
                    Daftarkan akun siswa Anda untuk mengakses sistem pendaftaran ekstrakurikuler, memantau jadwal kegiatan, dan mencatat prestasi.
                </p>

                {{-- FITUR (TANPA EMOTIKON) --}}
                <div class="features">
                    <div class="feature">Pendaftaran Mudah</div>
                    <div class="feature">Pilihan Ekskul Lengkap</div>
                    <div class="feature">Absensi & Jadwal</div>
                    <div class="feature">Prestasi Siswa</div>
                </div>

                {{-- FOOTER --}}
                <div class="left-footer">
                    © {{ date('Y') }} EKSPLORE — SMK Budi Bakti Ciwidey
                </div>
            </div>
        </div>

        {{-- =========================
             RIGHT SIDE (FORM)
        ========================= --}}
        <div class="right-side">
            <div class="register-container">

                <div class="mobile-brand-header">
                    <div class="brand-icon" style="width: 40px; height: 40px; font-size: 18px;">E</div>
                    <div>
                        <strong style="font-size: 16px; font-weight: 800; color: #172554;">EKSPLORE</strong>
                        <span style="font-size: 11px; color: #64748b; display: block;">SMK Budi Bakti Ciwidey</span>
                    </div>
                </div>

                <div class="role-badge">
                    PENDAFTARAN AKUN SISWA
                </div>

                <h2 class="login-title">Buat Akun Baru</h2>
                <p class="login-subtitle">
                    Silakan isi data diri Anda dengan benar untuk mendaftar ke EKSPLORE.
                </p>

                <form action="{{ route('register.process') }}" method="POST" id="registerForm">
                    @csrf

                    {{-- NAMA LENGKAP --}}
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            </span>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                required
                            >
                        </div>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NIS --}}
                    <div class="form-group">
                        <label for="nis">NIS (Nomor Induk Siswa)</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 7h10"/><path d="M7 12h10"/><path d="M7 17h10"/></svg>
                            </span>
                            <input
                                type="text"
                                id="nis"
                                name="nis"
                                value="{{ old('nis') }}"
                                placeholder="Masukkan NIS"
                                required
                            >
                        </div>
                        @error('nis')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KELAS --}}
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select id="kelas" name="kelas" required>
                            <option value="">-- Pilih Kelas --</option>
                            <optgroup label="RPL">
                                @foreach (['10 RPL 1', '10 RPL 2', '10 RPL 3', '10 RPL 4'] as $kelas)
                                    <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="BRP">
                                @foreach ([
                                    '10 BRP 1', '10 BRP 2', '10 BRP 3',
                                    '10 BRP 4', '10 BRP 5', '10 BRP 6', '10 BRP 7'
                                ] as $kelas)
                                    <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="DKV">
                                @foreach (['10 DKV 1', '10 DKV 2'] as $kelas)
                                    <option value="{{ $kelas }}" @selected(old('kelas') == $kelas)>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('kelas')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NOMOR HP --}}
                    <div class="form-group">
                        <label for="no_hp">Nomor HP / WhatsApp</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </span>
                            <input
                                type="tel"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="08xxxxxxxxxx"
                                required
                            >
                        </div>
                        @error('no_hp')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email aktif"
                                required
                            >
                        </div>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Minimal 8 karakter"
                                style="padding-right: 75px;"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('password', this)" id="passToggle1">Lihat</button>
                        </div>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                style="padding-right: 75px;"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)" id="passToggle2">Lihat</button>
                        </div>
                    </div>

                    <button type="submit" class="register-button" id="submitBtn">
                        Daftar Akun Sekarang
                    </button>
                </form>

                <div class="login-link">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login di sini</a>
                </div>

            </div>
        </div>

    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const field = document.getElementById(fieldId);
            if (field.type === 'password') {
                field.type = 'text';
                btn.textContent = 'Sembunyikan';
            } else {
                field.type = 'password';
                btn.textContent = 'Lihat';
            }
        }

        document.getElementById('registerForm').addEventListener('submit', function() {
            const btn = document.getElementById('submitBtn');
            btn.style.opacity = '0.85';
            btn.textContent = 'Memproses...';
        });
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>

</html>