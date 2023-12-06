<?php

namespace App\Http\Controllers\OfficerSystem;

use Carbon\Carbon;
use App\Models\YearlyBudget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemBudgetAllowance extends Controller
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
        $yearlyBudgets = YearlyBudget::get();
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'yearlyBudgets' => $yearlyBudgets
        ]);
    }

    public function create()
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];

        return view('groups.officer-system.budget.allowance.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
        ]);
    }

}
