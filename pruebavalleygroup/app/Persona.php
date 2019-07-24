<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['nombre_completo', 
                           'edad', 
                           'profesion_id','barrio_id'];
}
