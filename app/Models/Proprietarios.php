<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proprietarios extends Model
{
    protected $fillable = [
        'nome', 'email', 'cpf', 'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'uf', 'complemento'
    ];
}