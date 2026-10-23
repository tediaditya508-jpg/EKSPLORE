<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Pembina - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        :root {
            --primary: #2878bd;
            --sidebar: #111827;
            --sidebar-hover: #253449;
            --background: #f5f7fb;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
        }

        body {
            background: var(--background);
            color: var(--text);
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        /* TOMBOL HAMBURGER PEMBINA */
.menu-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: white;
    color: #1d4ed8;
    font-size: 25px;
    cursor: pointer;
}

.menu-toggle:hover {
    background: #eff6ff;
}

        .sidebar {
            width: 255px;
            flex-shrink: 0;
            height: 100vh;
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            padding: 25px 16px 18px;
            background: var(--sidebar);
            color: white;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 0 12px;
            margin-bottom: 8px;
            font-size: 23px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .sidebar-subtitle {
            padding: 0 12px;
            margin-bottom: 28px;
            color: #9ca3af;
            font-size: 12px;
        }

        .sidebar-label {
            margin: 0 12px 10px;
            color: #9ca3af;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 9px;
            color: #d1d5db;
            text-decoration: none;
            font-size: 14px;
            transition: background .2s, color .2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a:focus-visible {
            background: var(--sidebar-hover);
            color: white;
            outline: none;
        }

        .menu-icon {
            width: 23px;
            flex-shrink: 0;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-spacer {
            flex: 1;
            min-height: 25px;
        }

        .sidebar-logout {
            border-top: 1px solid #374151;
            padding-top: 17px;
        }

        .sidebar-logout form {
            width: 100%;
        }

        .sidebar-logout button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 9px;
            background: #991b1b;
            color: white;
            cursor: pointer;
            text-align: left;
            font-size: 14px;
        }

        .sidebar-logout button:hover {
            background: #b91c1c;
        }

        /* AREA KONTEN */

        .dashboard-content {
            flex: 1;
            min-width: 0;
        }

        .navbar {
            min-height: 76px;
            padding: 16px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .navbar-title {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar-subtitle {
            margin-top: 5px;
            color: var(--muted);
            font-size: 13px;
        }

        .role-badge {
            padding: 9px 13px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1e40af;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .container {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 30px;
        }

        /* SAMBUTAN */

        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
            padding: 28px;
            border-radius: 15px;
            background: linear-gradient(120deg, #2878bd, #1d4ed8);
            box-shadow: 0 5px 18px rgba(40, 120, 189, .15);
            color: white;
        }

        .welcome h1 {
            margin-bottom: 10px;
            font-size: 25px;
        }

        .welcome p {
            color: #eaf3ff;
            font-size: 14px;
            line-height: 1.6;
        }

        .welcome-icon {
            font-size: 43px;
        }

        /* RINGKASAN */

        .summary {
            margin-bottom: 30px;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .section-heading {
            margin-bottom: 8px;
            font-size: 21px;
            font-weight: bold;
        }

        .section-description {
            margin-bottom: 24px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .info-card {
            min-width: 0;
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #f8fafc;
            transition: transform .2s, box-shadow .2s;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
        }

        .info-icon {
            margin-bottom: 12px;
            font-size: 27px;
        }

        .info-title {
            margin-bottom: 8px;
            color: var(--muted);
            font-size: 11px;
            font-weight: bold;
            line-height: 1.5;
        }

        .info-value {
            color: #111827;
            font-size: 28px;
            font-weight: bold;
        }

        .info-description {
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        /* AKTIVITAS */

        .activity-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .activity-box {
            min-width: 0;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
        }

        .activity-box h3 {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 14px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-name {
            color: #374151;
            font-size: 13px;
            line-height: 1.5;
        }

        .status {
            display: inline-block;
            flex-shrink: 0;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-waiting {
            background: #fef3c7;
            color: #92400e;
        }

        .status-info {
            background: #dbeafe;
            color: #1e40af;
        }

        .activity-value {
            color: var(--primary);
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        /* PENGELOLAAN */

        .management-section {
            margin-top: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            display: block;
            min-width: 0;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .035);
            color: var(--text);
            text-decoration: none;
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .card:hover,
        .card:focus-visible {
            transform: translateY(-3px);
            border-color: #93c5fd;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            outline: none;
        }

        .card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            margin-bottom: 17px;
            border-radius: 12px;
            background: #eff6ff;
            font-size: 22px;
        }

        .card h3 {
            margin-bottom: 9px;
            font-size: 16px;
        }

        .card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .card-action {
            display: inline-block;
            margin-top: 17px;
            color: var(--primary);
            font-size: 12px;
            font-weight: bold;
        }

        .footer-note {
            padding: 20px 0 5px;
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .info-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .container {
                padding: 24px;
            }
        }

        @media (max-width: 800px) {
            .dashboard-layout {
                flex-direction: column;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 20px 16px;
                overflow: visible;
            }

            .sidebar-brand {
                font-size: 21px;
            }

            .sidebar-subtitle {
                margin-bottom: 20px;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sidebar-spacer {
                display: none;
            }

            .sidebar-logout {
                margin-top: 16px;
            }

            .navbar {
                padding: 17px 20px;
            }

            .container {
                padding: 20px;
            }

            .activity-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .sidebar-menu {
                grid-template-columns: 1fr;
            }

            .info-grid,
            .cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 21px;
                overflow-wrap: anywhere;
            }

            .welcome-icon {
                font-size: 32px;
            }

            .summary {
                padding: 18px;
            }

            .container {
                padding: 15px;
            }

            .section-heading {
                font-size: 19px;
            }
        }

            /* HAMBURGER RESPONSIVE PEMBINA */
@media (max-width: 800px) {
    .dashboard-layout {
        flex-direction: row;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        width: 255px;
        height: 100vh;
        overflow-y: auto;
        transform: translateX(-100%);
        visibility: hidden;
        transition:
    transform 0.22s ease-in-out,
    visibility 0.22s ease-in-out;
    }

    .sidebar.active {
        transform: translateX(0);
        visibility: visible;
    }

    .menu-toggle {
        display: inline-flex;
    }

    .dashboard-content {
        width: 100%;
        min-width: 0;
    }

    .navbar {
        flex-direction: row;
        align-items: center;
    }
}

        /* HAMBURGER PEMBINA - SEMUA PERANGKAT */
.dashboard-layout {
    flex-direction: row;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    width: 255px;
    height: 100vh;
    flex-shrink: 0;
    overflow-y: auto;
    transform: translateX(-100%);
    visibility: hidden;
    transition: transform 0.25s ease, visibility 0.25s ease;
}

.sidebar.active {
    transform: translateX(0);
    visibility: visible;
}

.dashboard-content {
    width: 100%;
    min-width: 0;
    flex: 1 1 auto;
    transition: margin-left 0.25s ease, width 0.25s ease;
}

@media (min-width: 801px) {
    .dashboard-layout.sidebar-open .dashboard-content {
        margin-left: 255px;
        width: calc(100% - 255px);
    }

    .dashboard-layout:not(.sidebar-open) .dashboard-content {
        margin-left: 0;
        width: 100%;
    }
}

.navbar {
    flex-direction: row;
    align-items: center;
}

.menu-toggle {
    display: inline-flex;
}

@media (max-width: 800px) {
    .dashboard-layout {
        flex-direction: row;
    }

    .sidebar {
        width: 255px;
        height: 100vh;
        padding: 20px 16px;
    }

    .navbar {
        flex-direction: row;
        align-items: center;
        padding: 17px 20px;
    }

    .container {
        padding: 20px;
    }
}

   /* SIDEBAR HP - KONTEN TIDAK TERTUTUP */
@media (max-width: 800px) {
    .dashboard-layout {
        display: flex;
        flex-direction: row;
        align-items: stretch;
    }

    .sidebar {
        position: sticky;
        top: 0;
        left: auto;
        width: min(255px, 70vw);
        max-width: 255px;
        height: 100vh;
        flex: 0 0 min(255px, 70vw);
        transform: none;
        visibility: visible;
        overflow-y: auto;
    }

    .dashboard-layout:not(.sidebar-open) .sidebar {
        display: none;
    }

    .dashboard-content {
        flex: 1 1 0;
        width: 0;
        min-width: 0;
        margin-left: 0;
    }

    .navbar {
        flex-direction: row;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        padding: 15px;
    }

    .navbar-title {
        font-size: 17px;
    }

    .navbar-subtitle {
        font-size: 11px;
    }

    .role-badge {
        padding: 7px 9px;
        font-size: 10px;
    }
}

    </style>
</head>

<body>

<div class="dashboard-layout">

    {{-- SIDEBAR PEMBINA --}}
    <aside class="sidebar" id="sidebarPembina">

        <div>
            <div class="sidebar-brand">EKSPLORE</div>
            <div class="sidebar-subtitle">Sistem Ekstrakurikuler Sekolah</div>
        </div>

        <div>
            <div class="sidebar-label">Menu Pembina</div>

            <nav class="sidebar-menu" aria-label="Navigasi Pembina">

                <a href="{{ route('pembina.ekstrakurikuler') }}">
                    <span class="menu-icon">📚</span>
                    <span>Ekstrakurikuler</span>
                </a>

                <a href="{{ route('pembina.jadwal') }}">
                    <span class="menu-icon">📅</span>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('pembina.anggota') }}">
                    <span class="menu-icon">👥</span>
                    <span>Anggota</span>
                </a>

                <a href="{{ route('pembina.absensi') }}">
                    <span class="menu-icon">📝</span>
                    <span>Absensi</span>
                </a>

                <a href="{{ route('pembina.pendaftaran') }}">
                    <span class="menu-icon">📋</span>
                    <span>Pendaftaran</span>
                </a>

                <a href="{{ route('pembina.prestasi') }}">
                    <span class="menu-icon">🏆</span>
                    <span>Prestasi</span>
                </a>

                <a href="{{ route('pembina.galeri') }}">
                    <span class="menu-icon">🖼️</span>
                    <span>Galeri</span>
                </a>

                <a href="{{ route('pembina.pengumuman') }}">
                    <span class="menu-icon">📢</span>
                    <span>Pengumuman</span>
                </a>

            </nav>
        </div>

        <div class="sidebar-spacer"></div>

        <div class="sidebar-logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <span class="menu-icon">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>

    {{-- KONTEN UTAMA --}}
    <div class="dashboard-content">

        <header class="navbar">
             <button
        type="button"
        class="menu-toggle"
        id="menuToggle"
        aria-label="Buka atau tutup menu"
        aria-expanded="false"
        aria-controls="sidebarPembina"
    >☰</button>
    <div>
                <div class="navbar-title">Dashboard Pembina</div>
                <div class="navbar-subtitle">Kelola kegiatan ekstrakurikuler sekolah</div>
            </div>

            <div class="role-badge">👨‍🏫 Pembina</div>
        </header>

        <main class="container">

            {{-- SAMBUTAN --}}
            <section class="welcome">
                <div>
                    <h1>Selamat Datang, {{ $pembina->name }} 👋</h1>
                    <p>Anda berhasil masuk sebagai Pembina Ekstrakurikuler.</p>
                </div>

                <div class="welcome-icon" aria-hidden="true">🎓</div>
            </section>

            {{-- RINGKASAN --}}
            <section class="summary">

                <h2 class="section-heading">📊 Ringkasan Ekstrakurikuler</h2>

                <p class="section-description">
                    Informasi umum untuk membantu Pembina mengelola kegiatan ekstrakurikuler.
                </p>

                <div class="info-grid">

                    <div class="info-card">
                        <div class="info-icon">📚</div>
                        <div class="info-title">EKSTRAKURIKULER DIBINA</div>
                        <div class="info-value">1</div>
                        <div class="info-description">Ekstrakurikuler yang Anda bina</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">👥</div>
                        <div class="info-title">ANGGOTA AKTIF</div>
                        <div class="info-value">26</div>
                        <div class="info-description">Siswa yang aktif mengikuti ekskul</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">📋</div>
                        <div class="info-title">PENDAFTARAN</div>
                        <div class="info-value">5</div>
                        <div class="info-description">Pendaftaran yang perlu diproses</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">📝</div>
                        <div class="info-title">KEHADIRAN</div>
                        <div class="info-value">85%</div>
                        <div class="info-description">Ringkasan kehadiran anggota</div>
                    </div>

                </div>

                <div class="activity-grid">

                    <div class="activity-box">
                        <h3>📌 Status Pengelolaan</h3>

                        <div class="activity-item">
                            <span class="activity-name">📚 Ekstrakurikuler</span>
                            <span class="status status-active">AKTIF</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">👥 Anggota</span>
                            <span class="status status-active">AKTIF</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">📋 Pendaftaran</span>
                            <span class="status status-waiting">PERLU DIPROSES</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">📝 Absensi</span>
                            <span class="status status-info">TERSEDIA</span>
                        </div>
                    </div>

                    <div class="activity-box">
                        <h3>📅 Informasi Kegiatan</h3>

                        <div class="activity-item">
                            <span class="activity-name">📅 Jadwal Kegiatan</span>
                            <span class="activity-value">Lihat Jadwal</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">🏆 Prestasi</span>
                            <span class="activity-value">Kelola</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">🖼️ Dokumentasi</span>
                            <span class="activity-value">Galeri</span>
                        </div>

                        <div class="activity-item">
                            <span class="activity-name">📢 Informasi</span>
                            <span class="activity-value">Pengumuman</span>
                        </div>
                    </div>

                </div>

            </section>

            {{-- MENU PENGELOLAAN --}}
            <section class="management-section">

                <h2 class="section-heading">📂 Menu Pengelolaan Ekstrakurikuler</h2>

                <p class="section-description">
                    Pilih menu di bawah atau gunakan navigasi di sebelah kiri untuk mengelola kegiatan.
                </p>

                <div class="cards">

                    <a href="{{ route('pembina.ekstrakurikuler') }}" class="card">
                        <div class="card-icon">📚</div>
                        <h3>Ekstrakurikuler</h3>
                        <p>Lihat ekstrakurikuler yang Anda bina.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.jadwal') }}" class="card">
                        <div class="card-icon">📅</div>
                        <h3>Jadwal</h3>
                        <p>Lihat dan kelola jadwal kegiatan ekstrakurikuler.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.anggota') }}" class="card">
                        <div class="card-icon">👥</div>
                        <h3>Anggota</h3>
                        <p>Kelola data siswa yang mengikuti ekstrakurikuler.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.absensi') }}" class="card">
                        <div class="card-icon">📝</div>
                        <h3>Absensi</h3>
                        <p>Isi dan lihat riwayat kehadiran anggota ekstrakurikuler.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.pendaftaran') }}" class="card">
                        <div class="card-icon">📋</div>
                        <h3>Pendaftaran</h3>
                        <p>Lihat dan proses pendaftaran siswa yang ingin mengikuti ekstrakurikuler.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.prestasi') }}" class="card">
                        <div class="card-icon">🏆</div>
                        <h3>Prestasi</h3>
                        <p>Kelola dan tambahkan prestasi ekstrakurikuler yang Anda bina.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.galeri') }}" class="card">
                        <div class="card-icon">🖼️</div>
                        <h3>Galeri</h3>
                        <p>Kelola dan tambahkan dokumentasi kegiatan ekstrakurikuler yang Anda bina.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                    <a href="{{ route('pembina.pengumuman') }}" class="card">
                        <div class="card-icon">📢</div>
                        <h3>Pengumuman</h3>
                        <p>Kelola dan buat pengumuman untuk siswa yang mengikuti kegiatan ekstrakurikuler.</p>
                        <span class="card-action">Buka menu →</span>
                    </a>

                </div>

            </section>

            <footer class="footer-note">
                EKSPLORE · Sistem Pengelolaan Ekstrakurikuler
            </footer>

        </main>
    </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebarPembina');
    const layout = document.querySelector('.dashboard-layout');

    if (!menuToggle || !sidebar || !layout) return;

    // Sidebar terbuka saat dashboard pertama kali dimuat
    sidebar.classList.add('active');
    layout.classList.add('sidebar-open');
    menuToggle.setAttribute('aria-expanded', 'true');

    // Tombol hamburger untuk buka dan tutup sidebar
    menuToggle.addEventListener('click', function () {
        const isOpen = sidebar.classList.toggle('active');

        layout.classList.toggle('sidebar-open', isOpen);
        menuToggle.setAttribute('aria-expanded', String(isOpen));
    });
});
</script>

</body>
</html>