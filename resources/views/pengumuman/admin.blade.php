<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pengumuman - Admin | EKSPLORE</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
            line-height: 1.6;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 18px;
            flex-wrap: wrap;
        }

        .back,
        .add {
            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        .back {
            background: #2563eb;
        }

        .back:hover {
            background: #1d4ed8;
        }

        .add {
            background: #16a34a;
        }

        .add:hover {
            background: #15803d;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
        }

        .list {
            display: grid;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            font-size: 21px;
            margin-bottom: 10px;
            color: #111827;
        }

        .date {
            display: inline-block;
            margin-bottom: 15px;
            color: #2563eb;
            font-size: 13px;
            font-weight: bold;
        }

        .content {
            color: #4b5563;
            line-height: 1.7;
            white-space: pre-line;
        }

        .image {
            margin-top: 18px;
        }

        .image img {
            width: 100%;
            max-width: 500px;
            max-height: 300px;
            object-fit: cover;
            border-radius: 12px;
        }

        .empty {
            background: white;
            padding: 40px;
            border-radius: 16px;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        @media (max-width: 768px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .header h1 {
                font-size: 24px;
            }

            .buttons {
                flex-direction: column;
            }

            .back,
            .add {
                text-align: center;
            }

        }

    </style>

</head>


<body>

<div class="container">


    {{-- HEADER --}}

    <div class="header">

        <h1>
            📢 Pengumuman
        </h1>

        <p>
            Daftar informasi dan pengumuman
            yang tersedia dalam sistem EKSPLORE.
        </p>


        <div class="buttons">

            {{-- KEMBALI --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="back"
            >
                ← Kembali ke Dashboard
            </a>


            {{-- TAMBAH PENGUMUMAN --}}

            <a
                href="{{ route('admin.pengumuman.create') }}"
                class="add"
            >
                + Tambah Pengumuman
            </a>

        </div>

    </div>


    {{-- PESAN BERHASIL --}}

    @if (session('success'))

        <div class="success">

            ✅ {{ session('success') }}

        </div>

    @endif


    {{-- DATA PENGUMUMAN --}}

    @if ($pengumuman->count() > 0)

        <div class="list">

            @foreach ($pengumuman as $item)

                <div class="card">

                    <h2>
                        {{ $item->judul }}
                    </h2>


                    @if ($item->tanggal)

                        <span class="date">

                            📅
                            {{ $item->tanggal->format('d-m-Y') }}

                        </span>

                    @endif


                    <div class="content">

                        {{ $item->isi }}

                    </div>


                    @if ($item->gambar)

                        <div class="image">

                            <img
                                src="{{ $item->gambar }}"
                                alt="Gambar pengumuman"
                            >

                        </div>

                    @endif

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            📢 Belum ada pengumuman.

        </div>

    @endif


</div>

</body>

</html>