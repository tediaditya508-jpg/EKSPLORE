@extends('layouts.pindah')

@section('title', 'Ajukan Pindah Ekskul')

@section('content')

<style>
    body {
        background:
            radial-gradient(circle at 10% 5%, #dbeafe 0, transparent 35%),
            radial-gradient(circle at 95% 90%, #e0eaff 0, transparent 30%),
            linear-gradient(135deg, #f8faff, #edf4ff);
    }

    .main {
        width: calc(100% - 40px);
        max-width: 1350px;
        min-height: 100vh;
        margin: 0 auto;
        padding: 35px 0;
    }

    .topbar {
        width: 100%;
        margin: 0 auto 30px;
        padding: 25px 30px;
        background: rgba(255,255,255,.95);
        border: 1px solid #e5edfa;
        border-radius: 17px;
        box-shadow: 0 5px 20px rgba(37,99,235,.05);
    }

    .container {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }

    .page-title {
        margin-bottom: 25px;
    }

    .page-title h2 {
        font-size: 27px;
        color: #172554;
        margin-top: 14px;
        margin-bottom: 8px;
    }

    .page-title p {
        color: #64748b;
        font-size: 15px;
    }

    .back-link {
        color: #2563eb;
        font-weight: 600;
        text-decoration: none;
    }

    .back-link:hover {
        color: #1d4ed8;
    }

    .form-card {
        background: #fff;
        border: 1px solid #e5edfa;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 10px 35px rgba(37,99,235,.07);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        color: #1e293b;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 14px 15px;
        border: 1px solid #dbe3ef;
        border-radius: 11px;
        background: #fff;
        color: #1e293b;
        font: inherit;
        transition: .2s;
    }

    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59,130,246,.12);
    }

    textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .alert-info {
        padding: 17px 19px;
        margin-bottom: 25px;
        border-radius: 11px;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1e40af;
        line-height: 1.6;
    }

    .alert-danger {
        padding: 16px 19px;
        margin-bottom: 22px;
        border-radius: 11px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 21px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .btn-light {
        background: #f1f5f9;
        color: #334155;
    }

    .btn-light:hover {
        background: #e2e8f0;
    }

    @media (max-width: 700px) {
        .main {
            width: calc(100% - 24px);
            padding: 20px 0;
        }

        .topbar {
            padding: 20px;
            margin-bottom: 20px;
        }

        .container {
            padding: 0;
        }

        .form-card {
            padding: 19px;
        }

        .page-title h2 {
            font-size: 23px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>

<div class="container py-4">

    <div class="page-title">
        <a href="{{ route('pindah_ekskul.index') }}" class="back-link">
            ← Kembali ke Riwayat
        </a>

        <h2>Ajukan Pindah Ekskul</h2>

        <p>
            Pilih ekstrakurikuler tujuan dan jelaskan alasan kamu ingin pindah.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Pengajuan belum berhasil.</strong>
            <ul style="padding-left:20px; margin-top:10px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('pindah_ekskul.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ekskul_asal_id" class="form-label">
                    Ekskul Saat Ini
                </label>

                <select name="ekskul_asal_id"
                        id="ekskul_asal_id"
                        class="form-select"
                        required>
                    <option value="">Pilih ekskul saat ini</option>

                    @foreach ($anggotaAktif as $anggota)
                        <option value="{{ $anggota->ekskul_id }}"
                            {{ old('ekskul_asal_id') == $anggota->ekskul_id ? 'selected' : '' }}>
                            {{ $anggota->ekstrakurikuler->nama_ekskul ?? 'Ekskul' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ekskul_tujuan_id" class="form-label">
                    Ekskul Tujuan
                </label>

                <select name="ekskul_tujuan_id"
                        id="ekskul_tujuan_id"
                        class="form-select"
                        required>
                    <option value="">Pilih ekskul tujuan</option>

                    @foreach ($ekskulTujuan as $ekskul)
                        <option value="{{ $ekskul->id }}"
                            {{ old('ekskul_tujuan_id') == $ekskul->id ? 'selected' : '' }}>
                            {{ $ekskul->nama_ekskul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="alasan" class="form-label">
                    Alasan Pindah
                </label>

                <textarea name="alasan"
                          id="alasan"
                          class="form-control"
                          rows="5"
                          minlength="10"
                          maxlength="1000"
                          placeholder="Tuliskan alasan kamu ingin pindah ekskul..."
                          required>{{ old('alasan') }}</textarea>
            </div>

            <div class="alert-info">
                <strong>Informasi:</strong>
                Pengajuan akan diperiksa oleh Pembina ekskul asal.
                Keanggotaan kamu baru berubah setelah pengajuan diterima.
            </div>

            <div class="form-actions">
                <a href="{{ route('pindah_ekskul.index') }}" class="btn btn-light">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const asal = document.getElementById('ekskul_asal_id');
    const tujuan = document.getElementById('ekskul_tujuan_id');

    function perbaruiTujuan() {
        Array.from(tujuan.options).forEach(option => {
            if (!option.value) return;

            option.disabled = option.value === asal.value;

            if (option.disabled && option.selected) {
                tujuan.value = '';
            }
        });
    }

    asal.addEventListener('change', perbaruiTujuan);
    perbaruiTujuan();
});
</script>

@endsection