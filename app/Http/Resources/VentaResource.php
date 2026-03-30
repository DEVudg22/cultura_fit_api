<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VentaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_venta" => $this->id,
            "cliente" => $this->cliente->nombre.' '.$this->cliente->paterno.' '.$this->cliente->materno,
            "fecha" => $this->fecha,
            "hora" => $this->hora,
            "productos" => DetalleVentaResource::collection($this->whenLoaded('detalleVentas'))
        ];
    }
}
