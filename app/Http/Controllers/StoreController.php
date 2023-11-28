<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
class StoreController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $PAGE_NAVIGATION = "STORE";
 
        return view('admin.store.store_list', compact('PAGE_NAVIGATION'));
    }

    public function index_products()
    {
        $PAGE_NAVIGATION = "STORE";

        
        return view('admin.store.storeproducts_list', compact('PAGE_NAVIGATION'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        return redirect('/store')->with('Exito',  'El producto ' . $nombre . ' guardado con éxito');
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
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
        return redirect('/store')->with('Exito',  'El producto ' . $nombre . ' actualizado con éxito');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
