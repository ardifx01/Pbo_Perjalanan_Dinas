<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    // protected $fillable = ['nip', 'nama', 'email', 'no_telepon', 'password'];
    public function Post()
    {
        return $this->hasMany(catatan_dinas::class, 'nip');
    }
}
