<?php

namespace App\Http\Controllers\OfficerSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipCategoryEducationFloor;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemSettingPaymentCondition extends Controller
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
        $scholarshipCategoryEducationFloors = ScholarshipCategoryEducationFloor::all();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipCategoryEducationFloors' => $scholarshipCategoryEducationFloors
        ]);
    }

    public function view($id)
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $scholarshipCategoryEducationFloor = ScholarshipCategoryEducationFloor::find($id);

        return view('groups.officer-system.setting.payment-condition.view', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipCategoryEducationFloor' => $scholarshipCategoryEducationFloor,
        ]);
    }
}
