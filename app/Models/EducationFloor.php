<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipCategoryEducationFloor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationFloor extends Model
{
    use HasFactory;
    
    // ความสัมพันธ์กับ ScholarshipCategoryEducationFloor
    public function scholarshipCategoryEducationFloors()
    {
        return $this->hasMany(ScholarshipCategoryEducationFloor::class, 'education_floor_id');
    }
}
