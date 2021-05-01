<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Clientes extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'nascimento'
    ];

    protected $table = 'Clientes';

    public function vendas()
    {

        return $this->hasMany(Vendas::class, 'cliente_id');
    }
}
