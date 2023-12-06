<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_roles', 'role_id', 'group_id');
    }

    public function role_group_jsons()
    {
        return $this->hasMany(RoleGroupJson::class);
    }
}
