<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','type','name','last_name','rol','telefono','email','direccion', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * un estudiante solo puede tener un registro de matricula
     */
    public function estudiante() {
        return $this->hasOne('App\Estudiante');
    }

    /**
     * un profesor es director de un grado
     */
    public function grado() {
        return $this->hasOne('App\Grado');
    }

    /**
     * Un usuario admin tiene muchas publicaciones
     */
    public function publicaciones() {
        return $this->hasMany('App\Publicacion');
    }

    //Funcion Scope de busqueda
    public function scopeBusqueda($query,$dato=""){

        $resultado=DB::select(DB::raw("select * from users where id::text like '%$dato%' 
                        or UPPER(name) like UPPER('%$dato%')
                        or UPPER(last_name) like UPPER('%$dato%')
                        or UPPER(rol) like UPPER('%$dato%')
                        or UPPER(email) like UPPER('%$dato%')"));

            /*$resultado= $query->where('id'::VARCHAR,'like','%'.$dato.'%')
                              ->orWhere('name','like','%'.$dato.'%')
                              ->orWhere('last_name','like', '%'.$dato.'%')
                              ->orWhere('rol','like', '%'.$dato.'%')
                              ->orWhere('email','like', '%'.$dato.'%');*/
             
        return  $resultado;
    }
}
