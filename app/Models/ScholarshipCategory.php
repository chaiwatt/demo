<?php

namespace App\Models;

use App\Models\SchoolAllocation;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentDuration;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipCategoryEducationFloor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\YearlyBudgetScholarshipCategoryAllocation;

class ScholarshipCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function allocations()
    {
        return $this->hasMany(YearlyBudgetScholarshipCategoryAllocation::class, 'scholarship_category_id');
    }

    public function schoolAllocations()
    {
        return $this->hasMany(SchoolAllocation::class, 'scholarship_category_id');
    }

    public function scholarshipPaymentTransactions()
    {
        return $this->hasMany(ScholarshipPaymentTransaction::class, 'scholarship_category_id');
    }

    // ความสัมพันธ์กับ ScholarshipPaymentDuration
    public function scholarshipPaymentDurations()
    {
        return $this->hasMany(ScholarshipPaymentDuration::class, 'scholarship_category_id');
    }

     // ความสัมพันธ์กับ ScholarshipCategoryEducationFloor
    public function scholarshipCategoryEducationFloors()
    {
        return $this->hasMany(ScholarshipCategoryEducationFloor::class, 'scholarship_category_id');
    }

    public function educationFloorCost($educationFloorId)
    {
        $scholarshipCategoryEducationFloor = ScholarshipCategoryEducationFloor::where('scholarship_category_id', $this->id)
            ->where('education_floor_id', $educationFloorId)
            ->first();
        if (!$scholarshipCategoryEducationFloor) {
            return null;
        }

        return $scholarshipCategoryEducationFloor->cost;
    }


}
