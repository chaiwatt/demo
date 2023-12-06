<?php

namespace App\Models;

use App\Models\User;
use App\Models\Month;
use App\Models\YearlyBudget;
use App\Models\ScholarshipCategory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentTransactionDetail;
use App\Models\ScholarshipPaymentTransactionRevise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ScholarshipPaymentTransactionAttachment;

class ScholarshipPaymentTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'yearly_budget_id',
        'scholarship_category_id',
        'month_id',
        'cost',
        'payment_cost',
        'status'
    ];

     // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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

    // ความสัมพันธ์กับ Month
    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }

    // ความสัมพันธ์กับ ScholarshipPaymentTransactionDetail
    public function scholarshipPaymentTransactionDetails()
    {
        return $this->hasMany(ScholarshipPaymentTransactionDetail::class, 'scholarship_payment_transaction_id');
    }

    public function scholarshipPaymentTransactionAttachments()
    {
        return $this->hasMany(ScholarshipPaymentTransactionAttachment::class, 'scholarship_payment_transaction_id');
    }

    // ความสัมพันธ์กับ ScholarshipPaymentTransactionRevise
    public function scholarshipPaymentTransactionRevises()
    {
        return $this->hasMany(ScholarshipPaymentTransactionRevise::class, 'scholarship_payment_transaction_id');
    }
}
