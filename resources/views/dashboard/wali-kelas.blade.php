<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Kelas - EKSPLORE</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary: #047857;
            --primary-dark: #065f46;
            --primary-deep: #064e3b;
            --primary-light: #ecfdf5;
            --primary-border: #a7f3d0;
            --bg: #f1f5f9;
            --card-bg: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --shadow-sm: 0 4px 16px -4px rgba(15, 23, 42, 0.06);
            --shadow-md: 0 12px 30px -10px rgba(15, 23, 42, 0.1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-sans);
        }

        body {
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           SIDEBAR & LOGO "E" HIDUP
        ========================= */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 264px;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            border-right: 1px solid var(--border);
            padding: 24px 18px;
            display: flex;
            flex-direction: column;
            z-index: 30;
            box-shadow: 4px 0 24px rgba(15, 23, 42, 0.03);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 22px;
        }

        .brand-logo-wrap {
            position: relative;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
        }

        .brand-logo-wrap::before {
            content: "";
            position: absolute;
            inset: -3px;
            border-radius: 16px;
            background: linear-gradient(135deg, #10b981, #047857, #34d399);
            opacity: 0.45;
            filter: blur(6px);
            animation: logoGlow 2.4s ease-in-out infinite;
            z-index: 0;
        }

        .brand-logo {
            position: relative;
            z-index: 1;
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: linear-gradient(135deg, #059669 0%, #047857 55%, #064e3b 100%);
            color: #ffffff;
            font-weight: 800;
            font-size: 22px;
            letter-spacing: -0.5px;
            box-shadow: 0 8px 18px rgba(4, 120, 87, 0.28);
            animation: logoPulse 2.4s ease-in-out infinite;
            overflow: hidden;
        }

        .brand-logo::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -75%;
            width: 50%;
            height: 200%;
            background: rgba(255, 255, 255, 0.35);
            transform: rotate(25deg);
            animation: logoShine 3.6s ease-in-out infinite;
        }

        .live-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            z-index: 2;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #10b981;
            border: 2px solid #ffffff;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            animation: livePing 1.8s infinite;
        }

        @keyframes logoPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes logoGlow {
            0%, 100% {
                opacity: 0.35;
                transform: scale(0.98);
            }
            50% {
                opacity: 0.75;
                transform: scale(1.06);
            }
        }

        @keyframes logoShine {
            0% {
                left: -80%;
            }
            45%, 100% {
                left: 140%;
            }
        }

        @keyframes livePing {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.65);
            }
            70% {
                box-shadow: 0 0 0 7px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .brand h2 {
            font-size: 17px;
            font-weight: 800;
            color: var(--primary-deep);
            letter-spacing: -0.2px;
        }

        .brand p {
            color: var(--muted);
            font-size: 11.5px;
            font-weight: 500;
            margin-top: 2px;
        }

        .menu-label {
            color: #94a3b8;
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: 0.8px;
            margin-bottom: 10px;
            padding-left: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 12px;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
            font-size: 13.5px;
            font-weight: 700;
        }

        .logout {
            margin-top: auto;
            padding-top: 18px;
        }

        .logout button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid #fecaca;
            padding: 12px 14px;
            border-radius: 12px;
            background: #fef2f2;
            color: #dc2626;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout button:hover {
            background: #fee2e2;
            transform: translateY(-1px);
        }

        /* =========================
           MAIN CONTENT & HEADER
        ========================= */
        .main-content {
            margin-left: 264px;
            padding: 28px 32px 48px;
        }

        .header {
            position: relative;
            background: linear-gradient(135deg, #064e3b 0%, #047857 55%, #059669 100%);
            color: #ffffff;
            border-radius: 20px;
            padding: 26px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .header::after {
            content: "";
            position: absolute;
            right: -60px;
            top: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .header-text {
            position: relative;
            z-index: 1;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .header p {
            color: #d1fae5;
            font-size: 13.5px;
            margin-top: 5px;
        }

        .profile {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.28);
            backdrop-filter: blur(8px);
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* =========================
           STATS CARDS
        ========================= */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card, .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .stat-card span {
            display: block;
            color: var(--muted);
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
        }

        .stat-card strong {
            font-size: 28px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.5px;
        }

        /* =========================
           CARD & TABLE
        ========================= */
        .card {
            margin-bottom: 22px;
        }

        .card-top-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .card h3 {
            font-size: 17px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 4px;
        }

        .card-description {
            color: var(--muted);
            font-size: 12.5px;
            margin-bottom: 0;
        }

        .print-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(4, 120, 87, 0.24);
            transition: all 0.2s ease;
        }

        .print-button:hover {
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
            transform: translateY(-1px);
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .screen-only table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
            font-size: 12.5px;
        }

        .screen-only th {
            background: #f8fafc;
            color: #334155;
            font-weight: 700;
            text-align: left;
            padding: 13px 12px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .screen-only td {
            padding: 13px 12px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .screen-only tbody tr:last-child td {
            border-bottom: none;
        }

        .screen-only tbody tr:hover td {
            background: #f8fafc;
        }

        .student-name {
            font-weight: 700;
            color: var(--text);
        }

        .muted {
            color: var(--muted);
            font-size: 12px;
            font-style: italic;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 8px;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
            font-size: 11.5px;
            font-weight: 800;
        }

        .empty {
            padding: 28px;
            text-align: center;
            color: var(--muted);
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            font-size: 13px;
        }

        .notice {
            padding: 15px 18px;
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           PRINT AREA & HEADER LAPORAN
        ========================= */
        .print-area {
            display: none;
        }

        .report-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 18px;
            border-bottom: 3px solid #111827;
            padding-bottom: 12px;
            margin-bottom: 14px;
            text-align: left;
        }

        .report-header img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .report-school {
            flex: 1;
            text-align: center;
        }

        .report-school h2 {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .report-school p {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .report-school ul {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 10.5px;
            font-weight: 500;
            line-height: 1.4;
            color: #374151;
        }

        @media print {
            @page {
                size: A4;
                margin: 14mm 15mm;
            }

            .sidebar,
            .header,
            .stats,
            .screen-only {
                display: none !important;
            }

            .main-content {
                margin: 0 !important;
                padding: 0 !important;
            }

            .print-area {
                display: block !important;
            }

            .print-student {
                break-after: page;
                page-break-after: always;
                font-family: Arial, sans-serif;
                color: #111827;
            }

            .print-student:last-child {
                break-after: auto;
                page-break-after: auto;
            }

            .print-student .biodata-table {
                width: 100% !important;
                min-width: 0 !important;
                border-collapse: collapse !important;
                margin-bottom: 14px !important;
                font-size: 11px !important;
            }

            .print-student .biodata-table td {
                border: none !important;
                padding: 3px 4px !important;
                vertical-align: top !important;
            }

            .print-student .biodata-label {
                width: 125px !important;
                font-weight: 600 !important;
            }

            .print-student .biodata-sep {
                width: 14px !important;
                text-align: center !important;
            }

            .print-student h4 {
                font-size: 12px !important;
                font-weight: 700 !important;
                margin-bottom: 8px !important;
                text-transform: uppercase !important;
                letter-spacing: 0.4px !important;
            }

            .print-student .nilai-table {
                width: 100% !important;
                min-width: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                font-size: 10.5px !important;
            }

            .print-student .nilai-table th,
            .print-student .nilai-table td {
                border: 1px solid #4b5563 !important;
                padding: 7px 6px !important;
                vertical-align: middle !important;
                word-wrap: break-word !important;
                overflow-wrap: break-word !important;
            }

            .print-student .nilai-table th {
                background: #f3f4f6 !important;
                color: #111827 !important;
                font-weight: 700 !important;
                text-align: center !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .print-student .nilai-table th:nth-child(2),
            .print-student .nilai-table td:nth-child(2) {
                text-align: left !important;
            }

            .print-student .nilai-table td:nth-child(1),
            .print-student .nilai-table td:nth-child(3),
            .print-student .nilai-table td:nth-child(4),
            .print-student .nilai-table td:nth-child(5),
            .print-student .nilai-table td:nth-child(6),
            .print-student .nilai-table td:nth-child(7),
            .print-student .nilai-table td:nth-child(8) {
                text-align: center !important;
            }

            .print-student .nilai-table td.kosong-nilai {
                text-align: center !important;
                color: #6b7280 !important;
                font-style: italic !important;
            }

            .signature-area {
                display: flex !important;
                justify-content: space-between !important;
                gap: 40px !important;
                margin-top: 48px !important;
                text-align: center !important;
                font-size: 11px !important;
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }

            .signature-area > div {
                width: 45% !important;
            }

            .signature-line {
                margin-top: 56px !important;
                font-weight: 700 !important;
            }
        }

        /* =========================
           RESPONSIVE HP & TABLET
        ========================= */
        @media (max-width: 900px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 16px;
                box-shadow: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 14px;
                padding-bottom: 14px;
            }

            .logout {
                margin-top: 14px;
                padding-top: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 16px 14px 36px;
            }

            .header {
                padding: 20px;
                border-radius: 16px;
                align-items: flex-start;
                flex-direction: column;
            }

            .header h1 {
                font-size: 20px;
            }

            .profile {
                width: 100%;
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card, .card {
                padding: 16px;
                border-radius: 14px;
            }

            .print-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-logo-wrap">
                <div class="brand-logo">E</div>
                <span class="live-dot" title="Sistem Aktif"></span>
            </div>
            <div>
                <h2>EKSPLORE</h2>
                <p>SMK Budi Bakti Ciwidey</p>
            </div>
        </div>

        <div class="menu-label">MENU WALI KELAS</div>
        <div class="menu-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
            </svg>
            <span>Dashboard</span>
        </div>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                @csrf
                <button type="submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">

        <header class="header">
            <div class="header-text">
                <h1>Dashboard Wali Kelas</h1>
                <p>Pantau data siswa, ekstrakurikuler, dan hasil penilaian.</p>
            </div>

            <div class="profile">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>{{ $waliKelas->nama ?? $waliKelas->name ?? 'Wali Kelas' }}</span>
            </div>
        </header>

        @if (!empty($pesan))
            <div class="notice">{{ $pesan }}</div>
        @else

            <section class="stats">
                <div class="stat-card">
                    <div class="stat-top">
                        <span>KELAS YANG DIAMPU</span>
                        <div class="stat-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                    <strong>{{ $waliKelas->kelas }}</strong>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span>JUMLAH SISWA</span>
                        <div class="stat-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <strong>{{ $siswa->count() }}</strong>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span>ANGGOTA EKSTRAKURIKULER</span>
                        <div class="stat-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                            </svg>
                        </div>
                    </div>
                    <strong>
                        {{ $siswa->sum(fn ($item) => $item->anggotaEkskul->count()) }}
                    </strong>
                </div>
            </section>

            <section class="card screen-only">
                <div class="card-top-bar">
                    <div>
                        <h3>Data Siswa dan Penilaian Ekstrakurikuler</h3>
                        <p class="card-description">
                            Daftar siswa kelas {{ $waliKelas->kelas }} beserta keikutsertaan dan hasil penilaiannya.
                        </p>
                    </div>

                    <button type="button" class="print-button" onclick="window.print()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                        <span>Cetak Semua Rapor</span>
                    </button>
                </div>

                @if ($siswa->isEmpty())
                    <div class="empty">
                        Belum ada data siswa untuk kelas ini.
                    </div>
                @else
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Ekstrakurikuler</th>
                                    <th>Kehadiran</th>
                                    <th>Keaktifan</th>
                                    <th>Kedisiplinan</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Keterampilan</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($siswa as $index => $item)
                                    @forelse ($item->anggotaEkskul as $anggota)
                                        @php
                                            $nilai = $anggota->penilaian->first();
                                        @endphp

                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <td class="student-name">
                                                {{ $item->nama ?? $item->name }}
                                            </td>

                                            <td>{{ $item->nis ?? '-' }}</td>
                                            <td>{{ $item->kelas ?? '-' }}</td>

                                            <td>
                                                {{ $anggota->ekstrakurikuler->nama_ekskul ?? '-' }}
                                            </td>

                                            @if ($nilai)
                                                <td>{{ $nilai->kehadiran }}</td>
                                                <td>{{ $nilai->keaktifan }}</td>
                                                <td>{{ $nilai->kedisiplinan }}</td>
                                                <td>{{ $nilai->tanggung_jawab }}</td>
                                                <td>{{ $nilai->keterampilan }}</td>
                                                <td>
                                                    <span class="badge">
                                                        {{ number_format((float) $nilai->nilai_akhir, 2, ',', '.') }}
                                                    </span>
                                                </td>
                                            @else
                                                <td colspan="6" class="muted">
                                                    Belum ada penilaian
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="student-name">
                                                {{ $item->nama ?? $item->name }}
                                            </td>
                                            <td>{{ $item->nis ?? '-' }}</td>
                                            <td>{{ $item->kelas ?? '-' }}</td>
                                            <td colspan="7" class="muted">
                                                Belum mengikuti ekstrakurikuler aktif.
                                            </td>
                                        </tr>
                                    @endforelse
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>

            <section class="print-area">
                @foreach ($siswa as $item)
                    <div class="print-student">

                        <div class="report-header">
                            <img src="{{ asset('images/logo-smk-budi-bakti.jpeg') }}" alt="Logo SMK Budi Bakti">

                            <div class="report-school">
                                <h2>SMK BUDI BAKTI CIWIDEY</h2>
                                <p>RAPOR PENILAIAN EKSTRAKURIKULER</p>
                                <ul>
                                    <li>SMK BUDI BAKTI CIWIDEY</li>
                                    <li>Jl. Babakan Tiga No.82, Ciwidey, Kec. Ciwidey, Kab. Bandung, Jawa Barat 40973</li>
                                </ul>
                            </div>
                        </div>

                        <table class="biodata-table">
                            <tr>
                                <td class="biodata-label">Nama Siswa</td>
                                <td class="biodata-sep">:</td>
                                <td>{{ $item->nama ?? $item->name }}</td>
                            </tr>
                            <tr>
                                <td class="biodata-label">NIS</td>
                                <td class="biodata-sep">:</td>
                                <td>{{ $item->nis ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="biodata-label">Kelas</td>
                                <td class="biodata-sep">:</td>
                                <td>{{ $item->kelas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="biodata-label">Semester</td>
                                <td class="biodata-sep">:</td>
                                <td>Ganjil</td>
                            </tr>
                            <tr>
                                <td class="biodata-label">Tahun Ajaran</td>
                                <td class="biodata-sep">:</td>
                                <td>2026/2027</td>
                            </tr>
                        </table>

                        <h4>HASIL PENILAIAN EKSTRAKURIKULER</h4>

                        <table class="nilai-table">
                            <thead>
                                <tr>
                                    <th style="width: 6%;">No.</th>
                                    <th style="width: 24%;">Ekstrakurikuler</th>
                                    <th style="width: 11%;">Kehadiran</th>
                                    <th style="width: 11%;">Keaktifan</th>
                                    <th style="width: 12%;">Kedisiplinan</th>
                                    <th style="width: 14%;">Tanggung Jawab</th>
                                    <th style="width: 12%;">Keterampilan</th>
                                    <th style="width: 10%;">Nilai Akhir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($item->anggotaEkskul as $index => $anggota)
                                    @php
                                        $nilai = $anggota->penilaian->first();
                                    @endphp

                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $anggota->ekstrakurikuler->nama_ekskul ?? '-' }}</td>

                                        @if ($nilai)
                                            <td>{{ $nilai->kehadiran }}</td>
                                            <td>{{ $nilai->keaktifan }}</td>
                                            <td>{{ $nilai->kedisiplinan }}</td>
                                            <td>{{ $nilai->tanggung_jawab }}</td>
                                            <td>{{ $nilai->keterampilan }}</td>
                                            <td>{{ number_format((float) $nilai->nilai_akhir, 2, ',', '.') }}</td>
                                        @else
                                            <td colspan="6" class="kosong-nilai">Belum ada penilaian</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="kosong-nilai">Belum mengikuti ekstrakurikuler aktif.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="signature-area">
                            <div>
                                Mengetahui,<br>
                                Pembina Ekstrakurikuler
                                <div class="signature-line">(................................)</div>
                            </div>

                            <div>
                                <br>
                                Wali Kelas
                                <div class="signature-line">({{ $waliKelas->nama ?? $waliKelas->name }})</div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </section>

        @endif

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>

</html>