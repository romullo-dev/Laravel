<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportacaoController extends Controller
{
    public function index()
    {
        return view('import.index'); // Sua view com o formulário de upload
    }

  public function store(Request $request)
{
    $request->validate([
        'xml' => 'required|file|mimes:xml',
    ]);

    $file = $request->file('xml');
    $path = $file->getRealPath();

    try {
        $xml = simplexml_load_file($path);
        $chaveAcesso = (string) $xml->protNFe->infProt->chNFe;
        $nomeEmitente = (string) $xml->NFe->infNFe->emit->xNome;



        // Aqui só pra ver a estrutura do XML que foi carregado
        dd($nomeEmitente);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'Erro ao ler XML: ' . $e->getMessage(),
        ], 500);
    }
}


}



