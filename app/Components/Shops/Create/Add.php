<?php

namespace Components\Shops\Create;

use App\Models\Shop;
use App\Models\Supplier;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

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
            'supplier_id'           =>      'required',
            'product_id'            =>      'required',
            'amount'                =>      'required|numeric',
            'fecha_compra'          =>      'nullable|date',
            'document_file'         =>      'nullable|mimes:pdf,jpg,png|max:4000'

        ]);

        return $validator;
    }
    

    public function newShop()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            try {

                $data = $this->setup();
                
                $supplier = Supplier::find($data['supplier_id']);
                $store = Store::find($data['product_id']);
                
                // Asociar el uniforme al empleado utilizando el método attach()
                $supplier->store()->attach($store, [
                    'amount'                => $data['amount'],
                    'fecha_compra'      => $data['fecha_compra'],
                    'document_file'         => $data['document_file'],

                ]);

                return back()
                            ->with('status', 'Compra  registrada satisfactoriamente');
            
            } catch(\Exception $e) {
                return back()
                            ->with('errorsDB', 'Ocurrio un error al registrar la compra en la base de datos, si persiste el problema consulte a su administrador');                

            }

            return back();

        } else {

            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

    }

    /**
    * Setup data
    * @return array
    */
    public function setup()
    {
        $data = [];
            
        $data = Arr::add($data, 'supplier_id',              $this->shopData['supplier_id']);
        $data = Arr::add($data, 'product_id',               $this->shopData['product_id']);
        $data = Arr::add($data, 'amount',                   $this->shopData['amount']);
        $data = Arr::add($data, 'fecha_compra',             $this->shopData['fecha_compra']);
        $data = Arr::add($data, 'document_file',            $this->shopData['document_file']);
        
        
        if (isset($this->shopData['document_file']) && $this->shopData['document_file'] != "") {

            $documentPath = $this->shopData->file('document_file');
            $imageName = $documentPath->getClientOriginalName();
            $url = $this->shopData->file('document_file')->storeAs('uniforms', $imageName, 'public');
            
            $data['document_file'] = $url; 
        }

        return $data;
    }

}