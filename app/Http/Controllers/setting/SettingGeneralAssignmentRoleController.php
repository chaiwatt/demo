<?php

namespace App\Http\Controllers\setting;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingGeneralAssignmentRoleController extends Controller
{
    public function store(Request $request)
    {
        $userIds = $request->data['selectedUserIds'];
        $roleId = $request->data['roleId'];
        $role = Role::find($roleId);

        foreach ($userIds as $userId) {
            $currentUser = User::find($userId);
            $currentUser->roles()->detach($role);
            $user = User::find($userId);
            $user->roles()->attach($role);
        }

        return response()->json(['message' => 'มอบหมายบทบาทสำเร็จ']);
    }

    public function delete($roleId, $userId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        $user->roles()->detach($role);

        return redirect()->back();
    }
}
