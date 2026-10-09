<?php
namespace App\Http\Controllers\Admin;
use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportSiswaController extends Controller
{
    public function export()
    {
        return Excel::download(
            new SiswaExport,
            'data-siswa-eksplore.xlsx'
        );
    }
}