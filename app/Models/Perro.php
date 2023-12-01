<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Perro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perros';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public function interacciones()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Asigna un UUID al campo 'id' antes de crear un nuevo modelo
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
