<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Ekstrakurikuler - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #2563eb;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .success-box {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .button-area {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .button {
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        .button-save {
            background: #2563eb;
            color: white;
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

        @media (max-width: 700px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .container {
                width: 94%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .button-area {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>✏️ Edit Ekstrakurikuler</h1>
        <p>Perbarui informasi ekstrakurikuler pada sistem EKSPLORE.</p>
    </div>

    <div class="card">

        @if ($errors->any())
            <div class="error-box">
                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('admin.ekstrakurikuler.update', $ekskul->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_ekskul">
                    Nama Ekstrakurikuler
                </label>

                <input
                    type="text"
                    id="nama_ekskul"
                    name="nama_ekskul"
                    value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}"
                    placeholder="Contoh: Futsal"
                    required
                >
            </div>

            <div class="form-group">
                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Masukkan deskripsi ekstrakurikuler"
                >{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="pembina_id">
                    Pembina
                </label>

                <select
                    id="pembina_id"
                    name="pembina_id"
                >
                    <option value="">-- Pilih Pembina --</option>

                    @foreach ($pembina as $item)
                        <option
                            value="{{ $item->id }}"
                            {{ old('pembina_id', $ekskul->pembina_id) == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="jadwal">
                        Hari / Jadwal
                    </label>

                    <input
                        type="text"
                        id="jadwal"
                        name="jadwal"
                        value="{{ old('jadwal', $ekskul->jadwal) }}"
                        placeholder="Contoh: Senin"
                    >
                </div>

                <div class="form-group">
                    <label for="jam">
                        Jam
                    </label>

                    <input
                        type="text"
                        id="jam"
                        name="jam"
                        value="{{ old('jam', $ekskul->jam) }}"
                        placeholder="Contoh: 15:30 - 17:00"
                    >
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="lokasi">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        id="lokasi"
                        name="lokasi"
                        value="{{ old('lokasi', $ekskul->lokasi) }}"
                        placeholder="Contoh: Lapangan Sekolah"
                    >
                </div>

                <div class="form-group">
                    <label for="kuota">
                        Kuota
                    </label>

                    <input
                        type="number"
                        id="kuota"
                        name="kuota"
                        value="{{ old('kuota', $ekskul->kuota) }}"
                        min="1"
                        placeholder="Contoh: 30"
                    >
                </div>

            </div>

            <div class="form-group">
                <label for="persyaratan">
                    Persyaratan
                </label>

                <textarea
                    id="persyaratan"
                    name="persyaratan"
                    placeholder="Masukkan persyaratan anggota"
                >{{ old('persyaratan', $ekskul->persyaratan) }}</textarea>
            </div>

            <div class="form-group">
                <label for="gambar">
                    Gambar
                </label>

                <input
                    type="text"
                    id="gambar"
                    name="gambar"
                    value="{{ old('gambar', $ekskul->gambar) }}"
                    placeholder="Nama file / URL gambar"
                >
            </div>

            <div class="button-area">

                <button
                    type="submit"
                    class="button button-save"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="{{ route('admin.ekstrakurikuler') }}"
                    class="button button-back"
                >
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>