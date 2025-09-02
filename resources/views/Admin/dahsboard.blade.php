@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Selamat datang Admin</h1>

    <!-- Card Utama -->
    <div class="bg-emerald-400 rounded-lg shadow-md p-4 mb-6">
        <h2 class="text-center text-white font-semibold mb-4">
            Jumlah Pegawai yang melakukan Request
        </h2>
        <div class="bg-white rounded-lg h-64 flex items-center justify-center">
            <span class="text-gray-400">Belum ada data ditampilkan</span>
        </div>
    </div>

    <!-- Grid Bawah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jumlah Pegawai -->
        <div class="bg-emerald-400 rounded-lg shadow-md p-4">
            <h3 class="text-center text-white font-semibold mb-4">
                Jumlah Pegawai
            </h3>
            <div class="bg-white rounded-lg h-48 flex items-center justify-center">
                <canvas id="pegawaiChart"></canvas>
            </div>
        </div>

        <!-- Export Data -->
        <div class="bg-emerald-400 rounded-lg shadow-md p-4 flex flex-col items-center justify-center">
            <h3 class="text-center text-white font-semibold mb-4">
                Export data perjalanan pegawai
            </h3>
            <a href="{{ route('employees.export') }}"
            class="bg-green-900 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                EKSPOR
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pegawaiChart').getContext('2d');
    const pegawaiChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: [{
                label: 'Jumlah Pegawai',
                data: [],
                backgroundColor: ['rgba(54, 162, 235, 0.7)'],
                borderWidth: 1
            }]
        }
    });

    async function fetchPegawaiData() {
        const response = await fetch('/api/employees/count');
        const data = await response.json();

        pegawaiChart.data.labels = data.labels;
        pegawaiChart.data.datasets[0].data = data.values;
        pegawaiChart.update();
    }

    fetchPegawaiData();
</script>
@endsection
