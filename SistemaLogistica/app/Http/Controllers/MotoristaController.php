<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotoristaRequest;
use App\Models\Motorista;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    public function index()
{
    $usuarios = Usuario::with('motorista')
        ->where('tipo_usuario', 'motorista')
        ->paginate(10); 

    $usuariosSelect = Usuario::where('tipo_usuario', 'motorista')->doesntHave('motorista')->get();


    return view('motorista.index', compact('usuarios', 'usuariosSelect'));
}


    public function store(MotoristaRequest $request)
    {
        try {
            Motorista::create($request->validated());
            return redirect()->route('motorista.index')->with('success', 'Motorista criado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar motorista.');
        }
    }

    public function road ()
    {

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
    public function destroy(string $id)
    {
        //
    }
}
