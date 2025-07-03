<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function create (){
        return view("create");
    }

    public function store (Request $request)
    {
        try {
            User::create($request->all());

            return redirect()->route('user.create')->with('sucess', 'Usuario cadastradi com sucesso!');

            
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não cadastrado!'
            );
        }
    }
    
    public function read ()
    {
        $usuarios = User::all();
        return View('users',compact('usuarios'));
    }

    public function delete ($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('user-delete')->with('success','Usuario deletado com sucesso!');

            
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não cadastrado!'
            );
        }   
    }

    public function edit ($id)
    {
        $usuario = User::findOrFail($id); //pega todos os dados dos usuarios
        return view('edit',compact('usuario'));
    } 

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => "required|email|unique:users,email,{$id},id",
    ]);

    try {
        $usuario = User::findOrFail($id);
        $usuario->update($request->only(['name', 'email']));

        return redirect()->route('user-read')->with('success', 'Usuário atualizado com sucesso!');
    } catch (Exception $e) {
        return back()->withInput()->with(
            'error',
            'Usuário não alterado!'
        );
    }
}



}
