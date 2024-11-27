<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    
    public function showAll()
    {
        $nidn = session('nidn');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::withCount('mahasiswa')->where('nidn', $nidn)->first();
        
        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('doswal/dashboard-doswal', compact('dosen'));
    }
    
    public function showPersetujuan()
    {
        $nidn = session('nidn');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::withCount('mahasiswa')->where('nidn', $nidn)->first();
        
        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('doswal/persetujuanIRS-doswal', compact('dosen'));
    }
    
    public function showRekap()
    {
        $nidn = session('nidn');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::with('mahasiswa')->where('nidn', $nidn)->first();
        $irs = irs::All();

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Kirim data ke view
        return view('doswal/rekap-doswal', compact('dosen'), ['irs'=>$irs]);
    }


}
