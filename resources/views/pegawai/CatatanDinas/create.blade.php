@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-300 min-h-screen shadow-xl rounded-xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Perjalanan baru</h1>

    <form action="{{ route('pegawai.catatan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Lokasi</label>
            <input type="text" name="lokasi" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Berangkat</label>
            <input type="date" name="tanggal_berangkat" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Pulang</label>
            <input type="date" name="tanggal_pulang" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold" for="status">Status</label>
            <select name="status" id="status" class="border rounded p-2 w-full">
                <option value="">-- Pilih Status --</option>
                <option value="Belum Berlangsung">Belum Berlangsung</option>
                <option value="Berlangsung">Berlangsung</option>
                <option value="Selesai">Selesai</option>
            </select>         
        </div>

            <div>
            <label class="block font-semibold">Catatan Lainnya</label>
            <input type="text" name="catatan_lainnya" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('pegawai.catatan.index') }}" class="text-emerald-600 hover:underline">← Back</a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg">
                SUBMIT
            </button>
        </div>
    </form>
</div>
@endsection
