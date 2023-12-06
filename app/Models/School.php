<?php

namespace App\Models;

use App\Models\SchoolAllocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function scholarShipStudents()
    {
        return $this->hasMany(ScholarshipStudent::class, 'school_id');
    }

    public function schoolAllocations()
    {
        return $this->hasMany(SchoolAllocation::class, 'school_id');
    }
}
