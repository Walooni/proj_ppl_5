<?php

use Illuminate\Support\Facades\Route;

//! Default route
Route::get('/', function () {
    return view('login');
});


// Semua User
Route::get('/about', function () {
    return view('about');
});



// Mahasiswa
Route::get('/dashboard-mhs-mhs', function () {
    return view('dashboard-mhs-mhs');
});
Route::get('/pengisianirs-mhs', function () {
    return view('pengisianirs-mhs');
});
Route::get('/irs-mhs', function () {
    return view('irs-mhs');
});

// Pembimbing Akademik -- Doswal
Route::get('/dashboard-doswal', function () {
    return view('doswal/dashboard-doswal');
});

Route::get('/persetujuanIRS-doswal', function () {
    return view('doswal/persetujuanIRS-doswal');
});

Route::get('/rekap-doswal', function () {
    return view('doswal/rekap-doswal');
});

Route::get('/nilai-doswal', function () {
    return view('doswal/nilai-doswal');
});



// Bagian Akademik
Route::get('/dashboard-ba', function () {
    return view('dashboard-ba');
});

Route::get('/buatusulan', function () {
    return view('buatusulan');
});

Route::get('/daftarusulan', function () {
    return view('daftarusulan');
});

Route::get('/aturgelombang', function () {
    return view('aturgelombang');
});



// Dekan
Route::get('/dashboard-dekan', function () {
    return view('dashboard-dekan');
});

Route::get('/usulanruang', function () {
    return view('usulanruang');
});

Route::get('/usulanjadwal', function () {
    return view('usulanjadwal');
});

// Kaprodi



//? Testing

Route::get('/test', function () {
    return view('tailwind');
});

Route::get('/test2', function () {
    return view('dashboard-gakepake');
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
