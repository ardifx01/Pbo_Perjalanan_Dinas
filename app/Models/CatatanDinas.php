<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\pegawai;

class CatatanDinas extends Model
{
    protected $table = "catatandinas";

    protected $fillable = [
        'lokasi',
        'tanggal_berangkat',
        'tanggal_pulang',
        'no_induk',
        'status',
        'status_tampil',
        'catatan_lainnya'
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'no_induk', 'no_induk');
    }
}

