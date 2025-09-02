@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    <form action="{{ route('catatan.store') }}" method="post" class="bg-red-500">
        @csrf
        <input type="text" name="lokasi" required>
        <input type="date" name="tanggal_berangkat" required>
        <input type="date" name="tanggal_pulang" required>
        <select name="status" required>
            <option value="">-- Pilih --</option>
            <option value="belum">Belum</option>
            <option value="berlangsung">Berlangsung</option>
            <option value="selesai">Selesai</option>
        </select>
        <input type="text" name="catatan_lainnya" required>
        <input type="submit">
    </form>
@endsection
