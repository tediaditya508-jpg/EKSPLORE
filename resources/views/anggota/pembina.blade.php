<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Anggota Ekskul - EKSPLORE</title>

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
            margin: 40px auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .summary-card span {
            display: block;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .summary-card strong {
            font-size: 28px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card-title {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .member {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .member:last-child {
            margin-bottom: 0;
        }

        .member h3 {
            margin-bottom: 15px;
            font-size: 19px;
        }

        .info {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 8px;
            font-size: 14px;
        }

        .label {
            color: #6b7280;
        }

        .value {
            font-weight: 500;
        }

        .status {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        @media (max-width: 600px) {

            .summary {
                grid-template-columns: 1fr;
            }

            .info {
                grid-template-columns: 1fr;
                gap: 3px;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('pembina.dashboard') }}" class="back">
        ← Kembali ke Dashboard
    </a>


    <div class="header">

        <h1>Anggota Ekskul</h1>

        <p>
            Daftar siswa yang menjadi anggota aktif ekstrakurikuler yang Anda bina.
        </p>

    </div>


    <div class="summary">

        <div class="summary-card">

            <span>Total Ekskul Dibina</span>

            <strong>
                {{ $ekskul->count() }}
            </strong>

        </div>


        <div class="summary-card">

            <span>Total Anggota Aktif</span>

            <strong>
                {{ $anggota->count() }}
            </strong>

        </div>

    </div>


    @forelse ($ekskul as $item)

        <div class="card">

            <h2 class="card-title">
                📚 {{ $item->nama_ekskul }}
            </h2>


            @php
                $anggotaEkskul = $anggota->where('ekskul_id', $item->id);
            @endphp


            @forelse ($anggotaEkskul as $member)

                <div class="member">

                    <h3>
                        👤 {{ $member->siswa->nama ?? $member->siswa->name ?? 'Nama tidak tersedia' }}
                    </h3>


                    <div class="info">

                        <div class="label">
                            Ekskul yang diikuti
                        </div>

                        <div class="value">
                            {{ $member->ekstrakurikuler->nama_ekskul ?? $item->nama_ekskul }}
                        </div>


                        <div class="label">
                            Email
                        </div>

                        <div class="value">
                            {{ $member->siswa->email ?? '-' }}
                        </div>


                        <div class="label">
                            Tanggal Bergabung
                        </div>

                        <div class="value">
                            {{ $member->tanggal_daftar
                                ? \Carbon\Carbon::parse($member->tanggal_daftar)->translatedFormat('d F Y')
                                : '-' }}
                        </div>


                        <div class="label">
                            Status
                        </div>

                        <div class="value">
                            <span class="status">
                                {{ ucfirst($member->status) }}
                            </span>
                        </div>

                    </div>

                </div>

            @empty

                <div class="empty">
                    Belum ada anggota aktif pada ekskul ini.
                </div>

            @endforelse

        </div>

    @empty

        <div class="card">

            <div class="empty">
                Anda belum memiliki ekstrakurikuler yang dibina.
            </div>

        </div>

    @endforelse

</div>

</body>
</html>