<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// TO DO: REQUESTS
use App\Http\Requests\{ListarPerroRequest, PerroRequest};
use App\Repositories\InteraccionRepository;

class InteraccionController extends Controller
{
    //
    protected InteraccionRepository $interaccionRepository;

    public function __construct(InteraccionRepository $interaccionRepository)
    {
        $this->interaccionRepository = $interaccionRepository;
    }

    public function preferencia(InteraccionRequest $request)
    {
        return $this->interaccionRepository->preferencia($request);
    }
    
    public function preferencias(InteraccionRequest $request)
    {
        return $this->interaccionRepository->preferencias($request);
    }
}
