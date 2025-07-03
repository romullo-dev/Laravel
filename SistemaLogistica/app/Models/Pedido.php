<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id_pedido
 * @property string $numero
 * @property string $nota
 * @property string $chave_nota
 * @property Carbon $data
 * @property string $codigo_rastreamento
 * @property string $status_pedido
 * @property string|null $nota_fiscal
 * @property int $id_remetente
 * @property int $remetente_id_endereco
 * @property int $id_destinatario
 * @property int $destinatario_id_endereco
 * 
 * @property Cliente $cliente
 * @property Endereco $endereco
 * @property Collection|Historico[] $historicos
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	public $timestamps = false;

	protected $casts = [
		'data' => 'datetime',
		'id_remetente' => 'int',
		'remetente_id_endereco' => 'int',
		'id_destinatario' => 'int',
		'destinatario_id_endereco' => 'int'
	];

	protected $fillable = [
		'numero',
		'nota',
		'chave_nota',
		'data',
		'codigo_rastreamento',
		'status_pedido',
		'nota_fiscal'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_destinatario');
	}

	public function endereco()
	{
		return $this->belongsTo(Endereco::class, 'destinatario_id_endereco');
	}

	public function historicos()
	{
		return $this->hasMany(Historico::class, 'pedido_id_pedido');
	}
}
