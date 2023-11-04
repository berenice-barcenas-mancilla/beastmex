<?php

namespace Administration\Groups\Update;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class Adjust
{

    protected $groupData;
    protected $group;
    
    public function __construct($requestData, $group)
    {
        $this->groupData = $requestData;
        $this->group = $group;
    }

    
    public function validate()
    {
        $validator = Validator::make($this->groupData->all(), [
            'name'          => 'required|max:191|unique:roles,name,' . $this->group->id
        ]);

        return $validator;
    }
    

    public function editGroup()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            try {

                DB::transaction(function() {

                    $this->group->update(['name'   => $this->groupData['name']]);
                    $this->group->syncPermissions($this->groupData['permission']);

                });

                return redirect('/groups')
                            ->with('status', 'Grupo actualizado satisfactoriamente');
            
            } catch(Exception $e) {
                
                return redirect('/groups')
                            ->with('errorsDB', 'Ocurrio un error al actualizar el grupo en la base de datos, si persiste el problema consulte a su administrador');                

            }

            return redirect()->route('groups');

        } else {

            return redirect('/groups')
                        ->withErrors($validator)
                        ->withInput();
        }

    }

}