<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\RoleGroupJson;

class ApiController extends Controller
{
    public function getUser()
    {
        $usersWithRoles = RoleUser::pluck('user_id');
        $users = User::whereNotIn('id', $usersWithRoles)->get();
        return response()->json($users);
    }
    
    public function getModuleJson(Request $request)
    {
        $roleId = $request->data['roleId'];
        $groupId = $request->data['groupId'];
        $rolegroupjson = RoleGroupJson::where('role_id', $roleId)
                ->where('group_id', $groupId)
                ->first()
                ->json;
        return response()->json($rolegroupjson);
    }

    public function getGroup()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

}
