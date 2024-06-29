<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasiensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'user_id' => 1,
            'tgl_lahir' => date('Y-m-d'),
            'alamat' => 'Bandung, kopo paling macet tidak ada duanya',
            'photo' => 'images/pasien1719596478.jpg',
        ]);
    }
}
