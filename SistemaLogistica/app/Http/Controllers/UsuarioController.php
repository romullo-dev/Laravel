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

   public function update(Request $request, Usuario $usuario)
{
    $request->validate([
        'nome' => 'required|string|max:100',
        'email' => 'required|email|max:45',
        'status_funcionario' => 'required|in:Ativo,Inativo',
        'tipo_usuario' => 'required|in:admin,operador,motorista',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    try {
        $data = $request->only(['nome', 'email', 'status_funcionario', 'tipo_usuario']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nomeFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('fotos'), $nomeFoto);
            $data['foto'] = $nomeFoto;
        }

        $usuario->update($data);

        return redirect()->route('read-user')->with('success', 'Usuário atualizado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->route('read-user')->with('error', 'Erro ao atualizar o usuário: ' . $e->getMessage());
    }
}


    public function destroy($id_usuario)
    {
        try {
            $usuario = Usuario::findOrFail($id_usuario);
            $usuario->delete();
            return Redirect()->route('read-user')->with('success', 'Usuário deletado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with(
                'error',
                'Usuário não deletado'
            );
        }
    }
}
