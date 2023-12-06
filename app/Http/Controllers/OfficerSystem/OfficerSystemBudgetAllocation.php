<?php

namespace App\Http\Controllers\OfficerSystem;

use App\Models\School;
use App\Models\YearlyBudget;
use Illuminate\Http\Request;
use App\Models\SchoolAllocation;
use App\Http\Controllers\Controller;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemBudgetAllocation extends Controller
{
    private $updatedRoleGroupCollectionService;

    public function __construct(UpdatedRoleGroupCollectionService $updatedRoleGroupCollectionService) 
    {
        $this->updatedRoleGroupCollectionService = $updatedRoleGroupCollectionService;

    }

    public function index()
    {
        $id = 1;
        $action = 'show';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $viewName = $roleGroupCollection['viewName'];
        $schools = School::all();
        $yearlyBudget = YearlyBudget::find($id);
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'yearlyBudget' => $yearlyBudget,
            'schools' => $schools
        ]);
    }
}
