@extends('index')

@section('title', 'Dashboard BPS Kabupaten Kaimana')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">

        <!-- Welcome Card -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang di Dashboard Data BPS Kabupaten Kaimana</h2>
            @auth
                <p class="text-gray-700 mt-2 mb-4">Halo, {{ Auth::user()->nama }}! Semoga harimu menyenangkan 😊</p>
            @endauth
            <p class="text-gray-700">
                Website ini merupakan sistem informasi statistik Kabupaten Kaimana yang menyajikan data visual interaktif dan hasil analisis untuk memudahkan pemantauan indikator pembangunan daerah.
            </p>
        </div>

        <!-- Outlook Kabupaten Kaimana -->
        <div class="bg-white rounded-lg shadow p-6 mb-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Outlook Kabupaten Kaimana</h2>
            <p class="text-gray-700 text-justify">
                Kabupaten Kaimana secara astronomis terletak antara 02°90’ - 04°20’ Lintang Selatan dan 132°75’ - 135°15’ Bujur Timur, tepat di bawah garis khatulistiwa dengan ketinggian 0 - 100 meter di atas permukaan laut. Kabupaten ini terdiri dari 676 pulau dengan luas wilayah mencapai 18.500 km², menjadikannya wilayah terluas kedua di Papua Barat setelah Kabupaten Teluk Bintuni. Topografinya beragam, mencakup pesisir, hutan, dan pegunungan. Secara administratif, Kaimana terbagi dalam tujuh distrik, yaitu Buruway, Teluk Arguni Atas, Teluk Arguni Bawah, Kaimana, Kambrau, Teluk Etna, dan Yamor, dengan Distrik Teluk Etna sebagai wilayah terluas dan Distrik Kambrau sebagai yang terkecil.
            </p>
            <p class="text-gray-700 text-justify mt-4">
                Pada Desember 2024, realisasi Pendapatan Daerah Kabupaten Kaimana mencapai Rp1.243.920.347.047,94. Total penduduk berusia 15 tahun ke atas, sebanyak 48.553 orang tercatat dalam Survei Angkatan Kerja Nasional Agustus 2024, dengan 66,95 persen termasuk angkatan kerja dan 33,05 persen tergolong bukan angkatan kerja. Dari 32.508 penduduk angkatan kerja, 95,04 persen di antaranya bekerja, sementara Tingkat Pengangguran Terbuka (TPT) sebesar 4,96 persen, yang berarti terdapat sekitar 4–5 orang pengangguran dari setiap 100 angkatan kerja.
            </p>
            <!-- Peta Kabupaten Kaimana dengan Zoom Lebih Luas -->
            <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Peta Lokasi Kabupaten Kaimana</h3>
            <div class="w-full h-96">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510639.49193111296!2d132.5!3d-3.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5612c8b844d255%3A0xe3791f73f52f79e0!2sKabupaten%20Kaimana%2C%20Papua%20Barat!5e0!3m2!1sid!2sid!4v1720155403890!5m2!1sid!2sid" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Jelajahi Data Lebih Lanjut di Menu Berikut</h2>
        <!-- Navigation Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Dashboard -->
            <a href="{{ route('view.dashboard') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center hover:ring-2 hover:ring-blue-600">
                <div class="mb-2">
                    <img src="{{ asset('dashboard.png') }}" alt="Dashboard Icon" class="mx-auto w-10 h-10">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Dashboard</h3>
                <p class="text-sm text-gray-600 mt-1">Lihat ringkasan data visual Kabupaten Kaimana</p>
            </a>

            <!-- PDRB -->
            <a href="{{ route('view.pdrb') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center hover:ring-2 hover:ring-blue-600">
                <div class="mb-2">
                    <img src="{{ asset('gdp.png') }}" alt="PDRB Icon" class="mx-auto w-10 h-10">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">PDRB</h3>
                <p class="text-sm text-gray-600 mt-1">Lihat Statistik dan Struktur Ekonomi Kabupaten Kaimana</p>
            </a>

            <!-- Kesejahteraan -->
            <a href="{{ route('view.kesejahteraan') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center hover:ring-2 hover:ring-blue-600">
                <div class="mb-2">
                    <img src="{{ asset('capital.png') }}" alt="Kesejahteraan Icon" class="mx-auto w-10 h-10">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Kesejahteraan</h3>
                <p class="text-sm text-gray-600 mt-1">Lihat Hasil Analisis Indikator Kesejahteraan Kabupaten Kaimana</p>
            </a>

            <!-- Ketenagakerjaan -->
            <a href="#" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center hover:ring-2 hover:ring-blue-600">
                <div class="mb-2">
                    <img src="{{ asset('workers.png') }}" alt="Ketenagakerjaan Icon" class="mx-auto w-10 h-10">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Ketenagakerjaan</h3>
                <p class="text-sm text-gray-600 mt-1">Lihat Hasil Analisis Indikator Ketenagakerjaan Kabupaten Kaimana</p>
            </a>
        </div>

    </div>
</div>
@endsection
