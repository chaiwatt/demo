<?php

namespace App\Http\Controllers\TeacherSystem;

use App\Models\User;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\ScholarshipStudent;
use App\Http\Controllers\Controller;
use App\Models\AssessmentAssignmentUser;
use App\Services\UpdatedRoleGroupCollectionService;

class TeacherSystemManagementAssessment extends Controller
{
    private $updatedRoleGroupCollectionService;

    public function __construct(UpdatedRoleGroupCollectionService $updatedRoleGroupCollectionService) 
    {
        $this->updatedRoleGroupCollectionService = $updatedRoleGroupCollectionService;

    }

    public function index()
    {
        $action = 'show';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $viewName = $roleGroupCollection['viewName'];
        $userIds = ScholarshipStudent::where('school_id',1)->pluck('user_id')->toArray();
        $assessmentAssignmentUsers = AssessmentAssignmentUser::whereIn('user_id',$userIds)->get();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessmentAssignmentUsers' => $assessmentAssignmentUsers,
        ]);
    }

    public function create()
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $userIds = ScholarshipStudent::where('school_id',1)->pluck('id')->toArray();
        $users = User::whereIn('id',$userIds)->get();
        
        $assessments = Assessment::all();

        return view('groups.teacher-system.management.assessment.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'users' => $users,
            'assessments' => $assessments,
        ]);
    }
}
