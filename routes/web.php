<?php

use Illuminate\Support\Facades\Route;

//! Default route
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Mahasiswa
Route::get('/dashboard-mhs', function () {
    return view('mhs/dashboard-mhs');
});
Route::get('/pengisianirs-mhs', function () {
    return view('mhs/pengisianirs-mhs');
});
Route::get('/irs-mhs', function () {
    return view('mhs/irs-mhs');
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



