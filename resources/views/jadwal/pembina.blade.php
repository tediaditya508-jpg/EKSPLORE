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
        }

        td {
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
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

            th,
            td {
                white-space: nowrap;
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
            Jadwal Pembina
        </div>

    </nav>


    <main class="container">

        <section class="header">

            <h1>
                📅 Jadwal Ekskul
            </h1>

            <p>
                Jadwal ekstrakurikuler yang Anda bina.
            </p>

        </section>


        @forelse ($jadwal as $item)

            @if ($loop->first)
                <section class="card">

                    <h2>
                        📚 Jadwal Kegiatan
                    </h2>

                    <div class="table-wrapper">

                        <table>

                            <thead>
                                <tr>
                                    <th>Ekskul</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>

                            <tbody>
            @endif

                                <tr>
                                    <td>
                                        {{ $item->ekstrakurikuler->nama_ekskul ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->hari ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->jam_mulai ?? '-' }}
                                        -
                                        {{ $item->jam_selesai ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->lokasi ?? '-' }}
                                    </td>
                                </tr>

            @if ($loop->last)
                            </tbody>

                        </table>

                    </div>

                </section>
            @endif

        @empty

            <section class="card">

                <div class="empty">
                    Belum ada jadwal untuk ekstrakurikuler yang Anda bina.
                </div>

            </section>

        @endforelse


        <a href="{{ route('pembina.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

    </main>

</body>
</html>