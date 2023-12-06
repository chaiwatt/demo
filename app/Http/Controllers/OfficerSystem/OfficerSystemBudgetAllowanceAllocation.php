<?php

namespace App\Http\Controllers\OfficerSystem;

use App\Models\YearlyBudget;
use Illuminate\Http\Request;
use App\Models\ScholarshipCategory;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipPaymentDuration;
use App\Services\UpdatedRoleGroupCollectionService;
use App\Models\YearlyBudgetScholarshipCategoryAllocation;

class OfficerSystemBudgetAllowanceAllocation extends Controller
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
        $yearlyBudgetScholarshipCategoryAllocations = YearlyBudgetScholarshipCategoryAllocation::where('yearly_budget_id',$id)->get();
        $yearlyBudget = YearlyBudget::find($id);
        return view('groups.officer-system.budget.allowance.allocation.index', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'yearlyBudgetScholarshipCategoryAllocations' => $yearlyBudgetScholarshipCategoryAllocations,
            'yearlyBudget' => $yearlyBudget
        ]);
    }

    public function create($id)
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));
        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $yearlyBudget = YearlyBudget::find($id);
        return view('groups.officer-system.budget.allowance.allocation.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'yearlyBudget' => $yearlyBudget
        ]);
    }

    public function view($id)
    {

        $action = 'update';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $scholarshipCategories = ScholarshipCategory::all();
        $yearlyBudgetScholarshipCategoryAllocation = YearlyBudgetScholarshipCategoryAllocation::find($id);

        $scholarshipPaymentDurations = ScholarshipPaymentDuration::where('scholarship_category_id',$id)->get();
        return view('groups.officer-system.budget.allowance.allocation.view', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipCategories' => $scholarshipCategories,
            'yearlyBudgetScholarshipCategoryAllocation' => $yearlyBudgetScholarshipCategoryAllocation,
            'scholarshipPaymentDurations' => $scholarshipPaymentDurations
        ]);
    }
}
