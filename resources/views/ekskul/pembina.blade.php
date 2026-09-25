<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ekstrakurikuler Saya - EKSPLORE</title>

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

        .back {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-bottom: 18px;
            color: #111827;
        }

        .info {
            margin-bottom: 12px;
            color: #6b7280;
            line-height: 1.5;
        }

        .info strong {
            color: #1f2937;
        }

        .description {
            line-height: 1.7;
            color: #6b7280;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .stat {
            background: #f5f7fb;
            padding: 18px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 25px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
        }

        .badge {
            display: inline-block;
            margin-bottom: 15px;
            padding: 6px 12px;
            border-radius: 20px;
            background: #eef2ff;
            color: #3730a3;
            font-size: 13px;
            font-weight: bold;
        }

        .empty {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .empty h2 {
            margin-bottom: 10px;
        }

        .empty p {
            color: #6b7280;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .button:hover {
            background: #374151;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            EKSPLORE
        </div>

        <a
            href="{{ route('pembina.dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>

    </nav>


    <main class="container">

        <section class="header">

            <h1>
                📚 Ekstrakurikuler Saya
            </h1>

            <p>
                Halo, {{ $pembina->name }}. Berikut informasi
                ekstrakurikuler yang Anda bina.
            </p>

        </section>


        @if ($ekskul->count() > 0)

            <section class="grid">

                @foreach ($ekskul as $item)

                    <div class="card">

                        <span class="badge">
                            EKSTRAKURIKULER BINAAN
                        </span>

                        <h2>
                            {{ $item->nama_ekskul }}
                        </h2>


                        <p class="info">
                            👨‍🏫
                            <strong>Pembina:</strong>
                            {{ $pembina->name }}
                        </p>


                        @if ($item->lokasi)
                            <p class="info">
                                📍
                                <strong>Lokasi:</strong>
                                {{ $item->lokasi }}
                            </p>
                        @endif


                        @if ($item->jadwal)
                            <p class="info">
                                📅
                                <strong>Jadwal:</strong>
                                {{ $item->jadwal }}
                            </p>
                        @endif


                        @if ($item->jam)
                            <p class="info">
                                🕐
                                <strong>Jam:</strong>
                                {{ $item->jam }}
                            </p>
                        @endif


                        @if ($item->persyaratan)
                            <p class="info">
                                📋
                                <strong>Persyaratan:</strong>
                                {{ $item->persyaratan }}
                            </p>
                        @endif


                        @if ($item->deskripsi)

                            <p class="description">
                                <strong>Deskripsi:</strong><br>
                                {{ $item->deskripsi }}
                            </p>

                        @endif


                        <div class="stats">

                            <div class="stat">

                                <div class="stat-number">
                                    {{ $item->anggota->count() }}
                                </div>

                                <div class="stat-label">
                                    Anggota Aktif
                                </div>

                            </div>


                            <div class="stat">

                                <div class="stat-number">
                                    {{ $item->kuota ?? '-' }}
                                </div>

                                <div class="stat-label">
                                    Kuota
                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </section>

        @else

            <section class="empty">

                <h2>
                    📚 Belum Ada Ekstrakurikuler
                </h2>

                <p>
                    Saat ini belum ada ekstrakurikuler yang
                    ditugaskan kepada Anda.
                </p>

                <a
                    href="{{ route('pembina.dashboard') }}"
                    class="button"
                >
                    Kembali ke Dashboard
                </a>

            </section>

        @endif

    </main>

</body>
</html>