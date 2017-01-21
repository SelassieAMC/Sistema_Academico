<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $fillable = [
       'id','Nota1','porcent1','Nota2','porcent2','Nota3','porcent3','Nota4','porcent4','Nota5','porcent5','Bimestre1','Bimestre2','Bimestre3','Bimestre4','Definitiva','Nota_materia','Nota_profesor','Nota_estudiante',
   ];

   /**
    * Un usuario estudiante tiene muchas notas
    */
   public function user() {
       return $this->belongsTo('App\User', 'user_id');
   }
}
