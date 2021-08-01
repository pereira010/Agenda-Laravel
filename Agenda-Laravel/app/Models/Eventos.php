<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eventos';

    protected $fillable = [
        'nome',
        'descricao',
        'hora_evento',
        'id_endereco',
        'id_user'
    ];


    public function getHoraEventoAttribute ($value) 
    {
        if(isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
        }

        return false;
    }
}
