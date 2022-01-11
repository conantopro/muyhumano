<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('back.users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
        // Las validaciones se realizan en app/Http/Request/UserCreateRequest.php
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario ingresado exitosamente.');
    }

    public function show(User $user) // Model Binding
    {
        // $user = User::findOrFail($id);
        $user->load('roles');
        return view('back.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('back.users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        // Las validaciones se realizan en app/Http/Request/UserEditRequest.php
        // $user = User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password = $request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id) {
            return redirect()->route('users');
        }
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }
}
