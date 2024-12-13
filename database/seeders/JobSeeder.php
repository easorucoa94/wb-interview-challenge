<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($jobIndex = 1; $jobIndex <= 50; $jobIndex++) {
            DB::table('jobs')->insert([
                'employer_id' => rand(1,15),
                'title' => $faker->jobTitle(),
                'description' => $faker->text(1000),
                'start_date' => $faker->date(),
                'pay' => $faker->randomFloat(2,0,9999),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
