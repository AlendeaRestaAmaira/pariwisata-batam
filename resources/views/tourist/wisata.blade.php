@extends('layouts.app')

@section('title', 'Destinasi Populer - Jelajah Batam')

@section('content')
<!-- 1. BREADCRUMB & HEADER -->
<div class="mb-8">
    <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Eksplorasi Destinasi Batam</h1>
    <p class="text-gray-500">Temukan pesona alam, sejarah, dan hiburan di berbagai sudut kota.</p>
</div>

<!-- 2. FILTER WILAYAH -->
<!-- 2. FILTER PENCARIAN & WILAYAH -->
<section class="mb-10 z-30 bg-sand/95 backdrop-blur-md py-4 border-b border-gray-200 shadow-sm rounded-xl px-4 md:px-6">
    <div class="flex flex-col md:flex-row gap-2 items-center justify-between">
        
        <!-- Kolom Pencarian Teks -->
        <div class="relative w-full md:w-1/2">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" id="searchInput" oninput="filterKombinasi()" placeholder="Cari nama destinasi (Cth: Pantai, Jembatan...)" 
                   class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ocean focus:border-transparent bg-white shadow-sm text-sm text-slate-700 transition">
        </div>

        <!-- Dropdown Wilayah -->
        <div class="flex items-center gap-3 w-full md:w-auto shrink-0">
            <span class="text-sm font-bold text-slate-700 hidden md:block"><i class="fa-solid fa-filter text-ocean mr-1"></i> Wilayah:</span>
            
            <div class="relative w-full md:w-64">
                <select id="regionSelect" onchange="filterKombinasi()" class="w-full appearance-none pl-4 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ocean focus:border-transparent bg-white shadow-sm text-sm text-slate-700 cursor-pointer transition">
                    <option value="semua">Semua Wilayah</option>
                    <option value="batam-kota">Batam Kota</option>
                    <option value="batu-aji">Batu Aji</option>
                    <option value="batu-ampar">Batu Ampar</option>
                    <option value="belakang-padang">Belakang Padang</option>
                    <option value="bengkong">Bengkong</option>
                    <option value="bulang">Bulang</option>
                    <option value="galang">Galang / Rempang</option>
                    <option value="lubuk-baja">Lubuk Baja (Nagoya)</option>
                    <option value="nongsa">Nongsa</option>
                    <option value="sagulung">Sagulung / Barelang</option>
                    <option value="sei-beduk">Sei Beduk</option>
                    <option value="sekupang">Sekupang / Tiban</option>
                </select>
                <!-- Custom Arrow Icon -->
                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                    <i class="fa-solid fa-chevron-down text-sm"></i>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- 3. DAFTAR WISATA -->
<section id="wisata">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="grid-wisata">
        
        <!-- Card 1: Jembatan Barelang (Sagulung) -->
        <!-- Perhatikan penambahan atribut data-wilayah="sagulung" -->
        <div class="card-destinasi bg-white rounded-xl shadow-lg overflow-hidden relative transition-all duration-500" data-wilayah="sagulung">
            <button onclick="handleFavoriteClick(this, 'barelang-1', 'Jembatan Barelang', 'https://cms.kepriprov.go.id/api/files/uploads/2026/04/f9bd7540-9a2e-4a0b-bbed-4ebeb95ed0e6.jpg', '4.8')" 
            class="absolute top-3 right-3 text-gray-300 hover:text-coral transition text-2xl z-10 bg-white/80 p-2 rounded-full shadow backdrop-blur-sm flex">
                <i class="fa-solid fa-heart"></i>
            </button>
            <img src="https://cms.kepriprov.go.id/api/files/uploads/2026/04/f9bd7540-9a2e-4a0b-bbed-4ebeb95ed0e6.jpg" alt="Jembatan Barelang" class="w-full h-48 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-xl font-bold">Jembatan Barelang</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Sagulung</span>
                </div>
                <div class="flex items-center mb-3">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <span class="ml-1 text-gray-600 font-semibold">4.8 (1.2k Ulasan)</span>
                </div>
                <p class="text-sm text-gray-500 mb-4"><i class="fa-solid fa-wallet mr-2"></i>Gratis (Parkir Rp 5.000)</p>
                <a href="/detail-wisata" class="block text-center w-full bg-ocean text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Lihat Detail</a>
            </div>
        </div>

        <!-- Card 2: Pantai Viovio (Sagulung/Galang) -->
        <div class="card-destinasi bg-white rounded-xl shadow-lg overflow-hidden relative transition-all duration-500" data-wilayah="sagulung">
            <button onclick="handleFavoriteClick(this, 'viovio-1', 'Pantai Viovio', 'https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b', '4.6')" class="absolute top-3 right-3 text-gray-300 hover:text-coral transition text-2xl z-10 bg-white/80 p-2 rounded-full shadow backdrop-blur-sm flex">
                <i class="fa-solid fa-heart"></i>
            </button>
            <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b" alt="Pantai Viovio" class="w-full h-48 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-xl font-bold">Pantai Viovio</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Sagulung</span>
                </div>
                <div class="flex items-center mb-3">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <span class="ml-1 text-gray-600 font-semibold">4.6 (850 Ulasan)</span>
                </div>
                <p class="text-sm text-gray-500 mb-4"><i class="fa-solid fa-wallet mr-2"></i>Mulai Rp 15.000</p>
                <a href="#" class="block text-center w-full bg-ocean text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Lihat Detail</a>
            </div>
        </div>

        <!-- Card 3: Kebun Raya Batam (Nongsa) -->
        <div class="card-destinasi bg-white rounded-xl shadow-lg overflow-hidden relative transition-all duration-500" data-wilayah="nongsa">
            <button onclick="handleFavoriteClick(this, 'kebun-1', 'Kebun Raya Batam', 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272', '4.5')" class="absolute top-3 right-3 text-gray-300 hover:text-coral transition text-2xl z-10 bg-white/80 p-2 rounded-full shadow backdrop-blur-sm flex">
                <i class="fa-solid fa-heart"></i>
            </button>
            <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272" alt="Kebun Raya" class="w-full h-48 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-xl font-bold">Kebun Raya Batam</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Nongsa</span>
                </div>
                <div class="flex items-center mb-3">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <span class="ml-1 text-gray-600 font-semibold">4.5 (420 Ulasan)</span>
                </div>
                <p class="text-sm text-gray-500 mb-4"><i class="fa-solid fa-wallet mr-2"></i>Gratis</p>
                <a href="#" class="block text-center w-full bg-ocean text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Lihat Detail</a>
            </div>
        </div>
        
        <!-- Card 4: Welcome To Batam (Batam Kota) -->
        <div class="card-destinasi bg-white rounded-xl shadow-lg overflow-hidden relative transition-all duration-500" data-wilayah="batam-kota">
            <button onclick="handleFavoriteClick(this, 'wtb-1', 'Welcome To Batam', 'https://images.unsplash.com/photo-1555899434-94d1368aa7af', '4.7')" class="absolute top-3 right-3 text-gray-300 hover:text-coral transition text-2xl z-10 bg-white/80 p-2 rounded-full shadow backdrop-blur-sm flex">
                <i class="fa-solid fa-heart"></i>
            </button>
            <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af" alt="WTB Monument" class="w-full h-48 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-xl font-bold">Monumen WTB</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Batam Kota</span>
                </div>
                <div class="flex items-center mb-3">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <span class="ml-1 text-gray-600 font-semibold">4.7 (2.1k Ulasan)</span>
                </div>
                <p class="text-sm text-gray-500 mb-4"><i class="fa-solid fa-wallet mr-2"></i>Gratis (Banyak Kuliner)</p>
                <a href="#" class="block text-center w-full bg-ocean text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Lihat Detail</a>
            </div>
        </div>

    </div>

    <!-- Pesan Data Kosong (Ditampilkan via JS jika filter tidak menemukan hasil) -->
    <div id="pesan-kosong" class="hidden text-center py-20">
        <i class="fa-solid fa-map-location-dot text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-2xl font-bold text-slate-700 mb-2">Destinasi Belum Tersedia</h3>
        <p class="text-gray-500">Saat ini belum ada data wisata untuk wilayah yang Anda pilih.</p>
        <button onclick="filterWilayah('semua', document.querySelector('.btn-filter'))" class="mt-4 text-ocean underline font-semibold">Kembali Tampilkan Semua</button>
    </div>

</section>
@endsection

@push('scripts')
<script>
    // FUNGSI FILTER WILAYAH
    function filterWilayah(wilayah, tombolDiklik) {
        // 1. Ambil semua card destinasi dan tombol filter
        const cards = document.querySelectorAll('.card-destinasi');
        const buttons = document.querySelectorAll('.btn-filter');
        const pesanKosong = document.getElementById('pesan-kosong');
        let adaHasil = false;

        // 2. Ubah gaya tombol (Reset semua tombol jadi putih, lalu jadikan tombol yg diklik jadi biru)
        buttons.forEach(btn => {
            btn.classList.remove('bg-ocean', 'text-white', 'border-ocean', 'shadow-md');
            btn.classList.add('bg-white', 'text-slate-600', 'border-gray-300');
        });
        
        tombolDiklik.classList.remove('bg-white', 'text-slate-600', 'border-gray-300');
        tombolDiklik.classList.add('bg-ocean', 'text-white', 'border-ocean', 'shadow-md');

        // 3. Logika Sembunyikan/Tampilkan Card
        cards.forEach(card => {
            const wilayahCard = card.getAttribute('data-wilayah');
            
            if (wilayah === 'semua' || wilayah === wilayahCard) {
                // Tampilkan card dengan efek transisi
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 50);
                adaHasil = true;
            } else {
                // Sembunyikan card
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300); // Waktu harus sesuai dengan durasi CSS transition-all
            }
        });

        // 4. Tampilkan pesan kosong jika wilayah tidak memiliki data
        setTimeout(() => {
            if (!adaHasil) {
                pesanKosong.classList.remove('hidden');
            } else {
                pesanKosong.classList.add('hidden');
            }
        }, 300);
    }
</script>
@endpush