<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ListarPerroRequest, PerroRequest};
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

    public function registrarPerro(PerroRequest $request)
    {
        return $this->perroRepository->registrarPerro($request);
    }

    public function actualizarPerro(PerroRequest $request)
    {
        return $this->perroRepository->actualizarPerro($request);
    }

    public function listarPerros(Request $request)
    {
        return $this->perroRepository->listarPerros($request);
    }

    public function eliminarPerro(ListarPerroRequest $request)
    {
        return $this->perroRepository->eliminarPerro($request);
    }

    public function cargarPerro()
    {
        return $this->perroRepository->cargarPerros();
    }

    public function perroRandom(Request $request)
    {
        return $this->perroRepository->random($request);
    }

    public function perrosCandidatos(Request $request)
    {
        return $this->perroRepository->perrosCandidatos($request);
    }
}
