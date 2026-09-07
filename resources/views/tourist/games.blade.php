@extends('layouts.app')

@section('title', 'Mini Games - Jelajah Batam')

@push('styles')
<style>
    .puzzle-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px; max-width: 300px; margin: auto; }
    .puzzle-tile { background-color: #0ea5e9; color: white; height: 80px; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; cursor: pointer; border-radius: 8px; transition: 0.2s;}
    .puzzle-tile.empty { background-color: #e5e7eb; cursor: default; }
</style>
@endpush

@section('content')
<section id="games" class="max-w-2xl mx-auto text-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl border-t-8 border-green-500">
        <div class="text-5xl text-green-500 mb-4"><i class="fa-solid fa-puzzle-piece"></i></div>
        <h2 class="text-3xl font-bold mb-2 text-ocean">Susun Puzzle Destinasi</h2>
        <p class="text-gray-500 mb-8">Selesaikan puzzle angka ini dengan mengurutkannya dari 1 hingga 8 untuk mendapatkan kode diskon 10%!</p>
        
        <!-- Area Game -->
        <div id="puzzle" class="puzzle-grid mb-6"></div>
        
        <!-- Pesan Menang -->
        <div id="win-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded text-left mt-6 shadow-sm">
            <p class="font-bold"><i class="fa-solid fa-circle-check mr-2"></i>Selamat Anda Berhasil!</p>
            <p>Kode Diskon Anda: <span class="bg-yellow-300 text-slate-800 px-2 py-1 font-mono font-bold rounded ml-2 text-lg tracking-widest">BATAMSERU10</span></p>
        </div>
        
        <button onclick="renderPuzzle(true)" class="mt-6 text-ocean underline hover:text-blue-800">Acak Ulang Puzzle</button>
    </div>
</section>
@endsection

@push('scripts')
<script>
    let tiles = [1, 2, 3, 4, 5, 6, 7, 8, ""];
    
    function renderPuzzle(shuffle = false) {
        if(shuffle) tiles.sort(() => Math.random() - 0.5);
        const container = document.getElementById('puzzle');
        container.innerHTML = '';
        document.getElementById('win-message').classList.add('hidden');
        
        tiles.forEach((tile, index) => {
            const div = document.createElement('div');
            div.className = tile === "" ? 'puzzle-tile empty' : 'puzzle-tile';
            div.innerText = tile;
            div.onclick = () => moveTile(index);
            container.appendChild(div);
        });
    }

    function moveTile(index) {
        const emptyIndex = tiles.indexOf("");
        const validMoves = [emptyIndex - 1, emptyIndex + 1, emptyIndex - 3, emptyIndex + 3];
        
        if (validMoves.includes(index)) {
            if (Math.abs(index - emptyIndex) === 1 && Math.floor(index / 3) !== Math.floor(emptyIndex / 3)) return;
            [tiles[index], tiles[emptyIndex]] = [tiles[emptyIndex], tiles[index]];
            renderPuzzle();
            checkWin();
        }
    }

    function checkWin() {
        if (tiles.join(',') === "1,2,3,4,5,6,7,8,") {
            document.getElementById('win-message').classList.remove('hidden');
        }
    }

    // Acak saat pertama kali dimuat
    renderPuzzle(true);
</script>
@endpush