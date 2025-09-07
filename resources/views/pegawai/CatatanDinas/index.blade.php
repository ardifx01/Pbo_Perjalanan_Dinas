@extends('layouts.app')

@section('title', 'Daftar Catatan Dinas')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Daftar Catatan Dinas</h1>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Lokasi</th>
                <th class="border px-4 py-2">Tanggal Berangkat</th>
                <th class="border px-4 py-2">Tanggal Pulang</th>
                <th class="border px-4 py-2">No Induk</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Catatan Lainnya</th>
            </tr>
        </thead>    
        <tbody>
            @forelse($data as $index => $item)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1}}</td>
                    <td class="border px-4 py-2">{{ $item->lokasi }}</td>
                    <td class="border px-4 py-2">{{ $item->tanggal_berangkat }}</td>
                    <td class="border px-4 py-2">{{ $item->tanggal_pulang }}</td>
                    <td class="border px-4 py-2">{{ $item->no_induk }}</td>
                    <td class="border px-4 py-2">
                        @if($item->status == 'Belum Berlangsung')
                            <span class="text-yellow-600 font-semibold">{{ $item->status }}</span>
                        @elseif($item->status == 'Berlangsung')
                            <span class="text-blue-600 font-semibold">{{ $item->status }}</span>
                        @else
                            <span class="text-green-600 font-semibold">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $item->catatan_lainnya }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center border px-4 py-2">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
