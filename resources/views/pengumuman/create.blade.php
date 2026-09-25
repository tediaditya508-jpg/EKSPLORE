<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Pengumuman - EKSPLORE</title>

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
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .box h1 {
            margin-bottom: 10px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
        }

        .form-group textarea {
            min-height: 160px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 25px;
            }

            .box {
                padding: 22px;
            }

            .buttons {
                flex-direction: column;
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

        <div class="box">

            <h1>
                📢 Tambah Pengumuman
            </h1>

            <p class="description">
                Buat pengumuman baru yang nantinya
                dapat ditampilkan kepada siswa dan pembina.
            </p>


            <form
                action="{{ route('admin.pengumuman.store') }}"
                method="POST"
            >

                @csrf


                {{-- JUDUL --}}

                <div class="form-group">

                    <label for="judul">
                        Judul Pengumuman
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Jadwal Kegiatan Ekstrakurikuler"
                        required
                    >

                    @error('judul')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- ISI --}}

                <div class="form-group">

                    <label for="isi">
                        Isi Pengumuman
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        placeholder="Tuliskan isi pengumuman..."
                        required
                    >{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- TANGGAL --}}

                <div class="form-group">

                    <label for="tanggal">
                        Tanggal Pengumuman
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- GAMBAR --}}

                <div class="form-group">

                    <label for="gambar">
                        Gambar (Opsional)
                    </label>

                    <input
                        type="text"
                        id="gambar"
                        name="gambar"
                        value="{{ old('gambar') }}"
                        placeholder="Contoh: pengumuman.jpg"
                    >

                    @error('gambar')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}

                <div class="buttons">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Pengumuman
                    </button>

                    <a
                        href="{{ route('admin.pengumuman') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                </div>


            </form>

        </div>

    </main>


</body>

</html>