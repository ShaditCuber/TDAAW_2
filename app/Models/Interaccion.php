<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Interaccion extends Model
{
    use HasFactory;

    protected $table = 'interacciones';

    public function perroInteresado()
    {
        return $this->belongsTo(Perro::class, 'perro_interesado_id');
    }

    public function perroCandidato()
    {
        return $this->belongsTo(Perro::class, 'perro_candidato_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Asigna un UUID al campo 'id' antes de crear un nuevo modelo
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    
}
