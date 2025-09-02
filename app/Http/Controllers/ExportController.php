<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPegawai()
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }
}
