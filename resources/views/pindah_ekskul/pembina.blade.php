
@extends('layouts.pindah')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Pengajuan Pindah Ekskul</h2>
        <p class="text-muted mb-0">
            Kelola permohonan pindah ekstrakurikuler dari siswa yang kamu bina.
        </p>
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

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            @forelse ($pengajuan as $item)
                <div class="border rounded-3 p-3 mb-3">

                    <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
                        <h5 class="fw-bold mb-0">
                            {{ $item->siswa->name ?? $item->siswa->nama ?? 'Siswa' }}
                        </h5>

                        <span class="badge bg-warning text-dark">
                            Menunggu Persetujuan
                        </span>
                    </div>

                    <div class="mb-2">
                        <strong>Ekskul Asal:</strong>
                        {{ $item->ekskulAsal->nama_ekskul ?? '-' }}
                    </div>

                    <div class="mb-2">
                        <strong>Ekskul Tujuan:</strong>
                        {{ $item->ekskulTujuan->nama_ekskul ?? '-' }}
                    </div>

                    <div class="mb-3">
                        <strong>Alasan Siswa:</strong>
                        <p class="mb-0">{{ $item->alasan }}</p>
                    </div>

                    <small class="text-muted d-block mb-3">
                        Diajukan:
                        {{ $item->created_at?->format('d-m-Y H:i') }}
                    </small>

                    <div class="d-flex gap-2 flex-wrap">
                        <form action="{{ route('pembina.pindah_ekskul.update', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Terima pengajuan pindah ekskul ini?')">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="status" value="diterima">

                            <button type="submit" class="btn btn-success btn-sm">
                                Terima
                            </button>
                        </form>

                        <form action="{{ route('pembina.pindah_ekskul.update', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Tolak pengajuan pindah ekskul ini?')">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="status" value="ditolak">

                            <button type="submit" class="btn btn-danger btn-sm">
                                Tolak
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="text-center py-5">
                    <h5 class="fw-bold">Belum Ada Pengajuan</h5>
                    <p class="text-muted mb-0">
                        Belum ada siswa yang mengajukan pindah dari ekskul binaanmu.
                    </p>
                </div>
            @endforelse

        </div>
    </div>

</div>
@endsection