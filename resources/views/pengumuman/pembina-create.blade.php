<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Pengumuman</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: #ffffff;
            color: #18324a;
        }

        /* ================================
           HALAMAN
        ================================= */

        .page-wrapper {
            width: 100%;
            min-height: 100vh;
            padding: 45px 20px 70px;
        }

        .content {
            width: 100%;
            max-width: 850px;
            margin: 0 auto;
        }

        /* ================================
           JUDUL HALAMAN
        ================================= */

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-size: 30px;
            font-weight: 800;
            color: #194766;
        }

        .page-title p {
            margin-top: 7px;
            font-size: 14px;
            color: #71899b;
        }

        /* ================================
           CARD
        ================================= */

        .card {
            background: #ffffff;
            border: 1px solid #e5edf2;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 10px 35px rgba(52, 111, 143, 0.08);
        }

        .card-title {
            font-size: 25px;
            font-weight: 800;
            color: #194766;
            margin-bottom: 8px;
        }

        .card-description {
            color: #71899b;
            font-size: 14px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* ================================
           FORM
        ================================= */

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #34566c;
            margin-bottom: 9px;
        }

        .required {
            color: #e36f6f;
        }

        input,
        textarea,
        select {
            width: 100%;
            border: 1px solid #d8e8f0;
            background: #ffffff;
            color: #25475c;
            border-radius: 18px;
            padding: 14px 17px;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
            font-family: inherit;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #78b8d5;
            box-shadow: 0 0 0 4px rgba(120, 184, 213, 0.12);
        }

        textarea {
            min-height: 180px;
            resize: vertical;
            line-height: 1.6;
        }

        select {
            cursor: pointer;
            appearance: auto;
        }

        .form-help {
            margin-top: 7px;
            font-size: 12px;
            color: #8299a8;
            line-height: 1.5;
        }

        /* ================================
           ERROR
        ================================= */

        .error-box {
            margin-bottom: 22px;
            padding: 15px 18px;
            border-radius: 16px;
            background: #fff1f1;
            border: 1px solid #ffd4d4;
            color: #b84f4f;
            font-size: 13px;
        }

        .error-box ul {
            margin-left: 18px;
            line-height: 1.7;
        }

        /* ================================
           BUTTON
        ================================= */

        .button-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 25px;
            border-radius: 30px;
            border: none;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-back {
            background: #edf5f9;
            color: #537286;
        }

        .btn-back:hover {
            background: #e2eef4;
            transform: translateY(-2px);
        }

        .btn-submit {
            background: #438eaf;
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(67, 142, 175, 0.18);
        }

        .btn-submit:hover {
            background: #367f9f;
            transform: translateY(-2px);
            box-shadow: 0 11px 25px rgba(67, 142, 175, 0.24);
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 650px) {

            .page-wrapper {
                padding: 25px 14px 50px;
            }

            .page-title h1 {
                font-size: 25px;
            }

            .card {
                padding: 24px 20px;
                border-radius: 22px;
            }

            .button-area {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <div class="content">

            <!-- JUDUL HALAMAN -->
            <div class="page-title">
                <h1>Buat Pengumuman</h1>
                <p>Buat pengumuman untuk ekstrakurikuler yang kamu bina.</p>
            </div>


            <!-- CARD -->
            <div class="card">

                <div class="card-title">
                    Buat Pengumuman
                </div>

                <div class="card-description">
                    Pilih ekstrakurikuler terlebih dahulu agar pengumuman
                    dapat diterima oleh siswa yang mengikuti ekskul tersebut.
                </div>


                <!-- ERROR -->
                @if ($errors->any())

                    <div class="error-box">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                <!-- FORM -->
                <form
                    action="{{ route('pembina.pengumuman.store') }}"
                    method="POST"
                >

                    @csrf


                    <!-- EKSTRAKURIKULER -->
                    <div class="form-group">

                        <label for="ekskul_id">
                            Ekstrakurikuler
                            <span class="required">*</span>
                        </label>

                        <select
                            name="ekskul_id"
                            id="ekskul_id"
                            required
                        >

                            <option value="">
                                -- Pilih Ekstrakurikuler --
                            </option>

                            @foreach ($ekskul as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('ekskul_id') == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_ekskul }}
                                </option>

                            @endforeach

                        </select>

                        <div class="form-help">
                            Pengumuman hanya akan ditampilkan kepada siswa
                            yang mengikuti ekstrakurikuler ini.
                        </div>

                    </div>


                    <!-- JUDUL -->
                    <div class="form-group">

                        <label for="judul">
                            Judul Pengumuman
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Jadwal Latihan Futsal"
                            required
                        >

                    </div>


                    <!-- ISI -->
                    <div class="form-group">

                        <label for="isi">
                            Isi Pengumuman
                            <span class="required">*</span>
                        </label>

                        <textarea
                            name="isi"
                            id="isi"
                            placeholder="Tulis isi pengumuman di sini..."
                            required
                        >{{ old('isi') }}</textarea>

                    </div>


                    <!-- TANGGAL -->
                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal Pengumuman
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            required
                        >

                    </div>


                    <!-- GAMBAR -->
                    <div class="form-group">

                        <label for="gambar">
                            Nama / Path Gambar
                        </label>

                        <input
                            type="text"
                            name="gambar"
                            id="gambar"
                            value="{{ old('gambar') }}"
                            placeholder="Contoh: pengumuman-futsal.jpg"
                        >

                        <div class="form-help">
                            Opsional. Kosongkan jika pengumuman tidak menggunakan gambar.
                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="button-area">

                        <a
                            href="{{ route('pembina.pengumuman') }}"
                            class="btn btn-back"
                        >
                            ← Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn btn-submit"
                        >
                            Simpan Pengumuman
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>