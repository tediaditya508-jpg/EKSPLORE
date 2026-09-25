<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kehadiran Saya - EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
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
            opacity: 0.85;
        }

        .container {
            width: 92%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        .header h1 {
            color: #172b4d;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .rekap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .rekap-box {
            padding: 20px;
            border-radius: 14px;
            text-align: center;
            color: white;
        }

        .rekap-box h3 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .rekap-box .jumlah {
            font-size: 30px;
            font-weight: bold;
        }

        .hadir {
            background: #16a34a;
        }

        .izin {
            background: #d97706;
        }

        .sakit {
            background: #2563eb;
        }

        .alpa {
            background: #dc2626;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #172b4d;
            margin-bottom: 20px;
        }

        .attendance-item {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .attendance-item:last-child {
            margin-bottom: 0;
        }

        .attendance-item h3 {
            color: #172b4d;
            margin-bottom: 12px;
        }

        .attendance-item p {
            margin-bottom: 8px;
            color: #4b5563;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
        }

        .status-hadir {
            background: #dcfce7;
            color: #166534;
        }

        .status-izin {
            background: #fef3c7;
            color: #92400e;
        }

        .status-sakit {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-alpa {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .rekap-grid {
                grid-template-columns: 1fr 1fr;
            }

            .header {
                padding: 22px;
            }

            .card {
                padding: 20px;
            }
        }

        @media (max-width: 450px) {

            .rekap-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
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
            Kehadiran Siswa
        </div>

    </nav>


    <main class="container">

        <a
            href="{{ route('dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>


        <section class="header">

            <h1>
                📋 Kehadiran Saya
            </h1>

            <p>
                Lihat riwayat kehadiran kamu pada kegiatan ekstrakurikuler.
            </p>

        </section>


        {{-- REKAP KEHADIRAN --}}

        <section class="rekap-grid">

            <div class="rekap-box hadir">

                <h3>
                    Hadir
                </h3>

                <div class="jumlah">
                    {{ $jumlahHadir }}
                </div>

            </div>


            <div class="rekap-box izin">

                <h3>
                    Izin
                </h3>

                <div class="jumlah">
                    {{ $jumlahIzin }}
                </div>

            </div>


            <div class="rekap-box sakit">

                <h3>
                    Sakit
                </h3>

                <div class="jumlah">
                    {{ $jumlahSakit }}
                </div>

            </div>


            <div class="rekap-box alpa">

                <h3>
                    Alpa
                </h3>

                <div class="jumlah">
                    {{ $jumlahAlpa }}
                </div>

            </div>

        </section>


        {{-- RIWAYAT KEHADIRAN --}}

        <section class="card">

            <h2>
                📅 Riwayat Kehadiran
            </h2>


            @forelse ($absensi as $item)

                <div class="attendance-item">

                    <h3>
                        📚 {{ $item->anggota->ekstrakurikuler->nama_ekskul ?? '-' }}
                    </h3>


                    <p>
                        <strong>
                            📅 Tanggal:
                        </strong>

                        {{ $item->tanggal?->format('d-m-Y') ?? '-' }}
                    </p>


                    <p>
                        <strong>
                            Status:
                        </strong>

                        @if ($item->status === 'hadir')

                            <span class="status status-hadir">
                                ✅ Hadir
                            </span>

                        @elseif ($item->status === 'izin')

                            <span class="status status-izin">
                                🟡 Izin
                            </span>

                        @elseif ($item->status === 'sakit')

                            <span class="status status-sakit">
                                🔵 Sakit
                            </span>

                        @elseif ($item->status === 'alpa')

                            <span class="status status-alpa">
                                ❌ Alpa
                            </span>

                        @else

                            <span class="status">
                                {{ ucfirst($item->status) }}
                            </span>

                        @endif

                    </p>


                    @if ($item->keterangan)

                        <p>
                            <strong>
                                📝 Keterangan:
                            </strong>

                            {{ $item->keterangan }}
                        </p>

                    @endif

                </div>

            @empty

                <div class="empty">

                    <div class="empty-icon">
                        📋
                    </div>

                    <h3>
                        Belum Ada Data Kehadiran
                    </h3>

                    <p>
                        Riwayat kehadiran kamu akan muncul setelah pembina mengisi absensi.
                    </p>

                </div>

            @endforelse

        </section>

    </main>

</body>

</html>