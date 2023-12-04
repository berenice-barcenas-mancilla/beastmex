<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;


    /**
     * 
     * Los atributos que son asignables de manera masiva.
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'noDeSerie',
        'marca',
        'stock',
        'costoCompra',
        'precioVenta',
        'fechaIngreso',
        'foto',
        'estatus'
    ];

    // ***************************************************
    // MÉTODO
    // ***************************************************

    /**
     * Método que permite extraer todos los productos de la base de datos, ordenados por el atributo 'supplier'.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getStores()
    {
        // Consulta a la base de datos para obtener todos los productos ordenados por 'supplier'.
        $stores = Store::
            orderBy('nombre')
            ->get();
        // Devuelve la colección de productos obtenida de la base de datos.
        return $stores;
    }

    /**
     * Permite obtener un listado de tiendas para la lista desplegable.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function storesList()
    {
        $stores = Store::select('id', 'nombre', 'noDeSerie', 'marca', 'stock', 'costoCompra', 'precioVenta', 'fechaIngreso', 'foto', 'estatus')
            ->get();
        return $stores;
    }

    public function shops()
    {
        return $this->hasMany(Shop::class, 'product_id', 'id');
    }





}
