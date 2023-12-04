<?php

namespace Administration\Groups\Create; //se le da un nombre y se incluyen las librerias

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class Add
{

    protected $groupData;
    
    public function __construct($requestData)
    {
        $this->groupData = $requestData;
    }

    
    public function validate()
    {
        $validator = Validator::make($this->groupData->all(), [
            'name' => 'required|max:191|unique:roles,name',
        ]);

        return $validator;
    }
    

    public function newGroup()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            try {

                DB::transaction(function() {

                    $role = Role::create(['name'   => $this->groupData['name']]);
                    $role->syncPermissions($this->groupData['permission']);

                });

                return redirect('/groups')
                            ->with('status', 'Grupo registrado satisfactoriamente');
            
            } catch(Exception $e) {
                
                return redirect('/groups')
                            ->with('errorsDB', 'Ocurrio un error al registrar el grupo en la base de datos, si persiste el problema consulte a su administrador');                

            }

            return redirect()->route('groups');

        } else {

            return redirect('/groups')
                        ->withErrors($validator)
                        ->withInput();
        }

        
    }

}