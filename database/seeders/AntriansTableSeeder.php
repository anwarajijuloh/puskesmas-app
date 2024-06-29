<?php

namespace Database\Seeders;

use App\Models\Antrian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntriansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 1,
            'dokter_id' => 3,
            'prioritas' => 'umum',
            'status' => 'menunggu'
        ]);
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 2,
            'dokter_id' => 6,
            'prioritas' => 'umum',
            'status' => 'menunggu'
        ]);
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 3,
            'dokter_id' => 10,
            'prioritas' => 'darurat',
            'status' => 'menunggu'
        ]);
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 4,
            'dokter_id' => 12,
            'prioritas' => 'umum',
            'status' => 'menunggu'
        ]);
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 5,
            'dokter_id' => 18,
            'prioritas' => 'umum',
            'status' => 'menunggu'
        ]);
        Antrian::create([
            'pasien_id' => 1,
            'poli_id' => 6,
            'dokter_id' => 9,
            'prioritas' => 'umum',
            'status' => 'menunggu'
        ]);
    }
}
