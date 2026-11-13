@extends('layouts.pindah')

@section('content')

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

    body, .container, .card, h2, h5, p, span, strong, small, button {
        font-family: var(--font-sans);
    }

    /* =========================
       HERO SECTION (PEMBINA EMERALD THEME)
    ========================= */
    .pindah-hero {
        position: relative;
        background: linear-gradient(135deg, #065f46 0%, #059669 50%, #10b981 100%);
        color: #ffffff;
        padding: 56px 24px 80px;
        text-align: center;
        overflow: hidden;
        border-radius: 0 0 32px 32px;
        margin-bottom: -35px;
    }

    .pindah-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: 
            radial-gradient(circle at 15% 20%, rgba(16, 185, 129, 0.4) 0%, transparent 40%),
            radial-gradient(circle at 85% 80%, rgba(5, 150, 105, 0.3) 0%, transparent 40%);
        pointer-events: none;
    }

    .pindah-hero-content {
        position: relative;
        z-index: 2;
        max-width: 650px;
        margin: 0 auto;
    }

    .pindah-hero-badge {
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

    .pindah-hero h2 {
        font-size: 34px;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 10px;
        color: #ffffff !important;
    }

    .pindah-hero h2 span {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .pindah-hero p {
        font-size: 14.5px;
        color: #e2e8f0 !important;
        line-height: 1.6;
        margin: 0;
    }

    /* =========================
       CONTAINER UTAMA
    ========================= */
    .pindah-container {
        max-width: 1050px !important;
        margin: 0 auto;
        padding: 0 20px 60px !important;
        position: relative;
        z-index: 10;
    }

    /* ALERTS */
    .custom-alert-success {
        background: var(--success-soft) !important;
        color: #166534 !important;
        border: 1px solid var(--success-border) !important;
        padding: 16px 20px !important;
        border-radius: 14px !important;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.1);
        margin-bottom: 24px;
    }

    .custom-alert-danger {
        background: var(--danger-soft) !important;
        color: #991b1b !important;
        border: 1px solid var(--danger-border) !important;
        padding: 16px 20px !important;
        border-radius: 14px !important;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
    }

    /* CARD UTAMA */
    .main-pindah-card {
        background: #ffffff !important;
        border-radius: 24px !important;
        box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.08) !important;
        border: 1px solid var(--border-color) !important;
        padding: 32px !important;
    }

    .section-header-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding-bottom: 20px;
        margin-bottom: 24px;
        border-bottom: 1px solid var(--border-color);
    }

    .section-header-title {
        font-size: 19px;
        font-weight: 800;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }

    .section-header-title svg {
        color: var(--primary-emerald);
    }

    .count-pill {
        background: var(--emerald-soft);
        color: var(--primary-emerald-hover);
        border: 1px solid var(--emerald-border);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12.5px;
        font-weight: 700;
    }

    /* ITEM PENGAJUAN CARD */
    .pengajuan-item {
        border: 1px solid var(--border-color) !important;
        border-radius: 18px !important;
        padding: 24px !important;
        margin-bottom: 20px !important;
        background: #f8fafc !important;
        transition: all 0.25s ease;
    }

    .pengajuan-item:last-child {
        margin-bottom: 0 !important;
    }

    .pengajuan-item:hover {
        border-color: #a7f3d0 !important;
        background: #ffffff !important;
        box-shadow: 0 10px 25px rgba(5, 150, 105, 0.06);
        transform: translateY(-2px);
    }

    .item-top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
    }

    .student-identity {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .student-avatar {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: linear-gradient(135deg, #059669, #10b981);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 16px;
        flex-shrink: 0;
    }

    .student-name {
        font-size: 17px !important;
        font-weight: 800 !important;
        color: var(--text-dark) !important;
        margin: 0 !important;
    }

    .student-date {
        font-size: 12.5px;
        color: var(--text-muted);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 2px;
    }

    /* BADGE STATUS */
    .status-badge-warning {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--warning-soft) !important;
        color: #b45309 !important;
        border: 1px solid var(--warning-border) !important;
        padding: 7px 14px !important;
        border-radius: 50px !important;
        font-size: 12.5px !important;
        font-weight: 700 !important;
    }

    /* DETAIL TRANSFER ROUTE */
    .transfer-grid {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 14px;
        margin-bottom: 16px;
    }

    .transfer-box {
        background: #ffffff;
        padding: 15px 18px;
        border-radius: 14px;
        border: 1px solid var(--border-color);
    }

    .transfer-box.destination {
        background: var(--emerald-soft);
        border-color: var(--emerald-border);
    }

    .transfer-box strong {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: var(--text-muted);
        margin-bottom: 4px;
        font-weight: 700;
    }

    .transfer-box.destination strong {
        color: var(--primary-emerald-hover);
    }

    .transfer-box span {
        font-size: 14.5px;
        font-weight: 800;
        color: var(--text-dark);
    }

    .transfer-arrow {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffffff;
        border: 1px solid var(--border-color);
        color: var(--primary-emerald);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .alasan-box {
        background: #ffffff;
        padding: 16px 18px;
        border-radius: 14px;
        border: 1px solid var(--border-color);
        margin-bottom: 20px;
        font-size: 13.5px;
        color: #334155;
        line-height: 1.65;
    }

    .alasan-box strong {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--text-dark);
        font-size: 11.5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        font-weight: 700;
    }

    /* TOMBOL AKSI */
    .action-row {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        padding-top: 16px;
        border-top: 1px dashed var(--border-color);
    }

    .btn-approve {
        background: var(--primary-emerald) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 11px 22px !important;
        border-radius: 12px !important;
        font-weight: 700 !important;
        font-size: 13.5px !important;
        box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-approve:hover {
        background: var(--primary-emerald-hover) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.35);
    }

    .btn-reject {
        background: var(--danger-soft) !important;
        color: #b91c1c !important;
        border: 1px solid var(--danger-border) !important;
        padding: 11px 22px !important;
        border-radius: 12px !important;
        font-weight: 700 !important;
        font-size: 13.5px !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-reject:hover {
        background: var(--danger) !important;
        color: #ffffff !important;
        border-color: var(--danger) !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(220, 38, 38, 0.25);
    }

    /* EMPTY STATE */
    .empty-state-box {
        text-align: center;
        padding: 64px 20px !important;
    }

    .empty-icon-circle {
        width: 68px;
        height: 68px;
        background: var(--emerald-soft);
        color: var(--primary-emerald);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        border: 1px solid var(--emerald-border);
    }

    .empty-state-box h5 {
        font-size: 19px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .empty-state-box p {
        font-size: 14px;
        color: var(--text-muted);
        max-width: 420px;
        margin: 0 auto;
    }

    @media (max-width: 768px) {
        .pindah-hero { padding: 44px 20px 68px; border-radius: 0 0 24px 24px; }
        .pindah-hero h2 { font-size: 26px; }
        .pindah-container { padding: 0 14px 40px !important; }
        .main-pindah-card { padding: 20px !important; border-radius: 20px !important; }
        .pengajuan-item { padding: 18px !important; }
        .transfer-grid { grid-template-columns: 1fr; gap: 10px; }
        .transfer-arrow { transform: rotate(90deg); margin: 0 auto; }
        .action-row { flex-direction: column; }
        .action-row form, .btn-approve, .btn-reject { width: 100%; justify-content: center; }
    }
</style>

<!-- HERO SECTION -->
<section class="pindah-hero">
    <div class="pindah-hero-content">
        <div class="pindah-hero-badge">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
            Panel Verifikasi Pembina
        </div>
        <h2>Pengajuan <span>Pindah Ekskul</span></h2>
        <p>Kelola dan tinjau permohonan perpindahan ekstrakurikuler dari siswa yang kamu bina secara cepat dan terstruktur.</p>
    </div>
</section>

<!-- MAIN CONTAINER -->
<div class="pindah-container">

    @if (session('success'))
        <div class="custom-alert-success">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="custom-alert-danger">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="main-pindah-card">
        <div class="section-header-info">
            <h3 class="section-header-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>
                Daftar Permohonan Masuk
            </h3>
            <span class="count-pill">{{ $pengajuan->count() }} Pengajuan</span>
        </div>

        @forelse ($pengajuan as $item)
            @php
                $namaSiswa = $item->siswa->name ?? $item->siswa->nama ?? 'Siswa';
                $inisialSiswa = strtoupper(substr($namaSiswa, 0, 1));
            @endphp

            <div class="pengajuan-item">
                <div class="item-top-bar">
                    <div class="student-identity">
                        <div class="student-avatar">{{ $inisialSiswa }}</div>
                        <div>
                            <h5 class="student-name">{{ $namaSiswa }}</h5>
                            <div class="student-date">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                Diajukan: {{ $item->created_at?->format('d-m-Y H:i') ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <span class="status-badge-warning">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Menunggu Persetujuan
                    </span>
                </div>

                <div class="transfer-grid">
                    <div class="transfer-box">
                        <strong>Ekskul Asal</strong>
                        <span>{{ $item->ekskulAsal->nama_ekskul ?? '-' }}</span>
                    </div>

                    <div class="transfer-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" x2="19" y1="12" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </div>

                    <div class="transfer-box destination">
                        <strong>Ekskul Tujuan</strong>
                        <span>{{ $item->ekskulTujuan->nama_ekskul ?? '-' }}</span>
                    </div>
                </div>

                <div class="alasan-box">
                    <strong>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        Alasan Siswa
                    </strong>
                    <p class="mb-0">{{ $item->alasan ?? '-' }}</p>
                </div>

                <div class="action-row">
                    <form action="{{ route('pembina.pindah_ekskul.update', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Terima pengajuan pindah ekskul ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="diterima">

                        <button type="submit" class="btn-approve">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            Terima Pengajuan
                        </button>
                    </form>

                    <form action="{{ route('pembina.pindah_ekskul.update', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Tolak pengajuan pindah ekskul ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="ditolak">

                        <button type="submit" class="btn-reject">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                            Tolak Pengajuan
                        </button>
                    </form>
                </div>
            </div>

        @empty
            <div class="empty-state-box">
                <div class="empty-icon-circle">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
                </div>
                <h5>Belum Ada Pengajuan</h5>
                <p>Belum ada siswa yang mengajukan pindah dari ekskul binaanmu.</p>
            </div>
        @endforelse

    </div>

</div>
@endsection