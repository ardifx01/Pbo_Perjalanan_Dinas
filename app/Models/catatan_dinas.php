<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catatan_dinas extends Model
{
    protected $table = "catatandinas";
    public function Pegawai()
    {
        return $this->belongsTo(pegawai::class, 'nip');
    }
}
