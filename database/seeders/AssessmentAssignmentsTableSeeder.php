<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssessmentAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assessment_assignments')->insert([
            [
            'assessment_id' => 1, 
            'assessment_item_id' => 1,
            ],
            [
            'assessment_id' => 1, 
            'assessment_item_id' => 2,
            ],
            [
            'assessment_id' => 1, 
            'assessment_item_id' => 3,
            ],
            [
            'assessment_id' => 1, 
            'assessment_item_id' => 4,
            ],
            [
            'assessment_id' => 1, 
            'assessment_item_id' => 5,
            ],
             [
            'assessment_id' => 2, 
            'assessment_item_id' => 6,
            ],
            [
            'assessment_id' => 2, 
            'assessment_item_id' => 7,
            ],
            [
            'assessment_id' => 2, 
            'assessment_item_id' => 8,
            ],
            [
            'assessment_id' => 2, 
            'assessment_item_id' => 9,
            ],
            [
            'assessment_id' => 2, 
            'assessment_item_id' => 10,
            ]
        ]);
    }
}
