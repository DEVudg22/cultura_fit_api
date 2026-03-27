<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
     protected $guarded = [];
    public $timestamps = false;

    public function marca () : BelongsTo {
        return $this->belongsTo(Marca::class);
    }

    public function suplemento () : BelongsTo {
        return $this->belongsTo(Suplemento::class);
    }
}
