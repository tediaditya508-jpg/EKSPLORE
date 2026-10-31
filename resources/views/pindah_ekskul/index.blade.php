@extends('layouts.pindah')

@section('title', 'Riwayat Pindah Ekskul')

@section('content')

<style>
    .riwayat-wrapper {
        width: 100%;
        max-width: 1120px;
        margin: 35px auto;
        padding: 0 20px;
    }

    .riwayat-hero {
        position: relative;
        overflow: hidden;
        padding: 35px;
        margin-bottom: 25px;
        border-radius: 22px;
        background: linear-gradient(120deg, #1d4ed8, #3b82f6, #60a5fa);
        color: white;
        box-shadow: 0 12px 30px rgba(37, 99, 235, .18);
    }

    .riwayat-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        right: -65px;
        top: -110px;
        border-radius: 50%;
        background: rgba(255,255,255,.12);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .hero-label {
        display: inline-block;
        padding: 7px 12px;
        margin-bottom: 13px;
        border-radius: 20px;
        background: rgba(255,255,255,.17);
        font-size: 12px;
        font-weight: 600;
    }

    .riwayat-hero h2 {
        color: white;
        font-size: 29px;
        margin-bottom: 9px;
    }

    .riwayat-hero p {
        color: #eaf2ff;
        font-size: 14px;
        margin: 0;
    }

    .hero-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 19px;
        border-radius: 11px;
        background: white;
        color: #1d4ed8;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: .2s;
    }

    .hero-button:hover {
        background: #eff6ff;
        color: #1d4ed8;
        transform: translateY(-2px);
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 17px;
        margin-bottom: 28px;
    }

    .summary-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 21px;
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
    }

    .summary-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 13px;
        font-size: 21px;
    }

    .icon-waiting {
        background: #fef3c7;
    }

    .icon-accepted {
        background: #dcfce7;
    }

    .icon-rejected {
        background: #fee2e2;
    }

    .summary-card small {
        display: block;
        color: #64748b;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .summary-card strong {
        color: #172554;
        font-size: 23px;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 17px;
    }

    .section-heading h3 {
        color: #172554;
        font-size: 19px;
        margin: 0;
    }

    .section-heading span {
        color: #64748b;
        font-size: 13px;
    }

    .riwayat-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .riwayat-item {
        position: relative;
        padding: 23px;
        background: white;
        border: 1px solid #e7edf5;
        border-radius: 17px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
        transition: .2s ease;
    }

    .riwayat-item:hover {
        transform: translateY(-2px);
        border-color: #bfdbfe;
        box-shadow: 0 10px 25px rgba(37, 99, 235, .07);
    }

    .item-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 17px;
    }

    .route-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .route-title {
        color: #172554;
        font-size: 19px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .route-title span {
        color: #3b82f6;
        margin: 0 7px;
    }

    .status {
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-waiting {
        color: #92400e;
        background: #fef3c7;
    }

    .status-accepted {
        color: #166534;
        background: #dcfce7;
    }

    .status-rejected {
        color: #991b1b;
        background: #fee2e2;
    }

    .reason-box {
        padding: 14px 16px;
        margin-bottom: 15px;
        border-radius: 11px;
        background: #f8fafc;
        border: 1px solid #edf1f6;
    }

    .reason-box small {
        display: block;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .reason-box p {
        color: #334155;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .item-date {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #64748b;
        font-size: 12px;
    }

    .empty-state {
        padding: 55px 20px;
        text-align: center;
        background: white;
        border: 1px dashed #cbd5e1;
        border-radius: 17px;
    }

    .empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        margin: 0 auto 17px;
        border-radius: 20px;
        background: #eff6ff;
        font-size: 28px;
    }

    .empty-state h3 {
        color: #172554;
        font-size: 20px;
        margin-bottom: 9px;
    }

    .empty-state p {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .alert {
        padding: 14px 17px;
        border-radius: 12px;
        margin-bottom: 18px;
    }

    @media (max-width: 700px) {
        .riwayat-wrapper {
            padding: 0 12px;
            margin: 20px auto;
        }

        .riwayat-hero {
            padding: 25px 21px;
        }

        .riwayat-hero h2 {
            font-size: 23px;
        }

        .summary-grid {
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .summary-card {
            padding: 16px;
        }

        .riwayat-item {
            padding: 18px;
        }

        .route-title {
            font-size: 16px;
        }

        .hero-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

@php
    $jumlahMenunggu = $pengajuan->where('status', 'menunggu')->count();
    $jumlahDiterima = $pengajuan->where('status', 'diterima')->count();
    $jumlahDitolak = $pengajuan->where('status', 'ditolak')->count();
@endphp

<div class="riwayat-wrapper">

    <div class="riwayat-hero">
        <div class="hero-content">
            <div>
                <span class="hero-label">EKSPLORE • LAYANAN SISWA</span>
                <h2>Riwayat Pindah Ekskul</h2>
                <p>Pantau semua pengajuan perpindahan ekstrakurikuler kamu di sini.</p>
            </div>

            <a href="{{ route('pindah_ekskul.create') }}" class="hero-button">
                <span>＋</span> Ajukan Pindah Ekskul
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="summary-grid">

        <div class="summary-card">
            <div class="summary-icon icon-waiting">🕒</div>
            <div>
                <small>Menunggu Persetujuan</small>
                <strong>{{ $jumlahMenunggu }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon icon-accepted">✓</div>
            <div>
                <small>Pengajuan Diterima</small>
                <strong>{{ $jumlahDiterima }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon icon-rejected">✕</div>
            <div>
                <small>Pengajuan Ditolak</small>
                <strong>{{ $jumlahDitolak }}</strong>
            </div>
        </div>

    </div>

    <div class="section-heading">
        <h3>Daftar Pengajuan</h3>
        <span>{{ $pengajuan->count() }} pengajuan</span>
    </div>

    @forelse ($pengajuan as $item)

        <div class="riwayat-list">
            <div class="riwayat-item">

                <div class="item-top">
                    <div>
                        <div class="route-label">PERPINDAHAN EKSTRAKURIKULER</div>

                        <div class="route-title">
                            {{ $item->ekskulAsal->nama_ekskul ?? 'Ekskul asal' }}
                            <span>→</span>
                            {{ $item->ekskulTujuan->nama_ekskul ?? 'Ekskul tujuan' }}
                        </div>
                    </div>

                    @if ($item->status === 'menunggu')
                        <span class="status status-waiting">● Menunggu</span>
                    @elseif ($item->status === 'diterima')
                        <span class="status status-accepted">✓ Diterima</span>
                    @else
                        <span class="status status-rejected">✕ Ditolak</span>
                    @endif
                </div>

                <div class="reason-box">
                    <small>ALASAN PERPINDAHAN</small>
                    <p>{{ $item->alasan }}</p>
                </div>

                <div class="item-date">
                    <span>🗓</span>
                    Diajukan:
                    {{ $item->created_at?->format('d-m-Y H:i') ?? '-' }}
                </div>

            </div>
        </div>

    @empty

        <div class="empty-state">
            <div class="empty-icon">📋</div>
            <h3>Belum Ada Pengajuan</h3>
            <p>Kamu belum memiliki riwayat perpindahan ekstrakurikuler.</p>

            <a href="{{ route('pindah_ekskul.create') }}" class="history-btn">
                Buat Pengajuan Pertama
            </a>
        </div>

    @endforelse

</div>

@endsection