<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "apellido",
        "email",
        "telefono"
    ];

    protected $table = 'pacientes';
    protected $primaryKey = 'id';
    
    public $timestamps = true;
}
