<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuadros extends Model
{
    use HasFactory;

    protected $collection = 'cuadros';

    protected $fillable = [
        'id',
        'titulo',
        'autor',
        'description',
        'anio_creacion',
        'cod_museo',
        'cod_registro',
        'costo',
        'status',
        'accion',
        'tiempo_respuesta',
        'created_at',
        'updated_at'
    ];
}
