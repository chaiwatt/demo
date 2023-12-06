<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'prefix' => 'groups.officer-system.budget',
            'code' => 'OFFICER-SYSTEM-BUDGET',
            'name' => 'งบประมาณ',
            'icon' => 'fa-wallet'
        ]);
        Module::create([
            'prefix' => 'groups.officer-system.management',
            'code' => 'OFFICER-SYSTEM-MANAGEMENT',
            'name' => 'การจัดการ',
            'icon' => 'fa-calendar-alt'
        ]);
        Module::create([
            'prefix' => 'groups.officer-system.assessment',
            'code' => 'OFFICER-SYSTEM-ASSESSMENT',
            'name' => 'การประเมิน',
            'icon' => 'fa-award'
        ]);
        Module::create([
            'prefix' => 'groups.officer-system.activity',
            'code' => 'OFFICER-SYSTEM-ACTIVITY',
            'name' => 'กิจกรรม',
            'icon' => 'fa-clock'
        ]);
        Module::create([
            'prefix' => 'groups.officer-system.setting',
            'code' => 'OFFICER-SYSTEM-SETTING',
            'name' => 'ตั้งค่า',
            'icon' => 'fa-cog'
        ]);
        Module::create([
            'prefix' => 'groups.teacher-system.management',
            'code' => 'TEACHER-SYSTEM-MANAGEMENT',
            'name' => 'การจัดการ',
            'icon' => 'fa-calendar-alt'
        ]);
        Module::create([
            'prefix' => 'groups.teacher-system.setting',
            'code' => 'TEACHER-SYSTEM-SETTING',
            'name' => 'ตั้งค่า',
            'icon' => 'fa-cog'
        ]);
        Module::create([
            'prefix' => 'groups.student-system.management',
            'code' => 'STUDENT-SYSTEM-MANAGEMENT',
            'name' => 'การจัดการ',
            'icon' => 'fa-calendar-alt'
        ]);
        Module::create([
            'prefix' => 'groups.student-system.setting',
            'code' => 'STUDENT-SYSTEM-SETTING',
            'name' => 'ตั้งค่า',
            'icon' => 'fa-cog'
        ]);
    }
}
