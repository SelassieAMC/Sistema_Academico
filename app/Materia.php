<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'id','nombre','intensidadHor','descripcion',
    ];

    
}
