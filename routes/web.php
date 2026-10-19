<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/peta', function () {
    return view('peta');
})->name('peta');

Route::get('/prakiraan', function () {
    return view('prakiraan');
})->name('prakiraan');

Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');
