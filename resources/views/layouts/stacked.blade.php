@extends('index')

@section('title', 'Dashboard | BPS Kabupaten Kaimana')

@section('content')
<div class="px-6">
  <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Data Insight Kabupaten Kaimana</h1>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    {{-- === KESEJAHTERAAN === --}}
    <div class="bg-white rounded-lg shadow-sm">
      <h2 class="bg-blue-900 text-white text-center text-sm font-semibold py-2 rounded-t-md">KESEJAHTERAAN</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">25,1%</h5>
          <p class="text-sm text-gray-700">Persentase Penduduk Miskin</p>
        </div>
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">18,3 ribu</h5>
          <p class="text-sm text-gray-700">Jumlah Penduduk Miskin</p>
        </div>
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">500 Ribu</h5>
          <p class="text-xs text-gray-500">Rp/kapita/bulan</p>
          <p class="text-sm text-gray-700">Garis Kemiskinan</p>
        </div>
      </div>

      <div class="px-4 pb-4">
        <p class="text-sm text-gray-500 font-semibold mb-2">Tren Persentase Penduduk Miskin (2013–2023)</p>
        <canvas id="chartKesejahteraan" height="150"></canvas>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 pb-4">
        <!-- Kiri: Komposisi Pengeluaran -->
        <div class="p-2">
          <p class="text-sm text-gray-500 font-semibold mb-2">Komposisi Pengeluaran</p>
          <canvas id="chartKomposisi"></canvas>
        </div>

        <!-- Kanan: Harapan Lama Sekolah dan Rata-rata Lama Sekolah -->
        <div class="grid grid-rows-2 gap-4">
          <div class="p-2">
            <p class="text-sm text-gray-500 font-semibold mb-2">Harapan Lama Sekolah</p>
            <canvas id="chartHLS"></canvas>
          </div>
          <div class="p-2">
            <p class="text-sm text-gray-500 font-semibold mb-2">Rata-rata Lama Sekolah</p>
            <canvas id="chartRLS"></canvas>
          </div>
        </div>
      </div>
    </div>

    {{-- === KETENAGAKERJAAN === --}}
    <div class="bg-white rounded-lg shadow-sm">
      <h2 class="bg-blue-900 text-white text-center text-sm font-semibold py-2 rounded-t-md">KETENAGAKERJAAN</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">70,5%</h5>
          <p class="text-sm text-gray-700">Angka Partisipasi Angkatan Kerja</p>
        </div>
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">6,5%</h5>
          <p class="text-sm text-gray-700">Tingkat Pengangguran Terbuka</p>
        </div>
        <div class="p-4 border border-gray-200 rounded-lg shadow-sm text-center">
          <h5 class="text-xl font-bold text-gray-900">93,5%</h5>
          <p class="text-sm text-gray-700">Tingkat Kesempatan Kerja</p>
        </div>
      </div>

      <div class="px-4 pb-4">
        <p class="text-sm text-gray-500 font-semibold mb-2">Tren TPT dan APK (2013–2023)</p>
        <canvas id="chartKetenagakerjaan" height="150"></canvas>
      </div>

      {{-- Tambahan bawahnya --}}
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 pb-4">
        <div>
          <p class="text-sm text-gray-500 font-semibold mb-2">Jumlah Pekerja Menurut Sektor</p>
          <canvas id="chartSektor"></canvas>
        </div>
        <div>
          <p class="text-sm text-gray-500 font-semibold mb-2">Status Pekerjaan</p>
          <canvas id="chartStatusKerja"></canvas>
        </div>
        <div>
          <p class="text-sm text-gray-500 font-semibold mb-2">Tingkat Pendidikan</p>
          <canvas id="chartPendidikan"></canvas>
        </div>
        <div>
          <p class="text-sm text-gray-500 font-semibold mb-2">Pengangguran Terdidik</p>
          <canvas id="chartPengangguran"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Chart Scripts --}}
<script>
  new Chart(document.getElementById('chartKesejahteraan'), {
    type: 'line',
    data: {
      labels: [2013, 2015, 2017, 2019, 2021, 2023],
      datasets: [{
        label: 'Persentase Penduduk Miskin',
        data: [29, 27, 25.5, 24, 23, 25.1],
        borderColor: '#2563EB',
        backgroundColor: 'rgba(37,99,235,0.1)',
        tension: 0.4,
        fill: true
      }]
    },
    options: {
      plugins: { legend: { display: false }},
      scales: { y: { beginAtZero: false }}
    }
  });

  new Chart(document.getElementById('chartKomposisi'), {
    type: 'doughnut',
    data: {
      labels: ['Makanan (%)', 'Non-Makanan (%)'],
      datasets: [{
        data: [55, 45],
        backgroundColor: ['#3B82F6', '#1E3A8A']
      }]
    },
    options: {
      plugins: { legend: { position: 'bottom' }}
    }
  });

  new Chart(document.getElementById('chartHLS'), {
    type: 'line',
    data: {
      labels: [2013, 2015, 2017, 2019, 2021, 2023],
      datasets: [{
        label: 'Harapan Lama Sekolah',
        data: [1.2, 1.4, 1.6, 1.7, 1.8, 1.9],
        borderColor: '#1E3A8A',
        fill: false,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' }},
      scales: { y: { beginAtZero: false }}
    }
  });

  new Chart(document.getElementById('chartRLS'), {
    type: 'line',
    data: {
      labels: [2013, 2015, 2017, 2019, 2021, 2023],
      datasets: [{
        label: 'Rata-rata Lama Sekolah',
        data: [0.5, 0.7, 0.9, 1.0, 1.2, 1.4],
        borderColor: '#3B82F6',
        fill: false,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' }},
      scales: { y: { beginAtZero: false }}
    }
  });


  new Chart(document.getElementById('chartKetenagakerjaan'), {
    type: 'line',
    data: {
      labels: [2013, 2015, 2017, 2019, 2021, 2023],
      datasets: [
        {
          label: 'TPT',
          data: [55, 48, 50, 53, 52, 50],
          borderColor: '#1E3A8A',
          backgroundColor: 'rgba(30,58,138,0.1)',
          tension: 0.4,
          fill: true
        },
        {
          label: 'APK',
          data: [22, 27, 30, 38, 42, 45],
          borderColor: '#3B82F6',
          backgroundColor: 'rgba(59,130,246,0.1)',
          tension: 0.4,
          fill: true
        }
      ]
    },
    options: {
      plugins: {
        legend: {
          display: true,
          position: 'bottom',
          labels: { usePointStyle: true }
        }
      },
      scales: { y: { beginAtZero: false }}
    }
  });

  new Chart(document.getElementById('chartSektor'), {
    type: 'bar',
    data: {
      labels: ['Pertanian', 'Jasa', 'Industri'],
      datasets: [{
        data: [500, 300, 150],
        backgroundColor: ['#1E3A8A', '#3B82F6', '#60A5FA']
      }]
    },
    options: { indexAxis: 'y', plugins: { legend: { display: false }} }
  });

  new Chart(document.getElementById('chartStatusKerja'), {
    type: 'bar',
    data: {
      labels: ['Formal', 'Informal'],
      datasets: [{
        data: [40, 60],
        backgroundColor: ['#1E3A8A', '#3B82F6']
      }]
    },
    options: { indexAxis: 'y', plugins: { legend: { display: false }} }
  });

  new Chart(document.getElementById('chartPendidikan'), {
    type: 'bar',
    data: {
      labels: ['SD', 'SMP', 'SMA', 'Diploma', 'Universitas'],
      datasets: [{
        data: [15, 20, 30, 10, 25],
        backgroundColor: ['#60A5FA', '#3B82F6', '#2563EB', '#1E3A8A', '#1D4ED8']
      }]
    },
    options: {
      plugins: { legend: { display: false }}
    }
  });

  new Chart(document.getElementById('chartPengangguran'), {
    type: 'bar',
    data: {
      labels: ['SMK', 'Diploma', 'Formal'],
      datasets: [{
        data: [50, 30, 20],
        backgroundColor: ['#3B82F6', '#2563EB', '#1E3A8A']
      }]
    },
    options: {
      indexAxis: 'y',
      plugins: { legend: { display: false }}
    }
  });
</script>
@endsection
