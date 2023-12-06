<?php

namespace App\Models;

use App\Models\User;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'school_id'
    ];

    // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ความสัมพันธ์กับ School
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == '1' ? 'ปกติ' : 'จำหน่าย';
    }
}
