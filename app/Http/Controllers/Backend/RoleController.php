<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('backend.layouts.roles.index');
    }
    public function create()
    {
        return view('backend.layouts.roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        try {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            flash()->success('Role created successfully');
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back();
        }
    }
}
