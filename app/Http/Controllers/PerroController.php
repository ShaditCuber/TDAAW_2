<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ListarPerroRequest,PerroRequest };
use App\Repositories\PerroRepository;
use Illuminate\Http\Request;

class PerroController extends Controller
{
    //
    protected PerroRepository $perroRepository;

    public function __construct(PerroRepository $perroRepository){
        $this->perroRepository = $perroRepository;
    }

    public function registrarPerro(PerroRequest $request){
        return $this->perroRepository->registrarPerro($request);
    }

    public function actualizarPerro(PerroRequest $request){
        return $this->perroRepository->actualizarPerro($request);
    }

    public function listarPerro(PerroRequest $request){
        return $this->perroRepository->listarPerro($request);
    }

    public function EliminarPerro(ListarPerroRequest $request){
        return $this->perroRepository->eliminarPerro($request);
    }

    public function CargarPerro(){
        return $this->perroRepository->cargarPerro();
    }

    public function perroRandom(){
        return $this->perroRepository->random();
    }

    public function registrarInteracción(Request $request){
        return $this->perroRepository->registrarInteraccion($request);
    }
}
