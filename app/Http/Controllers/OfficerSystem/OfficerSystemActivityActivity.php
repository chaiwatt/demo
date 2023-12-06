<?php

namespace App\Http\Controllers\OfficerSystem;

use App\Models\ActiviyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemActivityActivity extends Controller
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
        $activiyUsers = ActiviyUser::all();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'activiyUsers' => $activiyUsers
        ]);
    }

    public function view($id)
    {
        $action = 'show';
        $groupUrl = strval(session('groupUrl'));

        $roleGroupCollection = $this->updatedRoleGroupCollectionService->getUpdatedRoleGroupCollection($action);
        $updatedRoleGroupCollection = $roleGroupCollection['updatedRoleGroupCollection'];
        $permission = $roleGroupCollection['permission'];
        $viewName = $roleGroupCollection['viewName'];
        $activiyUser = ActiviyUser::find($id);

        return view('groups.officer-system.activity.activity.view', [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'activiyUser' => $activiyUser
        ]);
    }
}
