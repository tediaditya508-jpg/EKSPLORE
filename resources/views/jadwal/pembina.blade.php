<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ekskul - Pembina | EKSPLORE</title>

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
            --warning: #d97706;
            --warning-soft: #fffbeb;
            --warning-border: #fde68a;
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
           HERO SECTION (KHUSUS PEMBINA - EMERALD THEME)
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
            max-width: 1150px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .card h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h2 svg {
            color: var(--primary-emerald);
        }

        .total-pill {
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            border: 1px solid var(--emerald-border);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
        }

        /* =========================
           MODERN TABLE STYLING
        ========================= */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid var(--border-color);
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: var(--text-muted);
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 16px 18px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            font-size: 14px;
            color: #334155;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        .nama-ekskul {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 14.5px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-rutin {
            background: var(--emerald-soft);
            color: var(--primary-emerald-hover);
            border: 1px solid var(--emerald-border);
        }

        .badge-event {
            background: var(--warning-soft);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .nama-event {
            font-weight: 700;
            color: #b45309;
        }

        .kegiatan-rutin {
            color: var(--text-muted);
            font-weight: 500;
        }

        .date-cell,
        .jam-cell,
        .lokasi-cell {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: #475569;
            white-space: nowrap;
        }

        .date-cell svg,
        .jam-cell svg,
        .lokasi-cell svg {
            color: var(--primary-emerald);
            flex-shrink: 0;
        }

        /* =========================
           EMPTY STATE
        ========================= */
        .empty {
            text-align: center;
            padding: 55px 20px;
            color: var(--text-muted);
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
            line-height: 1.6;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 768px) {
            .hero {
                padding: 45px 20px 70px;
            }
            .hero h1 {
                font-size: 26px;
            }
            .container {
                margin: -25px 16px 40px;
                padding: 0;
            }
            .card {
                padding: 20px;
            }
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
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                Panel Jadwal Pembina
            </div>
            <h1>Jadwal <span>Ekstrakurikuler</span></h1>
            <p>Pantau seluruh jadwal latihan rutin maupun agenda event khusus dari ekstrakurikuler yang Anda bina di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        <section class="card">
            <div class="card-header">
                <h2>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M8 7h6"/><path d="M8 11h8"/></svg>
                    Daftar Jadwal Kegiatan
                </h2>

                @if ($jadwal->count() > 0)
                    <span class="total-pill">{{ $jadwal->count() }} Jadwal Terdaftar</span>
                @endif
            </div>

            @if ($jadwal->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Ekstrakurikuler</th>
                                <th>Jenis</th>
                                <th>Nama Kegiatan</th>
                                <th>Hari / Tanggal</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jadwal as $item)
                                <tr>
                                    <td class="nama-ekskul">
                                        {{ $item->ekstrakurikuler->nama_ekskul
                                            ?? $item->ekstrakurikuler->nama
                                            ?? '-' }}
                                    </td>

                                    <td>
                                        @if (($item->jenis ?? 'rutin') === 'event')
                                            <span class="badge badge-event">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                                Event
                                            </span>
                                        @else
                                            <span class="badge badge-rutin">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                                                Rutin
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($item->jenis ?? 'rutin') === 'event')
                                            <span class="nama-event">
                                                {{ $item->nama_event ?: 'Event ekstrakurikuler' }}
                                            </span>
                                        @else
                                            <span class="kegiatan-rutin">Kegiatan rutin</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="date-cell">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            @if (($item->jenis ?? 'rutin') === 'event')
                                                @if ($item->tanggal_event)
                                                    {{ \Carbon\Carbon::parse($item->tanggal_event)->format('d-m-Y') }}
                                                @else
                                                    -
                                                @endif
                                            @else
                                                {{ $item->hari ?? '-' }}
                                            @endif
                                        </span>
                                    </td>

                                    <td>
                                        <span class="jam-cell">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            @if ($item->jam_mulai && $item->jam_selesai)
                                                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>

                                    <td>
                                        <span class="lokasi-cell">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                            {{ $item->lokasi ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    </div>
                    <h3>Belum Ada Jadwal</h3>
                    <p>Saat ini belum ada jadwal latihan rutin maupun event untuk ekstrakurikuler yang Anda bina.</p>
                </div>
            @endif
        </section>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>