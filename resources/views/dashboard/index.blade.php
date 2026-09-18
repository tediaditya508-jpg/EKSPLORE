<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EKSPLORE - Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f8fc;
            color: #172554;
        }

        .navbar {
            background: #0f2a5f;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px 20px 100px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin-bottom: 5px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        .schedule {
            background: #e0f2fe;
        }

        .ekskul-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
        }

        .ekskul-card {
            padding: 20px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .ekskul-card h3 {
            margin: 8px 0;
        }

        .announcement {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            display: flex;
            justify-content: space-around;
            padding: 14px;
            box-shadow: 0 -3px 15px rgba(0,0,0,.08);
        }

        .bottom-nav a {
            text-decoration: none;
            color: #475569;
            font-size: 14px;
        }

        @media(max-width:600px) {
            .navbar {
                padding: 15px;
            }

            .container {
                padding: 20px 15px 90px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">EKSPLORE</div>
    <div>🔔 👤</div>
</nav>

<main class="container">

    <section class="welcome">
        <h1>Halo, Tedy 👋</h1>
        <p>Selamat datang di EKSPLORE</p>
    </section>

    <section class="card schedule">
        <h2>📅 Jadwal Hari Ini</h2>

        @forelse($jadwalHariIni as $jadwal)

            <h3>⚽ {{ $jadwal->ekstrakurikuler->nama_ekskul }}</h3>

            <p>
                {{ $jadwal->jam_mulai }}
                -
                {{ $jadwal->jam_selesai }}
            </p>

            <p>📍 {{ $jadwal->lokasi }}</p>

        @empty

            <p>Tidak ada jadwal ekskul hari ini.</p>

        @endforelse
    </section>

    <section class="card">

        <h2>🎯 Ekskul Saya</h2>

        <div class="ekskul-grid">

            @forelse($ekskul as $item)

               <div class="ekskul-card">

    <div style="font-size:35px;">⚽</div>

    <h3>{{ $item->nama_ekskul }}</h3>

    <p>
        📍 {{ $item->lokasi ?? 'Lokasi belum diatur' }}
    </p>

    <a href="{{ route('ekskul.show', $item->id) }}"
       style="
            display:inline-block;
            margin-top:10px;
            padding:10px 15px;
            background:#0f2a5f;
            color:white;
            text-decoration:none;
            border-radius:10px;
       ">
        Lihat Detail
    </a>

</div>

            @empty

                <p>Belum ada data ekstrakurikuler.</p>

            @endforelse

        </div>

    </section>

    <section class="card">

        <h2>📢 Pengumuman Terbaru</h2>

        @forelse($pengumuman as $item)

            <div class="announcement">

                <strong>{{ $item->judul }}</strong>

                <p>{{ $item->isi }}</p>

                <small>{{ $item->tanggal }}</small>

            </div>

        @empty

            <p>Belum ada pengumuman.</p>

        @endforelse

    </section>

</main>

<nav class="bottom-nav">
    <a href="/dashboard">🏠<br>Beranda</a>
    <a href="#">📅<br>Jadwal</a>
    <a href="#">🏆<br>Prestasi</a>
    <a href="#">🔔<br>Notifikasi</a>
    <a href="#">👤<br>Profil</a>
</nav>

</body>
</html>