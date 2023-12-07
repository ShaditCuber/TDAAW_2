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

    // Create Perro
    public function registrarPerro($request)
    {
        try {

            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->url_foto = $request->url_foto;
            $perro->descripcion = $request->descripcion;
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

    // Read Perro
    public function listarPerros($request)
    {
        try {

            if (isset($request->limit)) {
                $perro = Perro::with([])
                    ->orderBy('created_at', 'desc')
                    ->take($request->limit)
                    ->get();
            }elseif (isset($request->id)) {
                $perro = Perro::find($request->id);
            }elseif (isset($request->nombre)) {
                $perro = Perro::where('nombre', 'like', '%'.$request->nombre.'%')->get();
            }else{
                $perro = Perro::with([])
                    ->orderBy('created_at', 'desc')
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


    // Update Perro
    public function actualizarPerro($request)
    {   
        if (!isset($request->id)) {
            return response()->json(["msg" => "No proporciono id de perro"], Response::HTTP_BAD_REQUEST);
        }
        try {
            $perro = Perro::find($request->id);
            if (isset($request->nombre)) {
                $perro->nombre = $request->nombre;
            }
            if (isset($request->url_foto)) {
                $perro->url_foto = $request->url_foto;
            }
            if (isset($request->descripcion)) {
                $perro->descripcion = $request->descripcion;
            }
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

    

    public function eliminarPerro($request)
    {   
        if (!isset($request->id)) {
            return response()->json(["msg" => "No proporciono id de perro"], Response::HTTP_BAD_REQUEST);
        }
        try {
            $perro = Perro::find($request->id);
            if (!$perro) {
                return response()->json(["msg" => "No existe perro con ese id"], Response::HTTP_BAD_REQUEST);
            }
            $perro->delete();
            return response()->json(["msg" => 'Perro borrado exitosamente'], Response::HTTP_OK);
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

    public function cargarPerros()
    {
        try {
            for ($i = 1; $i <= 9; $i++) {
                //$this->perroRandom;
                CargaPerrosJob::dispatch();
            }
            //CargaPerrosJob::dispatch();

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
    
    // chema::create('perros', function (Blueprint $table) {
    //         $table->uuid('id')->primary();
    //         $table->string('nombre')->nullable();
    //         $table->string('url_foto')->nullable();
    //         $table->text('descripcion')->nullable();
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });
    // obtener perro random


    
    public function random($request)
    {
        try {
            Log::info(["request" => $request->user()]);
            $perrosConUser = User::pluck('perro_id');
            $perro = Perro::whereNotIn('id', $perrosConUser)
                            ->inRandomOrder()
                            ->first(['url_foto', 'nombre','descripcion','id']);
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

    public function perrosCandidatos($request)
    {   
        $user = $request->user();
        $id_perro = $user->perro_id;
        try {
            $idsInteraccion = Interaccion::where('perro_interesado_id', $id_perro)
                                        ->pluck('perro_candidato_id');
            
            $candidato = Perro::where('id', '!=', $id_perro)
                            ->whereNotIn('id', $idsInteraccion)
                            ->inRandomOrder()
                            ->first(['url_foto', 'nombre','descripcion','id']);

            Log::info("Perro del usuario: $id_perro");
            Log::info("IDs excluidos: ", $idsInteraccion->toArray());
            Log::info("Perro candidato: $candidato");

            if ($candidato) {
                return response()->json(["candidato" => $candidato], Response::HTTP_OK);
            } else {
                return response()->json(["mensaje" => "No hay mas candidatos disponibles"], Response::HTTP_OK);
            }

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


    public function interaccion($request)
    {   
        $user = $request->user();
        $id_perro = $user->perro_id;
        try {
            $interaccionExistente = Interaccion::where('perro_interesado_id', $id_perro)
                                            ->where('perro_candidato_id', $request->perro_candidato_id)
                                            ->exists();

            if ($interaccionExistente) {
                return response()->json(["msg" => "Ya existe una interacción entre estos perros"], Response::HTTP_BAD_REQUEST);
            }

            if ($request->perro_interesado_id == $request->perro_candidato_id) {
                return response()->json(["msg" => "No puedes interactuar con el mismo perro"], Response::HTTP_BAD_REQUEST);
            }

            $interaccion = new Interaccion();
            $interaccion->perro_interesado_id = $id_perro;
            $interaccion->perro_candidato_id = $request->perro_candidato_id;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();

            $match = Interaccion::where('perro_interesado_id', $request->perro_candidato_id)
                                ->where('perro_candidato_id', $id_perro)
                                ->where('preferencia', 'aceptado')
                                ->exists();


            if ($match) {
                return response()->json(["msg" => "¡Hay match!"], Response::HTTP_OK);
            } else {
                return response()->json(["msg" => "Ok"], Response::HTTP_OK);
            }
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



    public function aceptados($request)
    {
        try {
            $aceptados = Interaccion::where('perro_interesado_id', $request->id)
                ->where('preferencia', 'aceptado')
                ->get(['perro_candidato_id']);
            $aceptados = Perro::whereIn('id', $aceptados)->get(['id', 'nombre','url_foto','descripcion'])->sortByDesc('created_at');
            // devolver en orden de fecha de interaccion
            
            return response()->json(["aceptados" => $aceptados], Response::HTTP_OK);
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

    public function rechazados($request)
    {
        try {
            $rechazados = Interaccion::where('perro_interesado_id', $request->id)
                ->where('preferencia', 'rechazado')
                ->get(['perro_candidato_id']);
            $rechazados = Perro::whereIn('id', $rechazados)->get(['id', 'nombre','url_foto','descripcion'])->sortByDesc('created_at');
            return response()->json(["rechazados" => $rechazados], Response::HTTP_OK);
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

    public function restaurarPerro($request){
        
        if (!isset($request->id)) {
            return response()->json(["msg" => "No proporciono id de perro"], Response::HTTP_BAD_REQUEST);
        }

        try {
            $perro = Perro::withTrashed()->find($request->id);
            if (!$perro) {
                return response()->json(["msg" => "No existe perro con ese id"], Response::HTTP_BAD_REQUEST);
            }
            $perro->restore();
            return response()->json(["msg" => 'Perro restaurado exitosamente'], Response::HTTP_OK);
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
