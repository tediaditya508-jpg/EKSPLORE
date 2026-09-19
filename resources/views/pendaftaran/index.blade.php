<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Saya - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .item {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .item h2 {
            margin: 0 0 12px;
        }

        .item p {
            margin: 7px 0;
        }

        .status {
            display: inline-block;
            margin-top: 12px;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-weight: bold;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Pendaftaran Saya</h1>

        <p class="subtitle">
            Berikut daftar ekstrakurikuler yang sudah kamu daftarkan.
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($pendaftaran->count() > 0)

            @foreach ($pendaftaran as $data)

                <div class="item">

                    <h2>
                        {{ $data->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                    </h2>

                    <p>
                        <strong>Nama:</strong>
                        {{ $data->nama }}
                    </p>

                    <p>
                        <strong>Alasan:</strong>
                        {{ $data->alasan }}
                    </p>

                    <p>
                        <strong>Tanggal Daftar:</strong>
                        {{ $data->created_at?->format('d-m-Y H:i') }}
                    </p>

                    <span class="status">
                        Status: {{ ucfirst($data->status) }}
                    </span>

                </div>

            @endforeach

        @else

            <div class="empty">

                <p>
                    Kamu belum memiliki pendaftaran ekstrakurikuler.
                </p>

                <a href="{{ route('ekskul.index') }}" class="btn">
                    Lihat Daftar Ekskul
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>