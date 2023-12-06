<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrefixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('prefixes')->insert([
            [
            'name' =>'นาย'
            ],
            [
            'name' =>'นาง'
            ],
            [
            'name' =>'น.ส.'
            ]
        ]);
    }
}
