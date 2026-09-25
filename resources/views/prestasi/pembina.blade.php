<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prestasi Ekstrakurikuler - EKSPLORE</title>

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
            max-width: 1100px;
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

        .grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-bottom: 20px;
            color: #111827;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #111827;
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .button {
            width: 100%;
            border: none;
            background: #111827;
            color: white;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            background: #374151;
        }

        .prestasi-item {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 15px;
        }

        .prestasi-item:last-child {
            margin-bottom: 0;
        }

        .prestasi-item h3 {
            margin-bottom: 10px;
            color: #111827;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #eef2ff;
            color: #3730a3;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        .empty {
            color: #6b7280;
            text-align: center;
            padding: 30px 10px;
        }

        .ekskul-title {
            margin-top: 25px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        .ekskul-title:first-child {
            margin-top: 0;
        }

        /* TOMBOL AKSI */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .edit-button,
        .delete-button,
        .cancel-button,
        .save-edit-button {
            border: none;
            padding: 9px 15px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-button {
            background: #2563eb;
            color: white;
        }

        .edit-button:hover {
            background: #1d4ed8;
        }

        .delete-button {
            background: #dc2626;
            color: white;
        }

        .delete-button:hover {
            background: #b91c1c;
        }

        .cancel-button {
            background: #6b7280;
            color: white;
        }

        .cancel-button:hover {
            background: #4b5563;
        }

        .save-edit-button {
            background: #16a34a;
            color: white;
        }

        .save-edit-button:hover {
            background: #15803d;
        }

        /* FORM EDIT */
        .edit-form {
            display: none;
            margin-top: 18px;
            padding: 18px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .edit-form.active {
            display: block;
        }

        .edit-form-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .edit-actions {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        @media (max-width: 850px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            EKSPLORE
        </div>

        <a
            href="{{ route('pembina.dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>

    </nav>


    <main class="container">

        <section class="header">

            <h1>
                🏆 Prestasi Ekstrakurikuler
            </h1>

            <p>
                Halo, {{ $pembina->name }}.
                Kelola dan tambahkan prestasi dari ekstrakurikuler
                yang Anda bina.
            </p>

        </section>


        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif


        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>

                <ul style="margin-top: 8px; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <section class="grid">

            {{-- FORM TAMBAH PRESTASI --}}
            <div class="card">

                <h2>
                    ➕ Tambah Prestasi
                </h2>

                <form
                    action="{{ route('pembina.prestasi.store') }}"
                    method="POST"
                >

                    @csrf

                    <div class="form-group">

                        <label for="ekskul_id">
                            Ekstrakurikuler
                        </label>

                        <select
                            name="ekskul_id"
                            id="ekskul_id"
                            required
                        >

                            <option value="">
                                -- Pilih Ekstrakurikuler --
                            </option>

                            @foreach ($ekskul as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('ekskul_id') == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_ekskul }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="nama_prestasi">
                            Nama Prestasi
                        </label>

                        <input
                            type="text"
                            name="nama_prestasi"
                            id="nama_prestasi"
                            value="{{ old('nama_prestasi') }}"
                            placeholder="Contoh: Juara 1 Lomba Futsal"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="tingkat">
                            Tingkat
                        </label>

                        <select
                            name="tingkat"
                            id="tingkat"
                            required
                        >

                            <option value="">
                                -- Pilih Tingkat --
                            </option>

                            <option
                                value="Sekolah"
                                {{ old('tingkat') == 'Sekolah' ? 'selected' : '' }}
                            >
                                Sekolah
                            </option>

                            <option
                                value="Kecamatan"
                                {{ old('tingkat') == 'Kecamatan' ? 'selected' : '' }}
                            >
                                Kecamatan
                            </option>

                            <option
                                value="Kabupaten"
                                {{ old('tingkat') == 'Kabupaten' ? 'selected' : '' }}
                            >
                                Kabupaten
                            </option>

                            <option
                                value="Provinsi"
                                {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}
                            >
                                Provinsi
                            </option>

                            <option
                                value="Nasional"
                                {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}
                            >
                                Nasional
                            </option>

                            <option
                                value="Internasional"
                                {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}
                            >
                                Internasional
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            value="{{ old('tanggal') }}"
                        >

                    </div>


                    <div class="form-group">

                        <label for="lokasi">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            id="lokasi"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: GOR Bandung"
                        >

                    </div>


                    <div class="form-group">

                        <label for="dokumentasi">
                            Dokumentasi
                        </label>

                        <input
                            type="text"
                            name="dokumentasi"
                            id="dokumentasi"
                            value="{{ old('dokumentasi') }}"
                            placeholder="Link atau keterangan dokumentasi"
                        >

                    </div>


                    <button
                        type="submit"
                        class="button"
                    >
                        Simpan Prestasi
                    </button>

                </form>

            </div>


            {{-- DAFTAR PRESTASI --}}
            <div class="card">

                <h2>
                    🏆 Daftar Prestasi
                </h2>


                @if ($ekskul->count() > 0)

                    @foreach ($ekskul as $item)

                        <div class="ekskul-title">

                            <h3>
                                📚 {{ $item->nama_ekskul }}
                            </h3>

                        </div>


                        @if ($item->prestasi->count() > 0)

                            @foreach ($item->prestasi as $prestasi)

                                <div class="prestasi-item">

                                    <span class="badge">
                                        {{ $prestasi->tingkat }}
                                    </span>

                                    <h3>
                                        {{ $prestasi->nama_prestasi }}
                                    </h3>

                                    @if ($prestasi->tanggal)

                                        <p class="info">
                                            📅
                                            <strong>Tanggal:</strong>
                                            {{ $prestasi->tanggal->format('d-m-Y') }}
                                        </p>

                                    @endif


                                    @if ($prestasi->lokasi)

                                        <p class="info">
                                            📍
                                            <strong>Lokasi:</strong>
                                            {{ $prestasi->lokasi }}
                                        </p>

                                    @endif


                                    @if ($prestasi->dokumentasi)

                                        <p class="info">
                                            📎
                                            <strong>Dokumentasi:</strong>
                                            {{ $prestasi->dokumentasi }}
                                        </p>

                                    @endif


                                    {{-- TOMBOL EDIT DAN HAPUS --}}
                                    <div class="action-buttons">

                                        <button
                                            type="button"
                                            class="edit-button"
                                            onclick="toggleEdit({{ $prestasi->id }})"
                                        >
                                            ✏️ Edit
                                        </button>


                                        <form
                                            action="{{ route('pembina.prestasi.destroy', $prestasi->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-button"
                                            >
                                                🗑️ Hapus
                                            </button>

                                        </form>

                                    </div>


                                    {{-- FORM EDIT --}}
                                    <div
                                        id="edit-form-{{ $prestasi->id }}"
                                        class="edit-form"
                                    >

                                        <div class="edit-form-title">
                                            ✏️ Edit Prestasi
                                        </div>


                                        <form
                                            action="{{ route('pembina.prestasi.update', $prestasi->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PUT')


                                            <div class="form-group">

                                                <label>
                                                    Nama Prestasi
                                                </label>

                                                <input
                                                    type="text"
                                                    name="nama_prestasi"
                                                    value="{{ $prestasi->nama_prestasi }}"
                                                    required
                                                >

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Tingkat
                                                </label>

                                                <select
                                                    name="tingkat"
                                                    required
                                                >

                                                    <option
                                                        value="Sekolah"
                                                        {{ $prestasi->tingkat == 'Sekolah' ? 'selected' : '' }}
                                                    >
                                                        Sekolah
                                                    </option>

                                                    <option
                                                        value="Kecamatan"
                                                        {{ $prestasi->tingkat == 'Kecamatan' ? 'selected' : '' }}
                                                    >
                                                        Kecamatan
                                                    </option>

                                                    <option
                                                        value="Kabupaten"
                                                        {{ $prestasi->tingkat == 'Kabupaten' ? 'selected' : '' }}
                                                    >
                                                        Kabupaten
                                                    </option>

                                                    <option
                                                        value="Provinsi"
                                                        {{ $prestasi->tingkat == 'Provinsi' ? 'selected' : '' }}
                                                    >
                                                        Provinsi
                                                    </option>

                                                    <option
                                                        value="Nasional"
                                                        {{ $prestasi->tingkat == 'Nasional' ? 'selected' : '' }}
                                                    >
                                                        Nasional
                                                    </option>

                                                    <option
                                                        value="Internasional"
                                                        {{ $prestasi->tingkat == 'Internasional' ? 'selected' : '' }}
                                                    >
                                                        Internasional
                                                    </option>

                                                </select>

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Tanggal
                                                </label>

                                                <input
                                                    type="date"
                                                    name="tanggal"
                                                    value="{{ $prestasi->tanggal ? $prestasi->tanggal->format('Y-m-d') : '' }}"
                                                >

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Lokasi
                                                </label>

                                                <input
                                                    type="text"
                                                    name="lokasi"
                                                    value="{{ $prestasi->lokasi }}"
                                                    placeholder="Contoh: GOR Bandung"
                                                >

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Dokumentasi
                                                </label>

                                                <input
                                                    type="text"
                                                    name="dokumentasi"
                                                    value="{{ $prestasi->dokumentasi }}"
                                                    placeholder="Link atau keterangan dokumentasi"
                                                >

                                            </div>


                                            <div class="edit-actions">

                                                <button
                                                    type="submit"
                                                    class="save-edit-button"
                                                >
                                                    💾 Simpan Perubahan
                                                </button>

                                                <button
                                                    type="button"
                                                    class="cancel-button"
                                                    onclick="toggleEdit({{ $prestasi->id }})"
                                                >
                                                    Batal
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        @else

                            <div class="empty">
                                Belum ada prestasi untuk ekstrakurikuler ini.
                            </div>

                        @endif

                    @endforeach

                @else

                    <div class="empty">
                        Belum ada ekstrakurikuler yang ditugaskan kepada Anda.
                    </div>

                @endif

            </div>

        </section>

    </main>


    <script>

        function toggleEdit(id) {

            const form = document.getElementById('edit-form-' + id);

            if (form.classList.contains('active')) {
                form.classList.remove('active');
            } else {
                form.classList.add('active');
            }

        }

    </script>

</body>
</html>