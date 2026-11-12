<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Ekstrakurikuler - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-sans);
            background: #f4f6f9;
            color: #1e293b;
        }

        .navbar {
            background: #0f172a;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .navbar span {
            font-size: 14px;
            opacity: 0.9;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group label span {
            color: #dc2626;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: white;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-save {
            background: #2563eb;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .info {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 14px 16px;
            border-radius: 6px;
            margin-bottom: 25px;
            color: #1e40af;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            .row {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 16px 20px;
            }

            .container {
                margin: 25px auto;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')


    <div class="container">

        <div class="header">
            <h1>Tambah Ekstrakurikuler</h1>
            <p>Tambahkan data ekstrakurikuler baru ke sistem EKSPLORE.</p>
        </div>

        <div class="card">

            <div class="info">
                Silakan isi data ekstrakurikuler dengan lengkap. Kolom bertanda
                <strong>*</strong> wajib diisi.
            </div>

            @if ($errors->any())
                <div class="info" style="background:#fef2f2; border-left-color:#dc2626; color:#991b1b;">
                    <strong>Terjadi kesalahan:</strong>

                    <ul style="margin-top:8px; margin-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Ekskul --}}
                <div class="form-group">
                    <label for="nama_ekskul">
                        Nama Ekstrakurikuler <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_ekskul"
                        name="nama_ekskul"
                        value="{{ old('nama_ekskul') }}"
                        placeholder="Contoh: Futsal"
                        required
                    >

                    @error('nama_ekskul')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi ekstrakurikuler..."
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pembina --}}
                <div class="form-group">
                    <label for="pembina_id">
                        Pembina
                    </label>

                    <select id="pembina_id" name="pembina_id">
                        <option value="">-- Pilih Pembina --</option>

                        @foreach ($pembina as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ old('pembina_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->name }}
                                @if ($item->email)
                                    - {{ $item->email }}
                                @endif
                            </option>
                        @endforeach
                    </select>

                    @error('pembina_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jadwal dan Jam --}}
                <div class="row">

                    <div class="form-group">
                        <label for="jadwal">
                            Hari / Jadwal
                        </label>

                        <input
                            type="text"
                            id="jadwal"
                            name="jadwal"
                            value="{{ old('jadwal') }}"
                            placeholder="Contoh: Jumat"
                        >

                        @error('jadwal')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jam">
                            Jam
                        </label>

                        <input
                            type="text"
                            id="jam"
                            name="jam"
                            value="{{ old('jam') }}"
                            placeholder="Contoh: 15:30 - 17:00"
                        >

                        @error('jam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- Lokasi dan Kuota --}}
                <div class="row">

                    <div class="form-group">
                        <label for="lokasi">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            id="lokasi"
                            name="lokasi"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: Lapangan Sekolah"
                        >

                        @error('lokasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kuota">
                            Kuota
                        </label>

                        <input
                            type="number"
                            id="kuota"
                            name="kuota"
                            value="{{ old('kuota') }}"
                            min="1"
                            placeholder="Contoh: 30"
                        >

                        @error('kuota')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- Persyaratan --}}
                <div class="form-group">
                    <label for="persyaratan">
                        Persyaratan
                    </label>

                    <textarea
                        id="persyaratan"
                        name="persyaratan"
                        placeholder="Contoh: Siswa aktif SMK Budi Bakti Ciwidey"
                    >{{ old('persyaratan') }}</textarea>

                    @error('persyaratan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="form-group">
                    <label for="gambar">
                        Gambar
                    </label>

                    <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept=".jpg,.jpeg,.png,.webp"
                    >

                    @error('gambar')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="actions">

                    <a
                        href="{{ route('admin.ekstrakurikuler') }}"
                        class="btn btn-back"
                    >
                        ← Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        + Simpan Ekstrakurikuler
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>