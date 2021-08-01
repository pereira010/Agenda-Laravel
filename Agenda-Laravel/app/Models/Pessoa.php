<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'pessoa';

    protected $fillable = [
        'nome',
        'sobre_nome',
        'telefone',
        'cpf',
        'apelido',
        'data_nascimento',
        'id_user'
    ];
}
