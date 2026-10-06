<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Pengguna - EKSPLORE</title>

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

        .back {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1150px;
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

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
            overflow: hidden;
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

        .button-add {
            display: inline-block;
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .button-add:hover {
            background: #374151;
            transform: translateY(-1px);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #d1d5db;
            border-radius: 10px;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        thead {
            background: #111827;
            color: white;
        }

        th,
        td {
            padding: 14px 12px;
            text-align: left;
            font-size: 14px;
            vertical-align: middle;
            border-right: 1px solid #d1d5db;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-weight: bold;
            white-space: nowrap;
            border-right: 1px solid #374151;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        td {
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .col-no {
            width: 55px;
        }

        .col-nama {
            width: 190px;
        }

        .col-email {
            width: 270px;
        }

        .col-nis {
            width: 100px;
        }

        .col-kelas {
            width: 110px;
        }

        .col-terdaftar {
            width: 125px;
        }

        .col-aksi {
            width: 230px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-siswa {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-pembina {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-admin {
            background: #fef3c7;
            color: #b45309;
        }

        .aksi-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            flex-wrap: nowrap;
        }

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
            white-space: nowrap;
        }

        .button-edit:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .button-delete {
            display: inline-block;
            background: #dc2626;
            color: white;
            border: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .button-delete:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 40px;
            background: #f9fafb;
            border-radius: 10px;
        }

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

            .card {
                padding: 18px;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .button-add {
                width: 100%;
                text-align: center;
            }

            table {
                min-width: 1100px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
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

        {{-- HEADER --}}
        <div class="header">

            <h1>
                👥 Kelola Pengguna
            </h1>

            <p>
                Kelola data akun siswa, pembina, dan administrator
                yang terdaftar dalam sistem EKSPLORE.
            </p>

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR --}}
        @if ($errors->any())

            <div class="error">

                <ul style="margin-left: 20px;">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =====================================================
             TABEL SISWA
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    👨‍🎓 Data Siswa
                </h2>

                <a
                    href="{{ route('admin.pengguna.create') }}"
                    class="button-add"
                >
                    + Tambah Pengguna
                </a>

            </div>


            @php
                $dataSiswa = $users->where('role', 'siswa');
            @endphp


            @if ($dataSiswa->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th class="col-no">
                                    No
                                </th>

                                <th class="col-nama">
                                    Nama
                                </th>

                                <th class="col-email">
                                    Email
                                </th>

                                <th class="col-nis">
                                    NIS
                                </th>

                                <th class="col-kelas">
                                    Kelas
                                </th>

                                <th class="col-terdaftar">
                                    Terdaftar
                                </th>

                                <th class="col-aksi">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($dataSiswa as $user)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->nis ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $user->kelas ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="aksi-wrapper">

                                            <a
                                                href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="button-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            @if ($user->id !== $admin->id)

                                                <form
                                                    action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');"
                                                    style="margin: 0;"
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

                                            @else

                                                <span style="color: #9ca3af; font-size: 12px;">
                                                    Akun sedang digunakan
                                                </span>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    Belum ada data siswa.
                </div>

            @endif

        </div>


        {{-- =====================================================
             TABEL PEMBINA
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    👨‍🏫 Data Pembina
                </h2>

                <a
                    href="{{ route('admin.pengguna.create') }}"
                    class="button-add"
                >
                    + Tambah Pengguna
                </a>

            </div>


            @php
                $dataPembina = $users->where('role', 'pembina');
            @endphp


            @if ($dataPembina->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th class="col-no">
                                    No
                                </th>

                                <th class="col-nama">
                                    Nama
                                </th>

                                <th class="col-email">
                                    Email
                                </th>

                                <th class="col-terdaftar">
                                    Terdaftar
                                </th>

                                <th class="col-aksi">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($dataPembina as $user)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="aksi-wrapper">

                                            <a
                                                href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="button-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            @if ($user->id !== $admin->id)

                                                <form
                                                    action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');"
                                                    style="margin: 0;"
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

                                            @else

                                                <span style="color: #9ca3af; font-size: 12px;">
                                                    Akun sedang digunakan
                                                </span>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    Belum ada data pembina.
                </div>

            @endif

        </div>


        {{-- =====================================================
             TABEL ADMIN
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    🛠️ Data Admin
                </h2>

                <a
                    href="{{ route('admin.pengguna.create') }}"
                    class="button-add"
                >
                    + Tambah Pengguna
                </a>

            </div>


            @php
                $dataAdmin = $users->where('role', 'admin');
            @endphp


            @if ($dataAdmin->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th class="col-no">
                                    No
                                </th>

                                <th class="col-nama">
                                    Nama
                                </th>

                                <th class="col-email">
                                    Email
                                </th>

                                <th class="col-terdaftar">
                                    Terdaftar
                                </th>

                                <th class="col-aksi">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($dataAdmin as $user)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="aksi-wrapper">

                                            <a
                                                href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="button-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            @if ($user->id !== $admin->id)

                                                <form
                                                    action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?');"
                                                    style="margin: 0;"
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

                                            @else

                                                <span style="color: #9ca3af; font-size: 12px;">
                                                    Akun sedang digunakan
                                                </span>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    Belum ada data admin.
                </div>

            @endif

        </div>

    </main>

</body>

</html>