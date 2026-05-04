<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "suplemento" => $this->suplemento->nombre_suplemento,
            "marca" => $this->marca->nombre_marca,
            "presentacion" => $this->presentacion,
            "stock" => $this->stock,
            "descripcion" => $this->descripcion,
            "precio" => $this->precio,
            "imagen" => $this->imagen

        ];
    }
}
