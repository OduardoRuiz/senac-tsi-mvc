<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'telefone'
    ];

    protected $table = 'Funcionario';

    /**
     *   é possivel mudar a chave primaria assim
     * protected $primarykey = 'nome_da_pk';
     * 
     * caso nao queira auto_increment 
     * public $increment = false;
     *
     * para definir tipo 
     * protected $keyType =  'string';
     * 
     * 
     */
}
