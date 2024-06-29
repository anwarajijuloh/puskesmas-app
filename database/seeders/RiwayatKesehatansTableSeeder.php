<?php

namespace Database\Seeders;

use App\Models\RiwayatKesehatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatKesehatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RiwayatKesehatan::create([
            'pasien_id' => 1,
            'dokter_id' => 2,
            'diagnosa' => 'demam tinggi',
            'resep' => 'paracetamol',
        ]);
        RiwayatKesehatan::create([
            'pasien_id' => 1,
            'dokter_id' => 3,
            'diagnosa' => 'Kurang cairan dan kesemutan',
            'resep' => 'vitamin c',
        ]);
        RiwayatKesehatan::create([
            'pasien_id' => 1,
            'dokter_id' => 2,
            'diagnosa' => 'Gejala tipes',
            'resep' => 'Penisilin',
        ]);
    }
}
