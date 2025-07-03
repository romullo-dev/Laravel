<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id_cliente
 * @property string $nome
 * @property string $documento
 * @property string|null $tipo
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'id_cliente';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'documento',
		'tipo'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_destinatario');
	}
}
