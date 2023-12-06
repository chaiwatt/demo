<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationFloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('education_floors')->insert([
            [
            'name' =>'ปริญญาตรี'
            ],
            [
            'name' =>'ปริญญาโท'
            ],
            [
            'name' =>'ปริญญาเอก'
            ]
        ]);
    }
}
