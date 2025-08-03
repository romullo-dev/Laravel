<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';
    protected $primaryKey = 'id_endereco';

    protected $fillable = [
        'cep',
        'endereco',
        'casa',
        'observacao'
    ];

    public $timestamps = false;

    public function notasRemetente()
    {
        return $this->hasMany(NotaFiscal::class, 'endereco_remetente');
    }

    public function notasDestinatario()
    {
        return $this->hasMany(NotaFiscal::class, 'endereco_destinatario');
    }
}

