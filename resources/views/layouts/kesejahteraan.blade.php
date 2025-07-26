@extends('index')

@section('title', 'Analisis Indikator Kesejahteraan | BPS Kabupaten Kaimana')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        window.MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            },
            svg: {
                fontCache: 'global'
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js" async></script>


    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Sidebar Navigasi -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow p-4 sticky top-20">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Daftar Isi</h3>
                    <ol class="list-decimal list-inside space-y-2 text-gray-800 text-sm max-h-[400px] overflow-y-auto pr-2">
                        <li><a href="#satu" class="hover:underline">Garis Kemiskinan</a></li>
                        <li><a href="#dua" class="hover:underline">Persentase Kemiskinan</a></li>
                        <li><a href="#tiga" class="hover:underline">Persentase x Garis Kemiskinan</a></li>
                        <li><a href="#empat" class="hover:underline">Indeks Kedalaman Kemiskinan (P1)</a></li>
                        <li><a href="#lima" class="hover:underline">Indeks Keparahan Kemiskinan (P2)</a></li>
                        <li><a href="#enam" class="hover:underline">Komparasi Indeks Keparahan Kemiskinan (P2)</a></li>
                        <li><a href="#tujuh" class="hover:underline">Rata-rata Konsumsi Protein per Kapita per Hari</a>
                        </li>
                        <li><a href="#delapan" class="hover:underline">Rata-rata Konsumsi Kalori per Kapita Sehari</a></li>
                        <li><a href="#sembilan" class="hover:underline">Komparasi Pengeluaran per Kapita Makanan dan Bukan
                                Makanan</a></li>
                        <li><a href="#sepuluh" class="hover:underline">Pola Konsumsi Makanan vs Bukan Makanan</a></li>
                        <li><a href="#sebelas" class="hover:underline">Angka Partisipasi Murni</a></li>
                        <li><a href="#duabelas" class="hover:underline">Rata Lama Sekolah</a></li>
                        <li><a href="#tigabelas" class="hover:underline">Umur Harapan Hidup</a></li>
                    </ol>
                </div>
            </div>



            <!-- Konten Utama -->
            <div class="lg:w-3/4">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Analisis PDRB</h2>

                    <!-- BAGIAN 1 -->
                    <div id="satu"class=scroll-mt-24>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">1. Garis Kemiskinan</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartGKM" class="w-full h-80"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('modalMetadata')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>

                        <p class="text-gray-700 mb-4 text-justify">
                            Sejak tahun 2010 hingga 2024, Garis Kemiskinan di Kaimana meningkat sebesar 170,93%,
                            dengan rata-rata kenaikan tahunan sebesar 7,48%. Kenaikan ini melampaui rata-rata inflasi
                            tahunan Provinsi Papua Barat. Komoditi makanan menyumbang 75,33% terhadap garis kemiskinan
                            pada September 2024.
                        </p>
                    </div>



                    <!-- BAGIAN 2 -->
                    <div id="dua" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">2. Persentase Kemiskinan</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartP0"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('modalMetadata')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>

                        </div>
                    </div>
                    <p class="text-gray-700 text-justify">
                        Presentase penduduk miskin Kabupaten Kaimana mengalami penurunan berkala sejak tahun 2010
                        sebesar 20,89% menjadi 14,41% pada tahun 2024. Angka ini sudah <strong>dibawah angka persentase
                            Provinsi Papua Barat yaitu sebesar 21,6% pada tahun 2024.</strong> Pada tahun 2021 angka
                        kemiskinan sempat meningkat 0,54 poin hal ini mengidikasikan adanya tekanan saat pandemi
                        menimpa, namun terus menurun hingga 2024 yang artinya pemulihan ekonomi dapat terjadi dan banyak
                        dari penduduk yang keluar dari kemiskinan.<br><br>
                    </p>
                    <p class="text-gray-800 font-semibold">Target RPJMD 2024:</p>
                    <ul class="list-disc list-inside text-gray-700">
                        <li><strong> Penduduk diatas garis kemiskinan </strong> 86,19 <span
                                class="text-red-600 font-semibold">(tidak tercapai)</span> <br>
                            Realisasi 2024 yaitu 85,59% diatas garis kemiskinan
                        </li>
                    </ul>




                    <!-- BAGIAN 3 -->
                    <div id="tiga" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">3. Persentase Kemiskinan X Garis Kemiskinan</h3>
                        <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartGKM-P0"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('modalMetadata')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify"> Garis Kemiskinan di Kabupaten Kaimana terus meningkat dari
                            Rp251.812 menjadi Rp682.231, menandakan bahwa standar minimum kebutuhan hidup makin tinggi
                            setiap tahunnya. Namun, menariknya, persentase penduduk miskin justru menurun dari 20,89%
                            menjadi 14,41%, yang menunjukkan bahwa meskipun biaya hidup naik, makin banyak masyarakat yang
                            mampu memenuhi kebutuhan dasar mereka. Hal ini mencerminkan adanya perbaikan kesejahteraan dan
                            peningkatan daya beli masyarakat Kaimana secara umum.
                        </p>
                    </div>



                    <!-- BAGIAN 4 -->
                    <div id="empat" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">4. Indeks Kedalaman Kemiskinan (P1)</h3>
                        <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartP1"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('metap1')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>

                        <p class="text-gray-700 text-justify">Indeks kedalaman kemiskinan di Kabupaten Kaimana pada
                            2010
                            memiliki nilai 4,3 poin dan angka ini turun terdalam pada 2020 menjadi 2,36. Pada
                            2020-2023
                            terjadi
                            kenaikan indeks kedalaman kemiskinan menjadi 3,32, lalu pada 2023-2024 nilai ini
                            cenderung
                            stabil di
                            angka 3,17. </p>
                    </div>


                    <!-- BAGIAN 5 -->
                    <div id="lima" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">5. Indeks Keparahan Kemiskinan (P2)</h3>
                        <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartP2"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('metap2')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify">
                            Indeks Keparahan Kemiskinan (P2)</strong> mengukur tingkat ketimpangan pengeluaran
                            di antara penduduk miskin.
                            Nilai yang lebih tinggi menunjukkan bahwa rata-rata penduduk miskin berada semakin jauh
                            di
                            bawah garis kemiskinan, atau disebut dengan keparahan yang lebih
                            dalam.
                            Nilai P2 di Kabupaten Kaimana berfluktuasi selama periode 2010–2024.
                            Puncak keparahan tercatat pada tahun 2016 (1,38) dan 2019 (1,42).
                            <br> <br>Pasca pandemi, nilai P2 tidak menunjukkan pemulihan penuh.
                            Meskipun sempat turun pada 2020 (0,59), indeks ini secara bertahap
                            mengalami kenaikan hingga 2024 (1,01).
                            Hal ini menunjukkan bahwa meskipun persentase penduduk miskin menurun, namun
                            kedalaman di dalam kelompok miskin justru meningkat. <br><br>
                            Selama empat tahun terakhir terjadi tren kenaikan indeks keparahan — ini merupakan
                            indikasi yang kurang baik karena menunjukkan bahwa <strong>jumlah rumah tangga
                                dengan kemiskinan ekstrem meningkat secara proporsional dibandingkan seluruh rumah
                                tangga.</strong>
                        </p>
                    </div>


                    <!-- BAGIAN 6 -->
                    <div id="enam" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">6. Komparasi Indeks Keparahan Kemiskinan
                            (P2)
                        </h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartP2b"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('metap2')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify"><strong> Kaimana Menempati posisi ke-empat dari
                                seluruh
                                kabupaten/kota yang berada di Papua Barat dan Papua Barat Daya </strong> dengan
                            1,01.
                            Dari angka P2 dapat diamati kaimana relatif dangkal pada keparahan kemiskinan atau
                            adanya
                            rumah tangga dengan kemiskinan ekstrem. Artinya kemungkinan untuk mendongkrak kemampuan
                            masyarakat miskin lebih dapat terealisasikan jika bantuan dan kebijakan tepat sasaran.

                        </p>
                    </div>
                    <!-- BAGIAN 7 -->
                    <div id="tujuh" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">7. Rata-rata Konsumsi Protein per Kapita
                            per
                            Hari</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartProtein"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('MetadataProtein')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify">
                            Pada tahun 2023, konsumsi protein per kapita per hari di Kabupaten Kaimana tercatat
                            sebesar
                            54,7 gram. Angka ini sedikit lebih rendah dibandingkan rata-rata Provinsi Papua Barat
                            yang
                            mencapai 54,62 gram, dan berada di bawah rata-rata nasional Indonesia sebesar 62,33
                            gram.
                            <br><br>
                            Posisi Kaimana dalam hal konsumsi protein per kapita per hari berada di tengah-tengah
                            jika
                            dibandingkan dengan kabupaten/kota lain di Papua Barat. Kabupaten seperti Sorong dan
                            Kota
                            Sorong memiliki angka konsumsi yang lebih tinggi, masing-masing sebesar 59,17 gram dan
                            59,95
                            gram. Sementara itu, Kabupaten Sorong Selatan memiliki angka konsumsi yang lebih rendah,
                            yaitu 40,46 gram. <br><br>
                            Data ini menunjukkan bahwa meskipun konsumsi protein di Kaimana relatif baik, masih
                            terdapat
                            <strong>
                                tantangan peningkatan guna mencapai atau melampaui rata-rata nasional.</strong>
                            Peningkatan
                            ini
                            penting untuk mendukung perbaikan gizi masyarakat dan kesehatan jangka panjang.

                        </p>
                    </div>
                    <!-- BAGIAN 8 -->
                    <div id="delapan" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">8. Rata-rata Konsumsi Kalori per Kapita Sehari
                        </h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartKalori"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('MetaKalori')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify">
                            Pada tahun 2024, Kaimana menempati peringkat ke-7 dari 13 kabupaten/kota dengan rata-rata
                            konsumsi kalori per kapita per hari tercatat sebesar
                            <span class="text-red-700">1.831,54 kkal, yang masih di bawah standar
                                kecukupan energi nasional sebesar 2.100 kkal/hari. </span>
                        </p>

                        <br>
                        <!-- Indikasi Fenomena -->
                        <p class="text-gray-800 font-semibold"><br>Indikasi Fenomena:</p>
                        <ul class="list-disc list-inside text-gray-700">

                            <li>• Angka 1.831 kkal menunjukkan bahwa sebagian besar penduduk Kaimana belum mengonsumsi
                                kalori cukup untuk memenuhi kebutuhan dasar energi harian.</li>
                            <li>• Terbatasnya akses terhadap bahan pangan bergizi karena Tingginya harga bahan makanan
                                akibat biaya transportasi tinggi (khususnya di daerah kampung).</li>
                        </ul>
                        <p class="text-gray-800 font-semibold"><br>Rincian Konsumsi Berdasarkan Kelompok Pengeluaran</p>
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full text-sm text-gray-700">
                                <thead class="bg-gray-100 text-gray-800">
                                    <tr>
                                        <th class="px-4 py-2 text-left font-semibold">Kelompok Ekonomi</th>
                                        <th class="px-4 py-2 text-right font-semibold">Rata-rata Kalori (kkal/hari)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="bg-red-50 text-red-700 font-semibold">
                                        <td class="px-4 py-2 whitespace-nowrap">40% Terbawah</td>
                                        <td class="px-4 py-2 text-right">1.394,43</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap">40% Menengah</td>
                                        <td class="px-4 py-2 text-right font-semibold">1.952,90</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap">20% Teratas</td>
                                        <td class="px-4 py-2 text-right font-semibold">2.478,29</td>
                                    </tr>
                                    <tr class="bg-gray-50 font-medium text-gray-800">
                                        <td class="px-4 py-2 whitespace-nowrap">Rata-rata Total</td>
                                        <td class="px-4 py-2 text-right">1.831,54</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Indikasi Fenomena -->
                        <p class="text-gray-800 font-semibold"><br>Indikasi Fenomena:</p>
                        <ul class="list-disc list-inside text-black-700">

                            <li> Kelompok 40% terbawah hanya mengonsumsi 1.394 kkal/hari, jauh dari standar
                                minimum 2.100
                                kkal. Kondisi ini mengindikasikan adanya defisit energi kronis, yang bisa
                                berdampak langsung
                                <strong> pada stunting, kelelahan kronis, dan produktivitas rendah.</strong>.
                            </li>
                            <li>Terdapat selisih lebih dari 1.000 kkal/hari antara kelompok atas dan bawah, mencerminkan
                                ketimpangan akses terhadap pangan bergizi.<strong> Kelompok bawah mungkin hanya mengandalkan
                                    karbohidrat sederhana dan pangan lokal seadanya.</strong></li>
                        </ul>

                    </div>

                    <!-- BAGIAN 9 -->
                    <div id="sembilan" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">9. Komparasi Pengeluaran per Kapita
                            Makanan
                            dan
                            Bukan Makanan 2024</h3>
                        <!--<div id="chartPengSus"></div>-->
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartPengSus2"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('MetaPengeluaran')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>

                        <p class="text-gray-700 text-justify">Pada tahun 2024 Pengeluaran per kapita di
                            Kabupaten
                            Kaimana tercatat sebesar <strong> Rp1.579.707 per bulan, </strong> menempatkan
                            wilayah
                            ini
                            pada posisi ke-9
                            dari 15 kabupaten/kota di Provinsi Papua Barat dan Papua Barat Daya. Angka tersebut
                            masih
                            berada <strong> di bawah rata-rata pengeluaran per kapita provinsi induk, </strong>
                            baik
                            Papua Barat maupun
                            Papua Barat Daya. <br><br>
                            Jika dilihat dari komposisinya, masyarakat Kaimana cenderung mengalokasikan <strong>
                                pengeluaran
                                lebih besar untuk kebutuhan bukan makanan, </strong> yakni sebesar Rp807.383
                            (sekitar
                            51,1%),
                            dibandingkan dengan pengeluaran untuk makanan sebesar Rp772.325 (sekitar 48,9%).
                            Pola
                            ini
                            mencerminkan bahwa kebutuhan dasar pangan sebagian besar telah tercukupi, dan
                            konsumsi
                            masyarakat mulai bergeser ke sektor-sektor lain seperti pendidikan, transportasi,
                            perumahan,
                            dan kesehatan.

                        </p>
                    </div>


                    <!-- BAGIAN 10-->
                    <div id="sepuluh" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">"10. Pola Konsumsi Makanan vs Non
                            makanan"</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartPolaKonsumsi"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('modalMetadata')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>

                        </div>

                        <p class="text-gray-700 text-justify">
                            Secara umum, pola konsumsi masyarakat Kaimana mengalami pergeseran dari dominasi
                            makanan ke bukan makanan dalam 15 tahun terakhir. Pada tahun 2010, lebih dari 59,8%
                            pengeluaran rumah tangga digunakan untuk makanan, dan hanya sekitar 40,2% untuk
                            kebutuhan bukan makanan. Namun, pada tahun 2024, proporsinya berubah menjadi 48,89%
                            untuk makanan dan 51,11% untuk bukan makanan.
                            <br>
                        </p>

                        <p class="text-gray-700 text-justify">
                            <strong> Transisi Konsumsi: </strong> Pola ini menunjukkan bahwa masyarakat Kaimana
                            mulai mengalami transisi konsumsi, dari kebutuhan dasar (makanan) menuju kebutuhan
                            sekunder dan tersier (pendidikan, perumahan, dll.).
                        </p>


                        <p class="text-gray-800
                                        font-semibold mt-4">
                            Rincian berdasarkan komponen pengeluaran
                        </p>


                        <div class="overflow-x-auto mt-6">
                            <table class="min-w-full divide-y divide-gray-300 text-sm">
                                <thead class="bg-gray-100 text-gray-800">
                                    <tr>
                                        <th scope="col" class="px-4 py-2 text-left font-semibold">Komponen
                                        </th>
                                        <th scope="col" class="px-4 py-2 text-left font-semibold">Kategori
                                        </th>
                                        <th scope="col" class="px-4 py-2 text-right font-semibold">
                                            Pengeluaran (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 text-gray-700">
                                    <!-- Makanan -->
                                    <tr>
                                        <td class="px-4 py-1">Padi-padian</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">87.828</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Umbi-umbian</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">29.803</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Ikan/udang/cumi/kerang</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">90.420</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Daging</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">24.575</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Telur dan susu</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">36.293</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Sayur-sayuran</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">76.888</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Kacang-kacangan</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">7.363</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Buah-buahan</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">56.342</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Minyak dan kelapa</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">24.958</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Bahan minuman</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">22.984</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Bumbu-bumbuan</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">15.824</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Konsumsi lainnya</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">11.724</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Makanan & minuman jadi</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">148.446</td>
                                    </tr>
                                    <tr class="bg-red-50 font-semibold">
                                        <td class="px-4 py-1">Rokok</td>
                                        <td class="px-4 py-1">Makanan</td>
                                        <td class="px-4 py-1 text-right">98.272</td>
                                    </tr>
                                    <tr class="bg-gray-50 font-medium">
                                        <td class="px-4 py-1">Total Makanan</td>
                                        <td class="px-4 py-1">-</td>
                                        <td class="px-4 py-1 text-right">731.719</td>
                                    </tr>

                                    <!-- Bukan Makanan -->
                                    <tr>
                                        <td class="px-4 py-1">Perumahan & fasilitas rumah tangga</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">439.832</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Aneka barang dan jasa</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">169.862</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Pakaian, alas kaki, dan tutup kepala</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">39.124</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Barang tahan lama</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">56.359</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Pajak, pungutan, dan asuransi</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">53.074</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">Keperluan pesta dan upacara/kenduri</td>
                                        <td class="px-4 py-1">Bukan Makanan</td>
                                        <td class="px-4 py-1 text-right">6.138</td>
                                    </tr>
                                    <tr class="bg-gray-50 font-medium">
                                        <td class="px-4 py-1">Total Bukan Makanan</td>
                                        <td class="px-4 py-1">-</td>
                                        <td class="px-4 py-1 text-right">764.389</td>
                                    </tr>

                                    <!-- Total -->
                                    <tr class="bg-blue-50 font-bold">
                                        <td class="px-4 py-2">Total Pengeluaran</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2 text-right">1.496.108</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Indikasi Fenomena -->
                        <p class="text-gray-800 font-semibold"><br>Indikasi Fenomena:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>
                                <strong>Rokok: Rp 98.272 (13,4% dari total makanan)</strong>
                                Angka signifikan dan bahkan lebih besar dari pengeluaran untuk daging, susu,
                                dan kacang-kacangan. Ini menjadi perhatian karena rokok tidak memberikan
                                nilai gizi namun menyerap anggaran rumah tangga.
                            </li>
                            <li>
                                <strong>Pergeseran konsumsi padahal kebutuhan gizi belum terpenuhi</strong>
                                Konsumsi sudah bergeser ke bukan makanan, tetapi asupan gizi dasar masih
                                kurang. Salah satu penyebabnya adalah tingginya harga bahan makanan bergizi
                                di kampung akibat terbatasnya distribusi.
                            </li>
                        </ul>

                        <p class="text-gray-800 font-semibold mt-4">Saran Kebijakan:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>
                                <strong>Kampanye gizi sehat di sekolah dan kampung:</strong>
                                Edukasi tentang pola makan bergizi dan pengurangan konsumsi rokok melalui
                                posyandu, sekolah, dan kegiatan desa.
                            </li>
                            <li>
                                <strong>Subsidi distribusi pangan bergizi:</strong>
                                Pemerintah memberi subsidi ongkos angkut (longboat) ke distrik agar harga
                                bahan pokok bergizi seperti telur, daging, sayur, dan beras menjadi lebih
                                terjangkau oleh masyarakat kampung.
                            </li>
                        </ul>



                    </div>




                    <!-- BAGIAN 11 -->
                    <div id="sebelas" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">11. Angka Partisipasi Murni</h3>
                        <!-- Tambahkan konten sesuai analisis yang diinginkan -->
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartAPM"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('modalMetadata')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify">
                            Angka Partisipasi Murni (APM) di Kabupaten Kaimana dari tahun 2016 hingga 2024
                            menunjukkan
                            peningkatan pada semua jenjang.
                            Pada jenjang <strong>SD/MI</strong>, APM meningkat dari <strong>91,99%</strong>
                            menjadi
                            <strong>97,38%</strong>, yang menunjukkan bahwa hampir seluruh anak usia sekolah
                            dasar
                            sudah
                            bersekolah di jenjang yang sesuai.
                            Meskipun <strong>APM SMP</strong> naik dari <strong>56,52%</strong> menjadi
                            <strong>59,81%</strong>, tren yang sama juga terlihat pada jenjang
                            <strong>SMA/MA</strong>,
                            di mana APM meningkat dari <strong>54,73%</strong> menjadi <strong>54,07%</strong>.
                            <br><br>
                            Namun, mulai jenjang <strong>SMP/MTS</strong> terjadi perbedaan APM yang cukup
                            tajam.
                            Angka ini masih jauh tertinggal dibanding jenjang SD. Hal ini menunjukkan bahwa
                            banyak
                            anak
                            mengalami keterlambatan masuk SMP atau bahkan tidak melanjutkan sekolah setelah
                            SD.<br><br>
                        </p>

                        <p class="text-gray-800 font-semibold">Target RPJMD 2024:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li><strong>SD:</strong> 93,60 <span class="text-green-600 font-semibold">(tercapai)</span>
                            </li>
                            <li><strong>SMP:</strong> 46,56 <span class="text-green-600 font-semibold">(tercapai)</span>
                            </li>
                            <li><strong>SMA:</strong> -</li>
                            <br>
                        </ul>

                        <p class="text-gray-800 font-semibold">Saran Kebijakan:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li><strong>Pembangunan sekolah baru SMP dan SMA dengan sistem asrama</strong> di
                                setiap
                                distrik. Salah satu alasan karena masih sedikitnya jumlah sekolah.</li>
                        </ul>
                        <p class="text-gray-700 text-justify">
                            <br>Keberlanjutan ke jenjang lebih tinggi masih menjadi tantangan besar yang perlu
                            mendapat
                            perhatian, agar tidak terjadi putus sekolah dan kualitas sumber daya manusia dapat
                            terus
                            ditingkatkan.
                            Pendidikan harus dipandang sebagai investasi sumber daya manusia yang
                            bertujuan untuk meningkatkan produktivitas tenaga kerja (<em>Todaro, 2014</em>).

                        </p>
                    </div>




                    <!-- BAGIAN 12 -->
                    <div id="duabelas" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">12. Rata Lama Sekolah</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartRLS"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('modalSumber')"
                                        class="underline hover:text-blue-800">Susenas</button></span>
                                <span><button onclick="toggleModal('MetaRLS')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>

                        </div>


                        <p class="text-gray-700 text-justify">
                            Rata-rata lama sekolah (RLS) di Kabupaten Kaimana meningkat secara konsisten dari 6,70
                            tahun pada 2010 menjadi 8,97 tahun pada 2024. Artinya, penduduk usia 25 tahun ke atas
                            kini rata-rata telah menempuh pendidikan hingga hampir jenjang SMA. Jika dibandingkan
                            dengan RLS provinsi Papua Barat (7,86 tahun) dan nasional (8,85 tahun) pada 2024,
                            capaian Kaimana yang lebih tinggi ini menjadi indikasi positif bahwa daerah ini tengah
                            membangun fondasi SDM yang lebih kompetitif di tingkat regional maupun nasional.
                        </p>

                        <p class="text-gray-800 font-semibold mt-4">Target RPJMD 2024:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>
                                <strong>Rata-rata Lama Sekolah</strong> 9,02 Tahun
                                <span class="text-red-600 font-semibold">(tidak tercapai)</span><br>
                                Realisasi 2024 yaitu 8,97 tahun
                            </li>
                        </ul>
                        <p class="text-gray-800 font-semibold mt-4">Indikasi Fenomena:</p>
                        <p class="text-gray-700 text-justify mt-4">
                            Tingginya rata-rata lama sekolah (RLS) di Kabupaten
                            Kaimana yang mencapai 8,97 tahun pada 2024 tampak kontras dengan masih rendahnya Angka
                            Partisipasi Murni (APM) jenjang SMP dan SMA, masing-masing sebesar 59,81% dan 54,06%.
                            <strong> Kondisi ini dapat dijelaskan oleh kemungkinan adanya migrasi masuk ke Kaimana
                                dari penduduk usia dewasa yang telah menyelesaikan pendidikan menengah atau tinggi
                                di
                                daerah asalnya. </strong> Kehadiran mereka, yang datang untuk bekerja atau mencari
                            peluang
                            ekonomi, turut
                            mendorong peningkatan RLS meskipun partisipasi pendidikan anak usia sekolah di
                            daerah
                            ini masih terbatas.
                        </p>
                    </div>


                    <!-- BAGIAN 13 -->
                    <div id="tigabelas" class="mt-8 scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">13. Umur Harapan Hidup</h3>
                        <div class="relative bg-white shadow rounded p-4">
                            <div id="chartUHH"></div>
                            <div class="absolute bottom-2 left-4 flex gap-4 text-sm text-blue-600 font-semibold">
                                <span>Sumber Data: <button onclick="toggleModal('SensusPenduduk')"
                                        class="underline hover:text-blue-800">Sensus Penduduk</button></span>
                                <span><button onclick="toggleModal('MetaUHH')"
                                        class="underline hover:text-blue-800">Metadata</button></span>
                            </div>

                        </div>
                        <p class="text-gray-700 text-justify">
                            Umur Harapan Hidup (UHH) di Kabupaten Kaimana menunjukkan tren peningkatan yang
                            konsisten dari tahun 2015 hingga 2024.
                            Pada tahun 2015, UHH tercatat sebesar 63,59 tahun dan terus mengalami kenaikan hingga
                            mencapai 65,86 tahun pada tahun 2024.
                            Dalam rentang waktu 10 tahun tersebut, terjadi kenaikan sekitar 2,27 tahun, atau
                            rata-rata meningkat sekitar 0,25 tahun setiap tahunnya.
                            Jika dibandingkan dengan daerah lain, Kaimana masih tertinggal 3,3 tahun dari Kabupaten
                            Fakfak, 1,2 tahun dari rata-rata Papua Barat, dan hampir 6,5 tahun di bawah angka
                            nasional.
                            Hal ini menandakan masih terbatasnya fasilitas kesehatan, sulitnya akses transportasi
                            rujukan, serta rendahnya kesadaran masyarakat terhadap kebersihan dan gizi.
                        </p>

                        <p class="text-gray-800 font-semibold mt-4">Target RPJMD 2024:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>
                                <strong>Usia Harapan Hidup</strong> 65,67 Tahun
                                <span class="text-green-600 font-semibold">(tercapai)</span><br>
                                Realisasi 2024 yaitu 65,86 tahun
                            </li>
                        </ul>

                        <p class="text-gray-800 font-semibold mt-4">Saran Kebijakan:</p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Pastikan ketersediaan tenaga kesehatan (nakes) untuk setiap pustu, khususnya di
                                wilayah pesisir dan terpencil.</li>
                            <li>Sediakan transportasi cepat pada setiap distrik sebagai mitigasi apabila harus
                                dilakukan rujukan medis ke fasilitas lebih tinggi.</li>
                            <li>Perbanyak penyuluhan hidup sehat di kampung-kampung, seperti menjaga kebersihan
                                tubuh, makanan yang bersih, dan kesehatan keluarga.</li>
                        </ul>
                        </p>
                    </div>



                </div>
            </div>
        </div>
    </div>



    <!-- Chart.js CDN & Smooth Scroll CSS -->

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Modal Sumber Data -->
    <div id="modalSumber" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh] ">
            <button onclick="toggleModal('modalSumber')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">
                &times;
            </button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Sumber Data</h2>
            <h3 class="text-lg font-bold mb-2">Apa itu Susenas?</h3>
            <p>
                <strong>Susenas</strong> (Survei Sosial Ekonomi Nasional) adalah survei rutin oleh BPS dua kali
                setahun
                (Maret & September) untuk mengumpulkan data sosial ekonomi masyarakat Indonesia. Data ini
                penting untuk
                perencanaan & evaluasi pembangunan, serta penyusunan indikator TPB/SDGs.
            </p>

            <h4 class="font-semibold mt-3">Pemanfaatan Data:</h4>
            <ul class="list-disc ml-5">
                <li>Evaluasi pembangunan nasional & sektoral</li>
                <li>Indikator RPJMN, TPB/SDGs, dan Astacita</li>
            </ul>

            <p class="mt-2">
                Susenas mendukung visi Indonesia Emas 2045, khususnya dalam pengentasan kemiskinan dan
                ketimpangan.
                Sebanyak <strong>43 dari 114 indikator SDGs Indonesia</strong> bersumber dari Susenas.
            </p>

            <h4 class="font-semibold mt-3">Sejarah Singkat:</h4>
            <ul class="list-disc ml-5">
                <li><strong>1963:</strong> Susenas pertama, fokus pada pendapatan & tenaga kerja.</li>
                <li><strong>1992:</strong> Diperluas cakupannya dengan skema KOR tahunan & Modul tiga tahunan.
                </li>
            </ul>

            <h4 class="font-semibold mt-3">Modul Susenas:</h4>
            <ul class="list-disc ml-5">
                <li><strong>MSBP:</strong> Sosial, budaya, pendidikan</li>
                <li><strong>MKP:</strong> Kesehatan & perumahan</li>
                <li><strong>Hansos:</strong> Ketahanan sosial & bansos</li>
            </ul>

            <h4 class="font-semibold mt-3">Jenis Data (VSEN25.K):</h4>
            <p>
                Data demografi, migrasi, pendidikan, keuangan, teknologi informasi, kesehatan, perumahan, dan
                perlindungan sosial, termasuk pengasuhan anak usia 2–4 tahun.
            </p>

            <h4 class="font-semibold mt-3">Jenis Data (VSEN25.KP):</h4>
            <p>
                Data konsumsi makanan & bukan makanan, pengeluaran mingguan/bulanan/tahunan, dan pendapatan
                rumah tangga
                non-konsumsi.
            </p>
        </div>
    </div>

    <!-- Modal Sumber Data -->
    <div id="SensusPenduduk" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh] ">
            <button onclick="toggleModal('SensusPenduduk')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">
                &times;
            </button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Sumber Data</h2>

            <h3 class="text-lg font-bold mb-2">Apa itu Sensus Penduduk?</h3>
            <p>
                <strong>Sensus Penduduk</strong> adalah kegiatan pengumpulan, pengolahan, dan penyajian data
                demografi yang dilakukan oleh BPS setiap <strong>10 tahun sekali</strong> untuk mendapatkan data
                lengkap seluruh penduduk Indonesia.
                Sensus ini memberikan gambaran jumlah, komposisi, distribusi, dan karakteristik penduduk pada waktu
                tertentu.
            </p>

            <h4 class="font-semibold mt-3">Tujuan Utama:</h4>
            <ul class="list-disc ml-5">
                <li>Menyediakan data dasar jumlah dan struktur penduduk hingga tingkat desa/kelurahan</li>
                <li>Menjadi dasar proyeksi penduduk dan perhitungan indikator strategis (seperti AHH, TFR,
                    dependency ratio)</li>
                <li>Mendukung kebijakan pembangunan jangka panjang (RPJPN, RPJMN, dan RPJMD)</li>
            </ul>

            <p class="mt-2">
                Sensus Penduduk sangat penting untuk menjamin <strong>keterpaduan satu data kependudukan</strong>,
                sebagai rujukan utama perencanaan pembangunan berbasis populasi.
                Hasilnya digunakan berbagai lembaga, baik nasional maupun internasional.
            </p>

            <h4 class="font-semibold mt-3">Sejarah Singkat:</h4>
            <ul class="list-disc ml-5">
                <li><strong>1961:</strong> Sensus Penduduk pertama setelah kemerdekaan</li>
                <li><strong>Terbaru:</strong> Sensus Penduduk 2020 (SP2020), dengan metode kombinasi data registrasi
                    dan sensus lapangan</li>
            </ul>

            <h4 class="font-semibold mt-3">Inovasi SP2020:</h4>
            <ul class="list-disc ml-5">
                <li>Penggunaan data Dukcapil sebagai basis pre-listing</li>
                <li>Pelaksanaan sensus online pertama dalam sejarah Indonesia</li>
                <li>Pelacakan data penduduk nonresmi melalui verifikasi lapangan</li>
            </ul>

            <h4 class="font-semibold mt-3">Jenis Data yang Dihasilkan:</h4>
            <p>
                Jumlah penduduk menurut umur, jenis kelamin, wilayah, status pernikahan, pendidikan tertinggi,
                migrasi, pekerjaan, serta karakteristik rumah tangga lainnya.
            </p>

        </div>
    </div>



    <!-- Modal Metadata -->

    <!-- Modal Metadata Garis Kemiskinan -->
    <div id="modalMetadata" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('modalMetadata')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p><strong>🔹 Konsep:</strong><br>
                Representasi jumlah rupiah minimum untuk kebutuhan pokok.</p>

            <p><strong>🔹 Definisi:</strong><br>
                Garis Kemiskinan merupakan representasi dari jumlah rupiah minimum yang dibutuhkan untuk
                memenuhi
                kebutuhan pokok minimum makanan yang setara dengan 2.100 kilokalori per kapita per hari dan
                kebutuhan
                pokok bukan makanan.</p>

            <p><strong>🔹 Interpretasi:</strong><br>
                Penduduk yang memiliki rata-rata pengeluaran konsumsi per kapita per bulan di bawah garis
                kemiskinan
                dikategorikan sebagai penduduk miskin.</p>

            <p><strong>🔹 Mekanisme Perhitungan:</strong><br>
                Berdasarkan estimasi komponen makanan dan non-makanan dari survei pengeluaran rumah tangga.</p>

            <p><strong>🔹 Rumus:</strong><br>
                <em>Garis Kemiskinan (GK) = GKM + GKNM</em>
            </p>

            <p><strong>🔹 Ukuran:</strong><br>
                Rupiah per kapita per bulan</p>
        </div>
    </div>

    <!-- Modal Metadata Indeks Kedalaman Kemiskinan (P1) -->
    <div id="metap1" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('metap1')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p><strong>🔹 Konsep:</strong><br>
                Ukuran rata-rata kesenjangan pengeluaran masing-masing penduduk miskin terhadap garis
                kemiskinan.</p>

            <p><strong>🔹 Definisi:</strong><br>
                Indeks Kedalaman Kemiskinan (Poverty Gap Index - P1) adalah ukuran rata-rata seberapa jauh
                pengeluaran
                penduduk miskin dari garis kemiskinan.</p>

            <p><strong>🔹 Interpretasi:</strong><br>
                Penurunan indeks menunjukkan pengeluaran makin mendekati garis kemiskinan, dan ketimpangan makin
                menyempit.</p>

            <p><strong>🔹 Mekanisme Perhitungan:</strong><br>
                Dijumlahkan rasio kekurangan tiap individu miskin terhadap GK, lalu dirata-rata.</p>

            <p><strong>🔹 Rumus:</strong><br>
                <!-- Rumus dengan MathJax -->
                $$
                P_1 = \frac{1}{n} \sum_{i=1}^{q} \left( \frac{z - y_i}{z} \right)^1
                $$</p>

            <p><strong>🔹 Keterangan:</strong><br>
                z = Garis Kemiskinan<br>
                y<sub>i</sub> = Pengeluaran kapita ke-i di bawah GK (y<sub>i</sub> &lt; z)<br>
                q = Jumlah penduduk miskin<br>
                n = Jumlah total penduduk</p>
        </div>
    </div>

    <!-- Metadata Keparahan Kemiskinan P2-->
    <div id="metap2" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('metap2')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">
                &times;
            </button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p><strong>🔹 Konsep:</strong><br>
                Indeks yang memberikan informasi mengenai gambaran penyebaran pengeluaran di antara penduduk
                miskin.
            </p>

            <p><strong>🔹 Definisi:</strong><br>
                Indeks Keparahan Kemiskinan (Poverty Severity Index - P2) mengukur tingkat keparahan relatif
                dari
                kemiskinan. Indeks ini menggambarkan seberapa besar ketimpangan pengeluaran di antara penduduk
                miskin.
                Semakin tinggi nilainya, semakin besar ketimpangannya.
            </p>

            <p><strong>🔹 Interpretasi:</strong><br>
                Peningkatan nilai P2 menunjukkan bahwa pengeluaran penduduk miskin semakin timpang. Sebaliknya,
                penurunan indeks ini mencerminkan bahwa kondisi pengeluaran antar penduduk miskin semakin
                merata. Indeks
                ini penting karena pengentasan kemiskinan pada individu yang paling miskin memberi dampak yang
                lebih
                besar terhadap penurunan nilai kemiskinan secara keseluruhan.
            </p>

            <p><strong>🔹 Mekanisme Perhitungan:</strong><br>
                Indeks dihitung dari rata-rata kuadrat kekurangan pengeluaran masing-masing penduduk miskin
                terhadap
                garis kemiskinan, dibagi jumlah total penduduk.
            </p>

            <p><strong>🔹 Rumus:</strong></p>
            <p>
                $$P_2 = \frac{1}{n} \sum_{i=1}^{q} \left( \frac{z - y_i}{z} \right)^2$$
            </p>

            <p><strong>🔹 Keterangan:</strong><br>
                α = 2<br>
                z = Garis Kemiskinan<br>
                y<sub>i</sub> = Rata-rata pengeluaran per kapita per bulan penduduk ke-i yang berada di bawah
                garis
                kemiskinan (y<sub>i</sub> &lt; z)<br>
                q = Jumlah penduduk yang berada di bawah garis kemiskinan<br>
                n = Jumlah total penduduk
            </p>
        </div>
    </div>

    <!-- Modal Metadata Konsumsi Protein -->
    <div id="MetadataProtein" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('MetadataProtein')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p><strong>🔹 Konsep:</strong><br>
                Menggambarkan jumlah rata-rata protein (dalam gram) yang dikonsumsi oleh seseorang per hari
                dari makanan dan minuman.</p>

            <p><strong>🔹 Definisi:</strong><br>
                Rata-rata konsumsi protein per kapita per hari adalah jumlah gram protein yang dikonsumsi
                dari seluruh bahan makanan yang dikonsumsi oleh rumah tangga dalam seminggu, dibagi jumlah
                anggota dan jumlah hari.</p>

            <p><strong>🔹 Interpretasi:</strong><br>
                Semakin tinggi konsumsi protein, semakin baik tingkat kecukupan gizi masyarakat. Standar AKG
                dewasa: 56–60 gram/hari.</p>

            <p><strong>🔹 Mekanisme Perhitungan:</strong><br>
                Data konsumsi mingguan dari Susenas dikonversi menggunakan Daftar Komposisi Bahan Makanan
                (DKBM), lalu dihitung per kapita per hari.</p>

            <p><strong>🔹 Rumus:</strong><br>
                <em>Total gram protein ÷ (jumlah anggota rumah tangga × 7)</em>
            </p>

            <p><strong>🔹 Ukuran:</strong><br>
                Gram per kapita per hari</p>
        </div>
    </div>

    <!-- Modal Metadata Konsumsi Kalori perkapita sehari -->
    <div id="MetaKalori" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('MetaKalori')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p class="font-semibold">🔹 Konsep:</p>
            <p>
                Indikator ini mengukur rata-rata jumlah energi yang dikonsumsi oleh seseorang per hari dari seluruh
                makanan yang dikonsumsi dalam rumah tangga.
            </p>
            <p class="font-semibold">🔹 Definisi:</p>
            <p>
                Konsumsi Kalori per Kapita per Hari adalah estimasi jumlah energi dalam satuan kilokalori (kkal)
                yang dikonsumsi oleh rata-rata individu dalam rumah tangga selama satu hari. Data ini diperoleh dari
                konversi konsumsi bahan makanan (dalam gram) ke satuan energi.
            </p>
            <p class="font-semibold">🔹 Interpretasi:</p>
            <p>
                Semakin tinggi konsumsi kalori, maka semakin mencerminkan kecukupan energi masyarakat. Standar
                nasional untuk konsumsi energi adalah sebesar 2.100 kkal/kapita/hari. Jika angka konsumsi berada di
                bawah standar ini, maka dapat mengindikasikan risiko kekurangan gizi energi.
            </p>

            <p class="font-semibold">🔹 Mekanisme Perhitungan:</p>
            <p>
                Berdasarkan hasil Susenas, jumlah konsumsi makanan dikonversi ke kalori menggunakan daftar komposisi
                bahan makanan (DKBM) yang disusun Bappenas/BPS/Kemenkes. Jumlah total kalori rumah tangga dibagi
                jumlah anggota dan dibagi hari untuk mendapatkan per kapita per hari.
            </p>
            <p class="font-semibold">🔹 Satuan Ukur:</p>
            <p>Kilokalori (kkal) per kapita per hari</p>

            <p class="font-semibold">🔹 Sumber Data:</p>
            <p>Survei Sosial Ekonomi Nasional (Susenas), Badan Pusat Statistik (BPS)</p>

        </div>
    </div>


    <!-- Metadata Pengeluaran makanan dan bukan makanan-->
    <div id="MetaPengeluaran" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('MetaPengeluaran')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>
            <p><strong>🔹 Konsep:</strong><br>
                Pengeluaran per kapita makanan dan bukan makanan mencerminkan kemampuan ekonomi penduduk dalam memenuhi
                kebutuhan konsumsi dasar, baik berupa bahan makanan maupun kebutuhan lainnya.</p>

            <p><strong>🔹 Definisi:</strong><br>
                Rata-rata pengeluaran per kapita adalah jumlah pengeluaran rumah tangga untuk konsumsi makanan dan bukan
                makanan selama sebulan, dibagi dengan jumlah anggota rumah tangga. Data ini kemudian dirata-rata untuk
                seluruh rumah tangga sampel di wilayah tertentu.</p>

            <p><strong>🔹 Klasifikasi:</strong><br>
                - <strong>Makanan:</strong> mencakup konsumsi rumah tangga atas bahan pangan seperti padi-padian, sayur,
                buah, daging, ikan, susu, telur, makanan dan minuman jadi, serta rokok.<br>
                - <strong>Bukan Makanan:</strong> mencakup perumahan, perlengkapan rumah tangga, pakaian, pendidikan,
                kesehatan, transportasi, pajak dan lainnya.</p>

            <p><strong>🔹 Satuan:</strong><br>
                Rupiah per kapita per bulan</p>

            <p><strong>🔹 Interpretasi:</strong><br>
                Nilai yang lebih tinggi menunjukkan daya beli yang lebih besar. Perbandingan antara porsi makanan dan
                bukan
                makanan juga dapat menunjukkan struktur konsumsi masyarakat (misalnya, dominasi konsumsi makanan dapat
                mencerminkan kondisi ekonomi menengah ke bawah).</p>

            <p><strong>🔹 Sumber Data:</strong><br>
                Survei Sosial Ekonomi Nasional (Susenas), Badan Pusat Statistik</p>
        </div>
    </div>


    <!-- Modal Metadata Umur Harapan Hidup -->
    <div id="MetaUHH" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('MetaUHH')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <p><strong>🔹 Konsep dan Definisi:</strong><br>
                Umur Harapan Hidup (UHH), atau dikenal juga dengan <em>e<sub>0</sub></em>, merupakan rata-rata
                jumlah tahun hidup yang akan dijalani oleh bayi yang baru lahir pada suatu tahun tertentu. Indikator
                ini juga disebut sebagai life expectancy at birth.
            </p>

            <p><strong>🔹 Cara Hitung:</strong><br>
                Idealnya UHH dihitung berdasarkan Angka Kematian Menurut Umur (Age Specific Death Rate/ASDR) yang
                dikumpulkan melalui catatan registrasi kematian dari tahun ke tahun, sehingga memungkinkan dibuat
                tabel kematian. Namun karena pencatatan tersebut belum lengkap, maka AHH dihitung secara tidak
                langsung menggunakan perangkat lunak Micro Computer Program for Demographic Analysis
                (MCPDA) atau Mortpak.
            </p>

            <p><strong>🔹 Kegunaan:</strong><br>
                AHH digunakan untuk mengevaluasi kinerja pemerintah dalam meningkatkan kesejahteraan dan derajat
                kesehatan masyarakat. Jika nilai AHH suatu daerah rendah, maka hal tersebut menjadi sinyal penting
                untuk memperkuat program kesehatan, perbaikan gizi, sanitasi, dan pemberantasan kemiskinan.
            </p>

            <p><strong>🔹 Ukuran:</strong><br>
                Tahun
            </p>

            <p><strong>🔹 Sumber Data:</strong><br>
                Sensus Penduduk
            </p>

        </div>
    </div>

    <!-- Modal metadata Rata Lama Sekolah-->
    <div id="MetaRLS" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 max-w-xl w-full mx-auto relative overflow-y-auto max-h-[95vh]">
            <button onclick="toggleModal('MetaRLS')"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Penjelasan Metadata</h2>

            <div>
                <p class="font-semibold">🔹 Konsep:</p>
                <p>RLS mengukur rata-rata lama pendidikan formal yang telah dijalani oleh penduduk usia 25 tahun ke
                    atas,
                    dinyatakan dalam tahun.</p>
            </div>

            <div>
                <p class="font-semibold">🔹 Definisi:</p>
                <p>Rata-rata Lama Sekolah (RLS) adalah jumlah total tahun sekolah formal yang telah ditempuh oleh
                    penduduk
                    usia
                    25 tahun ke atas, dibagi dengan jumlah penduduk dalam kelompok usia tersebut. Pendidikan formal yang
                    dihitung mencakup jenjang SD/sederajat hingga perguruan tinggi.</p>
            </div>

            <div>
                <p class="font-semibold">🔹 Interpretasi:</p>
                <p>Semakin tinggi nilai RLS, maka semakin baik akses dan partisipasi masyarakat terhadap pendidikan
                    formal.
                    RLS
                    yang rendah mengindikasikan banyaknya penduduk yang tidak menyelesaikan pendidikan dasar atau
                    menengah.
                </p>
            </div>

            <div>
                <p class="font-semibold">🔹 Mekanisme Perhitungan:</p>
                <p>Berdasarkan hasil Survei Sosial Ekonomi Nasional (Susenas) melalui pengumpulan data pendidikan
                    tertinggi
                    yang
                    ditamatkan oleh penduduk usia 25 tahun ke atas. Kemudian dikonversikan ke dalam tahun sekolah formal
                    (contoh: SD = 6 tahun, SMP = 9 tahun, SMA = 12 tahun, dst.).</p>
            </div>

            <div>
                <p class="font-semibold">🔹 Satuan Ukur:</p>
                <p>Tahun</p>
            </div>

            <div>
                <p class="font-semibold">🔹 Sumber Data:</p>
                <p>Survei Sosial Ekonomi Nasional (Susenas), Badan Pusat Statistik (BPS)</p>
            </div>
        </div>
    </div>




    <script>
        // ===========================
        // Fungsi Toggle Modal Metadata
        // ===========================

        function toggleModal(id) {
            const el = document.getElementById(id);
            el.classList.toggle("hidden");
            el.classList.toggle("flex");
        }
        // ===========================
        // Grafik Garis Kemiskinan
        // ===========================
        document.addEventListener("DOMContentLoaded", function() {
            const chartGKM = new ApexCharts(document.querySelector("#chartGKM"), {
                chart: {
                    type: "line",
                    height: 350
                },
                series: [{
                    name: "Garis Kemiskinan",
                    data: [
                        251812, 278626, 292731, 309655, 327197, 336596, 342293,
                        363581, 386576, 412130, 438991, 450302, 511011, 609865,
                        682231,
                    ],
                }, ],
                xaxis: {
                    categories: [
                        2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019,
                        2020, 2021, 2022, 2023, 2024,
                    ],
                    title: {
                        text: "Tahun"
                    },
                },
                yaxis: {
                    title: {
                        text: "Garis Kemiskinan (Rp)"
                    },
                    labels: {
                        formatter: (val) => "Rp" + val.toLocaleString("id-ID"),
                    },
                },
                tooltip: {
                    y: {
                        formatter: (val) => "Rp" + val.toLocaleString("id-ID"),
                    },
                },
                colors: ["#1e3a8a"], // biru tua
            });
            chartGKM.render();
        });

        // ===========================
        // Grafik Persentase Kemiskinan
        // ===========================
        const chartP0 = new ApexCharts(document.querySelector("#chartP0"), {
            chart: {
                type: "line",
                height: 300
            },
            series: [{
                name: "TPT",
                data: [
                    20.89, 20.84, 18.01, 18.6, 17.65, 17.79, 17.44, 17.22, 16.65,
                    16.11, 15.5, 16.04, 15.29, 14.57, 14.41,
                ],
            }, ],
            xaxis: {
                categories: [
                    2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
                    2021, 2022, 2023, 2024,
                ],
                title: {
                    text: "Tahun"
                },
            },
            yaxis: {
                min: 8,
                max: 22,
                title: {
                    text: "Persentase (%)"
                },
                labels: {
                    formatter: (val) => val.toFixed(1) + "%",
                },
            },
            tooltip: {
                y: {
                    formatter: (val) => val.toFixed(1) + "%",
                },
            },
            colors: ["#1d4ed8"], // biru medium
        });
        chartP0.render();
        // Grafik Garis Kemiskinan x Persentase kemiskinan

        const scatterData = [{
                x: 251812,
                y: 20.89
            },
            {
                x: 278626,
                y: 20.84
            },
            {
                x: 292731,
                y: 18.01
            },
            {
                x: 309655,
                y: 18.6
            },
            {
                x: 327197,
                y: 17.65
            },
            {
                x: 336596,
                y: 17.79
            },
            {
                x: 342293,
                y: 17.44
            },
            {
                x: 363581,
                y: 17.22
            },
            {
                x: 386576,
                y: 16.65
            },
            {
                x: 412130,
                y: 16.11
            },
            {
                x: 438991,
                y: 15.5
            },
            {
                x: 450302,
                y: 16.04
            },
            {
                x: 511011,
                y: 15.29
            },
            {
                x: 609865,
                y: 14.57
            },
            {
                x: 682231,
                y: 14.41
            },
        ];

        const chartScatter = new ApexCharts(document.querySelector("#chartGKM-P0"), {
            chart: {
                type: "scatter",
                height: 350,
                zoom: {
                    enabled: true,
                    type: "xy"
                },
            },
            series: [{
                name: "GKM vs Persentase Kemiskinan",
                data: scatterData,
            }, ],
            xaxis: {
                title: {
                    text: "Garis Kemiskinan (Rp)"
                },
                labels: {
                    formatter: (val) => "Rp" + Number(val).toLocaleString("id-ID"),
                },
            },
            yaxis: {
                min: 8,
                max: 22,
                title: {
                    text: "Persentase Kemiskinan (%)"
                },
                labels: {
                    formatter: (val) => val.toFixed(2) + "%",
                },
            },
            tooltip: {
                x: {
                    formatter: (val) => "Rp" + Number(val).toLocaleString("id-ID"),
                },
                y: {
                    formatter: (val) => val.toFixed(2) + "%",
                },
            },
            colors: ["#1E3A8A"],
        });

        chartScatter.render();

        // Grafik Kedalaman kemiskinan P1
        const chartP1 = new ApexCharts(document.querySelector("#chartP1"), {
            chart: {
                type: "line",
                height: 350,
            },
            series: [{
                name: "Indeks Kedalaman Kemiskinan (P1)",
                data: [
                    4.3, 3.26, 3.3, 2.41, 3.72, 2.99, 4.19, 2.35, 3.4, 4.02, 2.36,
                    2.83, 3.32, 3.13, 3.17,
                ],
            }, ],
            xaxis: {
                categories: [
                    2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
                    2021, 2022, 2023, 2024,
                ],
                title: {
                    text: "Tahun"
                },
            },
            yaxis: {
                title: {
                    text: "Indeks P1"
                },
                labels: {
                    formatter: (val) => val.toFixed(2),
                },
                min: 0,
            },
            tooltip: {
                y: {
                    formatter: (val) => val.toFixed(2),
                },
            },
            colors: ["#2563eb"], // biru tua
        });

        chartP1.render();

        // Grafik Indeks Keparahan Kemiskinan P2

        const chartP2 = new ApexCharts(document.querySelector("#chartP2"), {
            chart: {
                type: "line",
                height: 350,
            },
            series: [{
                name: "Indeks Keparahan Kemiskinan (P2)",
                data: [
                    1.16, 0.69, 0.93, 0.46, 1.02, 0.75, 1.38, 0.48, 1.04, 1.42,
                    0.59, 0.73, 1.0, 0.91, 1.01,
                ],
            }, ],
            xaxis: {
                categories: [
                    2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
                    2021, 2022, 2023, 2024,
                ],
                title: {
                    text: "Tahun"
                },
            },
            yaxis: {
                title: {
                    text: "Indeks P2"
                },
                labels: {
                    formatter: (val) => val.toFixed(2),
                },
                min: 0,
            },
            tooltip: {
                y: {
                    formatter: (val) => val.toFixed(2),
                },
            },
            colors: ["#1e3a8a"], // biru navy tua
        });

        chartP2.render();

        // Grafik Keparahan Kemiskinan Antar Kabkot
        const dataP2 = [{
                daerah: "Sorong",
                nilai: 2.35
            },
            {
                daerah: "Teluk Bintuni",
                nilai: 2.25
            },
            {
                daerah: "Papua Barat Daya",
                nilai: 1.59
            },
            {
                daerah: "Manokwari Selatan",
                nilai: 1.54
            },
            {
                daerah: "Pegunungan Arfak",
                nilai: 1.38
            },
            {
                daerah: "Fakfak",
                nilai: 1.35
            },
            {
                daerah: "Papua Barat",
                nilai: 1.28
            },
            {
                daerah: "Teluk Wondama",
                nilai: 1.15
            },
            {
                daerah: "Tambrauw",
                nilai: 1.09
            },
            {
                daerah: "Maybrat",
                nilai: 1.08
            },
            {
                daerah: "Sorong Selatan",
                nilai: 1.07
            },
            {
                daerah: "Kaimana",
                nilai: 1.01
            },
            {
                daerah: "Kota Sorong",
                nilai: 1.01
            },
            {
                daerah: "Raja Ampat",
                nilai: 0.87
            },
            {
                daerah: "Manokwari",
                nilai: 0.82
            },
        ];

        // Urutkan dari nilai terendah ke tertinggi
        dataP2.sort((a, b) => a.nilai - b.nilai);

        // Ambil label dan nilai
        const labels = dataP2.map((d) => d.daerah);
        const values = dataP2.map((d) => d.nilai);
        const colors = dataP2.map((d) =>
            d.daerah === "Kaimana" ? "#1e40af" : "#60a5fa"
        );

        new ApexCharts(document.querySelector("#chartP2b"), {
            chart: {
                type: "bar",
                height: 500,
            },
            series: [{
                name: "Indeks P2",
                data: values,
            }, ],
            xaxis: {
                categories: labels,
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: "12px"
                    },
                },
                title: {
                    text: "Kabupaten/Kota"
                },
            },
            yaxis: {
                title: {
                    text: "Indeks P2"
                },
                labels: {
                    formatter: (val) => val.toFixed(2),
                },
                min: 0,
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: "55%",
                    distributed: true,
                    dataLabels: {
                        position: "top"
                    },
                },
            },
            dataLabels: {
                enabled: true,
                formatter: (val) => val.toFixed(2),
                offsetY: -16,
                style: {
                    colors: ["#000000"],
                    fontWeight: 400,
                    fontSize: "10px",
                },
            },

            colors: colors,
            tooltip: {
                y: {
                    formatter: (val) => val.toFixed(2),
                },
            },
            legend: {
                show: false
            },
        }).render();

        // ===========================
        // Pengeluaran Susenas antar kabkot
        // ===========================
        const options = {
            chart: {
                type: "bar",
                height: 600,
            },
            series: [{
                name: "Pengeluaran per Kapita",
                data: [
                    2220877, 1832856, 1832594, 1781795, 1696750, 1650516, 1643488,
                    1642730, 1579707, 1511992, 1335871, 1295276, 1269717, 1172997,
                    1015974,
                ],
            }, ],
            xaxis: {
                categories: [
                    "Maybrat",
                    "Manokwari",
                    "Teluk Bintuni",
                    "Manokwari Selatan",
                    "Kota Sorong",
                    "Sorong",
                    "Papua Barat",
                    "Papua Barat Daya",
                    "Kaimana",
                    "Fakfak",
                    "Raja Ampat",
                    "Teluk Wondama",
                    "Sorong Selatan",
                    "Tambrauw",
                    "Pegunungan Arfak",
                ],
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: "outside",
                    },
                },
            },
            dataLabels: {
                enabled: true,
                offsetX: 24,
                formatter: function(val) {
                    return `Rp ${val.toLocaleString()}`;
                },
                style: {
                    fontSize: "10px",
                    colors: ["black"],
                },
            },

            tooltip: {
                y: {
                    formatter: function(val) {
                        return `Rp ${val.toLocaleString()}`;
                    },
                },
            },
        };

        const chart = new ApexCharts(document.querySelector("#chartPengSus"), options);
        chart.render();



        const chartPengSus2 = new ApexCharts(document.querySelector("#chartPengSus2"), {
            chart: {
                type: "bar",
                height: 600,
                stacked: true,
            },
            series: [{
                    name: "Makanan",
                    data: [
                        1161443, 905873, 948884, 910027, 809463, 821710, 836642,
                        810863, 772325, 792558, 719416, 726675, 621940, 688302, 558023
                    ],
                },
                {
                    name: "Bukan Makanan",
                    data: [
                        1059434, 926983, 883710, 871768, 887287, 828805, 806846,
                        831867, 807383, 719434, 616455, 568600, 647777, 484695, 457952
                    ],
                },
            ],
            xaxis: {
                categories: [
                    "Maybrat", "Manokwari", "Teluk Bintuni", "Manokwari Selatan", "Kota Sorong",
                    "Sorong", "Papua Barat", "Papua Barat Daya", "Kaimana", "Fakfak",
                    "Raja Ampat", "Teluk Wondama", "Sorong Selatan", "Tambrauw", "Pegunungan Arfak"
                ],
                title: {
                    text: "Rupiah"

                },
                labels: {
                    formatter: (val) => `Rp ${val.toLocaleString()}`
                },
            },
            yaxis: {
                title: {
                    text: "Kabupaten/Kota"

                },

            },
            dataLabels: {
                enabled: true,
                offsetX: 24,
                formatter: function(val) {
                    return `Rp ${val.toLocaleString()}`;
                },
                style: {
                    fontSize: "10px",
                    colors: ["black"],
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return `Rp ${val.toLocaleString()}`;
                    },
                },
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: "outside",
                    },
                },
            },
            legend: {
                position: "top",
            },
            colors: ["#10b981", "#3b82f6"], // hijau & biru
        });

        chartPengSus2.render();

        //chart protein
        const chartProtein = new ApexCharts(document.querySelector("#chartProtein"), {
            chart: {
                type: "bar",
                height: 600
            },
            series: [{
                name: "Konsumsi Protein (gram/hari)",
                data: [{
                        x: "Indonesia",
                        y: 62.33,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Kota Sorong",
                        y: 59.95,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Sorong",
                        y: 59.17,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Raja Ampat",
                        y: 58.91,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Teluk Bintuni",
                        y: 55.86,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Kaimana",
                        y: 54.7,
                        fillColor: "#d97706"
                    }, // Lebih gelap
                    {
                        x: "Papua Barat",
                        y: 54.62,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Fakfak",
                        y: 53.8,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Manokwari",
                        y: 53.41,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Manokwari Selatan",
                        y: 53.11,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Teluk Wondama",
                        y: 49.61,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Maybrat",
                        y: 45.73,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Tambrauw",
                        y: 42.85,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Pegunungan Arfak",
                        y: 41.77,
                        fillColor: "#f59e0b"
                    },
                    {
                        x: "Sorong Selatan",
                        y: 40.46,
                        fillColor: "#f59e0b"
                    }
                ]
            }],
            xaxis: {
                title: {
                    text: "Kabupaten/Kota"
                },
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: "11px"
                    }
                }
            },
            yaxis: {
                title: {
                    text: "Gram per Kapita per Hari"
                },
                labels: {
                    formatter: (val) => `${val.toFixed(2)} g`
                }
            },
            tooltip: {
                y: {
                    formatter: (val) => `${val.toFixed(2)} gram`
                }
            },
            dataLabels: {
                enabled: true,
                formatter: (val) => `${val.toFixed(2)} g`,
                style: {
                    fontSize: "10px",
                    colors: ["#000"]
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    dataLabels: {
                        position: "top"
                    }
                }
            }
        });

        chartProtein.render();


        // Chart Pola Konsumsi

        const chartPolaKonsumsi = new ApexCharts(document.querySelector("#chartPolaKonsumsi"), {
            chart: {
                type: "bar",
                height: 400,
                stacked: true
            },
            series: [{
                    name: "Makanan",
                    data: [
                        59.80, 60.63, 58.17, 56.24, 57.43,
                        52.06, 48.38, 48.53, 50.98, 49.48,
                        49.81, 48.35, 50.08, 48.91, 48.89
                    ]
                },
                {
                    name: "Bukan Makanan",
                    data: [
                        40.20, 39.37, 41.83, 43.76, 42.57,
                        47.94, 51.62, 51.47, 49.02, 50.52,
                        50.19, 51.65, 49.92, 51.09, 51.11
                    ]
                }
            ],
            xaxis: {
                categories: [
                    2010, 2011, 2012, 2013, 2014,
                    2015, 2016, 2017, 2018, 2019,
                    2020, 2021, 2022, 2023, 2024
                ],
                title: {
                    text: "Tahun"
                }
            },
            yaxis: {
                min: 0,
                max: 100,
                title: {
                    text: "Persentase (%)"
                },
                labels: {
                    formatter: (val) => `${val.toFixed(1)}%`
                }
            },
            tooltip: {
                y: {
                    formatter: (val) => `${val.toFixed(2)}%`
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                position: "top"
            },
            colors: ["#2563eb", "#f59e0b"] // Biru untuk makanan, oranye untuk non-makanan
        });

        chartPolaKonsumsi.render();

        //chart angka partisipasi
        const chartAPM = new ApexCharts(document.querySelector("#chartAPM"), {
            chart: {
                type: "line",
                height: 350,
                zoom: {
                    enabled: true
                }
            },
            series: [{
                    name: "APM SD",
                    data: [95.8, 88.09, 94.11, 90.53, 92.25, 95.94, 91.99, 93.65, 96.43, 96.9, 96.7, 96.63,
                        97.39, 97.23, 97.38
                    ]
                },
                {
                    name: "APM SMP",
                    data: [38.98, 61.36, 55.67, 52.89, 56.99, 48.28, 56.52, 58.51, 56.84, 58.63, 58.59, 60.93,
                        61.02, 61.99, 59.81
                    ]
                },
                {
                    name: "APM SMA",
                    data: [26.28, 41.57, 36.17, 51.93, 60.48, 48.61, 54.73, 56.44, 52.2, 52.76, 52.03, 57.22,
                        57.03, 63.82, 54.06
                    ]
                }
            ],
            xaxis: {
                categories: [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023,
                    2024
                ],
                title: {
                    text: "Tahun"
                }
            },
            yaxis: {
                title: {
                    text: "Persentase (%)"
                },
                min: 0,
                max: 100,
                labels: {
                    formatter: val => val.toFixed(2)
                }
            },
            colors: ["#2563eb", "#10b981", "#ef4444"],
            stroke: {
                width: 3,
                curve: "smooth"
            },
            markers: {
                size: 4
            },
            legend: {
                position: "top"
            }
        });

        chartAPM.render();

        //chart Rata Lama Sekolah


        const chartRLS = new ApexCharts(document.querySelector("#chartRLS"), {
            chart: {
                type: "line",
                height: 350,
                toolbar: {
                    show: true
                }
            },
            series: [{
                    name: "Kaimana",
                    data: [
                        7.65, 7.83, 7.9, 8.09,
                        8.28, 8.41, 8.58, 8.74, 8.80, 8.97
                    ]
                },
                {
                    name: "Papua Barat",
                    data: [
                        7.01, 7.06, 7.15,
                        7.27, 7.44, 7.60, 7.69, 7.84, 7.93, null
                    ]
                },
                {
                    name: "Indonesia",
                    data: [
                        8.32, 8.42, 8.50, 8.58, 8.75, 8.90, 8.97, 9.08, 9.13, 9.22
                    ]
                }
            ],
            xaxis: {
                categories: [
                    2015, 2016,
                    2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024
                ],
                title: {
                    text: "Tahun"
                }
            },
            yaxis: {
                title: {
                    text: "Rata-rata Lama Sekolah (tahun)"
                },
                labels: {
                    formatter: (val) => val.toFixed(2) + " tahun"
                },
                min: 6,
                max: 10
            },
            tooltip: {
                y: {
                    formatter: (val) => val.toFixed(2) + " tahun"
                }
            },
            colors: ["#2563eb", "#f59e0b",
                "#16a34a"
            ], // Kaimana biru, Papua Barat kuning, indonesia hijau
            stroke: {
                curve: "smooth",
                width: 3
            },
            markers: {
                size: 4
            },
            legend: {
                position: 'top'
            }
        });

        chartRLS.render();



        //Chart Umur Harapan Hidup

        const chartUHH = new ApexCharts(document.querySelector("#chartUHH"), {
            chart: {
                type: "line",
                height: 400
            },
            series: [{
                    name: "Kaimana",
                    data: [63.59, 63.79, 63.99, 64.25, 64.64, 64.81, 64.93, 65.72, 65.62, 65.86]
                },
                {
                    name: "Fakfak",
                    data: [67.72, 67.84, 67.95, 68.12, 68.41, 68.47, 68.50, 68.75, 69.02, 69.16]
                },
                {
                    name: "Papua Barat",
                    data: [65.19, 65.30, 65.32, 65.55, 65.90, 66.02, 66.14, 66.46, 66.79, 67.05]
                },
                {
                    name: "Indonesia",
                    data: [70.78, 70.90, 71.06, 71.20, 71.34, 71.47, 71.57, 71.85, 72.13, 72.39]
                }
            ],
            xaxis: {
                categories: [2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024],
                title: {
                    text: "Tahun"
                }
            },
            yaxis: {
                title: {
                    text: "Umur Harapan Hidup (tahun)"
                },
                min: 60,
                max: 75,
                labels: {
                    formatter: (val) => `${val.toFixed(1)} th`
                }
            },
            tooltip: {
                y: {
                    formatter: (val) => `${val.toFixed(2)} tahun`
                }
            },
            colors: ["#2563eb", "#f59e0b", "#10b981",
                "#ef4444"
            ], // Kaimana biru, Fakfak oranye, Papua Barat hijau, Indonesia merah
            stroke: {
                width: 2,
                curve: "smooth"
            },
            markers: {
                size: 4
            },
            legend: {
                position: "top"
            }
        });


        chartUHH.render();
        //Chart Konsumsi KKAL

        const chartKalori = new ApexCharts(document.querySelector("#chartKalori"), {
            chart: {
                type: "bar",
                height: 600
            },
            series: [{
                name: "Rata-rata Kalori (kkal/hari)",
                data: [
                    2022.48, 1957.04, 1934.03, 1857.23, 1848.55, 1843.93, 1831.54,
                    1697.35, 1696.73, 1682.88, 1660.14, 1645.63, 1450.59
                ]
            }],
            xaxis: {
                categories: [
                    "Manokwari Selatan", "Kota Sorong", "Maybrat", "Manokwari", "Raja Ampat",
                    "Sorong", "Kaimana", "Teluk Bintuni", "Fakfak", "Sorong Selatan",
                    "Teluk Wondama", "Tambrauw", "Pegunungan Arfak"
                ],
                title: {
                    text: "Kabupaten/Kota"
                },
                labels: {
                    rotate: -45
                }
            },
            yaxis: {
                title: {
                    text: "Kkal per Kapita per Hari"
                },
                labels: {
                    formatter: (val) => val.toFixed(0)
                }
            },
            plotOptions: {
                bar: {
                    distributed: true,
                    columnWidth: "50%",
                    dataLabels: {
                        position: "top" // Label muncul di atas batang
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: (val) => `${val.toFixed(2)} kkal`
                }
            },
            colors: [
                "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24",
                "#b45309", // Kaimana (warna gelap)
                "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24", "#fbbf24"
            ],
            dataLabels: {
                enabled: true,
                offsetY: -8,
                formatter: (val) => `${val.toFixed(0)} kkal`,
                style: {
                    fontSize: "10px",
                    colors: ["#000"]
                }
            },
            legend: {
                show: false
            }

        });

        chartKalori.render();

        // ===========================
        // Fungsi Toggle Modal Metadata
        // ===========================

        function toggleModal(id) {
            const el = document.getElementById(id);
            el.classList.toggle("hidden");
            el.classList.toggle("flex");
        }
    </script>



@endsection
