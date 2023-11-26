<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;
use App\Http\Controllers\AuthController;

Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::post('/login', ['login']);
    Route::post('/signup', ['signUp']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/perrosAll', [PerroController::class, 'listarPerros']);
    Route::get('/random', [PerroController::class, 'perroRandom']);
});

Route::group(['prefix' => 'perro', 'controller' => PerroController::class], function () {
    Route::post('registrarPerro', ['registrarPokemon']);
    Route::post('actualizarPerro', ['actualizarPokemon']);
    Route::get('listarPerro', ['listarPokemones']);
    Route::get('perrosAll', ['listarPokemones']);
    Route::get('eliminarPerro', ['EliminarPokemon']);
    Route::get('cargarPerros', ['CargarPokemon']);
    Route::get('/random', 'perroRandom');
    Route::get('/candidatos', 'perrosCandidatos');
});

Route::group(['prefix' => 'interaccion', 'controller' => InteraccionController::class], function () {
    Route::post('/preferencia', ['preferencia'])->name('preferencia');
    Route::get('/preferencias', ['preferencias'])->name('preferencias');
});
