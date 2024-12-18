<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Ambil data dari parameter yang dikirim melalui form
        $nim = $request->query('nim'); // Nim mahasiswa
        $filterSemester = $request->query('filter_semester'); // Semester terpilih

        // Ambil data mahasiswa berdasarkan nim
        $mahasiswa = \App\Models\Mahasiswa::where('nim', $nim)->firstOrFail();
        $semester = $mahasiswa->semester;
        $arr_tahun = ['20241', '20232', '20231', '20222', '20221', '20212', '20211', '20202', '20201'];

        // Ambil data IRS berdasarkan filter semester
        // $irsData = \App\Models\IRS::where('nim', $nim)
        // ->where('semester', $filterSemester)
        // ->get();

        $irs_filter = DB::table('irs as i')
        ->distinct()
        ->where('i.nim', '=', $nim)
        ->join('jadwal as j', 'i.id_jadwal', '=', 'j.id_jadwal')
        ->join('ruang as r', 'r.id_ruang', '=', 'j.id_ruang')
        ->join('matakuliah as m', 'j.kode_mk', '=', 'm.kode_mk')
        ->join('pengampu as p', 'm.kode_mk', '=', 'p.kode_mk') // Join ke tabel pengampu
        ->join('dosen as d', 'p.nidn', '=', 'd.nidn') // Join ke tabel dosen
        ->where('j.id_tahun', '=', $arr_tahun[$semester-$filterSemester])
        ->select(
            'm.kode_mk',
            'm.nama_mk',
            'm.sks',
            'j.kelas',
            'r.id_ruang',
            'i.status',
            'j.id_tahun',
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
        );
           
        $irs_data = $irs_filter->get();

        // Ganti dengan kode berikut:
        $courses = $irs_data->map(function($item) {
            return [
                'kode_mk' => $item->kode_mk,
                'kelas' => $item->kelas,
                'sks' => $item->sks
            ];
        })->unique(function($item) {
            // Unik berdasarkan kombinasi kode_mk dan kelas
            return $item['kode_mk'] . $item['kelas'];
        });
        
        $irs_grouped = $irs_data->groupBy(function ($item) {
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

        
        // @dd($mahasiswa->nama, $semester, $irs_grouped);
        // Total jumlah SKS untuk semester terpilih
        $totalSKS = $irs_grouped->sum('sks');

        // Siapkan data untuk view PDF
        $data = [
            'mahasiswa' => $mahasiswa,
            'irsData' => $irs_grouped,
            'filterSemester' => $filterSemester,
            'totalSKS' => $totalSKS
        ];

        // Membuat instance PDF langsung
        // $dompdf = new \Barryvdh\DomPDF\PDF();

        // Render view menjadi PDF
        // $pdf = $dompdf->loadView('pdf.irs', $data);

        $pdf = PDF::loadView('pdf.irs', $data);

        // Download PDF dengan nama file sesuai NIM dan semester
        return $pdf->download("IRS_{$mahasiswa->nim}_Semester{$filterSemester}.pdf");
    }
}
