<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Endereco
 * 
 * @property int $id_endereco
 * @property string $cep
 * @property string $endereco
 * @property string $casa
 * @property string $observacao
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Endereco extends Model
{
	protected $table = 'endereco';
	protected $primaryKey = 'id_endereco';
	public $timestamps = false;

	protected $fillable = [
		'cep',
		'endereco',
		'casa',
		'observacao'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'destinatario_id_endereco');
	}
}
