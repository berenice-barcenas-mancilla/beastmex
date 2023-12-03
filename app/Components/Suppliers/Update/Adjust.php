<?php

namespace Components\Suppliers\Update;

use App\Models\Supplier;

use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

use Exception;

class Adjust
{
    protected $supplierData;
    protected $supplier;

    // Constructor que recibe datos de proveedor y un objeto de proveedor existente
    public function __construct($requestData, $supplier)
    {
        $this->supplierData = $requestData;
        $this->supplier = $supplier;
    }

    // Método para validar los datos del proveedor
    public function validate()
    {
        $validator = Validator::make($this->supplierData->all(), [
            'supplier'     => 'required|string|max:99',
            'description'  => 'required|string|max:191',
        ]);

        return $validator;
    }

    // Método para editar un proveedor existente
    public function editSupplier()
    {
        // Se realiza la validación de los datos del proveedor
        $validator = $this->validate();

        // Si la validación no falla
        if (!$validator->fails()) {
            $idsupplier = $this->supplier->id;

            // Se verifica si ya existe un proveedor con el mismo nombre, excluyendo el proveedor actual
            if (Supplier::where('supplier', $this->supplierData['supplier'])->where('id', '!=', $idsupplier)->exists()) {
                // En caso de existir, se redirige con un mensaje de error
                return redirect('/suppliers')
                    ->withErrors([$this->supplierData['supplier'] => "El nombre del proveedor ya está registrado."])
                    ->withInput();
            }

            try {
                // Se inicia una transacción de base de datos
                DB::transaction(function () {
                    // Se actualizan los datos del proveedor
                    $this->supplier->update($this->setup());
                });

                // Redirige a la lista de proveedores con un mensaje de éxito
                return redirect('/suppliers')
                    ->with('status', 'Proveedor actualizado satisfactoriamente');
            } catch (Exception $e) {
                // En caso de error, redirige con un mensaje de error de base de datos
                return redirect('/suppliers')
                    ->with('errorsDB', 'Ocurrió un error al actualizar el proveedor en la base de datos, si persiste el problema consulte a su administrador');
            }

            // Esta línea nunca se alcanza, ya que las redirecciones anteriores terminan la ejecución del método
            return redirect()->route('suppliers');
        } else {
            // En caso de fallo en la validación, redirige con los errores y los datos de entrada
            return redirect('/suppliers')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Configura los datos que se actualizarán en el proveedor
     * @return array
     */
    public function setup()
    {
        $data = [];

        // Se añaden los datos del proveedor al array
        $data = Arr::add($data, 'supplier', $this->supplierData['supplier']);
        $data = Arr::add($data, 'description', $this->supplierData['description']);

        return $data;
    }
}
