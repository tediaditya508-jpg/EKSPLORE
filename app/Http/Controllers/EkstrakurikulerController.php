<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::latest()->get();

        return view('ekskul.index', compact('ekskul'));
    }

    public function show($id)
    {
        $ekskul = Ekstrakurikuler::with([
            'jadwals',
            'prestasi',
            'galeri'
        ])->findOrFail($id);

        return view('ekskul.show', compact('ekskul'));
    }
}