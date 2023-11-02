<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    //
    public function index()
    {
        return view('gerencia/dashboardgerencia');
    }

}
