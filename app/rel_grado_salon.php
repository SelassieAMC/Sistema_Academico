<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rel_grado_salon extends Model
{
    protected $fillable = [
        'id','grado_id','salon_id',
    ];
}
