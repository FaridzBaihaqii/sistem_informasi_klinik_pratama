<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'resepsionis',
                'peran' => 'resepsionis',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'apoteker',
                'peran' => 'apoteker',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'asisten_dokter',
                'peran' => 'asisten dokter',
                'password' => Hash::make('123')
            ]
        ];

        // looping data dengan foreach
        foreach ($userData as $val) {
            Akun::create($val);
        }
    }
}