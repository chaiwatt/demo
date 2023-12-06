<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipPaymentTransactionRevise extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_payment_transaction_id',
        'message',
        'user_id',
    ];

    // ความสัมพันธ์กับ ScholarshipPaymentTransaction
    public function scholarshipPaymentTransaction()
    {
        return $this->belongsTo(ScholarshipPaymentTransaction::class, 'scholarship_payment_transaction_id');
    }

    // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
