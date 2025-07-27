<?php

namespace App\Http\Controllers;

use App\Models\ModeloVeiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view ('veiculo.veiculo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ModeloVeiculo $modeloVeiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModeloVeiculo $modeloVeiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModeloVeiculo $modeloVeiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModeloVeiculo $modeloVeiculo)
    {
        //
    }
}
