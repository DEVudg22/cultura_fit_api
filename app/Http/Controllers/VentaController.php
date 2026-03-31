<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use App\Http\Resources\VentaResource;

class VentaController extends Controller
{

    public function index()
    {
        return VentaResource::collection(Venta::with('detalleVentas')->get());
    }

    public function store(Request $request) {
        Venta::create([
            "fecha" => $request->fecha,
            "hora" => $request->hora,
            "cliente_id" => $request->id_cliente
        ]);

        return response()->json([
            "success" => "true",
            "message" => "venta registrada con éxito",
            "id_venta" => Venta::latest('id')->first()->id
        ], 201);
    }

    //agregar lista de productos a la venta PENDIENTE
    public function listaProductos(Request $request)
    {
        $id_venta = $request->id_venta;
        $id_producto = $request->id_producto;
        $cantidad = $request->cantidad;
        $precio = (Venta::inventario()->find($id_producto)->precio->get())*$cantidad;

        DetalleVenta::create([
            "venta_id" => $id_venta,
            "inventario_id" => $id_producto,
            "cantidad" => $cantidad,
            "total_precio" => $precio

        ]);

        return response()->json([
            "success" => "true",
            "message" => "producto agregado al pedido"
        ], 201);

    }

    public function show($id)
    {
        $venta = Venta::with('detalleVentas')->findOrFail($id);
        return new VentaResource($venta);
    }

   

   
    public function update(Request $request, Venta $venta)
    {
        //
    }


    public function delete(Venta $venta)
    {
        //
    }
}
