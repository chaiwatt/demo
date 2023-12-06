<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearlyBudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yearly_budgets')->insert([
            [
                'year' => 2023,
                'budget' => 40000000,
            ]
        ]);
    }
}

