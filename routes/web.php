<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

// Semua User
Route::get('/about', function () {
    return view('about');
});

//! Default route
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Mahasiswa

Route::get('/dashboard-mhs', [MahasiswaController::class, 'dashboard'])->name('dashboard-mhs');

Route::get('/pengisianirs-mhs', [MahasiswaController::class, 'pengisianIrs'])->name('pengisianirs-mhs');

Route::post('/pengisianirs-mhs/tambah-mata-kuliah-irs', [IrsController::class, 'tambahMataKuliahIrs'])->name('tambah-matkul-irs');

Route::post('/pengisianirs-mhs/hapus-mata-kuliah-irs', [IrsController::class, 'hapusMataKuliahIrs'])->name('hapus-matkul-irs');

Route::get('/irs-mhs', [MahasiswaController::class, 'irs'])->name('irs-mhs');

Route::get('/irs-mhs/get-irs-detail', [IrsController::class, 'getIrsDetail'])->name('getIrsDetail');
// ========================================================================================================================

// Pembimbing Akademik -- Doswal

Route::get('/dashboard-doswal', [DosenController::class, 'showAll'])->name('dashboard-doswal');

Route::get('/persetujuanIRS-doswal', [DosenController::class, 'showPersetujuan'])->name('persetujuanIRS-doswal');

Route::get('/rekap-doswal', [DosenController::class, 'showRekap'])->name('rekap-doswal');

Route::get('/rekap-doswal/informasi-irs/{nim}', [DosenController::class, 'showInformasi'])->name('rekap-doswal.informasi-irs');

Route::get('/rekap-doswal/informasi-irs-fromPersetujuan/{nim}', [DosenController::class, 'showInformasiLite'])->name('rekap-doswal.informasi-irs-fromPersetujuan');

Route::post('/irs/setuju/{nim}', [IrsController::class, 'approve'])->name('irs.approve');

Route::post('/irs/izin/{nim}', [IrsController::class, 'izin'])->name('irs.izin');

Route::get('/irs/filter', [IrsController::class, 'filter'])->name('irs.filter');

Route::get('/irs/filter/semester', [IrsController::class, 'filter_semester'])->name('irs.filter.semester');

Route::get('/irs/filter/dashboard', [IrsController::class, 'filter_dashboard'])->name('irs.filter.dashboard');

// Route::get('/dashboard-doswal/{nidn}', [DosenController::class, 'showAll'])->name('dashboard-doswal');

// Route::get('/persetujuanIRS-doswal/{nidn}', [DosenController::class, 'showPersetujuan'])->name('persetujuanIRS-doswal');

// Route::get('/rekap-doswal/{nidn}', [DosenController::class, 'showRekap'])->name('rekap-doswal');

// Route::get('/konsultasi-doswal/{nidn}', [DosenController::class, 'showKonsultasi'])->name('konsultasi-doswal');


