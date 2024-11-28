<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'email' => 'mahasiswa@example.com',
                'password' => Hash::make('password123'),
                'role' => false,
                // role = false, buat mahasiswa
                'related_id' => '24060121120002',
            ],
            [
                'email' => 'pembimbing@example.com',
                'password' => Hash::make('password123'),
                'role' => true,
                // role = true, buat dosen
                'related_id' => '0627128001',
            ],
            [
                'email' => 'pembimbing2@example.com',
                'password' => Hash::make('password123'),
                'role' => true,
                // role = true, buat dosen
                'related_id' => '0020048104',
            ],
        ]);
    }
}









