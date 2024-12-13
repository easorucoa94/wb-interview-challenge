<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($employerIndex = 1; $employerIndex <= 15; $employerIndex++) {
            DB::table('employers')->insert([
                'company' => $faker->company(),
                'address' => $faker->address(),
                'city' => $faker->city(),
                'province' => $faker->city(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
