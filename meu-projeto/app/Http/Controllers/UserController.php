<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PHPUnit\Framework\ExceptionWrapper;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect()->route('user.create')->with(
                'success',
                'Usuário cadastrado com sucesso!'
            );
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não cadastrado!'
            );
        }
    }
}
