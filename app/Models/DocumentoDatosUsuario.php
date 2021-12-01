<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoDatosUsuario extends Model
{
    use HasFactory;

    protected $table = 'documentos_datos_usuarios';
    protected $fillable = [
        'nombre_apellidos',
        'dni',
        'codigo_colaborador',
        'puesto_colaborador',
        'area_colaborador',
        'fecha_recepcion',
        'firma'
    ];

}
