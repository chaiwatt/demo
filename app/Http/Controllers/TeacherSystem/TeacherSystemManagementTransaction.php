<?php

namespace App\Http\Controllers\TeacherSystem;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ScholarshipStudent;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipPaymentTransaction;
use App\Services\UpdatedRoleGroupCollectionService;

class TeacherSystemManagementTransaction extends Controller
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
        $userIds = ScholarshipStudent::where('school_id',1)->pluck('user_id')->toArray();
        $scholarshipPaymentTransactions = ScholarshipPaymentTransaction::where('month_id', '<=', $currentMonth)
            ->whereIn('user_id',$userIds)
            ->orderBy('month_id', 'desc')
            ->paginate(12);

        
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransactions' => $scholarshipPaymentTransactions
        ]);
    }

}
