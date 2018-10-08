<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    protected $fillable = ['nombre','apellido','telefono','celular','mail','updated_at'];
}
