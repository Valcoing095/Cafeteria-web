<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductoController;
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
Route::get('/productos',[ProductoController::class, 'index'])->name('producto.index');
Route::post('/product',[ProductoController::class, 'store'])->name('producto.store');
Route::post('/product/delete/{id}',[ProductoController::class, 'destroy'])->name('producto.destroy');
Route::get('/product/edit/{id}',[ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/product/update{id}',[ProductoController::class, 'update'])->name('producto.update');


// Rutas del modulo de tienda
Route::get('/productos/tienda',[TiendaController::class, 'index'])->name('tienda.index');
Route::post('/vender/product/{id}',[TiendaController::class, 'update'])->name('tienda.update');
Route::get('/productos/tienda/historial',[TiendaController::class, 'ventas'])->name('tienda.ventas');

