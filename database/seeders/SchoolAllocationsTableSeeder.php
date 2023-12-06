<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolAllocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('school_allocations')->insert([
            [
                'yearly_budget_id' => 1,
                'school_id' => 1,
                'scholarship_category_id' => 1,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 1,
                'scholarship_category_id' => 2,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 1,
                'scholarship_category_id' => 3,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 1,
                'scholarship_category_id' => 4,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 2,
                'scholarship_category_id' => 1,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 2,
                'scholarship_category_id' => 2,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 2,
                'scholarship_category_id' => 3,
                'cost' => 1000000
            ],
            [
                'yearly_budget_id' => 1,
                'school_id' => 2,
                'scholarship_category_id' => 4,
                'cost' => 1000000
            ]
        ]);
    }
}
