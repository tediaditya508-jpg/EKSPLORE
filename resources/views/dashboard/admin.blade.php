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

        
/* =========================
   HAMBURGER NAVBAR ADMIN
========================= */

.navbar {
    gap: 15px;
    flex-wrap: wrap;
}

.menu-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border: 1px solid #374151;
    border-radius: 9px;
    background: #1f2937;
    color: #ffffff;
    font-size: 24px;
    cursor: pointer;
    flex-shrink: 0;
}

.menu-toggle:hover {
    background: #374151;
}

.admin-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    width: 250px;
    height: 100vh;
    padding: 24px 16px;
    overflow-y: auto;
    background: #111827;
    color: #ffffff;
    transform: translateX(-100%);
    visibility: hidden;
    transition: transform 0.25s ease-in-out,
                visibility 0.25s ease-in-out;
}

.admin-sidebar.active {
    transform: translateX(0);
    visibility: visible;
}

.admin-sidebar h2 {
    margin-bottom: 24px;
    font-size: 20px;
}

.admin-sidebar a {
    display: block;
    padding: 12px;
    margin-bottom: 6px;
    border-radius: 8px;
    color: #e5e7eb;
    text-decoration: none;
}

.admin-sidebar a:hover {
    background: #374151;
    color: #ffffff;
}

@media (max-width: 768px) {
    .navbar {
        padding: 15px 20px;
    }

    .menu-toggle {
        order: -1;
    }

    .admin-sidebar {
        width: min(250px, 80vw);
    }
}


/* PERBAIKAN NAVBAR HAMBURGER ADMIN */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1002;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 16px;
    min-height: 76px;
    padding: 16px 24px;
}

.navbar .menu-toggle {
    display: inline-flex !important;
    position: relative;
    z-index: 1003;
    flex: 0 0 42px;
}

.navbar .logo {
    font-size: 22px;
}

.navbar .role {
    margin-left: auto;
}

.admin-sidebar {
    position: fixed !important;
    top: 76px;
    bottom: 0;
    left: 0;
    z-index: 1001;
    width: min(250px, 80vw);
    height: auto;
    overflow-y: auto;
    transform: translateX(-100%);
    visibility: hidden;
    pointer-events: none;
    transition: transform 0.25s ease-in-out,
                visibility 0.25s ease-in-out;
}

.admin-sidebar.active {
    transform: translateX(0);
    visibility: visible;
    pointer-events: auto;
}

.container {
    width: 100%;
    max-width: 1100px;
    margin: 40px auto;
}

@media (max-width: 768px) {
    .navbar {
        padding: 14px 16px;
        gap: 12px;
    }

    .navbar .logo {
        font-size: 19px;
    }

    .navbar .role {
        font-size: 12px;
    }

    .container {
        margin: 24px auto;
        padding: 0 14px;
    }

    .welcome {
        padding: 22px;
    }

    .cards {
        grid-template-columns: 1fr;
    }
}


    </style>

</head>


<body>


    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="navbar">

         <button
        type="button"
        class="menu-toggle"
        id="adminMenuToggle"
        aria-label="Buka atau tutup menu"
        aria-expanded="false"
        aria-controls="adminSidebar"
    >
        ☰
    </button>

        <div class="logo">

            EKSPLORE

        </div>


        <div class="role">

            Dashboard Admin

        </div>


    </nav>

    
<aside class="admin-sidebar" id="adminSidebar">

    <h2>Menu Admin</h2>

    <a href="{{ route('admin.ekstrakurikuler') }}">Ekstrakurikuler</a>
    <a href="{{ route('admin.pengguna') }}">Pengguna</a>
    <a href="{{ route('admin.jadwal') }}">Jadwal</a>
    <a href="{{ route('admin.pendaftaran') }}">Pendaftaran</a>
    <a href="{{ route('admin.anggota') }}">Anggota</a>
    <a href="{{ route('admin.absensi') }}">Absensi</a>
    <a href="{{ route('admin.prestasi') }}">Prestasi</a>
    <a href="{{ route('admin.pengumuman') }}">Pengumuman</a>
    <a href="{{ route('admin.galeri') }}">Galeri</a>
    <a href="{{ route('admin.laporan') }}">Laporan</a>

</aside>




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

    
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('adminMenuToggle');
    const sidebar = document.getElementById('adminSidebar');

    if (!toggle || !sidebar) return;
    sidebar.classList.remove('active');
toggle.setAttribute('aria-expanded', 'false');

    toggle.addEventListener('click', function () {
        const isOpen = sidebar.classList.toggle('active');

        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute(
            'aria-label',
            isOpen ? 'Tutup menu' : 'Buka menu'
        );
    });
});
</script>


</body>

</html>