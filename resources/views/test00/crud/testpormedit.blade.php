@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
   <form action="{{ route('catatan.update', $catatan->id) }}" method="POST" class="bg-red-500 p-4">
    @csrf
    @method('PUT') {{-- penting untuk update --}}

    <input type="text" name="lokasi" 
        value="{{ $catatan->lokasi }}" 
        placeholder="Lokasi"
        required class="block mb-2 p-2">

    <input type="date" name="tanggal_berangkat" 
        value="{{ $catatan->tanggal_berangkat }}" 
        required class="block mb-2 p-2">

    <input type="date" name="tanggal_pulang" 
        value="{{ $catatan->tanggal_pulang }}" 
        required class="block mb-2 p-2">

    <select name="status" required class="block mb-2 p-2">
        <option value="">-- Pilih --</option>
        <option value="belum" {{ $catatan->status == 'belum' ? 'selected' : '' }}>Belum</option>
        <option value="berlangsung" {{ $catatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
        <option value="selesai" {{ $catatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select>

    <input type="text" name="catatan_lainnya" 
        value="{{ $catatan->catatan_lainnya }}" 
        placeholder="Catatan lainnya"
        required class="block mb-2 p-2">

    <button type="submit" class="bg-white text-black p-2 rounded">Update</button>
</form>

@endsection
