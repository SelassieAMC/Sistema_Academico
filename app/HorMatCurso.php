<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorMatCurso extends Model
{
    protected $fillable = [
        'id','dia','horario_id','materia_id','curso_id',
    ];
}
