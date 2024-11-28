<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

//! Default route
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Mahasiswa

Route::get('dashboard-mhs', [MahasiswaController::class, 'dashboard'])->name('dashboard-mhs');

// Route::get('/dashboard-mhs', function () {
//     return view('mhs/dashboard-mhs');
// })->name('dashboard-mhs');
Route::get('/pengisianirs-mhs', function () {
    return view('mhs/pengisianirs-mhs');
});
Route::get('/irs-mhs', function () {
    return view('mhs/irs-mhs');
});

// Pembimbing Akademik -- Doswal

Route::get('/dashboard-doswal', [DosenController::class, 'showAll'])->name('dashboard-doswal');

Route::get('/persetujuanIRS-doswal', [DosenController::class, 'showPersetujuan'])->name('persetujuanIRS-doswal');

Route::get('/rekap-doswal', [DosenController::class, 'showRekap'])->name('rekap-doswal');




// // Bagian Akademik
// Route::get('/dashboard-ba', function () {
//     return view('ba/dashboard-ba');
// });

// Route::get('/buatusulan', function () {
//     return view('ba/buatusulan');
// });

// Route::get('/daftarusulan', function () {
//     return view('ba/daftarusulan');
// });





// // Dekan
// Route::get('/dashboard-dekan', function () {
//     return view('dekan/dashboard-dekan');
// });

// Route::get('/aturgelombang', function () {
//     return view('dekan/aturgelombang');
// });

// Route::get('/usulanruang', function () {
//     return view('dekan/usulanruang');
// });

// Route::get('/usulanjadwal', function () {
//     return view('dekan/usulanjadwal');
// });

// Kaprodi



//? Testing

Route::get('/test', function () {
    return view('tailwind');
});

Route::get('/test2', function () {
    return view('dashboard-gakepake');
});



