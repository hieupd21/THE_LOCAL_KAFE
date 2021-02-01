<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select()->join('roles', 'users.role', '=', 'roles.role_id')
                               ->paginate(7);
        return view('admin.user.index', compact('users'));
    }

    public function show($id) {
        $user = User::select()->join('roles', 'users.role', '=', 'roles.role_id')
                              ->where('id', $id)
                              ->first();

        return view('admin.user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        $role = Role::all();

        return view('admin.user.edit', compact('user', 'role'));
    }

    public function update(UpdateUserRequest $request, $id) {
        $user = User::find($id);
        $image = request('image');

        if ($user->image == null) {
            $imagePath = request('image')->store('uploads', 'public');
            $user->name = $request->name;
            $user->image = $imagePath;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = $request->role;
        } else {
            if ($image) {
                $detinationPath = 'storage/' . $user->image;
                if (file_exists($detinationPath)) {
                    unlink($detinationPath);
                }
                $imagePath = request('image')->store('uploads', 'public');
                $user->name = $request->name;
                $user->image = $imagePath;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->role = $request->role;
            } else {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->role = $request->role;
            }
            $user->save();
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Update Data Successfully');
    }

    public function delete($id) {
        $user = User::find($id);
        $detinationPath = 'storage/' . $user->image;
        if (file_exists($detinationPath)) {
            unlink($detinationPath);
        }
        $user->delete();

        return redirect()->route('user.index')->with('delete', 'Delete Data Successfully');
    }
}
