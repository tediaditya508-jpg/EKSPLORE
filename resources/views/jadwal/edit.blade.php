<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Jadwal - Admin | EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 800px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px 30px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            color: #111827;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
            font-size: 15px;
        }

        .back-button {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 18px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .back-button:hover {
            background: #374151;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #111827;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-update {
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-update:hover {
            background: #1d4ed8;
        }

        .btn-batal {
            display: inline-block;
            padding: 11px 18px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-batal:hover {
            background: #4b5563;
        }

        .required {
            color: #dc2626;
        }

        @media (max-width: 600px) {
            .container {
                width: 95%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 23px;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <h1>✏️ Edit Jadwal</h1>

        <p>
            Ubah data jadwal ekstrakurikuler.
        </p>

        <a href="{{ route('admin.jadwal') }}" class="back-button">
            ← Kembali ke Jadwal
        </a>

    </div>


    <!-- FORM -->
    <div class="card">

        <form
            action="{{ route('admin.jadwal.update', $jadwal->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <!-- EKSTRAKURIKULER -->
            <div class="form-group">

                <label for="ekskul_id">
                    Ekstrakurikuler <span class="required">*</span>
                </label>

                <select name="ekskul_id" id="ekskul_id" required>

                    <option value="">
                        -- Pilih Ekstrakurikuler --
                    </option>

                    @foreach ($ekskul as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('ekskul_id', $jadwal->ekskul_id) == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_ekskul ?? $item->nama ?? '-' }}
                        </option>

                    @endforeach

                </select>

                @error('ekskul_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- HARI -->
            <div class="form-group">

                <label for="hari">
                    Hari <span class="required">*</span>
                </label>

                <select name="hari" id="hari" required>

                    <option value="">-- Pilih Hari --</option>

                    @foreach ([
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    ] as $hari)

                        <option
                            value="{{ $hari }}"
                            {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}
                        >
                            {{ $hari }}
                        </option>

                    @endforeach

                </select>

                @error('hari')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- JAM MULAI -->
            <div class="form-group">

                <label for="jam_mulai">
                    Jam Mulai <span class="required">*</span>
                </label>

                <input
                    type="time"
                    name="jam_mulai"
                    id="jam_mulai"
                    value="{{ old('jam_mulai', $jadwal->jam_mulai ? \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') : '') }}"
                    required
                >

                @error('jam_mulai')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- JAM SELESAI -->
            <div class="form-group">

                <label for="jam_selesai">
                    Jam Selesai <span class="required">*</span>
                </label>

                <input
                    type="time"
                    name="jam_selesai"
                    id="jam_selesai"
                    value="{{ old('jam_selesai', $jadwal->jam_selesai ? \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') : '') }}"
                    required
                >

                @error('jam_selesai')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- LOKASI -->
            <div class="form-group">

                <label for="lokasi">
                    Lokasi <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="lokasi"
                    id="lokasi"
                    value="{{ old('lokasi', $jadwal->lokasi) }}"
                    placeholder="Contoh: Lapangan Sekolah"
                    required
                >

                @error('lokasi')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- BUTTON -->
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn-update"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="{{ route('admin.jadwal') }}"
                    class="btn-batal"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>