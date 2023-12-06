<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssessmentItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assessment_items')->insert([
            [
            'name' =>'หัวข้อการประเมินที่1'
            ],
            [
            'name' =>'หัวข้อการประเมินที่2'
            ],
            [
            'name' =>'หัวข้อการประเมินที่3'
            ],
            [
            'name' =>'หัวข้อการประเมินที่4'
            ],
            [
            'name' =>'หัวข้อการประเมินที่5'
            ],
            [
            'name' =>'หัวข้อการประเมินที่6'
            ],
            [
            'name' =>'หัวข้อการประเมินที่7'
            ],
            [
            'name' =>'หัวข้อการประเมินที่8'
            ],
            [
            'name' =>'หัวข้อการประเมินที่9'
            ],
            [
            'name' =>'หัวข้อการประเมินที่10'
            ]
        ]);
    }
}
