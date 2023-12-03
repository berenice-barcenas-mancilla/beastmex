<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Exception;
use Components\Suppliers\Create\Add;
use Components\Suppliers\Update\Adjust;

class SupplierController extends Controller
{
    public function __construct()
    {
        // Middleware para verificar permisos usando Gates
        $this->middleware(function ($request, $next){
            // Verifica si el usuario tiene permisos para listar proveedores
            if (!Gate::allows('system.supplier.list')) {
                abort(403, "No estás autorizado para acceder a esta zona");
            }
            return $next($request);
        });
    }
          
    /**
    * Muestra una lista de proveedores.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $PAGE_NAVIGATION = "SUPPLIER";
        // Retorna la vista con la variable de navegación de página
        return view('admin.supplier.supplier_list', compact('PAGE_NAVIGATION'));
    }
 
    
    /**
     * Devuelve todos los proveedores en forma de lista.
     * @param Request $request
     * @return void
     */
    public function getSuppliers(Request $request)
    {
        // Obtiene la lista de proveedores
        $suppliers = Supplier::getSuppliers();
        // Retorna la lista de proveedores en formato JSON
        return response()->json(['data' => $suppliers]);
    }

    /**
     * Permite consultar un proveedor extrayendo toda su información.
     * @param  \App\Models\Supplier $supplier 
     * @return \Illuminate\Http\Response
     */
    public function getInfo(Supplier  $supplier)
    {
        // Verifica si el proveedor existe
        if (!isset($supplier->id)){
            return response()->json(['exito'=>false]);   
        } else {
            // Retorna la información del proveedor en formato JSON
            return response()->json(['exito'=>true, 'supplier' => $supplier]);   
        }
    }

    /**
     * Permite dar de alta un nuevo registro en la tabla de supplier.
     */
    public function store(Request $request)
    {
        // Verifica si el usuario tiene permisos para crear proveedores
        if (!Gate::allows('system.supplier.create')) {
            abort(403, "No estás autorizado para acceder a esta zona");
        }
        // Utiliza la clase Add para agregar un nuevo proveedor
        return (new Add($request))->newSupplier();
    }

    /**
     * Permite actualizar información de un registro seleccionado.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Verifica si el usuario tiene permisos para editar proveedores
        if (!Gate::allows('system.supplier.edit')) {
            abort(403, "No estás autorizado para acceder a esta zona");
        }
        // Utiliza la clase Adjust para editar la información del proveedor
        return (new Adjust($request, $supplier))->editSupplier();
    }

    /**
     * Permite inactivar un proveedor.
     */
    public function inactive(Supplier $supplier)
    {
        // Verifica si el usuario tiene permisos para cambiar el estado de proveedores
        if (!Gate::allows('system.supplier.status')) {
            abort(403, "No estás autorizado para modificar la información");
        }
        try {
            // Realiza una transacción de base de datos para inactivar el proveedor
            DB::transaction(function() use ($supplier) {
                $supplier->update(['status' => 'Suspended']);
            });
            return response()->json(['exito' => true]);
        } catch(Exception $e) {
            return response()->json(['exito' => false, 'message' => 'Ocurrió un error al realizar la acción, si persiste el problema contacte a su administrador']);
        }         
    }

    /**
     * Permite activar un proveedor en específico.
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function active(Supplier $supplier)
    {
        // Verifica si el usuario tiene permisos para cambiar el estado de proveedores
        if (!Gate::allows('system.supplier.status')) {
            abort(403, "No estás autorizado para modificar la información");
        }
        try {
            // Realiza una transacción de base de datos para activar el proveedor
            DB::transaction(function() use ($supplier) {
                $supplier->update(['status' => 'Active']);
            });
            return response()->json(['exito' => true]);
        } catch(Exception $e) {
            return response()->json(['exito' => false]);
        }        
    }  
}
