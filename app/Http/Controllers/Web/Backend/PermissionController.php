<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('backend.layouts.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }
    public function create()
    {
        return view('backend.layouts.permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        try{
            $permission = new Permission();
            $permission->name = $request->name;

            $permission->save();

            flash()->success('Permission created successfully');
            return redirect()->route('permissions.index');
        }catch (\Exception $e){
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('backend.layouts.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$id,
        ]);
        try{
            $permission = Permission::find($id);
            $permission->name = $request->name;
            $permission->save();
            flash()->success('Permission updated successfully');
            return redirect()->back();
        }catch (\Exception $e){
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function show($id)
    {
        $permission = Permission::find($id);
        return view('backend.layouts.permissions.edit', [
            'permission' => $permission
        ]);
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if($permission->users->count() > 0){
            flash()->error('Permission is not empty');
            return redirect()->back();
        }
        $permission->delete();
        flash()->success('Permission deleted successfully');
        return redirect()->route('permissions.index');
    }
}
