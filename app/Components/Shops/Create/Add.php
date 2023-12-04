<?php

namespace Components\Shops\Create;

use App\Models\Shop;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

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
            'supplier_id'                 =>  'required',
            'product_id'                  =>  'required',
            'amount'                      =>  'required|numeric|max:191',
            'fecha_compra'                =>  'required|date',
            'document_file'               =>  'nullable|mimes:pdf,jpg,png|max:4000'
        ]);

        return $validator;
    }
    

    public function newShop()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            if (Computer::where('inventory_num', $this->shopData['inventory_num'])->exists()) {
                return redirect('/computers')
                    ->withErrors([$this->shopData['inventory_num'] => "La computadora ya esta registrada según el número de inventario que proporcionaste."])
                    ->withInput();
            }

            try {

                DB::transaction(function() {

                    
                    Computer::create($this->setup());

                });

                return redirect('/computers')
                            ->with('status', 'Computadora registrada satisfactoriamente');
            
            } catch(\Exception $e) {
                DD($e);
                return redirect('/computers')
                            ->with('errorsDB', 'Ocurrio un error al registrar la computadora en la base de datos, si persiste el problema consulte a su administrador');                

            }

            return redirect()->route('computers');

        } else {

            return redirect('/computers')
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
            
        $data = Arr::add($data, 'model',                $this->shopData['model']);
        $data = Arr::add($data, 'brand_system',         $this->shopData['brand_system']);
        $data = Arr::add($data, 'serial_number',        $this->shopData['serial_number']);
        $data = Arr::add($data, 'accesories',           $this->shopData['accesories']);
        $data = Arr::add($data, 'processor',            $this->shopData['processor']);
        $data = Arr::add($data, 'dark_size',            $this->shopData['dark_size']);
        return $data;
    }

}