<?php

namespace App\Http\Controllers\Web\Backend\Authorization;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('backend.layouts.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        return view('backend.layouts.users.create', [
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->assignRole($request->roles);

        $user->save();
        flash()->success('User created successfully');
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.layouts.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'roles' => 'required'
        ]);
        try {
            $user = User::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $user->syncRoles($request->roles);

            flash()->success('User updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash()->success('User deleted successfully');
        return redirect()->back();
    }
}
