<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran {{ $ekskul->nama_ekskul }} - EKSPLORE</title>

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
            max-width: 800px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .card-header-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 13.5px;
            margin-bottom: 24px;
        }

        /* INFORMASI EKSKUL CARD */
        .info {
            background: #f8fafc;
            padding: 22px;
            border-radius: 18px;
            border: 1px solid var(--border-color);
            margin-bottom: 28px;
        }

        .info h2 {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
        }

        .info-item {
            font-size: 13.5px;
            color: #475569;
            background: white;
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .info-item strong {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        /* ERROR ALERT */
        .error {
            background: var(--danger-soft);
            color: var(--danger);
            border: 1px solid var(--danger-border);
            padding: 14px 18px;
            border-radius: 14px;
            font-size: 13.5px;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .error p {
            margin: 4px 0;
        }

        /* FORM FIELD */
        label {
            display: block;
            font-weight: 700;
            color: #334155;
            font-size: 13.5px;
            margin-bottom: 8px;
        }

        textarea {
            width: 100%;
            min-height: 140px;
            padding: 14px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 14px;
            resize: vertical;
            font-family: var(--font-sans);
            font-size: 14px;
            color: var(--text-dark);
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        textarea:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        /* BUTTONS */
        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            border: none;
            border-radius: 14px;
            padding: 13px 22px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            flex-grow: 1;
            box-shadow: 0 6px 20px -4px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.45);
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

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .card { padding: 22px; }
            .buttons { flex-direction: column-reverse; }
            .btn { width: 100%; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 11v6"/><path d="M22 14h-6"/></svg>
                Formulir Pendaftaran Siswa
            </div>
            <h1>Pendaftaran <span>Ekstrakurikuler</span></h1>
            <p>Daftarkan diri kamu dan kembangkan potensi terbaikmu melalui kegiatan ekstrakurikuler di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <div class="container">

        <div class="card">

            <div class="card-header-title">Formulir Pengajuan Bergabung</div>
            <p class="subtitle">
                Silakan tinjau informasi kegiatan dan lengkapi alasan pendaftaran kamu di bawah ini.
            </p>

            <!-- INFORMASI DETAIL EKSKUL -->
            <div class="info">
                <h2>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                    {{ $ekskul->nama_ekskul }}
                </h2>

                <div class="info-grid">
                    <div class="info-item">
                        <strong>Lokasi Kegiatan</strong>
                        {{ $ekskul->lokasi ?? '-' }}
                    </div>
                    <div class="info-item">
                        <strong>Hari / Jadwal</strong>
                        {{ $ekskul->jadwal ?? '-' }}
                    </div>
                    <div class="info-item">
                        <strong>Jam Latihan</strong>
                        {{ $ekskul->jam ?? '-' }}
                    </div>
                    <div class="info-item">
                        <strong>Ketersediaan Kuota</strong>
                        {{ $ekskul->kuota ?? '-' }} Siswa
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <p>⚠️ {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('pendaftaran.store', $ekskul->id) }}" method="POST">
                @csrf

                <div>
                    <label for="alasan">
                        Alasan / Motivasi Mengikuti Ekstrakurikuler Ini
                    </label>

                    <textarea
                        name="alasan"
                        id="alasan"
                        placeholder="Tuliskan alasan dan motivasi kamu ingin bergabung serta apa yang ingin kamu capai..."
                        required
                    >{{ old('alasan') }}</textarea>
                </div>

                <div class="buttons">
                    <a
                        href="{{ route('ekskul.show', $ekskul->id) }}"
                        class="btn btn-secondary"
                    >
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Kirim Pendaftaran Sekarang
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>