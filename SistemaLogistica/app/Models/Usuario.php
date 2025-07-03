<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $nome_usuario
 * @property string $user
 * @property string $senha
 * @property string $tipo_usuario
 * @property string $cpf
 * @property string $status_funcionario
 * @property string $email
 * @property string|null $foto
 * 
 * @property Collection|Motoristum[] $motorista
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $fillable = [
		'nome_usuario',
		'user',
		'senha',
		'tipo_usuario',
		'cpf',
		'status_funcionario',
		'email',
		'foto'
	];

	public function motorista()
	{
		return $this->hasMany(Motoristum::class, 'id_Usuario');
	}
}
