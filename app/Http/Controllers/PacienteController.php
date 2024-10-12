<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    
    public function index()
    {
        try {

            $pacientes = Paciente::all();

            return Response([
                "success" => true,
                "data" => $pacientes
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }


    
    public function store(PacienteRequest $request)
    {
        try {

            $pacientes = Paciente::create($request->all());

            return Response([
                "success" => true,
                "data" => $pacientes
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }

    
    public function show(int $id)
    {
        try {

            $paciente = Paciente::findOrFail($id);

            return Response([
                "success" => true,
                "data" => $paciente
            ],200,["Content-Type" =>"application/json"]);

        } catch (ModelNotFoundException $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }


    
    public function update(PacienteRequest $request, int $id)
    {
        try {

            $paciente = Paciente::findOrFail($id);
            $paciente->update($request->all());

            return Response([
                "success" => true,
                "data" => $paciente
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }

    
    public function destroy(int $id)
    {
        try {

            $paciente = Paciente::findOrFail($id);
            $paciente->deleteOrFail();

            return Response([
                "success" => true,
                "data" => $paciente
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }
}
