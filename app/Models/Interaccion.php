<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Interaccion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'interacciones';

    public function perroInteresado()
    {
        return $this->belongsTo(Perro::class, 'perro_interesado_id');
    }

    public function perroCandidato()
    {
        return $this->belongsTo(Perro::class, 'perro_candidato_id');
    }

    
}
