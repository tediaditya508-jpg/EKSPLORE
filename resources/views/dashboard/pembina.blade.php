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

        body {
            background: #f5f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #111827;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .role {
            font-size: 14px;
            opacity: 0.8;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* =========================
           WELCOME
           ========================= */

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin-bottom: 10px;
        }

        .welcome p {
            color: #6b7280;
        }

        /* =========================
           RINGKASAN EKSTRAKURIKULER
           ========================= */

        .summary {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 30px;
        }

        .summary-title {
            font-size: 23px;
            font-weight: bold;
            color: #2878bd;
            margin-bottom: 8px;
        }

        .summary-description {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* =========================
           INFO CARDS
           ========================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .info-card {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            transition: 0.2s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .info-icon {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .info-title {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 28px;
            font-weight: bold;
            color: #111827;
        }

        .info-description {
            margin-top: 6px;
            color: #6b7280;
            font-size: 12px;
        }

        /* =========================
           RINGKASAN KEGIATAN
           ========================= */

        .activity-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .activity-box {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            background: #ffffff;
        }

        .activity-box h3 {
            margin-bottom: 18px;
            font-size: 17px;
            color: #374151;
        }

        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-name {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #374151;
            font-size: 14px;
        }

        .activity-value {
            font-weight: bold;
            color: #2878bd;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
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

        /* =========================
           KEGIATAN TERBARU
           ========================= */

        .latest {
            margin-top: 20px;
        }

        .latest-title {
            font-size: 17px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 15px;
        }

        .latest-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .latest-card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 17px;
            background: #fafafa;
        }

        .latest-card h4 {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .latest-card p {
            color: #6b7280;
            font-size: 12px;
            line-height: 1.5;
        }

        /* =========================
           MENU PEMBINA
           ========================= */

        .menu-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            color: #1f2937;
            text-decoration: none;
            display: block;
            transition: 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.10);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           LOGOUT
           ========================= */

        .logout {
            margin-top: 30px;
        }

        .logout button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #b91c1c;
        }

        /* =========================
           RESPONSIVE
           ========================= */

        @media (max-width: 1000px) {
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .latest-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .activity-grid {
                grid-template-columns: 1fr;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 20px;
            }

            .welcome {
                padding: 22px;
            }

            .summary {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            EKSPLORE
        </div>

        <div class="role">
            Dashboard Pembina
        </div>

    </nav>


    <main class="container">

        {{-- =========================
             WELCOME
             ========================= --}}

        <section class="welcome">

            <h1>
                Selamat Datang, {{ $pembina->name }} 👋
            </h1>

            <p>
                Anda berhasil masuk sebagai Pembina Ekstrakurikuler.
            </p>

        </section>


        {{-- =========================
             RINGKASAN EKSTRAKURIKULER
             ========================= --}}

        <section class="summary">

            <div class="summary-title">
                📊 Ringkasan Ekstrakurikuler
            </div>

            <div class="summary-description">
                Informasi umum untuk membantu Pembina mengelola kegiatan ekstrakurikuler.
            </div>


            {{-- INFORMASI UTAMA --}}

            <div class="info-grid">

                <div class="info-card">

                    <div class="info-icon">
                        📚
                    </div>

                    <div class="info-title">
                        EKSTRAKURIKULER DIBINA
                    </div>

                    <div class="info-value">
                        1
                    </div>

                    <div class="info-description">
                        Ekstrakurikuler yang Anda bina
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-icon">
                        👥
                    </div>

                    <div class="info-title">
                        ANGGOTA AKTIF
                    </div>

                    <div class="info-value">
                        26
                    </div>

                    <div class="info-description">
                        Siswa yang aktif mengikuti ekskul
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-icon">
                        📋
                    </div>

                    <div class="info-title">
                        PENDAFTARAN
                    </div>

                    <div class="info-value">
                        5
                    </div>

                    <div class="info-description">
                        Pendaftaran yang perlu diproses
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-icon">
                        📝
                    </div>

                    <div class="info-title">
                        KEHADIRAN
                    </div>

                    <div class="info-value">
                        85%
                    </div>

                    <div class="info-description">
                        Ringkasan kehadiran anggota
                    </div>

                </div>

            </div>


            {{-- RINGKASAN KEGIATAN --}}

            <div class="activity-grid">


                <div class="activity-box">

                    <h3>
                        📌 Status Pengelolaan
                    </h3>

                    <div class="activity-item">

                        <div class="activity-name">
                            📚 Ekstrakurikuler
                        </div>

                        <span class="status status-active">
                            AKTIF
                        </span>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            👥 Anggota
                        </div>

                        <span class="status status-active">
                            AKTIF
                        </span>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            📋 Pendaftaran
                        </div>

                        <span class="status status-waiting">
                            PERLU DIPROSES
                        </span>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            📝 Absensi
                        </div>

                        <span class="status status-info">
                            TERSEDIA
                        </span>

                    </div>

                </div>


                <div class="activity-box">

                    <h3>
                        📅 Informasi Kegiatan
                    </h3>

                    <div class="activity-item">

                        <div class="activity-name">
                            📅 Jadwal Kegiatan
                        </div>

                        <div class="activity-value">
                            Lihat Jadwal
                        </div>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            🏆 Prestasi
                        </div>

                        <div class="activity-value">
                            Kelola
                        </div>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            🖼️ Dokumentasi
                        </div>

                        <div class="activity-value">
                            Galeri
                        </div>

                    </div>

                    <div class="activity-item">

                        <div class="activity-name">
                            📢 Informasi
                        </div>

                        <div class="activity-value">
                            Pengumuman
                        </div>

                    </div>

                </div>

            </div>


            {{-- KEGIATAN TERBARU --}}

            <div class="latest">

                <div class="latest-title">
                    📌 Pengelolaan Ekstrakurikuler
                </div>

                <div class="latest-list">

                    <div class="latest-card">

                        <h4>
                            👥 Anggota Ekskul
                        </h4>

                        <p>
                            Kelola dan lihat siswa yang terdaftar sebagai anggota ekstrakurikuler.
                        </p>

                    </div>


                    <div class="latest-card">

                        <h4>
                            📝 Kehadiran Anggota
                        </h4>

                        <p>
                            Catat dan pantau kehadiran siswa dalam kegiatan ekstrakurikuler.
                        </p>

                    </div>


                    <div class="latest-card">

                        <h4>
                            📋 Pendaftaran Siswa
                        </h4>

                        <p>
                            Periksa dan proses siswa yang mendaftar ke ekstrakurikuler.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================
             MENU PEMBINA
             ROUTE TETAP SAMA
             ========================= --}}

        <div class="menu-title">
            📂 Menu Pengelolaan Ekstrakurikuler
        </div>

        <section class="cards">


            {{-- EKSTRAKURIKULER PEMBINA --}}

            <a
                href="{{ route('pembina.ekstrakurikuler') }}"
                class="card"
            >

                <h3>
                    📚 Ekstrakurikuler
                </h3>

                <p>
                    Lihat ekstrakurikuler yang Anda bina.
                </p>

            </a>


            {{-- JADWAL PEMBINA --}}

            <a
                href="{{ route('pembina.jadwal') }}"
                class="card"
            >

                <h3>
                    📅 Jadwal
                </h3>

                <p>
                    Lihat dan kelola jadwal kegiatan
                    ekstrakurikuler.
                </p>

            </a>


            {{-- ANGGOTA PEMBINA --}}

            <a
                href="{{ route('pembina.anggota') }}"
                class="card"
            >

                <h3>
                    👥 Anggota
                </h3>

                <p>
                    Kelola data siswa yang mengikuti
                    ekstrakurikuler.
                </p>

            </a>


            {{-- ABSENSI PEMBINA --}}

            <a
                href="{{ route('pembina.absensi') }}"
                class="card"
            >

                <h3>
                    📝 Absensi
                </h3>

                <p>
                    Isi dan lihat riwayat kehadiran
                    anggota ekstrakurikuler.
                </p>

            </a>


            {{-- PENDAFTARAN PEMBINA --}}

            <a
                href="{{ route('pembina.pendaftaran') }}"
                class="card"
            >

                <h3>
                    📋 Pendaftaran
                </h3>

                <p>
                    Lihat dan proses pendaftaran siswa
                    yang ingin mengikuti ekstrakurikuler.
                </p>

            </a>


            {{-- PRESTASI PEMBINA --}}

            <a
                href="{{ route('pembina.prestasi') }}"
                class="card"
            >

                <h3>
                    🏆 Prestasi
                </h3>

                <p>
                    Kelola dan tambahkan prestasi
                    ekstrakurikuler yang Anda bina.
                </p>

            </a>


            {{-- GALERI PEMBINA --}}

            <a
                href="{{ route('pembina.galeri') }}"
                class="card"
            >

                <h3>
                    🖼️ Galeri
                </h3>

                <p>
                    Kelola dan tambahkan dokumentasi
                    kegiatan ekstrakurikuler yang Anda bina.
                </p>

            </a>


            {{-- PENGUMUMAN PEMBINA --}}

            <a
                href="{{ route('pembina.pengumuman') }}"
                class="card"
            >

                <h3>
                    📢 Pengumuman
                </h3>

                <p>
                    Kelola dan buat pengumuman untuk
                    siswa yang mengikuti kegiatan ekstrakurikuler.
                </p>

            </a>


        </section>


        {{-- =========================
             LOGOUT
             ========================= --}}

        <div class="logout">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button type="submit">
                    Logout
                </button>

            </form>

        </div>

    </main>

</body>
</html>