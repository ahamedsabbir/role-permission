<?php

namespace App\Http\Controllers\Web\Backend\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('backend.layouts.roles.index', [
            'roles' => Role::all()
        ]);
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

    public function edit($id)
    {
        return view('backend.layouts.roles.edit', [
            'role' => Role::find($id),
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        try {
            $role = Role::find($id);
            $role->update(['name' => $request->name]);
            //must pass name not id
            $role->syncPermissions($request->permissions);
            flash()->success('Role updated successfully');
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        return view('backend.layouts.roles.edit', [
            'role' => Role::find($id),
            'permissions' => Permission::all()
        ]);
    }
    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            $role->delete();
            flash()->success('Role deleted successfully');
            return redirect()->back();
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back();
        }
    }
}
