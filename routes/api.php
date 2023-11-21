<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rutas de autenticación
// Route::group(['prefix' => 'auth'], function () {
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('signup', [AuthController::class, 'signUp']);
// });

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::get('logout', [AuthController::class, 'logout']);
//     Route::get('user', [AuthController::class, 'user']);
// });

// Route::group(['prefix' => 'poke'], function () {

//     Route::post('registrarPerro', [PerroController::class, 'registrarPerro']);
//     Route::post('actualizarPerro', [PerroController::class, 'actualizarPerro']);
//     Route::get('listarPerros', [PerroController::class, 'listarPerros']);
//     Route::get('eliminarPerro', [PerroController::class, 'eliminarPerro']);
//     Route::get('cargarPerro', [PerroController::class, 'cargarPerro']);
//     Route::post('perroRandom', [PerroController::class, 'perroRandom']);
//     Route::post('registrarInteracción', [PerroController::class, 'registrarInteracción']);
// });


// // una api que entregue un perro random para utilizar como perro interesado, esta api debe entregar solamente el nombre e id del perro.
// Route::get('perroRandomInteresado',);
