<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaDocente extends Model
{
    //
    protected $table = 'categoriadocentes';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre',
        'horas'
    ];

    public function infoUsuarios() : HasMany{
        return $this->hasMany(InfoUsuario::class);
    }

}
