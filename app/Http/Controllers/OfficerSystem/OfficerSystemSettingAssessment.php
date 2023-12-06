<?php

namespace App\Http\Controllers\OfficerSystem;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemSettingAssessment extends Controller
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
        $assessments = Assessment::all();

      
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'assessments' => $assessments 
        ]);
    }

     public function create()
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];

        return view('groups.officer-system.setting.assessment.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
        ]);
    }
}
