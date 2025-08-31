@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    @foreach ($data as $_data)
    <div>
        {{ $_data->id }} | {{ $_data->lokasi }}
        <a href="{{ route('catatan.edit', $_data->id) }}">Edit</a>
        <form action="{{ route('catatan.destroy', $_data->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </div>
@endforeach

@endsection
