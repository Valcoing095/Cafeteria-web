<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductoController;
use App\Livewire\Productos;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('show-image/{image}', [ImageController::class, 'show']);

Route::get('/',function(){
    return view('welcome');
});
// Rutas para productos
#Productos

Route::get('/products',Productos::class)->name('getProducts');



// Rutas del modulo de tienda
Route::get('/productos/tienda',[TiendaController::class, 'index'])->name('tienda.index');
Route::post('/vender/product/{id}',[TiendaController::class, 'update'])->name('tienda.update');
Route::get('/productos/tienda/historial',[TiendaController::class, 'ventas'])->name('tienda.ventas');

