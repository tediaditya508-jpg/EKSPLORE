<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengumuman - EKSPLORE</title>

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
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 20px 0;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
        }

        .back-button {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .page {
            padding: 35px 0 50px;
        }

        .page-title {
            margin-bottom: 8px;
            font-size: 30px;
        }

        .page-description {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .announcement-list {
            display: grid;
            gap: 18px;
        }

        .announcement-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .announcement-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #111827;
        }

        /* ================================
           EKSTRAKURIKULER
        ================================= */

        .announcement-ekskul {
            display: inline-block;
            margin-bottom: 8px;
            padding: 6px 10px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: bold;
        }

        /* ================================
           PEMBINA
        ================================= */

        .announcement-pembina {
            display: block;
            margin-bottom: 12px;
            color: #6b7280;
            font-size: 13px;
        }

        .announcement-date {
            display: inline-block;
            font-size: 13px;
            color: #2563eb;
            background: #eff6ff;
            padding: 6px 10px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .announcement-content {
            color: #4b5563;
            line-height: 1.7;
            white-space: pre-line;
        }

        .empty {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 50px 20px;
            text-align: center;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        @media (max-width: 600px) {

            .container {
                width: 92%;
            }

            .header-content {
                align-items: flex-start;
            }

            .page-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="container header-content">

            <div class="logo">
                EKSPLORE
            </div>

            <a href="{{ route('dashboard') }}" class="back-button">
                ← Kembali
            </a>

        </div>
    </header>


    <main class="page">

        <div class="container">

            <h1 class="page-title">
                📢 Semua Pengumuman
            </h1>

            <p class="page-description">
                Informasi terbaru mengenai kegiatan ekstrakurikuler sekolah.
            </p>


            <div class="announcement-list">

                @forelse ($pengumuman as $item)

                    <div class="announcement-card">

                        <!-- JUDUL -->
                        <h2 class="announcement-title">
                            {{ $item->judul }}
                        </h2>


                        <!-- EKSTRAKURIKULER -->
                        <span class="announcement-ekskul">
                            🎯
                            {{ $item->ekstrakurikuler?->nama_ekskul ?? 'Ekskul tidak ditemukan' }}
                        </span>


                        <!-- PEMBINA -->
                        <span class="announcement-pembina">
                            👨‍🏫
                            Pembina:
                            {{ $item->ekstrakurikuler?->pembina?->name ?? 'Belum ditentukan' }}
                        </span>


                        <!-- TANGGAL -->
                        <span class="announcement-date">
                            📅
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </span>


                        <!-- ISI -->
                        <p class="announcement-content">
                            {{ $item->isi }}
                        </p>

                    </div>

                @empty

                    <div class="empty">

                        <div class="empty-icon">
                            📢
                        </div>

                        <h3>
                            Belum Ada Pengumuman
                        </h3>

                        <p style="margin-top: 8px;">
                            Saat ini belum ada pengumuman yang tersedia.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>

</body>
</html>