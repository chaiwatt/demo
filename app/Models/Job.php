<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'route',
        'view'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function group_module_job()
    {
        return $this->hasOne(GroupModuleJob::class);
    }
}
