<?php

namespace App\Http\Controllers\OfficerSystem;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\AssessmentItem;
use App\Http\Controllers\Controller;
use App\Models\AssessmentAssignment;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemSettingAssessmentAssignment extends Controller
{
    private $updatedRoleGroupCollectionService;


    public function __construct(UpdatedRoleGroupCollectionService $updatedRoleGroupCollectionService) 
    {
        $this->updatedRoleGroupCollectionService = $updatedRoleGroupCollectionService;

    }

    public function index($id)
    {
        $action = 'show';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $assessment = Assessment::find($id);
        $assessmentAssignments = AssessmentAssignment::where('assessment_id',$id)->get();

        return view('groups.officer-system.setting.assessment.assignment.index', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessment' => $assessment,
            'assessmentAssignments' => $assessmentAssignments
        ]);
    }

    public function create($id)
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $assessment = Assessment::find($id);
        $assessmentItems = AssessmentItem::all();

        return view('groups.officer-system.setting.assessment.assignment.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessment' => $assessment,
            'assessmentItems' => $assessmentItems
        ]);
    }
}
