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
use App\Http\Requests\StorageRequest;
class StorageController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
             
            if (!Gate::allows('system.store.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }
 
            return $next($request);
        });
    }
 
     
    /**
    * Display a listing of store.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexAlmacen()
    {
        $PAGE_NAVIGATION = "STOREGE";
 
        return view('admin.storage.storage_dashboard', compact('PAGE_NAVIGATION'));
    }
     

     
    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function products_list()
    {
        $PAGE_NAVIGATION = "STORE";
        return view('admin.storage.storage_list', compact('PAGE_NAVIGATION'));
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
 
    public function create(Request $request)
    {
        if (!Gate::allows('system.store.create')) {
            abort(403, "No estas autorizado para registrar información");
        }

            // Validaciones personalizadas
            $validatedData = $request->validate([
                'txtName' => 'required|string',
                'txtSerialNumber' => 'required|integer',
                'txtStock' => 'required|integer',
                'brand' => 'required',
                'txtPurchaseCost' => 'required|numeric',
                'txtEntryDate' => 'required|date',
                'status' => 'required|in:Activo,Inactivo',
            ]);

        $nombre = $request->input('txtName');
        return redirect('/storage/products')->with('Exito',  'El producto ' . $nombre . ' guardado con éxito');
    }



    public function update(Request $request)
    {
        if (!Gate::allows('system.store.edit')) {
            abort(403, "No estas autorizado para registrar información");
        }

            // Validaciones personalizadas
            $validatedData = $request->validate([
                'txtName' => 'required|string',
                'txtSerialNumber' => 'required|integer',
                'txtStock' => 'required|integer',
                'brand' => 'required',
                'txtPurchaseCost' => 'required|numeric',
                'txtEntryDate' => 'required|date',
                'status' => 'required|in:Activo,Inactivo',
            ]);

        $nombre = $request->input('txtName');
        return redirect('/storage/products')->with('Exito',  'El producto ' . $nombre . ' actualizado con éxito');
    }



    /**
     * Inactive the specified resource from storage.
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function inactive(User $user)
    {

        if (!Gate::allows('system.store.status')) {
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

        if (!Gate::allows('system.store.status')) {
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
 


 