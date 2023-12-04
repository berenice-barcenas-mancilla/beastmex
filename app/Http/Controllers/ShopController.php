<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Components\Shops\Create\Add;
use Components\Shops\Update\Adjust;
use PDF;
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
        $this->middleware(function ($request, $next){
             
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
 
        return view('admin.shopping.shopping_list', compact('PAGE_NAVIGATION'));
    }
 
    
    /**
     * Devuelve todos los compras en forma de lista.
     * @param Request $request
     * @return void
     */
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
    public function getInfo(Shop  $shop)
    {
        // Verifica si el compras existe
        if (!isset($shop->id)){
            return response()->json(['exito'=>false]);   
        } else {
            // Retorna la información del compras en formato JSON
            return response()->json(['exito'=>true, 'shop' => $shop]);   
        }
    }

    /**
     * Permite dar de alta un nuevo registro en la tabla de compras.
     */
    public function store(Request $request)
    {
        // Verifica si el usuario tiene permisos para crear compras
        if (!Gate::allows('system.shop.create')) {
            abort(403, "No estás autorizado para acceder a esta zona");
        }
        // Utiliza la clase Add para agregar un nuevo compras
        return (new Add($request))->newShop();
    }

    /**
     * Permite actualizar información de un registro seleccionado.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        // Verifica si el usuario tiene permisos para editar compras
        if (!Gate::allows('system.shop.edit')) {
            abort(403, "No estás autorizado para acceder a esta zona");
        }
        // Utiliza la clase Adjust para editar la información del compras
        return (new Adjust($request, $shop))->editShop();
    }


    public function generateShopPDF($shopId)
{
    $shop = Shop::with('supplier', 'store')->find($shopId);

    if (!$shop) {
        abort(404, "Compra no encontrada");
    }

    $pdfData = [
        'shop' => $shop,
        'supplier' => $shop->supplier,
        'store' => $shop->store,
    ];

    $pdf = PDF::loadView('admin.pdf.shop', $pdfData);
    return $pdf->stream();
}


}
