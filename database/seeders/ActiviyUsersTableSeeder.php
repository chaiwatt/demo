<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActiviyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activiy_users')->insert([
            [
            'activity_id' => 1, 
            'user_id' => 4,
            ],
            [
            'activity_id' => 1, 
            'user_id' => 5,
            ],
            [
            'activity_id' => 1, 
            'user_id' => 5,
            ],
            [
            'activity_id' => 1, 
            'user_id' => 6,
            ],
            [
            'activity_id' => 2, 
            'user_id' => 7,
            ],
            [
            'activity_id' => 2, 
            'user_id' => 8,
            ],
            [
            'activity_id' => 2, 
            'user_id' => 9,
            ],
            [
            'activity_id' => 2, 
            'user_id' => 10,
            ],
            
        ]);
    }
}
