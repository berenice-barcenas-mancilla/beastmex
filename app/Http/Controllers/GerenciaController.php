<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Administration\Users\Create\Add;
use Administration\Users\Update\Adjust;

use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

class GerenciaController extends Controller
{
    //
    public function index()
    {
        $PAGE_NAVIGATION = "USERS";
        $roles = Role::where('id', '!=', 1)->orderBy('name')->get(['id', 'name']);

        return view('gerencia/indexgerencia', compact('PAGE_NAVIGATION', 'roles'));
    }



    public function indexgerencia()
    {
        return view('gerencia/dashboardgerencia');
    }

    public function generarusuario()
    {
        return view('gerencia/generarusuario');
    }

}
