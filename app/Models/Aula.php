<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\HasMany;

class Aula extends Model
{
    //
    protected $table = "aulas";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'capacidad'
    ];

    public function modalidadCursoAulas():HasMany{
        return $this->hasMany(ModalidadCursoAula::class);
    }
}
