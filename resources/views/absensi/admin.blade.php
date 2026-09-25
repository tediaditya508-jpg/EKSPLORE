<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi - Admin | EKSPLORE</title>

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
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            background: white;
            border-radius: 16px;
            padding: 25px 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
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

        .back {
            display: inline-block;
            margin-top: 18px;
            text-decoration: none;
            background: #111827;
            color: white;
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 14px;
        }

        .back:hover {
            background: #374151;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #111827;
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
            border-bottom: 2px solid #e5e7eb;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            color: #4b5563;
        }

        tr:hover td {
            background: #f9fafb;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .hadir {
            background: #dcfce7;
            color: #166534;
        }

        .izin {
            background: #fef3c7;
            color: #92400e;
        }

        .sakit {
            background: #dbeafe;
            color: #1e40af;
        }

        .alpa {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .nama {
            font-weight: bold;
            color: #111827;
        }

        .small {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 3px;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 20px;
            }

            .card {
                padding: 15px;
            }

            .header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📋 Data Absensi</h1>

        <p>
            Kelola dan pantau data kehadiran siswa
            pada kegiatan ekstrakurikuler.
        </p>

        <a href="{{ route('admin.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>
    </div>


    <div class="card">

        <div class="card-title">
            Riwayat Absensi Siswa
        </div>

        @if($absensi->count() > 0)

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Ekstrakurikuler</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($absensi as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="nama">
                                    {{ $item->anggota->siswa->name
                                        ?? $item->anggota->siswa->nama
                                        ?? '-' }}
                                </div>

                            </td>

                            <td>

                                {{ $item->anggota->ekstrakurikuler->nama_ekskul
                                    ?? $item->anggota->ekstrakurikuler->nama
                                    ?? '-' }}

                            </td>

                            <td>
                                {{ $item->tanggal
                                    ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>

                                @php
                                    $status = strtolower($item->status ?? '');
                                @endphp

                                <span class="status {{ $status }}">
                                    {{ ucfirst($status ?: '-') }}
                                </span>

                            </td>

                            <td>
                                {{ $item->keterangan ?? '-' }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <div class="empty-icon">
                    📋
                </div>

                <p>
                    Belum ada data absensi.
                </p>

            </div>

        @endif

    </div>

</div>

</body>
</html>