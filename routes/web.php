<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard-mhs', function () {
    return view('dashboard-mhs');
});

Route::get('/pengisianirs-mhs', function () {
    return view('pengisianirs-mhs');
});
Route::get('/irs-mhs', function () {
    return view('irs-mhs');
});

Route::get('/dashboard-ba', function () {
    return view('dashboard-ba');
});

Route::get('/dashboard-dekan', function () {
    return view('dashboard-dekan');
});


Route::get('/buatusulan', function () {
    return view('buatusulan');
});

Route::get('/daftarusulan', function () {
    return view('daftarusulan');
});
Route::get('/usulanruang', function () {
    return view('usulanruang');
});
Route::get('/usulanjadwal', function () {
    return view('usulanjadwal');
});
Route::get('/aturgelombang', function () {
    return view('aturgelombang');
});
