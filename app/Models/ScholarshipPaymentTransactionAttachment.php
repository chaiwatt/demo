<?php

namespace App\Models;

use App\Models\ScholarshipAttachment;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipPaymentTransactionAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_payment_transaction_id',
        'scholarship_attachment_id',
        'file',
    ];

    // ความสัมพันธ์กับ ScholarshipPaymentTransaction
    public function scholarshipPaymentTransaction()
    {
        return $this->belongsTo(ScholarshipPaymentTransaction::class, 'scholarship_payment_transaction_id');
    }

    // ความสัมพันธ์กับ ScholarshipAttachment
    public function scholarshipAttachment()
    {
        return $this->belongsTo(ScholarshipAttachment::class, 'scholarship_attachment_id');
    }
}
