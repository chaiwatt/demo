<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScholarshipStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scholarship_students')->insert([
            [
                'user_id' => 4,
                'school_id' => 1,
            ],
            [
                'user_id' => 6,
                'school_id' => 1,
            ],
            [
                'user_id' => 8,
                'school_id' => 1,
            ],
            [
                'user_id' => 10,
                'school_id' => 1,
            ],
            [
                'user_id' => 5,
                'school_id' => 2,
            ],
            [
                'user_id' => 7,
                'school_id' => 2,
            ],
            [
                'user_id' => 9,
                'school_id' => 2,
            ]
        ]);
    }
}
