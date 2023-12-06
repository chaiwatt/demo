<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleGroupJson extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'group_id',
        'json'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
