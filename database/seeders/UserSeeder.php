<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($userIndex = 1; $userIndex <= 15; $userIndex++) {
            DB::table('users')->insert([
                'user_name' => 'test_' . $userIndex,
                'password' => 'test12345',
                'status' => $this->generateRandomStatus(),
                'last_activity' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    private function generateRandomStatus()
    {
        return rand(0, 1) ? 'active' : 'inactive';
    }
}
