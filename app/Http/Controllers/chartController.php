<?php

namespace App\Http\Controllers;


use App\Models\pegawai;
use Illuminate\Http\Request;

class chartController extends Controller
{
    public function chartByRole()
    {
        $data = pegawai::selectRaw('role, COUNT(*) as total')
                                ->groupBy('role')
                                ->pluck('total', 'role');

        $labels = $data->keys();
        $totals = $data->values();

        return view('admin.dahsboard', compact('labels', 'totals'));
    }
}
