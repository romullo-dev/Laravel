<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ImportacaoController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'arquivo' => 'required|file|mimes:xml|max:2048',
        ]);

        try {
            $arquivo = $request->file('arquivo');
            $caminho = $arquivo->storeAs('temp_importacoes', $arquivo->getClientOriginalName());

            Artisan::call('importar:nota-fiscal', [
                'caminho' => storage_path('app/' . $caminho)
            ]);

            return redirect()->back()->with('success', 'Arquivo XML importado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao importar o XML.' . $e);
        }
    }
}
