<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestadorRequest;
use App\Models\Prestador;
use Exception;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    
    public function index()
    {
        try {

            $prestadores = Prestador::all();

            return Response([
                "success" => true,
                "data" => $prestadores
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }


    
    public function store(PrestadorRequest $request)
    {
        try {

            $prestador = Prestador::create($request->all());

            return Response([
                "success" => true,
                "data" => $prestador
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

            $prestador = Prestador::findOrFail($id);

            return Response([
                "success" => true,
                "data" => $prestador
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }

    public function update(PrestadorRequest $request, int $id)
    {
        try {

            $prestador = Prestador::findOrFail($id);
            $result = $prestador->update($request->all());

            return Response([
                "success" => $result,
                "data" => $prestador
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

            $prestador = Prestador::findOrFail($id);
            $prestador->deleteOrFail();

            return Response([
                "success" => true,
                "data" => $prestador
            ],200,["Content-Type" =>"application/json"]);

        } catch (Exception $e) {
            
            return Response([
                "success" => false,
                "message" => $e->getMessage()
            ],500,["Content-Type" =>"application/json"]);
        }
    }
}
