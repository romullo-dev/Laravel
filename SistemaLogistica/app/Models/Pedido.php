<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'codigo_rastreamento',
        'id_notaFiscal',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function notaFiscal()
    {
        return $this->belongsTo(NotaFiscal::class, 'id_notaFiscal');
    }
}

