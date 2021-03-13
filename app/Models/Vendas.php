<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cliente_id',
        'funcionario_id',
        'data_da_venda',
        'valor'
    ];

    protected $table = 'Vendas';
}
