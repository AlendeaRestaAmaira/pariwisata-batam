@extends('layouts.app')

@section('title', 'Montigo Resorts - Jelajah Batam')

@section('content')
    <!-- BREADCRUMB -->
    <nav class="text-sm text-gray-500 mb-4 font-medium">
        <a href="/" class="hover:text-ocean transition">Beranda</a> 
        <span class="mx-2"><i class="fa-solid fa-chevron-right text-xs"></i></span>
        <a href="/hotel" class="hover:text-ocean transition">Hotel & Resto</a>
        <span class="mx-2"><i class="fa-solid fa-chevron-right text-xs"></i></span>
        <span class="text-slate-800">Montigo Resorts Nongsa</span>
    </nav>

    <!-- HERO IMAGE GALLERY -->
    <div class="relative w-full h-[400px] md:h-[500px] rounded-3xl overflow-hidden shadow-lg mb-8 group">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2000&auto=format&fit=crop" alt="Montigo Resort" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4 bg-ocean text-white px-4 py-1.5 rounded-full text-sm font-bold shadow-md">
            Resor Mewah
        </div>
        
        <!-- Tombol Aksi Kanan Atas -->
        <div class="absolute top-4 right-4 flex gap-3 z-10">
            <button class="bg-white/90 backdrop-blur text-slate-700 hover:text-ocean p-3 rounded-full shadow-md transition w-12 h-12 flex items-center justify-center">
                <i class="fa-solid fa-share-nodes text-lg"></i>
            </button>
            <button onclick="handleFavoriteClick(this, 'hotel-1', 'Montigo Resorts', 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800', '4.8')" class="bg-white/90 backdrop-blur text-gray-300 hover:text-coral p-3 rounded-full shadow-md transition w-12 h-12 flex items-center justify-center">
                <i class="fa-solid fa-heart text-xl"></i>
            </button>
        </div>
    </div>

    <!-- KONTEN DETAIL UTAMA -->
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- KOLOM KIRI (Info & Fasilitas) -->
        <div class="lg:w-2/3 space-y-8">
            <div>
                <div class="flex items-center text-yellow-500 font-bold mb-2 text-lg">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <span class="text-gray-400 font-normal ml-2 text-sm">(Berdasarkan 3.542 Ulasan Agoda & Traveloka)</span>
                </div>
                <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Montigo Resorts Nongsa</h1>
                <p class="text-gray-500 text-lg"><i class="fa-solid fa-location-dot text-ocean mr-2"></i>Jl. Hang Lekir, Nongsa, Batam, Kepulauan Riau 29465</p>
            </div>

            <!-- Deskripsi -->
            <div class="prose max-w-none text-gray-600 leading-relaxed">
                <h3 class="text-xl font-bold text-slate-800 mb-3 border-b pb-2">Tentang Penginapan</h3>
                <p class="mb-4">
                    Menawarkan perpaduan sempurna antara kemewahan modern dan keindahan alam tropis, Montigo Resorts Nongsa adalah destinasi tepi pantai eksklusif di Batam. Setiap vila didesain dengan konsep minimalis elegan dan dilengkapi dengan kolam renang pribadi serta pemandangan langsung ke hamparan Laut Cina Selatan.
                </p>
            </div>

            <!-- Fasilitas Utama -->
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-2">Fasilitas Utama</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-y-4 gap-x-2">
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-wifi text-ocean text-xl w-6"></i> WiFi Gratis</div>
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-water-ladder text-ocean text-xl w-6"></i> Kolam Renang</div>
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-spa text-ocean text-xl w-6"></i> Spa & Pijat</div>
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-mug-saucer text-ocean text-xl w-6"></i> Sarapan Gratis</div>
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-martini-glass-citrus text-ocean text-xl w-6"></i> Bar / Lounge</div>
                    <div class="flex items-center gap-3 text-gray-700 font-medium"><i class="fa-solid fa-dumbbell text-ocean text-xl w-6"></i> Pusat Kebugaran</div>
                </div>
            </div>
            
            <!-- Kebijakan Akomodasi -->
            <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
                <h3 class="text-lg font-bold text-slate-800 mb-3"><i class="fa-solid fa-circle-info text-ocean mr-2"></i>Kebijakan Properti</h3>
                <ul class="text-sm text-gray-600 space-y-2 list-disc list-inside">
                    <li>Waktu Check-in: 15:00 WIB | Check-out: 12:00 WIB</li>
                    <li>Hewan peliharaan tidak diperbolehkan.</li>
                    <li>Menyediakan layanan antar-jemput pelabuhan Nongsapura secara gratis.</li>
                </ul>
            </div>
        </div>

        <!-- KOLOM KANAN (Harga & Booking) -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-2xl shadow-xl border-t-8 border-ocean p-6 sticky top-24">
                
                <div class="mb-6">
                    <p class="text-sm text-gray-500 mb-1 uppercase tracking-wider font-bold">Harga Termurah</p>
                    <div class="text-4xl font-black text-ocean">Rp 2.500.000</div>
                    <p class="text-sm text-gray-400 mt-1">/ kamar / malam (Termasuk Pajak)</p>
                </div>

                <div class="space-y-3 mb-6">
                    <h4 class="font-semibold text-slate-800 text-sm">Pesan melalui mitra resmi kami:</h4>
                    
                    <!-- Booking Agoda -->
                    <a href="https://www.agoda.com" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between w-full bg-white border-2 border-gray-200 hover:border-ocean hover:bg-blue-50 text-slate-700 py-3 px-4 rounded-xl transition group">
                        <span class="font-bold flex items-center gap-2">Agoda</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-gray-400 group-hover:text-ocean transition"></i>
                    </a>

                    <!-- Booking Traveloka -->
                    <a href="https://www.traveloka.com/id-id/hotel" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between w-full bg-white border-2 border-gray-200 hover:border-blue-500 hover:bg-blue-50 text-slate-700 py-3 px-4 rounded-xl transition group">
                        <span class="font-bold flex items-center gap-2">Traveloka</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-gray-400 group-hover:text-blue-500 transition"></i>
                    </a>
                </div>

                <!-- Opsi Bundling Promo -->
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 p-4 rounded-xl text-white shadow-md">
                    <h4 class="font-bold mb-1"><i class="fa-solid fa-tag mr-2"></i>Tersedia Bundling</h4>
                    <p class="text-xs mb-3">Pesan hotel ini bersama tiket feri untuk hemat hingga 30%!</p>
                    <a href="/bundle" class="block text-center bg-white text-yellow-600 font-bold py-2 rounded-lg text-sm hover:bg-gray-50 transition">Lihat Promo</a>
                </div>
            </div>
        </div>

    </div>
@endsection