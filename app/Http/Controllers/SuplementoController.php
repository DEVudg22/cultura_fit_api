<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplemento;

class SuplementoController extends Controller
{
     public function index () {
        return response()->json(Suplemento::all(), 200);
    }

    public function show ($id) {
        $suplemento = Suplemento::findOrFail($id);
        return response()->json($suplemento, 200);
    }

    public function store (Request $request) {
        Suplemento::create([
            'nombre_suplemento' => $request->nombre_suplemento
        ]);
    
        return response()->json([
            'success' => 'true',
            'message' => 'Suplemento creado correctamente',
            'elemento' => Suplemento::latest('id')->first()
        ], 201);
    }

    public function update (Request $request, $id) {
        $suplemento = Suplemento::findOrFail($id);
        $data = $request->validate([
            "nombre_suplemento" => 'sometimes'
        ]);

        $suplemento->update($data);

        return response()->json([
            "success" => "true",
            "message" => "suplemento actualizado con éxito"
        ], 200);
    }

    public function delete ($id) {
        $suplemento = Suplemento::findOrFail($id);
        $suplemento->delete($id);
        return response()->json("suplemento eliminado");
    }
}
