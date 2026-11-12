<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - EKSPLORE</title>

    <!-- Chart.js lokal agar grafik tetap tampil tanpa internet -->
    <script src="{{ asset('vendor/chart.umd.min.js') }}"></script>

    <style>
        :root {
            --font-sans: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --active-bg: #eff6ff;
            --active-text: #2563eb;
            --active-border: #2563eb;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-bg: #dcfce7;
            --warning: #d97706;
            --danger: #dc2626;
            --danger-bg: #fef2f2;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 76px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .icon {
            width: 20px;
            height: 20px;
            stroke-width: 2;
            stroke: currentColor;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* =========================================
           TOP NAVBAR (RESPONSIF KHUSUS HP & TABLET)
           ========================================= */
        .top-navbar {
            display: none;
            align-items: center;
            justify-content: space-between;
            height: 65px;
            padding: 0 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1100;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .top-navbar-brand {
            font-weight: 800;
            font-size: 17px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
        }

        .sidebar-overlay {
            display: none;
        }

        /* =========================================
           SIDEBAR UTAMA & MINI SIDEBAR MODE (DESKTOP)
           ========================================= */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--bg-card);
            border-right: 1px solid var(--border-color);
            padding: 18px 14px;
            display: flex;
            flex-direction: column;
            z-index: 1200;
            transition: width 0.25s cubic-bezier(0.4, 0, 0.2, 1), transform 0.25s ease;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.02);
        }

        /* Mode Terlipat (Collapsed) di Desktop */
        body.sidebar-collapsed .sidebar {
            width: var(--sidebar-collapsed-width);
            padding: 18px 10px;
        }

        body.sidebar-collapsed .main-content {
            margin-left: var(--sidebar-collapsed-width) !important;
        }

        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-menu-label,
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-btn span,
        body.sidebar-collapsed .sidebar-footer-box {
            display: none !important;
        }

        body.sidebar-collapsed .brand-container {
            justify-content: center;
            padding: 6px 0 16px 0;
            margin-bottom: 12px;
        }

        body.sidebar-collapsed .brand-info {
            display: none;
        }

        body.sidebar-collapsed .sidebar-nav {
            align-items: center;
            gap: 10px;
        }

        body.sidebar-collapsed .sidebar-group {
            width: 100%;
            align-items: center;
            gap: 6px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 12px;
            margin-bottom: 6px;
        }

        body.sidebar-collapsed .sidebar-link,
        body.sidebar-collapsed .sidebar-btn {
            justify-content: center;
            padding: 10px;
            width: 44px;
            height: 44px;
            border-radius: 10px;
        }

        body.sidebar-collapsed .sidebar-link.active::before {
            display: none;
        }

        body.sidebar-collapsed .sidebar-link.active {
            background: var(--active-bg);
            color: var(--active-text);
            border-color: #bfdbfe;
        }

        /* =========================================
           HEADER SIDEBAR & LOGO HIDUP (PULSE ANIMATION)
           ========================================= */
        .brand-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 6px 16px 6px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 14px;
        }

        .brand-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.5); }
            70% { box-shadow: 0 0 0 10px rgba(37, 99, 235, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0); }
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            flex-shrink: 0;
            animation: pulseGlow 2.5s infinite;
        }

        .brand-text h1 {
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.4px;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .sidebar-toggle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--primary);
            cursor: pointer;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .sidebar-toggle-btn:hover {
            background: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 14px;
            overflow-y: auto;
            flex: 1;
            padding-right: 2px;
        }

        .sidebar-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar-menu-label {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #94a3b8;
            padding: 0 8px;
            margin-bottom: 2px;
        }

        .sidebar-link, 
        .sidebar-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            background: transparent;
            border: 1px solid transparent;
            width: 100%;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: left;
        }

        .sidebar-link:hover, 
        .sidebar-btn:hover {
            background: var(--bg-body);
            color: var(--text-main);
        }

        .sidebar-link.active {
            background: var(--active-bg);
            color: var(--active-text);
            border-color: #bfdbfe;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.08);
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: -4px;
            top: 20%;
            bottom: 20%;
            width: 4px;
            background-color: var(--active-border);
            border-radius: 4px;
        }

        .sidebar-link.active .icon {
            stroke: var(--active-text);
        }

        .logout-btn {
            color: var(--danger);
        }

        .logout-btn:hover {
            background: var(--danger-bg) !important;
            color: var(--danger);
        }

        .sidebar-footer-box {
            margin-top: 8px;
            padding: 10px 12px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #047857;
            font-size: 11px;
            font-weight: 700;
        }

        @keyframes liveDot {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.3); opacity: 1; box-shadow: 0 0 8px #10b981; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }

        .online-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: liveDot 1.8s infinite ease-in-out;
        }

        /* =========================================
           MAIN LAYOUT CONTENT
           ========================================= */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 32px;
            min-height: 100vh;
            transition: margin-left 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .welcome-box h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 2px;
        }

        .welcome-box p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .user-profile-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--bg-card);
            padding: 6px 14px 6px 6px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }

        .profile-avatar-sm {
            width: 36px;
            height: 36px;
            background: var(--primary);
            color: white;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .profile-meta strong {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
        }

        .profile-meta span {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* STATISTIK (RESPONSIVE GRID) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.04);
        }

        .stat-icon-wrapper {
            width: 44px;
            height: 44px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon-wrapper .icon {
            width: 22px;
            height: 22px;
        }

        .stat-details span {
            display: block;
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .stat-details strong {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-main);
        }

        /* GRID KONTEN UTAMA */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .card-header h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-header h3 .icon {
            color: var(--primary);
        }

        .card-header a {
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
        }

        .card-header a:hover {
            text-decoration: underline;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 260px;
            margin-top: 10px;
        }

        .list-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px;
            background: var(--bg-body);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .item-badge-day {
            width: 55px;
            font-size: 12px;
            font-weight: 700;
            color: var(--primary);
        }

        .item-info {
            flex: 1;
        }

        .item-info strong {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 2px;
        }

        .item-info span {
            font-size: 11px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .attendance-icon-box {
            width: 36px;
            height: 36px;
            background: var(--success-bg);
            color: var(--success);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .score-pill {
            padding: 4px 10px;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid #bfdbfe;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 700;
        }

        .ekskul-subgrid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .ekskul-mini-card {
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            background: var(--bg-card);
        }

        .ekskul-banner {
            height: 75px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
            font-size: 11px;
            gap: 4px;
        }

        .ekskul-content {
            padding: 10px;
        }

        .ekskul-content h4 {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .ekskul-content p {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.3;
            height: 28px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .btn-sm-action {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 5px 0;
            background: var(--primary);
            color: white;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        .announcement-box {
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .announcement-box:first-child { padding-top: 0; }
        .announcement-box:last-child { border-bottom: none; padding-bottom: 0; }

        .announcement-box strong {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 3px;
        }

        .badge-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 6px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .announcement-box p {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .empty-state {
            text-align: center;
            padding: 24px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .empty-state .icon {
            width: 28px;
            height: 28px;
            margin-bottom: 6px;
            stroke: #94a3b8;
        }

        /* =========================================
           MEDIA QUERIES (RESPONSIF TABLET & HP)
           ========================================= */
        @media (max-width: 1200px) {
            .ekskul-subgrid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 900px) {
            /* Munculkan Navbar Atas khusus layar HP & Tablet */
            .top-navbar {
                display: flex;
            }

            body.sidebar-collapsed .sidebar {
                width: var(--sidebar-width);
            }

            /* Sembunyikan sidebar ke kiri secara default di bawah 900px */
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width) !important;
                padding: 18px 14px !important;
            }

            /* Munculkan sidebar saat kelas mobile-open aktif */
            .sidebar.mobile-open {
                transform: translateX(0);
                box-shadow: 15px 0 40px rgba(0,0,0,0.2);
            }

            .sidebar.mobile-open .sidebar-menu-label,
            .sidebar.mobile-open .sidebar-link span,
            .sidebar.mobile-open .sidebar-btn span,
            .sidebar.mobile-open .sidebar-footer-box {
                display: flex !important;
            }
            .sidebar.mobile-open .brand-text {
                display: block !important;
            }
            .sidebar.mobile-open .sidebar-menu-label {
                display: block !important;
            }
            .sidebar.mobile-open .brand-info {
                display: flex !important;
            }
            .sidebar.mobile-open .brand-container {
                justify-content: space-between !important;
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.5);
                backdrop-filter: blur(4px);
                z-index: 1150;
            }

            .main-content {
                margin-left: 0 !important;
                padding: 20px 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .user-profile-badge {
                display: none;
            }

            .ekskul-subgrid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

    <!-- NAVBAR TOP KHUSUS HP & TABLET -->
    <header class="top-navbar">
        <button type="button" class="sidebar-toggle-btn" id="mobileTopToggleBtn" aria-label="Buka Menu">
            <svg class="icon" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <span class="top-navbar-brand">EKSPLORE</span>
        <div style="width: 36px;"></div>
    </header>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR UTAMA -->
    <aside class="sidebar" id="appSidebar">
        <div class="brand-container">
            <div class="brand-info">
                <div class="brand-logo">E</div>
                <div class="brand-text">
                    <h1>EKSPLORE</h1>
                    <p>SMK Budi Bakti</p>
                </div>
            </div>

            <!-- Tombol Toggle Lipat (Desktop) / Tutup (Mobile) -->
            <button type="button" class="sidebar-toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/><path d="m14 15-3-3 3-3"/></svg>
            </button>
        </div>

        <nav class="sidebar-nav">
            <!-- GRUP 1: UTAMA -->
            <div class="sidebar-group">
                <div class="sidebar-menu-label">UTAMA</div>
                <a href="{{ route('dashboard') }}" class="sidebar-link active" title="Dashboard">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('ekskul.index') }}" class="sidebar-link" title="Daftar Ekskul">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>Daftar Ekskul</span>
                </a>
            </div>

            <!-- GRUP 2: KEGIATAN & JADWAL -->
            <div class="sidebar-group">
                <div class="sidebar-menu-label">KEGIATAN & JADWAL</div>
                <a href="{{ route('jadwal.index') }}" class="sidebar-link" title="Jadwal Kegiatan">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    <span>Jadwal Kegiatan</span>
                </a>
                <a href="{{ route('pendaftaran.index') }}" class="sidebar-link" title="Pendaftaran">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                    <span>Pendaftaran</span>
                </a>
                <a href="{{ route('pindah_ekskul.index') }}" class="sidebar-link" title="Pindah Ekskul">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
                    <span>Pindah Ekskul</span>
                </a>
                <a href="{{ route('kehadiran.index') }}" class="sidebar-link" title="Kehadiran">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <span>Kehadiran</span>
                </a>
            </div>

            <!-- GRUP 3: INFORMASI & EVALUASI -->
            <div class="sidebar-group">
                <div class="sidebar-menu-label">INFORMASI & EVALUASI</div>
                <a href="{{ route('prestasi.index') }}" class="sidebar-link" title="Prestasi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                    <span>Prestasi</span>
                </a>
                <a href="{{ route('galeri.index') }}" class="sidebar-link" title="Galeri Aktivitas">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    <span>Galeri Aktivitas</span>
                </a>
                <a href="{{ route('notifikasi.index') }}" class="sidebar-link" title="Notifikasi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    <span>Notifikasi</span>
                </a>
            </div>

            <!-- LOGOUT & FOOTER -->
            <div class="sidebar-group" style="margin-top: auto;">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                    @csrf
                    <button type="submit" class="sidebar-btn logout-btn" title="Logout">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        <span>Logout</span>
                    </button>
                </form>

                <div class="sidebar-footer-box">
                    <span>Online</span>
                    <span class="online-dot"></span>
                </div>
            </div>
        </nav>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main-content" id="mainContent">
        <div class="dashboard-header">
            <div class="welcome-box">
                <h2>Halo, {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }} 👋</h2>
                <p>Selamat datang kembali di sistem informasi EKSPLORE.</p>
            </div>

            <a href="{{ route('profile.index') }}" class="user-profile-badge">
                @if (!empty($siswa->foto))
                    <img
                        src="{{ asset('storage/' . $siswa->foto) }}"
                        alt="Foto {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}"
                        class="profile-avatar-sm"
                        style="object-fit: cover;"
                    >
                @else
                    <div class="profile-avatar-sm">
                        {{ strtoupper(substr($siswa->name ?? $siswa->nama ?? 'S', 0, 1)) }}
                    </div>
                @endif
                <div class="profile-meta">
                    <strong>{{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}</strong>
                    <span>Peserta Didik</span>
                </div>
            </a>
        </div>

        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon-wrapper">
                    <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6z"/></svg>
                </div>
                <div class="stat-details">
                    <span>Total Ekskul</span>
                    <strong>{{ $dataDashboard['jumlahEkskul'] }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon-wrapper">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div class="stat-details">
                    <span>Total Jadwal</span>
                    <strong>{{ $dataDashboard['jumlahJadwal'] }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon-wrapper">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </div>
                <div class="stat-details">
                    <span>Pengumuman</span>
                    <strong>{{ $dataDashboard['jumlahPengumuman'] }}</strong>
                </div>
            </div>
        </section>

        <div class="dashboard-grid">
            <!-- SISI KIRI -->
            <div>
                <!-- GRAFIK TREN KEHADIRAN (SAHAM STYLE) -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                            Tren Kehadiran & Status (Gaya Saham)
                        </h3>
                        <a href="{{ route('kehadiran.index') }}">Detail</a>
                    </div>
                    <div class="chart-container">
                        <canvas id="kehadiranStockChart"></canvas>
                    </div>
                </div>

                <!-- JADWAL EKSTRAKURIKULER -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            Jadwal Ekstrakurikuler
                        </h3>
                        <a href="{{ route('jadwal.index') }}">Lihat semua</a>
                    </div>

                    @forelse ($jadwalHariIni as $jadwal)
                        <div class="list-item">
                            <div class="item-badge-day">{{ $jadwal->hari }}</div>
                            <div class="item-info">
                                <strong>{{ $jadwal->ekstrakurikuler->nama_ekskul ?? 'Ekskul' }}</strong>
                                <span>
                                    <svg class="icon" style="width:13px; height:13px;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }} • {{ $jadwal->lokasi }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            <br>Belum ada jadwal ekstrakurikuler.
                        </div>
                    @endforelse
                </div>

                <!-- NILAI KEHADIRAN -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            Nilai Kehadiran Terbaru
                        </h3>
                        <a href="{{ route('kehadiran.index') }}">Lihat semua</a>
                    </div>

                    @forelse ($nilaiAbsensi as $item)
                        <div class="list-item">
                            <div class="attendance-icon-box">
                                <svg class="icon" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="item-info">
                                <strong>{{ $item->anggota->ekstrakurikuler->nama_ekskul ?? 'Ekskul' }}</strong>
                                <span>
                                    <svg class="icon" style="width:13px; height:13px;" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/></svg>
                                    {{ $item->tanggal?->format('d-m-Y') ?? '-' }} • Hadir
                                </span>
                            </div>
                            <div class="score-pill">{{ $item->nilai }}</div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <br>Belum ada catatan nilai kehadiran.
                        </div>
                    @endforelse
                </div>

                <!-- EKSTRAKURIKULER TERSEDIA -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6z"/></svg>
                            Ekstrakurikuler Tersedia
                        </h3>
                        <a href="{{ route('ekskul.index') }}">Lihat semua</a>
                    </div>

                    <div class="ekskul-subgrid">
                        @forelse ($ekskul as $item)
                            <div class="ekskul-mini-card">
                                <div class="ekskul-banner">
                                    <svg class="icon" style="width:14px; height:14px;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6z"/></svg>
                                    EKSPLORE
                                </div>
                                <div class="ekskul-content">
                                    <h4>{{ $item->nama_ekskul }}</h4>
                                    <p>{{ $item->deskripsi ?? 'Kegiatan ekstrakurikuler sekolah.' }}</p>
                                    <a href="{{ route('ekskul.show', $item->id) }}" class="btn-sm-action">Detail</a>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state" style="grid-column: 1 / -1;">
                                Belum ada data ekstrakurikuler.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- SISI KANAN -->
            <div>
                <!-- PENGUMUMAN -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            Pengumuman
                        </h3>
                        <a href="{{ route('pengumuman.index') }}">Semua</a>
                    </div>

                    @forelse ($pengumuman as $item)
                        <div class="announcement-box">
                            <strong>{{ $item->judul }}</strong>
                            <div class="badge-tag">
                                <svg class="icon" style="width:10px; height:10px;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>
                                {{ $item->ekstrakurikuler?->nama_ekskul ?? 'Semua Ekskul' }}
                            </div>
                            <span style="display: block; font-size: 11px; color: var(--text-muted); margin-bottom: 4px;">
                                Pembina: {{ $item->ekstrakurikuler?->pembina?->name ?? 'Belum ditentukan' }}
                            </span>
                            <p>{{ $item->isi }}</p>
                            <span style="display: block; font-size: 10px; color: #94a3b8; margin-top: 4px;">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </span>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                            <br>Belum ada pengumuman terbaru.
                        </div>
                    @endforelse
                </div>

                <!-- TENTANG EKSPLORE -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
                            Tentang EKSPLORE
                        </h3>
                    </div>
                    <div style="font-size: 12px; color: var(--text-muted); line-height: 1.5; margin-bottom: 12px;">
                        EKSPLORE merupakan sistem informasi ekstrakurikuler SMK Budi Bakti Ciwidey yang membantu siswa menemukan, mendaftar, dan mengikuti kegiatan ekstrakurikuler sekolah.
                    </div>
                    <div style="padding: 10px; background: var(--primary-light); border-radius: 8px; font-size: 11px; color: var(--primary); line-height: 1.4;">
                        Temukan ekstrakurikuler yang sesuai, pantau jadwal, pendaftaran, dan laporan aktivitas sekolah dengan mudah.
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- SCRIPT INTERAKTIF RESPONSIF & GRAFIK -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('appSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const mobileTopToggleBtn = document.getElementById('mobileTopToggleBtn');

            function isMobile() {
                return window.innerWidth <= 900;
            }

            function toggleSidebar() {
                if (isMobile()) {
                    sidebar.classList.toggle('mobile-open');
                    if (overlay) overlay.classList.toggle('show');
                } else {
                    document.body.classList.toggle('sidebar-collapsed');
                }
            }

            if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
            if (mobileTopToggleBtn) mobileTopToggleBtn.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);

            // Tutup otomatis saat link menu diklik di HP
            sidebar.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (isMobile()) {
                        sidebar.classList.remove('mobile-open');
                        if (overlay) overlay.classList.remove('show');
                    }
                });
            });

            // Render Grafik Tren Kehadiran dari data absensi siswa
            const canvas = document.getElementById('kehadiranStockChart');

            if (canvas && typeof Chart !== 'undefined') {
                const chartKehadiran = @json($chartKehadiran);
                const ctx = canvas.getContext('2d');

                const gradientHadir = ctx.createLinearGradient(0, 0, 0, 260);
                gradientHadir.addColorStop(0, 'rgba(37, 99, 235, 0.35)');
                gradientHadir.addColorStop(1, 'rgba(37, 99, 235, 0.0)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartKehadiran.labels,
                        datasets: [
                            {
                                label: 'Hadir',
                                data: chartKehadiran.hadir,
                                borderColor: '#2563eb',
                                borderWidth: 3,
                                fill: true,
                                backgroundColor: gradientHadir,
                                tension: 0.4,
                                pointRadius: 4,
                                pointHoverRadius: 7,
                                pointBackgroundColor: '#2563eb',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2
                            },
                            {
                                label: 'Izin',
                                data: chartKehadiran.izin,
                                borderColor: '#d97706',
                                borderWidth: 2,
                                borderDash: [5, 5],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 3,
                                pointBackgroundColor: '#d97706'
                            },
                            {
                                label: 'Sakit',
                                data: chartKehadiran.sakit,
                                borderColor: '#7c3aed',
                                borderWidth: 2,
                                borderDash: [4, 4],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 3,
                                pointBackgroundColor: '#7c3aed'
                            },
                            {
                                label: 'Alfa',
                                data: chartKehadiran.alfa,
                                borderColor: '#dc2626',
                                borderWidth: 2,
                                borderDash: [3, 3],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 3,
                                pointBackgroundColor: '#dc2626'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'end',
                                labels: {
                                    boxWidth: 12,
                                    usePointStyle: true,
                                    font: { size: 11, weight: '600' }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                padding: 10,
                                cornerRadius: 8,
                                titleFont: { size: 12, weight: 'bold' },
                                bodyFont: { size: 11 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0, color: '#64748b', font: { size: 11 } },
                                grid: { color: '#f1f5f9' }
                            },
                            x: {
                                ticks: { color: '#64748b', font: { size: 11 } },
                                grid: { display: false }
                            }
                        }
                    }
                });
            }
        });
    </script>
    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>
</html>