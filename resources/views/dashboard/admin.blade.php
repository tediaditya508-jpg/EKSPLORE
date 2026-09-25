<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Admin - EKSPLORE</title>


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


        /* =========================
           NAVBAR
        ========================= */

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
            opacity: 0.85;
        }


        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1100px;

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

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);

            margin-bottom: 25px;
        }


        .welcome h1 {
            margin-bottom: 10px;
        }


        .welcome p {
            color: #6b7280;

            line-height: 1.6;
        }


        /* =========================
           CARDS
        ========================= */

        .cards {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        .card {

            background: white;

            padding: 25px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);

            transition: 0.2s ease;

            display: block;

            color: inherit;

            text-decoration: none;

            cursor: pointer;
        }


        .card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.10);
        }


        .card-icon {

            font-size: 32px;

            margin-bottom: 15px;
        }


        .card h3 {

            margin-bottom: 10px;

            color: #111827;
        }


        .card p {

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;
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

        @media (max-width: 768px) {

            .cards {

                grid-template-columns: 1fr;
            }


            .navbar {

                padding: 15px 20px;
            }


            .container {

                margin-top: 25px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="navbar">


        <div class="logo">

            EKSPLORE

        </div>


        <div class="role">

            Dashboard Admin

        </div>


    </nav>



    <main class="container">


        {{-- =========================
             WELCOME
        ========================= --}}

        <section class="welcome">


            <h1>

                Selamat Datang,
                {{ $admin->name }} 👋

            </h1>


            <p>

                Anda berhasil masuk sebagai
                Admin EKSPLORE.

                Kelola data dan aktivitas
                ekstrakurikuler sekolah
                melalui dashboard ini.

            </p>


        </section>



        {{-- =========================
             MENU ADMIN
        ========================= --}}

        <section class="cards">


            {{-- =========================
                 EKSTRAKURIKULER
            ========================= --}}

            <a
                href="{{ route('admin.ekstrakurikuler') }}"
                class="card"
            >

                <div class="card-icon">

                    📚

                </div>


                <h3>

                    Ekstrakurikuler

                </h3>


                <p>

                    Kelola data ekstrakurikuler
                    sekolah, pembina, kuota,
                    persyaratan, dan informasi
                    kegiatan.

                </p>

            </a>



            {{-- =========================
                 PENGGUNA
            ========================= --}}

            <a
                href="{{ route('admin.pengguna') }}"
                class="card"
            >

                <div class="card-icon">

                    👥

                </div>


                <h3>

                    Pengguna

                </h3>


                <p>

                    Kelola akun siswa,
                    pembina, dan administrator
                    yang terdaftar dalam sistem.

                </p>

            </a>



            {{-- =========================
                 JADWAL
            ========================= --}}

            <a
                href="{{ route('admin.jadwal') }}"
                class="card"
            >

                <div class="card-icon">

                    📅

                </div>


                <h3>

                    Jadwal

                </h3>


                <p>

                    Kelola jadwal kegiatan
                    ekstrakurikuler seperti
                    hari, waktu, dan lokasi.

                </p>

            </a>



            {{-- =========================
                 PENDAFTARAN
            ========================= --}}

            <a
                href="{{ route('admin.pendaftaran') }}"
                class="card"
            >

                <div class="card-icon">

                    📋

                </div>


                <h3>

                    Pendaftaran

                </h3>


                <p>

                    Lihat dan kelola data
                    pendaftaran siswa
                    ke ekstrakurikuler.

                </p>

            </a>



            {{-- =========================
                 ANGGOTA
            ========================= --}}

            <a
                href="{{ route('admin.anggota') }}"
                class="card"
            >

                <div class="card-icon">

                    🎓

                </div>


                <h3>

                    Anggota

                </h3>


                <p>

                    Lihat data siswa yang
                    sudah menjadi anggota
                    ekstrakurikuler.

                </p>

            </a>



            {{-- =========================
                 ABSENSI
            ========================= --}}

            <a
                href="{{ route('admin.absensi') }}"
                class="card"
            >

                <div class="card-icon">

                    📝

                </div>


                <h3>

                    Absensi

                </h3>


                <p>

                    Pantau data kehadiran
                    siswa dalam kegiatan
                    ekstrakurikuler.

                </p>

            </a>



            {{-- =========================
                 PRESTASI
            ========================= --}}

            <a
                href="{{ route('admin.prestasi') }}"
                class="card"
            >

                <div class="card-icon">

                    🏆

                </div>


                <h3>

                    Prestasi

                </h3>


                <p>

                    Lihat data prestasi
                    yang diperoleh oleh
                    ekstrakurikuler sekolah.

                </p>

            </a>



            {{-- =========================
                 PENGUMUMAN
            ========================= --}}

            <a
                href="{{ route('admin.pengumuman') }}"
                class="card"
            >

                <div class="card-icon">

                    📢

                </div>


                <h3>

                    Pengumuman

                </h3>


                <p>

                    Kelola informasi dan
                    pengumuman untuk siswa
                    dan pembina.

                </p>

            </a>



            {{-- =========================
                 GALERI
            ========================= --}}

            <a
                href="{{ route('admin.galeri') }}"
                class="card"
            >

                <div class="card-icon">

                    🖼️

                </div>


                <h3>

                    Galeri

                </h3>


                <p>

                    Lihat dokumentasi
                    kegiatan ekstrakurikuler
                    sekolah.

                </p>

            </a>



            {{-- =========================
                 LAPORAN
            ========================= --}}

            <a
                href="{{ route('admin.laporan') }}"
                class="card"
            >

                <div class="card-icon">

                    📊

                </div>


                <h3>

                    Laporan

                </h3>


                <p>

                    Lihat ringkasan data
                    dan aktivitas
                    ekstrakurikuler.

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