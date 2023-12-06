<?php

namespace App\Models;

use App\Models\ActiviyUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    
    // ความสัมพันธ์กับ ActiviyUser
    public function activiyUsers()
    {
        return $this->hasMany(ActiviyUser::class, 'activity_id');
    }
}
