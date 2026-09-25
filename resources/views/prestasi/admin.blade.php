<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prestasi - Admin | EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .back {
            display: inline-block;
            margin-top: 18px;
            text-decoration: none;
            color: white;
            background: #2563eb;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        .table-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        .table-card h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #f3f4f6;
            color: #374151;
            text-align: left;
            padding: 14px;
            font-size: 14px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #6b7280;
        }

        .date {
            white-space: nowrap;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🏆 Data Prestasi</h1>

        <p>
            Daftar prestasi yang diperoleh oleh seluruh
            ekstrakurikuler sekolah.
        </p>

        <a href="{{ route('admin.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>
    </div>


    <div class="table-card">

        <h2>Daftar Prestasi Ekstrakurikuler</h2>

        @if ($prestasi->count() > 0)

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Prestasi</th>
                        <th>Ekstrakurikuler</th>
                        <th>Tingkat</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Dokumentasi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($prestasi as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $item->nama_prestasi }}
                                </strong>
                            </td>

                            <td>

                                @if ($item->ekstrakurikuler)
                                    <span class="badge">
                                        {{ $item->ekstrakurikuler->nama_ekskul }}
                                    </span>
                                @else
                                    -
                                @endif

                            </td>

                            <td>
                                {{ $item->tingkat ?? '-' }}
                            </td>

                            <td class="date">

                                @if ($item->tanggal)
                                    {{ $item->tanggal->format('d-m-Y') }}
                                @else
                                    -
                                @endif

                            </td>

                            <td>
                                {{ $item->lokasi ?? '-' }}
                            </td>

                            <td>
                                {{ $item->dokumentasi ?? '-' }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">
                🏆 Belum ada data prestasi ekstrakurikuler.
            </div>

        @endif

    </div>

</div>

</body>
</html>