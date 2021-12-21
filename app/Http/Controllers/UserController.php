<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.users.index', compact('users'));
    }

    public function create()
    {
        return view('back.users.create');
    }

    public function store(UserCreateRequest $request)
    {
        // Las validaciones se realizan en app/Http/Request/UserCreateRequest.php
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario ingresado exitosamente.');
    }

    public function show(User $user) // Model Binding
    {
        // $user = User::findOrFail($id);
        return view('back.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
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
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }
}
