<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\dosen;
use App\Models\jadwal;
use App\Models\Mahasiswa;
use App\Models\RiwayatStatus;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Clone_;
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
        ->distinct()
        ->where('nidn', '=', $nidn)
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        ->select(
            'm.nim',
            'm.nama',
            'm.semester'
            // DB::raw("CASE
            // WHEN i.nim IS NULL THEN 'Belum IRS'
            // WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
            // WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) = YEAR(CURDATE()) THEN 'Sudah disetujui'
            // WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) != YEAR(CURDATE()) THEN 'Belum Disetujui'
            // ELSE 'Status Tidak Valid'
            // END AS status"),
            // DB::raw('MAX(i.tanggal_disetujui) as tanggal_disetujui')
        )
        ->groupBy('m.nim', 'm.nama', 'm.semester');
       
        
        // @dd($query->whereNull('i.nim')->get()->count());
        $belum_irs = (clone $query)->whereNull('i.nim')->get()->count();
        $belum_disetujui = (clone $query)->whereNotNull('i.nim')->whereNull('i.tanggal_disetujui')->get()->count();
        $sudah_disetujui = (clone $query)->whereNotNull('i.nim')->whereNotNull('i.tanggal_disetujui')->get()->count();
        // $belum_disetujui = (clone $query)
        //     ->havingRaw("CASE WHEN i.nim IS NULL THEN 'Belum IRS' WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui' ELSE 'Status Tidak Valid' END = 'Belum Disetujui'")
        //     ->get()
        //     ->count();
        // $sudah_disetujui = (clone $query)
        //     ->havingRaw("CASE WHEN i.nim IS NULL THEN 'Belum IRS' WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui' ELSE 'Status Tidak Valid' END = 'Sudah disetujui'")
        //     ->get()
        //     ->count();
        // $belum_disetujui = (clone $query)->where('status', '=', 'Belum Disetujui')->get()->count();
        // $sudah_disetujui = (clone $query)->where('status', '=', 'Sudah Disetujui')->get()->count();
    

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

        $mhs_filter = DB::table('mahasiswa as m')
        ->distinct()
        ->where('m.nidn', '=', $nidn)
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        ->select(
            'm.nim',
            'm.nama',
            'm.semester'
        )
        ->where(function ($query) {
            $query->whereNotNull('i.nim')
                ->whereNull('i.tanggal_disetujui')
                ->orWhere(function ($query) {
                    $query->whereNotNull('i.nim')
                            ->whereNotNull('i.tanggal_disetujui');
                });
        })
        ->orderBy('nama')
        ->get();

        $tahun = DB::table('tahun_ajaran')
        ->select('tahun_ajaran')
        ->orderByDesc('tahun_ajaran')
        ->first();
        
        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }
        
        // Kirim data ke view
        return view('doswal/persetujuanIRS-doswal', compact('dosen', 'tahun', 'mhs_filter'));
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
        ->distinct()
        ->where('nidn','=',$nidn)
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        ->select(
            'm.nim',
            'm.nama',
            'm.semester',
            DB::raw("CASE
            WHEN i.nim IS NULL THEN 'Belum IRS'
            WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) = YEAR(CURDATE()) THEN 'Sudah disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) != YEAR(CURDATE()) THEN 'Belum Disetujui'
            ELSE 'Status Tidak Valid'
            END AS status")
        )
        ->get();

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Kirim data ke view
        return view('doswal/rekap-doswal', compact('dosen', 'result', 'tahun'));
    }


    public function showInformasi ($nim){
        // ambil nidn
        $nidn = session('nidn');

        // Ambil data dosen
        $dosen = dosen::all()->where('nidn', $nidn)->first();

        // ambil data mahasiswa terpilih
        $result = DB::table('mahasiswa as m')
        ->distinct()
        ->where('nidn','=',$nidn)
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        ->select(
            'm.nim',
            'm.nama',
            'm.semester',
            DB::raw("CASE
            WHEN i.nim IS NULL THEN 'Belum IRS'
            WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) = YEAR(CURDATE()) THEN 'Sudah disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) != YEAR(CURDATE()) THEN 'Belum Disetujui'
            ELSE 'Status Tidak Valid'
            END AS status")
        )
        ->where('m.nim',$nim)
        ->first();

        // ambil data jadwal 
        $irs = DB::table('irs as i')
        ->distinct()
        ->where('i.nim', '=', $nim)
        ->join('jadwal as j', 'i.id_jadwal', '=', 'j.id_jadwal')
        ->join('ruang as r', 'r.id_ruang', '=', 'j.id_ruang')
        ->join('matakuliah as m', 'j.kode_mk', '=', 'm.kode_mk')
        ->join('pengampu as p', 'm.kode_mk', '=', 'p.kode_mk') // Join ke tabel pengampu
        ->join('dosen as d', 'p.nidn', '=', 'd.nidn') // Join ke tabel dosen
        ->join('tahun_ajaran as ta', 'j.id_tahun', '=', 'ta.id_tahun')
        ->select(
            'm.kode_mk',
            'm.nama_mk',
            'm.sks',
            'j.kelas',
            'r.id_ruang',
            'i.status',
            'ta.tahun_ajaran',
            'd.nama as nama_dosen', // Ambil nama dosen pengampu
            DB::raw("
                CASE j.hari
                    WHEN 1 THEN 'Senin'
                    WHEN 2 THEN 'Selasa'
                    WHEN 3 THEN 'Rabu'
                    WHEN 4 THEN 'Kamis'
                    WHEN 5 THEN 'Jumat'
                    WHEN 6 THEN 'Sabtu'
                    WHEN 7 THEN 'Minggu'
                    ELSE 'Tidak Diketahui'
                END AS hari
            "),
            'j.waktu_mulai',
            'j.waktu_selesai',
        )
        ->where('ta.id_tahun', '=', '20241')
        ->get();



        // Ganti dengan kode berikut:
        $courses = $irs->map(function($item) {
            return [
                'kode_mk' => $item->kode_mk,
                'kelas' => $item->kelas,
                'sks' => $item->sks
            ];
        })->unique(function($item) {
            // Unik berdasarkan kombinasi kode_mk dan kelas
            return $item['kode_mk'] . $item['kelas'];
        });

        $irs_grouped = $irs->groupBy(function ($item) {
            return $item->kode_mk . '-' . $item->kelas; // Kelompokkan berdasarkan kode_mk dan kelas
        })->map(function ($group) {
            // Gabungkan jadwal ke dalam satu baris
            $first = $group->first();
            $jadwal = $group->map(function ($item) {
                $waktu_mulai = substr($item->waktu_mulai, 0, 5); // Ambil HH:MM dari waktu_mulai
                $waktu_selesai = substr($item->waktu_selesai, 0, 5); // Ambil HH:MM dari waktu_selesai
                return "{$item->hari}, {$waktu_mulai}-{$waktu_selesai}";
            })->unique()->implode('<br>'); // Hapus duplikat dengan unique()
        
            // Gabungkan nama dosen
            $dosen = $group->map(function ($item) {
                return $item->nama_dosen;
            })->unique()->implode('<br>');
        
            return [
                'kode_mk' => $first->kode_mk,
                'nama_mk' => $first->nama_mk,
                'sks' => $first->sks,
                'kelas' => $first->kelas,
                'ruang' => $first->id_ruang,
                'status' => $first->status,
                'jadwal' => $jadwal,
                'dosen' => $dosen,
            ];
        });
        
        // Total SKS
        $sum_sks = $irs_grouped->sum('sks');
        
    
        return view('doswal/informasi-irs-doswal', compact('dosen', 'result', 'irs_grouped', 'sum_sks'));

    }

    public function showInformasiLite ($nim){
        // ambil nidn
        $nidn = session('nidn');

        $tahun = RiwayatStatus::join('tahun_ajaran', 'riwayat_status.id_tahun', '=', 'tahun_ajaran.id_tahun')
        ->orderBy('tahun_ajaran.id_tahun', 'desc') // Mengurutkan berdasarkan id_tahun secara menurun
        ->select('tahun_ajaran.id_tahun', 'tahun_ajaran.tahun_ajaran') // Memilih kedua kolom
        ->first();
        
        if ($tahun) {
            $id_tahun = $tahun->id_tahun;
            $tahun_ajaran = $tahun->tahun_ajaran;
        } else {
            $id_tahun = 'tidak ada data';
            $tahun_ajaran = 'tidak ada data';
        }
        
        // Ambil data dosen
        $dosen = dosen::all()->where('nidn', $nidn)->first();

        // @dd($id_tahun);
        // ambil data mahasiswa terpilih
        $result = DB::table('mahasiswa as m')
        ->distinct()
        ->where('nidn','=',$nidn)
        ->leftJoin('irs as i', 'm.nim', '=', 'i.nim')
        // ->join('jadwal as j', 'j.id_jadwal', '=', 'i.id_jadwal')
        // ->join('tahun_ajaran as t', 't.id_tahun', '=', 'j.id_tahun')
        // ->where('t.id_tahun',$id_tahun)
        ->select(
            'm.nim',
            'm.nama',
            'm.semester',
            DB::raw("CASE
            WHEN i.nim IS NULL THEN 'Belum IRS'
            WHEN i.tanggal_disetujui IS NULL THEN 'Belum Disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) = YEAR(CURDATE()) THEN 'Sudah disetujui'
            WHEN i.tanggal_disetujui IS NOT NULL AND YEAR(i.tanggal_disetujui) != YEAR(CURDATE()) THEN 'Belum Disetujui'
            ELSE 'Status Tidak Valid'
            END AS status")
        )
        ->where('m.nim',$nim)
        ->first();

        // @dd($result);

        // ambil data jadwal 
        $irs = DB::table('irs as i')
        ->distinct()
        ->where('i.nim', '=', $nim)
        ->join('jadwal as j', 'i.id_jadwal', '=', 'j.id_jadwal')
        ->join('ruang as r', 'r.id_ruang', '=', 'j.id_ruang')
        ->join('matakuliah as m', 'j.kode_mk', '=', 'm.kode_mk')
        ->join('pengampu as p', 'm.kode_mk', '=', 'p.kode_mk') // Join ke tabel pengampu
        ->join('dosen as d', 'p.nidn', '=', 'd.nidn') // Join ke tabel dosen
        ->join('tahun_ajaran as ta', 'j.id_tahun', '=', 'ta.id_tahun')
        ->select(
            'm.kode_mk',
            'm.nama_mk',
            'm.sks',
            'j.kelas',
            'r.id_ruang',
            'i.status',
            'ta.tahun_ajaran',
            'd.nama as nama_dosen', // Ambil nama dosen pengampu
            DB::raw("
                CASE j.hari
                    WHEN 1 THEN 'Senin'
                    WHEN 2 THEN 'Selasa'
                    WHEN 3 THEN 'Rabu'
                    WHEN 4 THEN 'Kamis'
                    WHEN 5 THEN 'Jumat'
                    WHEN 6 THEN 'Sabtu'
                    WHEN 7 THEN 'Minggu'
                    ELSE 'Tidak Diketahui'
                END AS hari
            "),
            'j.waktu_mulai',
            'j.waktu_selesai',
        )
        ->where('ta.id_tahun', '=', '20241')
        ->get();


        // Ganti dengan kode berikut:
        $courses = $irs->map(function($item) {
            return [
                'kode_mk' => $item->kode_mk,
                'kelas' => $item->kelas,
                'sks' => $item->sks
            ];
        })->unique(function($item) {
            // Unik berdasarkan kombinasi kode_mk dan kelas
            return $item['kode_mk'] . $item['kelas'];
        });

        $irs_grouped = $irs->groupBy(function ($item) {
            return $item->kode_mk . '-' . $item->kelas; // Kelompokkan berdasarkan kode_mk dan kelas
        })->map(function ($group) {
            // Gabungkan jadwal ke dalam satu baris
            $first = $group->first();
            $jadwal = $group->map(function ($item) {
                $waktu_mulai = substr($item->waktu_mulai, 0, 5); // Ambil HH:MM dari waktu_mulai
                $waktu_selesai = substr($item->waktu_selesai, 0, 5); // Ambil HH:MM dari waktu_selesai
                return "{$item->hari}, {$waktu_mulai}-{$waktu_selesai}";
            })->unique()->implode('<br>'); // Hapus duplikat dengan unique()
        
            // Gabungkan nama dosen
            $dosen = $group->map(function ($item) {
                return $item->nama_dosen;
            })->unique()->implode('<br>');
        
            return [
                'kode_mk' => $first->kode_mk,
                'nama_mk' => $first->nama_mk,
                'sks' => $first->sks,
                'kelas' => $first->kelas,
                'ruang' => $first->id_ruang,
                'status' => $first->status,
                'jadwal' => $jadwal,
                'dosen' => $dosen,
            ];
        });
        
        // Total SKS
        $sum_sks = $irs_grouped->sum('sks');
        
    
        return view('doswal/informasi-irs-doswal-fromPersetujuan', compact('dosen', 'tahun', 'result', 'irs_grouped', 'sum_sks'));
    }
}
