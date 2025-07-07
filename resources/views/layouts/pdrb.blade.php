@extends('index')

@section('title', 'Analisis PDRB | BPS Kabupaten Kaimana')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Sidebar Navigasi -->
        <div class="lg:w-1/4">
            <div class="bg-white rounded-lg shadow p-4 sticky top-20">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Daftar Isi</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-800 text-sm">
                    <li><a href="#satu" class="hover:underline">1. Analisis Location Quotient & Shift Share</a></li>
                    <li><a href="#dua" class="hover:underline">2. LQ dan Shift Share Non Pertambangan & Industri Pengolahan</a></li>
                    <li><a href="#tiga" class="hover:underline">3. Pertumbuhan PDRB vs Tenaga Kerja</a></li>
                </ul>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="lg:w-3/4">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Analisis PDRB</h2>

                <!-- BAGIAN 1 -->
                <div id="satu">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">1. Analisis Location Quotient & Shift Share</h3>

                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Location Quotient</h4>
                    <p class="text-gray-700 mb-4 text-justify">
                        Penentuan sektor basis dan non basis dipengaruhi oleh pendapatan lapangan usaha itu sendiri dan juga PDRB total dari seluruh lapangan usaha itu. Metode yang digunakan untuk melihat kontribusi suatu sektor terhadap PDRB adalah metode <em>Location Quotient (LQ)</em>.
                    </p>

                    <div class="overflow-x-auto mb-6">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-xs uppercase bg-blue-100 text-gray-600 text-center">
                                <tr>
                                    <th class="px-6 py-3 text-left">PDRB Lapangan Usaha</th>
                                    <th class="px-6 py-3">LQ Share</th>
                                    <th class="px-6 py-3">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @php
                                    $data = [
                                        ['A. Pertanian, Kehutanan, dan Perikanan', '4,11', 'Basis'],
                                        ['H. Transportasi dan Pergudangan', '3,44', 'Basis'],
                                        ['G. Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor', '2,95', 'Basis'],
                                        ['R,S,T,U. Jasa lainnya', '2,86', 'Basis'],
                                        ['F. Konstruksi', '2,64', 'Basis'],
                                        ['O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib', '2,59', 'Basis'],
                                        ['D. Pengadaan Listrik dan Gas', '2,47', 'Basis'],
                                        ['L. Real Estate', '2,30', 'Basis'],
                                        ['J. Informasi dan Komunikasi', '2,09', 'Basis'],
                                        ['I. Penyediaan Akomodasi dan Makan Minum', '1,99', 'Basis'],
                                        ['Q. Jasa Kesehatan dan Kegiatan Sosialt', '1,81', 'Basis'],
                                        ['P. Jasa Pendidikan', '1,60', 'Basis'],
                                        ['K. Jasa Keuangan dan Asuransi', '1,56', 'Basis'],
                                        ['M,N. Jasa Perusahaan', '1,49', 'Basis'],
                                        ['E. Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang', '0,69', 'Non Basis'],
                                        ['C. Industri Pengolahan', '0,14', 'Non Basis'],
                                        ['B. Pertambangan dan Penggalian', '0,05', 'Non Basis'],
                                    ];
                                @endphp

                                @foreach ($data as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $row[0] }}</td>
                                        <td class="px-6 py-4 text-center">{{ $row[1] }}</td>
                                        <td class="px-6 py-4 text-center">{{ $row[2] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p class="text-gray-700 mb-4 text-justify">
                        Menurut analisis LQ Share pertanian memiliki nilai paling tinggi, diikuti dengan sektor transportasi dan perdagangan serta sektor perdagangan besar dan ecaran;Reparasi Mobil dan Sepeda Motor. Sedangkan sektor yang dikategorikan Non Basis adalah Pengadaan Air, Pengelolaan Sampah, limbah dan Daur ulang diikuti sektor Industri Pengolahan dan sektor Pertambangan dan Penggalian. Tingginya potensi pertanian di kaimana dibandingkan landscape Provinsi papua Barat menandakan perlunya perhatian peningkatan nilai tambah pada sektor pertanian. Salah satu alasannya banyak sektor basis adalah PDRB Provinsi ditopang oleh Pertambangan sebesar 24,49% dan industri pengolahan 43,28% sedangkan kaimana sendiri 2 sektor tersebut secara akumulatif hanya menyumbangkan 7,48%.
                    </p>
                    <div class="text-gray-700 mb-4 text-justify">
                        <strong>Saran Kebijakan</strong>
                        <ul class="list-disc list-inside mt-2">
                            <li>Pelatihan yang efektif di sektor pertanian</li>
                            <li>Modernisasi peralatan pertanian</li>
                            <li>Penyaluran produk pertanian ke luar daerah</li>
                        </ul>
                    </div>

                    <h4 class="text-lg font-semibold text-gray-800 mb-2 mt-8">Shift Share</h4>
                    <p class="text-gray-700 text-justify mb-6">
                        Kuadran I (<em>PS positif dan DS positif</em>) menunjukkan wilayah progresif maju.<br>
                        Kuadran II (<em>PS positif dan DS negatif</em>) disebut depressed region yang berpotensi.<br>
                        Kuadran III (<em>PS dan DS negatif</em>) adalah wilayah lamban.<br>
                        Kuadran IV (<em>PS negatif dan DS positif</em>) memiliki daya saing tapi pertumbuhan lambat.
                    </p>

                    <div class="mt-4 mb-8">
                        <h5 class="text-center font-semibold text-gray-800 mb-4">Diagram Kuadran Shift Share</h5>
                        <canvas id="shiftShareChart" class="w-full h-80"></canvas>
                    </div>

                    <div class="text-gray-700 text-justify space-y-3 mb-8">
                        <p><strong>Sektor Konstruksi</strong>: Pertumbuhan lambat tapi daya saing tinggi.</p>
                        <p><strong>Sektor Pertanian</strong>: Daya saing tinggi meskipun tumbuh negatif.</p>
                        <p><strong>Sektor Industri Pengolahan</strong> & <strong>Pertambangan</strong>: Tidak tumbuh dan kurang bersaing.</p>
                    </div>

                    <!-- TIPOLGI KLASSEN -->
                    <div class="mt-10">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Pengelompokan Tipologi Klassen Kabupaten Kaimana 2024</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-700">
                                <thead class="text-xs uppercase bg-blue-100 text-gray-600 text-center">
                                    <tr>
                                        <th class="px-6 py-3 text-left">Lapangan Usaha</th>
                                        <th class="px-6 py-3">Total Shift</th>
                                        <th class="px-6 py-3">Location Quotient</th>
                                        <th class="px-6 py-3">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $klassenData = [
                                            ['A. Pertanian, Kehutanan, dan Perikanan', -0.18, 3.32, 'Potensial'],
                                            ['B. Pertambangan dan Penggalian', -0.07, 0.06, 'Tertinggal'],
                                            ['C. Industri Pengolahan', -0.16, 0.17, 'Tertinggal'],
                                            ['D. Pengadaan Listrik dan Gas', -0.05, 1.91, 'Potensial'],
                                            ['E. Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang', -0.08, 0.48, 'Tertinggal'],
                                            ['F. Konstruksi', -0.12, 2.00, 'Potensial'],
                                            ['G. Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor', -0.07, 1.83, 'Potensial'],
                                            ['H. Transportasi dan Pergudangan', -0.17, 2.35, 'Potensial'],
                                            ['I. Penyediaan Akomodasi dan Makan Minum', -0.10, 1.40, 'Potensial'],
                                            ['J. Informasi dan Komunikasi', -0.08, 1.17, 'Potensial'],
                                            ['K. Jasa Keuangan dan Asuransi', -0.10, 1.10, 'Potensial'],
                                            ['L. Real Estate', -0.11, 1.71, 'Potensial'],
                                            ['M,N. Jasa Perusahaan', -0.06, 0.89, 'Tertinggal'],
                                            ['O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib', -0.13, 2.22, 'Potensial'],
                                            ['P. Jasa Pendidikan', -0.07, 1.02, 'Potensial'],
                                            ['Q. Jasa Kesehatan dan Kegiatan Sosialt', -0.03, 1.27, 'Potensial'],
                                            ['R,S,T,U. Jasa lainnya', -0.06, 1.86, 'Potensial'],
                                        ];
                                    @endphp

                                    @foreach ($klassenData as $row)
                                        <tr class="hover:bg-gray-100 {{ $row[3] === 'Potensial' ? 'bg-blue-50' : '' }}">
                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $row[0] }}</td>
                                            <td class="px-6 py-4 text-center">{{ number_format($row[1], 2) }}</td>
                                            <td class="px-6 py-4 text-center">{{ number_format($row[2], 2) }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($row[3] === 'Potensial')
                                                    <strong>{{ $row[3] }}</strong>
                                                @else
                                                    {{ $row[3] }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8 text-gray-700 text-justify space-y-4">
                            <p><strong>Dominasi Sektor Potensial:</strong> Banyak sektor potensial mengalami perlambatan pertumbuhan, namun punya fondasi kuat.</p>
                            <p><strong>Tidak Ada Sektor "Istimewa":</strong> Tidak ada sektor yang tumbuh pesat sekaligus basis secara struktural dan dinamis.</p>
                            <p><strong>Sektor Tertinggal:</strong> Beberapa sektor seperti Pertambangan, Industri, dan Jasa Perusahaan perlu dievaluasi.</p>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2 -->
                <div id="dua" class="mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">2. LQ dan Shift Share Non Pertambangan & Industri Pengolahan</h3>
                    <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                    <p class="text-gray-700 text-justify">[Analisis untuk sektor lain...]</p>
                </div>

                <!-- BAGIAN 3 -->
                <div id="tiga" class="mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">3. Pertumbuhan PDRB vs Tenaga Kerja</h3>
                    <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                    <p class="text-gray-700 text-justify">[Analisis pertumbuhan PDRB dan hubungan dengan tenaga kerja...]</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN & Smooth Scroll CSS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    html { scroll-behavior: smooth; }
</style>
<script>
const ctx = document.getElementById('shiftShareChart').getContext('2d');
    const dataPoints = [
    { label: 'Pertanian', x: 2.0, y: 1.5 },
    { label: 'Perdagangan', x: 1.5, y: -1.0 },
    { label: 'Industri', x: -1.2, y: -2.5 },
    { label: 'Transportasi', x: -1.0, y: 1.8 },
    ];
    new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [{
        label: 'Sektor Ekonomi',
        data: dataPoints,
        backgroundColor: 'rgba(59,130,246,0.7)',
        borderColor: 'rgba(37,99,235,1)',
        borderWidth: 1,
        pointRadius: 6,
        pointHoverRadius: 8,
        parsing: false,
        }]
    },
    options: {
        plugins: {
        tooltip: {
            callbacks: {
            label: ctx => {
                const pt = ctx.raw;
                return `${pt.label} (PS: ${pt.x}, DS: ${pt.y})`;
            }
            }
        },
        legend: { display: false }
        },
        scales: {
        x: {
            title: { display: true, text: 'Pertumbuhan Sektor (PS)' },
            grid: { color: c => c.tick.value===0?'#000':'#e5e7eb', lineWidth: c=>c.tick.value===0?2:1 }
        },
        y: {
            title: { display: true, text: 'Daya Saing (DS)' },
            grid: { color: c => c.tick.value===0?'#000':'#e5e7eb', lineWidth: c=>c.tick.value===0?2:1 }
        }
        }
    }
    });
</script>
@endsection
