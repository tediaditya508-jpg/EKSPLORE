<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Ekskul - Pembina | EKSPLORE</title>

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

        /* SUMMARY STATS GRID */
        .summary {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: white;
            padding: 24px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .summary-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: var(--emerald-soft);
            color: var(--primary-emerald);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid var(--emerald-border);
        }

        .summary-card span {
            display: block;
            color: var(--text-muted);
            font-size: 12.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .summary-card strong {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-dark);
        }

        /* CARD EKSKUL & ANGGOTA */
        .card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .card-title {
            margin-bottom: 24px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title svg {
            color: var(--primary-emerald);
        }

        /* MEMBER LIST GRID */
        .member-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 16px;
        }

        .member {
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 22px;
            transition: all 0.2s ease;
        }

        .member:hover {
            border-color: #cbd5e1;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
            background: white;
        }

        .member-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 15px;
            border: 1px solid var(--emerald-border);
            flex-shrink: 0;
        }

        .member h3 {
            font-size: 16px;
            font-weight: 800;
            color: var(--text-dark);
            overflow-wrap: anywhere;
        }

        .info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 13.5px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .label {
            color: var(--text-muted);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .label svg {
            color: var(--primary-emerald);
        }

        .value {
            font-weight: 700;
            color: var(--text-dark);
            text-align: right;
            word-break: break-word;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--success-soft);
            color: #15803d;
            border: 1px solid var(--success-border);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .empty-card {
            background: white;
            padding: 60px 20px;
            border-radius: 24px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
            border: 1px solid var(--border-color);
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

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .summary { grid-template-columns: 1fr; }
            .card { padding: 20px; }
            .member-grid { grid-template-columns: 1fr; }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Panel Anggota Pembina
            </div>
            <h1>Daftar Anggota <span>Ekstrakurikuler</span></h1>
            <p>Kelola dan pantau seluruh siswa yang terdaftar secara aktif dalam ekstrakurikuler di bawah bimbingan Anda di SMK Budi Bakti Ciwidey</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <div class="container">

        <!-- RINGKASAN STATISTIK -->
        <div class="summary">
            <div class="summary-card">
                <div class="summary-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                </div>
                <div>
                    <span>Total Ekskul Dibina</span>
                    <strong>{{ $ekskul->count() }}</strong>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <span>Total Anggota Aktif</span>
                    <strong>{{ $anggota->count() }}</strong>
                </div>
            </div>
        </div>

        @forelse ($ekskul as $item)

            <div class="card">

                <h2 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M8 7h6"/><path d="M8 11h8"/></svg>
                    {{ $item->nama_ekskul }}
                </h2>

                @php
                    $anggotaEkskul = $anggota->where('ekskul_id', $item->id);
                @endphp

                @if ($anggotaEkskul->count() > 0)
                    <div class="member-grid">
                        @foreach ($anggotaEkskul as $member)
                            @php
                                $namaSiswa = $member->siswa->nama ?? $member->siswa->name ?? 'Siswa';
                            @endphp

                            <div class="member">
                                <div class="member-header">
                                    <div class="member-avatar">
                                        {{ strtoupper(substr($namaSiswa, 0, 1)) }}
                                    </div>
                                    <h3>{{ $namaSiswa }}</h3>
                                </div>

                                <div class="info">
                                    <div class="info-row">
                                        <span class="label">NIS</span>
                                        <span class="value">{{ $member->siswa->nis ?? '-' }}</span>
                                    </div>

                                    <div class="info-row">
                                        <span class="label">Kelas</span>
                                        <span class="value">{{ $member->siswa->kelas ?? '-' }}</span>
                                    </div>

                                    <div class="info-row">
                                        <span class="label">No. HP / WhatsApp</span>
                                        <span class="value">{{ $member->siswa->no_hp ?? '-' }}</span>
                                    </div>

                                    <div class="info-row">
                                        <span class="label">Email</span>
                                        <span class="value">{{ $member->siswa->email ?? '-' }}</span>
                                    </div>

                                    <div class="info-row">
                                        <span class="label">Tanggal Bergabung</span>
                                        <span class="value">
                                            {{ $member->tanggal_daftar ? \Carbon\Carbon::parse($member->tanggal_daftar)->translatedFormat('d M Y') : '-' }}
                                        </span>
                                    </div>

                                    <div class="info-row" style="margin-top: 6px; padding-top: 10px; border-top: 1px dashed var(--border-color);">
                                        <span class="label">Status Keanggotaan</span>
                                        <span class="value">
                                            <span class="status">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                                {{ ucfirst($member->status) }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty">
                        Belum ada anggota aktif yang terdaftar pada ekstrakurikuler ini.
                    </div>
                @endif

            </div>

        @empty

            <div class="empty-card">
                <div class="empty-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </div>
                <h3>Belum Ada Ekstrakurikuler</h3>
                <p>Anda belum memiliki ekstrakurikuler yang ditugaskan untuk dibina.</p>
            </div>

        @endforelse

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>