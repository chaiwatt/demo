<?php

namespace App\Models;

use App\Models\Month;
use App\Models\ScholarshipCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipPaymentDuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_category_id',
        'month_id',
        'from_date',
        'to_date',
        'status',
        'frequency'
    ];
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

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == '1' ? 'จ่ายปกติ' : 'ยกเลิก';
    }
}
