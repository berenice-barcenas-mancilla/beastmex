<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Components\Shops\Create\Add;
use Barryvdh\DomPDF\Facade as PDF;

use Components\Shops\Update\Adjust;

use Carbon\Carbon;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!Gate::allows('system.shop.list')) {
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
        $PAGE_NAVIGATION = "SHOP";
        $suppliers = Supplier::all();
        $store = Store::storesList();
        return view('admin.shopping.shopping_list', compact('PAGE_NAVIGATION', 'store', 'suppliers'));

    }


    public function getShops(Request $request)
    {
        // Obtiene la lista de compras
        $shops = Shop::getShops();
        // Retorna la lista de compras en formato JSON
        return response()->json(['data' => $shops]);
    }

    /**
     * Permite consultar un compras extrayendo toda su información.
     * @param  \App\Models\Shop $shop 
     * @return \Illuminate\Http\Response
     */
    public function getInfo(Shop $shop)
    {
        // Verifica si el compras existe
        if (!isset($shop->id)) {
            return response()->json(['exito' => false]);
        } else {
            // Retorna la información del compras en formato JSON
            return response()->json(['exito' => true, 'shop' => $shop]);
        }
    }


    /**
     * Permite dar de alta un nuevo registro en la tabla de supplier.
     */
    public function store(Request $request)
    {
        // Verifica si el usuario tiene permisos para crear proveedores
        if (!Gate::allows('system.shop.create')) {
            abort(403, "No estás autorizado para acceder a esta zona");
        }
     
        // Utiliza la clase Add para agregar un nuevo proveedor
        return (new Add($request))->newShop();

    }

    

    /**
     * Permite inactivar un proveedor.
     */
    public function inactive(Shop $shop)
    {
        // Verifica si el usuario tiene permisos para cambiar el estado de compras
        if (!Gate::allows('system.shop.status')) {
            abort(403, "No estás autorizado para modificar la información");
        }
        try {
            // Realiza una transacción de base de datos para inactivar el compras
            DB::transaction(function () use ($shop) {
                $shop->update(['status' => 'Entregada']);
            });
            return response()->json(['exito' => true]);
        } catch (Exception $e) {
            return response()->json(['exito' => false, 'message' => 'Ocurrió un error al realizar la acción, si persiste el problema contacte a su administrador']);
        }
    }

    /**
     * Permite activar un compras en específico.
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function active(Shop $shop)
    {
        // Verifica si el usuario tiene permisos para cambiar el estado de compras
        if (!Gate::allows('system.shop.status')) {
            abort(403, "No estás autorizado para modificar la información");
        }
        try {
            // Realiza una transacción de base de datos para activar el proveedor
            DB::transaction(function () use ($shop) {
                $shop->update(['status' => 'Solicitada']);
            });
            return response()->json(['exito' => true]);
        } catch (Exception $e) {
            return response()->json(['exito' => false]);
        }
    }




}
