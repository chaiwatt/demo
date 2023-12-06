<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Group::create([
            'code' => 'OFFICER',
            'name' => 'เจ้าหน้าที่ กสศ.',
            'description' => 'ระบบการทำงานสำหรับเจ้าหน้าที่ กสศ.',
            'icon' => 'fa-clock',
            'dashboard' => 'groups.dashboard.officer-system',
        ]);
        Group::create([
            'code' => 'TEACHER',
            'name' => 'อาจารย์ที่ปรึกษา',
            'description' => 'ระบบการทำงานสำหรับอาจารย์ที่ปรึกษา',
            'icon' => 'fa-book',
            'dashboard' => 'groups.dashboard.teacher-system',
        ]);
        Group::create([
            'code' => 'STUDENT',
            'name' => 'นักเรียนทุน',
            'description' => 'ระบบการทำงานสำหรับนักเรียนทุน',
            'icon' => 'fa-wallet',
            'dashboard' => 'groups.dashboard.student-system',
        ]);
    
    }
}
