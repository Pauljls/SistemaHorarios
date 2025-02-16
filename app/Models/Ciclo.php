<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\HasMany;

class Ciclo extends Model
{
    //
    protected $table = "ciclos";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function cicloperiodos():HasMany{
        return $this->hasMany(CicloPeriodo::class);
    }

}
