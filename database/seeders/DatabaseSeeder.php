<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(EducationFloorsTableSeeder::class);
        $this->call(MonthsTableSeeder::class);
        $this->call(ScholarshipAttachmentsTableSeeder::class);
        $this->call(HtmlColrsTableSeeder::class);
        $this->call(PrefixesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(GroupModuleJobsTableSeeder::class);
        $this->call(ScholarshipCategoriesTableSeeder::class);
        $this->call(YearlyBudgetsTableSeeder::class);
        $this->call(YearlyBudgetScholarshipCategoryAllocationsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(SchoolAllocationsTableSeeder::class);
        $this->call(ScholarshipStudentsTableSeeder::class);
        $this->call(ScholarshipPaymentTransactionsTableSeeder::class);
        $this->call(AssessmentItemsTableSeeder::class);
        $this->call(AssessmentsTableSeeder::class);
        $this->call(AssessmentAssignmentsTableSeeder::class);
        $this->call(AssessmentAssignmentUsersTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ActiviyUsersTableSeeder::class);
           
    }
}
