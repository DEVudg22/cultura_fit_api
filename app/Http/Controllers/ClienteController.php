<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    

public function index () {
    return response()->json(Cliente::all(), 200);
}


public function store (Request $request) {
        Cliente::create([
            "nombre" => $request->nombre,
            "paterno" => $request->paterno,
            "materno" => $request->materno
        ]);

        return response()->json([
            "success" => "true",
            "message" => "cliente creado satisfactoriamente",
            "id_cliente" => Cliente::latest('id')->first()->id
        ], 201);
    }
}
