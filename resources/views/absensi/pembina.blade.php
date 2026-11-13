<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Pembina - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary-emerald: #059669;
            --primary-emerald-hover: #047857;
            --emerald-soft: #ecfdf5;
            --emerald-border: #a7f3d0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --warning: #d97706;
            --warning-soft: #fffbeb;
            --warning-border: #fde68a;
            --danger: #dc2626;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        body {
            background: #f8fafc;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION (PEMBINA EMERALD THEME)
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #065f46 0%, #059669 50%, #10b981 100%);
            color: #ffffff;
            padding: 60px 24px 80px;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(16, 185, 129, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(5, 150, 105, 0.3) 0%, transparent 40%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #a7f3d0;
            margin-bottom: 16px;
            backdrop-filter: blur(8px);
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 10px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1100px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* ALERTS */
        .success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.1);
        }

        .error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
        }

        /* EKSKUL CARD & ANGGOTA CARD */
        .ekskul-card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            margin-bottom: 28px;
        }

        .ekskul-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .ekskul-title svg {
            color: var(--primary-emerald);
        }

        .anggota-card {
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 16px;
            background: #f8fafc;
            transition: all 0.2s ease;
        }

        .anggota-card:hover {
            border-color: #cbd5e1;
            background: white;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .anggota-card h3 {
            font-size: 17px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* FORM GRID */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 14px;
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #334155;
            font-size: 13.5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-family: var(--font-sans);
            background: white;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary-emerald);
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.12);
        }

        .nilai-info {
            display: block;
            margin-top: 6px;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
        }

        .btn {
            border: none;
            padding: 13px 20px;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-simpan {
            background: var(--primary-emerald);
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25);
            margin-top: 6px;
        }

        .btn-simpan:hover {
            background: var(--primary-emerald-hover);
            transform: translateY(-2px);
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
            font-size: 14px;
        }

        /* REKAP GRID */
        .rekap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .rekap-box {
            padding: 20px;
            border-radius: 18px;
            text-align: center;
            color: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .rekap-box h3 {
            font-size: 12.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            opacity: 0.9;
        }

        .rekap-box .jumlah {
            font-size: 30px;
            font-weight: 800;
        }

        .hadir { background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); }
        .izin { background: linear-gradient(135deg, #b45309 0%, #d97706 100%); }
        .sakit { background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%); }
        .alpa { background: linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); }

        /* RIWAYAT */
        .riwayat {
            margin-top: 35px;
        }

        .riwayat-item {
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 16px;
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .riwayat-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .riwayat-item h3 {
            color: var(--text-dark);
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .riwayat-item p {
            margin-bottom: 8px;
            color: #475569;
            font-size: 14px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 700;
        }

        .status-badge.hadir { background: var(--success-soft); color: #15803d; border: 1px solid var(--success-border); }
        .status-badge.izin { background: var(--warning-soft); color: #b45309; border: 1px solid var(--warning-border); }
        .status-badge.sakit { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
        .status-badge.alpa { background: var(--danger-soft); color: #991b1b; border: 1px solid var(--danger-border); }

        .pengajuan-box {
            margin-top: 14px;
            padding: 14px 18px;
            background: var(--warning-soft);
            border: 1px solid var(--warning-border);
            border-left: 5px solid var(--warning);
            border-radius: 12px;
            color: #92400e;
            font-weight: 700;
            font-size: 13.5px;
        }

        .keterangan-box {
            margin-top: 14px;
            padding: 14px 18px;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-left: 5px solid var(--primary-emerald);
            border-radius: 12px;
        }

        .keterangan-box strong {
            color: var(--text-dark);
            font-size: 13px;
        }

        .keterangan-text {
            margin-top: 6px;
            color: #475569;
            font-size: 13.5px;
            line-height: 1.6;
        }

        .nilai-box {
            margin-top: 14px;
            padding: 10px 16px;
            background: var(--emerald-soft);
            border: 1px solid var(--emerald-border);
            border-radius: 10px;
            color: var(--primary-emerald-hover);
            font-weight: 700;
            font-size: 13.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .ekskul-card { padding: 20px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }
            .btn { width: 100%; justify-content: center; }
            .rekap-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION (PEMBINA EMERALD THEME) -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M9 14h6"/><path d="M9 10h6"/></svg>
                Panel Absensi Pembina
            </div>
            <h1>Absensi <span>Anggota</span></h1>
            <p>Kelola pencatatan kehadiran, evaluasi nilai latihan, serta tinjau riwayat absensi siswa dari ekstrakurikuler binaan Anda.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="padding-left: 18px; margin-top: 4px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM ABSENSI PEMBINA --}}
        @forelse ($ekskul as $item)

            <section class="ekskul-card">

                <h2 class="ekskul-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M8 7h6"/><path d="M8 11h8"/></svg>
                    {{ $item->nama_ekskul }}
                </h2>

                @forelse ($item->anggota->where('status', 'aktif') as $anggota)

                    <div class="anggota-card">

                        <h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            {{ $anggota->siswa->name ?? '-' }}
                        </h3>

                        <form action="{{ route('pembina.absensi.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">

                            <div class="form-grid">

                                {{-- TANGGAL --}}
                                <div class="form-group">
                                    <label>Tanggal Kegiatan</label>
                                    <input
                                        type="date"
                                        name="tanggal"
                                        value="{{ now()->format('Y-m-d') }}"
                                        required
                                    >
                                </div>

                                {{-- STATUS --}}
                                <div class="form-group">
                                    <label>Status Kehadiran</label>
                                    <select name="status" class="status-select" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="hadir">Hadir</option>
                                        <option value="izin">Izin</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="alpa">Alpa</option>
                                    </select>
                                </div>

                                {{-- NILAI --}}
                                <div class="form-group">
                                    <label>Nilai Latihan</label>
                                    <input
                                        type="number"
                                        name="nilai"
                                        class="nilai-input"
                                        min="0"
                                        max="100"
                                        step="1"
                                        placeholder="0 - 100"
                                    >
                                    <small class="nilai-info">Wajib diisi jika status Hadir (0-100).</small>
                                </div>

                                {{-- KETERANGAN --}}
                                <div class="form-group full">
                                    <label>Keterangan Tambahan</label>
                                    <textarea
                                        name="keterangan"
                                        placeholder="Tuliskan keterangan opsional (misalnya alasan izin atau catatan latihan)..."
                                    ></textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-simpan">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Simpan Absensi Siswa</span>
                            </button>

                        </form>

                    </div>

                @empty
                    <div class="empty">
                        Belum ada anggota aktif pada ekstrakurikuler ini.
                    </div>
                @endforelse

            </section>

        @empty

            <section class="ekskul-card">
                <div class="empty">
                    <h2>Belum Ada Ekstrakurikuler</h2>
                    <p>Anda belum memiliki ekstrakurikuler yang ditugaskan untuk dibina.</p>
                </div>
            </section>

        @endforelse


        {{-- ========================================================= --}}
        {{-- REKAP ABSENSI --}}
        {{-- ========================================================= --}}
        <section class="ekskul-card">

            <h2 class="ekskul-title">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                Rekapitulasi Kehadiran
            </h2>

            @php
                $semuaAbsensi = \App\Models\Absensi::with([
                    'anggota.siswa',
                    'anggota.ekstrakurikuler'
                ])
                ->whereHas('anggota.ekstrakurikuler', function ($query) use ($pembina) {
                    $query->where('pembina_id', $pembina->id);
                })
                ->get();

                $jumlahHadir = $semuaAbsensi->where('status', 'hadir')->count();
                $jumlahIzin = $semuaAbsensi->where('status', 'izin')->count();
                $jumlahSakit = $semuaAbsensi->where('status', 'sakit')->count();
                $jumlahAlpa = $semuaAbsensi->where('status', 'alpa')->count();
            @endphp

            <div class="rekap-grid">
                <div class="rekap-box hadir">
                    <h3>Hadir</h3>
                    <div class="jumlah">{{ $jumlahHadir }}</div>
                </div>

                <div class="rekap-box izin">
                    <h3>Izin</h3>
                    <div class="jumlah">{{ $jumlahIzin }}</div>
                </div>

                <div class="rekap-box sakit">
                    <h3>Sakit</h3>
                    <div class="jumlah">{{ $jumlahSakit }}</div>
                </div>

                <div class="rekap-box alpa">
                    <h3>Alpa</h3>
                    <div class="jumlah">{{ $jumlahAlpa }}</div>
                </div>
            </div>

            <p style="color: var(--text-muted); font-size: 13.5px; font-weight: 600;">
                Total keseluruhan data absensi tercatat: <strong style="color: var(--text-dark);">{{ $semuaAbsensi->count() }}</strong> entri.
            </p>

        </section>


        {{-- ========================================================= --}}
        {{-- RIWAYAT ABSENSI DAN PENGAJUAN SISWA --}}
        {{-- ========================================================= --}}
        <section class="ekskul-card riwayat">

            <h2 class="ekskul-title">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>
                Riwayat Absensi & Pengajuan Siswa
            </h2>

            @php
                $riwayatAbsensi = $semuaAbsensi->sortByDesc(function ($absensi) {
                    return $absensi->tanggal;
                });
            @endphp

            @forelse ($riwayatAbsensi as $absensi)

                <div class="riwayat-item">

                    <h3>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $absensi->anggota->siswa->name ?? '-' }}
                    </h3>

                    <p>
                        <strong>Ekstrakurikuler:</strong> {{ $absensi->anggota->ekstrakurikuler->nama_ekskul ?? '-' }}
                    </p>

                    <p>
                        <strong>Tanggal:</strong> {{ $absensi->tanggal?->format('d-m-Y') ?? '-' }}
                    </p>

                    <p style="display: flex; align-items: center; gap: 8px; margin-top: 6px;">
                        <strong>Status:</strong>
                        @if ($absensi->status === 'hadir')
                            <span class="status-badge hadir">✅ Hadir</span>
                        @elseif ($absensi->status === 'izin')
                            <span class="status-badge izin">🟡 Izin</span>
                        @elseif ($absensi->status === 'sakit')
                            <span class="status-badge sakit">🔵 Sakit</span>
                        @elseif ($absensi->status === 'alpa')
                            <span class="status-badge alpa">❌ Alpa</span>
                        @else
                            {{ ucfirst($absensi->status) }}
                        @endif
                    </p>

                    {{-- KETERANGAN SISWA --}}
                    @if ($absensi->keterangan)
                        <div class="keterangan-box">
                            <strong>📝 Keterangan / Catatan:</strong>
                            <div class="keterangan-text">{{ $absensi->keterangan }}</div>
                        </div>
                    @endif

                    {{-- NILAI HANYA UNTUK HADIR --}}
                    @if ($absensi->status === 'hadir' && $absensi->nilai !== null)
                        <div class="nilai-box">
                            🎯 Nilai Latihan: {{ $absensi->nilai }}
                        </div>
                    @endif

                    {{-- PENANDA PENGAJUAN IZIN / SAKIT DARI SISWA --}}
                    @if ($absensi->status === 'izin' || $absensi->status === 'sakit')
                        <div class="pengajuan-box">
                            📩 Pengajuan {{ $absensi->status === 'izin' ? 'Izin' : 'Sakit' }} dari siswa tercatat.
                        </div>
                    @endif

                </div>

            @empty

                <div class="empty">
                    Belum ada riwayat absensi yang tercatat.
                </div>

            @endforelse

        </section>

    </main>


    {{-- ========================================================= --}}
    {{-- JAVASCRIPT NILAI DYNAMIC TOGGLE --}}
    {{-- ========================================================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');

            forms.forEach(function (form) {
                const statusSelect = form.querySelector('.status-select');
                const nilaiInput = form.querySelector('.nilai-input');

                if (!statusSelect || !nilaiInput) {
                    return;
                }

                function updateNilai() {
                    if (statusSelect.value === 'hadir') {
                        nilaiInput.required = true;
                        nilaiInput.disabled = false;
                    } else {
                        nilaiInput.required = false;
                        nilaiInput.value = '';
                        nilaiInput.disabled = true;
                    }
                }

                statusSelect.addEventListener('change', updateNilai);
                updateNilai();
            });
        });
    </script>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>