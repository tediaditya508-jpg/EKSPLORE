<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('ekstrakurikuler')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.index', [
            'jadwal' => $jadwal,
        ]);
    }
}