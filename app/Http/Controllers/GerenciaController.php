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

}
