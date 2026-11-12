<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembina - EKSPLORE</title>

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
            --warning-bg: #fef3c7;
            --info: #0284c7;
            --info-bg: #e0f2fe;
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
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
        }

        .sidebar-overlay {
            display: none;
        }

        /* =========================================
           SIDEBAR UTAMA PEMBINA & COLLAPSE MODE
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
            background: radial-gradient(circle, rgba(37, 99, 235, 0.25) 10%, transparent 70.1%);
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
            border-color: #93c5fd;
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.35);
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
            border-color: #bfdbfe;
            box-shadow: 0 0 12px rgba(37, 99, 235, 0.2);
            transform: translateX(2px);
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
           KONTEN UTAMA DASHBOARD
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

        /* STATISTIK RINGKASAN */
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

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
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

        /* UKURAN CONTAINER GRAFIK COMPACT & RESPONSIF */
        .chart-container {
            position: relative;
            width: 100%;
            height: 220px;
            max-height: 240px;
        }

        /* ==========================================================
           MODUL PENGELOLAAN PEMBINA (DESAIN ULTRA KREATIF & KARTU)
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
            background: #2563eb;
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
            flex-shrink: 0;
        }

        .management-grid {
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
            border-color: #3b82f6;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.1);
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
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .mgmt-tag {
            font-size: 10px;
            font-weight: 700;
            padding: 3px 6px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tag-master { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
        .tag-user { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        .tag-ops { background: #fefce8; color: #a16207; border: 1px solid #fef08a; }
        .tag-student { background: #faf5ff; color: #7e22ce; border: 1px solid #e9d5ff; }
        .tag-pub { background: #fff1f2; color: #be123c; border: 1px solid #fecdd3; }

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

        /* LIST ITEM STYLING */
        .list-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px;
            background: var(--bg-body);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .list-item:last-child {
            margin-bottom: 0;
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
        }

        .status-pill {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-active { background: #dcfce7; color: #166534; }
        .status-waiting { background: #fef3c7; color: #92400e; }
        .status-info { background: #dbeafe; color: #1e40af; }

        /* =========================================
           MEDIA QUERIES (RESPONSIF HP, TABLET, LAPTOP)
           ========================================= */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .management-grid { grid-template-columns: repeat(2, 1fr); }
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
            .main-content { margin-left: 0 !important; padding: 16px 12px; }

            .stats-grid { grid-template-columns: 1fr; gap: 10px; }
            .dashboard-grid { grid-template-columns: 1fr; gap: 14px; }
            .management-grid { grid-template-columns: 1fr; }
            .user-profile-badge { display: none; }
            .mgmt-main-header { flex-direction: column; gap: 8px; }
            .chart-container { height: 190px; }
        }

        @media (max-width: 480px) {
            .main-content { padding: 12px 10px; }
            .welcome-box h2 { font-size: 18px; }
            .stat-card { padding: 14px; }
            .chart-container { height: 170px; }
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
        <span class="top-navbar-brand">EKSPLORE PEMBINA</span>
        <div style="width: 38px;"></div>
    </header>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR UTAMA PEMBINA -->
    <aside class="sidebar" id="appSidebar">
        <!-- HEADER SIDEBAR LOGO BERANIMASI GLOW PULSE -->
        <div class="brand-container">
            <div class="brand-info">
                <div class="brand-logo">E</div>
                <div class="brand-text">
                    <h1>EKSPLORE</h1>
                    <p>SMK Budi Bakti</p>
                </div>
            </div>

            <button type="button" class="sidebar-toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/><path d="m14 15-3-3 3-3"/></svg>
            </button>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-group">
                <div class="sidebar-menu-label">MENU PEMBINA</div>

                <a href="{{ route('pembina.dashboard') }}" class="sidebar-link {{ request()->routeIs('pembina.dashboard') ? 'active' : '' }}" title="Dashboard">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('pembina.ekstrakurikuler') }}" class="sidebar-link {{ request()->routeIs('pembina.ekstrakurikuler*') ? 'active' : '' }}" title="Ekstrakurikuler">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    <span>Ekstrakurikuler</span>
                </a>

                <a href="{{ route('pembina.jadwal') }}" class="sidebar-link {{ request()->routeIs('pembina.jadwal*') ? 'active' : '' }}" title="Jadwal">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('pembina.anggota') }}" class="sidebar-link {{ request()->routeIs('pembina.anggota*') ? 'active' : '' }}" title="Anggota">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>Anggota</span>
                </a>

                <a href="{{ route('pembina.absensi') }}" class="sidebar-link {{ request()->routeIs('pembina.absensi*') ? 'active' : '' }}" title="Absensi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                    <span>Absensi</span>
                </a>

                <a href="{{ route('pembina.pendaftaran') }}" class="sidebar-link {{ request()->routeIs('pembina.pendaftaran*') ? 'active' : '' }}" title="Pendaftaran">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                    <span>Pendaftaran</span>
                </a>

                <a href="{{ route('pembina.pindah_ekskul') }}" class="sidebar-link {{ request()->routeIs('pembina.pindah_ekskul*') ? 'active' : '' }}" title="Pindah Ekskul">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
                    <span>Pindah Ekskul</span>
                </a>

                <a href="{{ route('pembina.prestasi') }}" class="sidebar-link {{ request()->routeIs('pembina.prestasi*') ? 'active' : '' }}" title="Prestasi">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                    <span>Prestasi</span>
                </a>

                <a href="{{ route('pembina.galeri') }}" class="sidebar-link {{ request()->routeIs('pembina.galeri*') ? 'active' : '' }}" title="Galeri">
                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    <span>Galeri</span>
                </a>

                <a href="{{ route('pembina.pengumuman') }}" class="sidebar-link {{ request()->routeIs('pembina.pengumuman*') ? 'active' : '' }}" title="Pengumuman">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                    <span>Pengumuman</span>
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
                    <span>Online</span>
                    <span class="online-dot"></span>
                </div>
            </div>
        </nav>
    </aside>

    <!-- KONTEN UTAMA DASHBOARD PEMBINA -->
    <main class="main-content" id="mainContent">
        <div class="dashboard-header">
            <div class="welcome-box">
                <h2>Halo, {{ $pembina->name ?? 'Pembina' }} 👋</h2>
                <p>Kelola dan pantau kegiatan ekstrakurikuler sekolah dengan mudah.</p>
            </div>

            <div class="user-profile-badge">
                @if (!empty($pembina->foto))
                    <img
                        src="{{ asset('storage/' . $pembina->foto) }}"
                        alt="Foto {{ $pembina->name ?? 'Pembina' }}"
                        class="profile-avatar-sm"
                        style="object-fit: cover;"
                    >
                @else
                    <div class="profile-avatar-sm">
                        {{ strtoupper(substr($pembina->name ?? 'P', 0, 1)) }}
                    </div>
                @endif
                <div class="profile-meta">
                    <strong>{{ $pembina->name ?? 'Pembina' }}</strong>
                    <span>Pembina Ekstrakurikuler</span>
                </div>
            </div>
        </div>

        <!-- STATISTIK RINGKASAN -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    </div>
                    <div class="stat-badge-trend {{ $jumlahEkskul > 0 ? 'trend-up' : 'trend-down' }}">{{ $jumlahEkskul > 0 ? 'Aktif' : 'Belum ada' }}</div>
                </div>
                <div class="stat-details">
                    <span>Ekskul Dibina</span>
                    <strong>{{ number_format($jumlahEkskul, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <div class="stat-badge-trend trend-neutral">{{ $anggotaAktif }} siswa</div>
                </div>
                <div class="stat-details">
                    <span>Anggota Aktif</span>
                    <strong>{{ number_format($anggotaAktif, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                    </div>
                    <div class="stat-badge-trend {{ $pendingPendaftaran > 0 ? 'trend-down' : 'trend-up' }}">{{ $pendingPendaftaran > 0 ? 'Perlu proses' : 'Tidak ada' }}</div>
                </div>
                <div class="stat-details">
                    <span>Pendaftaran Baru</span>
                    <strong>{{ number_format($pendingPendaftaran, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <div class="stat-badge-trend trend-neutral">{{ number_format($totalAbsensi, 0, ',', '.') }} catatan</div>
                </div>
                <div class="stat-details">
                    <span>Kehadiran Avg</span>
                    <strong>{{ number_format($rataKehadiran, 1, ',', '.') }}%</strong>
                </div>
            </div>
        </section>

        <!-- KONTEN DASHBOARD UTAMA -->
        <div class="dashboard-grid">
            <!-- SISI KIRI -->
            <div>
                <!-- GRAFIK KEHADIRAN (STOCK CHART STYLE) -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                            Grafik Kehadiran, Izin, Sakit & Alfa
                        </h3>
                        <a href="{{ route('pembina.absensi') }}">Detail Absensi →</a>
                    </div>
                    <div class="chart-container">
                        <canvas id="kehadiranStockChart"></canvas>
                    </div>
                </div>

                <!-- STATUS PENGELOLAAN -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            Status Pengelolaan Ekstrakurikuler
                        </h3>
                    </div>

                    <div class="list-item">
                        <div class="item-info">
                            <strong>Status Ekstrakurikuler</strong>
                            <span>{{ $jumlahEkskul > 0 ? $ekskulDibina->pluck('nama_ekskul')->join(', ') : 'Belum ada ekstrakurikuler yang dibina' }}</span>
                        </div>
                        <span class="status-pill {{ $jumlahEkskul > 0 ? 'status-active' : 'status-waiting' }}">{{ $jumlahEkskul > 0 ? 'Aktif' : 'Kosong' }}</span>
                    </div>

                    <div class="list-item">
                        <div class="item-info">
                            <strong>Status Anggota</strong>
                            <span>{{ $anggotaAktif }} anggota terdaftar</span>
                        </div>
                        <span class="status-pill {{ $anggotaAktif > 0 ? 'status-active' : 'status-waiting' }}">{{ $anggotaAktif > 0 ? 'Aktif' : 'Kosong' }}</span>
                    </div>

                    <div class="list-item">
                        <div class="item-info">
                            <strong>Pengajuan Pendaftaran</strong>
                            <span>{{ $pendingPendaftaran }} calon anggota menunggu verifikasi</span>
                        </div>
                        <span class="status-pill {{ $pendingPendaftaran > 0 ? 'status-waiting' : 'status-active' }}">{{ $pendingPendaftaran > 0 ? 'Perlu Diproses' : 'Tidak Ada' }}</span>
                    </div>

                    <div class="list-item">
                        <div class="item-info">
                            <strong>Rekapitulasi Absensi</strong>
                            <span>{{ $totalAbsensi }} catatan absensi tersimpan</span>
                        </div>
                        <span class="status-pill {{ $totalAbsensi > 0 ? 'status-info' : 'status-waiting' }}">{{ $totalAbsensi > 0 ? 'Tersedia' : 'Belum Ada' }}</span>
                    </div>
                </div>

                <!-- MENU PENGELOLAAN EKSTRAKURIKULER (DESAIN KREATIF KARTU DENGAN TAG) -->
                <div class="card mgmt-section-container">
                    <div class="card-header mgmt-main-header">
                        <div>
                            <h3>
                                <svg class="icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                                Menu Pengelolaan Ekstrakurikuler
                            </h3>
                            <p class="section-subtext">Pusat kontrol cepat operasional pembinaan ekskul</p>
                        </div>
                        <div class="total-modul-badge">6 Modul Aktif</div>
                    </div>

                    <div class="management-grid">
                        <a href="{{ route('pembina.ekstrakurikuler') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                                </div>
                                <span class="mgmt-tag tag-master">Profil</span>
                            </div>
                            <div>
                                <h4>Ekstrakurikuler</h4>
                                <p>Lihat profil & informasi ekskul yang dibina.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>

                        <a href="{{ route('pembina.jadwal') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                </div>
                                <span class="mgmt-tag tag-ops">Jadwal</span>
                            </div>
                            <div>
                                <h4>Jadwal Pertemuan</h4>
                                <p>Atur dan pantau jadwal pertemuan latihan.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>

                        <a href="{{ route('pembina.anggota') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                </div>
                                <span class="mgmt-tag tag-student">Siswa</span>
                            </div>
                            <div>
                                <h4>Anggota Ekskul</h4>
                                <p>Kelola data dan status siswa aktif.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>

                        <a href="{{ route('pembina.absensi') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg>
                                </div>
                                <span class="mgmt-tag tag-ops">Absen</span>
                            </div>
                            <div>
                                <h4>Rekap Absensi</h4>
                                <p>Input & evaluasi riwayat kehadiran.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>

                        <a href="{{ route('pembina.pendaftaran') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                                </div>
                                <span class="mgmt-tag tag-student">Seleksi</span>
                            </div>
                            <div>
                                <h4>Pendaftaran</h4>
                                <p>Verifikasi pengajuan pendaftaran baru.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>

                        <a href="{{ route('pembina.prestasi') }}" class="mgmt-card">
                            <div class="mgmt-card-top">
                                <div class="mgmt-card-icon">
                                    <svg class="icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/></svg>
                                </div>
                                <span class="mgmt-tag tag-pub">Juara</span>
                            </div>
                            <div>
                                <h4>Prestasi</h4>
                                <p>Catat capaian & piagam anggota.</p>
                            </div>
                            <span class="mgmt-card-link">Buka Menu <span class="arrow">→</span></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- SISI KANAN -->
            <div>
                <!-- TAUTAN PINTAS PENGUMUMAN & GALERI -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            Tautan Pintas
                        </h3>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <a href="{{ route('pembina.pengumuman') }}" class="list-item" style="text-decoration:none;">
                            <div class="item-info">
                                <strong>📢 Buat Pengumuman Baru</strong>
                                <span>Kirim informasi terbaru ke anggota</span>
                            </div>
                            <svg class="icon" style="color:var(--primary)" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                        </a>

                        <a href="{{ route('pembina.galeri') }}" class="list-item" style="text-decoration:none;">
                            <div class="item-info">
                                <strong>🖼️ Upload Dokumentasi</strong>
                                <span>Kelola foto aktivitas ekstrakurikuler</span>
                            </div>
                            <svg class="icon" style="color:var(--primary)" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                        </a>
                    </div>
                </div>

                <!-- SYSTEM INFO -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
                            EKSPLORE Pembina Modul
                        </h3>
                    </div>
                    <div style="font-size: 12px; color: var(--text-muted); line-height: 1.5; margin-bottom: 12px;">
                        Sistem pengelolaan ekstrakurikuler SMK Budi Bakti Ciwidey dirancang untuk memudahkan Pembina mendokumentasikan kegiatan, kehadiran, dan prestasi siswa secara presisi.
                    </div>
                    <div style="padding: 10px; background: var(--primary-light); border-radius: 8px; font-size: 11px; color: var(--primary); line-height: 1.4;">
                        Pastikan untuk rutin melakukan verifikasi absensi dan pendaftaran baru siswa tepat waktu.
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- SCRIPT INTERAKTIF TOGGLE & GRAFIK (HADIR, IZIN, SAKIT, ALFA) -->
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

            // Render Grafik Kehadiran dari data absensi ekskul yang dibina
            const canvas = document.getElementById('kehadiranStockChart');

            if (canvas && typeof Chart !== 'undefined') {
                const chartKehadiran = @json($chartKehadiran);
                const ctx = canvas.getContext('2d');

                const gradientHadir = ctx.createLinearGradient(0, 0, 0, 220);
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
                                borderWidth: 2.5,
                                fill: true,
                                backgroundColor: gradientHadir,
                                tension: 0.4,
                                pointRadius: 3,
                                pointHoverRadius: 6,
                                pointBackgroundColor: '#2563eb',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2
                            },
                            {
                                label: 'Izin',
                                data: chartKehadiran.izin,
                                borderColor: '#d97706',
                                borderWidth: 2,
                                borderDash: [3, 3],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 2,
                                pointBackgroundColor: '#d97706'
                            },
                            {
                                label: 'Sakit',
                                data: chartKehadiran.sakit,
                                borderColor: '#0284c7',
                                borderWidth: 2,
                                borderDash: [3, 3],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 2,
                                pointBackgroundColor: '#0284c7'
                            },
                            {
                                label: 'Alfa',
                                data: chartKehadiran.alfa,
                                borderColor: '#dc2626',
                                borderWidth: 2,
                                borderDash: [2, 2],
                                fill: false,
                                tension: 0.4,
                                pointRadius: 2,
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
                                    boxWidth: 10,
                                    usePointStyle: true,
                                    font: { size: 10, weight: '600' }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                padding: 8,
                                cornerRadius: 6,
                                bodyFont: { size: 11 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0, color: '#64748b', font: { size: 10 } },
                                grid: { color: '#f1f5f9' }
                            },
                            x: {
                                ticks: { color: '#64748b', font: { size: 10 } },
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