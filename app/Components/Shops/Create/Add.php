<?php

namespace Components\Shops\Create;

use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;
class Add
{
    protected $shopData;

    public function __construct($requestData)
    {
        $this->shopData = $requestData;
    }

    public function validate()
    {
        $validator = Validator::make($this->shopData->all(), [
            'supplier_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'document_file' => 'nullable|mimes:pdf,jpg,png|max:4000'
        ]);

        return $validator;
    }

    public function newShop()
    {
        $validator = $this->validate();

        if (!$validator->fails()) {
            try {
                // Insertar orden de compra
                $shop = Shop::with('supplier')->create($this->setup());

                return redirect('/shops')
                    ->with('status', 'Proveedor registrado satisfactoriamente');

            } catch (Exception $e) {
                // En caso de error, se redirecciona a la página de proveedores con un mensaje de error
                return redirect('/shops')
                    ->with('errorsDB', 'Ocurrió un error al registrar el proveedor en la base de datos. Si persiste el problema, consulte a su administrador.');
            }

            // Se redirecciona a la ruta de proveedores (¿Este return es necesario?)
            return redirect()->route('shops');

        } else {
            // Si la validación falla, se redirecciona a la página de proveedores con los errores y los datos ingresados
            return redirect('/suppliers')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Configurar datos
     * @return array
     */
    public function setup()
    {
        $data = [
            'supplier_id' => $this->shopData['supplier_id'],
            'product_id' => $this->shopData['product_id'],
            'amount' => $this->shopData['amount'],
            'fecha_compra' => $this->shopData['fecha_compra'],
            'document_file' => $this->shopData['document_file'],
        ];

        if ($this->shopData->hasFile('document_file')) {
            $documentPath = $this->shopData->file('document_file');
            $imageName = $documentPath->getClientOriginalName();

            // Change the directory to "public/storage/orders"
            $url = $this->shopData->file('document_file')->storeAs('orders', $imageName, 'public');

            $data['document_file'] = $url;
        }

        return $data;
    }
}
