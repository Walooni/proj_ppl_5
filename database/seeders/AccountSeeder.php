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
                'mahasiswa' => true,
                'pembimbing_akademik' => false,
            ],
            [
                'email' => 'pembimbing@example.com',
                'password' => Hash::make('password123'),
                'mahasiswa' => false,
                'pembimbing_akademik' => true,
            ]
        ]);
    }
}
