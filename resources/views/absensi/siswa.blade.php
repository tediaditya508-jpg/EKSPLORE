<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran Saya - EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
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
           HERO SECTION
        ========================= */
        .hero {
            position: relative;
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
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
                radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(6, 182, 212, 0.3) 0%, transparent 40%);
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
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: #93c5fd;
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
            background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 14.5px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 1000px;
            margin: -35px auto 60px;
            padding: 0 24px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           REKAP GRID (STATISTIK)
        ========================= */
        .rekap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .rekap-box {
            background: white;
            padding: 22px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.05);
            transition: transform 0.25s ease;
        }

        .rekap-box:hover {
            transform: translateY(-3px);
        }

        .rekap-box h3 {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .rekap-box .jumlah {
            font-size: 30px;
            font-weight: 800;
        }

        .rekap-box.hadir .jumlah { color: #16a34a; }
        .rekap-box.izin .jumlah { color: #d97706; }
        .rekap-box.sakit .jumlah { color: #2563eb; }
        .rekap-box.alpa .jumlah { color: #dc2626; }

        /* =========================
           CARD & FORM STYLING
        ========================= */
        .card, .form-card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
            margin-bottom: 25px;
        }

        .card h2, .form-card h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-description {
            color: var(--text-muted);
            font-size: 13.5px;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #334155;
            font-size: 13.5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-family: var(--font-sans);
            outline: none;
            background: #f8fafc;
            color: var(--text-dark);
            transition: all 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-help {
            display: block;
            margin-top: 6px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .btn-ajukan {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 14px 20px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            font-size: 14.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px -4px rgba(37, 99, 235, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-ajukan:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.45);
        }

        /* ALERTS */
        .alert-success {
            background: var(--success-soft);
            color: #166534;
            border: 1px solid var(--success-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background: var(--danger-soft);
            color: #991b1b;
            border: 1px solid var(--danger-border);
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .alert-error ul {
            margin-left: 20px;
            margin-top: 6px;
        }

        /* ATTENDANCE ITEM LIST */
        .attendance-item {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 22px;
            transition: all 0.25s ease;
        }

        .attendance-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 8px 25px -6px rgba(15, 23, 42, 0.06);
        }

        .attendance-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            background: #f8fafc;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-top: 10px;
        }

        .attendance-detail-row {
            font-size: 13.5px;
            color: #475569;
        }

        .attendance-detail-row strong {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        /* STATUS BADGE */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 12px;
        }

        .status-hadir { background: var(--success-soft); color: #15803d; border: 1px solid var(--success-border); }
        .status-izin { background: var(--warning-soft); color: var(--warning); border: 1px solid var(--warning-border); }
        .status-sakit { background: var(--primary-soft); color: var(--primary); border: 1px solid #bfdbfe; }
        .status-alpa { background: var(--danger-soft); color: var(--danger); border: 1px solid var(--danger-border); }

        /* NILAI BOX */
        .nilai-box {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 2px 8px;
            background: var(--primary-soft);
            border: 1px solid #bfdbfe;
            border-radius: 8px;
        }

        .nilai {
            color: var(--primary);
            font-size: 14px;
            font-weight: 800;
        }

        .nilai-belum {
            color: var(--text-muted);
            font-size: 13.5px;
            font-style: italic;
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--primary-soft);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .empty h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .empty p {
            font-size: 13.5px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero { padding: 45px 20px 70px; }
            .hero h1 { font-size: 26px; }
            .container { margin: -25px 16px 40px; padding: 0; }
            .rekap-grid { grid-template-columns: repeat(2, 1fr); }
            .card, .form-card { padding: 22px; }
        }

        @media (max-width: 450px) {
            .rekap-grid { grid-template-columns: 1fr; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M9 14h6"/><path d="M9 10h6"/></svg>
                Rekapitulasi Kehadiran Siswa
            </div>
            <h1>Kehadiran & Nilai <span>Saya</span></h1>
            <p>Pantau riwayat kehadiran latihan rutin, nilai prestasi, dan ajukan izin atau sakit dengan mudah di SMK Budi Bakti Ciwidey.</p>
        </div>
    </section>

    <!-- MAIN CONTAINER -->
    <main class="container">

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="alert-error">
                <strong>Terjadi kesalahan saat pengajuan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- REKAP KEHADIRAN (STATISTIK) --}}
        <section class="rekap-grid">
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
        </section>

        {{-- FORM AJUKAN IZIN / SAKIT --}}
        <section class="form-card">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Ajukan Izin / Sakit
            </h2>
            <p class="form-description">
                Jika kamu berhalangan hadir mengikuti kegiatan ekstrakurikuler, silakan ajukan surat izin atau keterangan sakit kepada pembina di sini.
            </p>

            <form action="{{ route('kehadiran.storeSiswa') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="anggota_id">Ekstrakurikuler Terkait</label>
                    <select name="anggota_id" id="anggota_id" required>
                        <option value="">-- Pilih Ekstrakurikuler --</option>
                        @foreach ($anggota as $itemAnggota)
                            <option value="{{ $itemAnggota->id }}"
                                {{ (string) old('anggota_id') === (string) $itemAnggota->id ? 'selected' : '' }}>
                                {{ $itemAnggota->ekstrakurikuler->nama_ekskul ?? 'Ekstrakurikuler' }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-help">Pilih ekstrakurikuler tempat kamu berhalangan hadir.</small>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status Ketidakhadiran</label>
                    <select name="status" id="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="izin" {{ old('status') === 'izin' ? 'selected' : '' }}>🟡 Izin</option>
                        <option value="sakit" {{ old('status') === 'sakit' ? 'selected' : '' }}>🔵 Sakit</option>
                    </select>
                    <small class="form-help">Siswa dapat mengajukan status Izin atau Sakit.</small>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan / Alasan</label>
                    <textarea name="keterangan" id="keterangan" placeholder="Contoh: Berhalangan hadir karena ada keperluan keluarga yang mendesak." required>{{ old('keterangan') }}</textarea>
                    <small class="form-help">Jelaskan alasan izin atau sakit secara singkat dan jelas.</small>
                </div>

                <button type="submit" class="btn-ajukan">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    <span>Kirim Pengajuan Izin / Sakit</span>
                </button>
            </form>
        </section>

        {{-- RIWAYAT KEHADIRAN & NILAI --}}
        <section class="card">
            <h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                Riwayat Kehadiran & Penilaian
            </h2>

            <div class="attendance-list" style="margin-top: 20px;">
                @forelse ($absensi as $item)
                    <div class="attendance-item">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; flex-wrap: wrap; margin-bottom: 12px;">
                            <h3 style="margin: 0; font-size: 18px; font-weight: 800; color: var(--text-dark);">
                                {{ $item->anggota->ekstrakurikuler->nama_ekskul ?? '-' }}
                            </h3>

                            <!-- STATUS BADGE -->
                            @if ($item->status === 'hadir')
                                <span class="status status-hadir">✅ Hadir</span>
                            @elseif ($item->status === 'izin')
                                <span class="status status-izin">🟡 Izin</span>
                            @elseif ($item->status === 'sakit')
                                <span class="status status-sakit">🔵 Sakit</span>
                            @elseif ($item->status === 'alpa')
                                <span class="status status-alpa">❌ Alpa</span>
                            @else
                                <span class="status">{{ ucfirst($item->status) }}</span>
                            @endif
                        </div>

                        <div class="attendance-details">
                            <div class="attendance-detail-row">
                                <strong>Tanggal Absen</strong>
                                {{ $item->tanggal?->format('d-m-Y') ?? '-' }}
                            </div>

                            <div class="attendance-detail-row">
                                <strong>Penilaian Sesi</strong>
                                @if ($item->nilai !== null)
                                    <span class="nilai-box">
                                        <span class="nilai">{{ $item->nilai }}</span>
                                    </span>
                                @elseif ($item->status === 'hadir')
                                    <span class="nilai-belum">Belum dinilai</span>
                                @else
                                    <span class="nilai-belum">Tidak ada nilai</span>
                                @endif
                            </div>

                            @if ($item->keterangan)
                                <div class="attendance-detail-row" style="grid-column: 1 / -1;">
                                    <strong>Keterangan</strong>
                                    {{ $item->keterangan }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty">
                        <div class="empty-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                        </div>
                        <h3>Belum Ada Data Kehadiran</h3>
                        <p>Riwayat kehadiran dan nilai kamu akan muncul di sini setelah pembina menginput absensi latihan.</p>
                    </div>
                @endforelse
            </div>
        </section>

    </main>

    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>

</html>