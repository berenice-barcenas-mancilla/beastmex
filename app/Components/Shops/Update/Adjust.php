<?php

namespace Components\Uniforms_employees\Update;

use App\Models\Supplier;
use App\Models\Store;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

use Exception;

class Adjust
{

    protected $shopData;
    protected $shop;
    
    public function __construct($requestData, $uniform)
    {
        $this->shopData = $requestData;
        $this->uniform = $uniform;
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
    

    public function editShop()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {
            try {

                DB::transaction(function() {

                $data = $this->setup();

                DB::table('employee_uniforms')
                    ->where('id', $this->shopData['id'])
                    ->update([
                    'amount'                => $data['amount'],
                    'fecha_compra'          => $data['fecha_compra'],
                    'document_file'      => $data['document_file'],
                    ]);

                });

                return back()
                            ->with('status', 'Compra actualizada satisfactoriamente');
            
            } catch(\Exception $e) {
                
                return back()
                            ->with('errorsDB', 'Ocurrio un error al actualizar la compra en la base de datos, si persiste el problema consulte a su administrador');                

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
            $url = $this->shopData->file('document_file')->storeAs('document_file', $imageName, 'public');
            $data['document_file'] = $url;
        }
        
        return $data;
    }

}