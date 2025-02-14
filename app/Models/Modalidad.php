<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\HasMany;

class Modalidad extends Model
{
    //
    protected $table = 'modalidades';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];
    
    public function modalidadesCursoAulas() : HasMany{
        return $this->hasMany(ModalidadCursoAula::class);
    }
}
