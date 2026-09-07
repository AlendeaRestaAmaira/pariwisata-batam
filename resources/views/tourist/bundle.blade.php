@extends('layouts.app')

@section('title', 'Bundling Promo - Jelajah Batam')

@section('content')
<section id="bundle">
    <div class="bg-gradient-to-r from-ocean to-blue-800 text-white p-10 rounded-2xl shadow-2xl text-center mb-10">
        <h2 class="text-4xl font-bold mb-4"><i class="fa-solid fa-gift mr-3"></i>Paket Bundling Spesial</h2>
        <p class="text-lg text-sand max-w-2xl mx-auto">Nikmati liburan tanpa repot. Pesan paket lengkap kami dan hemat hingga 30%!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Paket 1 -->
        <div class="bg-white text-slate-800 p-6 rounded-xl shadow-lg border-2 border-yellow-400 relative transform hover:scale-105 transition duration-300">
            <div class="absolute top-0 right-0 bg-yellow-400 text-white font-bold py-1 px-3 rounded-bl-lg rounded-tr-lg">Terlaris</div>
            <h3 class="font-bold text-2xl text-ocean mb-2">Nongsa Escape</h3>
            <p class="text-gray-500 text-sm mb-4">Cocok untuk pasangan / Honeymoon</p>
            <ul class="mb-6 space-y-2 font-medium text-sm">
                <li><i class="fa-solid fa-check text-green-500 mr-2"></i>Tiket Feri PP (Batam - SG)</li>
                <li><i class="fa-solid fa-check text-green-500 mr-2"></i>1 Malam di Montigo Resorts</li>
                <li><i class="fa-solid fa-check text-green-500 mr-2"></i>Voucher Makan Seafood Kelong</li>
            </ul>
            <div class="text-3xl font-black text-coral mb-1">Rp 2.500k</div>
            <div class="text-sm line-through text-gray-400 mb-6">Harga Normal: Rp 3.200k</div>
            <button class="bg-coral text-white font-bold w-full py-3 rounded-lg hover:bg-red-600 transition shadow-md">Ambil Promo</button>
        </div>
    </div>
</section>
@endsection