<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
  protected $fillable = [
     'id','user_id','nombre','pathImagen',
 ];

 /**
  * Un usuario admin tiene muchas fotos
  */
 public function user() {
     return $this->belongsTo('App\User', 'user_id');
 }
}
