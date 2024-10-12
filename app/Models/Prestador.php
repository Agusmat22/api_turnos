<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prestador extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "email",
        "id_especialidad"
    ];
    protected $table = 'prestadores';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $cast = [
        "id_especialidad" => "integer"
    ];

    public function especialidad(): HasOne
    {
        return $this->hasOne(Especialidad::class,'id','id_especialidad');
    }
}
