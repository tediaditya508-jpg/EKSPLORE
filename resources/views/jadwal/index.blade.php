<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .header h1 {
            color: #2563eb;
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }

        .jadwal-list {
            display: grid;
            gap: 15px;
        }

        .jadwal-card {
            background: white;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .jadwal-card h2 {
            color: #2563eb;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .info {
            margin: 8px 0;
            color: #4b5563;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>📅 Jadwal Ekstrakurikuler</h1>

            <p>
                Lihat jadwal kegiatan ekstrakurikuler SMK Budi Bakti Ciwidey.
            </p>

            <a href="{{ route('dashboard') }}" class="back">
                ← Kembali ke Dashboard
            </a>

        </div>


        <div class="jadwal-list">

            @forelse ($jadwal as $item)

                <div class="jadwal-card">

                    <h2>
                        {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                    </h2>

                    <p class="info">
                        📅 <strong>Hari:</strong>
                        {{ $item->hari }}
                    </p>

                    <p class="info">
                        🕐 <strong>Jam:</strong>
                        {{ $item->jam_mulai }}
                        -
                        {{ $item->jam_selesai }}
                    </p>

                    <p class="info">
                        📍 <strong>Lokasi:</strong>
                        {{ $item->lokasi }}
                    </p>

                </div>

            @empty

                <div class="empty">
                    <p>Belum ada jadwal ekstrakurikuler.</p>
                </div>

            @endforelse

        </div>

    </div>

</body>

</html>