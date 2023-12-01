<?php

namespace App\Http\Controllers;

use App\Models\User;
use Administration\Users\Create\Add;
use Administration\Users\Update\Adjust;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            
            if (!Gate::allows('system.users.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }

            return $next($request);
        });
    }
    


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PAGE_NAVIGATION = "USERS";
        $roles = Role::where('id', '!=', 1)->orderBy('name')->get(['id', 'name']);

        return view('admin.users.user_list', compact('PAGE_NAVIGATION', 'roles'));
    }




    /**
     * Return all users list as JSON
     * @param Request $request
     * @return void
     */
    public function getUsers(Request $request)
    {

        $users = User::where('id', '!=', 1)->get(['id', 'name', 'last_name', 'email', 'status']);
        
        return response()->json(['data'  => $users]);
    }




    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('system.users.create')) {
            abort(403, "No estas autorizado para registrar información");
        }
        
        return (new Add($request))->newUser();
    }




    /**
     * Show the form for editing the specified resource.
     * @param  \App\User    $user
     * @return \Illuminate\Http\Response
     */
    public function getInfo(User $user)
    {
        
        if ( !isset($user->id) ) {

            return response()->json(['exito'  => false]);
        } else {

            return response()->json(['exito'  => true, 'user'  => $user, 'role' => $user->roles->pluck('id')]);
        }
    }




    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!Gate::allows('system.users.edit')) {
            abort(403, "No estas autorizado para modificar la información");
        }
        
        return (new Adjust($request, $user))->editUser();
    }



    
    /**
     * Inactive the specified resource from storage.
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function inactive(User $user)
    {

        if (!Gate::allows('system.users.status')) {
            abort(403, "No estas autorizado para modificar la información");
        }
        
        try {

            $countActiveUsers = User::where('status', 'Active')->count();

            if ($countActiveUsers > 1) {
                
                DB::transaction(function() use ($user) {

                    $user->update(['status' => 'Suspended']);
                });
    
                return response()->json(['exito' => true]);
            }

            return response()->json(['exito' => false, 'message' => 'Debe haber por lo menos 1 usuario activo']);
            
        } catch(Exception $e) {
                
            return response()->json(['exito' => false, 'message' => 'Ocurrio un error al realizar la acción, si persiste el problema contacte a su administrador']);

        }         
    }

    


    /**
     * Active the specified resource from storage.
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function active(User $user)
    {

        if (!Gate::allows('system.users.status')) {
            abort(403, "No estas autorizado para modificar la información");
        }

        try {

            DB::transaction(function() use ($user) {

                $user->update(['status' => 'Active']);
            });

            return response()->json(['exito' => true]);

        } catch(Exception $e) {
                
            return response()->json(['exito' => false]);

        }        
    }
}
