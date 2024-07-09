<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTable::class,
            PolyclinicTable::class,
            DoctorTable::class,
            PatientTable::class,
            HealthRecordTable::class,
            AppointmentTable::class,
            MessageTable::class,
            AdminTable::class,
            QueueTable::class,
            AttendanceTable::class,
        ]);
    }
}
