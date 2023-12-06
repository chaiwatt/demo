<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssessmentAssignmentUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assessment_assignment_users')->insert([
            [
            'assessment_assignment_id' => 1, 
            'user_id' => 4,
            ],
            [
            'assessment_assignment_id' => 1, 
            'user_id' => 5,
            ],
            [
            'assessment_assignment_id' => 1, 
            'user_id' => 5,
            ],
            [
            'assessment_assignment_id' => 1, 
            'user_id' => 6,
            ],
            [
            'assessment_assignment_id' => 2, 
            'user_id' => 7,
            ],
            [
            'assessment_assignment_id' => 2, 
            'user_id' => 8,
            ],
            [
            'assessment_assignment_id' => 2, 
            'user_id' => 9,
            ],
            [
            'assessment_assignment_id' => 2, 
            'user_id' => 10,
            ],
            
        ]);
    }
}
