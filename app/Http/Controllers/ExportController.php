<?php

namespace App\Http\Controllers;

use \App\Exports\riwayatcatatandinas;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportCatatandinas()
    {
        return Excel::download(new riwayatcatatandinas, 'Riwayat_Catatan_Dinas.xlsx');
    }
}
