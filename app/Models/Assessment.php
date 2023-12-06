<?php

namespace App\Models;

use App\Models\AssessmentAssignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // ความสัมพันธ์กับ AssessmentAssignment
    public function assessmentAssignments()
    {
        return $this->hasMany(AssessmentAssignment::class, 'assessment_id');
    }
}
