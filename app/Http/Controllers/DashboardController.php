<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::latest()
            ->take(6)
            ->get();

        $jadwalHariIni = Jadwal::with('ekstrakurikuler')
            ->orderBy('jam_mulai')
            ->get();

        $pengumuman = Pengumuman::latest('tanggal')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'ekskul',
            'jadwalHariIni',
            'pengumuman'
        ));
    }
}