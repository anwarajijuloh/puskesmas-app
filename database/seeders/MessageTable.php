<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all patient and doctor user IDs
        $patientUserIds = DB::table('patients')->pluck('user_id')->toArray();
        $doctorUserIds = DB::table('doctors')->pluck('user_id')->toArray();

        // Generate 50 records
        for ($i = 0; $i < 50; $i++) {
            $sentAt = $faker->dateTimeBetween('-1 month', '+1 month');
            $message = $faker->sentence();

            DB::table('messages')->insert([
                'sender_id' => $faker->randomElement($patientUserIds),
                'receiver_id' => $faker->randomElement($doctorUserIds),
                'message' => $message,
                'sent_at' => $sentAt,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
