<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScholarshipAttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scholarship_attachments')->insert([
            [
                'name' => 'ใบแจ้งยอด',
            ],
            [
                'name' => 'ใบเสร็จรับเงิน',
            ],
            [
                'name' => 'หลักฐานตัวจริง',
            ]
        ]);
    }
}
