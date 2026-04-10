<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\SuplementoController;
use App\Http\Controllers\UserController;

//Rutas de crear usuario y login
Route::post('/create-user', [UserController::class, 'createUser']);
Route::post('/login', [UserController::class, 'loginUser']);

//GRUPO DE RUTAS PROTEGIDAS CON AUTENTICACIÓN
Route::group(['middleware' => ['auth:sanctum']], function() {
    //logout del usuario
    Route::get('/logout', [UserController::class, 'userLogout']);
    //ver todos los usuarios
    Route::get('/users', [UserController::class, 'index']);

    Route::post('/inventarios', [InventarioController::class, 'store']); //insertar producto nuevo
    Route::patch('/inventarios/{id}', [InventarioController::class, 'update']);//actualizar uno o varios campos del producto en el caso del stock el numero que se envíe se sumara al stock actual
    Route::delete('/inventarios/{id}', [InventarioController::class, 'delete']);//borrar un producto
    Route::post('/marcas', [MarcaController::class, 'store']); //insertar marca nueva
    Route::patch('/marcas/{id}', [MarcaController::class, 'update']); //actualizar marca
    Route::delete('/marcas/{id}', [MarcaController::class, 'delete']); //eliminar marca
    Route::post('/suplementos', [SuplementoController::class, 'store']); //insertar suplementos nuevo
    Route::patch('/suplementos/{id}', [SuplementoController::class, 'update']); //actualizar suplemento
    Route::delete('/suplementos/{id}', [SuplementoController::class, 'delete']); //eliminar suplemento
    Route::get('/ventas', [VentaController::class, 'index']); //listado de ventas con sus productos
    Route::get('/clientes', [ClienteController::class, 'index']); //todos los clientes
    Route::post('/clientes/filtros', [ClienteController::class, 'searchCliente']);
});


//RUTAS PUBLICAS
Route::get('/marcas', [MarcaController::class, 'index']);//todas las marcas para filtros
Route::get('/marcas/{id}', [MarcaController::class, 'show']); //detalle de una sola marca
Route::get('/suplementos', [SuplementoController::class, 'index']); //todos los suplementos para filtros
Route::get('/suplementos/{id}', [SuplementoController::class, 'show']); //mostrar el detalle de un solo suplemento

Route::get('/inventarios', [InventarioController::class, 'index']); //todos los productos
Route::get('/inventarios/{id}', [InventarioController::class, 'show']); //un producto
Route::get('/inventarios/filtros/{filtro}', [InventarioController::class, 'filtroProductos']); //filtro por categoria o marca
Route::get('/ventas/{id}', [VentaController::class, 'show']); //un solo pedido
Route::post('/ventas', [VentaController::class, 'store']);//guardar un pedido
Route::post('/clientes', [ClienteController::class, 'store']);
//



