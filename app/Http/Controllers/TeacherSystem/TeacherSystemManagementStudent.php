<?php

namespace App\Http\Controllers\TeacherSystem;

use Illuminate\Http\Request;
use App\Models\ScholarshipStudent;
use App\Http\Controllers\Controller;
use App\Services\UpdatedRoleGroupCollectionService;

class TeacherSystemManagementStudent extends Controller
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
        $userIds = ScholarshipStudent::where('school_id',1)->pluck('user_id')->toArray();
        $scholarshipStudents = ScholarshipStudent::whereIn('user_id',$userIds)->get();
        
        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipStudents' => $scholarshipStudents
        ]);
    }
}
