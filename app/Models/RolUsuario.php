<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RolUsuario extends Model
{
    //
    protected $table = 'rolusuarios';
    public $timestamps = false;

    protected $fillable=[
        "id",
        "nombre"
    ];

    public function profesores():HasMany{
        return $this->hasMany(Profesor::class,'rolusuario_id');
    }
}
