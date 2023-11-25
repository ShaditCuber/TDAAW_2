<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

Route::prefix('tinder')->controller(PerroController::class)->group(function () {
    Route::get('/random', 'perroRandom');
    Route::get('/candidatos', 'perrosCandidatos');
    Route::get('/listar', 'listarPerros');
    Route::post('/interaccion', 'interaccion');
    Route::get('/aceptados', 'aceptados');
    Route::get('/rechazados', 'rechazados');
});



Route::prefix('perro')->controller(PerroController::class)->group(function () {
    Route::post('/registrar', 'registrarPerro');
    Route::post('/actualizar', 'actualizarPerro');
    Route::get('/listar', 'listarPerros');
    Route::delete('/eliminar', 'eliminarPerro');
    Route::post('/restaurar', 'restaurarPerro');
});


