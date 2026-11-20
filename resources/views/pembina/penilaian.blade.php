
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Ekstrakurikuler - EKSPLORE</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 260px;
            padding: 28px 20px;
            background: white;
            border-right: 1px solid #e2e8f0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 13px;
            background: #047857;
            color: white;
            font-size: 22px;
            font-weight: 800;
        }

        .brand-name { font-weight: 800; font-size: 17px; }
        .brand-sub { font-size: 11px; color: #64748b; margin-top: 3px; }

        .menu-label {
            margin: 28px 0 12px;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 800;
        }

        .menu-link {
            display: block;
            padding: 14px;
            border-radius: 11px;
            color: #047857;
            background: #ecfdf5;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
        }

        .logout button {
            width: 100%;
            padding: 14px;
            border: 0;
            border-radius: 11px;
            background: #fff1f2;
            color: #dc2626;
            font-weight: 800;
            cursor: pointer;
        }

        .main {
            margin-left: 260px;
            padding: 35px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        h1 { margin: 0; font-size: 27px; }
        .subtitle { margin-top: 8px; color: #64748b; font-size: 13px; }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 2px 5px rgba(15,23,42,.03);
            margin-bottom: 22px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success { background: #dcfce7; color: #166534; }
        .error { background: #fee2e2; color: #991b1b; }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            font-size: 12px;
        }

        th {
            background: #f1f5f9;
            color: #475569;
            font-weight: 800;
        }

        .student { font-weight: 800; }
        .muted { color: #64748b; }

        .score-form {
            display: grid;
            grid-template-columns: repeat(5, minmax(100px, 1fr));
            gap: 12px;
            margin-top: 15px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 700;
            color: #475569;
        }

        .field input, .field select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            font: inherit;
            font-size: 13px;
        }

        .field input:focus, .field select:focus {
            border-color: #047857;
        }

        .period {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
        }

        .period .field { flex: 1; }

        .final-score {
            margin-top: 15px;
            padding: 13px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            font-weight: 800;
        }

        .save-btn {
            margin-top: 15px;
            padding: 12px 20px;
            border: 0;
            border-radius: 9px;
            background: #047857;
            color: white;
            font-weight: 800;
            cursor: pointer;
        }

        .save-btn:hover { background: #065f46; }

        .empty {
            padding: 35px;
            text-align: center;
            color: #64748b;
            background: #f8fafc;
            border-radius: 12px;
        }

        @media (max-width: 900px) {
            .sidebar { width: 220px; }
            .main { margin-left: 220px; padding: 22px; }
            .score-form { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <div class="brand-icon">E</div>
        <div>
            <div class="brand-name">EKSPLORE</div>
            <div class="brand-sub">SMK Budi Bakti Ciwidey</div>
        </div>
    </div>

    <div class="menu-label">MENU PEMBINA</div>
    <a href="{{ route('pembina.dashboard') }}" class="menu-link">▦ Dashboard</a>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">↪ Logout</button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="header">
        <div>
            <h1>Penilaian Ekstrakurikuler</h1>
            <div class="subtitle">
                Kelola nilai anggota ekstrakurikuler yang kamu bina.
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <strong>Periksa kembali data penilaian:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="card">
        <h3>Daftar Anggota dan Penilaian</h3>
        <p class="subtitle">
            Isi nilai setiap anggota berdasarkan ekstrakurikulernya.
        </p>

        @if($anggota->isEmpty())
            <div class="empty">
                Belum ada anggota aktif pada ekstrakurikuler yang kamu bina.
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Ekstrakurikuler</th>
                            <th>Form Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $index => $item)
                            @php
                                $nilai = $item->penilaian->first();
                                $formId = 'nilai-form-' . $item->id;
                            @endphp

                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="student">
                                    {{ $item->siswa->nama ?? $item->siswa->name ?? '-' }}
                                </td>
                                <td>{{ $item->siswa->nis ?? '-' }}</td>
                                <td>{{ $item->ekstrakurikuler->nama_ekskul ?? '-' }}</td>
                                <td>
                                    <form
                                        id="{{ $formId }}"
                                        action="{{ route('pembina.penilaian.store', $item->id) }}"
                                        method="POST"
                                    >
                                        @csrf

                                        <div class="period">
                                            <div class="field">
                                                <label>Semester</label>
                                                <select name="semester" required>
                                                    <option value="Ganjil"
                                                        @selected(($nilai->semester ?? 'Ganjil') === 'Ganjil')>
                                                        Ganjil
                                                    </option>
                                                    <option value="Genap"
                                                        @selected(($nilai->semester ?? '') === 'Genap')>
                                                        Genap
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="field">
                                                <label>Tahun Ajaran</label>
                                                <input
                                                    type="text"
                                                    name="tahun_ajaran"
                                                    value="{{ $nilai->tahun_ajaran ?? '2026/2027' }}"
                                                    pattern="[0-9]{4}/[0-9]{4}"
                                                    placeholder="2026/2027"
                                                    required
                                                >
                                            </div>
                                        </div>

                                        <div class="score-form">
                                            @foreach([
                                                'kehadiran' => 'Kehadiran (30%)',
                                                'keaktifan' => 'Keaktifan (20%)',
                                                'kedisiplinan' => 'Kedisiplinan (20%)',
                                                'tanggung_jawab' => 'Tanggung Jawab (10%)',
                                                'keterampilan' => 'Keterampilan (20%)'
                                            ] as $field => $label)
                                                <div class="field">
                                                    <label>{{ $label }}</label>
                                                    <input
                                                        type="number"
                                                        name="{{ $field }}"
                                                        min="0"
                                                        max="100"
                                                        step="1"
                                                        value="{{ old($field, $nilai->$field ?? '') }}"
                                                        class="score-input"
                                                        required
                                                    >
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="final-score">
                                            Nilai Akhir:
                                            <span class="final-value">
                                                {{ $nilai->nilai_akhir ?? '—' }}
                                            </span>
                                        </div>

                                        <button type="submit" class="save-btn">
                                            Simpan Penilaian
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</main>

<script>
    document.querySelectorAll('.score-input').forEach(function (input) {
        input.addEventListener('input', function () {
            const form = input.closest('form');
            const values = {
                kehadiran: 30,
                keaktifan: 20,
                kedisiplinan: 20,
                tanggung_jawab: 10,
                keterampilan: 20
            };

            let total = 0;
            let lengkap = true;

            Object.entries(values).forEach(function ([field, weight]) {
                const element = form.querySelector(`[name="${field}"]`);
                const value = element.value;

                if (value === '') {
                    lengkap = false;
                    return;
                }

                total += Number(value) * weight;
            });

            form.querySelector('.final-value').textContent =
                lengkap ? (total / 100).toFixed(2) : '—';
        });
    });
</script>

</body>
</html>
