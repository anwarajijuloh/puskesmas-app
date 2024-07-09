<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter1.jpg',
            'user_id' => 2,
            'polyclinic_id' => 1,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter2.jpg',
            'user_id' => 3,
            'polyclinic_id' => 1,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter3.jpg',
            'user_id' => 4,
            'polyclinic_id' => 1,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter4.jpg',
            'user_id' => 5,
            'polyclinic_id' => 2,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter5.jpg',
            'user_id' => 6,
            'polyclinic_id' => 2,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter6.jpg',
            'user_id' => 7,
            'polyclinic_id' => 2,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter7.jpg',
            'user_id' => 8,
            'polyclinic_id' => 2,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter8.jpg',
            'user_id' => 9,
            'polyclinic_id' => 3,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter9.jpg',
            'user_id' => 10,
            'polyclinic_id' => 3,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter10.jpg',
            'user_id' => 11,
            'polyclinic_id' => 4,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter11.jpg',
            'user_id' => 12,
            'polyclinic_id' => 4,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter12.jpg',
            'user_id' => 13,
            'polyclinic_id' => 5,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter13.jpg',
            'user_id' => 14,
            'polyclinic_id' => 5,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter14.jpg',
            'user_id' => 15,
            'polyclinic_id' => 5,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter15.jpg',
            'user_id' => 16,
            'polyclinic_id' => 6,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter16.jpg',
            'user_id' => 17,
            'polyclinic_id' => 6,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter17.jpg',
            'user_id' => 18,
            'polyclinic_id' => 6,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter18.jpg',
            'user_id' => 19,
            'polyclinic_id' => 7,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter19.jpg',
            'user_id' => 20,
            'polyclinic_id' => 7,
        ]);
        Doctor::create([
            'photo' => 'assets/images/doctor/dokter6.jpg',
            'user_id' => 21,
            'polyclinic_id' => 7,
        ]);
    }
}
