@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-300 min-h-screen shadow-xl rounded-xl">
    <h1 class="text-2xl font-bold mb-6">Edit Catatan Dinas</h1>

    <form action="{{ route('admin.catatan.update', $catatan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Lokasi -->
        <div>
            <label class="block font-semibold">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $catatan->lokasi) }}" 
                class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <!-- Tanggal Berangkat -->
        <div>
            <label class="block font-semibold">Tanggal Berangkat</label>
            <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat', $catatan->tanggal_berangkat) }}" 
                class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <!-- Tanggal Pulang -->
        <div>
            <label class="block font-semibold">Tanggal Pulang</label>
            <input type="date" name="tanggal_pulang" value="{{ old('tanggal_pulang', $catatan->tanggal_pulang) }}" 
                class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <!-- Pegawai (No Induk) -->
        <div>
            <label class="block font-semibold">Pegawai (No Induk)</label>
            <select name="no_induk" class="w-full border rounded-lg px-3 py-2" required>
                @foreach($pegawai as $p)
                    <option value="{{ $p->no_induk }}" {{ $catatan->no_induk == $p->no_induk ? 'selected' : '' }}>
                        {{ $p->nama }} - {{ $p->no_induk }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2" required>
                <option value="Belum Berlangsung" {{ $catatan->status == 'Belum Berlangsung' ? 'selected' : '' }}>Belum Berlangsung</option>
                <option value="Berlangsung" {{ $catatan->status == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                <option value="Selesai" {{ $catatan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <!-- Status Tampil -->
        <div>
            <label class="block font-semibold">Status Tampil</label>
            <select name="status_tampil" class="w-full border rounded-lg px-3 py-2" required>
                <option value="Tertunda" {{ $catatan->status_tampil == 'Tertunda' ? 'selected' : '' }}>Tertunda</option>
                <option value="Disetujui" {{ $catatan->status_tampil == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ $catatan->status_tampil == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <!-- Catatan Lainnya -->
        <div>
            <label class="block font-semibold">Catatan Lainnya</label>
            <textarea name="catatan_lainnya" rows="4" 
                class="w-full border rounded-lg px-3 py-2">{{ old('catatan_lainnya', $catatan->catatan_lainnya) }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.catatan.index') }}" class="text-emerald-600 hover:underline">← Back</a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg">
                UPDATE
            </button>
        </div>
    </form>
</div>
@endsection
