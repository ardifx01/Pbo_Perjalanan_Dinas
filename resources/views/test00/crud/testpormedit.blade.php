@extends('layouts.app')

@section('title', 'Edit Catatan Dinas')

@section('content')
<form action="{{ route('catatan.update', $catatan->id) }}" method="POST" class="bg-red-500 p-4">
    @csrf
    @method('PUT') {{-- wajib untuk update --}}

    <input type="text" name="lokasi" 
        value="{{ old('lokasi', $catatan->lokasi) }}" 
        placeholder="Lokasi"
        required class="block mb-2 p-2">

    <input type="date" name="tanggal_berangkat" 
        value="{{ old('tanggal_berangkat', $catatan->tanggal_berangkat) }}" 
        required class="block mb-2 p-2">

    <input type="date" name="tanggal_pulang" 
        value="{{ old('tanggal_pulang', $catatan->tanggal_pulang) }}" 
        required class="block mb-2 p-2">

    <select name="status" required class="block mb-2 p-2">
        <option value="">-- Pilih --</option>
        <option value="belum" {{ $catatan->status == 'belum' ? 'selected' : '' }}>Belum</option>
        <option value="berlangsung" {{ $catatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
        <option value="selesai" {{ $catatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select>

    <input type="text" name="catatan_lainnya" 
        value="{{ old('catatan_lainnya', $catatan->catatan_lainnya) }}" 
        placeholder="Catatan lainnya"
        required class="block mb-2 p-2">

    <select name="no_induk" required class="block mb-2 p-2">
        <option value="">-- Pilih Pegawai --</option>
        @foreach ($pegawai as $p)
            <option value="{{ $p->no_induk }}" 
                {{ $catatan->no_induk == $p->no_induk ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="bg-white text-black p-2 rounded">Update</button>
</form>
@endsection
