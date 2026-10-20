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
            line-height: 1.6;
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
            border-left: 5px solid #2563eb;
        }

        .jadwal-card.event {
            border-left-color: #f59e0b;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .jadwal-card h2 {
            color: #2563eb;
            font-size: 20px;
            line-height: 1.5;
        }

        .jadwal-card.event h2 {
            color: #92400e;
        }

        .badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-rutin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-event {
            background: #fef3c7;
            color: #92400e;
        }

        .nama-event {
            font-weight: bold;
            margin-bottom: 12px;
            color: #374151;
        }

        .info {
            margin: 9px 0;
            color: #4b5563;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .empty {
            background: white;
            padding: 35px 20px;
            border-radius: 16px;
            text-align: center;
            color: #6b7280;
            line-height: 1.7;
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px;
            }

            .header,
            .jadwal-card {
                padding: 20px;
            }

            .jadwal-card h2 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <main class="container">

        <section class="header">
            <h1>📅 Jadwal Ekstrakurikuler</h1>

            <p>
                Lihat jadwal rutin dan event ekstrakurikuler
                yang Anda ikuti di SMK Budi Bakti Ciwidey.
            </p>

            <a href="{{ route('dashboard') }}" class="back">
                ← Kembali ke Dashboard
            </a>
        </section>

        <div class="jadwal-list">

            @forelse ($jadwal as $item)

                @php
                    $isEvent = ($item->jenis ?? 'rutin') === 'event';
                @endphp

                <article class="jadwal-card {{ $isEvent ? 'event' : '' }}">

                    <div class="card-top">
                        <h2>
                            {{ $item->ekstrakurikuler->nama_ekskul
                                ?? $item->ekstrakurikuler->nama
                                ?? 'Ekstrakurikuler' }}
                        </h2>

                        @if ($isEvent)
                            <span class="badge badge-event">Event</span>
                        @else
                            <span class="badge badge-rutin">Jadwal Rutin</span>
                        @endif
                    </div>

                    @if ($isEvent)
                        <p class="nama-event">
                            🎉 {{ $item->nama_event ?: 'Event ekstrakurikuler' }}
                        </p>

                        <p class="info">
                            📅 <strong>Tanggal:</strong>

                            @if ($item->tanggal_event)
                                {{ \Carbon\Carbon::parse($item->tanggal_event)->format('d-m-Y') }}
                            @else
                                Belum ditentukan
                            @endif
                        </p>
                    @else
                        <p class="info">
                            📅 <strong>Hari:</strong>
                            {{ $item->hari ?? '-' }}
                        </p>
                    @endif

                    <p class="info">
                        🕐 <strong>Jam:</strong>

                        @if ($item->jam_mulai && $item->jam_selesai)
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                        @else
                            Belum ditentukan
                        @endif
                    </p>

                    <p class="info">
                        📍 <strong>Lokasi:</strong>
                        {{ $item->lokasi ?: 'Belum ditentukan' }}
                    </p>

                </article>

            @empty

                <div class="empty">
                    <p>📅</p>
                    <p><strong>Belum Ada Jadwal</strong></p>
                    <p>Jadwal ekstrakurikuler yang Anda ikuti belum tersedia.</p>
                </div>

            @endforelse

        </div>

    </main>

</body>
</html>