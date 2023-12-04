<?php

namespace Administration\Users\Update;


use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Arr;

class Adjust
{

    protected $userData;
    protected $user;
    
    public function __construct($requestData, $user)
    {
        $this->userData = $requestData;
        $this->user = $user;
    }

    
    
    public function validate()
    {
        $validator = Validator::make($this->userData->all(), [
            'name'          => 'required|max:191',
            'last_name'     => 'required|max:191',
            'email'         => 'required|email|max:191|unique:users,email, ' . $this->user->id,
            'password'      => ['nullable', 'min:8', 'max:20', 'confirmed', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'group'         => 'required|exists:roles,id'
        ]);

        return $validator;
    }
    

    public function editUser()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            try {

                DB::transaction(function() {

                    $this->user->update($this->setup());
                    $this->user->syncRoles($this->userData['group']);

                });

                return redirect('/users')
                            ->with('status', 'Usuario actualizado satisfactoriamente');
            
            } catch(Exception $e) {
                
                return redirect('/users')
                            ->with('errorsDB', 'Ocurrio un error al actualizar el usuario en la base de datos, si persiste el problema consulte a su administrador');                

            }

            return redirect()->route('users');

        } else {

            return redirect('/users')
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
            
        $data =   Arr::add($data, 'name',           $this->userData['name']);
        $data =   Arr::add($data, 'last_name',      $this->userData['last_name']);
        $data =   Arr::add($data, 'email',          $this->userData['email']);

        if (isset($this->userData['password']) && $this->userData['password'] != '') {

            $data =   Arr::add($data, 'password',   bcrypt($this->userData['password']));
        }

        return $data;
    }

}