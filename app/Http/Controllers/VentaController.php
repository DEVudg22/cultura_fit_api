<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Resources\VentaResource;

class VentaController extends Controller
{

    public function index()
    {
        return VentaResource::collection(Venta::with('detalleVentas')->get());
    }

    
    public function store(Request $request)
    {
        //
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
