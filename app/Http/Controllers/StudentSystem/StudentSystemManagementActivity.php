<?php

namespace App\Http\Controllers\StudentSystem;

use Carbon\Carbon;
use App\Models\Activity;
use App\Models\ActiviyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UpdatedRoleGroupCollectionService;

class StudentSystemManagementActivity extends Controller
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
        $activiyUsers = ActiviyUser::where('user_id',$user->id)->get();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'activiyUsers' => $activiyUsers,
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $action = 'create';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $activiyUsers = ActiviyUser::where('user_id',$user->id)->get();
        $activities = Activity::all();

        return view('groups.student-system.management.activity.create', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'activiyUsers' => $activiyUsers,
            'user' => $user,
            'activities' => $activities
        ]);
    }
}
