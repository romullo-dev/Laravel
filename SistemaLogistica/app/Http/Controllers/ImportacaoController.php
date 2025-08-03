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
        'xml' => 'required|file|mimes:xml', 
        'pdf' => 'required|file|mimes:pdf',
    ]);

    try {
        $xmlFile = $request->file('xml');
        $pdfFile = $request->file('pdf');

        $xmlPath = $xmlFile->storeAs('temp_importacoes', $xmlFile->getClientOriginalName());
        $pdfPath = $pdfFile->storeAs('temp_importacoes', $pdfFile->getClientOriginalName());

        Artisan::call('importar:nota-fiscal', [
            'caminho' => storage_path('app/' . $xmlPath),
        ]);

        return redirect()->back()->with('success', 'Arquivo XML importado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erro ao importar o XML: ' . $e->getMessage());
    }
}

}
