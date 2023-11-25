<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;
//use App\Http\Controllers\AuthController;


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


/**
 * una api que entregue un perro random para utilizar como perro interesado, esta api debe entregar solamente el nombre e id del perro.
 * una api que entregue perros candidatos, esta no debe entregar al perro interesado al momento de hacer la busqueda. solo deberá recibir el id del perro interesado.
 * una api donde se guardarán las preferencias de cada perro.
 * una api donde; con el id del perro interesado, ver los perros que ha aceptado y otra para los rechazados.
 */

/*
Route::get('/perro/random', [PerroController::class, 'perroRandom'])->name('random');
Route::get('/perro/candidatos/{id}', [PerroController::class, 'perrosCandidatos'])->name('candidatos')->whereUuid('id');
Route::post('/preferencia', [InteraccionController::class, 'preferencia'])->name('preferencia');
Route::get('/interaccion/perros/{id}/{preferencia}', [InteraccionController::class, 'perrosPorPreferencia'])->name('preferencias')->whereUuid('id')->whereIn('preferencia', ['aceptados', 'rechazados']);
// Route::get('/interaccion/perros-aceptados/{id}', [InteraccionController::class, 'perrosAceptados'])->whereUuid('id');
// Route::get('/interaccion/perros-rechazados/{id}', [InteraccionController::class, 'perrosRechazados'])->whereUuid('id');
*/

// Route Groups - Controllers
// Route::controller(PerroController::class)->group(function () {
//     Route::get('/perro/random', ['perroRandom'])->name('random');
//     //Route::get('/perro/candidatos/{perroId}', ['perrosCandidatos'])->name('candidatos')->whereUuid('id');
// });

// Route::controller(InteraccionController::class)->group(function () {
//     Route::post('/interaccion/perro/interesado/{perroInteresadoId}//preferencias', ['preferencia'])->name('preferencia');
//     Route::get('/interaccion/perros/{perroId}/{preferencia}', ['perrosPorPreferencia'])
//         ->name('preferencias')->whereUuid('id')->whereIn('preferencia', ['aceptados', 'rechazados']);
// });


//Route Groups - Controllers
Route::prefix('perro')->controller(PerroController::class)->group(function () {
    //Route::resource();

    Route::get('/random', ['perroRandom'])->name('random');
    Route::get('/candidatos', ['perrosCandidatos'])->name('candidatos');
});

// Route::prefix('interaccion')->controller(InteraccionController::class)->group(function () {
//     Route::post('/preferencia', ['preferencia'])->name('preferencia');
//     Route::get('/preferencias', ['preferencias'])->name('preferencias');
// });
