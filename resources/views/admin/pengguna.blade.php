<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

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
           TABLE CARD
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

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            min-width: 1050px;

            border-collapse: collapse;

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

            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-weight: bold;

            white-space: nowrap;
        }

        td {
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* =========================
           LEBAR KOLOM
        ========================= */

        .col-no {
            width: 55px;
        }

        .col-nama {
            width: 180px;
        }

        .col-email {
            width: 250px;
        }

        .col-nis {
            width: 90px;
        }

        .col-kelas {
            width: 90px;
        }

        .col-role {
            width: 105px;
        }

        .col-terdaftar {
            width: 115px;
        }

        .col-aksi {
            width: 190px;
        }

        /* =========================
           ROLE BADGE
        ========================= */

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

        .badge-default {
            background: #e5e7eb;

            color: #374151;
        }

        /* =========================
           AKSI
        ========================= */

        .aksi-wrapper {
            display: flex;

            align-items: center;

            gap: 8px;

            white-space: nowrap;
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

            color: #6b7280;

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
                👥 Kelola Pengguna
            </h1>


            <p>
                Kelola data akun siswa, pembina,
                dan administrator yang terdaftar
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
             DATA PENGGUNA
        ========================= --}}

        <div class="card">


            <div class="card-header">

                <h2>
                    📋 Daftar Pengguna
                </h2>


                <a
                    href="{{ route('admin.pengguna.create') }}"
                    class="button-add"
                >
                    ➕ Tambah Pengguna
                </a>

            </div>



            @if ($users->count() > 0)


                <div class="table-wrapper">

                    <table>

                        <colgroup>

                            <col class="col-no">

                            <col class="col-nama">

                            <col class="col-email">

                            <col class="col-nis">

                            <col class="col-kelas">

                            <col class="col-role">

                            <col class="col-terdaftar">

                            <col class="col-aksi">

                        </colgroup>


                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Nama
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    NIS
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Terdaftar
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach ($users as $user)

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

                                        @if ($user->role === 'siswa')

                                            <span
                                                class="badge badge-siswa"
                                            >
                                                Siswa
                                            </span>


                                        @elseif ($user->role === 'pembina')

                                            <span
                                                class="badge badge-pembina"
                                            >
                                                Pembina
                                            </span>


                                        @elseif ($user->role === 'admin')

                                            <span
                                                class="badge badge-admin"
                                            >
                                                Admin
                                            </span>


                                        @else

                                            <span
                                                class="badge badge-default"
                                            >
                                                {{ $user->role }}
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        {{ $user->created_at
                                            ? $user->created_at->format('d-m-Y')
                                            : '-' }}

                                    </td>


                                    <td>

                                        <div class="aksi-wrapper">

                                            {{-- =========================
                                                 TOMBOL EDIT
                                            ========================= --}}

                                            <a
                                                href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="button-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            {{-- =========================
                                                 TOMBOL HAPUS
                                            ========================= --}}

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

                                                <span
                                                    style="
                                                        color: #9ca3af;
                                                        font-size: 12px;
                                                    "
                                                >
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

                    Belum ada pengguna
                    yang terdaftar.

                </div>

            @endif


        </div>


    </main>


</body>

</html>