<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Especialidad extends Model
{
    use HasFactory;


    protected $table = 'especialidades';
    protected $primaryKey = 'id';

    //fillable son los parametros que deben ser completados en masa
    protected $fillable = ['nombre'];

    //para que cree el created_at updated_at
    public $timestamps = true;



    protected $cast = [
        "nombre" => "string",
        "id" => "integer"
        /*
            'email_verified_at' => 'datetime',
            'is_active' => 'boolean',
            'settings' => 'array',
        */
    ];

    public function prestador() : BelongsTo
    {
        return $this->belongsTo(Prestador::class,'id_especialidad','id');
    }
}
