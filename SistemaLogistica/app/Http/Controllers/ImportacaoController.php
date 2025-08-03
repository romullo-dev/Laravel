<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\NotaFiscal;
use App\Models\Produto;
use App\Models\Pedido;

class ImportacaoController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store()
    {
        $caminho = storage_path('app/importacao/nf.xml');

        if (!file_exists($caminho)) {
            return response()->json(['error' => 'Arquivo XML não encontrado.'], 404);
        }

        $xml = simplexml_load_file($caminho);

        DB::beginTransaction();

        try {
            // Cliente destinatário
            $cliente = Cliente::firstOrCreate([
                'documento' => (string) $xml->NFe->infNFe->dest->CNPJ,
            ], [
                'nome' => (string) $xml->NFe->infNFe->dest->xNome,
            ]);

            // Endereço destinatário
            $endereco = Endereco::firstOrCreate([
                'cep'      => (string) $xml->NFe->infNFe->dest->enderDest->CEP,
                'endereco' => (string) $xml->NFe->infNFe->dest->enderDest->xLgr,
                'casa'     => (string) $xml->NFe->infNFe->dest->enderDest->nro,
                'bairro'   => (string) $xml->NFe->infNFe->dest->enderDest->xBairro,
                'cidade'   => (string) $xml->NFe->infNFe->dest->enderDest->xMun,
                'uf'       => (string) $xml->NFe->infNFe->dest->enderDest->UF,
            ]);

            // Nota Fiscal
            $nota = NotaFiscal::create([
                'chave_acesso'          => (string) $xml->protNFe->infProt->chNFe,
                'numero_nfe'            => (int) $xml->NFe->infNFe->ide->nNF,
                'serie'                 => (string) $xml->NFe->infNFe->ide->serie,
                'emissao'               => (string) $xml->NFe->infNFe->ide->dhEmi,
                'valor_total'           => (float) $xml->NFe->infNFe->total->ICMSTot->vNF,
                'peso'                  => (float) ($xml->NFe->infNFe->transp->vol->pesoL ?? 0),
                'quantidade_volumes'    => (int) ($xml->NFe->infNFe->transp->vol->qVol ?? 1),
                'cliente_destinatario'  => $cliente->id,
                'endereco_destinatario' => $endereco->id,
                // Se tiver remetente diferente, aqui daria pra ajustar, por hora deixo igual ao destinatário
                'cliente_remetente'     => $cliente->id,
                'endereco_remetente'    => $endereco->id,
            ]);

            // Produtos
            foreach ($xml->NFe->infNFe->det as $item) {
                Produto::firstOrCreate([
                    'nome' => (string) $item->prod->xProd,
                ]);
            }

            // Pedido com regra de frete de 20%
            $pedido = Pedido::create([
                'codigo_rastreamento' => '1',
                'id_notaFiscal'       => $nota->id,
                'valor_frete'         => $nota->valor_total * 0.20,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Importação concluída com sucesso!',
                'pedido_id' => $pedido->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
