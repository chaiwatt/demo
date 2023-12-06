<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'yearly_budget_id',
        'school_id',
        'scholarship_category_id',
        'cost',
    ];

    // ความสัมพันธ์กับ YearlyBudget
    public function yearlyBudget()
    {
        return $this->belongsTo(YearlyBudget::class, 'yearly_budget_id');
    }

    // ความสัมพันธ์กับ ScholarshipCategory
    public function scholarshipCategory()
    {
        return $this->belongsTo(ScholarshipCategory::class, 'scholarship_category_id');
    }

    // ความสัมพันธ์กับ ScholarshipCategory
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
