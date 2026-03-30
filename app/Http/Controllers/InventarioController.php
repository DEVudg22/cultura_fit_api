<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use App\Models\Suplemento;
use App\Models\Marca;
use App\Http\Resources\InventarioResource;


use Illuminate\Http\Request;

class InventarioController extends Controller
{
    //CRUD BÁSICO, ESTARÁN PROTEGIDOS CON MIDDLEWARE

    //todos los productos del inventario
    public function index () {
        $inventarios = Inventario::with(['suplemento', 'marca']);
        return InventarioResource::collection($inventarios->with(['suplemento','marca'])->orderBy('id', 'asc')->get());
    }

    //un producto por id
    public function show ($id) {
        $producto = Inventario::findOrFail($id);
        return new InventarioResource($producto);
    }

    //crear nuevo producto, se requiere en el cuerpo de la petición los ids del suplemento y de la marca
    public function store (Request $request) {
        $suplemento = $request->suplemento_id;
        $marca = $request->marca_id;
        $presentacion = $request->presentacion;
        $stock = $request->stock;
        $descripcion = $request->descripcion;
        $precio = $request->precio;
        Inventario::create([
            'suplemento_id' => $suplemento,
            'marca_id' => $marca,
            'presentacion' => $presentacion,
            'stock' => $stock,
            'descripcion' => $descripcion,
            'precio' => $precio

        ]);

        return response()->json([
            'success' => 'true',
            'message' => 'Producto creado correctamente',
            'elemento' => new InventarioResource(Inventario::latest('id')->first())
        ], 201);
    }

    //modificar productos del inventario
    public function update (Request $request, $id) {
        $inventario = Inventario::findOrFail($id);
        $data = $request->validate([
            'suplemento_id' => 'sometimes',
            'marca_id' => 'sometimes',
            'presentacion' => 'sometimes',
            'stock' => 'sometimes',
            'descripcion' => 'sometimes',
            'precio' => 'sometimes'
        ]);

        $inventario->update($data);
        return response()->json('success', 200);

    }

    //eliminar un producto del inventario
    public function delete ($id) {
        $producto = Inventario::findOrFail($id);
        $producto->delete();
        return response()->json('registro eliminado', 204);
    }


    //METODOS PUBLICOS

    //BUSQUEDA FILTRADA POR PALABRA CLAVE

    public function filtroProductos ($filtro) {
        $productos = InventarioResource::collection(Inventario::with(['suplemento','marca'])
        ->whereHas('suplemento', function($query) use($filtro){
                $query->where('nombre_suplemento', 'like', '%'.$filtro.'%');
            })
        ->orWhereHas('marca', function($query) use($filtro){
                $query->where('nombre_marca', 'like', '%'.$filtro.'%');
            })
        ->orderBy('id', 'asc')->get());

         if (count($productos) != 0) {
                return response()->json($productos, 200);
            }else{
                return response()->json([
                    "status_code" => 404,
                    "message" => "No se cuentan con coincidencias en la base de datos"
                ], 404);
            }
    }

    

}
