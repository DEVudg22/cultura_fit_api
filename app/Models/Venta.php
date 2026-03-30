<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    
    protected $guarded = [];
    public $timestamps = false;

    public function cliente () : BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function detalleVentas (): HasMany {
        return $this->hasMany(DetalleVenta::class);
    }

}
