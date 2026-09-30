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
            max-width: 1250px;
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
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 20px;
            color: #111827;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .total {
            background: #eef2ff;
            color: #4338ca;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .btn-tambah {
            display: inline-block;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .btn-tambah:hover {
            background: #1d4ed8;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-error ul {
            margin-left: 18px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
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
            white-space: nowrap;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            color: #374151;
            vertical-align: middle;
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

        .aksi {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-edit {
            display: inline-block;
            padding: 8px 12px;
            background: #f59e0b;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-hapus {
            padding: 8px 12px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #b91c1c;
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

        .empty h3 {
            color: #374151;
            margin-bottom: 8px;
        }

        .empty .btn-tambah {
            margin-top: 20px;
        }

        @media (max-width: 800px) {
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

            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
                justify-content: space-between;
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


    <!-- PESAN BERHASIL -->
    @if (session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif


    <!-- PESAN ERROR -->
    @if ($errors->any())
        <div class="alert alert-error">

            <strong>❌ Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    <!-- DATA JADWAL -->
    <div class="card">

        <div class="card-header">

            <h2>Daftar Jadwal</h2>

            <div class="header-actions">

                <div class="total">
                    Total {{ $jadwal->count() }} Jadwal
                </div>

                <a href="{{ route('admin.jadwal.create') }}" class="btn-tambah">
                    ➕ Tambah Jadwal
                </a>

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
                        <th>Aksi</th>
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

                            <td>

                                <div class="aksi">

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('admin.jadwal.edit', $item->id) }}"
                                        class="btn-edit"
                                    >
                                        ✏️ Edit
                                    </a>


                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('admin.jadwal.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                        >
                                            🗑️ Hapus
                                        </button>

                                    </form>

                                </div>

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

                <p>
                    Belum terdapat jadwal ekstrakurikuler yang tersedia.
                </p>

                <a
                    href="{{ route('admin.jadwal.create') }}"
                    class="btn-tambah"
                >
                    ➕ Tambah Jadwal Pertama
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>