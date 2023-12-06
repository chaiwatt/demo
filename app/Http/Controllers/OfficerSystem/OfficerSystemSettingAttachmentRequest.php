<?php

namespace App\Http\Controllers\OfficerSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipAttachment;
use App\Services\UpdatedRoleGroupCollectionService;

class OfficerSystemSettingAttachmentRequest extends Controller
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
        $scholarshipAttachments = ScholarshipAttachment::all();

        return view($viewName, [
            'groupUrl' => $groupUrl,
            'modules' => $updatedRoleGroupCollection,
            'permission' => $permission,
            'scholarshipAttachments' => $scholarshipAttachments
        ]);
    }
}
