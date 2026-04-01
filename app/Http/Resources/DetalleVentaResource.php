<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleVentaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_producto" => $this->inventario_id,
            "marca" => $this->inventario->marca->nombre_marca,
            "suplemento" => $this->inventario->suplemento->nombre_suplemento,
            "presentacion" => $this->inventario->presentacion,
            "precio_unitario" => $this->inventario->precio,
            "cantidad" => $this->cantidad,
            "total" => $this->total_precio
        ];
    }
}
