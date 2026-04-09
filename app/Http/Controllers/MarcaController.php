<?php

namespace App\Http\Controllers;
use App\Http\Resources\MarcaResource;
use App\Models\Marca;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    

    public function index () {
        return response()->json(Marca::all(), 200);
    }

  

    public function show ($id) {
        $marca = Marca::findOrFail($id);
        return response()->json($marca, 200);
    }

    public function store (Request $request) {
        Marca::create([
            'nombre_marca' => $request->nombre_marca
        ]);
    
        return response()->json([
            'success' => 'true',
            'message' => 'Producto creado correctamente',
            'elemento' => Marca::latest('id')->first()
        ], 201);
    }

    public function update (Request $request, $id) {
        $marca = Marca::findOrFail($id);
        $data = $request->validate([
            "nombre_marca" => 'sometimes'
        ]);

        $marca->update($data);

        return response()->json([
            "success" => "true",
            "message" => "marca actualizada con éxito"
        ], 200);
    }

    public function delete ($id) {
        $marca = Marca::findOrFail($id);
        $marca->delete($id);
        return response()->json("marca eliminada");
    }
}
