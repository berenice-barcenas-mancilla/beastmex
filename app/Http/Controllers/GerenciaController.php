<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GerenciaController extends Controller
{
    
    public function indexgerencia()
    {
        $PAGE_NAVIGATION = "MANAGEMENT";

        return view('admin.gerencia.indexgerencia',compact('PAGE_NAVIGATION'));
    }


    public function generarusuario()
    {
        return view('admin.gerencia.generarusuario');
    }

    public function store(Request $request)
    {
        

            // Validaciones personalizadas
            $validatedData = $request->validate([
                'name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'group' => 'required|string',
                'password' => 'required|string',
                'password_confirmation' => 'required|string',

            ]);

        $nombre = $request->input('txtName');
        return redirect('/gerencia')->with('Exito',  'El usuario ' . $nombre . ' guardado con éxito');
    }
}
