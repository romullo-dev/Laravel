<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        try {
            User::create($request->all());



            return redirect()->route('user.create')->with('success', 'Usuario cadastrado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não cadastrado!'
            );
        }
    }

    public function read()
    {
        $usuarios = User::orderByDesc('id')->paginate(5);
        return View('user.users', ['usuarios' => $usuarios]);
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('user-delete')->with('success', 'Usuario deletado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não cadastrado!'
            );
        }
    }

      public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        return redirect()->route('user-read')->with('success', 'Usuário atualizado com sucesso!');
    }
}
