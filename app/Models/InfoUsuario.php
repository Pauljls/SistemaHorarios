<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InfoUsuario extends Model
{
    //
    protected $table = 'infousuarios';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'nombre2',
        'apellidoP',
        'apellidoM',
        'telefono',
        'direccion',
        'categoriadocente_id',
        'condicion_id'
    ];

    public function profesor(): HasOne{
        return $this->hasOne(Profesor::class,'infousuario_id');
    }
    public function categoriaDocente(): BelongsTo{
        return $this->belongsTo(CategoriaDocente::class,'categoriadocente_id');
    }
    public function condicion() : BelongsTo{
        return $this->belongsTo(Condicion::class,'condicion_id');
    }
}
