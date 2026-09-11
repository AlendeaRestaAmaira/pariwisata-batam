<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jelajah Batam | Platform Pariwisata Terpadu')</title>
    
    <!-- Tailwind & FontAwesome CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ocean: '#0ea5e9',
                        sand: '#fff7ed',
                        coral: '#f43f5e'
                    }
                }
            }
        }
    </script>
    
    <!-- Tempat untuk CSS spesifik per halaman -->
    @stack('styles')
</head>
<body class="bg-sand text-slate-800 font-sans flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-ocean text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"><i class="fa-solid fa-anchor mr-2"></i>BatamPass</h1>
            
            <!-- Menu Desktop (Sembunyi di HP, Tampil di Layar Menengah ke atas) -->
            <div class="hidden md:flex items-center space-x-6 font-semibold">
                <!-- Link Menu Utama -->
                <a href="/" class="{{ request()->is('/') ? 'text-yellow-300' : 'hover:text-sand' }}">Beranda</a>
                <a href="/wisata" class="{{ request()->is('wisata') ? 'text-yellow-300' : 'hover:text-sand' }}">Destinasi</a>
                <a href="/tiket" class="{{ request()->is('tiket') ? 'text-yellow-300' : 'hover:text-sand' }}">Tiket</a>
                <a href="/hotel" class="{{ request()->is('hotel') ? 'text-yellow-300' : 'hover:text-sand' }}">Hotel & Resto</a>
                <a href="/bundle" class="{{ request()->is('bundle') ? 'text-yellow-300' : 'hover:text-sand' }}">Bundling Promo</a>
                <a href="/games" class="{{ request()->is('games') ? 'text-yellow-300' : 'hover:text-sand' }}">Mini Games</a>
                
                <!-- Garis Pembatas Vertikal -->
                <div class="h-6 w-px bg-white/30"></div>

                <!-- Fitur Ubah Bahasa (Dropdown Hover) -->
                <div class="relative group cursor-pointer flex items-center gap-1 hover:text-yellow-300 transition">
                    <i class="fa-solid fa-globe"></i>
                    <span>ID</span>
                    <i class="fa-solid fa-chevron-down text-xs ml-1 transition-transform group-hover:rotate-180"></i>
                    
                    <!-- Isi Dropdown Bahasa -->
                    <div class="absolute right-0 top-full mt-4 w-32 bg-white text-slate-800 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 border border-gray-100 overflow-hidden">
                        <a href="#" class="block px-4 py-3 hover:bg-ocean hover:text-white transition flex items-center gap-2">
                            🇮🇩 Indonesia
                        </a>
                        <a href="#" class="block px-4 py-3 hover:bg-ocean hover:text-white transition flex items-center gap-2">
                            🇬🇧 English
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tombol Hamburger untuk Layar HP -->
            <button onclick="toggleMobileMenu()" class="md:hidden text-2xl text-white hover:text-yellow-300 focus:outline-none transition">
                <i class="fa-solid fa-bars" id="icon-hamburger"></i>
            </button>
        </div>

        <!-- Menu Mobile (Tampil saat tombol hamburger diklik) -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pt-4 border-t border-blue-400 space-y-4 font-semibold pb-2">
            <a href="/" class="block {{ request()->is('/') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Beranda</a>
            <a href="/wisata" class="block {{ request()->is('wisata') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Destinasi</a>
            <a href="/tiket" class="block {{ request()->is('tiket') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Tiket</a>
            <a href="/hotel" class="block {{ request()->is('hotel') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Hotel & Resto</a>
            <a href="/bundle" class="block {{ request()->is('bundle') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Bundling Promo</a>
            <a href="/games" class="block {{ request()->is('games') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Mini Games</a>
            
            <div class="h-px w-full bg-blue-400 my-2"></div>
            
            <!-- Pengaturan Bahasa untuk Mobile -->
            <div class="flex gap-4">
                <span class="text-blue-200">Bahasa:</span>
                <a href="#" class="hover:text-yellow-300">🇮🇩 ID</a>
                <a href="#" class="hover:text-yellow-300">🇬🇧 EN</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA (Dinamis) -->
    <main class="container mx-auto p-6 space-y-16 mt-8 flex-grow">
        @yield('content')
    </main>

    <!-- ================= PETA WISATA BATAM ================= -->
    <section class="container mx-auto px-6 mt-12 mb-8">
        <div class="bg-white rounded-3xl shadow-lg p-8 border-t-8 border-ocean">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-slate-800">
                    <i class="fa-solid fa-map-location-dot text-ocean mr-2"></i>Peta Wisata Batam
                </h2>
                <p class="text-gray-500 mt-2">Jelajahi berbagai destinasi menarik dari ujung Nongsa hingga Barelang</p>
            </div>
            
            <!-- Area Gambar Peta -->
            <div class="rounded-2xl overflow-hidden shadow-inner border-2 border-gray-100 bg-gray-50 flex justify-center items-center">
                
                <!-- Ganti nama file 'peta-wisata.jpg' sesuai dengan nama foto Anda di folder public/images -->
                <img src="{{ asset('assets/images/wisata-peta.jpg') }}" 
                     alt="Peta Wisata Batam" 
                     class="w-full max-w-4xl h-auto object-contain hover:scale-105 transition-transform duration-700 cursor-pointer"
                     loading="lazy"
                     title="Klik atau perbesar untuk melihat detail peta">
                     
            </div>
        </div>
    </section>
    <!-- ================= END PETA WISATA ================= -->

    <!-- FOOTER -->
    <footer class="bg-slate-800 text-white p-6 mt-12 text-center">
        <p>&copy; PBL-TRPL506 Batam. Hak Cipta Dilindungi.</p>
    </footer>

    <!-- ================= BAGIAN FAVORIT (SIDEBAR & TOMBOL) ================= -->
    
    <!-- 1. Tombol Floating di Kanan Layar -->
    <button onclick="toggleFavoriteSidebar()" class="fixed right-0 top-1/2 transform -translate-y-1/2 bg-white border border-gray-200 shadow-2xl p-3 rounded-l-xl z-40 hover:bg-gray-50 transition text-slate-700 flex items-center gap-2 group">
        <i class="fa-solid fa-list-ul"></i>
        <i class="fa-regular fa-heart group-hover:text-coral transition"></i>
    </button>

    <!-- 2. Overlay Gelap (Background saat sidebar terbuka) -->
    <div id="fav-overlay" onclick="toggleFavoriteSidebar()" class="fixed inset-0 bg-slate-900 bg-opacity-50 z-40 hidden transition-opacity duration-300 opacity-0"></div>

    <!-- 3. Sidebar Panel -->
    <div id="fav-sidebar" class="fixed top-0 right-0 h-full w-80 md:w-96 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
        
        <!-- Header Sidebar -->
        <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h2 class="font-bold text-lg text-slate-800">My Saves</h2>
            <button onclick="toggleFavoriteSidebar()" class="text-gray-400 hover:text-coral transition w-8 h-8 flex items-center justify-center rounded-full hover:bg-white shadow-sm">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        
        <!-- Pesan Promosi Login (Seperti di Gambar) -->
        <div class="p-4 border-b border-gray-100 text-sm text-gray-500">
            <p>You can delete your saves at any time.</p>
        </div>

        <!-- Area Daftar Item Favorit -->
        <div id="fav-items-container" class="p-4 flex-1 overflow-y-auto space-y-4">
            <!-- Pesan Kosong (Default) -->
            <div id="fav-empty-state" class="text-center text-gray-400 mt-10">
                <i class="fa-regular fa-heart text-4xl mb-3 opacity-50"></i>
                <p class="text-sm">Belum ada destinasi yang disimpan.</p>
            </div>
            <!-- Item akan ditambahkan ke sini oleh JavaScript -->
        </div>

    </div>
    <!-- ================= END BAGIAN FAVORIT ================= -->
    
    <!-- Tempat untuk JavaScript spesifik per halaman -->
    @stack('scripts')

    <script>
        // Fungsi Buka/Tutup Menu Navigasi di Mobile
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('icon-hamburger');
            
            // Munculkan/Sembunyikan menu
            menu.classList.toggle('hidden');
            
            // Ubah ikon dari 3 garis (bars) menjadi silang (xmark)
            if(menu.classList.contains('hidden')) {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            }
        }

        // Fungsi untuk Membuka/Menutup Sidebar
        function toggleFavoriteSidebar() {
            const sidebar = document.getElementById('fav-sidebar');
            const overlay = document.getElementById('fav-overlay');
            
            // Toggle posisi X sidebar
            sidebar.classList.toggle('translate-x-full');
            
            // Toggle overlay
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        }

        // Fungsi saat Icon Love di klik pada kartu wisata
        function handleFavoriteClick(btn, id, title, image, rating) {
            // Ubah warna ikon hati pada tombol
            btn.classList.toggle('text-gray-300');
            btn.classList.toggle('text-coral');
            
            const isSaved = btn.classList.contains('text-coral');
            const container = document.getElementById('fav-items-container');
            const emptyState = document.getElementById('fav-empty-state');
            const itemElementId = 'fav-item-' + id;

            if (isSaved) {
                // Sembunyikan pesan kosong
                if (emptyState) emptyState.style.display = 'none';
                
                // Buat elemen HTML baru untuk sidebar
                const itemHTML = `
                    <div id="${itemElementId}" class="flex gap-4 p-3 border border-gray-100 rounded-xl items-center shadow-sm relative group bg-white">
                        <img src="${image}" class="w-16 h-16 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="font-bold text-sm text-slate-800 leading-tight">${title}</h4>
                            <p class="text-xs text-gray-500 mt-1"><i class="fa-solid fa-star text-green-600"></i> ${rating}</p>
                        </div>
                        <button onclick="removeFavorite('${itemElementId}')" class="text-sm text-gray-500 hover:text-red-500 border border-gray-200 px-3 py-1 rounded-full transition">
                            Remove
                        </button>
                    </div>
                `;
                // Masukkan ke sidebar
                container.insertAdjacentHTML('beforeend', itemHTML);
                
                // Opsional: Buka sidebar otomatis agar user tahu itemnya masuk
                if (document.getElementById('fav-sidebar').classList.contains('translate-x-full')) {
                    toggleFavoriteSidebar();
                }

            } else {
                // Jika di-unlike, hapus dari sidebar
                removeFavorite(itemElementId);
            }
        }

        // Fungsi untuk tombol "Remove" di dalam Sidebar
        function removeFavorite(itemElementId) {
            const item = document.getElementById(itemElementId);
            if (item) item.remove();
            
            // Tampilkan pesan kosong jika tidak ada item tersisa
            const container = document.getElementById('fav-items-container');
            const emptyState = document.getElementById('fav-empty-state');
            
            // Cek jumlah anak elemen (selain text node & empty state)
            const hasItems = Array.from(container.children).some(child => child.id.startsWith('fav-item-'));
            if (!hasItems && emptyState) {
                emptyState.style.display = 'block';
            }
        }
    </script>
</body>
</html>