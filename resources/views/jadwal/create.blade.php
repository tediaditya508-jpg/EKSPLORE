<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal - Admin | EKSPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --admin-primary: #4f46e5;
            --admin-primary-dark: #3730a3;
            --admin-soft: #eef2ff;
            --admin-border: #c7d2fe;
            --bg-body: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-sans);
        }

        body {
            background: var(--bg-body);
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           HERO SECTION ADMIN
        ========================= */
        .admin-hero {
            position: relative;
            background: linear-gradient(135deg, #1e1b4b 0%, #3730a3 48%, #6d28d9 100%);
            color: #ffffff;
            padding: 56px 28px 88px;
            overflow: hidden;
        }

        .admin-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 22%, rgba(129, 140, 248, 0.35) 0%, transparent 42%),
                radial-gradient(circle at 88% 75%, rgba(192, 132, 252, 0.28) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 850px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.26);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            color: #e0e7ff;
            margin-bottom: 14px;
            backdrop-filter: blur(8px);
        }

        .hero-inner h1 {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .hero-inner h1 span {
            background: linear-gradient(135deg, #c7d2fe 0%, #f5d0fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-inner p {
            font-size: 14.5px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */
        .container {
            max-width: 850px;
            margin: -45px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* =========================
           CARD FORM
        ========================= */
        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
        }

        label svg {
            color: var(--admin-primary);
        }

        input,
        select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14.5px;
            background: #ffffff;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        input:focus,
        select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
            background: #ffffff;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12.5px;
            font-weight: 600;
        }

        .hint {
            margin-top: 6px;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 500;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .btn-simpan {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 24px;
            background: var(--admin-primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
            transition: all 0.2s ease;
            flex: 1;
        }

        .btn-simpan:hover {
            background: var(--admin-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
        }

        .btn-batal {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 24px;
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .btn-batal:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        .required {
            color: #dc2626;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 600px) {
            .admin-hero { padding: 44px 20px 72px; }
            .hero-inner h1 { font-size: 26px; }
            .container { margin: -35px auto 40px; padding: 0 14px; }
            .card { padding: 22px; }
            .form-actions { flex-direction: column-reverse; }
            .btn-simpan, .btn-batal { width: 100%; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/eksplore.css') }}">
</head>

<body>

@include('partials.app-sidebar')

    <!-- HERO SECTION ADMIN -->
    <section class="admin-hero">
        <div class="hero-inner">
            <div class="hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Panel Administrator EKSPLORE
            </div>
            <h1>Tambah <span>Jadwal</span></h1>
            <p>Daftarkan sesi latihan rutin atau agenda event khusus ekstrakurikuler ke dalam sistem sekolah.</p>
        </div>
    </section>

    <div class="container">
        <div class="card">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="ekskul_id">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Ekstrakurikuler <span class="required">*</span>
                    </label>

                    <select name="ekskul_id" id="ekskul_id" required>
                        <option value="">-- Pilih Ekstrakurikuler --</option>

                        @foreach ($ekskul as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ old('ekskul_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_ekskul ?? $item->nama ?? '-' }}
                            </option>
                        @endforeach
                    </select>

                    @error('ekskul_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                        Jenis Jadwal <span class="required">*</span>
                    </label>

                    <select name="jenis" id="jenis" required>
                        <option value="rutin" {{ old('jenis', 'rutin') == 'rutin' ? 'selected' : '' }}>
                            Jadwal Rutin
                        </option>
                        <option value="event" {{ old('jenis') == 'event' ? 'selected' : '' }}>
                            Event / Kegiatan Khusus
                        </option>
                    </select>

                    @error('jenis')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div id="event-fields" class="{{ old('jenis') == 'event' ? '' : 'hidden' }}">
                    <div class="form-group">
                        <label for="nama_event">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            Nama Event <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_event"
                            id="nama_event"
                            value="{{ old('nama_event') }}"
                            placeholder="Contoh: Lomba Futsal Antarkelas"
                            maxlength="255"
                        >

                        @error('nama_event')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_event">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            Tanggal Event <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal_event"
                            id="tanggal_event"
                            value="{{ old('tanggal_event') }}"
                        >

                        @error('tanggal_event')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div id="hari-field" class="form-group {{ old('jenis', 'rutin') == 'event' ? 'hidden' : '' }}">
                    <label for="hari">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        Hari Pelaksanaan <span class="required">*</span>
                    </label>

                    <select name="hari" id="hari">
                        <option value="">-- Pilih Hari --</option>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>

                    @error('hari')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <p class="hint">Pilih hari pelaksanaan rutin ekstrakurikuler.</p>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Jam Mulai <span class="required">*</span>
                    </label>

                    <input
                        type="time"
                        name="jam_mulai"
                        id="jam_mulai"
                        value="{{ old('jam_mulai') }}"
                        required
                    >

                    @error('jam_mulai')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_selesai">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Jam Selesai <span class="required">*</span>
                    </label>

                    <input
                        type="time"
                        name="jam_selesai"
                        id="jam_selesai"
                        value="{{ old('jam_selesai') }}"
                        required
                    >

                    @error('jam_selesai')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Lokasi / Tempat <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="lokasi"
                        id="lokasi"
                        value="{{ old('lokasi') }}"
                        placeholder="Contoh: Lapangan Sekolah"
                        maxlength="255"
                        required
                    >

                    @error('lokasi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.jadwal') }}" class="btn-batal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>

                    <button type="submit" class="btn-simpan">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                        Simpan Jadwal Baru
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const jenisSelect = document.getElementById('jenis');
        const eventFields = document.getElementById('event-fields');
        const namaEvent = document.getElementById('nama_event');
        const tanggalEvent = document.getElementById('tanggal_event');
        const hariField = document.getElementById('hari-field');
        const hariSelect = document.getElementById('hari');

        function updateJenisFields() {
            const isEvent = jenisSelect.value === 'event';

            eventFields.classList.toggle('hidden', !isEvent);
            hariField.classList.toggle('hidden', isEvent);

            namaEvent.required = isEvent;
            tanggalEvent.required = isEvent;
            hariSelect.required = !isEvent;
        }

        jenisSelect.addEventListener('change', updateJenisFields);
        updateJenisFields();
    </script>
    <script src="{{ asset('js/eksplore.js') }}" defer></script>

@include('partials.app-sidebar-end')
</body>
</html>