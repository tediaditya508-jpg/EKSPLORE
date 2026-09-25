<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Prestasi - EKSPLORE</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {
            background: #f5f7fb;
            color: #111827;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            background: #2563eb;
            color: white;

            padding: 20px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }


        .back-button {
            background: rgba(255,255,255,.15);

            color: white;

            text-decoration: none;

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 13px;

            transition: .2s;
        }


        .back-button:hover {
            background: rgba(255,255,255,.25);
        }


        .header h1 {
            font-size: 22px;
        }


        .header-user {
            font-size: 13px;
            opacity: .9;
        }


        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1100px;

            margin: 35px auto;

            padding: 0 20px;
        }


        /* =========================
           INTRO
        ========================= */

        .intro {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            padding: 25px;

            margin-bottom: 25px;

            box-shadow:
                0 4px 15px rgba(0,0,0,.04);
        }


        .intro h2 {
            margin-bottom: 8px;

            font-size: 21px;
        }


        .intro p {
            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;
        }


        /* =========================
           GRID
        ========================= */

        .prestasi-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        /* =========================
           CARD
        ========================= */

        .prestasi-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            padding: 22px;

            transition: .2s;

            box-shadow:
                0 4px 15px rgba(0,0,0,.04);
        }


        .prestasi-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 8px 22px rgba(0,0,0,.08);

            border-color: #bfdbfe;
        }


        .prestasi-icon {
            width: 55px;
            height: 55px;

            border-radius: 14px;

            background: #eff6ff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;

            margin-bottom: 17px;
        }


        .prestasi-card h3 {
            font-size: 17px;

            margin-bottom: 10px;

            color: #111827;
        }


        .ekskul {
            display: inline-block;

            background: #eff6ff;

            color: #2563eb;

            padding: 6px 10px;

            border-radius: 7px;

            font-size: 12px;

            font-weight: bold;

            margin-bottom: 13px;
        }


        .detail {
            display: flex;

            flex-direction: column;

            gap: 8px;

            color: #6b7280;

            font-size: 13px;
        }


        .detail strong {
            color: #374151;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            text-align: center;

            padding: 60px 20px;

            color: #9ca3af;

            box-shadow:
                0 4px 15px rgba(0,0,0,.04);
        }


        .empty-icon {
            font-size: 45px;

            margin-bottom: 15px;
        }


        .empty h3 {
            color: #374151;

            margin-bottom: 8px;
        }


        .empty p {
            font-size: 13px;

            line-height: 1.6;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .prestasi-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 600px) {

            .header {
                padding: 16px 20px;
            }


            .header-user {
                display: none;
            }


            .prestasi-grid {
                grid-template-columns: 1fr;
            }


            .container {
                margin-top: 25px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================
         HEADER
    ========================= --}}

    <header class="header">

        <div class="header-left">

            <a
                href="{{ route('dashboard') }}"
                class="back-button"
            >
                ← Kembali
            </a>

            <h1>
                🏆 Prestasi
            </h1>

        </div>


        <div class="header-user">

            {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}

        </div>

    </header>



    {{-- =========================
         CONTENT
    ========================= --}}

    <main class="container">


        {{-- INTRO --}}

        <section class="intro">

            <h2>
                🏆 Prestasi Ekstrakurikuler
            </h2>

            <p>

                Lihat berbagai prestasi yang
                telah diraih oleh ekstrakurikuler
                SMK Budi Bakti Ciwidey.

            </p>

        </section>



        {{-- =========================
             DATA PRESTASI
        ========================= --}}

        @if($prestasi->count() > 0)

            <div class="prestasi-grid">


                @foreach($prestasi as $item)

                    <div class="prestasi-card">


                        <div class="prestasi-icon">
                            🏆
                        </div>


                        <span class="ekskul">

                            {{
                                $item->ekstrakurikuler->nama_ekskul
                                ?? 'Ekstrakurikuler'
                            }}

                        </span>


                        <h3>

                            {{ $item->nama_prestasi }}

                        </h3>


                        <div class="detail">


                            @if($item->tingkat)

                                <div>

                                    🥇

                                    <strong>
                                        Tingkat:
                                    </strong>

                                    {{ $item->tingkat }}

                                </div>

                            @endif


                            @if($item->tanggal)

                                <div>

                                    📅

                                    <strong>
                                        Tanggal:
                                    </strong>

                                    {{
                                        \Carbon\Carbon::parse(
                                            $item->tanggal
                                        )->format('d M Y')
                                    }}

                                </div>

                            @endif


                            @if($item->lokasi)

                                <div>

                                    📍

                                    <strong>
                                        Lokasi:
                                    </strong>

                                    {{ $item->lokasi }}

                                </div>

                            @endif


                            @if($item->dokumentasi)

                                <div>

                                    📷

                                    <strong>
                                        Dokumentasi:
                                    </strong>

                                    {{ $item->dokumentasi }}

                                </div>

                            @endif


                        </div>


                    </div>

                @endforeach


            </div>


        @else


            {{-- =========================
                 DATA KOSONG
            ========================= --}}

            <div class="empty">

                <div class="empty-icon">
                    🏆
                </div>


                <h3>
                    Belum Ada Prestasi
                </h3>


                <p>

                    Saat ini belum ada data prestasi
                    ekstrakurikuler yang tersedia.

                </p>

            </div>


        @endif


    </main>


</body>

</html>