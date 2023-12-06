<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ScholarshipPaymentTransactionAttachment;

class ScholarshipAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function scholarshipPaymentTransactionAttachments()
    {
        return $this->hasMany(ScholarshipPaymentTransactionAttachment::class, 'scholarship_attachment_id');
    }
}
