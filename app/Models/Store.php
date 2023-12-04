<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    
    // ***************************************************
    // Relationship
    // **************************************************

    /**
     * Compras asociadas al proveedor
     **/
    public function shops()
    {
        return $this->hasMany(Shop::class, 'product_id');
    }

}
