<?php

namespace App\Http\Resources;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EspecialidadResource extends JsonResource
{
    
    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre
        ];
    }
}
