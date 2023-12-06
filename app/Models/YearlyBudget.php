<?php

namespace App\Models;

use App\Models\SchoolAllocation;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\YearlyBudgetScholarshipCategoryAllocation;

class YearlyBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'budget'
    ];

    public function allocations()
    {
        return $this->hasMany(YearlyBudgetScholarshipCategoryAllocation::class, 'yearly_budget_id');
    }

     public function schoolAllocations()
    {
        return $this->hasMany(SchoolAllocation::class, 'yearly_budget_id');
    }

    public function scholarshipPaymentTransactions()
    {
        return $this->hasMany(ScholarshipPaymentTransaction::class, 'yearly_budget_id');
    }
}
