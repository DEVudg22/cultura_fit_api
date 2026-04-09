<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\SuplementoController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

//CRUD BÁSICO DE INVENTARIO SERÁN RUTAS PROTEGIDAS

Route::post('/inventarios', [InventarioController::class, 'store']); //insertar producto nuevo
Route::patch('/inventarios/{id}', [InventarioController::class, 'update']);//actualizar uno o varios campos del producto en el caso del stock el numero que se envíe se sumara al stock actual
Route::delete('/inventarios/{id}', [InventarioController::class, 'delete']);//borrar un producto
Route::post('/marcas', [MarcaController::class, 'store']); //insertar marca nueva
Route::patch('/marcas/{id}', [MarcaController::class, 'update']); //actualizar marca
Route::delete('/marcas/{id}', [MarcaController::class, 'delete']); //eliminar marca
Route::post('/suplementos', [SuplementoController::class, 'store']); //insertar suplementos nuevo
Route::patch('/suplementos/{id}', [SuplementoController::class, 'update']); //actualizar suplemento
Route::delete('/suplementos/{id}', [SuplementoController::class, 'delete']); //eliminar suplemento




//RUTAS PUBLICAS
Route::get('/marcas', [MarcaController::class, 'index']);
Route::get('/marcas/{id}', [MarcaController::class, 'show']);
Route::get('/suplementos', [SuplementoController::class, 'index']);
Route::get('/suplementos/{id}', [SuplementoController::class, 'show']);


Route::get('/inventarios', [InventarioController::class, 'index']); //todos los productos
Route::get('/inventarios/{id}', [InventarioController::class, 'show']); //un producto
Route::get('/inventarios/filtros/{filtro}', [InventarioController::class, 'filtroProductos']); //filtro por categoria o marca

Route::get('/ventas', [VentaController::class, 'index']); //listado de ventas con sus productos
Route::get('/ventas/{id}', [VentaController::class, 'show']); //una sola venta
//Route::post('/ventas', [VentaController::class, 'store']);
Route::post('/ventas', [VentaController::class, 'store']);

Route::get('/clientes', [ClienteController::class, 'index']);

Route::post('/clientes', [ClienteController::class, 'store']);
Route::post('/clientes/test', [ClienteController::class, 'test']);


//cart
