<?php

namespace App\Http\Controllers;

use App\Models\CentroDistribuicao;
use App\Models\Historico;
use App\Models\Motorista;
use App\Models\Pedido;
use App\Models\Rota;
use App\Models\Veiculo;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rota =  Rota::with(['pedidos', 'motorista.usuario', 'veiculo', 'origem', 'destino', 'historicos'])->get();
        return View('rotas.index', compact('rota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centros = CentroDistribuicao::where('status', 'Ativo')->get();
        $motoristas = Motorista::with('usuario')->get();
        $veiculos = Veiculo::where('status_veiculo', 'Ativo')->get();

        $pedido = Pedido::all();

        return View('rotas.create', compact('centros', 'pedido', 'motoristas', 'veiculos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'id_origem' => 'required|integer',
            'id_destino' => 'required|integer',
            'distancia' => 'required|numeric',
            'previsao' => 'required|date',
            'data_inicio' => 'required|date',
            'id_motorista' => 'required|integer',
            'id_veiculo' => 'required|integer',
            'observacoes' => 'nullable|string',
            'pedido_id_pedido' => 'nullable|integer',
            'ultimo_status' => 'required|string',
        ]);

        $rota = new Rota();
        $rota->tipo = $request->tipo;
        $rota->id_origem = $request->id_origem;
        $rota->id_destino = $request->id_destino;
        $rota->distancia = $request->distancia;
        $rota->previsao = $request->previsao;
        $rota->data_rota = $request->data_inicio;
        $rota->data_inicio = $request->data_inicio;
        $rota->data_criacao = now();
        $rota->id_motorista = $request->id_motorista;
        $rota->id_veiculo = $request->id_veiculo;
        $rota->observacoes = $request->observacoes ?? '';
        $rota->ultimo_status = $request->ultimo_status ?? '';

        $rota->save();


        if ($request->filled('pedido_id_pedido')) {
            Historico::create([
                'rotas_id_rotas' => $rota->id_rotas,
                'pedido_id_pedido' => $request->pedido_id_pedido,
                'data' => $request->data_inicio,
                'status' => 'Aguardando liberação',
                'foto' => '',
            ]);
        }

        return redirect()->route('rotas.index')->with('success', 'Rota cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rota $rotas)
    {
        $data = $rotas;
        return view('rotas.show', [
            'data' => $data,
            'mapboxToken' => env('MAPBOX_ACCESS_TOKEN')
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rota $rota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rota $rota)
    {
        //
    }
}
