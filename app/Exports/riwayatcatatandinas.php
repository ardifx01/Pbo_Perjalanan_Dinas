<?php

namespace App\Exports;

use App\Models\pegawai;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\CatatanDinas;

class riwayatcatatandinas implements FromCollection
{
    public function collection()
    {
        return CatatanDinas::all();
    }
}
