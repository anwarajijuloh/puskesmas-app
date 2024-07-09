<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'photo' => 'assets/images/faces/face1.jpg',
            'user_id' => 22,
        ]);
        Patient::create([
            'photo' => 'assets/images/faces/face2.jpg',
            'user_id' => 23,
        ]);
        Patient::create([
            'photo' => 'assets/images/faces/face3.jpg',
            'user_id' => 24,
        ]);
        Patient::create([
            'photo' => 'assets/images/faces/face4.jpg',
            'user_id' => 25,
        ]);
    }
}
