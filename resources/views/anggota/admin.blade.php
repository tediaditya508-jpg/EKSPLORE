<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Anggota Ekskul - Admin | EKSPLORE</title>

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
            opacity: 0.85;
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

        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #111827;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            background: #374151;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        .back:hover {
            background: #1f2937;
        }

        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 25px;
            }

            .header {
                padding: 22px;
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
            Admin
        </div>

    </nav>


    <main class="container">

        <section class="header">

            <h1>
                👥 Anggota Ekstrakurikuler
            </h1>

            <p>
                Kelola dan lihat daftar siswa yang
                telah menjadi anggota aktif
                ekstrakurikuler sekolah.
            </p>

        </section>


        <section class="table-card">

            @if ($anggota->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>NIS</th>
                            <th>Ekstrakurikuler</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($anggota as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->siswa->name ?? $item->siswa->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->siswa->kelas ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->siswa->nis ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->ekstrakurikuler->nama_ekskul
                                        ?? $item->ekstrakurikuler->nama
                                        ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->tanggal_daftar
                                        ? \Carbon\Carbon::parse($item->tanggal_daftar)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>

                                    <span class="status">
                                        Aktif
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">

                    <h3>
                        Belum ada anggota aktif
                    </h3>

                    <p style="margin-top: 8px;">
                        Siswa yang pendaftarannya
                        diterima akan muncul di halaman ini.
                    </p>

                </div>

            @endif

        </section>


        <a
            href="{{ route('admin.dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>

    </main>

</body>

</html>