<?php
namespace App\Http\Controllers;

use App\Models\mahasiswa; 
use App\Models\Jadwal; 
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // public function index()
    // {
    //     // Ambil data mahasiswa dan jadwal dari database
    //     $mahasiswa = Mahasiswa::find(auth()->id());
    //     $jadwal = JadwalKuliah::where('mahasiswa_id', $mahasiswa->id)->get();
    //     $informasiJadwal = InformasiPerubahanJadwal::all(); // Contoh model lain

    //     // Kirim data ke view
    //     return view('dashboard', compact('mahasiswa', 'jadwal', 'informasiJadwal'));
    // }

    public function dashboard()
    {
        $nim = session('nim');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $mahasiswa = mahasiswa::where('nim', $nim)->first();
        
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'mahasiswa tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('mhs/dashboard-mhs', compact('mahasiswa'));
    }

    public function pengisianIrs()
    {
        $nim = session('nim');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $mahasiswa = mahasiswa::where('nim', $nim)->first();
        
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'mahasiswa tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('mhs/pengisianirs-mhs', compact('mahasiswa'));
    }

    public function irs()
    {
        $nim = session('nim');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $mahasiswa = mahasiswa::where('nim', $nim)->first();
        
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'mahasiswa tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('mhs/irs-mhs', compact('mahasiswa'));
    }


}
