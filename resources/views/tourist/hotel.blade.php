@extends('layouts.app')

@section('title', 'Hotel & Resto - Jelajah Batam')

@section('content')
<section id="hotel-resto" class="w-full">
    
    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Penginapan & Kuliner</h1>
        <p class="text-gray-500">Temukan tempat istirahat terbaik dan hidangan lezat sesuai budget Anda.</p>
    </div>

    <!-- FILTER SECTION -->
    <div class="bg-white p-6 rounded-2xl shadow-xl border-t-4 border-coral mb-10 z-30">
        <div class="flex gap-4 border-b border-gray-200 pb-4 mb-4 overflow-x-auto no-scrollbar">
            <button onclick="filterKategori('semua', this)" class="btn-kategori shrink-0 px-6 py-2 rounded-full bg-coral text-white font-bold transition shadow-md">Semua</button>
            <button onclick="filterKategori('hotel', this)" class="btn-kategori shrink-0 px-6 py-2 rounded-full bg-gray-100 text-gray-500 font-bold hover:bg-gray-200 transition">Hanya Hotel</button>
            <button onclick="filterKategori('resto', this)" class="btn-kategori shrink-0 px-6 py-2 rounded-full bg-gray-100 text-gray-500 font-bold hover:bg-gray-200 transition">Hanya Restoran</button>
        </div>

        <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end" oninput="terapkanFilter()">
            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi</label>
                <select id="filter-lokasi" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-coral focus:outline-none">
                    <option value="semua">Semua Wilayah</option>
                    <option value="batu-ampar">Batu Ampar</option>
                    <option value="batam-kota">Batam Kota</option>
                    <option value="nongsa">Nongsa</option>
                </select>
            </div>
            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Harga Min (Rp)</label>
                <input type="number" id="filter-min" placeholder="0" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-coral focus:outline-none">
            </div>
            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Harga Max (Rp)</label>
                <input type="number" id="filter-max" placeholder="Tanpa batas" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-coral focus:outline-none">
            </div>
            <div class="md:col-span-1">
                <button type="button" onclick="resetFilter()" class="w-full bg-gray-200 text-slate-700 p-3 rounded-lg font-bold hover:bg-gray-300 transition">
                    <i class="fa-solid fa-rotate-right mr-2"></i>Reset Filter
                </button>
            </div>
        </form>
    </div>

    <!-- HASIL DAFTAR -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mb-16" id="list-item">
        
        <!-- Card Hotel 1 -->
        <div class="card-item bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-ocean flex flex-col transition-all duration-300" data-kategori="hotel" data-lokasi="nongsa" data-harga="2500000">
            <div class="relative h-56">
                <span class="absolute top-3 left-3 bg-ocean text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">Hotel / Resor</span>
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop" alt="Montigo" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-2xl font-bold text-slate-800 mb-1">Montigo Resorts Nongsa</h3>
                <p class="text-gray-500 text-sm mb-3"><i class="fa-solid fa-location-dot text-ocean mr-1"></i> Jl. Hang Lekir, Nongsa</p>
                <div class="mb-6 mt-auto pt-4">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Mulai Dari</p>
                    <p class="text-2xl font-black text-ocean">Rp 2.500.000 <span class="text-sm font-normal text-gray-500">/malam</span></p>
                </div>
                <div class="flex gap-3 mt-auto">
                    <!-- LINK MENUJU HALAMAN DETAIL -->
                    <a href="/detail-hotel" class="flex-1 text-center bg-gray-100 text-slate-700 py-3 rounded-lg font-bold hover:bg-gray-200 transition">
                        Lihat Detail
                    </a>
                    <a href="https://www.agoda.com" target="_blank" rel="noopener noreferrer" class="flex-1 text-center bg-ocean text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                        Agoda <i class="fa-solid fa-external-link-alt text-xs ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Resto 1 -->
        <div class="card-item bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-coral flex flex-col transition-all duration-300" data-kategori="resto" data-lokasi="batu-ampar" data-harga="150000">
            <div class="relative h-56">
                <span class="absolute top-3 left-3 bg-coral text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">Restoran</span>
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop" alt="Seafood" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-2xl font-bold text-slate-800 mb-1">Wey Wey Seafood</h3>
                <p class="text-gray-500 text-sm mb-3"><i class="fa-solid fa-location-dot text-coral mr-1"></i> Harbour Bay, Batu Ampar</p>
                <div class="mb-6 mt-auto pt-4">
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Estimasi Harga</p>
                    <p class="text-2xl font-black text-coral">Rp 150.000 <span class="text-sm font-normal text-gray-500">- 300k</span></p>
                </div>
                <div class="flex gap-3 mt-auto">
                    <!-- LINK MENUJU HALAMAN DETAIL -->
                    <a href="/detail-hotel" class="flex-1 text-center bg-gray-100 text-slate-700 py-3 rounded-lg font-bold hover:bg-gray-200 transition">
                        Lihat Detail
                    </a>
                    <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" class="flex-1 text-center bg-coral text-white py-3 rounded-lg font-bold hover:bg-red-600 transition shadow-md">
                        Maps <i class="fa-solid fa-external-link-alt text-xs ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div id="pesan-kosong" class="hidden text-center py-16 bg-white rounded-2xl shadow border border-gray-100">
        <h3 class="text-2xl font-bold text-slate-700 mb-2">Tidak Ada Hasil</h3>
        <button onclick="resetFilter()" class="mt-4 text-ocean font-bold underline hover:text-blue-700">Tampilkan Semua Kembali</button>
    </div>
</section>
@endsection

@push('scripts')
<script>
    let activeKategori = 'semua';

    function filterKategori(kategori, btn) {
        activeKategori = kategori;
        const allBtns = document.querySelectorAll('.btn-kategori');
        allBtns.forEach(b => {
            b.classList.remove('bg-coral', 'text-white', 'shadow-md');
            b.classList.add('bg-gray-100', 'text-gray-500');
        });
        btn.classList.remove('bg-gray-100', 'text-gray-500');
        btn.classList.add('bg-coral', 'text-white', 'shadow-md');
        terapkanFilter();
    }

    function terapkanFilter() {
        const filterLokasi = document.getElementById('filter-lokasi').value;
        const inputMin = parseInt(document.getElementById('filter-min').value) || 0;
        const inputMax = parseInt(document.getElementById('filter-max').value) || Infinity; 
        
        const cards = document.querySelectorAll('.card-item');
        const pesanKosong = document.getElementById('pesan-kosong');
        let adaHasil = false;

        cards.forEach(card => {
            const katCard = card.getAttribute('data-kategori');
            const lokCard = card.getAttribute('data-lokasi');
            const hrgCard = parseInt(card.getAttribute('data-harga'));

            const cekKategori = (activeKategori === 'semua' || katCard === activeKategori);
            const cekLokasi   = (filterLokasi === 'semua' || lokCard === filterLokasi);
            const cekHarga    = (hrgCard >= inputMin && hrgCard <= inputMax);

            if (cekKategori && cekLokasi && cekHarga) {
                card.style.display = 'flex';
                setTimeout(() => card.style.opacity = '1', 10);
                adaHasil = true;
            } else {
                card.style.opacity = '0';
                setTimeout(() => card.style.display = 'none', 300);
            }
        });

        setTimeout(() => {
            if (!adaHasil) pesanKosong.classList.remove('hidden');
            else pesanKosong.classList.add('hidden');
        }, 300);
    }

    function resetFilter() {
        document.getElementById('filter-lokasi').value = 'semua';
        document.getElementById('filter-min').value = '';
        document.getElementById('filter-max').value = '';
        filterKategori('semua', document.querySelector('.btn-kategori'));
    }
</script>
@endpush