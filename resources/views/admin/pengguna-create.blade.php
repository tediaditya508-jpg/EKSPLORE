<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Pengguna - EKSPLORE</title>

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
            max-width: 900px;

            margin: 40px auto;

            padding: 0 20px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h1 {
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;

            margin-bottom: 30px;

            line-height: 1.6;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: bold;

            color: #334155;
        }

        .form-group input,
        .form-group select {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            font-size: 14px;

            outline: none;

            transition: 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }

        /* =========================
           ERROR
        ========================= */

        .error {
            background: #fee2e2;

            color: #991b1b;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 25px;
        }

        .error ul {
            margin-top: 8px;

            padding-left: 20px;
        }

        /* =========================
           BUTTON
        ========================= */

        .actions {
            display: flex;

            gap: 10px;

            margin-top: 30px;
        }

        .button-save {
            background: #0f172a;

            color: white;

            border: none;

            padding: 12px 20px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .button-save:hover {
            background: #334155;

            transform: translateY(-1px);
        }

        .button-cancel {
            background: #e2e8f0;

            color: #334155;

            text-decoration: none;

            padding: 12px 20px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: bold;

            transition: 0.2s ease;
        }

        .button-cancel:hover {
            background: #cbd5e1;
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

            .card {
                padding: 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .button-save,
            .button-cancel {
                width: 100%;

                text-align: center;
            }

        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>


<body>

@include('partials.app-sidebar')

    <main class="container">


        <div class="card">


            <h1>
                ➕ Tambah Pengguna
            </h1>


            <p class="description">
                Tambahkan akun pengguna baru
                ke dalam sistem EKSPLORE.
            </p>



            {{-- =========================
                 ERROR VALIDASI
            ========================= --}}

            @if ($errors->any())

                <div class="error">

                    <strong>
                        Terjadi kesalahan:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            {{-- =========================
                 FORM
            ========================= --}}

            <form
                action="{{ route('admin.pengguna.store') }}"
                method="POST"
            >

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Tedi Aditya"
                        required
                    >

                </div>



                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Contoh: nama@gmail.com"
                        required
                    >

                </div>



                {{-- PASSWORD + KONFIRMASI --}}

                <div class="form-row">


                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="password_confirmation">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >

                    </div>


                </div>



                {{-- ROLE --}}

                <div class="form-group">

                    <label for="role">
                        Role
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                    >

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option
                            value="siswa"
                            {{ old('role') === 'siswa' ? 'selected' : '' }}
                        >
                            Siswa
                        </option>

                        <option
                            value="pembina"
                            {{ old('role') === 'pembina' ? 'selected' : '' }}
                        >
                            Pembina
                        </option>

                        <option
                            value="admin"
                            {{ old('role') === 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                    </select>

                </div>



                {{-- BUTTON --}}

                <div class="actions">

                    <button
                        type="submit"
                        class="button-save"
                    >
                        💾 Simpan Pengguna
                    </button>


                    <a
                        href="{{ route('admin.pengguna') }}"
                        class="button-cancel"
                    >
                        Batal
                    </a>

                </div>


            </form>


        </div>


    </main>


    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>