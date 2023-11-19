<?php

namespace App\Repositories;

use App\Jobs\CargaPerrosJob;
use App\Models\Perro;
use App\Models\Interaccion;
use App\Services\PerroService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PerroRepository
{
    public function registrarPerro($request)
    {
        try {

            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->save();
            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function actualizarPerro($request)
    {
        try {
            $perro = Perro::find($request->id);
            $perro->nombre = $request->nombre;
            $perro->save();
            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ]);

            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarPerro($request)
    {
        try {

           if(isset($request->limit)){
            $perro = Perro::with([])
           ->orderBy()
           ->take($request->limit)
           ->get();
           }else{
            $perro = Perro::with([])
           ->orderBy()
           ->get();
            }

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ]);

            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function eliminarPerro($request)
    {
        try {
            $perro = Perro::find($request->id);
            $perro->delete();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ]);

            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function cargarPerro()
    {
        try {
            for ($i = 1; $i <= 9; $i++) {

             CargaPerrosJob::dispatch($i);
            }

            return response()->json(["ok"], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ]);

            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }



    public function random(){
        try {
           $perro= Perro::(); // corregir para random
             return response()->json(["perro"=> $perro], Response::HTTP_OK);
         } catch (Exception $e) {
             Log::info([
                 "error" => $e->getMessage(),
                 "linea" => $e->getLine(),
                 "file" => $e->getFile(),
                 "metodo" => __METHOD__
             ]);

             return response()->json([
                 "error" => $e->getMessage(),
                 "linea" => $e->getLine(),
                 "file" => $e->getFile(),
                 "metodo" => __METHOD__
             ], Response::HTTP_BAD_REQUEST);
         }
    }

}
