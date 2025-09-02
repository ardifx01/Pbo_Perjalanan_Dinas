<?php

namespace App\Exports;

use App\Models\pegawai; // pastikan sesuai dengan model kamu
use Maatwebsite\Excel\Concerns\FromCollection;

class PegawaiExport implements FromCollection
{
    public function collection()
    {
        return pegawai::all();
    }
}
