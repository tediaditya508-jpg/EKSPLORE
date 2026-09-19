<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Siswa - EKSPLORE</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --primary-light: #eff6ff;
        --background: #f5f7fb;
        --white: #ffffff;
        --text: #111827;
        --text-secondary: #6b7280;
        --border: #e5e7eb;
        --success: #16a34a;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: var(--background);
        color: var(--text);
    }

    a {
        text-decoration: none;
    }

    /* =========================================
       SIDEBAR
    ========================================= */

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 250px;
        height: 100vh;

        background: var(--white);
        border-right: 1px solid var(--border);

        padding: 25px 16px;

        z-index: 100;
    }

    .brand {
        text-align: center;
        margin-bottom: 35px;
    }

    .brand-logo {
        width: 52px;
        height: 52px;

        margin: 0 auto 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary);
        color: white;

        border-radius: 15px;

        font-size: 21px;
        font-weight: bold;

        box-shadow: 0 8px 18px rgba(37, 99, 235, .20);
    }

    .brand h1 {
        color: var(--primary);
        font-size: 27px;
        letter-spacing: 1px;
    }

    .brand p {
        color: #9ca3af;
        font-size: 12px;
        margin-top: 5px;
    }

    .menu-title {
        color: #9ca3af;
        font-size: 11px;
        font-weight: bold;

        margin: 0 10px 10px;

        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 12px 14px;

        border-radius: 11px;

        color: #4b5563;

        font-size: 14px;

        transition: .2s;
    }

    .menu a:hover {
        background: var(--primary-light);
        color: var(--primary);
        transform: translateX(2px);
    }

    .menu a.active {
        background: var(--primary);
        color: white;

        box-shadow: 0 7px 16px rgba(37, 99, 235, .18);
    }

    .menu-icon {
        width: 22px;
        text-align: center;
        font-size: 16px;
    }


    /* =========================================
       MAIN
    ========================================= */

    .main {
        margin-left: 250px;
        padding: 30px;
        min-height: 100vh;
    }


    /* =========================================
       TOPBAR
    ========================================= */

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 28px;
    }

    .welcome h2 {
        font-size: 27px;
        margin-bottom: 7px;
    }

    .welcome p {
        color: var(--text-secondary);
        font-size: 14px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 11px;

        background: white;

        padding: 8px 13px 8px 8px;

        border: 1px solid var(--border);
        border-radius: 13px;
    }

    .profile-avatar {
        width: 43px;
        height: 43px;

        border-radius: 12px;

        background: var(--primary);
        color: white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-weight: bold;
        font-size: 17px;
    }

    .profile-info strong {
        display: block;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .profile-info span {
        color: #9ca3af;
        font-size: 12px;
    }


    /* =========================================
       QUICK INFO
    ========================================= */

    .quick-info {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;

        margin-bottom: 25px;
    }

    .stat-card {
        background: white;

        border: 1px solid var(--border);
        border-radius: 16px;

        padding: 20px;

        display: flex;
        align-items: center;

        gap: 15px;

        transition: .2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
    }

    .stat-icon {
        width: 50px;
        height: 50px;

        flex-shrink: 0;

        border-radius: 13px;

        background: var(--primary-light);

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }

    .stat-info span {
        display: block;

        color: var(--text-secondary);

        font-size: 13px;

        margin-bottom: 5px;
    }

    .stat-info strong {
        font-size: 24px;
        color: var(--text);
    }


    /* =========================================
       CONTENT GRID
    ========================================= */

    .content-grid {
        display: grid;

        grid-template-columns: 2fr 1fr;

        gap: 20px;
    }

    .card {
        background: white;

        border: 1px solid var(--border);

        border-radius: 16px;

        padding: 22px;

        margin-bottom: 20px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 18px;
    }

    .card-header h3 {
        font-size: 18px;
    }

    .card-header a {
        color: var(--primary);

        font-size: 13px;
        font-weight: bold;
    }

    .card-header a:hover {
        text-decoration: underline;
    }


    /* =========================================
       JADWAL
    ========================================= */

    .schedule-item {
        display: flex;
        align-items: center;

        gap: 15px;

        padding: 14px;

        background: #f8fafc;

        border: 1px solid #f1f5f9;

        border-radius: 12px;

        margin-bottom: 10px;

        transition: .2s;
    }

    .schedule-item:hover {
        border-color: #bfdbfe;
        background: #eff6ff;
    }

    .schedule-day {
        width: 65px;

        color: var(--primary);

        font-weight: bold;

        font-size: 13px;
    }

    .schedule-info {
        flex: 1;
    }

    .schedule-info strong {
        display: block;

        margin-bottom: 5px;

        font-size: 14px;
    }

    .schedule-info span {
        color: var(--text-secondary);

        font-size: 12px;
    }


    /* =========================================
       PENGUMUMAN
    ========================================= */

    .announcement-item {
        padding: 14px 0;

        border-bottom: 1px solid var(--border);
    }

    .announcement-item:first-child {
        padding-top: 0;
    }

    .announcement-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .announcement-item strong {
        display: block;

        font-size: 14px;

        margin-bottom: 6px;
    }

    .announcement-item p {
        color: var(--text-secondary);

        font-size: 12px;

        line-height: 1.6;
    }

    .announcement-date {
        display: block;

        color: #9ca3af;

        font-size: 11px;

        margin-top: 7px;
    }


    /* =========================================
       EKSKUL
    ========================================= */

    .ekskul-grid {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 15px;
    }

    .ekskul-card {
        overflow: hidden;

        border: 1px solid var(--border);

        border-radius: 13px;

        background: white;

        transition: .2s;
    }

    .ekskul-card:hover {
        transform: translateY(-4px);

        box-shadow: 0 10px 25px rgba(0, 0, 0, .07);

        border-color: #bfdbfe;
    }

    .ekskul-image {
        height: 120px;

        background: linear-gradient(
            135deg,
            #dbeafe,
            #eff6ff
        );

        display: flex;
        align-items: center;
        justify-content: center;

        color: var(--primary);

        font-size: 16px;

        font-weight: bold;
    }

    .ekskul-body {
        padding: 15px;
    }

    .ekskul-body h4 {
        font-size: 15px;

        margin-bottom: 7px;
    }

    .ekskul-body p {
        color: var(--text-secondary);

        font-size: 12px;

        line-height: 1.5;

        height: 36px;

        overflow: hidden;

        margin-bottom: 13px;
    }

    .detail-button {
        display: inline-block;

        background: var(--primary);

        color: white;

        padding: 8px 12px;

        border-radius: 8px;

        font-size: 12px;

        font-weight: bold;

        transition: .2s;
    }

    .detail-button:hover {
        background: var(--primary-dark);
    }


    /* =========================================
       ABOUT
    ========================================= */

    .about-box {
        color: var(--text-secondary);

        font-size: 13px;

        line-height: 1.7;
    }

    .about-highlight {
        margin-top: 14px;

        padding: 12px;

        background: var(--primary-light);

        border-radius: 10px;

        color: var(--primary);

        font-size: 12px;

        line-height: 1.6;
    }


    /* =========================================
       EMPTY DATA
    ========================================= */

    .empty {
        text-align: center;

        padding: 25px;

        color: #9ca3af;

        font-size: 13px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1100px) {

        .quick-info {
            grid-template-columns: 1fr;
        }

        .content-grid {
            grid-template-columns: 1fr;
        }

        .ekskul-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }


    @media (max-width: 700px) {

        .sidebar {
            position: relative;

            width: 100%;

            height: auto;

            border-right: none;

            border-bottom: 1px solid var(--border);
        }

        .main {
            margin-left: 0;

            padding: 20px;
        }

        .topbar {
            align-items: flex-start;
        }

        .profile {
            display: none;
        }

        .ekskul-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
```

</head>

<body>

```
<!-- =========================================
     SIDEBAR
========================================== -->

<aside class="sidebar">

    <div class="brand">

        <div class="brand-logo">
            E
        </div>

        <h1>
            EKSPLORE
        </h1>

        <p>
            Sistem Ekstrakurikuler
        </p>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>


    <nav class="menu">

        <a
            href="{{ route('dashboard') }}"
            class="active"
        >
            <span class="menu-icon">🏠</span>
            <span>Beranda</span>
        </a>


        <!-- PERBAIKAN ROUTE -->
        <a href="{{ route('ekskul.index') }}">
            <span class="menu-icon">🎯</span>
            <span>Daftar Ekskul</span>
        </a>


        <a href="{{ route('jadwal.index') }}">
            <span class="menu-icon">📅</span>
            <span>Jadwal</span>
        </a>


        <a href="#">
            <span class="menu-icon">📝</span>
            <span>Pendaftaran</span>
        </a>


        <a href="#">
            <span class="menu-icon">✅</span>
            <span>Kehadiran</span>
        </a>


        <a href="#">
            <span class="menu-icon">🏆</span>
            <span>Prestasi</span>
        </a>


        <a href="#">
            <span class="menu-icon">🔔</span>
            <span>Notifikasi</span>
        </a>


        <a href="#">
            <span class="menu-icon">👤</span>
            <span>Profil</span>
        </a>

    </nav>

</aside>



<!-- =========================================
     MAIN
========================================== -->

<main class="main">


    <!-- =====================================
         TOPBAR
    ====================================== -->

    <div class="topbar">

        <div class="welcome">

            <h2>
                Halo,
                {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}
                👋
            </h2>

            <p>
                Selamat datang kembali di EKSPLORE.
            </p>

        </div>


        <div class="profile">

            <div class="profile-avatar">

                {{
                    strtoupper(
                        substr(
                            $siswa->name ?? $siswa->nama ?? 'S',
                            0,
                            1
                        )
                    )
                }}

            </div>


            <div class="profile-info">

                <strong>
                    {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}
                </strong>

                <span>
                    Peserta Didik
                </span>

            </div>

        </div>

    </div>



    <!-- =====================================
         STATISTICS
    ====================================== -->

    <section class="quick-info">


        <div class="stat-card">

            <div class="stat-icon">
                🎯
            </div>

            <div class="stat-info">

                <span>
                    Total Ekskul
                </span>

                <strong>
                    {{ $dataDashboard['jumlahEkskul'] }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                📅
            </div>

            <div class="stat-info">

                <span>
                    Total Jadwal
                </span>

                <strong>
                    {{ $dataDashboard['jumlahJadwal'] }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                📢
            </div>

            <div class="stat-info">

                <span>
                    Pengumuman
                </span>

                <strong>
                    {{ $dataDashboard['jumlahPengumuman'] }}
                </strong>

            </div>

        </div>

    </section>



    <!-- =====================================
         CONTENT
    ====================================== -->

    <div class="content-grid">


        <!-- =================================
             LEFT CONTENT
        ================================== -->

        <div>


            <!-- JADWAL -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        📅 Jadwal Ekstrakurikuler
                    </h3>

                    <a href="{{ route('jadwal.index') }}">
                        Lihat semua
                    </a>

                </div>


                @forelse ($jadwalHariIni as $jadwal)

                    <div class="schedule-item">

                        <div class="schedule-day">

                            {{ $jadwal->hari }}

                        </div>


                        <div class="schedule-info">

                            <strong>

                                {{
                                    $jadwal->ekstrakurikuler->nama_ekskul
                                    ?? 'Ekskul'
                                }}

                            </strong>


                            <span>

                                {{
                                    \Carbon\Carbon::parse(
                                        $jadwal->jam_mulai
                                    )->format('H:i')
                                }}

                                -

                                {{
                                    \Carbon\Carbon::parse(
                                        $jadwal->jam_selesai
                                    )->format('H:i')
                                }}

                                •
                                {{ $jadwal->lokasi }}

                            </span>

                        </div>

                    </div>

                @empty

                    <div class="empty">

                        📅

                        <br><br>

                        Belum ada jadwal ekstrakurikuler.

                    </div>

                @endforelse

            </div>



            <!-- EKSKUL -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        🎯 Ekstrakurikuler
                    </h3>

                    <!-- PERBAIKAN ROUTE -->
                    <a href="{{ route('ekskul.index') }}">
                        Lihat semua
                    </a>

                </div>


                <div class="ekskul-grid">


                    @forelse ($ekskul as $item)

                        <div class="ekskul-card">


                            <div class="ekskul-image">

                                🎯

                                &nbsp;

                                EKSPLORE

                            </div>


                            <div class="ekskul-body">

                                <h4>
                                    {{ $item->nama_ekskul }}
                                </h4>


                                <p>

                                    {{
                                        $item->deskripsi
                                        ?? 'Kegiatan ekstrakurikuler sekolah.'
                                    }}

                                </p>


                                <!-- PERBAIKAN ROUTE -->
                                <a
                                    href="{{ route('ekskul.index') }}"
                                    class="detail-button"
                                >
                                    Lihat Detail
                                </a>

                            </div>

                        </div>

                    @empty

                        <div class="empty">

                            Belum ada data ekstrakurikuler.

                        </div>

                    @endforelse


                </div>

            </div>


        </div>



        <!-- =================================
             RIGHT CONTENT
        ================================== -->

        <div>


            <!-- PENGUMUMAN -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        📢 Pengumuman
                    </h3>

                    <a href="#">
                        Semua
                    </a>

                </div>


                @forelse ($pengumuman as $item)

                    <div class="announcement-item">

                        <strong>
                            {{ $item->judul }}
                        </strong>


                        <p>
                            {{ $item->isi }}
                        </p>


                        <span class="announcement-date">

                            {{
                                \Carbon\Carbon::parse(
                                    $item->tanggal
                                )->format('d M Y')
                            }}

                        </span>

                    </div>

                @empty

                    <div class="empty">

                        📢

                        <br><br>

                        Belum ada pengumuman.

                    </div>

                @endforelse

            </div>



            <!-- TENTANG EKSPLORE -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        💡 Tentang EKSPLORE
                    </h3>

                </div>


                <div class="about-box">

                    EKSPLORE merupakan sistem informasi
                    ekstrakurikuler SMK Budi Bakti Ciwidey
                    yang membantu siswa menemukan,
                    mendaftar, dan mengikuti kegiatan
                    ekstrakurikuler sekolah.

                </div>


                <div class="about-highlight">

                    🎯 Temukan ekstrakurikuler yang sesuai,
                    lihat jadwal kegiatan, lakukan
                    pendaftaran, dan pantau aktivitas
                    ekstrakurikuler melalui satu sistem.

                </div>

            </div>


        </div>

    </div>

</main>
</body>
</html>