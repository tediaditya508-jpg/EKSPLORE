<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - EKSPLORE</title>

    <!-- Chart.js lokal agar grafik tetap tampil tanpa internet -->
    <script src="{{ asset('vendor/chart.umd.min.js') }}"></script>

    <style>
        :root {
            --font-sans: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --primary: #7c3aed;
            --primary-hover: #6d28d9;
            --primary-light: #f5f3ff;
            --active-bg: #f5f3ff;
            --active-text: #7c3aed;
            --active-border: #7c3aed;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-bg: #dcfce7;
            --warning: #d97706;
            --warning-bg: #fef3c7;
            --info: #a21caf;
            --info-bg: #fdf4ff;
            --danger: #dc2626;
            --danger-bg: #fef2f2;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 76px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
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
            background: rgba(255, 255, 255, 0.95);
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
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
        }

        .sidebar-overlay {
            display: none;
        }

        /* =========================================
           SIDEBAR UTAMA ADMIN & COLLAPSE MODE (DESKTOP)
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

        body.sidebar-collapsed .sidebar {
            width: var(--sidebar-collapsed-width);
            padding: 18px 10px;
        }

        body.sidebar-collapsed .container-main {
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

        /* HEADER SIDEBAR & LOGO "E" PULSE GLOW */
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
            0% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0.5); }
            70% { box-shadow: 0 0 0 10px rgba(124, 58, 237, 0); }
            100% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0); }
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
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
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .sidebar-toggle-btn, .sidebar-link {
            position: relative;
            overflow: hidden;
        }

        .sidebar-toggle-btn::after, .sidebar-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.25) 10%, transparent 70.1%);
            transform: scale(10);
            opacity: 0;
            transition: transform 0.5s, opacity 0.5s;
            pointer-events: none;
            border-radius: 50%;
            top: 0;
            left: 0;
        }

        .sidebar-toggle-btn:active::after, .sidebar-link:active::after {
            transform: scale(0);
            opacity: 1;
            transition: 0s;
        }

        .sidebar-toggle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--primary);
            cursor: pointer;
            transition: all 0.25s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .sidebar-toggle-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: #c4b5fd;
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.35);
            transform: translateY(-1px);
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            flex: 1;
            padding-right: 2px;
        }

        .sidebar-group {
            display: flex;
            flex-direction: column;
            gap: 3px;
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

        .sidebar-link, .sidebar-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 12px;
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

        .sidebar-link:hover, .sidebar-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: #ddd6fe;
            box-shadow: 0 0 12px rgba(124, 58, 237, 0.2);
            transform: translateX(2px);
        }

        .sidebar-link.active {
            background: var(--active-bg);
            color: var(--active-text);
            border-color: #ddd6fe;
            box-shadow: 0 2px 8px rgba(124, 58, 237, 0.08);
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

        .logout-btn {
            color: var(--danger);
        }

        .logout-btn:hover {
            background: var(--danger-bg) !important;
            color: var(--danger);
            box-shadow: 0 0 12px rgba(220, 38, 38, 0.2) !important;
        }

        .sidebar-footer-box {
            margin-top: 6px;
            padding: 8px 12px;
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
           CONTAINER UTAMA KONTEN DASHBOARD
           ========================================= */
        .container-main {
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

        /* =========================================
           GRID METRIC STATISTIK KARTU
           ========================================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.04);
        }

        .stat-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .stat-badge-trend {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 20px;
        }

        .trend-up { background: var(--success-bg); color: var(--success); }
        .trend-down { background: var(--danger-bg); color: var(--danger); }
        .trend-neutral { background: #f1f5f9; color: #475569; }

        .stat-details span {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .stat-details strong {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-main);
        }

        /* =========================================
           LAYOUT UTAMA & UKURAN GRAFIK YANG DIKECILKAN & RESPONSIF
           ========================================= */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .card:last-child {
            margin-bottom: 0;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
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

        /* UKURAN CONTAINER GRAFIK DIBUAT PAS, COMPACT, & RESPONSIF */
        .chart-container-large {
            position: relative;
            width: 100%;
            height: 220px; /* Dikecilkan agar pas di semua layar */
            max-height: 240px;
        }

        .chart-container-small {
            position: relative;
            width: 100%;
            height: 180px; /* Dikecilkan agar proporsional */
            max-height: 200px;
        }

        /* ==========================================================
           MODUL PENGELOLAAN ADMIN EKSPLORE (RESPONSIF PENUH)
           ========================================================== */
        .mgmt-section-container {
            border: 1px solid #cbd5e1;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .mgmt-main-header {
            align-items: flex-start;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 18px;
        }

        .section-subtext {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 3px;
        }

        .total-modul-badge {
            background: #7c3aed;
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
            flex-shrink: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .mgmt-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .mgmt-card:hover {
            transform: translateY(-4px);
            border-color: #7c3aed;
            box-shadow: 0 10px 20px rgba(124, 58, 237, 0.1);
        }

        .mgmt-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .mgmt-card-icon {
            width: 38px;
            height: 38px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .mgmt-card:hover .mgmt-card-icon {
            background: var(--primary);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
        }

        .mgmt-tag {
            font-size: 10px;
            font-weight: 700;
            padding: 3px 6px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tag-master { background: #f5f3ff; color: #6d28d9; border: 1px solid #ddd6fe; }
        .tag-user { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        .tag-ops { background: #fefce8; color: #a16207; border: 1px solid #fef08a; }
        .tag-student { background: #faf5ff; color: #7e22ce; border: 1px solid #e9d5ff; }
        .tag-pub { background: #fff1f2; color: #be123c; border: 1px solid #fecdd3; }
        .tag-sys { background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; }

        .mgmt-card h4 {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .mgmt-card p {
            font-size: 11.5px;
            color: var(--text-muted);
            line-height: 1.4;
            margin-bottom: 14px;
        }

        .mgmt-card-link {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .mgmt-card-link .arrow {
            transition: transform 0.25s ease;
        }

        .mgmt-card:hover .mgmt-card-link {
            color: var(--primary-hover);
        }

        .mgmt-card:hover .mgmt-card-link .arrow {
            transform: translateX(4px);
        }

        /* =========================================
           BREAKPOINTS RESPONSIF (HP, TABLET, LAPTOP)
           ========================================= */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .cards { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 900px) {
            .top-navbar { display: flex; }
            body.sidebar-collapsed .sidebar { width: var(--sidebar-width); }
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; padding: 18px 14px !important; }
            .sidebar.mobile-open { transform: translateX(0); box-shadow: 15px 0 40px rgba(0,0,0,0.2); }
            .sidebar.mobile-open .sidebar-menu-label, .sidebar.mobile-open .sidebar-link span, .sidebar.mobile-open .sidebar-btn span, .sidebar.mobile-open .sidebar-footer-box { display: flex !important; }
            .sidebar.mobile-open .brand-text { display: block !important; }
            .sidebar.mobile-open .sidebar-menu-label { display: block !important; }
            .sidebar.mobile-open .brand-info { display: flex !important; }
            .sidebar.mobile-open .brand-container { justify-content: space-between !important; }

            .sidebar-overlay.show { display: block; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px); z-index: 1150; }
            .container-main { margin-left: 0 !important; padding: 16px 12px; }

            .stats-grid { grid-template-columns: 1fr; gap: 10px; }
            .dashboard-grid { grid-template-columns: 1fr; gap: 14px; }
            .cards { grid-template-columns: 1fr; }
            .user-profile-badge { display: none; }
            .mgmt-main-header { flex-direction: column; gap: 8px; }
            .chart-container-large { height: 200px; }
            .chart-container-small { height: 160px; }
        }

        @media (max-width: 480px) {
            .container-main { padding: 12px 10px; }
            .welcome-box h2 { font-size: 18px; }
            .stat-card { padding: 14px; }
            .chart-container-large { height: 180px; }
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
        <span class="top-navbar-brand">EKSPLORE ADMIN</span>
        <div style="width: 38px;"></div>
    </header>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR UTAMA ADMIN -->
    <aside class="sidebar" id="appSidebar">
        <!-- HEADER LOGO BERANIMASI GLOW PULSE -->
        <div class="brand-container">
            <div class="brand-info">
                <div class="brand-logo">E</div>
                <div class="brand-text">
                    <h1>EKSPLORE</h1>
                    <p>Administrator System</p>
                </div>
            </div>

            <button type="button" class="sidebar-toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/><path d="m14 15-3-3 3-3"/></svg>
            </button>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-group">
                <div class="sidebar-menu-label">MENU UTAMA ADMIN</div>

                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" title="Dashboard">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.ekstrakurikuler') }}" class="sidebar-link {{ request()->routeIs('admin.ekstrakurikuler*') ? 'active' : '' }}" title="Ekstrakurikuler">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    <span>Ekstrakurikuler</span>
                </a>

                <a href="{{ route('admin.pengguna') }}" class="sidebar-link {{ request()->routeIs('admin.pengguna*') ? 'active' : '' }}" title="Pengguna">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>Pengguna</span>
                </a>

                <a href="{{ route('admin.jadwal') }}" class="sidebar-link {{ request()->routeIs('admin.jadwal*') ? 'active' : '' }}" title="Jadwal">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('admin.pendaftaran') }}" class="sidebar-link {{ request()->routeIs('admin.pendaftaran*') ? 'active' : '' }}" title="Pendaftaran">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                    <span>Pendaftaran</span>
                </a>

                <a href="{{ route('admin.anggota') }}" class="sidebar-link {{ request()->routeIs('admin.anggota*') ? 'active' : '' }}" title="Anggota">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    <span>Anggota</span>
                </a>

                <a href="{{ route('admin.absensi') }}" class="sidebar-link {{ request()->routeIs('admin.absensi*') ? 'active' : '' }}" title="Absensi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/></svg>
                    <span>Absensi</span>
                </a>

                <a href="{{ route('admin.prestasi') }}" class="sidebar-link {{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}" title="Prestasi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                    <span>Prestasi</span>
                </a>

                <a href="{{ route('admin.pengumuman') }}" class="sidebar-link {{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}" title="Pengumuman">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    <span>Pengumuman</span>
                </a>

                <a href="{{ route('admin.galeri') }}" class="sidebar-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}" title="Galeri">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    <span>Galeri</span>
                </a>

                <a href="{{ route('admin.laporan') }}" class="sidebar-link {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}" title="Laporan">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                    <span>Laporan</span>
                </a>

                <a href="{{ route('admin.kenaikan-kelas') }}" class="sidebar-link {{ request()->routeIs('admin.kenaikan-kelas*') ? 'active' : '' }}" title="Kenaikan Kelas">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    <span>Kenaikan Kelas</span>
                </a>
            </div>

            <!-- LOGOUT & FOOTER STATUS -->
            <div class="sidebar-group" style="margin-top: auto;">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                    @csrf
                    <button type="submit" class="sidebar-btn logout-btn" title="Logout">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        <span>Logout</span>
                    </button>
                </form>

                <div class="sidebar-footer-box">
                    <span>System Active</span>
                    <span class="online-dot"></span>
                </div>
            </div>
        </nav>
    </aside>

    <!-- KONTEN UTAMA DASHBOARD ADMIN -->
    <main class="container-main" id="mainContent">
        <div class="dashboard-header">
            <div class="welcome-box">
                <h2>Selamat Datang, {{ $admin->name ?? 'Administrator' }}</h2>
                <p>Kelola data, statistik, dan operasional ekstrakurikuler SMK Budi Bakti Ciwidey.</p>
            </div>

            <div class="user-profile-badge">
                @if (!empty($admin->foto))
                    <img
                        src="{{ asset('storage/' . $admin->foto) }}"
                        alt="Foto {{ $admin->name ?? 'Admin' }}"
                        class="profile-avatar-sm"
                        style="object-fit: cover;"
                    >
                @else
                    <div class="profile-avatar-sm">
                        {{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}
                    </div>
                @endif
                <div class="profile-meta">
                    <strong>{{ $admin->name ?? 'Admin' }}</strong>
                    <span>Super Administrator</span>
                </div>
            </div>
        </div>

        <!-- METRIC STATISTIK TERBARU -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="stat-badge-trend trend-neutral">
                        {{ $totalSiswa }} siswa
                    </div>
                </div>
                <div class="stat-details">
                    <span>Total Pengguna</span>
                    <strong>{{ number_format($totalPengguna, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    </div>
                    <div class="stat-badge-trend trend-neutral">
                        {{ $totalPembina }} pembina
                    </div>
                </div>
                <div class="stat-details">
                    <span>Ekstrakurikuler</span>
                    <strong>{{ number_format($totalEkskul, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                    </div>
                    <div class="stat-badge-trend {{ $pendingPendaftaran > 0 ? 'trend-down' : 'trend-up' }}">
                        {{ $pendingPendaftaran > 0 ? 'Perlu diproses' : 'Tidak ada' }}
                    </div>
                </div>
                <div class="stat-details">
                    <span>Pending Pendaftaran</span>
                    <strong>{{ number_format($pendingPendaftaran, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <div class="stat-badge-trend trend-neutral">
                        {{ number_format($totalAbsensi, 0, ',', '.') }} catatan
                    </div>
                </div>
                <div class="stat-details">
                    <span>Rata-Rata Kehadiran</span>
                    <strong>{{ number_format($rataKehadiran, 1, ',', '.') }}%</strong>
                </div>
            </div>
        </section>

        <!-- DASHBOARD GRID GRAFIK (DIKECILKAN & RESPONSIF) -->
        <div class="dashboard-grid">
            <!-- SISI KIRI: LINE CHART BULANAN -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                        Grafik Analisis Aktivitas Sistem
                    </h3>
                    <a href="{{ route('admin.laporan') }}">Detail →</a>
                </div>
                <div class="chart-container-large">
                    <canvas id="adminStockChart"></canvas>
                </div>
            </div>

            <!-- SISI KANAN: DOUGHNUT CHART DISTRIBUSI -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 10 10h-10z"/></svg>
                        Status Anggota
                    </h3>
                </div>
                <div class="chart-container-small">
                    <canvas id="statusDoughnutChart"></canvas>
                </div>
            </div>
        </div>

        <!-- GRID CARDS MANAGEMENT / MODUL PENGELOLAAN ADMIN EKSPLORE -->
        <div class="card mgmt-section-container">
            <div class="card-header mgmt-main-header">
                <div>
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                        Modul Pengelolaan Admin EKSPLORE
                    </h3>
                    <p class="section-subtext">Akses cepat dan kelola seluruh pusat kontrol operasional sistem ekstrakurikuler</p>
                </div>
                <div class="total-modul-badge">11 Modul Aktif</div>
            </div>

            <section class="cards">
                <!-- 1. Ekstrakurikuler -->
                <a href="{{ route('admin.ekstrakurikuler') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        </div>
                        <span class="mgmt-tag tag-master">Master Data</span>
                    </div>
                    <div>
                        <h4>Ekstrakurikuler</h4>
                        <p>Kelola data ekstrakurikuler sekolah, pembina, kuota, persyaratan, dan informasi kegiatan.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 2. Pengguna -->
                <a href="{{ route('admin.pengguna') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
                        </div>
                        <span class="mgmt-tag tag-user">Akun & Akses</span>
                    </div>
                    <div>
                        <h4>Pengguna</h4>
                        <p>Kelola akun siswa, pembina, dan administrator yang terdaftar dalam sistem.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 3. Jadwal -->
                <a href="{{ route('admin.jadwal') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        </div>
                        <span class="mgmt-tag tag-ops">Operasional</span>
                    </div>
                    <div>
                        <h4>Jadwal Kegiatan</h4>
                        <p>Kelola jadwal kegiatan ekstrakurikuler seperti hari, waktu, dan lokasi latihan.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 4. Pendaftaran -->
                <a href="{{ route('admin.pendaftaran') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                        </div>
                        <span class="mgmt-tag tag-student">Kesiswaan</span>
                    </div>
                    <div>
                        <h4>Pendaftaran</h4>
                        <p>Lihat dan kelola data pendaftaran serta alur persetujuan siswa ke ekstrakurikuler.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 5. Anggota -->
                <a href="{{ route('admin.anggota') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        </div>
                        <span class="mgmt-tag tag-student">Kesiswaan</span>
                    </div>
                    <div>
                        <h4>Anggota Ekskul</h4>
                        <p>Lihat dan filter data seluruh siswa yang terdaftar sebagai anggota aktif ekstrakurikuler.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 6. Absensi -->
                <a href="{{ route('admin.absensi') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 1-2 2v16a2 2 0 0 1 2 2h12a2 2 0 0 1 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <span class="mgmt-tag tag-ops">Operasional</span>
                    </div>
                    <div>
                        <h4>Rekap Absensi</h4>
                        <p>Pantau serta rekapitulasi data kehadiran, izin, sakit, dan alfa siswa secara akurat.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 7. Prestasi -->
                <a href="{{ route('admin.prestasi') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                        </div>
                        <span class="mgmt-tag tag-pub">Prestasi</span>
                    </div>
                    <div>
                        <h4>Prestasi</h4>
                        <p>Kelola pencapaian, kejuaraan, sertifikat, dan rekam jejak prestasi ekstrakurikuler.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 8. Pengumuman -->
                <a href="{{ route('admin.pengumuman') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                        </div>
                        <span class="mgmt-tag tag-pub">Publikasi</span>
                    </div>
                    <div>
                        <h4>Pengumuman</h4>
                        <p>Kelola informasi, berita penting, dan edaran untuk seluruh siswa dan pembina.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 9. Galeri Aktivitas -->
                <a href="{{ route('admin.galeri') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        </div>
                        <span class="mgmt-tag tag-pub">Media</span>
                    </div>
                    <div>
                        <h4>Galeri Aktivitas</h4>
                        <p>Dokumentasi foto, kegiatan visual, dan album momen kegiatan ekstrakurikuler.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 10. Laporan Analytic -->
                <a href="{{ route('admin.laporan') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                        </div>
                        <span class="mgmt-tag tag-sys">Analitik</span>
                    </div>
                    <div>
                        <h4>Laporan Analytic</h4>
                        <p>Ringkasan data analitik komprehensif, ekspor laporan cetak, dan performa sistem.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>

                <!-- 11. Kenaikan Kelas -->
                <a href="{{ route('admin.kenaikan-kelas') }}" class="mgmt-card">
                    <div class="mgmt-card-top">
                        <div class="mgmt-card-icon">
                            <svg class="icon" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <span class="mgmt-tag tag-sys">Sistem</span>
                    </div>
                    <div>
                        <h4>Kenaikan Kelas</h4>
                        <p>Kelola otomatisasi pemindahan tingkatan kelas siswa (10→11, 11→12) dan penetapan Alumni.</p>
                    </div>
                    <span class="mgmt-card-link">Akses Modul <span class="arrow">→</span></span>
                </a>
            </section>
        </div>
    </main>

    <!-- SCRIPT INTERAKTIF & CHART.JS (RESPONSIF PENUH) -->
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

            sidebar.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (isMobile()) {
                        sidebar.classList.remove('mobile-open');
                        if (overlay) overlay.classList.remove('show');
                    }
                });
            });

            const chartAktivitas = @json($chartAktivitas);
            const statusAnggota = @json($statusAnggota);

            if (typeof Chart === 'undefined') {
                console.error('Chart.js tidak termuat. Grafik tidak dapat ditampilkan.');
                return;
            }

            // 1. GRAFIK LINE CHART AKTIVITAS SISTEM (DATA REAL)
            const canvasStock = document.getElementById('adminStockChart');

            if (canvasStock) {
                const ctxStock = canvasStock.getContext('2d');
                const gradientBg = ctxStock.createLinearGradient(0, 0, 0, 220);
                gradientBg.addColorStop(0, 'rgba(124, 58, 237, 0.3)');
                gradientBg.addColorStop(1, 'rgba(124, 58, 237, 0.0)');

                new Chart(ctxStock, {
                    type: 'line',
                    data: {
                        labels: chartAktivitas.labels,
                        datasets: [
                            {
                                label: 'Absensi',
                                data: chartAktivitas.absensi,
                                borderColor: '#7c3aed',
                                borderWidth: 2.5,
                                fill: true,
                                backgroundColor: gradientBg,
                                tension: 0.4,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBackgroundColor: '#7c3aed'
                            },
                            {
                                label: 'Pendaftaran Baru',
                                data: chartAktivitas.pendaftaran,
                                borderColor: '#16a34a',
                                borderWidth: 2,
                                borderDash: [3, 3],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 2,
                                pointBackgroundColor: '#16a34a'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'end',
                                labels: { boxWidth: 10, usePointStyle: true, font: { size: 10, weight: '600' } }
                            },
                            tooltip: { backgroundColor: '#1e293b', padding: 8, cornerRadius: 6, bodyFont: { size: 11 } }
                        },
                        scales: {
                            y: { beginAtZero: true, ticks: { precision: 0, color: '#64748b', font: { size: 10 } }, grid: { color: '#f1f5f9' } },
                            x: { ticks: { color: '#64748b', font: { size: 10 } }, grid: { display: false } }
                        }
                    }
                });
            }

            // 2. GRAFIK DOUGHNUT STATUS SISWA (DATA REAL)
            const canvasDoughnut = document.getElementById('statusDoughnutChart');

            if (canvasDoughnut) {
                new Chart(canvasDoughnut.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: statusAnggota.labels,
                        datasets: [{
                            data: statusAnggota.data,
                            backgroundColor: ['#7c3aed', '#64748b'],
                            borderWidth: 2,
                            borderColor: '#ffffff',
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { boxWidth: 8, usePointStyle: true, font: { size: 10, weight: '600' } }
                            }
                        },
                        cutout: '68%'
                    }
                });
            }
        });
    </script>
    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>

</html>