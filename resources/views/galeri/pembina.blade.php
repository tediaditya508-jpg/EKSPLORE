<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri Pembina - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1f2937;
        }

        .header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back {
            text-decoration: none;
            color: #374151;
            font-size: 14px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }

        .user-name {
            font-size: 14px;
            color: #374151;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .title-section {
            margin-bottom: 25px;
        }

        .title-section h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .title-section p {
            color: #6b7280;
            font-size: 15px;
        }

        .message {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .form-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .form-card h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
        }

        .form-group select:focus,
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn-submit {
            border: none;
            background: #2563eb;
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background: #1d4ed8;
        }

        .gallery-title {
            font-size: 22px;
            margin-bottom: 18px;
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .galeri-card {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .galeri-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            background: #e5e7eb;
        }

        .galeri-content {
            padding: 16px;
        }

        .ekskul {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .keterangan {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 14px;
        }

        .tanggal {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 14px;
        }

        .btn-delete {
            width: 100%;
            border: none;
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .empty {
            background: #ffffff;
            border: 1px dashed #d1d5db;
            border-radius: 14px;
            padding: 45px 20px;
            text-align: center;
            color: #6b7280;
        }

        @media (max-width: 900px) {
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .header {
                padding: 15px 18px;
            }

            .container {
                margin-top: 20px;
            }

            .galeri-grid {
                grid-template-columns: 1fr;
            }

            .title-section h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="header-left">

        <a href="{{ route('pembina.dashboard') }}" class="back">
            ← Kembali
        </a>

        <div class="logo">
            EKSPLORE
        </div>

    </div>

    <div class="user-name">
        {{ $pembina->name ?? $pembina->nama ?? 'Pembina' }}
    </div>

</header>

<main class="container">

    <section class="title-section">

        <h1>Galeri Kegiatan</h1>

        <p>
            Kelola dokumentasi kegiatan ekstrakurikuler yang kamu bina.
        </p>

    </section>


    {{-- PESAN BERHASIL --}}

    @if (session('success'))

        <div class="message success">
            {{ session('success') }}
        </div>

    @endif


    {{-- PESAN ERROR --}}

    @if ($errors->any())

        <div class="message error">

            @foreach ($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


    {{-- FORM TAMBAH GALERI --}}

    <section class="form-card">

        <h2>Tambah Dokumentasi</h2>

        <form
            action="{{ route('pembina.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data"
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

                        <option value="{{ $item->id }}">
                            {{ $item->nama_ekskul ?? 'Ekstrakurikuler' }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="form-group">

                <label for="gambar">
                    Foto Dokumentasi
                </label>

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >

            </div>


            <div class="form-group">

                <label for="keterangan">
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    id="keterangan"
                    placeholder="Contoh: Kegiatan latihan futsal bersama anggota."
                ></textarea>

            </div>


            <button
                type="submit"
                class="btn-submit"
            >
                + Tambah Galeri
            </button>

        </form>

    </section>


    {{-- DAFTAR GALERI --}}

    <section>

        <h2 class="gallery-title">
            Dokumentasi Saya
        </h2>


        @if ($galeri->count() > 0)

            <div class="galeri-grid">

                @foreach ($galeri as $item)

                    <div class="galeri-card">

                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->keterangan ?? 'Dokumentasi kegiatan' }}"
                            class="galeri-image"
                        >

                        <div class="galeri-content">

                            @if ($item->ekstrakurikuler)

                                <div class="ekskul">
                                    {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                                </div>

                            @endif


                            @if ($item->keterangan)

                                <p class="keterangan">
                                    {{ $item->keterangan }}
                                </p>

                            @else

                                <p class="keterangan">
                                    Dokumentasi kegiatan ekstrakurikuler.
                                </p>

                            @endif


                            <p class="tanggal">
                                {{ $item->created_at?->format('d M Y') }}
                            </p>


                            <form
                                action="{{ route('pembina.galeri.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                >
                                    Hapus Foto
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <h3>Belum Ada Dokumentasi</h3>

                <p>
                    Tambahkan foto kegiatan ekstrakurikuler menggunakan form di atas.
                </p>

            </div>

        @endif

    </section>

</main>

</body>
</html>