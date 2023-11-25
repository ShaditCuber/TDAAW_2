<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

// Route Groups - Controllers
Route::prefix('tinder')->controller(PerroController::class)->group(function () {
    Route::get('/random', 'perroRandom');
    Route::get('/candidatos', 'perrosCandidatos');
    Route::get('/listar', 'listarPerros');
    Route::post('/interaccion', 'interaccion');
    Route::get('/aceptados', 'aceptados');
    Route::get('/rechazados', 'rechazados');
});

// Route::prefix('interaccion')->controller(InteraccionController::class)->group(function () {
//     Route::post('/preferencia', 'preferencia');
//     Route::get('/preferencias', 'preferencias');
// });

// ruta de crud

Route::prefix('perro')->controller(PerroController::class)->group(function () {
    Route::post('/registrar', 'registrarPerro');
    Route::post('/actualizar', 'actualizarPerro');
    Route::get('/listar', 'listarPerros');
    Route::delete('/eliminar', 'eliminarPerro');
    Route::get('/cargar', 'cargarPerro');
});


