<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
     protected $guarded = [];
    public $timestamps = false;

    public function inventarios () : HasMany {
        return $this->hasMany(Inventario::class);
    }
}
