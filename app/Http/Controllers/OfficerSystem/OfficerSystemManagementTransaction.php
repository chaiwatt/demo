<?php

namespace App\Http\Controllers\OfficerSystem;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipPaymentTransactionDetail;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemManagementTransaction extends Controller
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
            ->orderBy('month_id', 'desc')
            ->paginate(12);

        
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransactions' => $scholarshipPaymentTransactions
        ]);
    }

    public function view($id)
    {

        $action = 'update';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $scholarshipPaymentTransaction = ScholarshipPaymentTransaction::find($id);
        $scholarshipPaymentTransactionDetail = ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',$id)->first();

        return view('groups.officer-system.management.transaction.view', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransaction' => $scholarshipPaymentTransaction,
            'scholarshipPaymentTransactionDetail' => $scholarshipPaymentTransactionDetail
        ]);
    }
}
