<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/usersRol', [AuthController::class,'index']);

#Productos

// Route::get('/products',[Productos]);
// Route::get('/product/product/{id}',[ProductoController::class, 'show']);

#Pedido
Route::post('/pedido', [PedidoController::class,'crearPedido']);

