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
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

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

        @media (max-width: 768px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 20px;
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

        <section class="welcome">

            <h1>
                Selamat Datang, {{ $pembina->name }} 👋
            </h1>

            <p>
                Anda berhasil masuk sebagai Pembina Ekstrakurikuler.
            </p>

        </section>


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


        {{-- LOGOUT --}}

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