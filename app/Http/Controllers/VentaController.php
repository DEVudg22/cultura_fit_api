<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Resources\VentaResource;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{

    public function index()
    {
        return VentaResource::collection(Venta::with('detalleVentas')->get());
    }

   

    //insertar venta (pedidos)
    public function store(Request $request)
    {
    DB::beginTransaction();
    try {
    //primero se busca el cliente
    $cliente = Cliente::where('nombre', $request->nombre)->where('paterno', $request->paterno)->where('materno', $request->materno)->get();
    //si no existe entonces se crea
    if(count($cliente) == 0){
        Cliente::create([
            "nombre" => $request->nombre,
            "paterno" => $request->paterno,
            "materno" => $request->materno
        ]);
        //obtenemos el id del cliente creado
        $id_cliente = Cliente::latest('id')->first()->id;
        //si existe entonces se obtiene su id
    }else{
        $id_cliente = $cliente[0]->id;
    }
        //creamos la venta
        Venta::create([
            "fecha" => $request->fecha,
            "hora" => $request->hora,
            "cliente_id" => $id_cliente
        ]);

        //obtenemos el id de la venta e insertamos los productos
        $id_venta = Venta::latest('id')->first()->id;
        $listaProductos = $request->input('productos');
        $totalGeneral = 0;
        foreach ($listaProductos as $objeto) {

            $inventario = Inventario::find($objeto['id_producto']);
            $precio = $inventario->precio;

            DetalleVenta::create([
            "venta_id" => $id_venta,
            "inventario_id" => $objeto['id_producto'],
            "cantidad" => $objeto['cantidad'],
            "total_precio" => $objeto['cantidad']*$precio
        ]);

        //restamos al stock lo que se vendió
        $inventario->decrement('stock', $objeto['cantidad']);
        //calculamos el total de toda la venta
        $totalGeneral += $objeto['cantidad']*$precio;
        }
        //insertamos en el campo total general de la tabla ventas el total general
        Venta::find($id_venta)->update(['total_general' => $totalGeneral]);
        DB::commit();
        return response()->json([
            "success" => "true",
            "message" => "pedido realizado con éxito",
            "folio_pedido" => $id_venta,
            "total_general" => $totalGeneral
        ], 201);
    } catch (\Exception $e){
         DB::rollback();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
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
