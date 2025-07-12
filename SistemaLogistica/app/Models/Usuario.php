<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true; 
    protected $fillable = [
        'nome_usuario',
        'user',
        'senha',
        'tipo_usuario',
        'cpf',
        'status_funcionario',
        'email',
        'foto',
    ];

    protected $hidden = [
        'senha',
    ];

    protected function casts(): array
    {
        return [
            'senha' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function motorista()
    {
        return $this->hasMany(Motoristum::class, 'id_Usuario');
    }
}
