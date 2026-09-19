<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pendaftar - EKSPLORE</title>

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

        .container {
            width: 92%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-bottom: 8px;
            color: #172b4d;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .pendaftaran-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 18px;
            background: #ffffff;
        }

        .pendaftaran-card h2 {
            margin-bottom: 15px;
            color: #172b4d;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 18px;
        }

        .info-box {
            background: #f8fafc;
            border-radius: 10px;
            padding: 13px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 5px;
            color: #374151;
        }

        .alasan {
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .status-diterima {
            background: #dcfce7;
            color: #166534;
        }

        .status-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 9px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-terima {
            background: #16a34a;
        }

        .btn-terima:hover {
            background: #15803d;
        }

        .btn-tolak {
            background: #dc2626;
        }

        .btn-tolak:hover {
            background: #b91c1c;
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

        @media (max-width: 700px) {
            .container {
                width: 95%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .info {
                grid-template-columns: 1fr;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('pembina.dashboard') }}" class="back">
        ← Kembali ke Dashboard Pembina
    </a>

    <div class="card">

        <h1>Daftar Pendaftar Ekstrakurikuler</h1>

        <p class="subtitle">
            Berikut daftar siswa yang mendaftar ekstrakurikuler yang kamu bina.
        </p>

        {{-- Pesan berhasil --}}
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        @if ($pendaftaran->count() > 0)

            @foreach ($pendaftaran as $data)

                <div class="pendaftaran-card">

                    <h2>
                        {{ $data->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                    </h2>

                    <div class="info">

                        <div class="info-box">
                            <strong>Nama Siswa</strong>
                            {{ $data->nama ?? '-' }}
                        </div>

                        <div class="info-box">
                            <strong>Kelas</strong>
                            {{ $data->kelas ?? '-' }}
                        </div>

                        <div class="info-box">
                            <strong>NIS</strong>
                            {{ $data->nis ?? '-' }}
                        </div>

                        <div class="info-box">
                            <strong>No. HP</strong>
                            {{ $data->no_hp ?? '-' }}
                        </div>

                        <div class="info-box">
                            <strong>Tanggal Pendaftaran</strong>
                            {{ $data->created_at?->format('d-m-Y H:i') ?? '-' }}
                        </div>

                    </div>

                    <div class="alasan">

                        <strong>Alasan Mengikuti Ekskul</strong>

                        <br>

                        {{ $data->alasan ?? '-' }}

                    </div>


                    {{-- Status --}}

                    @if ($data->status === 'menunggu')

                        <span class="status status-menunggu">
                            Menunggu
                        </span>

                    @elseif ($data->status === 'diterima')

                        <span class="status status-diterima">
                            Diterima
                        </span>

                    @elseif ($data->status === 'ditolak')

                        <span class="status status-ditolak">
                            Ditolak
                        </span>

                    @else

                        <span class="status status-menunggu">
                            {{ ucfirst($data->status) }}
                        </span>

                    @endif


                    {{-- Tombol hanya muncul jika masih menunggu --}}

                    @if ($data->status === 'menunggu')

                        <div class="actions">

                            {{-- Tombol Terima --}}

                            <form
                                action="{{ route('pembina.pendaftaran.update', $data->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')

                                <input
                                    type="hidden"
                                    name="status"
                                    value="diterima"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-terima"
                                >
                                    ✓ Terima
                                </button>

                            </form>


                            {{-- Tombol Tolak --}}

                            <form
                                action="{{ route('pembina.pendaftaran.update', $data->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')

                                <input
                                    type="hidden"
                                    name="status"
                                    value="ditolak"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-tolak"
                                >
                                    ✕ Tolak
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            @endforeach

        @else

            <div class="empty">

                <h2>Belum Ada Pendaftar</h2>

                <p>
                    Saat ini belum ada siswa yang mendaftar
                    ke ekstrakurikuler yang kamu bina.
                </p>

            </div>

        @endif

    </div>

</div>

</body>

</html>