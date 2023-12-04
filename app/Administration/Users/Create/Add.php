<?php

namespace Administration\Users\Create;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Arr;
use App\Models\User;

class Add
{

    protected $userData;
    
    public function __construct($requestData)
    {
        $this->userData = $requestData;
    }

    
    public function validate()
    {
        $validator = Validator::make($this->userData->all(), [
            'name'              => 'required|max:191',
            'last_name'         => 'required|max:191',
            'email'             => 'required|email|max:191|unique:users,email',
            'password'          => ['required', 'min:8', 'max:20', 'confirmed', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'group'             => 'required|exists:roles,id'
        ]);

        return $validator;
    }

    
    

    public function newUser()
    {   
        
        $validator = $this->validate();

        if ( !$validator->fails() ) {

            try {

                DB::transaction(function() {

                    $user = User::create($this->setup());
                    $user->assignRole($this->userData['group']);

                });

                return redirect('/users')
                            ->with('status', 'Usuario registrado satisfactoriamente');
            
            } catch(Exception $e) {
                
                return redirect('/users')
                            ->with('errorsDB', 'Ocurrio un error al registrar el usuario en la base de datos, si persiste el problema consulte a su administrador');                

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
            
        $data = Arr::add($data, 'name',           $this->userData['name']);
        $data = Arr::add($data, 'last_name',      $this->userData['last_name']);
        $data = Arr::add($data, 'email',          $this->userData['email']);
        $data = Arr::add($data, 'password',       bcrypt($this->userData['password']));
        
        return $data;
    }

}