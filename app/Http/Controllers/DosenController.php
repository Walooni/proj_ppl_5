<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    
    public function showAll()
    {
        $nidn = session('nidn');
        
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::withCount('mahasiswa')->where('nidn', $nidn)->first();
        $tahun = DB::table('tahun_ajaran')
        ->select('tahun_ajaran')
        ->orderByDesc('tahun_ajaran')
        ->first();
        
        $query = DB::table('mahasiswa as m')
            ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
            ->where('nidn', '=', $nidn)
            ->select(
                'm.nim',
                'm.nama',
                'm.semester',
                DB::raw("CASE
                    WHEN i.nim IS NULL THEN 'Belum IRS'
                    WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
                    ELSE 'Sudah Disetujui'
                END AS status")
            );

        $belum_irs = (clone $query)->whereNull('i.nim')->count();
        $belum_disetujui = (clone $query)->whereNotNull('i.nim')->whereNull('i.tanggal_disetujui')->count();
        $sudah_disetujui = (clone $query)->whereNotNull('i.nim')->whereNotNull('i.tanggal_disetujui')->count();
    

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('doswal/dashboard-doswal', compact('dosen', 'tahun', 'belum_irs', 'belum_disetujui', 'sudah_disetujui'));
    }
    
    public function showPersetujuan()
    {
        $nidn = session('nidn');
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::withCount('mahasiswa')->where('nidn', $nidn)->first();
        $tahun = DB::table('tahun_ajaran')
        ->select('tahun_ajaran')
        ->orderByDesc('tahun_ajaran')
        ->first();
        
        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('doswal/persetujuanIRS-doswal', compact('dosen', 'tahun'));
    }
    
    public function showRekap()
    {
        $nidn = session('nidn');

        $tahun = DB::table('tahun_ajaran')
        ->select('tahun_ajaran')
        ->orderByDesc('tahun_ajaran')
        ->first();
        
        // Ambil data dosen beserta jumlah mahasiswa perwalian
        $dosen = dosen::with('mahasiswa')->where('nidn', $nidn)->first();

        // ambil 
        $result = DB::table('mahasiswa as m')
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        ->where('nidn','=',$nidn)
        ->select(
            'm.nim',
            'm.nama',
            'm.semester',
            DB::raw("CASE
                WHEN i.nim IS NULL THEN 'Belum IRS'
                WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
                ELSE 'Sudah disetujui'
            END AS status")
        )
        ->get();

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Kirim data ke view
        return view('doswal/rekap-doswal', compact('dosen', 'result', 'tahun'));
    }


}
