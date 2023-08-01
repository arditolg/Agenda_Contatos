<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'cep', 'estado', 'cidade', 'bairro', 'endereco', 'numero',
        'nome_de_contato', 'email_de_contato', 'telefone_de_contato',
    ];
}
