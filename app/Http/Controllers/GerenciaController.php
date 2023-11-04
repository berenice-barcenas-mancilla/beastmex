<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    //
    public function indexgerencia()
    {
        return view('gerencia/dashboardgerencia');
    }

    public function generarusuario()
    {
        return view('gerencia/generarusuario');
    }

}
