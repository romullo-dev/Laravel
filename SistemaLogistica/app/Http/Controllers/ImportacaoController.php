<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Frete;
use App\Models\NotaFiscal;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ImportacaoController extends Controller
{
    public function index()
    {
        return view('import.index'); // Sua view com o formulário de upload
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'xml' => 'required|file|mimes:xml',
            ]);

            $xml = simplexml_load_file($request->file('xml')->getRealPath());
            $namespaces = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('nfe', $namespaces['']);
            $infNFe = $xml->xpath('//nfe:infNFe')[0] ?? null;
            $ide = $infNFe->ide ?? null;

            if (!$ide) {
                return redirect()->route('importacao.index')->with('error', 'Erro: tag <ide> não encontrada no XML.');
            }

            // Converter data do formato ISO 8601 para datetime do MySQL
            $emissaoBruta = (string) $ide->dhEmi;
            $emissaoFormatada = date('Y-m-d H:i:s', strtotime($emissaoBruta));

            $emitente = $infNFe->emit;
            $clienteEmitente = Cliente::firstOrCreate(
                ['documento' => (string) $emitente->CNPJ],
                ['nome' => (string) $emitente->xNome, 'tipo' => 'emitente']
            );

            $enderecoEmitente = Endereco::firstOrCreate(
                ['cep' => (string) $emitente->enderEmit->CEP],
                [
                    'endereco' => (string) $emitente->enderEmit->xLgr,
                    'casa' => (string) $emitente->enderEmit->nro,
                    'observacao' => (string) ($emitente->enderEmit->xCpl ?? '')
                ]
            );

            $dest = $infNFe->dest;
            $clienteDestinatario = Cliente::firstOrCreate(
                ['documento' => (string) $dest->CNPJ],
                ['nome' => (string) $dest->xNome, 'tipo' => 'destinatário']
            );

            $enderecoDestinatario = Endereco::firstOrCreate(
                ['cep' => (string) $dest->enderDest->CEP],
                [
                    'endereco' => (string) $dest->enderDest->xLgr,
                    'casa' => (string) $dest->enderDest->nro,
                    'observacao' => (string) ($dest->enderDest->xCpl ?? '')
                ]
            );

            $notaFiscal = NotaFiscal::create([
                'chave_acesso' => (string) $xml->protNFe->infProt->chNFe,
                'numero_nfe' => (int) $ide->nNF,
                'serie' => (int) $ide->serie,
                'emissao' => $emissaoFormatada,
                'valor_total' => (float) $infNFe->total->ICMSTot->vNF,
                'peso' => (float) $infNFe->transp->vol->pesoB,
                'quantidade_volumes' => (int) $infNFe->transp->vol->qVol,
                'cliente_remetente' => $clienteEmitente->id_cliente,
                'cliente_destinatario' => $clienteDestinatario->id_cliente,
                'endereco_remetente' => $enderecoEmitente->id_endereco,
                'endereco_destinatario' => $enderecoDestinatario->id_endereco
            ]);

            $pedido = Pedido::create([
                'codigo_rastreamento' => uniqid('rast_'),
                'id_notaFiscal' => $notaFiscal->id_notaFiscal,
            ]);


            
            Frete::create([
                'id_pedido' => $pedido->id_pedido,
            ]);

            return redirect()->back()->with('success', 'Arquivo XML importado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('importacao.index')->with('error', 'Erro ao importar: ' . $e->getMessage());
        }
    }
}
