<?php

namespace App\Models;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActiviyUser extends Model
{
    use HasFactory;
     protected $fillable = [
        'activity_id',
        'user_id',
        'status',
        'note',
    ];

    // ความสัมพันธ์กับ Activity
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
