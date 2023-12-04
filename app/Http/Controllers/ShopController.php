<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Store;

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
 
        $store=Store::storesList();
        return view('admin.shopping.shopping_list', compact('PAGE_NAVIGATION','store'));
    
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
    
    


}
