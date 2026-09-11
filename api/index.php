<?php
// 1. Paksa PHP menampilkan semua error ke layar
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 2. Buat direktori sementara secara otomatis di folder /tmp milik Vercel
$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions'
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 3. Timpa pengaturan path Laravel agar mengarah ke /tmp
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

// 4. Jalankan aplikasi Laravel
require __DIR__ . '/../public/index.php';