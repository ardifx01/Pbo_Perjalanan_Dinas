<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catatan_dinas;
use Illuminate\Support\Facades\Auth;
class catatanDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(catatan_dinas $catatan)
    {
        $data = $catatan::all();
        return view('test00.crud.test' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test00.crud.testporm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        catatan_dinas::create(([
            'no_induk' => Auth::user()->no_induk, // FK ke pegawai
            'lokasi' => $request->lokasi,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,
            'status' => $request->status,
            'catatan_lainnya' => $request->catatan_lainnya,
        ]));
        return redirect()->route('admin.dashboard');
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
        $catatan = catatan_dinas::find($id);
        return view("test00.crud.testpormedit" ,compact('catatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, catatan_dinas $catatan)
    {
        dd($request->all()); // cek isi
        $catatan->update($request->all());
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        catatan_dinas::destroy($id);
        return redirect()->route('catatan.index');
    }
}
