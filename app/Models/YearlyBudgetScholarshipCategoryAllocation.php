<?php

namespace App\Models;

use App\Models\YearlyBudget;
use App\Models\ScholarshipCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YearlyBudgetScholarshipCategoryAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'yearly_budget_id',
        'scholarship_category_id',
        'cost'
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
}
