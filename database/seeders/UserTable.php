<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Titik Prihantini, S.Keb.,Bdn',
            'email' => 'titik@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Armita A. Hasyuddin, A.Md.Keb',
            'email' => 'armita@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Jorina M. Kwasua, A.Md.Keb',
            'email' => 'jorina@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Magdalena K. Tildjuir, A.Md.Keb',
            'email' => 'magdalena@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Shintia Laikiok, A.Md.Keb',
            'email' => 'shintia@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Arini Sukarim, A.Md.Keb',
            'email' => 'arini@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'dr. Thesia Nathalia Thedy',
            'email' => 'thesia@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'dr. Fourly Sandy Sijabat',
            'email' => 'fourly@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Yosina D. Tetiona, A.Md., Kep',
            'email' => 'yosina@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Hendra M. Matatula, S.Kep.,Ns',
            'email' => 'hendra@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Nur Baida B.L. Djafar',
            'email' => 'nur@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Sukmawati Selmury, A.Md.,Kep',
            'email' => 'sukmawati@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Baniati Sinamur, A.Md.,Kep',
            'email' => 'baniati@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Erni Maende, A.Md.,Kep',
            'email' => 'erni@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Vivi Sainyakit, A.Md.,Kep',
            'email' => 'vivi@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Pretty M. Badidi, A.Md.RO',
            'email' => 'pretty@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Hadija Hasim, SKM',
            'email' => 'hadija@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Leny Hutanjalay, SKM',
            'email' => 'leny@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Flady S. Latuputty, SKM',
            'email' => 'flady@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Nurbaida B.L. Djafar',
            'email' => 'nurbaida@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'doctor',
        ]);
        User::create([
            'name' => 'Marice Untailawan',
            'email' => 'marice@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'patient',
        ]);
        User::create([
            'name' => 'Herdianty Rahakbauw',
            'email' => 'herdianty@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'patient',
        ]);
        User::create([
            'name' => 'Prihantini Titik',
            'email' => 'prihatini@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'patient',
        ]);
        User::create([
            'name' => 'Sukarim Arini',
            'email' => 'sukarim@mail.com',
            'password' => Hash::make('secret'),
            'role' => 'patient',
        ]);
    }
}
