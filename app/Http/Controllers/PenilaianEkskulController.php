<?php

namespace App\Http\Controllers;

use App\Models\AnggotaEkskul;
use App\Models\PenilaianEkskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PenilaianEkskulController extends Controller
{
    /**
     * Menampilkan anggota dari ekstrakurikuler
     * yang dibina oleh Pembina yang sedang login.
     */
    public function index()
    {
        $pembina = Auth::user();

        $anggota = AnggotaEkskul::with([
                'siswa',
                'ekstrakurikuler',
                'penilaian' => function ($query) {
                    $query->where('semester', 'Ganjil')
                        ->where('tahun_ajaran', '2026/2027');
                },
            ])
            ->where('status', 'aktif')
            ->whereHas('ekstrakurikuler', function ($query) use ($pembina) {
                $query->where('pembina_id', $pembina->id);
            })
            ->orderBy('ekskul_id')
            ->get();

        return view('pembina.penilaian', compact('anggota'));
    }

    /**
     * Menyimpan atau memperbarui penilaian anggota.
     */
    public function store(Request $request, $anggotaId)
    {
        $pembina = Auth::user();

        $anggota = AnggotaEkskul::where('id', $anggotaId)
            ->where('status', 'aktif')
            ->whereHas('ekstrakurikuler', function ($query) use ($pembina) {
                $query->where('pembina_id', $pembina->id);
            })
            ->firstOrFail();

        $validated = $request->validate([
            'semester' => [
                'required',
                Rule::in(['Ganjil', 'Genap']),
            ],
            'tahun_ajaran' => [
                'required',
                'regex:/^\d{4}\/\d{4}$/',
            ],
            'kehadiran' => ['required', 'integer', 'min:0', 'max:100'],
            'keaktifan' => ['required', 'integer', 'min:0', 'max:100'],
            'kedisiplinan' => ['required', 'integer', 'min:0', 'max:100'],
            'tanggung_jawab' => ['required', 'integer', 'min:0', 'max:100'],
            'keterampilan' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $nilaiAkhir = (
            ($validated['kehadiran'] * 30) +
            ($validated['keaktifan'] * 20) +
            ($validated['kedisiplinan'] * 20) +
            ($validated['tanggung_jawab'] * 10) +
            ($validated['keterampilan'] * 20)
        ) / 100;

        PenilaianEkskul::updateOrCreate(
            [
                'anggota_ekskul_id' => $anggota->id,
                'semester' => $validated['semester'],
                'tahun_ajaran' => $validated['tahun_ajaran'],
            ],
            [
                'pembina_id' => $pembina->id,
                'kehadiran' => $validated['kehadiran'],
                'keaktifan' => $validated['keaktifan'],
                'kedisiplinan' => $validated['kedisiplinan'],
                'tanggung_jawab' => $validated['tanggung_jawab'],
                'keterampilan' => $validated['keterampilan'],
                'nilai_akhir' => $nilaiAkhir,
            ]
        );

        return redirect()
            ->route('pembina.penilaian')
            ->with('success', 'Penilaian berhasil disimpan.');
    }
}
