<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;

class PegawaiController extends Controller
{
    // Ambil semua pegawai
    public function index()
    {
        return response()->json(pegawai::all());
    }

    // Ambil total pegawai
public function count()
{
    $total = \App\Models\pegawai::count();

    return response()->json([
        'labels' => ['Pegawai'],
        'values' => [$total],
    ]);
}
}
