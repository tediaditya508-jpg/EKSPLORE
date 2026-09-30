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

        /* FORM IZIN / SAKIT */

        .form-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        .form-card h2 {
            color: #172b4d;
            margin-bottom: 8px;
        }

        .form-description {
            color: #6b7280;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            outline: none;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-help {
            display: block;
            margin-top: 6px;
            color: #6b7280;
            font-size: 12px;
        }

        .btn-ajukan {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 13px 18px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-ajukan:hover {
            background: #1d4ed8;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error ul {
            margin-left: 20px;
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

        /* NILAI */

        .nilai-box {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 5px;
            padding: 8px 14px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
        }

        .nilai-label {
            color: #374151;
            font-weight: bold;
        }

        .nilai {
            color: #1d4ed8;
            font-size: 18px;
            font-weight: bold;
        }

        .nilai-belum {
            color: #6b7280;
            font-size: 14px;
            font-style: italic;
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

            .card,
            .form-card {
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
                Lihat riwayat kehadiran dan nilai kamu pada kegiatan ekstrakurikuler.
            </p>

        </section>


        {{-- PESAN BERHASIL --}}

        @if (session('success'))

            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>

        @endif


        {{-- PESAN ERROR --}}

        @if ($errors->any())

            <div class="alert-error">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach
                </ul>

            </div>

        @endif


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


        {{-- FORM AJUKAN IZIN / SAKIT --}}

        <section class="form-card">

            <h2>
                📝 Ajukan Izin / Sakit
            </h2>

            <p class="form-description">
                Jika kamu tidak dapat mengikuti kegiatan ekstrakurikuler,
                kamu dapat mengajukan izin atau sakit kepada pembina.
            </p>


            <form
                action="{{ route('kehadiran.storeSiswa') }}"
                method="POST"
            >

                @csrf


                <div class="form-group">

                    <label for="anggota_id">
                        📚 Ekstrakurikuler
                    </label>

                    <select
                        name="anggota_id"
                        id="anggota_id"
                        required
                    >

                        <option value="">
                            -- Pilih Ekstrakurikuler --
                        </option>

                        @foreach ($absensi->pluck('anggota')->filter()->unique('id') as $anggota)

                            <option
                                value="{{ $anggota->id }}"
                            >
                                {{ $anggota->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                            </option>

                        @endforeach

                    </select>

                    <small class="form-help">
                        Pilih ekstrakurikuler yang ingin kamu ajukan izin atau sakit.
                    </small>

                </div>


                <div class="form-group">

                    <label for="tanggal">
                        📅 Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        id="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="status">
                        📌 Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                    >

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option value="izin" {{ old('status') === 'izin' ? 'selected' : '' }}>
                            🟡 Izin
                        </option>

                        <option value="sakit" {{ old('status') === 'sakit' ? 'selected' : '' }}>
                            🔵 Sakit
                        </option>

                    </select>

                    <small class="form-help">
                        Siswa hanya dapat mengajukan Izin atau Sakit.
                    </small>

                </div>


                <div class="form-group">

                    <label for="keterangan">
                        📝 Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        placeholder="Contoh: Tidak dapat mengikuti kegiatan karena ada keperluan keluarga."
                        required
                    >{{ old('keterangan') }}</textarea>

                    <small class="form-help">
                        Jelaskan alasan izin atau sakit secara singkat.
                    </small>

                </div>


                <button
                    type="submit"
                    class="btn-ajukan"
                >
                    📤 Ajukan Izin / Sakit
                </button>

            </form>

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


                    {{-- NILAI --}}

                    @if ($item->nilai !== null)

                        <p>

                            <strong>
                                🎯 Nilai:
                            </strong>

                            <span class="nilai-box">

                                <span class="nilai-label">
                                    Nilai
                                </span>

                                <span class="nilai">
                                    {{ $item->nilai }}
                                </span>

                            </span>

                        </p>

                    @elseif ($item->status === 'hadir')

                        <p>

                            <strong>
                                🎯 Nilai:
                            </strong>

                            <span class="nilai-belum">
                                Belum diberikan
                            </span>

                        </p>

                    @endif


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