<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Pembina - EKSPLORE</title>

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

        .ekskul-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        .ekskul-title {
            margin-bottom: 20px;
            color: #172b4d;
        }

        .anggota-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 15px;
            background: #ffffff;
        }

        .anggota-card h3 {
            margin-bottom: 15px;
            color: #172b4d;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #374151;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            background: white;
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
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

        .btn-simpan {
            background: #2563eb;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
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

        /* REKAP */

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

        /* RIWAYAT */

        .riwayat {
            margin-top: 35px;
        }

        .riwayat-item {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 15px;
            background: #ffffff;
        }

        .riwayat-item h3 {
            color: #172b4d;
            margin-bottom: 12px;
        }

        .riwayat-item p {
            margin-bottom: 8px;
            color: #4b5563;
        }

        .status-hadir {
            color: #166534;
            font-weight: bold;
        }

        .status-izin {
            color: #92400e;
            font-weight: bold;
        }

        .status-sakit {
            color: #1e40af;
            font-weight: bold;
        }

        .status-alpa {
            color: #991b1b;
            font-weight: bold;
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .btn {
                width: 100%;
            }

            .rekap-grid {
                grid-template-columns: 1fr 1fr;
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
            Absensi Pembina
        </div>

    </nav>


    <main class="container">


        <a
            href="{{ route('pembina.dashboard') }}"
            class="back"
        >
            ← Kembali ke Dashboard Pembina
        </a>


        <section class="header">

            <h1>
                📝 Absensi Anggota
            </h1>

            <p>
                Kelola kehadiran siswa dari ekstrakurikuler yang Anda bina.
            </p>

        </section>


        {{-- PESAN BERHASIL --}}

        @if (session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif


        {{-- PESAN ERROR --}}

        @if ($errors->any())

            <div class="error">

                @foreach ($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif


        {{-- FORM ABSENSI --}}

        @forelse ($ekskul as $item)

            <section class="ekskul-card">

                <h2 class="ekskul-title">

                    📚 {{ $item->nama_ekskul }}

                </h2>


                @forelse ($item->anggota->where('status', 'aktif') as $anggota)

                    <div class="anggota-card">

                        <h3>

                            👤
                            {{ $anggota->siswa->name ?? '-' }}

                        </h3>


                        <form
                            action="{{ route('pembina.absensi.store') }}"
                            method="POST"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="anggota_id"
                                value="{{ $anggota->id }}"
                            >


                            <div class="form-grid">


                                {{-- TANGGAL --}}

                                <div class="form-group">

                                    <label>
                                        Tanggal
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal"
                                        value="{{ now()->format('Y-m-d') }}"
                                        required
                                    >

                                </div>


                                {{-- STATUS --}}

                                <div class="form-group">

                                    <label>
                                        Status Kehadiran
                                    </label>

                                    <select
                                        name="status"
                                        required
                                    >

                                        <option value="">
                                            -- Pilih Status --
                                        </option>

                                        <option value="hadir">
                                            Hadir
                                        </option>

                                        <option value="izin">
                                            Izin
                                        </option>

                                        <option value="sakit">
                                            Sakit
                                        </option>

                                        <option value="alpa">
                                            Alpa
                                        </option>

                                    </select>

                                </div>


                                {{-- KETERANGAN --}}

                                <div class="form-group full">

                                    <label>
                                        Keterangan
                                    </label>

                                    <textarea
                                        name="keterangan"
                                        placeholder="Opsional, misalnya alasan izin atau sakit..."
                                    ></textarea>

                                </div>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-simpan"
                            >
                                💾 Simpan Absensi
                            </button>

                        </form>

                    </div>

                @empty

                    <div class="empty">

                        Belum ada anggota aktif pada ekskul ini.

                    </div>

                @endforelse

            </section>

        @empty

            <section class="ekskul-card">

                <div class="empty">

                    <h2>
                        Belum Ada Ekstrakurikuler
                    </h2>

                    <p>
                        Anda belum memiliki ekstrakurikuler yang dibina.
                    </p>

                </div>

            </section>

        @endforelse


        {{-- ========================================================= --}}
        {{-- REKAP ABSENSI --}}
        {{-- ========================================================= --}}

        <section class="ekskul-card">

            <h2 class="ekskul-title">
                📊 Rekap Absensi
            </h2>


            @php

                $semuaAbsensi = \App\Models\Absensi::with([
                    'anggota.siswa',
                    'anggota.ekstrakurikuler'
                ])
                ->whereHas('anggota.ekstrakurikuler', function ($query) use ($pembina) {

                    $query->where(
                        'pembina_id',
                        $pembina->id
                    );

                })
                ->get();

                $jumlahHadir = $semuaAbsensi
                    ->where('status', 'hadir')
                    ->count();

                $jumlahIzin = $semuaAbsensi
                    ->where('status', 'izin')
                    ->count();

                $jumlahSakit = $semuaAbsensi
                    ->where('status', 'sakit')
                    ->count();

                $jumlahAlpa = $semuaAbsensi
                    ->where('status', 'alpa')
                    ->count();

            @endphp


            <div class="rekap-grid">


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

            </div>


            <p style="color:#6b7280;">

                Total data absensi:
                <strong>
                    {{ $semuaAbsensi->count() }}
                </strong>

            </p>

        </section>


        {{-- ========================================================= --}}
        {{-- RIWAYAT ABSENSI --}}
        {{-- ========================================================= --}}

        <section class="ekskul-card riwayat">

            <h2 class="ekskul-title">
                📋 Riwayat Absensi
            </h2>


            @php

                $riwayatAbsensi = $semuaAbsensi
                    ->sortByDesc(function ($absensi) {
                        return $absensi->tanggal;
                    });

            @endphp


            @forelse ($riwayatAbsensi as $absensi)

                <div class="riwayat-item">


                    <h3>

                        👤
                        {{ $absensi->anggota->siswa->name ?? '-' }}

                    </h3>


                    <p>

                        <strong>
                            📚 Ekskul:
                        </strong>

                        {{ $absensi->anggota->ekstrakurikuler->nama_ekskul ?? '-' }}

                    </p>


                    <p>

                        <strong>
                            📅 Tanggal:
                        </strong>

                        {{ $absensi->tanggal?->format('d-m-Y') ?? '-' }}

                    </p>


                    <p>

                        <strong>
                            Status:
                        </strong>


                        @if ($absensi->status === 'hadir')

                            <span class="status-hadir">
                                ✅ Hadir
                            </span>

                        @elseif ($absensi->status === 'izin')

                            <span class="status-izin">
                                🟡 Izin
                            </span>

                        @elseif ($absensi->status === 'sakit')

                            <span class="status-sakit">
                                🔵 Sakit
                            </span>

                        @elseif ($absensi->status === 'alpa')

                            <span class="status-alpa">
                                ❌ Alpa
                            </span>

                        @else

                            {{ ucfirst($absensi->status) }}

                        @endif

                    </p>


                    @if ($absensi->keterangan)

                        <p>

                            <strong>
                                📝 Keterangan:
                            </strong>

                            {{ $absensi->keterangan }}

                        </p>

                    @endif


                </div>

            @empty

                <div class="empty">

                    Belum ada riwayat absensi.

                </div>

            @endforelse

        </section>


    </main>

</body>

</html>