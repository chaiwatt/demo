<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipPaymentTransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_payment_transaction_id',
        'description',
        'tracking_number'
    ];

    // ความสัมพันธ์กับ ScholarshipPaymentTransaction
    public function scholarshipPaymentTransaction()
    {
        return $this->belongsTo(ScholarshipPaymentTransaction::class, 'scholarship_payment_transaction_id');
    }
}
