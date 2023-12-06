<?php

namespace App\Http\Controllers\StudentSystem;

use Carbon\Carbon;
use App\Models\Month;
use Illuminate\Http\Request;
use App\Models\ScholarshipCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ScholarshipAttachment;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipPaymentTransactionDetail;
use App\Models\ScholarshipPaymentTransactionRevise;
use App\Services\UpdatedRoleGroupCollectionService;
use App\Models\ScholarshipPaymentTransactionAttachment;

class StudentSystemManagementTransaction extends Controller
{
    private $updatedRoleGroupCollectionService;

    public function __construct(UpdatedRoleGroupCollectionService $updatedRoleGroupCollectionService) 
    {
        $this->updatedRoleGroupCollectionService = $updatedRoleGroupCollectionService;

    }
    public function index()
    {
        $user = Auth::user();
        $action = 'show';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $viewName = $roleGroupCollection['viewName'];
        $currentMonth = Carbon::today()->month;
        $scholarshipPaymentTransactions = ScholarshipPaymentTransaction::where('month_id', '<=', $currentMonth)
            ->where('user_id',$user->id)
            ->orderBy('month_id', 'desc')
            ->paginate(12);

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransactions' => $scholarshipPaymentTransactions,
            'user' => $user
        ]);
    }

    public function create()
    {
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $months = Month::all();
        $scholarshipCategories = ScholarshipCategory::all();
        $scholarshipAttachments = ScholarshipAttachment::all();
        
        return view('groups.student-system.management.transaction.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'months' => $months,
            'scholarshipCategories' => $scholarshipCategories,
            'scholarshipAttachments' => $scholarshipAttachments
        ]);
    }

    public function view($id)
    {
        $user = Auth::user();
        $action = 'update';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $scholarshipPaymentTransaction = ScholarshipPaymentTransaction::find($id);
        $scholarshipPaymentTransactionDetail = ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',$id)->first();
        //scholarship_payment_transaction_id
        $scholarshipPaymentTransactionRevises = ScholarshipPaymentTransactionRevise::where('scholarship_payment_transaction_id',$id)->get();
        return view('groups.student-system.management.transaction.view', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipPaymentTransaction' => $scholarshipPaymentTransaction,
            'scholarshipPaymentTransactionDetail' => $scholarshipPaymentTransactionDetail,
            'scholarshipPaymentTransactionRevises' => $scholarshipPaymentTransactionRevises
        ]);
    }
}
