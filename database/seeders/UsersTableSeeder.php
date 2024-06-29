<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                           
        User::create([
            'name' => 'Anwar Ajijuloh',
            'email' => 'anwar@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'pasien',
        ]);
        User::create([
            'name' => 'dr. Thesia Nathalia Thedy',
            'email' => 'thesia@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'dr. Fourly Sandy Sijabat',
            'email' => 'fourly@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'drg. Monalisa Loblobly',
            'email' => 'monalisa@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Titik Prihantini, S.Keb.,Bdn',
            'email' => 'titik@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Armita A. Hasyuddin, A.Md.Keb',
            'email' => 'armita@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Fitria Derlen, A.Md.Keb',
            'email' => 'fitria@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Jorina M. Kwasua, A.Md.Keb',
            'email' => 'jorina@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Magdalena K. Tildjuir, A.Md.Keb',
            'email' => 'magdalena@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Shintia Laikiok, A.Md.Keb',
            'email' => 'shintia@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Arini Sukarim, A.Md.Keb',
            'email' => 'arini@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Sri Yatmi Yahya, S.Farm.,Apt',
            'email' => 'sri@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Yosina D. Tetiona, A.Md., Kep',
            'email' => 'yosina@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Johni F. Duarkossu, A.Md.Kep',
            'email' => 'johni@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Hendra M. Matatula, S.Kep.,Ns',
            'email' => 'hendra@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Nur Baida B.L. Djafar',
            'email' => 'nur@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Nurul Mahdianti, A.Md.Ak',
            'email' => 'nurul@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Baniati Sinamur, A.Md.,Kep',
            'email' => 'baniati@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Izak Kubela, A.Md.,Kep',
            'email' => 'izak@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'Erni Maende, A.Md.,Kep',
            'email' => 'erni@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'dokter',
        ]);
    }
}
