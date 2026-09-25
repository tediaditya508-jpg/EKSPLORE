<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Admin | EKSPLORE</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
            line-height: 1.6;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            color: white;
        }

        .btn-back {
            background: #2563eb;
        }

        .btn-back:hover {
            background: #1d4ed8;
        }

        .section-title {
            margin-bottom: 15px;
            font-size: 22px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #111827;
        }

        .summary {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .summary h2 {
            margin-bottom: 18px;
            font-size: 22px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #4b5563;
        }

        .summary-value {
            font-weight: bold;
            color: #111827;
        }

        @media (max-width: 900px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 24px;
            }

            .summary-row {
                gap: 15px;
            }

        }

    </style>

</head>


<body>

<div class="container">


    {{-- HEADER --}}

    <div class="header">

        <h1>
            📊 Laporan EKSPLORE
        </h1>

        <p>
            Lihat ringkasan data dan aktivitas
            ekstrakurikuler dalam sistem EKSPLORE.
        </p>


        <div class="buttons">

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-back"
            >
                ← Kembali ke Dashboard
            </a>

        </div>

    </div>


    {{-- STATISTIK --}}

    <h2 class="section-title">
        Ringkasan Data
    </h2>


    <div class="stats">


        {{-- PENGGUNA --}}

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <h3>
                Total Pengguna
            </h3>

            <div class="stat-number">
                {{ $totalPengguna }}
            </div>

        </div>


        {{-- SISWA --}}

        <div class="stat-card">

            <div class="stat-icon">
                🎓
            </div>

            <h3>
                Total Siswa
            </h3>

            <div class="stat-number">
                {{ $totalSiswa }}
            </div>

        </div>


        {{-- PEMBINA --}}

        <div class="stat-card">

            <div class="stat-icon">
                👨‍🏫
            </div>

            <h3>
                Total Pembina
            </h3>

            <div class="stat-number">
                {{ $totalPembina }}
            </div>

        </div>


        {{-- EKSTRAKURIKULER --}}

        <div class="stat-card">

            <div class="stat-icon">
                🏫
            </div>

            <h3>
                Total Ekstrakurikuler
            </h3>

            <div class="stat-number">
                {{ $totalEkstrakurikuler }}
            </div>

        </div>


        {{-- PENDAFTARAN --}}

        <div class="stat-card">

            <div class="stat-icon">
                📝
            </div>

            <h3>
                Total Pendaftaran
            </h3>

            <div class="stat-number">
                {{ $totalPendaftaran }}
            </div>

        </div>


        {{-- ANGGOTA --}}

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <h3>
                Total Anggota
            </h3>

            <div class="stat-number">
                {{ $totalAnggota }}
            </div>

        </div>


        {{-- JADWAL --}}

        <div class="stat-card">

            <div class="stat-icon">
                📅
            </div>

            <h3>
                Total Jadwal
            </h3>

            <div class="stat-number">
                {{ $totalJadwal }}
            </div>

        </div>


        {{-- ABSENSI --}}

        <div class="stat-card">

            <div class="stat-icon">
                ✅
            </div>

            <h3>
                Total Absensi
            </h3>

            <div class="stat-number">
                {{ $totalAbsensi }}
            </div>

        </div>


        {{-- PRESTASI --}}

        <div class="stat-card">

            <div class="stat-icon">
                🏆
            </div>

            <h3>
                Total Prestasi
            </h3>

            <div class="stat-number">
                {{ $totalPrestasi }}
            </div>

        </div>


        {{-- PENGUMUMAN --}}

        <div class="stat-card">

            <div class="stat-icon">
                📢
            </div>

            <h3>
                Total Pengumuman
            </h3>

            <div class="stat-number">
                {{ $totalPengumuman }}
            </div>

        </div>

    </div>


    {{-- RINGKASAN AKTIVITAS --}}

    <div class="summary">

        <h2>
            📋 Ringkasan Aktivitas
        </h2>


        <div class="summary-row">

            <span class="summary-label">
                Pengguna terdaftar
            </span>

            <span class="summary-value">
                {{ $totalPengguna }} pengguna
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Ekstrakurikuler tersedia
            </span>

            <span class="summary-value">
                {{ $totalEkstrakurikuler }} ekskul
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Pendaftaran siswa
            </span>

            <span class="summary-value">
                {{ $totalPendaftaran }} pendaftaran
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Anggota ekstrakurikuler
            </span>

            <span class="summary-value">
                {{ $totalAnggota }} anggota
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Jadwal ekstrakurikuler
            </span>

            <span class="summary-value">
                {{ $totalJadwal }} jadwal
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Data absensi
            </span>

            <span class="summary-value">
                {{ $totalAbsensi }} data
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Prestasi ekstrakurikuler
            </span>

            <span class="summary-value">
                {{ $totalPrestasi }} prestasi
            </span>

        </div>


        <div class="summary-row">

            <span class="summary-label">
                Pengumuman
            </span>

            <span class="summary-value">
                {{ $totalPengumuman }} pengumuman
            </span>

        </div>

    </div>


</div>

</body>

</html>