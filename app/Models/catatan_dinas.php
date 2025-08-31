<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catatan_dinas extends Model
{
    protected $table = "catatandinas";
        protected $fillable = [
        'no_induk',
        'lokasi',
        'tanggal_berangkat',
        'tanggal_pulang',
        'status',
        'catatan_lainnya'
    ];
    public function Pegawai()
    {
        return $this->belongsTo(pegawai::class, 'no_induk', 'no_induk');
    }
}
