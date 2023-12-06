<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ScholarshipCategory;
use App\Models\ScholarshipPaymentDuration;
use App\Models\ScholarshipCategoryEducationFloor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScholarshipCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scholarship_categories')->insert([
            [
                'name' => 'ค่าธรรมเนียมการศึกษา',
            ],
            [
                'name' => 'ค่าอุปกรณ์การเรียน',
            ],
            [
                'name' => 'ค่าสนันสนุนโครงงาน/วิจัย',
            ],
            [
                'name' => 'ค่าสนับสนุนวิจัยระยะสั้นในต่างประเทศ',
            ]
        ]);

        $months = Month::all();
        $scholarshipCategories = ScholarshipCategory::all();
        foreach ($months as $month){
            foreach ($scholarshipCategories as $scholarshipCategory){
                ScholarshipPaymentDuration::create([
                    'scholarship_category_id' => $scholarshipCategory->id,
                    'month_id' => $month->id,
                ]);
            }
        }

        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 1,
            'scholarship_category_id' => 1,
            'cost' => 400000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 2,
            'scholarship_category_id' => 1,
            'cost' => 600000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 3,
            'scholarship_category_id' => 1,
            'cost' => 1000000
        ]);

        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 1,
            'scholarship_category_id' => 2,
            'cost' => 100000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 2,
            'scholarship_category_id' => 2,
            'cost' => 100000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 3,
            'scholarship_category_id' => 2,
            'cost' => 100000
        ]);

        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 1,
            'scholarship_category_id' => 3,
            'cost' => 300000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 2,
            'scholarship_category_id' => 3,
            'cost' => 700000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 3,
            'scholarship_category_id' => 3,
            'cost' => 1000000
        ]);

         ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 1,
            'scholarship_category_id' => 4,
            'cost' => 0
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 2,
            'scholarship_category_id' => 4,
            'cost' => 1500000
        ]);
        ScholarshipCategoryEducationFloor::create([
            'education_floor_id' => 3,
            'scholarship_category_id' => 4,
            'cost' => 2500000
        ]);
    }
}
