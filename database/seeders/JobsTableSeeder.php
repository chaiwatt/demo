<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'code' => 'OFFICER-SYSTEM-BUDGET-ALLOWANCE',
            'name' => 'งบประมาณ',
            'route' => 'groups.officer-system.budget.allowance',    
            'view' => 'groups.officer-system.budget.allowance.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-BUDGET-ALLOCATION',
            'name' => 'จัดสรรงบประมาณ',
            'route' => 'groups.officer-system.budget.allocation',    
            'view' => 'groups.officer-system.budget.allocation.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-STUDENT',
            'name' => 'นักเรียนทุน',
            'route' => 'groups.officer-system.management.student',    
            'view' => 'groups.officer-system.management.student.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-TRANSACTION',
            'name' => 'รายการค่าใช้จ่าย',
            'route' => 'groups.officer-system.management.transaction',    
            'view' => 'groups.officer-system.management.transaction.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-TRANSFER-LIST',
            'name' => 'รายการรอโอน',
            'route' => 'groups.officer-system.management.transfer-list',    
            'view' => 'groups.officer-system.management.transfer-list.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-TRANSFER-RESULT',
            'name' => 'ประวัติการโอน',
            'route' => 'groups.officer-system.management.transfer-result',    
            'view' => 'groups.officer-system.management.transfer-result.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-GENERAL-SETTING',
            'name' => 'ตั้งค่าทั่วไป',
            'route' => 'groups.officer-system.setting.general',    
            'view' => 'groups.officer-system.setting.general.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-GENERAL-ATTACHMENT-REQUEST',
            'name' => 'เอกสารแนบขอเบิก',
            'route' => 'groups.officer-system.setting.attachment-request',    
            'view' => 'groups.officer-system.setting.attachment-request.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-GENERAL-PAYMENT-CONDITION',
            'name' => 'เงื่อนไขค่าใช้จ่าย',
            'route' => 'groups.officer-system.setting.payment-condition',    
            'view' => 'groups.officer-system.setting.payment-condition.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-GENERAL-ASSESSMENT',
            'name' => 'รายการประเมิน',
            'route' => 'groups.officer-system.setting.assessment',    
            'view' => 'groups.officer-system.setting.assessment.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-GENERAL-ACTIVITY',
            'name' => 'รายการกิจกรรม',
            'route' => 'groups.officer-system.setting.activity',    
            'view' => 'groups.officer-system.setting.activity.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-ASSESSMENT-ASSESSMENT',
            'name' => 'รายการประเมิน',
            'route' => 'groups.officer-system.assessment.assessment',    
            'view' => 'groups.officer-system.assessment.assessment.index',
        ]);
        Job::create([
            'code' => 'OFFICER-SYSTEM-ACTIVITY-ACTIVITY',
            'name' => 'รายการกิจกรรม',
            'route' => 'groups.officer-system.activity.activity',    
            'view' => 'groups.officer-system.activity.activity.index',
        ]);
        Job::create([
            'code' => 'TEACHER-SYSTEM-TRANSACTION',
            'name' => 'รายการค่าใช้จ่าย',
            'route' => 'groups.teacher-system.management.transaction',    
            'view' => 'groups.teacher-system.management.transaction.index',
        ]);
        Job::create([
            'code' => 'TEACHER-SYSTEM-STUDENT',
            'name' => 'นักเรียนทุน',
            'route' => 'groups.teacher-system.management.student',    
            'view' => 'groups.teacher-system.management.student.index',
        ]);
        Job::create([
            'code' => 'TEACHER-SYSTEM-ASSESSMENT',
            'name' => 'รายการประเมิน',
            'route' => 'groups.teacher-system.management.assessment',    
            'view' => 'groups.teacher-system.management.assessment.index',
        ]);
        Job::create([
            'code' => 'TEACHER-GENERAL-SETTING',
            'name' => 'ตั้งค่าทั่วไป',
            'route' => 'groups.teacher-system.setting.general',    
            'view' => 'groups.teacher-system.setting.general.index',
        ]);

        Job::create([
            'code' => 'STUDENT-SYSTEM-TRANSACTION',
            'name' => 'รายการค่าใช้จ่าย',
            'route' => 'groups.student-system.management.transaction',    
            'view' => 'groups.student-system.management.transaction.index',
        ]);

        Job::create([
            'code' => 'STUDENT-SYSTEM-ACTIVITY',
            'name' => 'รายการกิจกรรม',
            'route' => 'groups.student-system.management.activity',    
            'view' => 'groups.student-system.management.activity.index',
        ]);

        Job::create([
            'code' => 'STUDENT-GENERAL-SETTING',
            'name' => 'ตั้งค่าทั่วไป',
            'route' => 'groups.student-system.setting.general',    
            'view' => 'groups.student-system.setting.general.index',
        ]);
    }
}
