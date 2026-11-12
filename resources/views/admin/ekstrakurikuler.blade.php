<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Ekstrakurikuler - EKSPLORE</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: #1e293b;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #0f172a;
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

        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1150px;

            margin: 40px auto;

            padding: 0 20px;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);

            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 10px;
        }

        .header p {
            color: #64748b;

            line-height: 1.6;
        }

        /* =========================
           SUCCESS
        ========================= */

        .success {
            background: #dcfce7;

            color: #166534;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;
        }

        /* =========================
           ERROR
        ========================= */

        .error {
            background: #fee2e2;

            color: #991b1b;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;

            padding: 25px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);

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
            margin: 0;
        }

        /* =========================
           BUTTON TAMBAH
        ========================= */

        .button-add {
            display: inline-block;

            background: #0f172a;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: bold;

            transition: 0.2s ease;
        }

        .button-add:hover {
            background: #334155;

            transform: translateY(-1px);
        }

        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        thead {
            background: #0f172a;

            color: white;
        }

        th,
        td {
            padding: 14px;

            text-align: left;

            border-bottom: 1px solid #e2e8f0;

            font-size: 14px;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* =========================
           STATUS
        ========================= */

        .badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;
        }

        .badge-active {
            background: #dcfce7;

            color: #15803d;
        }

        .badge-inactive {
            background: #fee2e2;

            color: #b91c1c;
        }

        .badge-default {
            background: #e2e8f0;

            color: #334155;
        }

        /* =========================
           BUTTON EDIT
        ========================= */

        .button-edit {
            display: inline-block;

            background: #2563eb;

            color: white;

            text-decoration: none;

            padding: 8px 13px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: bold;

            transition: 0.2s ease;
        }

        .button-edit:hover {
            background: #1d4ed8;

            transform: translateY(-1px);
        }

        /* =========================
           BUTTON HAPUS
        ========================= */

        .button-delete {
            background: #dc2626;

            color: white;

            border: none;

            padding: 8px 13px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .button-delete:hover {
            background: #b91c1c;

            transform: translateY(-1px);
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;

            color: #64748b;

            padding: 40px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 25px;
            }

            .header {
                padding: 25px;
            }

            .card-header {
                flex-direction: column;

                align-items: flex-start;
            }

            .button-add {
                width: 100%;

                text-align: center;
            }

        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>


<body>


    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="navbar">

        <div class="logo">
            EKSPLORE
        </div>


        <a
            href="{{ route('admin.dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>

    </nav>



    <main class="container">


        {{-- =========================
             HEADER
        ========================= --}}

        <section class="header">

            <h1>
                🏫 Kelola Ekstrakurikuler
            </h1>


            <p>
                Kelola data ekstrakurikuler,
                pembina, jadwal, kuota,
                dan informasi kegiatan
                dalam sistem EKSPLORE.
            </p>

        </section>



        {{-- =========================
             PESAN BERHASIL
        ========================= --}}

        @if (session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif



        {{-- =========================
             PESAN ERROR
        ========================= --}}

        @if ($errors->any())

            <div class="error">

                <strong>
                    Terjadi kesalahan:
                </strong>


                <ul
                    style="
                        margin-top: 8px;
                        padding-left: 20px;
                    "
                >

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        {{-- =========================
             DATA EKSTRAKURIKULER
        ========================= --}}

        <div class="card">


            <div class="card-header">

                <h2>
                    📋 Daftar Ekstrakurikuler
                </h2>


                {{-- TOMBOL TAMBAH --}}

                <a
                    href="{{ route('admin.ekstrakurikuler.create') }}"
                    class="button-add"
                >
                    ➕ Tambah Ekstrakurikuler
                </a>

            </div>



            @if (isset($ekskul) && $ekskul->count() > 0)


                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Nama Ekskul
                            </th>

                            <th>
                                Pembina
                            </th>

                            <th>
                                Jadwal
                            </th>

                            <th>
                                Lokasi
                            </th>

                            <th>
                                Kuota
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($ekskul as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $item->nama_ekskul ?? $item->nama ?? '-' }}
                                    </strong>

                                </td>


                                <td>

                                    @if ($item->pembina)

                                        {{ $item->pembina->name }}

                                    @elseif ($item->pembina_id)

                                        ID Pembina: {{ $item->pembina_id }}

                                    @else

                                        -

                                    @endif

                                </td>


                                <td>

                                    {{ $item->jadwal ?? '-' }}

                                    @if ($item->jam)

                                        <br>

                                        <small>
                                            {{ $item->jam }}
                                        </small>

                                    @endif

                                </td>


                                <td>

                                    {{ $item->lokasi ?? '-' }}

                                </td>


                                <td>

                                    {{ $item->kuota ?? '-' }}

                                </td>


                                <td>

                                    <div
                                        style="
                                            display: flex;
                                            gap: 8px;
                                            align-items: center;
                                        "
                                    >

                                        {{-- TOMBOL EDIT --}}

                                        <a
                                            href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}"
                                            class="button-edit"
                                        >
                                            ✏️ Edit
                                        </a>


                                        {{-- TOMBOL HAPUS --}}

                                        <form
                                            action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?');"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="button-delete"
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

                    <div
                        style="
                            font-size: 40px;
                            margin-bottom: 15px;
                        "
                    >
                        🏫
                    </div>

                    <strong>
                        Belum ada data ekstrakurikuler
                    </strong>

                    <p style="margin-top: 8px;">
                        Data ekstrakurikuler akan
                        ditampilkan di sini.
                    </p>

                </div>

            @endif


        </div>


    </main>


    <script src="{{ asset('js/eksplore.js') }}" defer></script>
</body>

</html>