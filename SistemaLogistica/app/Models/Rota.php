<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rota
 * 
 * @property int $id_rotas
 * @property int $id_veiculo
 * @property int $id_motorista
 * @property string $tipo
 * @property float $distancia
 * @property Carbon $previsao
 * @property string $data_rota
 * @property Carbon $data_criacao
 * @property string $status
 * @property string|null $observacoes
 * @property int|null $id_origem
 * @property int|null $id_destino
 * 
 * @property Motoristum $motoristum
 * @property Veiculo $veiculo
 * @property CentroDistribuicao|null $centro_distribuicao
 * @property Collection|Historico[] $historicos
 *
 * @package App\Models
 */
class Rota extends Model
{
	protected $table = 'rotas';
	public $timestamps = false;

	protected $casts = [
		'id_veiculo' => 'int',
		'id_motorista' => 'int',
		'distancia' => 'float',
		'previsao' => 'datetime',
		'data_criacao' => 'datetime',
		'id_origem' => 'int',
		'id_destino' => 'int'
	];

	protected $fillable = [
		'tipo',
		'distancia',
		'previsao',
		'data_rota',
		'data_criacao',
		'status',
		'observacoes',
		'id_origem',
		'id_destino'
	];

	public function motoristum()
	{
		return $this->belongsTo(Motoristum::class, 'id_motorista');
	}

	public function veiculo()
	{
		return $this->belongsTo(Veiculo::class, 'id_veiculo');
	}

	public function centro_distribuicao()
	{
		return $this->belongsTo(CentroDistribuicao::class, 'id_origem');
	}

	public function historicos()
	{
		return $this->hasMany(Historico::class, 'rotas_id_rotas');
	}
}
