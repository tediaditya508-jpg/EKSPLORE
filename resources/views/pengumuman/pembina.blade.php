<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengumuman Pembina - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 18px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .tanggal {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .isi {
            line-height: 1.7;
            white-space: pre-line;
        }

        .gambar {
            width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 15px;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        @media (max-width: 700px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>📢 Pengumuman</h1>
            <p>
                Kelola pengumuman kegiatan ekstrakurikuler.
            </p>
        </div>

        <a href="{{ route('pembina.pengumuman.create') }}"
           class="btn btn-primary">
            + Tambah Pengumuman
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    @forelse($pengumuman as $item)

        <div class="card">

            <h2>
                {{ $item->judul }}
            </h2>

            <div class="tanggal">
                📅
                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
            </div>

            <div class="isi">
                {{ $item->isi }}
            </div>

            @if($item->gambar)
                <img
                    src="{{ $item->gambar }}"
                    alt="{{ $item->judul }}"
                    class="gambar"
                >
            @endif

        </div>

    @empty

        <div class="card empty">
            <h2>Belum ada pengumuman</h2>
            <p>
                Silakan tambahkan pengumuman baru.
            </p>

            <a href="{{ route('pembina.pengumuman.create') }}"
               class="btn btn-primary">
                + Tambah Pengumuman
            </a>
        </div>

    @endforelse

</div>

</body>
</html>