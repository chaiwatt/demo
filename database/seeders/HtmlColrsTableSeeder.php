<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HtmlColrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('html_colors')->insert([
            ['color' => 'bg-info'],
            ['color' => 'bg-success'],
            ['color' => 'bg-warning'],
            ['color' => 'bg-danger'],
            ['color' => 'bg-dark'],
            ['color' => 'bg-secondary'],
            ['color' => 'bg-primary'],
            ['color' => 'bg-muted']
        ]);
    }
}
