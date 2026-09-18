<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Ekskul - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            color: #172033;
        }

        .navbar {
            background: #0d47a1;
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

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .hero {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            padding: 50px 25px;
            text-align: center;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 17px;
            opacity: .9;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .judul {
            margin-bottom: 20px;
        }

        .judul h2 {
            font-size: 28px;
            color: #0d47a1;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .gambar {
            height: 180px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 65px;
        }

        .gambar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .isi {
            padding: 20px;
        }

        .badge {
            display: inline-block;
            background: #e3f2fd;
            color: #0d47a1;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .isi h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .deskripsi {
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .info {
            line-height: 1.9;
            color: #334155;
            margin-bottom: 18px;
        }

        .button {
            display: block;
            text-align: center;
            background: #0d47a1;
            color: white;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
        }

        .button:hover {
            background: #083578;
        }

        .kosong {
            background: white;
            padding: 40px;
            border-radius: 18px;
            text-align: center;
        }

        .kosong h3 {
            margin-bottom: 10px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 15px;
            }

            .navbar a {
                display: none;
            }

            .hero h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">EKSPLORE</div>

        <div>
            <a href="{{ route('dashboard') }}">Beranda</a>
            <a href="{{ route('ekskul.index') }}">Ekskul</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Temukan Ekskul Favoritmu 🎯</h1>
        <p>Jelajahi berbagai kegiatan ekstrakurikuler di sekolahmu.</p>
    </section>

    <main class="container">

        <div class="judul">
            <h2>Daftar Ekstrakurikuler</h2>
        </div>

        @if ($ekskul->count() > 0)

            <div class="grid">

                @foreach ($ekskul as $item)

                    <div class="card">

                        <div class="gambar">

                            @if (!empty($item->gambar))

                                <img
                                    src="{{ $item->gambar }}"
                                    alt="{{ $item->nama_ekskul }}"
                                >

                            @else

                                🎯

                            @endif

                        </div>

                        <div class="isi">

                            <span class="badge">
                                EKSTRAKURIKULER
                            </span>

                            <h3>
                                {{ $item->nama_ekskul }}
                            </h3>

                            <p class="deskripsi">
                                {{ $item->deskripsi ?? 'Belum ada deskripsi ekskul.' }}
                            </p>

                            <div class="info">

                                <div>
                                    📅 {{ $item->jadwal ?? 'Belum tersedia' }}
                                </div>

                                <div>
                                    🕒 {{ $item->jam ?? 'Belum tersedia' }}
                                </div>

                                <div>
                                    📍 {{ $item->lokasi ?? 'Belum tersedia' }}
                                </div>

                                <div>
                                    👥 Kuota {{ $item->kuota ?? 0 }} siswa
                                </div>

                            </div>

                            <a
                                href="{{ route('ekskul.show', $item->id) }}"
                                class="button"
                            >
                                Lihat Detail →
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="kosong">
                <h3>Belum ada data ekskul 😔</h3>
                <p>Data ekstrakurikuler belum tersedia.</p>
            </div>

        @endif

    </main>

</body>
</html>