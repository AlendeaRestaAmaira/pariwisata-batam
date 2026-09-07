@extends('layouts.app')

@section('title', 'Pesan Tiket - Jelajah Batam')

@section('content')
<!-- Pembatas max-w-5xl telah dihapus agar lebarnya sama dengan Peta Wisata -->
<section id="tiket" class="w-full">
    
    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Cari Tiket Transportasi</h1>
        <p class="text-gray-500">Temukan jadwal dan pesan tiket pesawat, feri, hingga travel dengan mudah.</p>
    </div>
    
    <!-- FORM PENCARIAN TIKET -->
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border-t-4 border-ocean mb-10">
        <form class="space-y-5">
            <!-- Baris 1: Jenis Transportasi -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Transportasi</label>
                <div class="flex flex-col md:flex-row gap-4">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="transport_type" class="peer sr-only" checked>
                        <div class="text-center p-4 border-2 border-gray-200 rounded-lg peer-checked:border-ocean peer-checked:bg-blue-50 peer-checked:text-ocean transition font-semibold text-gray-500">
                            <i class="fa-solid fa-ship mb-2 block text-2xl"></i> Kapal Feri
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="transport_type" class="peer sr-only">
                        <div class="text-center p-4 border-2 border-gray-200 rounded-lg peer-checked:border-ocean peer-checked:bg-blue-50 peer-checked:text-ocean transition font-semibold text-gray-500">
                            <i class="fa-solid fa-plane mb-2 block text-2xl"></i> Pesawat
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="transport_type" class="peer sr-only">
                        <div class="text-center p-4 border-2 border-gray-200 rounded-lg peer-checked:border-ocean peer-checked:bg-blue-50 peer-checked:text-ocean transition font-semibold text-gray-500">
                            <i class="fa-solid fa-van-shuttle mb-2 block text-2xl"></i> Travel / Bus
                        </div>
                    </label>
                </div>
            </div>

            <!-- Baris 2: Rute dan Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-end">
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-slate-700">Dari (Asal)</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-ocean text-slate-700">
                            <option>Batam (Semua Pelabuhan/Bandara)</option>
                            <option>Batam Centre (Feri)</option>
                            <option>Bandara Hang Nadim (Pesawat)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-slate-700">Ke (Tujuan)</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-ocean text-slate-700">
                            <option>Singapura (HarbourFront / Tanah Merah)</option>
                            <option>Malaysia (Stulang Laut / Pasir Gudang)</option>
                            <option>Jakarta (Soekarno Hatta)</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1 text-slate-700">Tanggal Pergi</label>
                    <input type="date" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-ocean text-slate-700">
                </div>
            </div>

            <!-- Baris 3: Tombol Cari -->
            <button type="button" class="bg-ocean text-white p-4 rounded-lg font-bold w-full hover:bg-blue-700 transition shadow-md mt-4 text-lg">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari Tiket Sekarang
            </button>
        </form>
    </div>

    <!-- HASIL PENCARIAN TIKET -->
    <div class="space-y-4 mb-16">
        
        <!-- Tiket Feri (Batam Fast) -->
        <div class="bg-white p-6 rounded-xl shadow border-l-4 border-ocean hover:shadow-lg transition flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-5 w-full md:w-auto">
                <div class="bg-blue-100 text-ocean w-14 h-14 rounded-full flex items-center justify-center text-2xl shrink-0">
                    <i class="fa-solid fa-ship"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-slate-800">Batam Fast Ferry</h3>
                    <p class="text-gray-500 text-base flex items-center gap-2 mt-1">
                        Batam Centre (08:00) <i class="fa-solid fa-arrow-right text-gray-300"></i> HarbourFront SG (10:00)
                    </p>
                </div>
            </div>
            <div class="text-left md:text-right w-full md:w-auto border-t md:border-t-0 pt-4 md:pt-0 border-gray-100">
                <p class="text-3xl font-black text-ocean mb-2">Rp 450.000 <span class="text-sm font-normal text-gray-400">/pax</span></p>
                <!-- Tombol Eksternal ke Website Feri -->
                <a href="https://www.batamfast.com/" target="_blank" rel="noopener noreferrer" class="inline-block w-full md:w-auto text-center bg-coral text-white px-8 py-3 rounded-lg font-bold hover:bg-red-600 transition shadow">
                    Pilih di BatamFast <i class="fa-solid fa-external-link-alt text-sm ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Tiket Pesawat (Traveloka) -->
        <div class="bg-white p-6 rounded-xl shadow border-l-4 border-sky-400 hover:shadow-lg transition flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-5 w-full md:w-auto">
                <div class="bg-sky-100 text-sky-500 w-14 h-14 rounded-full flex items-center justify-center text-2xl shrink-0">
                    <i class="fa-solid fa-plane"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-slate-800">Citilink Indonesia</h3>
                    <p class="text-gray-500 text-base flex items-center gap-2 mt-1">
                        Hang Nadim BTH (13:20) <i class="fa-solid fa-arrow-right text-gray-300"></i> Soekarno Hatta CGK (15:05)
                    </p>
                </div>
            </div>
            <div class="text-left md:text-right w-full md:w-auto border-t md:border-t-0 pt-4 md:pt-0 border-gray-100">
                <p class="text-3xl font-black text-ocean mb-2">Rp 1.150.000 <span class="text-sm font-normal text-gray-400">/pax</span></p>
                <!-- Tombol Eksternal ke Traveloka -->
                <a href="https://www.traveloka.com/id-id/flight" target="_blank" rel="noopener noreferrer" class="inline-block w-full md:w-auto text-center bg-blue-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-600 transition shadow">
                    Pesan di Traveloka <i class="fa-solid fa-external-link-alt text-sm ml-1"></i>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection