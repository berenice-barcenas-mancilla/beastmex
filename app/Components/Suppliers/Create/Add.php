<?php

namespace Components\Suppliers\Create;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

use Exception;

class Add
{
    protected $supplierData;

    // Constructor que recibe los datos del proveedor al ser instanciado
    public function __construct($requestData)
    {
        $this->supplierData = $requestData;
    }

    // Método para validar los datos del proveedor
    public function validate()
    {
        // Se crea un validador utilizando la clase Validator de Laravel
        $validator = Validator::make($this->supplierData->all(), [
            'supplier' => 'required|string|max:99',        // Nombre del proveedor obligatorio, tipo string y máximo 99 caracteres
            'description' => 'required|string|max:191',       // Descripción obligatoria, tipo string y máximo 191 caracteres
            'email' => 'required|email|max:191|unique:suppliers,email',

        ]);

        // Se devuelve el validador
        return $validator;
    }

    // Método para agregar un nuevo proveedor
    public function newSupplier()
    {
        // Se realiza la validación de los datos del proveedor
        $validator = $this->validate();

        // Si la validación es exitosa
        if (!$validator->fails()) {

            // Se verifica si ya existe un proveedor con el mismo nombre
            if (Supplier::where('supplier', $this->supplierData['supplier'])->exists()) {
                // Si existe, se redirecciona a la página de proveedores con un mensaje de error
                return redirect('/suppliers')
                    ->withErrors([$this->supplierData['supplier'] => "El nombre del proveedor ya está registrado."])
                    ->withInput();
            }

            try {
                // Se inicia una transacción de base de datos para asegurar la atomicidad de la operación
                DB::transaction(function () {
                    // Se crea un nuevo proveedor utilizando los datos proporcionados
                    Supplier::create($this->setup());
                });

                // Si la transacción es exitosa, se redirecciona a la página de proveedores con un mensaje de éxito
                return redirect('/suppliers')
                    ->with('status', 'Proveedor registrado satisfactoriamente');

            } catch (Exception $e) {
                // En caso de error, se redirecciona a la página de proveedores con un mensaje de error
                return redirect('/suppliers')
                    ->with('errorsDB', 'Ocurrió un error al registrar el proveedor en la base de datos. Si persiste el problema, consulte a su administrador.');
            }

            // Se redirecciona a la ruta de proveedores (¿Este return es necesario?)
            return redirect()->route('suppliers');

        } else {
            // Si la validación falla, se redirecciona a la página de proveedores con los errores y los datos ingresados
            return redirect('/suppliers')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Configura los datos del proveedor antes de ser guardados
     * @return array
     */
    public function setup()
    {
        // Se inicializa un array asociativo con los datos del proveedor
        $data = [
            'supplier' => $this->supplierData['supplier'],
            'description' => $this->supplierData['description'],
            'email' => $this->supplierData['email'],
        ];

        // Se devuelve el array con los datos del proveedor
        return $data;
    }

}
