<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.dashboard');
    }
    public function count()
    {
        $total = \App\Models\pegawai::count();

        return response()->json([
            'labels' => ['Pegawai'],
            'values' => [$total],
        ]);
    }

//page daftar_pegawai (admin)
    public function list()
    {
        $pegawai = pegawai::all();
        return view('Admin.pegawai.index', compact('pegawai'));
    }
    public function create()
    {
        return view('Admin.pegawai.create');
    }

    public function edit()
    {
        $pegawai = pegawai::all();
        return view('Admin.pegawai.edit', compact('pegawai'));
    }
//form tambah pegawai (admin)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai,email',
            'no_induk' => 'required|unique:pegawai,no_induk',
            'no_telepon' => 'required|string|max:20',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_induk' => $request->no_induk,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make('1234'), // default password
            'role' => 'pegawai'
        ]);

        return redirect()->route('admin.pegawai.list')->with('success', 'Pegawai berhasil ditambahkan!');
    }



//form inline-edit (masih eror)
    public function update(Request $request, $id)
{
    $pegawai = Pegawai::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:pegawai,email,',
        'no_telepon' => 'required|string|max:20',
    ]);

    $pegawai->update($request->only(['nama', 'email', 'no_telepon']));

    return redirect()->route('admin.pegawai.list');
}

}
