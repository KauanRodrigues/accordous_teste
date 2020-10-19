<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    protected $fillable = [
      'fk_proprietario', 'quartos', 'salas', 'andares', 'banheiros', 'cozinhas', 'garagem', 
      'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'uf', 'complemento'
    ];
}