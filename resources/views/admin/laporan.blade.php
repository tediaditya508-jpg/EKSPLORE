<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin - EKSPLORE</title>

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

        .admin-hero {
            position: relative;
            background: linear-gradient(135deg, #2e1065 0%, #5b21b6 48%, #7c3aed 100%);
            color: #fff;
            padding: 56px 28px 92px;
            overflow: hidden;
        }

        .admin-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 22%, rgba(129,140,248,.35) 0%, transparent 42%),
                radial-gradient(circle at 88% 75%, rgba(192,132,252,.28) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.26);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            color: #ede9fe;
            margin-bottom: 14px;
            backdrop-filter: blur(8px);
        }

        .hero-text h1 {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -.6px;
            margin-bottom: 8px;
        }

        .hero-text h1 span {
            background: linear-gradient(135deg, #ddd6fe 0%, #f5d0fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text p {
            font-size: 14.5px;
            color: #cbd5e1;
            max-width: 600px;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: -50px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        .section-title {
            margin-bottom: 18px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title svg,
        .summary h2 svg,
        .report-heading svg {
            color: var(--admin-primary);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 12px 30px -10px rgba(15,23,42,.08);
            transition: transform .2s ease, border-color .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            border-color: var(--admin-border);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            background: var(--admin-soft);
            color: var(--admin-primary);
            border: 1px solid var(--admin-border);
        }

        .stat-card h3 {
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .report-section {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            margin-bottom: 32px;
            box-shadow: 0 12px 30px -10px rgba(15,23,42,.06);
        }

        .report-heading {
            margin-bottom: 24px;
        }

        .report-heading h2 {
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 7px;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .report-heading p {
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.6;
        }

        .report-filter {
            background: #faf9ff;
            border: 1px solid #ede9fe;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: 700;
            color: #475569;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
            height: 44px;
            padding: 10px 14px;
            border: 1.5px solid #ddd6fe;
            border-radius: 12px;
            background: #fff;
            color: #1e293b;
            font-size: 13.5px;
            outline: none;
            transition: all 0.2s ease;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        .filter-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-filter,
        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 44px;
            padding: 0 22px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-filter {
            border: none;
            color: #fff;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        .btn-filter:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(124,58,237,.3);
        }

        .btn-reset {
            color: #475569;
            background: #fff;
            border: 1.5px solid #cbd5e1;
        }

        .btn-reset:hover {
            background: #f8fafc;
            border-color: #94a3b8;
        }

        .report-info {
            padding: 18px 22px;
            border-radius: 16px;
            margin-bottom: 24px;
            font-size: 13.5px;
            line-height: 1.7;
        }

        .report-info strong {
            display: block;
            font-size: 14.5px;
            margin-bottom: 4px;
            font-weight: 800;
        }

        .report-info.success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .report-info.warning {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .report-table-wrapper {
            border: 1px solid var(--border-color);
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
        }

        .report-table-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 20px 24px;
            background: #faf9ff;
            border-bottom: 1px solid var(--border-color);
        }

        .report-table-heading h3 {
            font-size: 16px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .report-table-heading span {
            color: #7c3aed;
            font-size: 12px;
            font-weight: 800;
            background: #ede9fe;
            padding: 6px 14px;
            border-radius: 20px;
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
        }

        .report-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        .report-table th {
            padding: 16px 20px;
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            white-space: nowrap;
            border-bottom: 1px solid var(--border-color);
        }

        .report-table td {
            padding: 16px 20px;
            border-top: 1px solid #f1f5f9;
            color: #334155;
            font-size: 13.5px;
            white-space: nowrap;
        }

        .report-table tbody tr {
            transition: background 0.15s ease;
        }

        .report-table tbody tr:hover {
            background: #f8fafc;
        }

        .status-label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .status-diterima,
        .status-aktif,
        .status-hadir {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-menunggu,
        .status-izin {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        .status-ditolak,
        .status-nonaktif,
        .status-alfa {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .status-sakit {
            background: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }

        .empty-data {
            text-align: center;
            padding: 50px !important;
            color: #94a3b8 !important;
            font-weight: 500;
        }

        .summary {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 12px 30px -10px rgba(15,23,42,.06);
        }

        .summary h2 {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 12px;
            border-bottom: 1px solid var(--border-color);
            border-radius: 12px;
            transition: all .15s ease;
        }

        .summary-row:hover {
            background: #f8fafc;
            padding-left: 16px;
            padding-right: 16px;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-value {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 14.5px;
        }

        @media (max-width: 1200px) {
            .stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .admin-hero {
                padding: 44px 20px 76px;
            }

            .hero-text h1 {
                font-size: 26px;
            }

            .container {
                margin: -38px auto 40px;
                padding: 0 16px;
            }

            .stats,
            .filter-grid {
                grid-template-columns: 1fr;
            }

            .report-section,
            .summary {
                padding: 20px;
                border-radius: 20px;
            }

            .filter-actions {
                flex-direction: column;
            }

            .btn-filter,
            .btn-reset {
                width: 100%;
            }

            .summary-row {
                gap: 15px;
            }
        }

        /* MODAL LAPORAN SISWA */
.modal-laporan-siswa {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(15, 23, 42, 0.55);
    backdrop-filter: blur(5px);
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.modal-laporan-siswa.active {
    display: flex;
}

.modal-laporan-content {
    width: 100%;
    max-width: 560px;
    background: #fff;
    border-radius: 22px;
    padding: 28px;
    box-shadow: 0 25px 60px rgba(15, 23, 42, 0.2);
    animation: modalMasuk .2s ease;
}

@keyframes modalMasuk {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-laporan-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 22px;
}

.modal-laporan-header h2 {
    font-size: 21px;
    font-weight: 800;
    color: var(--text-dark);
}

.modal-laporan-close {
    border: none;
    background: transparent;
    font-size: 26px;
    color: var(--text-muted);
    cursor: pointer;
}

.modal-laporan-content label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 8px;
    color: #334155;
}

.modal-laporan-content input,
.modal-laporan-content textarea {
    width: 100%;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 13px 15px;
    margin-bottom: 18px;
    font-size: 14px;
    outline: none;
}

.modal-laporan-content input:focus,
.modal-laporan-content textarea:focus {
    border-color: var(--admin-primary);
    box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
}

.modal-laporan-content textarea {
    min-height: 130px;
    resize: vertical;
}

.btn-laporkan-siswa {
    border: none;
    background: #dc2626;
    color: #fff;
    padding: 9px 14px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s ease;
}

.btn-laporkan-siswa:hover {
    background: #b91c1c;
    transform: translateY(-1px);
}

.btn-laporkan-siswa:hover {
    background: var(--admin-primary-dark);
}

.modal-laporan-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.modal-laporan-actions button {
    border: none;
    border-radius: 10px;
    padding: 11px 18px;
    font-weight: 700;
    cursor: pointer;
}

.btn-batal-laporan {
    background: #f1f5f9;
    color: #334155;
}

.btn-kirim-laporan {
    background: var(--admin-primary);
    color: #fff;
}

/* TABEL DAFTAR LAPORAN SISWA */
.laporan-siswa-wrapper {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    background: #fff;
}

.laporan-siswa-table {
    width: 100%;
    min-width: 1100px;
    border-collapse: separate;
    border-spacing: 0;
    table-layout: fixed;
}

.laporan-siswa-table th {
    padding: 16px;
    background: #f8fafc;
    color: #334155;
    font-size: 13px;
    font-weight: 800;
    text-align: left;
    white-space: nowrap;
    border-bottom: 1px solid #e2e8f0;
}

.laporan-siswa-table td {
    padding: 16px;
    color: #334155;
    font-size: 13px;
    vertical-align: middle;
    border-bottom: 1px solid #f1f5f9;
    overflow-wrap: anywhere;
}

.laporan-siswa-table th:nth-child(1),
.laporan-siswa-table td:nth-child(1) {
    width: 55px;
}

.laporan-siswa-table th:nth-child(2),
.laporan-siswa-table td:nth-child(2) {
    width: 150px;
}

.laporan-siswa-table th:nth-child(3),
.laporan-siswa-table td:nth-child(3) {
    width: 170px;
}

.laporan-siswa-table th:nth-child(4),
.laporan-siswa-table td:nth-child(4) {
    width: 260px;
}

.laporan-siswa-table th:nth-child(5),
.laporan-siswa-table td:nth-child(5) {
    width: 160px;
    white-space: nowrap;
}

.laporan-siswa-table th:nth-child(6),
.laporan-siswa-table td:nth-child(6) {
    width: 160px;
}

.laporan-siswa-table th:nth-child(7),
.laporan-siswa-table td:nth-child(7) {
    width: 230px;
}

.laporan-siswa-table tbody tr:hover {
    background: #f8fafc;
}

.laporan-siswa-table select {
    min-width: 145px;
    padding: 9px 10px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background: #fff;
}

.laporan-siswa-table button {
    padding: 10px 16px;
    border: none;
    border-radius: 9px;
    background: #dc2626;
    color: #fff;
    font-weight: 700;
    cursor: pointer;
    margin-left: 6px;
}

.laporan-siswa-table button:hover {
    background: #b91c1c;
}

/* FORM UBAH STATUS LAPORAN */
.laporan-siswa-table td:last-child form {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 320px;
    margin: 0;
}

.laporan-siswa-table td:last-child select {
    flex: 1;
    min-width: 170px;
    height: 42px;
    padding: 0 12px;
    font-size: 13px;
    font-weight: 600;
    color: #334155;
    border: 1px solid #cbd5e1;
    border-radius: 9px;
    outline: none;
}

.laporan-siswa-table td:last-child select:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
}

.laporan-siswa-table td:last-child button {
    flex-shrink: 0;
    height: 42px;
    margin: 0;
    padding: 0 16px;
    white-space: nowrap;
}

    </style>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

<section class="admin-hero">
    <div class="hero-inner">
        <div class="hero-text">
            <div class="hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" x2="18" y1="20" y2="10"/>
                    <line x1="12" x2="12" y1="20" y2="4"/>
                    <line x1="6" x2="6" y1="20" y2="14"/>
                </svg>
                Pusat Analitik & Laporan Sekolah
            </div>

            <h1>Laporan <span>EKSPLORE</span></h1>
            <p>Tinjau ringkasan komprehensif data statistik, keanggotaan, serta seluruh aktivitas ekstrakurikuler dalam sistem.</p>
        </div>
    </div>
</section>

<div class="container">

    <h2 class="section-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <rect width="18" height="18" x="3" y="3" rx="2"/>
            <path d="M3 9h18"/>
            <path d="M9 21V9"/>
        </svg>
        Ringkasan Statistik Sistem
    </h2>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3>Total Pengguna</h3>
            <div class="stat-number">{{ $totalPengguna ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <h3>Total Siswa</h3>
            <div class="stat-number">{{ $totalSiswa ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <h3>Total Pembina</h3>
            <div class="stat-number">{{ $totalPembina ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
            </div>
            <h3>Total Ekstrakurikuler</h3>
            <div class="stat-number">{{ $totalEkstrakurikuler ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
            </div>
            <h3>Total Pendaftaran</h3>
            <div class="stat-number">{{ $totalPendaftaran ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3>Total Anggota</h3>
            <div class="stat-number">{{ $totalAnggota ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            </div>
            <h3>Total Jadwal</h3>
            <div class="stat-number">{{ $totalJadwal ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            </div>
            <h3>Total Absensi</h3>
            <div class="stat-number">{{ $totalAbsensi ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
            </div>
            <h3>Total Prestasi</h3>
            <div class="stat-number">{{ $totalPrestasi ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            </div>
            <h3>Total Pengumuman</h3>
            <div class="stat-number">{{ $totalPengumuman ?? 0 }}</div>
        </div>
    </div>

    {{-- FILTER DAN HASIL LAPORAN --}}
    <section class="report-section">

        <div class="report-heading">
            <h2>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                Data Laporan
            </h2>
            <p>Pilih jenis laporan dan gunakan filter untuk melihat data secara terperinci.</p>
        </div>

        <form action="{{ route('admin.laporan') }}" method="GET" class="report-filter">

            <div class="filter-grid">

                <div class="filter-group">
                    <label>Jenis Laporan</label>
                    <select name="jenis_laporan">
                        <option value="pendaftaran" {{ $jenisLaporan === 'pendaftaran' ? 'selected' : '' }}>Pendaftaran Siswa</option>
                        <option value="anggota" {{ $jenisLaporan === 'anggota' ? 'selected' : '' }}>Anggota Aktif</option>
                        <option value="absensi" {{ $jenisLaporan === 'absensi' ? 'selected' : '' }}>Absensi</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Pencarian Nama / NIS</label>
                    <input type="text" name="cari" value="{{ $filters['cari'] ?? '' }}" placeholder="Masukkan nama atau NIS">
                </div>

                <div class="filter-group">
                    <label>Ekstrakurikuler</label>
                    <select name="ekskul_id">
                        <option value="">Semua Ekstrakurikuler</option>
                        @foreach($daftarEkskul as $ekskul)
                            <option value="{{ $ekskul->id }}" {{ ($filters['ekskul_id'] ?? '') == $ekskul->id ? 'selected' : '' }}>
                                {{ $ekskul->nama_ekskul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label>Kelas</label>
                    <select name="kelas">
                        <option value="">Semua Kelas</option>
                        @foreach($daftarKelas as $kelasItem)
                            <option value="{{ $kelasItem }}" {{ ($filters['kelas'] ?? '') == $kelasItem ? 'selected' : '' }}>
                                {{ $kelasItem }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="">Semua Status</option>

                        @if($jenisLaporan === 'pendaftaran')
                            <option value="menunggu" {{ ($filters['status'] ?? '') === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diterima" {{ ($filters['status'] ?? '') === 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ ($filters['status'] ?? '') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        @elseif($jenisLaporan === 'anggota')
                            <option value="aktif" {{ ($filters['status'] ?? '') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ ($filters['status'] ?? '') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        @else
                            <option value="hadir" {{ ($filters['status'] ?? '') === 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ ($filters['status'] ?? '') === 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ ($filters['status'] ?? '') === 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alfa" {{ ($filters['status'] ?? '') === 'alfa' ? 'selected' : '' }}>Alfa</option>
                        @endif
                    </select>
                </div>

                <div class="filter-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" value="{{ $filters['tanggal_awal'] ?? '' }}">
                </div>

                <div class="filter-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" value="{{ $filters['tanggal_akhir'] ?? '' }}">
                </div>

            </div>

            <div class="filter-actions">
                <button type="submit" class="btn-filter">Cari Laporan</button>
                <a href="{{ route('admin.laporan') }}" class="btn-reset">Reset Filter</a>
            </div>

        </form>

        @php
            $jumlahHasil = $dataLaporan->count();

            $namaJenisLaporan = [
                'pendaftaran' => 'Pendaftaran Siswa',
                'anggota' => 'Anggota Aktif',
                'absensi' => 'Absensi Siswa',
            ];

            $namaEkskulFilter = $daftarEkskul
                ->firstWhere('id', $filters['ekskul_id'] ?? null)
                ?->nama_ekskul;
        @endphp

        {{-- PESAN HASIL LAPORAN --}}
        @if($jumlahHasil > 0)

            <div class="report-info success">
                <strong>Data Laporan Berhasil Ditemukan</strong>

                Berhasil menemukan {{ $jumlahHasil }}
                data {{ strtolower($namaJenisLaporan[$jenisLaporan] ?? 'laporan') }}.

                @if(!empty($filters['cari']))
                    Pencarian: "{{ $filters['cari'] }}".
                @endif

                @if($namaEkskulFilter)
                    Ekstrakurikuler: {{ $namaEkskulFilter }}.
                @endif

                @if(!empty($filters['kelas']))
                    Kelas: {{ $filters['kelas'] }}.
                @endif

                @if(!empty($filters['status']))
                    Status: {{ ucfirst($filters['status']) }}.
                @endif

                @if(!empty($filters['tanggal_awal']) || !empty($filters['tanggal_akhir']))
                    Periode:
                    {{ $filters['tanggal_awal'] ?: 'Tidak ditentukan' }}
                    sampai
                    {{ $filters['tanggal_akhir'] ?: 'Tidak ditentukan' }}.
                @endif
            </div>

        @else

            <div class="report-info warning">
                <strong>Data Laporan Tidak Ditemukan</strong>

                @if(
                    empty($filters['cari']) &&
                    empty($filters['ekskul_id']) &&
                    empty($filters['kelas']) &&
                    empty($filters['status']) &&
                    empty($filters['tanggal_awal']) &&
                    empty($filters['tanggal_akhir'])
                )
                    Belum terdapat data
                    {{ strtolower($namaJenisLaporan[$jenisLaporan] ?? 'laporan') }}
                    yang dapat ditampilkan[cite: 13].
                @else
                    Tidak ditemukan data
                    {{ strtolower($namaJenisLaporan[$jenisLaporan] ?? 'laporan') }}
                    yang sesuai dengan filter yang dipilih.
                    Silakan periksa kembali pencarian, ekstrakurikuler,
                    kelas, status, atau rentang tanggal[cite: 13].
                @endif
            </div>

        @endif

        {{-- TABEL DATA LAPORAN --}}
        <div class="report-table-wrapper">

            <div class="report-table-heading">
                <h3>
                    @if($jenisLaporan === 'pendaftaran')
                        Laporan Pendaftaran Siswa
                    @elseif($jenisLaporan === 'anggota')
                        Laporan Anggota Aktif
                    @else
                        Laporan Absensi
                    @endif
                </h3>

                <span>Total: {{ $jumlahHasil }} data</span>
            </div>

            <div class="table-scroll">
                <table class="report-table">

                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Siswa</th>
                            <th style="width: 110px;">NIS</th>
                            <th style="width: 100px;">Kelas</th>
                            <th>Ekstrakurikuler</th>

                            @if($jenisLaporan === 'absensi')
                                <th style="width: 150px;">Tanggal Absensi</th>
                            @elseif($jenisLaporan === 'anggota')
                                <th style="width: 150px;">Tanggal Bergabung</th>
                            @else
                                <th style="width: 150px;">Tanggal Pendaftaran</th>
                            @endif

                            <th style="width: 120px;">Status</th>
                            <th style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($dataLaporan as $index => $item)

                            @php
                                if ($jenisLaporan === 'absensi') {
                                    $siswa = $item->anggota?->siswa;
                                    $ekskulNama = $item->anggota?->ekstrakurikuler?->nama_ekskul;
                                    $nis = $siswa?->nis;
                                    $kelasSiswa = $siswa?->kelas;
                                    $tanggal = $item->tanggal;
                                } elseif ($jenisLaporan === 'anggota') {
                                    $siswa = $item->siswa;
                                    $ekskulNama = $item->ekstrakurikuler?->nama_ekskul;
                                    $nis = $siswa?->nis;
                                    $kelasSiswa = $siswa?->kelas;
                                    $tanggal = $item->tanggal_daftar;
                                } else {
                                    $siswa = $item->siswa;
                                    $ekskulNama = $item->ekstrakurikuler?->nama_ekskul;
                                    $nis = $item->nis;
                                    $kelasSiswa = $item->kelas;
                                    $tanggal = $item->created_at;
                                }

                                $namaSiswa = $siswa?->nama
                                    ?? $siswa?->name
                                    ?? $item->nama
                                    ?? '-';
                            @endphp

                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $namaSiswa }}</strong></td>
                                <td>{{ $nis ?? '-' }}</td>
                                <td>{{ $kelasSiswa ?? '-' }}</td>
                                <td><strong>{{ $ekskulNama ?? '-' }}</strong></td>
                                <td>
                                    {{ $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d-m-Y') : '-' }}
                                </td>
                                <td>
                                    <span class="status-label status-{{ strtolower($item->status ?? '') }}">
                                        {{ ucfirst($item->status ?? '-') }}
                                    </span>
                                </td>

                                  <td>
    @if($siswa)
        <button
            type="button"
            class="btn-laporkan-siswa"
            onclick="bukaModalLaporanSiswa(
                {{ $siswa->id }},
                @js($namaSiswa)
            )"
        >
            🚨 Laporkan
        </button>
    @else
        -
    @endif
</td>      

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-data">
                                    Belum ada data laporan yang sesuai dengan filter.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </section>

    {{-- DAFTAR LAPORAN SISWA --}}
<section class="report-section" style="margin-bottom: 30px;">

    <h2 class="section-title">
        Daftar Laporan Siswa
    </h2>

    <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 14px;">
        Kelola laporan yang telah dikirim kepada siswa dan perbarui status penanganannya.
    </p>

    <div class="laporan-siswa-wrapper">
    <table class="laporan-siswa-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Judul</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporanSiswa as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            <strong>
                                {{ $laporan->siswa?->nama ?? $laporan->siswa?->name ?? '-' }}
                            </strong>
                        </td>

                        <td>{{ $laporan->judul }}</td>

                        <td>{{ $laporan->pesan }}</td>

                        <td>
                            {{ $laporan->created_at?->format('d-m-Y H:i') ?? '-' }}
                        </td>

                        <td>
                            {{ $laporan->status }}
                        </td>

                        <td>
                            <form
                                action="{{ route('admin.laporan.siswa.status', $laporan->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <select name="status" required>
                                    <option value="Belum Ditinjau"
                                        @selected($laporan->status === 'Belum Ditinjau')>
                                        Belum Ditinjau
                                    </option>

                                    <option value="Diproses"
                                        @selected($laporan->status === 'Diproses')>
                                        Diproses
                                    </option>

                                    <option value="Selesai"
                                        @selected($laporan->status === 'Selesai')>
                                        Selesai
                                    </option>
                                </select>

                                <button type="submit" class="btn-laporkan-siswa">
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-data">
                            Belum ada laporan siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

    {{-- RINGKASAN AKTIVITAS SISTEM --}}
    <div class="summary">

        <h2>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" x2="8" y1="13" y2="13"/>
                <line x1="16" x2="8" y1="17" y2="17"/>
            </svg>
            Ringkasan Aktivitas Sistem
        </h2>

        <div class="summary-row">
            <span class="summary-label">Pengguna terdaftar</span>
            <span class="summary-value">{{ $totalPengguna ?? 0 }} pengguna</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Ekstrakurikuler tersedia</span>
            <span class="summary-value">{{ $totalEkstrakurikuler ?? 0 }} ekskul</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Pendaftaran siswa</span>
            <span class="summary-value">{{ $totalPendaftaran ?? 0 }} pendaftaran</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Anggota ekstrakurikuler</span>
            <span class="summary-value">{{ $totalAnggota ?? 0 }} anggota</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Jadwal ekstrakurikuler</span>
            <span class="summary-value">{{ $totalJadwal ?? 0 }} jadwal</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Data absensi</span>
            <span class="summary-value">{{ $totalAbsensi ?? 0 }} data</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Prestasi ekstrakurikuler</span>
            <span class="summary-value">{{ $totalPrestasi ?? 0 }} prestasi</span>
        </div>

        <div class="summary-row">
            <span class="summary-label">Pengumuman</span>
            <span class="summary-value">{{ $totalPengumuman ?? 0 }} pengumuman</span>
        </div>

    </div>

</div>

{{-- MODAL LAPORAN SISWA --}}
<div class="modal-laporan-siswa" id="modalLaporanSiswa">
    <div class="modal-laporan-content">

        <div class="modal-laporan-header">
            <h2>Laporkan Siswa</h2>
            <button
                type="button"
                class="modal-laporan-close"
                onclick="tutupModalLaporanSiswa()"
            >&times;</button>
        </div>

        <form
            action="{{ route('admin.laporan.siswa.store') }}"
            method="POST"
        >
            @csrf

            <input
                type="hidden"
                name="siswa_id"
                id="laporanSiswaId"
            >

            <label>Nama Siswa</label>
            <input
                type="text"
                id="laporanNamaSiswa"
                readonly
            >

            <label for="laporanJudul">Judul Laporan</label>
            <input
                type="text"
                name="judul"
                id="laporanJudul"
                maxlength="150"
                placeholder="Masukkan judul laporan"
                required
            >

            <label for="laporanPesan">Pesan / Keterangan</label>
            <textarea
                name="pesan"
                id="laporanPesan"
                maxlength="2000"
                placeholder="Tuliskan alasan atau keterangan laporan..."
                required
            ></textarea>

            <div class="modal-laporan-actions">
                <button
                    type="button"
                    class="btn-batal-laporan"
                    onclick="tutupModalLaporanSiswa()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-kirim-laporan"
                >
                    Kirim Laporan
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function bukaModalLaporanSiswa(id, nama) {
        document.getElementById('laporanSiswaId').value = id;
        document.getElementById('laporanNamaSiswa').value = nama;

        document.getElementById('modalLaporanSiswa')
            .classList.add('active');
    }

    function tutupModalLaporanSiswa() {
        document.getElementById('modalLaporanSiswa')
            .classList.remove('active');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalLaporanSiswa');

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                tutupModalLaporanSiswa();
            }
        });
    });
</script>

<script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')

</body>
</html>