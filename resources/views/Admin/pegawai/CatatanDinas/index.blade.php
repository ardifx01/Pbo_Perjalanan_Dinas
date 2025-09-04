@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-300 min-h-screen shadow-xl rounded-xl">
    <h1 class="text-2xl font-bold mb-6">Daftar Pegawai</h1>

    <!-- Tombol Create -->
    <div class="mb-4">
        <a href="{{ route('catatan.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded-lg">
            <i class="fas fa-user-plus"></i> Create Data
        </a>
    </div>

    <!-- Tabel Pegawai -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-emerald-400 text-white">
                    <th class="px-4 py-2 border">NO</th>
                    <th class="px-4 py-2 border">NAMA</th>
                    <th class="px-4 py-2 border">EMAIL</th>
                    <th class="px-4 py-2 border">NIP</th>
                    <th class="px-4 py-2 border">PASSWORD</th>
                    <th class="px-4 py-2 border">NO TELP</th>
                    <th class="px-4 py-2 border">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $p)
                    <tr id="row-{{ $p->id }}" class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border" id="nama-{{ $p->id }}">{{ $p->nama }}</td>
                        <td class="px-4 py-2 border" id="email-{{ $p->id }}">{{ $p->email }}</td>
                        <td class="px-4 py-2 border">{{ $p->no_induk }}</td>
                        <td class="px-4 py-2 border">********</td>
                        <td class="px-4 py-2 border" id="telp-{{ $p->id }}">{{ $p->no_telepon }}</td>
                        <td class="px-4 py-2 border text-center">
                            <button onclick="enableEdit({{ $p->id }})" id="edit-{{ $p->id }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg"><a href="{{ route('admin.pegawai.edit') }}">Edit</a></button>
                            <button onclick="saveEdit({{ $p->id }})" id="save-{{ $p->id }}" class="hidden bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg">Save</button>
                            <button onclick="cancelEdit({{ $p->id }})" id="cancel-{{ $p->id }}" class="hidden bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-lg">Cancel</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data perjalanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
function enableEdit(id) {
    let nama = document.getElementById('nama-' + id).innerText;
    let email = document.getElementById('email-' + id).innerText;
    let telp = document.getElementById('telp-' + id).innerText;

    document.getElementById('nama-' + id).innerHTML = `<input type="text" id="input-nama-${id}" value="${nama}" class="border rounded px-2">`;
    document.getElementById('email-' + id).innerHTML = `<input type="email" id="input-email-${id}" value="${email}" class="border rounded px-2">`;
    document.getElementById('telp-' + id).innerHTML = `<input type="text" id="input-telp-${id}" value="${telp}" class="border rounded px-2">`;

    document.getElementById('edit-' + id).classList.add('hidden');
    document.getElementById('save-' + id).classList.remove('hidden');
    document.getElementById('cancel-' + id).classList.remove('hidden');
}

function cancelEdit(id) {
    location.reload(); // langsung reload halaman
}

function saveEdit(id) {
    let nama = document.getElementById('input-nama-' + id).value;
    let email = document.getElementById('input-email-' + id).value;
    let telp = document.getElementById('input-telp-' + id).value;

    fetch(`/admin/pegawai/${id}`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nama, email, no_telepon: telp })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        }
    })
    .catch(err => console.error(err));
}
</script>
@endsection
