<?php

// Declaración del namespace para la clase Supplier en el archivo Supplier.php dentro de la carpeta Models en la aplicación Laravel.
namespace App\Models;

// Uso de las traits HasFactory y Model de Eloquent para facilitar la creación de factories y la interacción con la base de datos.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Declaración de la clase Supplier que extiende la clase Model de Eloquent.
class Supplier extends Model
{
    // Uso de la trait HasFactory en la clase.
    use HasFactory;

    /**
     * 
     * Los atributos que son asignables de manera masiva.
     * @var array<int, string>
     */
    protected $fillable = [
        'supplier',
        'description',
        'email',
        'status'
    ];

    // ***************************************************
    // MÉTODO
    // ***************************************************

    /**
     * Método que permite extraer todos los proveedores de la base de datos, ordenados por el atributo 'supplier'.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getSuppliers() 
    {
        // Consulta a la base de datos para obtener todos los proveedores ordenados por 'supplier'.
        $suppliers = Supplier::
            orderBy('supplier')
            ->get();
        // Devuelve la colección de proveedores obtenida de la base de datos.
        return $suppliers;
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }


    

}
