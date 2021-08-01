<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventosConvidados extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eventos_convidado';

    protected $fillable = [
        'id_evento',
        'id_user',
        'id_realizador',
        'estado',
        'justificativa'
    ];
}
