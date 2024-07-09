<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QueueTable extends Seeder
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
            $queuedAt = $faker->dateTimeBetween('-1 month', '+1 month');
            $priority = $faker->randomElement(['umum', 'sedang', 'darurat']);
            
            // Get doctor and its polyclinic
            $doctorId = $faker->randomElement($doctorIds);
            $doctor = DB::table('doctors')->find($doctorId);
            $polyclinicId = $doctor->polyclinic_id;

            DB::table('queues')->insert([
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $doctorId,
                'polyclinic_id' => $polyclinicId,
                'priority' => $priority,
                'queued_at' => $queuedAt,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
