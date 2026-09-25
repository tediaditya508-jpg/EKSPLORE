<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Ekskul - Admin | EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px 30px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
            color: #111827;
        }

        .header p {
            color: #6b7280;
            font-size: 15px;
        }

        .back-button {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 18px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .back-button:hover {
            background: #374151;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 20px;
            color: #111827;
        }

        .total {
            background: #eef2ff;
            color: #4338ca;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        thead {
            background: #f3f4f6;
        }

        th {
            padding: 14px 12px;
            text-align: left;
            font-size: 13px;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            color: #374151;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .nama-ekskul {
            font-weight: bold;
            color: #111827;
        }

        .hari {
            font-weight: bold;
            color: #2563eb;
        }

        .jam {
            white-space: nowrap;
        }

        .lokasi {
            color: #6b7280;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        @media (max-width: 700px) {
            .container {
                width: 95%;
                margin: 20px auto;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 23px;
            }

            .card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <h1>📅 Jadwal Ekstrakurikuler</h1>

        <p>
            Kelola dan lihat seluruh jadwal kegiatan ekstrakurikuler.
        </p>

        <a href="{{ route('admin.dashboard') }}" class="back-button">
            ← Kembali ke Dashboard
        </a>

    </div>


    <!-- DATA JADWAL -->
    <div class="card">

        <div class="card-header">

            <h2>Daftar Jadwal</h2>

            <div class="total">
                Total {{ $jadwal->count() }} Jadwal
            </div>

        </div>


        @if ($jadwal->count() > 0)

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ekstrakurikuler</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($jadwal as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td class="nama-ekskul">
                                {{ $item->ekstrakurikuler->nama_ekskul
                                    ?? $item->ekstrakurikuler->nama
                                    ?? '-' }}
                            </td>

                            <td class="hari">
                                {{ $item->hari ?? '-' }}
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

        @else

            <div class="empty">

                <div class="empty-icon">
                    📅
                </div>

                <h3>
                    Belum Ada Jadwal
                </h3>

                <p style="margin-top: 8px;">
                    Belum terdapat jadwal ekstrakurikuler yang tersedia.
                </p>

            </div>

        @endif

    </div>

</div>

</body>
</html>