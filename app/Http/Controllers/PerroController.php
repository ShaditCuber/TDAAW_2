<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ListarPerroRequest, PerroRequest, InteraccionRequest,CandidatoRequest,ObtenerPreferenciasRequest};
use App\Repositories\PerroRepository;
use Illuminate\Http\Request;

class PerroController extends Controller
{
    //
    protected PerroRepository $perroRepository;

    public function __construct(PerroRepository $perroRepository)
    {
        $this->perroRepository = $perroRepository;
    }

    // Create Perro
    public function registrarPerro(PerroRequest $request)
    {
        return $this->perroRepository->registrarPerro($request);
    }

    // Read Perro
    public function listarPerros(ListarPerroRequest $request)
    {
        return $this->perroRepository->listarPerros($request);
    }


    // Update Perro
    public function actualizarPerro(PerroRequest $request)
    {
        return $this->perroRepository->actualizarPerro($request);
    }

    // Delete Perro
    public function eliminarPerro(PerroRequest $request)
    {
        return $this->perroRepository->eliminarPerro($request);
    }

    // Restaurar Perro
    public function restaurarPerro(PerroRequest $request)
    {
        return $this->perroRepository->restaurarPerro($request);
    }






    public function cargarPerro()
    {
        return $this->perroRepository->cargarPerros();
    }

    public function perroRandom(Request $request)
    {
        return $this->perroRepository->random($request);
    }

    public function perrosCandidatos(CandidatoRequest $request)
    {
        return $this->perroRepository->perrosCandidatos($request);
    }

    public function interaccion(InteraccionRequest $request)
    {
        return $this->perroRepository->interaccion($request);
    }

    public function aceptados(ObtenerPreferenciasRequest $request)
    {
        return $this->perroRepository->aceptados($request);
    }

    public function rechazados(ObtenerPreferenciasRequest $request)
    {
        return $this->perroRepository->rechazados($request);
    }


    public function login(Request $request)
    {
        return $this->perroRepository->login($request);
    }

    public function registro(Request $request)
    {
        return $this->perroRepository->registro($request);
    }
    
}
