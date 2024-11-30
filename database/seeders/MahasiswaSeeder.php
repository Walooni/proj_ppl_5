<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('mahasiswa')->insert([
            ['nim' => '24060120120001', 'nama' => 'ANDI PUTRA', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120130052', 'nama' => 'BUDI SANTOSO', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120002', 'nama' => 'CICI AMALIA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120001', 'nama' => 'DIDI AMALIA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120002', 'nama' => 'FIFI AMALIA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120120003', 'nama' => 'GINA ANDINI', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120130054', 'nama' => 'HENDRI GUNAWAN', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120003', 'nama' => 'IRMA KARTIKA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120003', 'nama' => 'JOKO PRIYONO', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120004', 'nama' => 'KARINA PUTRI', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120120005', 'nama' => 'LINA MAHARANI', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120130055', 'nama' => 'MARIO SUPRIADI', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120004', 'nama' => 'NADYA ROSITA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120005', 'nama' => 'OKY SETIAWAN', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120006', 'nama' => 'PINA SARI', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120120006', 'nama' => 'QORI ANANDA', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120130056', 'nama' => 'RAFI ADITYA', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120005', 'nama' => 'SINTA WIDYANI', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120007', 'nama' => 'TINA KUSUMA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120008', 'nama' => 'UTI YUNIAR', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120120007', 'nama' => 'VINA PUTRI', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060120130057', 'nama' => 'WINDA LARASATI', 'semester' => 9, 'angkatan' => 2020, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120006', 'nama' => 'XENA ANDIRA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120009', 'nama' => 'YUDA PRATAMA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120010', 'nama' => 'ZULFA RAHMA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060121120007', 'nama' => 'ADI PRADANA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120011', 'nama' => 'BELLA KARINA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120012', 'nama' => 'CINDY ANGGRAINI', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060122120013', 'nama' => 'DANA SAPUTRA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120014', 'nama' => 'EDO SUGIHARTO', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120008', 'nama' => 'FANI ISKANDAR', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060121120009', 'nama' => 'GITA PURNAMA', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0020048104'],
            ['nim' => '24060121120010', 'nama' => 'HAFID YUSUF', 'semester' => 7, 'angkatan' => 2021, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120015', 'nama' => 'IRMA HARLINA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0627128001'],
            ['nim' => '24060122120016', 'nama' => 'JERRY ADITYA', 'semester' => 5, 'angkatan' => 2022, 'id_prodi' => 2007, 'nidn' => '0020048104'],
        ]);
    }
}

