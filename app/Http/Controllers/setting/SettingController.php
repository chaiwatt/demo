<?php

namespace App\Http\Controllers\setting;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('setting.index', [
            'roles' => $roles,
            'users' => $users
        ]);
    }
}
