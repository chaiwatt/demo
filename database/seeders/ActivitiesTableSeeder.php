<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            [
            'name' =>'กิจกรรมที่1',
            'description' =>'รายละเอียดกิจกรรมที่1',
            ],
            [
            'name' =>'กิจกรรมที่2',
            'description' =>'รายละเอียดกิจกรรมที่1',
            ]
        ]);
    }
}
