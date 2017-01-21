<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clasesProfesor extends Model
{
    protected $fillable = [
        'id','dia','horario_id','profesor_id','materia_id','grado_id'
    ];
}
