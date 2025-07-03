<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historico
 * 
 * @property int $id_historico
 * @property int $rotas_id_rotas
 * @property int $pedido_id_pedido
 * 
 * @property Pedido $pedido
 * @property Rota $rota
 *
 * @package App\Models
 */
class Historico extends Model
{
	protected $table = 'historico';
	protected $primaryKey = 'id_historico';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_historico' => 'int',
		'rotas_id_rotas' => 'int',
		'pedido_id_pedido' => 'int'
	];

	protected $fillable = [
		'rotas_id_rotas',
		'pedido_id_pedido'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedido_id_pedido');
	}

	public function rota()
	{
		return $this->belongsTo(Rota::class, 'rotas_id_rotas');
	}
}
