<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perros';

    public function interacciones()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }
}
