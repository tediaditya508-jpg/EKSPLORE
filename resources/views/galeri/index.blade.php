<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - EKSPLORE</title>

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

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .galeri-card {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
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

        .galeri-content h3 {
            font-size: 17px;
            margin-bottom: 8px;
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
        }

        .tanggal {
            color: #9ca3af;
            font-size: 12px;
            margin-top: 12px;
        }

        .empty {
            background: #ffffff;
            border: 1px dashed #d1d5db;
            border-radius: 14px;
            padding: 50px 20px;
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
            <a href="{{ route('dashboard') }}" class="back">
                ← Kembali
            </a>

            <div class="logo">
                EKSPLORE
            </div>
        </div>

        <div>
            {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}
        </div>
    </header>

    <main class="container">

        <section class="title-section">
            <h1>Galeri Kegiatan</h1>
            <p>
                Dokumentasi kegiatan ekstrakurikuler di SMK Budi Bakti Ciwidey.
            </p>
        </section>

        @if ($galeri->count() > 0)

            <div class="galeri-grid">

                @foreach ($galeri as $item)

                    <div class="galeri-card">

                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->keterangan ?? 'Galeri kegiatan' }}"
                            class="galeri-image"
                        >

                        <div class="galeri-content">

                            @if ($item->ekstrakurikuler)
                                <div class="ekskul">
                                    {{ $item->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                                </div>
                            @endif

                            <h3>
                                Dokumentasi Kegiatan
                            </h3>

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

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>Belum Ada Galeri</h3>
                <p>
                    Belum ada dokumentasi kegiatan ekstrakurikuler yang tersedia.
                </p>
            </div>

        @endif

    </main>

</body>
</html>