<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tourist.home');
});

Route::get('/wisata', function () {
    return view('tourist.wisata');
});
Route::get('/detail-wisata', function () {
    return view('tourist.detail-wisata');
});

Route::get('/tiket', function () {
    return view('tourist.tiket');
});

Route::get('/hotel', function () {
    return view('tourist.hotel');
});
Route::get('/detail-hotel', function () {
    return view('tourist.detail-hotel');
});

Route::get('/bundle', function () {
    return view('tourist.bundle');
});

Route::get('/games', function () {
    return view('tourist.games');
});
