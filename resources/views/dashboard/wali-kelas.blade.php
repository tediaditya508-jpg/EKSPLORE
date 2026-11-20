
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Kelas - EKSPLORE</title>

    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">

    <style>
        :root {
            --primary: #047857;
            --primary-light: #ecfdf5;
            --bg: #f8fafc;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            background: white;
            border-right: 1px solid var(--border);
            padding: 25px 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 22px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 25px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            font-weight: 800;
            font-size: 20px;
        }

        .brand h2 {
            font-size: 16px;
        }

        .brand p {
            color: var(--muted);
            font-size: 11px;
        }

        .menu-label {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .menu-link {
            display: block;
            padding: 12px;
            border-radius: 9px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 13px;
            font-weight: 700;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            border: 0;
            padding: 12px;
            border-radius: 9px;
            background: #fef2f2;
            color: #dc2626;
            font-weight: 700;
            cursor: pointer;
        }

        .main-content {
            margin-left: 250px;
            padding: 32px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 23px;
        }

        .header p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 4px;
        }

        .profile {
            background: white;
            border: 1px solid var(--border);
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card, .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,.02);
        }

        .stat-card span {
            display: block;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-card strong {
            font-size: 27px;
        }

        .card {
            margin-bottom: 22px;
        }

        .card h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .card-description {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 18px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
            font-size: 12px;
        }

        th {
            background: #f1f5f9;
            color: #475569;
            text-align: left;
            padding: 13px 10px;
            white-space: nowrap;
        }

        td {
            padding: 13px 10px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        .student-name {
            font-weight: 700;
        }

        .muted {
            color: var(--muted);
            font-size: 11px;
        }

        .score {
            font-weight: 700;
            color: var(--primary);
        }

        .badge {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 6px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
        }

        .empty {
            padding: 25px;
            text-align: center;
            color: var(--muted);
            background: #f8fafc;
            border-radius: 9px;
            font-size: 13px;
        }

        .notice {
            padding: 14px;
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
            border-radius: 9px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 15px;
            }

            .logout {
                position: static;
                margin-top: 20px;
            }

            .main-content {
                margin-left: 0;
                padding: 18px 12px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-logo">E</div>
            <div>
                <h2>EKSPLORE</h2>
                <p>SMK Budi Bakti Ciwidey</p>
            </div>
        </div>

        <div class="menu-label">MENU WALI KELAS</div>
        <div class="menu-link">▦ Dashboard</div>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                @csrf
                <button type="submit">↪ Logout</button>
            </form>
        </div>
    </aside>

    <main class="main-content">

        <header class="header">
            <div>
                <h1>Dashboard Wali Kelas 👋</h1>
                <p>Pantau data siswa, ekstrakurikuler, dan hasil penilaian.</p>
            </div>

            <div class="profile">
                {{ $waliKelas->nama ?? $waliKelas->name ?? 'Wali Kelas' }}
            </div>
        </header>

        @if (!empty($pesan))
            <div class="notice">{{ $pesan }}</div>
        @else

            <section class="stats">
                <div class="stat-card">
                    <span>KELAS YANG DIAMPU</span>
                    <strong>{{ $waliKelas->kelas }}</strong>
                </div>

                <div class="stat-card">
                    <span>JUMLAH SISWA</span>
                    <strong>{{ $siswa->count() }}</strong>
                </div>

                <div class="stat-card">
                    <span>ANGGOTA EKSTRAKURIKULER</span>
                    <strong>
                        {{ $siswa->sum(fn ($item) => $item->anggotaEkskul->count()) }}
                    </strong>
                </div>
            </section>

            <section class="card">
                <h3>Data Siswa dan Penilaian Ekstrakurikuler</h3>
                <p class="card-description">
                    Daftar siswa kelas {{ $waliKelas->kelas }} beserta keikutsertaan dan hasil penilaiannya.
                </p>

                @if ($siswa->isEmpty())
                    <div class="empty">
                        Belum ada data siswa untuk kelas ini.
                    </div>
                @else
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Ekstrakurikuler</th>
                                    <th>Kehadiran</th>
                                    <th>Keaktifan</th>
                                    <th>Kedisiplinan</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Keterampilan</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($siswa as $index => $item)
                                    @forelse ($item->anggotaEkskul as $anggota)
                                        @php
                                            $nilai = $anggota->penilaian->first();
                                        @endphp

                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <td class="student-name">
                                                {{ $item->nama ?? $item->name }}
                                            </td>

                                            <td>{{ $item->nis ?? '-' }}</td>
                                            <td>{{ $item->kelas ?? '-' }}</td>

                                            <td>
                                                {{ $anggota->ekstrakurikuler->nama_ekskul ?? '-' }}
                                            </td>

                                            @if ($nilai)
                                                <td>{{ $nilai->kehadiran }}</td>
                                                <td>{{ $nilai->keaktifan }}</td>
                                                <td>{{ $nilai->kedisiplinan }}</td>
                                                <td>{{ $nilai->tanggung_jawab }}</td>
                                                <td>{{ $nilai->keterampilan }}</td>
                                                <td>
                                                    <span class="badge">
                                                        {{ number_format((float) $nilai->nilai_akhir, 2, ',', '.') }}
                                                    </span>
                                                </td>
                                            @else
                                                <td colspan="6" class="muted">
                                                    Belum ada penilaian
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="student-name">
                                                {{ $item->nama ?? $item->name }}
                                            </td>
                                            <td>{{ $item->nis ?? '-' }}</td>
                                            <td>{{ $item->kelas ?? '-' }}</td>
                                            <td colspan="7" class="muted">
                                                Belum mengikuti ekstrakurikuler aktif.
                                            </td>
                                        </tr>
                                    @endforelse
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>

        @endif

    </main>

</body>
</html>
