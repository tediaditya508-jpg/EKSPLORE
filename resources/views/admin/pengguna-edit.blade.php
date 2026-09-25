<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pengguna - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #ffffff;
            padding: 18px 40px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-name {
            font-size: 14px;
            color: #4b5563;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .card-title {
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            background: #ffffff;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }

        .button-save {
            background: #2563eb;
            color: #ffffff;
        }

        .button-save:hover {
            background: #1d4ed8;
        }

        .button-back {
            background: #e5e7eb;
            color: #374151;
        }

        .button-back:hover {
            background: #d1d5db;
        }

        .info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 25px;
            }

            .card {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            EKSPLORE
        </div>

        <div class="navbar-right">
            <span class="admin-name">
                Admin: {{ $admin->name }}
            </span>
        </div>
    </nav>


    <main class="container">

        <div class="header">
            <h1>Edit Pengguna</h1>
            <p>Ubah data pengguna yang sudah terdaftar di sistem.</p>
        </div>


        <div class="card">

            <h2 class="card-title">
                ✏️ Edit Data Pengguna
            </h2>


            <div class="info">
                Silakan ubah data pengguna yang diperlukan, kemudian klik
                <strong>Simpan Perubahan</strong>.
            </div>


            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form
                action="{{ route('admin.pengguna.update', $user->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="name">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </div>


                <div class="form-group">
                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                </div>


                <div class="form-group">
                    <label for="role">
                        Role
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                    >
                        <option
                            value="siswa"
                            {{ old('role', $user->role) === 'siswa' ? 'selected' : '' }}
                        >
                            Siswa
                        </option>

                        <option
                            value="pembina"
                            {{ old('role', $user->role) === 'pembina' ? 'selected' : '' }}
                        >
                            Pembina
                        </option>

                        <option
                            value="admin"
                            {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>
                    </select>
                </div>


                <div class="button-group">

                    <button
                        type="submit"
                        class="button button-save"
                    >
                        💾 Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('admin.pengguna') }}"
                        class="button button-back"
                    >
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>