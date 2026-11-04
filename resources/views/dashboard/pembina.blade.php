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

html,
body {
    width: 100%;
    min-height: 100%;
}

body {
    background: var(--background);
    color: var(--text);
    overflow-x: hidden;
}

a {
    -webkit-tap-highlight-color: transparent;
}

.dashboard-layout {
    display: flex;
    flex-direction: row;
    min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: 255px;
    flex: 0 0 255px;
    height: 100vh;
    position: sticky;
    top: 0;
    display: flex;
    flex-direction: column;
    padding: 25px 16px 18px;
    background: var(--sidebar);
    color: white;
    overflow-y: auto;
    z-index: 1000;
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

/* KONTEN UTAMA */
.dashboard-content {
    flex: 1 1 0;
    width: calc(100% - 255px);
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

/* HAMBURGER */
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

/* CONTAINER */
.container {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
    padding: 30px;
    min-width: 0;
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
    overflow-wrap: anywhere;
}

.welcome p {
    color: #eaf3ff;
    font-size: 14px;
    line-height: 1.6;
}

.welcome-icon {
    font-size: 43px;
    flex-shrink: 0;
}

/* RINGKASAN */
.summary {
    margin-bottom: 30px;
    padding: 25px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
    min-width: 0;
}

.section-heading {
    margin-bottom: 8px;
    font-size: 21px;
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

/* MENU PENGELOLAAN */
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
    overflow-wrap: anywhere;
}

.card p {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.7;
    overflow-wrap: anywhere;
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

/* TABLET */
@media (max-width: 1100px) {
    .container {
        padding: 22px;
    }

    .info-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* HP */
@media (max-width: 800px) {
    .dashboard-layout {
        display: block;
        width: 100%;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: min(280px, 85vw);
        height: 100vh;
        height: 100dvh;
        padding: 22px 16px;
        overflow-y: auto;
        transform: translateX(-100%);
        visibility: hidden;
        transition: transform .25s ease, visibility .25s ease;
        box-shadow: 8px 0 25px rgba(0, 0, 0, .15);
    }

    .sidebar.active {
        transform: translateX(0);
        visibility: visible;
    }

    .dashboard-layout.sidebar-open::before {
        content: "";
        position: fixed;
        inset: 0;
        z-index: 999;
        background: rgba(0, 0, 0, .45);
    }

    .dashboard-content {
        width: 100%;
        min-width: 0;
        margin: 0;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 900;
        min-height: 68px;
        padding: 12px 16px;
        gap: 10px;
        flex-wrap: wrap;
    }

    .navbar-title {
        font-size: 17px;
    }

    .navbar-subtitle {
        font-size: 11px;
    }

    .role-badge {
        padding: 7px 10px;
        font-size: 10px;
    }

    .container {
        width: 100%;
        padding: 18px;
    }

    .welcome {
        padding: 22px;
    }

    .welcome h1 {
        font-size: 22px;
    }

    .welcome-icon {
        font-size: 34px;
    }

    .activity-grid {
        grid-template-columns: minmax(0, 1fr);
    }
}

/* HP KECIL */
@media (max-width: 480px) {
    .navbar {
        padding: 10px 12px;
        gap: 9px;
    }

    .menu-toggle {
        width: 42px;
        height: 42px;
    }

    .navbar-title {
        font-size: 16px;
    }

    .navbar-subtitle {
        max-width: 190px;
        line-height: 1.4;
    }

    .container {
        padding: 13px;
    }

    .welcome {
        padding: 18px;
        gap: 10px;
    }

    .welcome h1 {
        font-size: 19px;
    }

    .welcome p {
        font-size: 12px;
    }

    .welcome-icon {
        font-size: 27px;
    }

    .summary {
        padding: 16px;
    }

    .section-heading {
        font-size: 18px;
    }

    .section-description {
        font-size: 12px;
        margin-bottom: 18px;
    }

    .info-grid,
    .cards {
        grid-template-columns: minmax(0, 1fr);
        gap: 12px;
    }

    .info-card {
        padding: 16px;
    }

    .activity-box {
        padding: 15px;
    }

    .card {
        padding: 18px;
    }
}

/* HP SANGAT KECIL */
@media (max-width: 360px) {
    .container {
        padding: 10px;
    }

    .navbar {
        padding: 9px;
    }

    .role-badge {
        white-space: normal;
    }

    .welcome {
        padding: 15px;
    }

    .welcome h1 {
        font-size: 17px;
    }

    .summary {
        padding: 13px;
    }
}


/* ANIMASI HAMBURGER DESKTOP LEBIH HALUS */
@media (min-width: 801px) {
    .dashboard-layout > .sidebar {
        flex: 0 0 255px;
        width: 255px;
        overflow: hidden;
        transition:
            flex-basis .4s cubic-bezier(.22, 1, .36, 1),
            width .4s cubic-bezier(.22, 1, .36, 1),
            padding .4s ease,
            opacity .25s ease;
        opacity: 1;
    }

    .dashboard-layout:not(.sidebar-open) > .sidebar {
        flex-basis: 0;
        width: 0;
        padding-left: 0;
        padding-right: 0;
        opacity: 0;
        border: 0;
    }

    .dashboard-layout > .dashboard-content {
        flex: 1 1 0;
        min-width: 0;
        transition: flex-basis .4s cubic-bezier(.22, 1, .36, 1);
    }
}


/* HAMBURGER TETAP TERLIHAT SAAT SIDEBAR TERBUKA */
@media (max-width: 800px) {
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1101;
    }

    .menu-toggle {
        position: relative;
        z-index: 1102;
        flex-shrink: 0;
        visibility: visible;
        opacity: 1;
    }

    .sidebar {
        z-index: 1000;
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

                <a href="{{ route('pembina.pindah_ekskul') }}">
                    <span class="menu-icon">🔄</span>
                    <span>Pengajuan Pindah Ekskul</span>
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

    function isMobile() {
        return window.innerWidth <= 800;
    }

    function closeSidebar() {
        sidebar.classList.remove('active');
        layout.classList.remove('sidebar-open');
        menuToggle.setAttribute('aria-expanded', 'false');
    }

    function openSidebar() {
        sidebar.classList.add('active');
        layout.classList.add('sidebar-open');
        menuToggle.setAttribute('aria-expanded', 'true');
    }

    // Desktop: sidebar terbuka.
    // HP: sidebar tertutup saat halaman pertama dibuka.
    function setInitialState() {
        if (isMobile()) {
            closeSidebar();
        } else {
            openSidebar();
        }
    }

    setInitialState();

    menuToggle.addEventListener('click', function (event) {
        event.stopPropagation();

        if (sidebar.classList.contains('active')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    // Tutup sidebar saat area luar sidebar diklik.
    layout.addEventListener('click', function (event) {
        if (
            isMobile() &&
            sidebar.classList.contains('active') &&
            !sidebar.contains(event.target) &&
            !menuToggle.contains(event.target)
        ) {
            closeSidebar();
        }
    });

    // Tutup menu setelah memilih navigasi.
    sidebar.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (isMobile()) {
                closeSidebar();
            }
        });
    });

    // Sesuaikan keadaan ketika ukuran layar berubah.
    window.addEventListener('resize', function () {
        setInitialState();
    });
});

</script>

</body>
</html>