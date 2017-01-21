<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rel_materia_profesor extends Model
{
    protected $fillable = [
        'id','materia_id','profesor_id','curso_id',
    ];
}
