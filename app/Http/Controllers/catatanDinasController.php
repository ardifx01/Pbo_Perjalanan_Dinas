<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanDinas;
use Illuminate\Support\Facades\Auth;
use App\Models\pegawai;
class catatanDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CatatanDinas $catatan)
    {
        $data = $catatan::all();
        return view('pegawai.CatatanDinas.index' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.CatatanDinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CatatanDinas::create(([
            'no_induk' => Auth::user()->no_induk, // FK ke pegawai
            'lokasi' => $request->lokasi,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,
            'status' => $request->status,
            'catatan_lainnya' => $request->catatan_lainnya,
        ]));
        return redirect()->route('pegawai.catatan.index');
        //w
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catatan = CatatanDinas::find($id);
        $pegawai = pegawai::all();
        return view("pegawai.CatatanDinas.edit" ,compact('catatan', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, String $id)
    {
        $catatan = CatatanDinas::find($id);
        $catatan->update($request->all());
        return redirect()->route('pegawai.catatan.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CatatanDinas::destroy($id);
        return redirect()->route('pegawai.catatan.index');
    }
}
