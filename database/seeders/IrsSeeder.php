<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('irs')->insert([
            ["status" => "Mengulang", "nim" => "24060121120002", "id_jadwal" => "202012007101", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060120120001", "id_jadwal" => "202012007102", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060122120001", "id_jadwal" => "202012007103", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060122120002", "id_jadwal" => "202012007104", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060120130052", "id_jadwal" => "202012007105", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060121120002", "id_jadwal" => "202012007106", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060122120001", "id_jadwal" => "202012007107", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060122120002", "id_jadwal" => "202012007108", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060120120001", "id_jadwal" => "202012007109", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060120130052", "id_jadwal" => "202012007110", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060121120002", "id_jadwal" => "202012007101", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060120120001", "id_jadwal" => "202012007102", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060122120001", "id_jadwal" => "202012007103", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060122120002", "id_jadwal" => "202012007104", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060120130052", "id_jadwal" => "202012007105", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060121120002", "id_jadwal" => "202012007106", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060122120001", "id_jadwal" => "202012007107", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060122120002", "id_jadwal" => "202012007108", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060120120001", "id_jadwal" => "202012007109", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060120130052", "id_jadwal" => "202012007110", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060121120002", "id_jadwal" => "202012007101", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060120120001", "id_jadwal" => "202012007102", "tanggal_disetujui" => null],
            ["status" => "Mengulang", "nim" => "24060122120001", "id_jadwal" => "202012007103", "tanggal_disetujui" => null],
            ["status" => "Baru", "nim" => "24060122120002", "id_jadwal" => "202012007104", "tanggal_disetujui" => null],
            ["status" => "Perbaikan", "nim" => "24060120130052", "id_jadwal" => "202012007105", "tanggal_disetujui" => null],
        ]);
    }
}
