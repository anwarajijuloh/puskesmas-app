<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all doctor IDs
        $doctorIds = DB::table('doctors')->pluck('id')->toArray();

        // Generate 50 records
        for ($i = 0; $i < 50; $i++) {
            $checkInTime = $faker->time('H:i:s');
            $checkOutTime = $faker->boolean(50) ? $faker->time('H:i:s') : null;

            DB::table('attendances')->insert([
                'doctor_id' => $faker->randomElement($doctorIds),
                'date' => $faker->date(),
                'check_in_time' => $checkInTime,
                'check_out_time' => $checkOutTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
