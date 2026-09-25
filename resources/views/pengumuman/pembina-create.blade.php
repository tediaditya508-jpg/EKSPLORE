<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengumuman - EKSPLORE</title>

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
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            border: none;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-back:hover {
            background: #d1d5db;
        }

        .info {
            background: #eff6ff;
            color: #1e40af;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📢 Tambah Pengumuman</h1>

        <p>
            Buat pengumuman baru untuk siswa.
        </p>
    </div>


    <div class="card">

        <div class="info">
            Silakan isi informasi pengumuman dengan lengkap.
            Pengumuman yang berhasil dibuat akan dapat dilihat oleh siswa.
        </div>


        @if($errors->any())
            <div style="
                background: #fee2e2;
                color: #991b1b;
                padding: 14px 16px;
                border-radius: 10px;
                margin-bottom: 20px;
            ">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        <form
            action="{{ route('pembina.pengumuman.store') }}"
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
                    placeholder="Contoh: Jadwal latihan futsal"
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
                    placeholder="Tuliskan isi pengumuman di sini..."
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
                    Gambar / Path Gambar
                    <span style="font-weight: normal; color: #6b7280;">
                        (opsional)
                    </span>
                </label>

                <input
                    type="text"
                    id="gambar"
                    name="gambar"
                    value="{{ old('gambar') }}"
                    placeholder="Contoh: images/pengumuman.jpg"
                >

                @error('gambar')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- BUTTON --}}

            <div class="actions">

                <a
                    href="{{ route('pembina.pengumuman') }}"
                    class="btn btn-back"
                >
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    📢 Simpan Pengumuman
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>