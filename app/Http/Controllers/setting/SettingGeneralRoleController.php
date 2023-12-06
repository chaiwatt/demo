<?php

namespace App\Http\Controllers\setting;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingGeneralRoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('setting.general.role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('setting.general.role.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validateFormData($request);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->name;

        $role = new Role();
        $role->name = $name;
        $role->save();

        return redirect()->route('setting.general.role')->with('message', 'นำเข้าข้อมูลเรียบร้อยแล้ว');
    }


    public function view($id)
    {
        $role = Role::findOrFail($id);
        return view('setting.general.role.view', [
            'role' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validateFormData($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::findOrFail($id);
        $role->update($validator->validated());

        return redirect()->route('setting.general.role')->with('success', 'อัปเดต Role เรียบร้อยแล้ว');
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->exists()) {
            return response()->json(['error' => 'Role นี้ถูกใช้งานอยู่ในปัจจุบันและไม่สามารถลบได้'], 422);
        }

        $role->delete();

        return response()->json(['message' => 'Role ได้ถูกลบออกเรียบร้อยแล้ว']);
    }

    public function validateFormData($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);
        return $validator;
    }

}
