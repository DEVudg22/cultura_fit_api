<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Resources\VentaResource;

class VentaController extends Controller
{

    public function index()
    {
        return VentaResource::collection(Venta::with('detalleVentas')->get());
    }

    /*public function store(Request $request) {
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
    }*/

    //agregar lista de productos a la venta PENDIENTE
    public function store(Request $request)
    {
    //FALTA COMPROBAR SI EL CLIENTE YA EXISTE PARA NO DUPLICAR
    //primero se crea el cliente
    Cliente::create([
            "nombre" => $request->nombre,
            "paterno" => $request->paterno,
            "materno" => $request->materno
        ]);
    //obtenemos el id del cliente creado
        $id_cliente = Cliente::latest('id')->first()->id;

        //creamos la venta

        Venta::create([
            "fecha" => $request->fecha,
            "hora" => $request->hora,
            "cliente_id" => $id_cliente
        ]);

        //obtenemos el id de la venta e insertamos los productos
        $id_venta = Venta::latest('id')->first()->id;
        $listaProductos = $request->input('productos');

        foreach ($listaProductos as $objeto) {

            $inventario = Inventario::find($objeto['id_producto']);
            $precio = $inventario->precio;

            DetalleVenta::create([
            "venta_id" => $id_venta,
            "inventario_id" => $objeto['id_producto'],
            "cantidad" => $objeto['cantidad'],
            "total_precio" => $objeto['cantidad']*$precio
        ]);
        }
        

        return response()->json([
            "success" => "true",
            "message" => "pedido realizado con éxito",
            "folio_pedido" => $id_venta
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
