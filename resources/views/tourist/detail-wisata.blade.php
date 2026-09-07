@extends('layouts.app')

@section('title', 'Jembatan Barelang - Jelajah Batam')

@section('content')
    <!-- 1. BREADCRUMB (Navigasi Jejak) -->
    <nav class="text-sm text-gray-500 mb-4 font-medium">
        <a href="/" class="hover:text-ocean transition">Beranda</a> 
        <span class="mx-2"><i class="fa-solid fa-chevron-right text-xs"></i></span>
        <a href="/wisata" class="hover:text-ocean transition">Destinasi</a>
        <span class="mx-2"><i class="fa-solid fa-chevron-right text-xs"></i></span>
        <span class="text-slate-800">Jembatan Barelang</span>
    </nav>

    <!-- 2. HERO IMAGE & JUDUL -->
    <div class="relative w-full h-[400px] md:h-[500px] rounded-3xl overflow-hidden shadow-lg mb-8 group">
        <img src="https://cms.kepriprov.go.id/api/files/uploads/2026/04/f9bd7540-9a2e-4a0b-bbed-4ebeb95ed0e6.jpg" 
             alt="Jembatan Barelang" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        
        <!-- Tombol Aksi Mengambang di Gambar (Favorite & Share) -->
        <div class="absolute top-4 right-4 flex gap-3 z-10">
            <button class="bg-white/90 backdrop-blur text-slate-700 hover:text-ocean p-3 rounded-full shadow-md transition w-12 h-12 flex items-center justify-center">
                <i class="fa-solid fa-share-nodes text-lg"></i>
            </button>
            <!-- Tombol Love memanggil fungsi sidebar dari app.blade.php -->
            <button onclick="handleFavoriteClick(this, 'barelang-1', 'Jembatan Barelang', 'https://images.unsplash.com/photo-1548817923-d656093844db', '4.9')" class="bg-white/90 backdrop-blur text-gray-300 hover:text-coral p-3 rounded-full shadow-md transition w-12 h-12 flex items-center justify-center">
                <i class="fa-solid fa-heart text-xl"></i>
            </button>
        </div>
    </div>

    <!-- 3. KONTEN DETAIL (2 Kolom) -->
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- KOLOM KIRI: Deskripsi Utama -->
        <div class="lg:w-2/3 space-y-8">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="bg-ocean text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Landmark Sejarah</span>
                    <div class="flex items-center text-yellow-500 font-bold">
                        <i class="fa-solid fa-star mr-1"></i> 4.9 <span class="text-gray-400 font-normal ml-1 text-sm">(1.2k Ulasan)</span>
                    </div>
                </div>
                <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Jembatan Barelang</h1>
                <p class="text-gray-500 text-lg"><i class="fa-solid fa-location-dot text-coral mr-2"></i>Jl. Trans Barelang, Galang, Kota Batam, Kepulauan Riau</p>
            </div>

            <!-- Deskripsi -->
            <div class="prose max-w-none text-gray-600 leading-relaxed">
                <h3 class="text-xl font-bold text-slate-800 mb-3">Tentang Destinasi Ini</h3>
                <p class="mb-4">
                    Jembatan Barelang adalah ikon ikonis Kota Batam yang menghubungkan enam pulau yakni Batam, Tonton, Nipah, Rempang, Galang, dan Galang Baru. Terdiri dari enam jembatan megah dengan arsitektur menawan, tempat ini menawarkan pemandangan laut yang spektakuler, terutama saat matahari terbenam (sunset).
                </p>
                <p>
                    Pengunjung dapat bersantai di sekitar area jembatan, menikmati kuliner seafood segar, atau sekadar berfoto dengan latar belakang jembatan kabel gantung yang megah ini. Sangat cocok untuk wisata keluarga dan fotografer.
                </p>
            </div>

            <!-- Fasilitas -->
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-2">Fasilitas Tersedia</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-square-parking text-ocean text-xl w-6"></i> Area Parkir</div>
                    <div class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-camera text-ocean text-xl w-6"></i> Spot Foto</div>
                    <div class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-utensils text-ocean text-xl w-6"></i> Pujasera / Kuliner</div>
                    <div class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-restroom text-ocean text-xl w-6"></i> Toilet Umum</div>
                    <div class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-mosque text-ocean text-xl w-6"></i> Mushola</div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN: Kartu Informasi & Harga -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-2xl shadow-xl border-t-8 border-coral p-6 sticky top-24">
                <h3 class="text-xl font-bold text-slate-800 mb-4">Informasi Kunjungan</h3>
                
                <ul class="space-y-4 mb-6">
                    <li class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <span class="text-gray-500"><i class="fa-regular fa-clock mr-2"></i>Jam Buka</span>
                        <span class="font-semibold text-slate-700">24 Jam</span>
                    </li>
                    <li class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <span class="text-gray-500"><i class="fa-solid fa-ticket mr-2"></i>Kategori</span>
                        <span class="font-semibold text-slate-700">Wisata Umum</span>
                    </li>
                </ul>

                <div class="mb-6">
                    <p class="text-sm text-gray-500 mb-1 uppercase tracking-wider font-semibold">Harga Tiket Masuk</p>
                    <div class="text-3xl font-black text-coral">Gratis</div>
                    <p class="text-xs text-gray-400 mt-1">*Hanya dikenakan biaya parkir kendaraan (Rp 5.000 - Rp 10.000)</p>
                </div>

                <!-- Tombol Aksi -->
                <a href="#map" class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-slate-700 font-bold py-3 rounded-lg transition mb-3">
                    <i class="fa-solid fa-map text-ocean mr-2"></i>Lihat di Peta
                </a>
                
                <!-- Opsi Bundling Promo jika ada -->
                <a href="/bundle" class="block w-full text-center bg-gradient-to-r from-ocean to-blue-600 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-3 rounded-lg transition shadow-md">
                    <i class="fa-solid fa-gift mr-2"></i>Lihat Promo Terkait
                </a>
            </div>
        </div>

    </div>
@endsection