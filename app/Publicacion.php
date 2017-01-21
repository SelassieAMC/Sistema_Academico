<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
     protected $fillable = [
        'id','user_id','titulo','pathImagen','pathPDF','descripcion','seccion',
    ];

    /**
     * Un usuario admin tiene muchas publicaciones
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
