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
        'document_file'
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
        $shops = Shop::
            orderBy('shop')
            ->get();
        // Devuelve la colección de proveedores obtenida de la base de datos.
        return $shops;
    }


    /*** Permite obtener los datos de las tiendas en forma de lista para un reporte.
     *
     * @param string $dateIni Fecha de inicio.
     * @param string $dateEnd Fecha de fin.
     * @return \Illuminate\Support\Collection
     */
    public static function getReportStoresList($dateIni, $dateEnd)
    {
        $stores = DB::table('shops') // Asumiendo que tu tabla es 'shops' según la migración proporcionada
                    ->leftJoin('suppliers', 'shops.supplier_id', '=', 'suppliers.id')
                    ->leftJoin('stores', 'shops.product_id', '=', 'stores.id')
                    ->select(
                        'shops.id as shop_id',
                        'shops.amount',
                        'shops.fecha_compra',
                        'shops.document_file',
                        'suppliers.supplier',
                        'suppliers.description as supplier_description',
                        'stores.nombre as store_name',
                        'stores.noDeSerie',
                        'stores.marca',
                        'stores.stock',
                        'stores.costoCompra',
                        'stores.precioVenta',
                        'stores.fechaIngreso',
                        'stores.foto',
                        'stores.estatus'
                    )
                    ->whereBetween('shops.fecha_compra', [$dateIni, $dateEnd])
                    ->get();

        return $stores;
    }
    
     // ***************************************************
    // Relationship
    // ***************************************************

    /**
     * Proveedor asociado a la compra
     **/
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    /**
     * Producto asociado a la compra
     **/
    public function store()
    {
        return $this->belongsTo(Store::class, 'product_id');
    }

}
