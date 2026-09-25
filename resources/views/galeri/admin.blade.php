<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri Admin - EKSPLORE</title>

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
            opacity: 0.8;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .top p {
            color: #6b7280;
            font-size: 14px;
        }

        .back {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        .back:hover {
            background: #1d4ed8;
        }

        .message {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .galeri-card {
            background: white;
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
            margin-bottom: 10px;
        }

        .tanggal {
            color: #9ca3af;
            font-size: 12px;
        }

        .empty {
            background: white;
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
            .navbar {
                padding: 15px 20px;
            }

            .container {
                margin-top: 20px;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .galeri-grid {
                grid-template-columns: 1fr;
            }

            .top h1 {
                font-size: 25px;
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
            Galeri Admin
        </div>

    </nav>


    <main class="container">

        <div class="top">

            <div>
                <h1>Galeri Kegiatan</h1>

                <p>
                    Lihat seluruh dokumentasi kegiatan ekstrakurikuler.
                </p>
            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="back"
            >
                ← Dashboard Admin
            </a>

        </div>


        @if ($errors->any())

            <div class="message error">

                @foreach ($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif


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
                                Ditambahkan:
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
                    Belum ada dokumentasi kegiatan ekstrakurikuler.
                </p>

            </div>

        @endif

    </main>

</body>
</html>