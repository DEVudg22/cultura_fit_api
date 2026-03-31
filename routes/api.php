<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

//CRUD BÁSICO DE INVENTARIO SERÁN RUTAS PROTEGIDAS

Route::post('/inventarios', [InventarioController::class, 'store']); //insertar producto nuevo
Route::patch('/inventarios/{id}', [InventarioController::class, 'update']);//actualizar uno o varios campos
Route::delete('/inventarios/{id}', [InventarioController::class, 'delete']);//borrar un producto
//ver registro de ventas, que es lo mismo que pedidos



//RUTAS PUBLICAS
Route::get('/inventarios', [InventarioController::class, 'index']); //todos los productos
Route::get('/inventarios/{id}', [InventarioController::class, 'show']); //un producto
Route::get('/inventarios/filtros/{filtro}', [InventarioController::class, 'filtroProductos']); //filtro por categoria o marca

Route::get('/ventas', [VentaController::class, 'index']); //listado de ventas con sus productos
Route::get('/ventas/{id}', [VentaController::class, 'show']); //una sola venta
//Route::post('/ventas', [VentaController::class, 'store']);
Route::post('/ventas', [VentaController::class, 'store']);

Route::get('/clientes', [ClienteController::class, 'index']);

Route::post('/clientes', [ClienteController::class, 'store']);


//cart
