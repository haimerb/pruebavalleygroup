<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Profesion - Modelo
 */
class Profesion extends Model
{
    protected $fillable = ['nombre_profesion', 
                           'descripcion'];
}
