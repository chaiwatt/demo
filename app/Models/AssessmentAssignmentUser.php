<?php

namespace App\Models;

use App\Models\User;
use App\Models\AssessmentAssignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssessmentAssignmentUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'assessment_assignment_id',
        'user_id',
        'status',
        'note'
    ];

    // ความสัมพันธ์กับ AssessmentAssignment
    public function assessmentAssignment()
    {
        return $this->belongsTo(AssessmentAssignment::class, 'assessment_assignment_id');
    }

    // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
