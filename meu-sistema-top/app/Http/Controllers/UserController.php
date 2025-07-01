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

}
