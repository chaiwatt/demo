<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearlyBudgetScholarshipCategoryAllocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yearly_budget_scholarship_category_allocations')->insert([
            [
                'yearly_budget_id' => 1,
                'scholarship_category_id' => 1,
                'cost' => 10000000,
            ],
             [
                'yearly_budget_id' => 1,
                'scholarship_category_id' => 2,
                'cost' => 10000000,
            ],
             [
                'yearly_budget_id' => 1,
                'scholarship_category_id' => 3,
                'cost' => 10000000,
            ],
             [
                'yearly_budget_id' => 1,
                'scholarship_category_id' => 4,
                'cost' => 10000000,
            ]
        ]);
    }
}
