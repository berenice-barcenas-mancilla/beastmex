<?php

namespace Components\Shops\Create;

use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

                return redirect()
                    ->back()
                    ->with('errors', 'No tienes permisos para ver el PDF.');

            } catch (\Exception $e) {
                return redirect()->back()->with('errorsDB', 'Ocurrió un error al registrar la orden de compra en la base de datos. Si el problema persiste, consulte a su administrador');
            }
        } else {
            return redirect()->back()
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
