<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'id','name','director_id',
    ];

    /**
     * Trae los estudiantes de un curso
     */
    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }

    /**
     * Trae el director de grado
     */

    public function director(){
        return $this->belongsTo('App\Director','director_id');
    }


}
