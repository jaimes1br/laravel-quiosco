<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user',function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/categorias',CategoriaController::class);
    Route::apiResource('/productos',ProductoController::class);
    Route::post('/logout',[ AuthController::class,'logout']);

    //almacenar ordenes
    Route::apiResource('/pedidos',PedidoController::class);
});

//con apiResource laravel directamente va al controlador y con los nombres
//de buenas practicas va y consulta esa funcion que se usa para cierto 
//metodo como index con get

//registro
Route::post('/registro',[ AuthController::class,'register']);
//login
Route::post('/login',[ AuthController::class,'login']);