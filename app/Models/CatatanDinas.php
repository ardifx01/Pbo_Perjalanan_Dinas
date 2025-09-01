<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatatanDinas extends Model
{
    protected $table = "catatandinas";

    protected $fillable = [
        'lokasi',
        'tanggal_berangkat',
        'tanggal_pulang',
        'no_induk',
        'status',
        'catatan_lainnya'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'no_induk', 'no_induk');
    }
}

