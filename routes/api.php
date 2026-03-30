<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

//CRUD BÁSICO DE INVENTARIO SERÁN RUTAS PROTEGIDAS

Route::post('/inventarios', [InventarioController::class, 'store']);
Route::patch('/inventarios/{id}', [InventarioController::class, 'update']);
Route::delete('/inventarios/{id}', [InventarioController::class, 'delete']);
//ver registro de ventas, que es lo mismo que pedidos



//RUTAS PUBLICAS
Route::get('/inventarios', [InventarioController::class, 'index']);
Route::get('/inventarios/{id}', [InventarioController::class, 'show']);
Route::get('/inventarios/filtros/{filtro}', [InventarioController::class, 'filtroProductos']);

Route::get('/ventas', [VentaController::class, 'index']);
Route::get('/ventas/{id}', [VentaController::class, 'show']);

//cart
