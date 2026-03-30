<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleVenta extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function inventario(): BelongsTo {
        return $this->belongsTo(Inventario::class);
    }

    public function venta (): BelongsTo {
        return $this->belongsTo(Venta::class);
    }

}
