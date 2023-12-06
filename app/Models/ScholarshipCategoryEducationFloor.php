<?php

namespace App\Models;

use App\Models\EducationFloor;
use App\Models\ScholarshipCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipCategoryEducationFloor extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_category_id',
        'education_floor_id',
        'cost',
    ];

    // ความสัมพันธ์กับ ScholarshipCategory
    public function scholarshipCategory()
    {
        return $this->belongsTo(ScholarshipCategory::class, 'scholarship_category_id');
    }

    // ความสัมพันธ์กับ EducationFloor
    public function educationFloor()
    {
        return $this->belongsTo(EducationFloor::class, 'education_floor_id');
    }
}
