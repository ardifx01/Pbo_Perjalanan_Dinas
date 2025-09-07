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
        $pegawai = Auth::guard('pegawai')->user();
        if(Auth::guard('pegawai')->check() && Auth::guard('pegawai')->user()->role === 'pegawai')
        {
            $data = $catatan::where('no_induk', $pegawai->no_induk)->get();
            return view('pegawai.CatatanDinas.index' ,compact('data'));
        }
        else
        {
            $data = CatatanDinas::whereHas('pegawai', function ($q) {$q->where('role', 'pegawai');})->get();
            return view('Admin.catatan.index' ,compact('data'));
        }
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
       $pegawai = Auth::guard('pegawai')->user();
        CatatanDinas::create(([
            'no_induk' => $pegawai->no_induk, // FK ke pegawai
            'lokasi' => $request->lokasi,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,
            'status' => $request->status,
            'catatan_lainnya' => $request->catatan_lainnya,
            'status_tampil' => 'Tertunda',
        ]));
        return redirect()->route('pegawai.catatan.index');
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
    public function edit(String $id)
    {
        $catatan = CatatanDinas::findOrFail($id);
        $pegawai = pegawai::all();
        // dd($catatan);
        return view("Admin.catatan.edit", compact('catatan', 'pegawai'));
        
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, String $id)
    {
        $catatan = CatatanDinas::findOrFail($id);
        $catatan->update($request->all());

        return redirect()->route('admin.catatan.index')
        ->with('success', 'Data berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $catatan = CatatanDinas::findOrFail($id);

    // Hapus data
        $catatan->delete();

        return redirect()->route('admin.catatan.index')->with('success', 'Data berhasil dihapus!');
    }

    public function Disetujui(String $id)
    {
        $catatan = CatatanDinas::findOrFail($id);
        $catatan->update([
            'status_tampil' => 'Disetujui',
        ]);

        return back()->with('success', 'Catatan dinas disetujui.');
    }

    public function Ditolak(Request $request, String $id)
    {
        $catatan = CatatanDinas::findOrFail($id);
        $catatan->update([
            'status_tampil' => 'Ditolak',
        ]);

        return back()->with('error', 'Catatan dinas ditolak.');
    }
}
