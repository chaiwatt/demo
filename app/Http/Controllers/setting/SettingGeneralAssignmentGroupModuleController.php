<?php

namespace App\Http\Controllers\setting;

use App\Models\Job;
use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\RoleGroupJson;
use App\Models\GroupModuleJob;
use App\Http\Controllers\Controller;

class SettingGeneralAssignmentGroupModuleController extends Controller
{
    public function view($id)
    {
        $role = Role::findOrFail($id);
        $groups = RoleGroupJson::where('role_id', $id)->get();
        return view('setting.general.assignment.group-module.view', [
            'groups' => $groups,
            'role' => $role
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data.selectedGroupIds' => 'required|array',
            'data.selectedGroupIds.*' => 'exists:groups,id',
            'data.roleId' => 'required|exists:roles,id',
        ]);

        $groupIds = $request->data['selectedGroupIds'];
        $roleId = $request->data['roleId'];

        foreach ($groupIds as $groupId) {
            $roleGroupJson = RoleGroupJson::where('group_id', $groupId)->where('role_id', $roleId)
                            ->first();
            if (!$roleGroupJson) {
                $jsonData = [];
                $data = GroupModuleJob::where('group_id', $groupId)->get();
                foreach ($data as $row) {
                    $module_obj = Module::find($row->module_id);
                    $job_obj = Job::find($row->job_id);

                    $module = [
                        "module_id" => $module_obj->id,
                        "module_name" => $module_obj->name,
                        "enable" => true,
                        "jobs" => []
                    ];

                    $existingModule = array_filter($jsonData, function ($item) use ($module) {
                        return $item['module_id'] === $module['module_id'];
                    });

                    if (count($existingModule) > 0) {
                        $existingModuleIndex = key($existingModule);
                        $jsonData[$existingModuleIndex]['jobs'][] = [
                            "job_id" => $job_obj->id,
                            "job_name" => $job_obj->name,
                            "permissions" => [
                                "show" => $row->show == 1 ? true : false,
                                "create" => $row->create == 1 ? true : false,
                                "update" => $row->update == 1 ? true : false,
                                "delete" => $row->delete == 1 ? true : false
                            ]
                        ];
                    } else {
                        $module['jobs'][] = [
                            "job_id" => $job_obj->id,
                            "job_name" => $job_obj->name,
                            "permissions" => [
                                "show" => $row->show == 1 ? true : false,
                                "create" => $row->create == 1 ? true : false,
                                "update" => $row->update == 1 ? true : false,
                                "delete" => $row->delete == 1 ? true : false
                            ]
                        ];
                        $jsonData[] = $module;
                    }
                }
                $jsonString = json_encode($jsonData);
                RoleGroupJson::create([
                    'role_id' => $roleId,
                    'group_id' => $groupId,
                    'json' => $jsonString,
                ]);
            }
        }
        return response()->json(['message' => 'กลุ่มถูกกำหนดให้กับบทบาทเรียบร้อยแล้ว']);
    }

    public function delete($roleId, $groupId)
    {
        RoleGroupJson::where('role_id', $roleId)->where('group_id', $groupId)->delete();
        return response()->json(['message' => 'กลุ่มถูกลบออกจากบทบาทเรียบร้อยแล้ว']);
    }

    public function updateModuleJson(Request $request)
    {
        $jsonData = $request->data['updatedValues'];
        $roleId = $request->data['roleId'];
        $groupId = $request->data['groupId'];
        $roleGroupJson = RoleGroupJson::where('role_id', $roleId)->where('group_id', $groupId)->first();
        $roleGroupJson->json = $jsonData;
        $roleGroupJson->save();
        return response()->json(['message' => $roleGroupJson->json]);
    }
}
