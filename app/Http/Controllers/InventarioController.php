<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use App\Http\Resources\InventarioResource;


use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index () {
        $inventarios = Inventario::with(['suplemento', 'marca']);
        return InventarioResource::collection($inventarios->with(['suplemento','marca'])->get());
    }
}
