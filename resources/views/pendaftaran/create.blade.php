<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran {{ $ekskul->nama_ekskul }} - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: var(--font-sans);
            background: #f8fafc;
            color: #1e293b;
        }

        .container {
            width: 90%;
            max-width: 800px;
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
            color: #64748b;
            margin-bottom: 25px;
        }

        .info {
            background: #f1f5f9;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .info p {
            margin: 8px 0;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        textarea {
            width: 100%;
            min-height: 150px;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            resize: vertical;
            font-family: var(--font-sans);
            font-size: 14px;
        }

        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            .container {
                width: 94%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')


<div class="container">

    <div class="card">

        <h1>Pendaftaran Ekstrakurikuler</h1>

        <p class="subtitle">
            Silakan lengkapi alasan pendaftaran kamu.
        </p>

        <div class="info">

            <h2>{{ $ekskul->nama_ekskul }}</h2>

            <p>
                <strong>Lokasi:</strong>
                {{ $ekskul->lokasi ?? '-' }}
            </p>

            <p>
                <strong>Jadwal:</strong>
                {{ $ekskul->jadwal ?? '-' }}
            </p>

            <p>
                <strong>Jam:</strong>
                {{ $ekskul->jam ?? '-' }}
            </p>

            <p>
                <strong>Kuota:</strong>
                {{ $ekskul->kuota ?? '-' }}
            </p>

        </div>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('pendaftaran.store', $ekskul->id) }}" method="POST">

            @csrf

            <div>
                <label for="alasan">
                    Alasan Mengikuti Ekstrakurikuler
                </label>

                <textarea
                    name="alasan"
                    id="alasan"
                    placeholder="Tuliskan alasan kamu ingin mengikuti ekstrakurikuler ini..."
                    required
                >{{ old('alasan') }}</textarea>
            </div>

            <div class="buttons">

                <a
                    href="{{ route('ekskul.show', $ekskul->id) }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Kirim Pendaftaran
                </button>

            </div>

        </form>

    </div>

</div>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>