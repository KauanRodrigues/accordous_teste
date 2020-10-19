<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    protected $fillable = [
        'fk_imovel', 'nome', 'email', 'documento', 'cpf_cnpj'
    ];
}