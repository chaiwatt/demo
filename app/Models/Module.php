<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'prefix',
        'code',
        'name',
        'icon'
    ];

     public function groups()
    {
        return $this->belongsToMany(Group::class, 'module_groups', 'module_id', 'group_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_modules', 'module_id', 'job_id');
    }
}
