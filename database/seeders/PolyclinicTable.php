<?php

namespace Database\Seeders;

use App\Models\Polyclinic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PolyclinicTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Polyclinic::create([
            'name' => 'umum',
        ]);

        Polyclinic::create([
            'name' => 'lansia',
        ]);

        Polyclinic::create([
            'name' => 'kia',

        ]);

        Polyclinic::create([
            'name' => 'gigi',
        ]);

        Polyclinic::create([
            'name' => 'psikologi',
        ]);
        Polyclinic::create([
            'name' => 'sanitasi',
        ]);
        Polyclinic::create([
            'name' => 'gizi',
        ]);
    }
}
