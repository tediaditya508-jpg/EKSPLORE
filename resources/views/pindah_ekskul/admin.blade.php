
@extends('layouts.pindah')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Pengelolaan Pindah Ekskul</h2>
        <p class="text-muted mb-0">
            Pantau dan kelola seluruh pengajuan perpindahan ekstrakurikuler siswa.
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

                        @if ($item->status === 'menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif ($item->status === 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <strong>Ekskul Asal:</strong>
                        {{ $item->ekskulAsal->nama_ekskul ?? '-' }}
                    </div>

                    <div class="mb-2">
                        <strong>Ekskul Tujuan:</strong>
                        {{ $item->ekskulTujuan->nama_ekskul ?? '-' }}
                    </div>

                    <div class="mb-2">
                        <strong>Alasan:</strong>
                        {{ $item->alasan }}
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong>
                        {{ ucfirst($item->status) }}
                    </div>

                    <small class="text-muted d-block mb-3">
                        Diajukan:
                        {{ $item->created_at?->format('d-m-Y H:i') }}
                    </small>

                    @if ($item->status === 'menunggu')
                        <div class="d-flex gap-2 flex-wrap">

                            <form action="{{ route('admin.pindah_ekskul.update', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Terima pengajuan pindah ekskul ini?')">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="diterima">

                                <button type="submit" class="btn btn-success btn-sm">
                                    Terima
                                </button>
                            </form>

                            <form action="{{ route('admin.pindah_ekskul.update', $item->id) }}"
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
                    @endif

                </div>
            @empty
                <div class="text-center py-5">
                    <h5 class="fw-bold">Belum Ada Pengajuan</h5>
                    <p class="text-muted mb-0">
                        Belum ada pengajuan pindah ekstrakurikuler dari siswa.
                    </p>
                </div>
            @endforelse

        </div>
    </div>

</div>
@endsection