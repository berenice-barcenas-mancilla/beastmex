<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    // Define la tabla asociada al modelo
    protected $table = 'seller';

    // Especifica los campos que pueden llenarse masivamente (si es necesario)
    protected $fillable = ['cliente', 'fecha', 'content'];
}
