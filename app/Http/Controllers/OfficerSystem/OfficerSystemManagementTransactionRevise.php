<?php

namespace App\Http\Controllers\OfficerSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipPaymentTransactionRevise;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemManagementTransactionRevise extends Controller
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
        $scholarshipPaymentTransaction = ScholarshipPaymentTransaction::find($id);
        $scholarshipPaymentTransactionRevises = ScholarshipPaymentTransactionRevise::where('scholarship_payment_transaction_id',$id)->get();
        return view('groups.officer-system.management.transaction.revise.index', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransactionRevises' => $scholarshipPaymentTransactionRevises,
            'scholarshipPaymentTransaction' => $scholarshipPaymentTransaction
        ]);
    }

    public function create($id)
    {
        
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $scholarshipPaymentTransaction = ScholarshipPaymentTransaction::find($id);
        return view('groups.officer-system.management.transaction.revise.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransaction' => $scholarshipPaymentTransaction
        ]);
    }
}
