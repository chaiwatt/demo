<?php

namespace App\Http\Controllers\OfficerSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssessmentAssignmentUser;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemAssessmentAssessment extends Controller
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
        $assessmentAssignmentUsers = AssessmentAssignmentUser::all();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessmentAssignmentUsers' => $assessmentAssignmentUsers,
        ]);
    }

    
    public function evaluate($id)
    {
        $action = 'update';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $viewName = $roleGroupCollection['viewName'];
        $assessmentAssignmentUser = AssessmentAssignmentUser::find($id);
        $assessment = $assessmentAssignmentUser->assessmentAssignment;

        // $assessmentAssignmentUser = $assessmentAssignmentUser->assessmentAssignment->assessmentItems($assessment->id);

        return view('groups.officer-system.assessment.assessment.evaluate', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessmentAssignmentUser' => $assessmentAssignmentUser,
            'assessment' => $assessment,
        ]);
    }
}
