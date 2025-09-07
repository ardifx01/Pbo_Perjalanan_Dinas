<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CatatanDinas;

class pegawai extends Authenticatable
{
    // protected $fillable = ['nip', 'nama', 'email', 'no_telepon', 'password'];
    use HasFactory, Notifiable;
    protected $table = "pegawai";
    protected $fillable = [
        'no_induk',
        'nama',
        'email',
        'no_telepon',
        'password',
        'role'
    ];
    public function Post()
    {
        return $this->hasMany(CatatanDinas::class, 'no_induk' ,'no_induk');
    }
}
