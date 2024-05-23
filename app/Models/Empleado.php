<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'puesto',
        'departamento_id', 
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
