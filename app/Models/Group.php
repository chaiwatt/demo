<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'icon',
        'dashboard'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'group_roles', 'group_id', 'role_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_groups', 'group_id', 'module_id');
    }
}
