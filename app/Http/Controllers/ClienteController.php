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
    //TEST PARA BUSCAR UN CLIENTE EN LA BASE DE DATOS
    public function test (Request $request) {
        $cliente = Cliente::where('nombre', $request->nombre)->where('paterno', $request->paterno)->where('materno', $request->materno)->get();
        return response()->json([
            "success" => "true",
            "message" => "El cliente existe en la base de datos",
            "id_cliente" => $cliente[0]->id
         ] , 200);
    }
}
