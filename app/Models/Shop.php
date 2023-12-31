<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * 
     * Los atributos que son asignables de manera masiva.
     * @var array<int, string>
     */
    protected $fillable = [
        'supplier_id',
        'product_id',
        'amount',
        'fecha_compra',
        'document_file',
        'status'

    ];

    // ***************************************************
    // MÉTODO
    // ***************************************************

    /**
     * Método que permite extraer todos los proveedores de la base de datos, ordenados por el atributo 'supplier'.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getShops()
    {
        // Consulta a la base de datos para obtener todos los proveedores ordenados por 'supplier'.
        // Eager load the supplier and product relationships
        $shops = Shop::with('supplier', 'product')
            ->orderBy('fecha_compra')
            ->get();


        // Devuelve la colección de proveedores obtenida de la base de datos.
        return $shops;
    }

    // ***************************************************
    // RELATIONSHIPS
    // ***************************************************

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');

    }

    public function product()
    {
        return $this->hasOne(Store::class, 'id', 'product_id');

    }

}
