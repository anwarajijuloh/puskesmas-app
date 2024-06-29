<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dokter::create([
            'user_id' => 2,
            'poli_id' => 1,
            'photo' => 'images/dokter/dokter1.jpg',
        ]);
        Dokter::create([
            'user_id' => 3,
            'poli_id' => 1,
            'photo' => 'images/dokter/dokter2.jpeg',
        ]);
        Dokter::create([
            'user_id' => 4,
            'poli_id' => 1,
            'photo' => 'images/dokter/dokter3.jpg',
        ]);
        Dokter::create([
            'user_id' => 5,
            'poli_id' => 2,
            'photo' => 'images/dokter/dokter4.jpeg',
        ]);
        Dokter::create([
            'user_id' => 6,
            'poli_id' => 2,
            'photo' => 'images/dokter/dokter5.jpg',
        ]);
        Dokter::create([
            'user_id' => 7,
            'poli_id' => 3,
            'photo' => 'images/dokter/dokter6.jpg',
        ]);
        Dokter::create([
            'user_id' => 8,
            'poli_id' => 3,
            'photo' => 'images/dokter/dokter7.jpeg',
        ]);
        Dokter::create([
            'user_id' => 9,
            'poli_id' => 4,
            'photo' => 'images/dokter/dokter8.jpeg',
        ]);
        Dokter::create([
            'user_id' => 10,
            'poli_id' => 4,
            'photo' => 'images/dokter/dokter9.jpg',
        ]);
        Dokter::create([
            'user_id' => 11,
            'poli_id' => 4,
            'photo' => 'images/dokter/dokter10.jpeg',
        ]);
        Dokter::create([
            'user_id' => 12,
            'poli_id' => 5,
            'photo' => 'images/dokter/dokter11.jpeg',
        ]);
        Dokter::create([
            'user_id' => 13,
            'poli_id' => 5,
            'photo' => 'images/dokter/dokter12.jpeg',
        ]);
        Dokter::create([
            'user_id' => 14,
            'poli_id' => 6,
            'photo' => 'images/dokter/dokter13.jpeg',
        ]);
        Dokter::create([
            'user_id' => 15,
            'poli_id' => 6,
            'photo' => 'images/dokter/dokter14.jpeg',
        ]);
        Dokter::create([
            'user_id' => 16,
            'poli_id' => 7,
            'photo' => 'images/dokter/dokter15.jpeg',
        ]);
        Dokter::create([
            'user_id' => 17,
            'poli_id' => 7,
            'photo' => 'images/dokter/dokter16.jpeg',
        ]);
        Dokter::create([
            'user_id' => 18,
            'poli_id' => 8,
            'photo' => 'images/dokter/dokter17.jpeg',
        ]);
        Dokter::create([
            'user_id' => 19,
            'poli_id' => 8,
            'photo' => 'images/dokter/dokter18.jpeg',
        ]);
        
    }
}
