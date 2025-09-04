@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-300 min-h-screen shadow-xl rounded-xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Pegawai Baru</h1>

    <form action="{{ route('pegawai.catatan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Lokasi</label>
            <input type="text" name="lokasi" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Berangkat</label>
            <input type="email" name="tanggal_berangkat" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Pulang</label>
            <input type="text" name="tanggal_pulang" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Status</label>
            <input type="text" name="no_telepon" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.pegawai.list') }}" class="text-emerald-600 hover:underline">← Back</a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg">
                SUBMIT
            </button>
        </div>
    </form>
</div>
@endsection
