<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Kelas - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: var(--font-sans);
            background: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 1050px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            color: #1d4ed8;
        }

        .header p {
            color: #64748b;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 14px;
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card, .panel {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
        }

        .card h3 {
            margin: 0 0 10px;
            color: #64748b;
            font-size: 15px;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            color: #2563eb;
        }

        .panel {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 15px;
            margin-bottom: 15px;
        }

        button {
            border: 0;
            padding: 13px 20px;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .success {
            padding: 14px;
            background: #dcfce7;
            color: #166534;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .error {
            color: #dc2626;
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            color: #475569;
            background: #f8fafc;
        }

        .note {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        @media(max-width: 650px) {
            .cards {
                grid-template-columns: 1fr;
            }

            body {
                padding: 16px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')
<div class="container">

    <div class="header">
        <h1>Kenaikan Kelas Siswa</h1>
        <p>EKSPLORE - Sistem Pengelolaan Data Siswa</p>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="cards">
        <div class="card">
            <h3>Total Siswa Aktif</h3>
            <div class="number">{{ $jumlahAktif }}</div>
        </div>

        <div class="card">
            <h3>Total Alumni</h3>
            <div class="number">{{ $jumlahAlumni }}</div>
        </div>
    </div>

    <div class="panel">
        <h2>Proses Kenaikan Kelas</h2>

        <p class="note">
            Kelas 10 naik ke kelas 11, kelas 11 naik ke kelas 12,
            dan kelas 12 menjadi alumni. Jurusan serta nomor rombel
            akan tetap dipertahankan.
        </p>

        <form
            action="{{ route('admin.kenaikan-kelas.proses') }}"
            method="POST"
            onsubmit="return confirm('PERHATIAN! Semua siswa aktif akan diproses naik kelas. Kelas 12 akan menjadi alumni. Apakah kamu yakin ingin melanjutkan?');"
        >
            @csrf

            <label for="tahun_ajaran">Tahun Ajaran</label>

            <input
                type="text"
                id="tahun_ajaran"
                name="tahun_ajaran"
                placeholder="Contoh: 2026/2027"
                value="{{ old('tahun_ajaran') }}"
                required
            >

            @error('tahun_ajaran')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">
                Proses Kenaikan Kelas
            </button>
        </form>
    </div>

    <div class="panel">
        <h2>Jumlah Siswa Per Kelas</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Jumlah Siswa</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jumlahPerKelas->sortKeys() as $kelas => $siswaKelas)
                        <tr>
                            <td>{{ $kelas ?: 'Belum mengisi kelas' }}</td>
                            <td>{{ $siswaKelas->count() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Belum ada data siswa aktif.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel">
        <h2>Riwayat Kenaikan Kelas</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Siswa Naik</th>
                        <th>Menjadi Alumni</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($riwayat as $item)
                        <tr>
                            <td>{{ $item->tahun_ajaran }}</td>
                            <td>{{ $item->jumlah_naik }}</td>
                            <td>{{ $item->jumlah_alumni }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada riwayat kenaikan kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>