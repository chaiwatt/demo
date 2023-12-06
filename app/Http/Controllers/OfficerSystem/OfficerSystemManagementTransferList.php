<?php

namespace App\Http\Controllers\OfficerSystem;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ScholarshipCategory;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipPaymentTransaction;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemManagementTransferList extends Controller
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
        $currentMonth = Carbon::today()->month;
        $scholarshipPaymentTransactions = ScholarshipPaymentTransaction::where('month_id', '<=', $currentMonth)
            ->where('status',2)
            ->orderBy('month_id', 'desc')
            ->paginate(12);

        $scholarshipCategories = ScholarshipCategory::all();
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransactions' => $scholarshipPaymentTransactions,
            'scholarshipCategories' => $scholarshipCategories
        ]);
    }
}
