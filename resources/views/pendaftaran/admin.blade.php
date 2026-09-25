<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Pendaftaran - EKSPLORE</title>

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

        /* =========================
           NAVBAR
        ========================= */

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
            max-width: 1250px;

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
            color: #6b7280;

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

            margin-bottom: 20px;
        }

        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 1100px;
        }

        thead {
            background: #111827;

            color: white;
        }

        th,
        td {
            padding: 14px;

            text-align: left;

            border-bottom: 1px solid #e5e7eb;

            font-size: 14px;

            vertical-align: top;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;
        }

        .status-menunggu {
            background: #fef3c7;

            color: #92400e;
        }

        .status-diterima {
            background: #dcfce7;

            color: #166534;
        }

        .status-ditolak {
            background: #fee2e2;

            color: #991b1b;
        }

        /* =========================
           BUTTON
        ========================= */

        .button {
            border: none;

            color: white;

            padding: 8px 13px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .button:hover {
            transform: translateY(-1px);
        }

        .button-accept {
            background: #16a34a;
        }

        .button-accept:hover {
            background: #15803d;
        }

        .button-reject {
            background: #dc2626;
        }

        .button-reject:hover {
            background: #b91c1c;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;

            color: #6b7280;

            padding: 50px 20px;
        }

        .empty-icon {
            font-size: 45px;

            margin-bottom: 15px;
        }

        /* =========================
           ALASAN
        ========================= */

        .reason {
            max-width: 280px;

            line-height: 1.5;

            color: #4b5563;
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

        }

    </style>

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
                📝 Kelola Pendaftaran
            </h1>

            <p>
                Kelola pendaftaran siswa yang
                mengajukan diri untuk mengikuti
                ekstrakurikuler dalam sistem EKSPLORE.
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
             DATA PENDAFTARAN
        ========================= --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    📋 Daftar Pendaftaran Siswa
                </h2>

            </div>



            @if (isset($pendaftaran) && $pendaftaran->count() > 0)


                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Nama Siswa
                            </th>

                            <th>
                                Kelas
                            </th>

                            <th>
                                NIS
                            </th>

                            <th>
                                Ekstrakurikuler
                            </th>

                            <th>
                                No. HP
                            </th>

                            <th>
                                Alasan
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($pendaftaran as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- NAMA SISWA --}}

                                <td>

                                    <strong>
                                        {{ $item->nama ?? ($item->siswa->nama ?? $item->siswa->name ?? '-') }}
                                    </strong>

                                </td>


                                {{-- KELAS --}}

                                <td>
                                    {{ $item->kelas ?? ($item->siswa->kelas ?? '-') }}
                                </td>


                                {{-- NIS --}}

                                <td>
                                    {{ $item->nis ?? ($item->siswa->nis ?? '-') }}
                                </td>


                                {{-- EKSTRAKURIKULER --}}

                                <td>

                                    @if ($item->ekstrakurikuler)

                                        <strong>
                                            {{ $item->ekstrakurikuler->nama_ekskul ?? $item->ekstrakurikuler->nama ?? '-' }}
                                        </strong>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- NO HP --}}

                                <td>
                                    {{ $item->no_hp ?? ($item->siswa->no_hp ?? '-') }}
                                </td>


                                {{-- ALASAN --}}

                                <td>

                                    <div class="reason">

                                        {{ $item->alasan ?? '-' }}

                                    </div>

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if ($item->status === 'menunggu')

                                        <span class="status status-menunggu">
                                            ⏳ Menunggu
                                        </span>

                                    @elseif ($item->status === 'diterima')

                                        <span class="status status-diterima">
                                            ✓ Diterima
                                        </span>

                                    @elseif ($item->status === 'ditolak')

                                        <span class="status status-ditolak">
                                            ✕ Ditolak
                                        </span>

                                    @else

                                        <span class="status status-menunggu">
                                            {{ ucfirst($item->status ?? '-') }}
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}

                                <td>

                                    @if ($item->status === 'menunggu')

                                        <div
                                            style="
                                                display: flex;
                                                gap: 8px;
                                                flex-direction: column;
                                            "
                                        >

                                            {{-- TERIMA --}}

                                            <form
                                                action="{{ route('admin.pendaftaran.update', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menerima pendaftaran siswa ini?');"
                                            >

                                                @csrf

                                                @method('PUT')

                                                <input
                                                    type="hidden"
                                                    name="status"
                                                    value="diterima"
                                                >

                                                <button
                                                    type="submit"
                                                    class="button button-accept"
                                                >
                                                    ✓ Terima
                                                </button>

                                            </form>


                                            {{-- TOLAK --}}

                                            <form
                                                action="{{ route('admin.pendaftaran.update', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menolak pendaftaran siswa ini?');"
                                            >

                                                @csrf

                                                @method('PUT')

                                                <input
                                                    type="hidden"
                                                    name="status"
                                                    value="ditolak"
                                                >

                                                <button
                                                    type="submit"
                                                    class="button button-reject"
                                                >
                                                    ✕ Tolak
                                                </button>

                                            </form>

                                        </div>

                                    @elseif ($item->status === 'diterima')

                                        <span style="color:#166534;font-weight:bold;">
                                            ✓ Sudah diterima
                                        </span>

                                    @elseif ($item->status === 'ditolak')

                                        <span style="color:#991b1b;font-weight:bold;">
                                            ✕ Sudah ditolak
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>


            @else

                <div class="empty">

                    <div class="empty-icon">
                        📝
                    </div>

                    <strong>
                        Belum ada pendaftaran
                    </strong>

                    <p style="margin-top: 8px;">
                        Pendaftaran siswa akan
                        ditampilkan di sini.
                    </p>

                </div>

            @endif

        </div>


    </main>


</body>

</html>