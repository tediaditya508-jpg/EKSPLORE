<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Ekskul - Pembina | EKSPLORE</title>

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
            line-height: 1.6;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .card h2 {
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
            font-size: 14px;
            white-space: nowrap;
        }

        td {
            font-size: 14px;
            line-height: 1.5;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
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

        .nama-ekskul {
            font-weight: bold;
            color: #111827;
        }

        .nama-event {
            font-weight: bold;
            color: #92400e;
        }

        .jam {
            white-space: nowrap;
        }

        .lokasi {
            color: #6b7280;
        }

        .empty {
            text-align: center;
            padding: 35px 20px;
            color: #6b7280;
            line-height: 1.7;
        }

        .back {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 18px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back:hover {
            background: #1f2937;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin: 25px auto;
            }

            .header,
            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">EKSPLORE</div>
        <div class="role">Jadwal Pembina</div>
    </nav>

    <main class="container">

        <section class="header">
            <h1>📅 Jadwal Ekskul</h1>
            <p>
                Lihat jadwal rutin dan event dari ekstrakurikuler yang Anda bina.
            </p>
        </section>

        <section class="card">
            <h2>📚 Jadwal Kegiatan</h2>

            @if ($jadwal->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Ekstrakurikuler</th>
                                <th>Jenis</th>
                                <th>Nama Kegiatan</th>
                                <th>Hari / Tanggal</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jadwal as $item)
                                <tr>
                                    <td class="nama-ekskul">
                                        {{ $item->ekstrakurikuler->nama_ekskul
                                            ?? $item->ekstrakurikuler->nama
                                            ?? '-' }}
                                    </td>

                                    <td>
                                        @if (($item->jenis ?? 'rutin') === 'event')
                                            <span class="badge badge-event">
                                                Event
                                            </span>
                                        @else
                                            <span class="badge badge-rutin">
                                                Rutin
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($item->jenis ?? 'rutin') === 'event')
                                            <span class="nama-event">
                                                {{ $item->nama_event ?: 'Event ekstrakurikuler' }}
                                            </span>
                                        @else
                                            Kegiatan rutin
                                        @endif
                                    </td>

                                    <td>
                                        @if (($item->jenis ?? 'rutin') === 'event')
                                            @if ($item->tanggal_event)
                                                {{ \Carbon\Carbon::parse($item->tanggal_event)->format('d-m-Y') }}
                                            @else
                                                -
                                            @endif
                                        @else
                                            {{ $item->hari ?? '-' }}
                                        @endif
                                    </td>

                                    <td class="jam">
                                        @if ($item->jam_mulai && $item->jam_selesai)
                                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                                            -
                                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td class="lokasi">
                                        {{ $item->lokasi ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    Belum ada jadwal untuk ekstrakurikuler yang Anda bina.
                </div>
            @endif
        </section>

        <a href="{{ route('pembina.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

    </main>

</body>
</html>