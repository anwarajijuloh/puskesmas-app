<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all patient and doctor IDs
        $patientIds = DB::table('patients')->pluck('id')->toArray();
        $doctorIds = DB::table('doctors')->pluck('id')->toArray();

        // Generate 50 records
        for ($i = 0; $i < 50; $i++) {
            $appointmentTime = $faker->dateTimeBetween('-1 month', '+1 month');
            
            DB::table('appointments')->insert([
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'appointment_time' => $appointmentTime,
                'status' => 'dibuat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
