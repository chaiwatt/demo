<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ScholarshipPaymentDuration;
use App\Models\ScholarshipPaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Month extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function scholarshipPaymentTransactions()
    {
        return $this->hasMany(ScholarshipPaymentTransaction::class, 'month_id');
    }

     // ความสัมพันธ์กับ ScholarshipPaymentDuration
    public function scholarshipPaymentDurations()
    {
        return $this->hasMany(ScholarshipPaymentDuration::class, 'month_id');
    }
}
