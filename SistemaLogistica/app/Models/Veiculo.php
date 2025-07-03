<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Veiculo
 * 
 * @property int $id_Veiculo
 * @property string $Placa
 * @property Carbon $Ano
 * @property string $cor
 * @property string $status_veiculo
 * @property string $observacoes
 * @property int $modelo_Veiculo
 * 
 * @property ModeloVeiculo $modelo_veiculo
 * @property Collection|Rota[] $rotas
 *
 * @package App\Models
 */
class Veiculo extends Model
{
	protected $table = 'veiculo';
	public $timestamps = false;

	protected $casts = [
		'Ano' => 'datetime',
		'modelo_Veiculo' => 'int'
	];

	protected $fillable = [
		'Placa',
		'Ano',
		'cor',
		'status_veiculo',
		'observacoes'
	];

	public function modelo_veiculo()
	{
		return $this->belongsTo(ModeloVeiculo::class, 'modelo_Veiculo');
	}

	public function rotas()
	{
		return $this->hasMany(Rota::class, 'id_veiculo');
	}
}
