<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario ingresado exitosamente.');
    }

    public function show(User $user) // Model Binding
    {
        // $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $user = User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password = $request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password) == '')
        // {
        //     $data = $request->except('password');
        // }
        // else
        // {
        //     $data = $request->all();
        //     $data['password'] = bcrypt($request->password);
        // }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }
}
