@extends('layouts.app')

@section('title', 'Beranda - Jelajah Batam')

@push('styles')
<style>
    /* Menyembunyikan scrollbar untuk tampilan carousel wilayah yang lebih bersih */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush

@section('content')
    <!-- 1. HERO SECTION & PENCARIAN -->
    <div class="relative bg-cover bg-center h-[550px] rounded-3xl overflow-hidden shadow-2xl flex items-center justify-center -mt-4" 
         style="background-image: url('https://www.goersapp.com/blog/wp-content/uploads/2024/12/Jembatan-Barelang.webp');">
        
        <!-- Overlay gelap -->
        <div class="absolute inset-0 bg-slate-900 bg-opacity-40"></div>
        
        <!-- Konten Utama Hero -->
        <div class="relative z-10 text-center w-full px-6 max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                Mau Ke Mana di <span class="text-ocean">Batam</span> Hari Ini?
            </h1>
            <p class="text-lg md:text-xl text-sand mb-8 drop-shadow-md">
                Temukan surga tersembunyi, kuliner lezat, dan penginapan nyaman.
            </p>

            <!-- Kolom Search -->
            <div class="bg-white p-2 rounded-full shadow-lg flex items-center max-w-2xl mx-auto">
                <div class="pl-4 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input type="text" placeholder="Cari wilayah, wisata, atau restoran..." 
                       class="w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none rounded-full bg-transparent">
                <button class="bg-ocean hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Cari
                </button>
            </div>
        </div>
    </div>

    <!-- ================= SECTION TERDEKAT (PROXIMITY) ================= -->
    <section class="mb-16 mt-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-6 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-800 mb-2">
                    <i class="fa-solid fa-location-crosshairs text-coral mr-2"></i>Terdekat dari Anda
                </h2>
                <p class="text-gray-500">Aktifkan lokasi untuk menemukan permata tersembunyi di sekitar Anda.</p>
            </div>
            
            <!-- Tombol Trigger Lokasi -->
            <button id="btn-lokasi" onclick="dapatkanLokasi()" class="bg-white border-2 border-ocean text-ocean hover:bg-ocean hover:text-white px-6 py-2.5 rounded-full font-bold transition shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-map-pin"></i> Temukan di Sekitar
            </button>
        </div>

        <!-- State 1: Belum Ada Izin (Tampilan Awal) -->
        <div id="lokasi-placeholder" class="bg-blue-50 border border-blue-100 rounded-2xl p-10 text-center transition-all duration-500">
            <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                <i class="fa-solid fa-radar flex text-3xl text-ocean animate-pulse"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-700 mb-2">Belum Mendeteksi Lokasi</h3>
            <p class="text-gray-500 max-w-md mx-auto">Klik tombol <b>"Temukan di Sekitar"</b> di atas agar kami bisa merekomendasikan destinasi dan kuliner terbaik yang hanya berjarak beberapa menit dari tempat Anda berdiri.</p>
        </div>

        <!-- State 2: Loading (Disembunyikan secara default) -->
        <div id="lokasi-loading" class="hidden text-center py-12 transition-all duration-500">
            <i class="fa-solid fa-circle-notch fa-spin text-4xl text-ocean mb-3"></i>
            <p class="text-gray-500 font-medium">Sedang mencari koordinat Anda...</p>
        </div>

        <!-- State 3: Hasil (Disembunyikan, akan muncul jika diizinkan) -->
        <div id="lokasi-hasil" class="hidden opacity-0 transition-opacity duration-1000">
            
            <p id="teks-koordinat" class="text-sm font-semibold text-ocean mb-4 bg-blue-50 inline-block px-4 py-1.5 rounded-full border border-blue-100">
                <i class="fa-solid fa-check-circle mr-1"></i> Lokasi terdeteksi
            </p>

            <div class="flex gap-6 overflow-x-auto pb-6 snap-x no-scrollbar">
                
                <!-- Card Proximity 1 -->
                <div class="snap-start shrink-0 w-72 sm:w-80 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-800 text-xs font-black px-3 py-1.5 rounded-full shadow-md flex items-center gap-1 z-10">
                        <i class="fa-solid fa-person-walking text-ocean"></i> 0.8 km
                    </div>
                    <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?q=80&w=400&auto=format&fit=crop" alt="WTB" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-slate-800 mb-1">Welcome To Batam</h3>
                        <p class="text-xs text-gray-500 mb-3">Landmark & Pusat Kuliner</p>
                        <a href="/wisata/detail" class="block text-center bg-gray-100 hover:bg-gray-200 text-slate-700 py-2 rounded-lg text-sm font-bold transition">Lihat Rute</a>
                    </div>
                </div>

                <!-- Card Proximity 2 -->
                <div class="snap-start shrink-0 w-72 sm:w-80 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-800 text-xs font-black px-3 py-1.5 rounded-full shadow-md flex items-center gap-1 z-10">
                        <i class="fa-solid fa-car text-ocean"></i> 2.1 km
                    </div>
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=400&auto=format&fit=crop" alt="Cafe" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-slate-800 mb-1">Anchor Cafe & Roastery</h3>
                        <p class="text-xs text-gray-500 mb-3">Restoran / Cafe</p>
                        <a href="/hotel/detail" class="block text-center bg-gray-100 hover:bg-gray-200 text-slate-700 py-2 rounded-lg text-sm font-bold transition">Lihat Rute</a>
                    </div>
                </div>
                
                <!-- Card Proximity 3 -->
                <div class="snap-start shrink-0 w-72 sm:w-80 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-800 text-xs font-black px-3 py-1.5 rounded-full shadow-md flex items-center gap-1 z-10">
                        <i class="fa-solid fa-car text-ocean"></i> 4.5 km
                    </div>
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c0d509af?q=80&w=400&auto=format&fit=crop" alt="Aston" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-slate-800 mb-1">Aston Batam Hotel</h3>
                        <p class="text-xs text-gray-500 mb-3">Penginapan bintang 4</p>
                        <a href="/hotel/detail" class="block text-center bg-gray-100 hover:bg-gray-200 text-slate-700 py-2 rounded-lg text-sm font-bold transition">Lihat Rute</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ================= END SECTION TERDEKAT ================= -->

    <!-- 2. JELAJAHI BERDASARKAN WILAYAH -->
    <section class="mt-16">
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-3xl font-bold text-slate-800">Eksplorasi Wilayah</h2>
            <a href="/wisata" class="text-ocean font-semibold hover:underline">Lihat Semua</a>
        </div>
        
        <!-- Container Scroll Horizontal -->
        <div class="flex space-x-4 overflow-x-auto no-scrollbar pb-4 snap-x">
            <!-- Card Nongsa -->
            <a href="/wisata?wilayah=nongsa" class="snap-start relative min-w-[160px] md:min-w-[200px] h-[240px] md:h-[280px] rounded-2xl overflow-hidden group flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b" alt="Nongsa" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-xl font-bold">Nongsa</h3>
                    <p class="text-sm text-gray-300">32 Wisata</p>
                </div>
            </a>

            <!-- Card Sagulung -->
            <a href="/wisata?wilayah=sagulung" class="snap-start relative min-w-[160px] md:min-w-[200px] h-[240px] md:h-[280px] rounded-2xl overflow-hidden group flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1544717621-c4fc2194ff7b" alt="Sagulung" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-xl font-bold">Sagulung</h3>
                    <p class="text-sm text-gray-300">18 Wisata</p>
                </div>
            </a>

            <!-- Card Tiban / Sekupang -->
            <a href="/wisata?wilayah=tiban" class="snap-start relative min-w-[160px] md:min-w-[200px] h-[240px] md:h-[280px] rounded-2xl overflow-hidden group flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272" alt="Tiban" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-xl font-bold">Tiban</h3>
                    <p class="text-sm text-gray-300">21 Wisata</p>
                </div>
            </a>

            <!-- Card Batam Kota -->
            <a href="/wisata?wilayah=batam-kota" class="snap-start relative min-w-[160px] md:min-w-[200px] h-[240px] md:h-[280px] rounded-2xl overflow-hidden group flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af" alt="Batam Kota" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-xl font-bold">Batam Kota</h3>
                    <p class="text-sm text-gray-300">45 Wisata</p>
                </div>
            </a>
        </div>
    </section>

    <!-- 3. DESTINASI FAVORIT PENGUNJUNG -->
    <section class="mt-16">
        <h2 class="text-3xl font-bold text-ocean mb-6 border-b-2 border-ocean pb-2">Paling Sering Dikunjungi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card Favorit 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-yellow-400">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-yellow-400 text-slate-800 text-xs font-bold px-2 py-1 rounded shadow"><i class="fa-solid fa-crown mr-1"></i>Top #1</span>
                    <img src="https://images.unsplash.com/photo-1548817923-d656093844db" alt="Jembatan Barelang" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold">Jembatan Barelang</h3>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-gray-500 text-sm"><i class="fa-solid fa-location-dot text-coral mr-1"></i>Sagulung</span>
                        <span class="font-bold text-slate-700"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>4.9</span>
                    </div>
                </div>
            </div>

            <!-- Card Favorit 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-ocean">
                <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b" alt="Pulau Ranoh" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Pantai Viovio</h3>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-gray-500 text-sm"><i class="fa-solid fa-location-dot text-coral mr-1"></i>Galang</span>
                        <span class="font-bold text-slate-700"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>4.7</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. REKOMENDASI RESTORAN & KULINER -->
    <section class="mt-16 mb-10">
        <div class="flex justify-between items-end mb-6 border-b-2 border-coral pb-2">
            <h2 class="text-3xl font-bold text-coral">Wisata Kuliner Terbaik</h2>
            <a href="/hotel" class="text-coral font-semibold hover:underline">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card Restoran -->
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5" alt="Seafood" class="w-full h-full object-cover rounded-t-xl">
                    <span class="absolute bottom-3 right-3 bg-black/70 text-white text-xs px-2 py-1 rounded">Seafood</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold mb-1">Kelong Seafood Nongsa</h3>
                        <p class="text-gray-500 text-sm mb-3"><i class="fa-solid fa-location-dot text-ocean mr-1"></i>Batu Besar, Nongsa</p>
                        <p class="text-sm text-slate-600 line-clamp-2">Nikmati hidangan laut segar khas Batam dengan pemandangan langsung menghadap ke laut lepas dan Singapura.</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 uppercase tracking-wide">Rentang Harga</span>
                            <span class="font-bold text-ocean">Rp 50rb - 250rb</span>
                        </div>
                        <button class="bg-coral/10 text-coral hover:bg-coral hover:text-white px-3 py-1.5 rounded transition font-semibold text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card Restoran 2 -->
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Cafe" class="w-full h-full object-cover rounded-t-xl">
                    <span class="absolute bottom-3 right-3 bg-black/70 text-white text-xs px-2 py-1 rounded">Cafe & Roastery</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold mb-1">Anchor Cafe & Roastery</h3>
                        <p class="text-gray-500 text-sm mb-3"><i class="fa-solid fa-location-dot text-ocean mr-1"></i>Batam Centre</p>
                        <p class="text-sm text-slate-600 line-clamp-2">Tempat nongkrong bergaya rustic dengan pilihan kopi premium yang di-roast sendiri. Cocok untuk sarapan atau bersantai.</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 uppercase tracking-wide">Rentang Harga</span>
                            <span class="font-bold text-ocean">Rp 30rb - 100rb</span>
                        </div>
                        <button class="bg-coral/10 text-coral hover:bg-coral hover:text-white px-3 py-1.5 rounded transition font-semibold text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. PROMO BUNDLING SPESIAL -->
    <section class="mt-16 mb-10">
        <div class="flex justify-between items-end mb-6 border-b-2 border-yellow-400 pb-2">
            <h2 class="text-3xl font-bold text-slate-800">Promo Bundling Spesial</h2>
            <a href="/bundle" class="text-yellow-600 font-semibold hover:underline">Lihat Semua</a>
        </div>
        
        <!-- Card Horizontal Promo -->
        <div class="bg-gradient-to-r from-ocean to-blue-800 rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row items-center relative transition duration-300 hover:shadow-2xl hover:-translate-y-1">
            <!-- Label Diskon -->
            <div class="absolute top-0 left-0 bg-yellow-400 text-slate-800 font-bold px-4 py-2 rounded-br-xl z-10 shadow flex items-center gap-2">
                <i class="fa-solid fa-tag"></i> Hemat 30%
            </div>
            
            <!-- Gambar Promo -->
            <div class="w-full md:w-2/5 h-64 md:h-auto self-stretch">
                <img src="https://images.unsplash.com/photo-1512100356356-de1b84283e18?auto=format&fit=crop&w=800&q=80" alt="Promo Nongsa" class="w-full h-full object-cover">
            </div>
            
            <!-- Detail Promo -->
            <div class="w-full md:w-3/5 p-8 text-white">
                <h3 class="text-2xl md:text-3xl font-bold mb-3">Paket Nongsa Escape (2H1M)</h3>
                <p class="text-sand mb-6 leading-relaxed opacity-90">Liburan tenang dan romantis tanpa repot. Paket ini sudah mencakup tiket feri pulang-pergi, menginap 1 malam di resor mewah, dan voucher makan malam seafood spesial.</p>
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end mt-4 pt-6 border-t border-white/20">
                    <div>
                        <span class="text-sm line-through text-blue-200">Rp 3.200.000</span>
                        <div class="text-3xl md:text-4xl font-black text-yellow-300">Rp 2.500.000 <span class="text-sm font-normal text-white opacity-80">/pax</span></div>
                    </div>
                    <a href="/bundle" class="mt-6 md:mt-0 bg-coral hover:bg-red-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg flex items-center gap-2">
                        Ambil Promo <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. FAQ (Pertanyaan yang Sering Diajukan) -->
    <section class="mt-20 mb-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-ocean">Pertanyaan Seputar Jelajah Batam</h2>
            <p class="text-gray-500 mt-2">Temukan jawaban untuk membantu merencanakan perjalanan Anda</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4">
            
            <!-- FAQ Item 1 -->
            <details class="group bg-white rounded-xl shadow-md cursor-pointer [&_summary::-webkit-details-marker]:hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6">
                    Bagaimana cara menggunakan kode promo dari Mini Games?
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <i class="fa-solid fa-chevron-down text-ocean"></i>
                    </span>
                </summary>
                <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                    Setelah Anda menyelesaikan puzzle dan mendapatkan kode promo (contoh: <strong>BATAMSERU10</strong>), Anda bisa memasukkan kode tersebut pada kolom "Kode Diskon" di halaman pembayaran (checkout) saat memesan tiket feri atau hotel di platform kami.
                </div>
            </details>

            <!-- FAQ Item 2 -->
            <details class="group bg-white rounded-xl shadow-md cursor-pointer [&_summary::-webkit-details-marker]:hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6">
                    Apakah tiket feri sudah termasuk pajak pelabuhan (Seaport Tax)?
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <i class="fa-solid fa-chevron-down text-ocean"></i>
                    </span>
                </summary>
                <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                    Ya, untuk kenyamanan Anda, semua harga tiket feri yang tertera di platform Jelajah Batam sudah bersifat final (All-in) dan mencakup pajak pelabuhan (Seaport Tax) baik untuk keberangkatan dari Batam, Singapura, maupun Malaysia.
                </div>
            </details>

            <!-- FAQ Item 3 -->
            <details class="group bg-white rounded-xl shadow-md cursor-pointer [&_summary::-webkit-details-marker]:hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6">
                    Bisakah saya membatalkan pesanan yang sudah dibayar?
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <i class="fa-solid fa-chevron-down text-ocean"></i>
                    </span>
                </summary>
                <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                    Kebijakan pembatalan dan *refund* (pengembalian dana) bergantung pada masing-masing mitra hotel dan operator feri. Silakan periksa detail "Kebijakan Pembatalan" pada halaman deskripsi produk sebelum menyelesaikan pembayaran.
                </div>
            </details>

        </div>
    </section>
@endsection

<!-- SCRIPT UNTUK FITUR LOKASI DITAMBAHKAN DI SINI (Di luar @section('content')) -->
@push('scripts')
<script>
    function dapatkanLokasi() {
        const btn = document.getElementById('btn-lokasi');
        const placeholder = document.getElementById('lokasi-placeholder');
        const loading = document.getElementById('lokasi-loading');
        const hasil = document.getElementById('lokasi-hasil');
        const teksKoordinat = document.getElementById('teks-koordinat');

        // 1. Ubah UI ke status Loading
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mendeteksi...';
        btn.classList.add('opacity-70', 'cursor-not-allowed');
        btn.disabled = true;
        
        placeholder.classList.add('hidden');
        loading.classList.remove('hidden');

        // 2. Cek apakah browser mendukung Geolocation
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                // JIKA USER MENGIZINKAN (SUCCESS)
                function(position) {
                    const lat = position.coords.latitude;
                    const long = position.coords.longitude;
                    
                    // Hilangkan loading, tampilkan hasil
                    loading.classList.add('hidden');
                    hasil.classList.remove('hidden');
                    
                    // Efek fade-in halus
                    setTimeout(() => {
                        hasil.classList.remove('opacity-0');
                        btn.innerHTML = '<i class="fa-solid fa-check"></i> Lokasi Aktif';
                        btn.classList.remove('border-ocean', 'text-ocean');
                        btn.classList.add('bg-green-500', 'text-white', 'border-green-500');
                        
                        // Tampilkan koordinat ke layar (untuk simulasi)
                        teksKoordinat.innerHTML = `<i class="fa-solid fa-location-crosshairs mr-1"></i> Titik Anda: ${lat.toFixed(4)}, ${long.toFixed(4)}`;
                    }, 200);
                },
                // JIKA USER MENOLAK / ERROR
                function(error) {
                    loading.classList.add('hidden');
                    placeholder.classList.remove('hidden');
                    btn.disabled = false;
                    btn.classList.remove('opacity-70', 'cursor-not-allowed');
                    btn.innerHTML = '<i class="fa-solid fa-map-pin"></i> Coba Lagi';
                    
                    alert("Gagal mendapatkan lokasi. Pastikan Anda memberikan izin akses lokasi pada browser Anda.");
                }
            );
        } else {
            alert("Browser Anda tidak mendukung fitur lokasi.");
        }
    }
</script>
@endpush