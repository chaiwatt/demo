<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Group;
use App\Models\Module;
use App\Models\GroupModuleJob;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupModuleJobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Group
        $officerGroup = Group::where('code','OFFICER')->first();
        $teacherGroup = Group::where('code','TEACHER')->first();
        $studentGroup = Group::where('code','STUDENT')->first();

        // Module
        $officerSystemBudgetModule = Module::where('code','OFFICER-SYSTEM-BUDGET')->first();
        $officerSystemManagementModule = Module::where('code','OFFICER-SYSTEM-MANAGEMENT')->first();
        $officerSystemAssessmentModule = Module::where('code','OFFICER-SYSTEM-ASSESSMENT')->first();
        $officerSystemActivityModule = Module::where('code','OFFICER-SYSTEM-ACTIVITY')->first();
        $officerSystemSettingModule = Module::where('code','OFFICER-SYSTEM-SETTING')->first();
        $teacherSystemManagementModule = Module::where('code','TEACHER-SYSTEM-MANAGEMENT')->first();
        $teacherSystemSettingModule = Module::where('code','TEACHER-SYSTEM-SETTING')->first();
        $studentSystemManagementModule = Module::where('code','STUDENT-SYSTEM-MANAGEMENT')->first();
        $studentSystemSettingModule = Module::where('code','STUDENT-SYSTEM-SETTING')->first();

        //Job
        $officerSystemBudgetAllowanceJob = Job::where('code','OFFICER-SYSTEM-BUDGET-ALLOWANCE')->first();
        $officerSystemBudgetAllocationJob = Job::where('code','OFFICER-SYSTEM-BUDGET-ALLOCATION')->first();
        $officerSystemTransactionJob = Job::where('code','OFFICER-SYSTEM-TRANSACTION')->first();
        $officerSystemTransferListJob = Job::where('code','OFFICER-SYSTEM-TRANSFER-LIST')->first();
        $officerSystemTransferResultJob = Job::where('code','OFFICER-SYSTEM-TRANSFER-RESULT')->first();
        $officerSystemStudentJob = Job::where('code','OFFICER-SYSTEM-STUDENT')->first();
        $officerSystemAssessmentAssessmentJob = Job::where('code','OFFICER-SYSTEM-ASSESSMENT-ASSESSMENT')->first();
        $officerSystemActivityActivityJob = Job::where('code','OFFICER-SYSTEM-ACTIVITY-ACTIVITY')->first();
        $officerSystemGeneralSettingJob = Job::where('code','OFFICER-SYSTEM-GENERAL-SETTING')->first();
        $officerSystemAttachmentRequestSettingJob = Job::where('code','OFFICER-SYSTEM-GENERAL-ATTACHMENT-REQUEST')->first();
        $officerSystemPaymentConditionSettingJob = Job::where('code','OFFICER-SYSTEM-GENERAL-PAYMENT-CONDITION')->first();
        $officerSystemAssessmentSettingJob = Job::where('code','OFFICER-SYSTEM-GENERAL-ASSESSMENT')->first();
        $officerSystemActivitySettingJob = Job::where('code','OFFICER-SYSTEM-GENERAL-ACTIVITY')->first();
        $teacherSystemTransactionJob = Job::where('code','TEACHER-SYSTEM-TRANSACTION')->first();
        $teacherSystemStudentJob = Job::where('code','TEACHER-SYSTEM-STUDENT')->first();
        $teacherSystemAssessmentJob = Job::where('code','TEACHER-SYSTEM-ASSESSMENT')->first();

        $teacherSystemGeneralSettingJob = Job::where('code','TEACHER-GENERAL-SETTING')->first();
        $studentSystemTransactionJob = Job::where('code','STUDENT-SYSTEM-TRANSACTION')->first();
        $studentSystemActivityJob = Job::where('code','STUDENT-SYSTEM-ACTIVITY')->first();
        $studentSystemGeneralSettingJob = Job::where('code','STUDENT-GENERAL-SETTING')->first();

        // OFFICER SYSTEM
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemBudgetModule->id,
            'job_id' => $officerSystemBudgetAllowanceJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemBudgetModule->id,
            'job_id' => $officerSystemBudgetAllocationJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemManagementModule->id,
            'job_id' => $officerSystemStudentJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemManagementModule->id,
            'job_id' => $officerSystemTransactionJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemManagementModule->id,
            'job_id' => $officerSystemTransferListJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemManagementModule->id,
            'job_id' => $officerSystemTransferResultJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemAssessmentModule->id,
            'job_id' => $officerSystemAssessmentAssessmentJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemActivityModule->id,
            'job_id' => $officerSystemActivityActivityJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemSettingModule->id,
            'job_id' => $officerSystemGeneralSettingJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemSettingModule->id,
            'job_id' => $officerSystemAttachmentRequestSettingJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemSettingModule->id,
            'job_id' => $officerSystemPaymentConditionSettingJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemSettingModule->id,
            'job_id' => $officerSystemAssessmentSettingJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $officerGroup->id,
            'module_id' => $officerSystemSettingModule->id,
            'job_id' => $officerSystemActivitySettingJob->id,
        ]);
        
        // TEACHER SYSTEM
        GroupModuleJob::create([
            'group_id' => $teacherGroup->id,
            'module_id' => $teacherSystemManagementModule->id,
            'job_id' => $teacherSystemTransactionJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $teacherGroup->id,
            'module_id' => $teacherSystemManagementModule->id,
            'job_id' => $teacherSystemStudentJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $teacherGroup->id,
            'module_id' => $teacherSystemManagementModule->id,
            'job_id' => $teacherSystemAssessmentJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $teacherGroup->id,
            'module_id' => $teacherSystemSettingModule->id,
            'job_id' => $teacherSystemGeneralSettingJob->id,
        ]);

        // STUDENT-SYSTEM
        GroupModuleJob::create([
            'group_id' => $studentGroup->id,
            'module_id' => $studentSystemManagementModule->id,
            'job_id' => $studentSystemTransactionJob->id,
        ]);
        GroupModuleJob::create([
            'group_id' => $studentGroup->id,
            'module_id' => $studentSystemManagementModule->id,
            'job_id' => $studentSystemActivityJob->id,
        ]);
        
        GroupModuleJob::create([
            'group_id' => $studentGroup->id,
            'module_id' => $studentSystemSettingModule->id,
            'job_id' => $studentSystemGeneralSettingJob->id,
        ]);











    }
}
