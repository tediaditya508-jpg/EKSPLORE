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

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .member {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .member:last-child {
            border-bottom: none;
        }

        .member-info h3 {
            margin-bottom: 6px;
        }

        .member-info p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 4px;
        }

        .status {
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

        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
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

        @media (max-width: 600px) {
            .member {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
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
            <strong>{{ $ekskul->count() }}</strong>
        </div>

        <div class="summary-card">
            <span>Total Anggota Aktif</span>
            <strong>{{ $anggota->count() }}</strong>
        </div>

    </div>

    @forelse ($ekskul as $item)

        <div class="card">

            <h2>{{ $item->nama_ekskul }}</h2>

            @php
                $anggotaEkskul = $anggota->where('ekskul_id', $item->id);
            @endphp

            @forelse ($anggotaEkskul as $member)

                <div class="member">

                    <div class="member-info">

                        <h3>
                            {{ $member->siswa->nama ?? $member->siswa->name ?? 'Nama tidak tersedia' }}
                        </h3>

                        <p>
                            Email:
                            {{ $member->siswa->email ?? '-' }}
                        </p>

                        <p>
                            Tanggal Bergabung:
                            {{ $member->tanggal_daftar
                                ? \Carbon\Carbon::parse($member->tanggal_daftar)->translatedFormat('d F Y')
                                : '-' }}
                        </p>

                    </div>

                    <span class="status">
                        {{ ucfirst($member->status) }}
                    </span>

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