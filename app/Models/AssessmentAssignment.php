<?php

namespace App\Models;

use App\Models\Assessment;
use App\Models\AssessmentItem;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssessmentAssignmentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssessmentAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'assessment_id',
        'assessment_item_id',
    ];
    
    // ความสัมพันธ์กับ Assessment
    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    // ความสัมพันธ์กับ AssessmentItem
    public function assessmentItem()
    {
        return $this->belongsTo(AssessmentItem::class, 'assessment_item_id');
    }

    // ความสัมพันธ์กับ AssessmentAssignmentUser
    public function assessmentAssignmentUsers()
    {
        return $this->hasMany(AssessmentAssignmentUser::class, 'assessment_assignment_id');
    }

    public function assessmentItems($assessmentId)
    {
        return AssessmentAssignment::where('assessment_id',$assessmentId)->get();
    }
}
