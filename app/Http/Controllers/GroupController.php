<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Administration\Groups\Create\Add;
use Administration\Groups\Update\Adjust;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
     {
         $this->middleware(function ($request, $next){
             
             if (!Gate::allows('system.groups.list')) {
                 abort(403, "No estas autorizado de acceder a esta zona");
             }
  
             return $next($request);
         });
     }
     


     
     /**
      * Dirige a la interfaz principal de grupos y permisos
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $PAGE_NAVIGATION = "GROUPS";
         $permissions = Permission::orderBy('group')->get();
         
         return view('admin.groups.group_list', compact('PAGE_NAVIGATION', 'permissions'));
     }
 
 
 

     /**
      * Extrae la información de todos los grupos ordenandolos por nombre
      * @param Request $request
      * @return void
      */
     public function getGroups(Request $request)
     {
 
         $roles = Role::where('id', '!=', 1)->orderBy('name')->get(['id', 'name']);
         
         return response()->json(['data'  => $roles]);
     }
 
     
 

     /**
      * Dirige a las funciones que son diseñadas para poder dar de alta nueva información
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         if (!Gate::allows('system.groups.create')) {
             abort(403, "No estas autorizado para registrar información");
         }
         
         return (new Add($request))->newGroup();
     }
 
 
 

     /**
      * Muestra la información a editar de un grupo y sus permisos
      * @param  \App\Role    $role
      * @return \Illuminate\Http\Response
      */
     public function getInfo(Role $role)
     {
         
         if ( !isset($role->id) ) {
 
             return response()->json(['exito'  => false]);
         } else {
 
             $permissions = Permission::orderBy('group')->pluck('id');
 
             return response()->json([
                 'exito'             => true, 
                 'role'              => $role, 
                 'permissions_role'  => $role->permissions->pluck('id'),
                 'permissions'       => $permissions
             ]);
         }
     }
 
     
 
 
     /**
      * Dirige a las funciones que son diseñadas para poder editar la información extraida
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Role    $role
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Role $role)
     {
         if (!Gate::allows('system.groups.edit')) {
             abort(403, "No estas autorizado para modificar la información");
         }
         
         return (new Adjust($request, $role))->editGroup();
     }
 


     
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Role $role)
     {
         if (!Gate::allows('system.groups.delete')) {
             abort(403, "No estas autorizado para eliminar la información");
         }
 
         try {
 
             DB::transaction(function() use ($role) {
 
                 $role->delete();
             });
 
             return response()->json(['exito' => true]);
 
         } catch(Exception $e) {
                 
             return response()->json(['exito' => false]);
 
         } 
     }
 }
 