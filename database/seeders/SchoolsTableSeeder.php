<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            [
            'name' =>'มหาวิทยาลัยเชียงใหม่'
            ],
            [
            'name' =>'มหาวิทยาลัยแม่โจ้'
            ]
    
        ]);
    }
}
