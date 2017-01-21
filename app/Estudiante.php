<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'id','user_id','estado','grado_id','acudiente','email_acu'
    ]; 
    
    /**
     *Un registro de matricula solo pertenece a un estudiante
     */
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    /**
     *Un estudiante solo puede estar en un grado
     */

    public function grado(){
        return $this->belongsTo('App\Grado','grado_id');
    }


}
