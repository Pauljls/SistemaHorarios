<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Condicion extends Model
{
    //

    protected $table = 'condiciones';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre'
    ];

    public function InfoUsuario() : HasMany{
        return $this->hasMany(InfoUsuario::class);
    }

}
