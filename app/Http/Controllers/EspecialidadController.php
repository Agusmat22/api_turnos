<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialidadRequest;
use App\Http\Resources\EspecialidadResource;
use App\Models\Especialidad;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EspecialidadController extends Controller
{
    
    public function index()
    {

        try {

            $especialidades = Especialidad::all();

            return Response([
                "success" => true,
                "data" => $especialidades
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }

        
    }
    public function store(EspecialidadRequest $request): Response
    {

        try {
            $especialidad = Especialidad::create([
                "nombre" => $request->nombre
            ]);

            return Response([
                "success" => true,
                'data' => new EspecialidadResource($especialidad)
            ],200,["Content-Type"=>"application/json"]);

        } catch (Exception $e) {
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
        
    }  
    public function show(int $id): Response
    {
        
        try {
            $especialidad = Especialidad::findOrFail($id);

            return Response([
                "success" => true,
                "data" => new EspecialidadResource($especialidad)
            ],200,['Content-Type' => 'application/json']);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Response([
                "success" => false,
                'message' => $e->getMessage()
            ],500,['Content-Type' => "application/json"]);
        }

    }  
    public function update(EspecialidadRequest $request, int $id)
    {
        try {
            
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->nombre = $request->nombre;

            $especialidad->update();

            return Response([
                "success" => true,
                "data" => new EspecialidadResource($especialidad)
            ],200,['Content-Type'=>'application/json']);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Response([
                "success" => false,
                "data" => $e->getMessage()
            ],404,['Content-Type'=>'application/json']);
        }
    }  
    public function destroy(int $id)
    {
        try {
            $especialidad = Especialidad::findOrFail($id);

            $especialidad->deleteOrFail();

            return Response([
                'success' => true,
                'data' => new EspecialidadResource($especialidad)
            ],200,['Content-Type'=>'application/json']);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Response([
                "success" => false,
                "data" => $e->getMessage()
            ],404,['Content-Type'=>'application/json']);
        }
    }
}
