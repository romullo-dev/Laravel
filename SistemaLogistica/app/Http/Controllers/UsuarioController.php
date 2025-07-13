<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Doctrine\DBAL\Schema\View;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    public function store(UsuarioRequest $request)
    {
        try {
            $data = $request->only([
                'nome',
                'user',
                'tipo_usuario',
                'cpf',
                'status_funcionario',
                'email'
            ]);

            $data['password'] = Hash::make($request->password);

            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('usuarios', 'public');
            }

            Usuario::create($data);

            return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário.');
        }
    }

    public function read()
    {
        $usuarios = Usuario::orderBy('created_at', 'desc')->paginate(7);

        return view('User.user', compact('usuarios'));
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_usuario) 
    {
        try {
            $usuario = Usuario::findOrFail($id_usuario);
            $usuario->delete();
            return Redirect()->route('read-user')->with('success','Usuário deletado com sucesso!' );
           
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não deletado'
            );
        }
    }
}
