<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\NotaFiscal;
use App\Models\Produto;
use App\Models\Pedido;

class ImportarNotaFiscal extends Command
{
    protected $signature = 'importar:nota';
    protected $description = 'Importa nota fiscal a partir de um XML';

    public function handle()
    {
        $caminho = storage_path('app/importacao/nf.xml');

        if (!file_exists($caminho)) {
            $this->error('Arquivo XML não encontrado: ' . $caminho);
            return;
        }

        $xml = simplexml_load_file($caminho);

        DB::beginTransaction();

        try {
            // 👤 Cliente
            $cliente = Cliente::firstOrCreate([
                'documento' => (string) $xml->NFe->infNFe->dest->CNPJ,
            ], [
                'nome' => (string) $xml->NFe->infNFe->dest->xNome,
            ]);

            // 🏠 Endereço
            $endereco = Endereco::firstOrCreate([
                'cep'        => (string) $xml->NFe->infNFe->dest->enderDest->CEP,
                'endereco'   => (string) $xml->NFe->infNFe->dest->enderDest->xLgr,
                'casa'       => (string) $xml->NFe->infNFe->dest->enderDest->nro,
                'observacao' => (string) $xml->NFe->infNFe->dest->enderDest->xBairro 
            ]);


            // 🧾 Nota Fiscal
            $nota = NotaFiscal::create([
                'chave_acesso'        => (string) $xml->NFe->infNFe->infProt->chNFe,
                'numero_nfe'          => (int)    $xml->NFe->infNFe->ide->nNF,
                'serie'               => (string) $xml->NFe->infNFe->ide->serie,
                'emissao'             => (string) $xml->NFe->infNFe->ide->dhEmi,
                'valor_total'         => (float)  $xml->NFe->infNFe->total->ICMSTot->vNF,
                'peso'                => (float)  $xml->NFe->infNFe->transp->vol->pesoL ?? 0,
                'quantidade_volumes'  => (int)    $xml->NFe->infNFe->transp->vol->qVol ?? 1,
                'cliente_destinatario' => $cliente->id,
                'endereco_destinatario' => $endereco->id,
                'cliente_remetente' => $cliente->id,
                'endereco_remetente' => $endereco->id,

            ]);


            // 📦 Produtos
            foreach ($xml->NFe->infNFe->det as $item) {
                Produto::firstOrCreate([
                    'nome' => (string) $item->prod->xProd,
                ]);
            }

            // 📬 Pedido com regra do frete
            $pedido = Pedido::create([
                'codigo_rastreamento' => uniqid('PED'),
                'id_notaFiscal'       => $nota->id,
                'valor_frete'         => $nota->valor_total * 0.20,
            ]);


            DB::commit();
            $this->info('Importação concluída com sucesso! Pedido #' . $pedido->id);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Erro: ' . $e->getMessage());
        }
    }
}
