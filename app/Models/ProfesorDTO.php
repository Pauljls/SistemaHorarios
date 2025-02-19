<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesorDTO extends Model
{
    //
    protected $fillable = [
        "nombres",
        "apellidos",
        "email",
        "contraseña",
        "telefono",
        "direccion",
        "categoriaDocente",
        "condicion"
    ];
}
