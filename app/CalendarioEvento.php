<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarioEvento extends Model
{
    protected $table = 'calendario_eventos';
    protected $fillable = ['fechaIni','fechaFin','todoeldia','lugar','color','titulo'];
    protected $hidden = ['id'];

}
