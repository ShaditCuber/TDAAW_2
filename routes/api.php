<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;
use App\Http\Controllers\AuthController;


Route::middleware('jwt.verify')->group(function () {

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
    
    Route::prefix('user')->controller(AuthController::class)->group(function () {
        Route::get('/info', 'user');
        Route::post('/actualizar', 'actualizarUsuario');
    });

});


// rutas para login y registro
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/registro', 'signUp');
    Route::post('/logout', 'logout');
});

// ruta para obtener al usuario logueado con el controlador AuthController
// Route::controller(AuthController::class)->group(function () {
//     Route::get('/user', 'user');
// });




